<?php

// Converted to class and with some modifications
// http://www.w3schools.com/php/php_file_upload.asp
class Upload{

    private $target_dir     = "uploads/";
    private $imageFileType  = null;
    private $btnName        = null;
    private $errors         = array();
    private $fileName       = null;

    function __construct($btnName, $uploadFolder) {
        // Where to upload file
        $this->target_dir = $uploadFolder;
        //
        $this->btnName = $btnName;
        // Create folder if it doesnt exist
        $this->folderExists();
        // Get file information
        $this->target_file = $this->target_dir . basename($_FILES["fileToUpload"]["name"]);
        $this->imageFileType = pathinfo($this->target_file,PATHINFO_EXTENSION);
    }

    public function isImage(){
        // Check if image file is a actual image or fake image
        if(isset($_POST["{$this->btnName}"])) {
            $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
            if($check !== false) {
                echo "File is an image - " . $check["mime"] . ".";
                return true;
            } else {
                $this->errors[]  = "File is not an image.";
                return false;
            }
        }
    }


    private function fileExists(){
        // Check if file already exists
        if (file_exists($this->target_file)) {
            $this->errors[]  = "Sorry, file already exists.";
            return false;
        }else{
            echo "File does not exist";
            return true;
        }
    }


    public function allowdExt(){
        // Allow certain file formats
        if($this->imageFileType != "jpg" && $this->imageFileType != "png" && $this->imageFileType != "jpeg"
            && $this->imageFileType != "gif" ) {
            $this->errors[]  = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            return false;
        }else{
            echo "File extension is approved";
            return true;
        }
    }

    public function moveFile(){
        $filename  = basename($_FILES['fileToUpload']['name']);
        $extension = pathinfo($filename, PATHINFO_EXTENSION);
        $new       = md5($filename).'.'.$extension;

        if (move_uploaded_file($_FILES['fileToUpload']['tmp_name'], "{$this->target_dir}/{$new}"))
        {
            $this->fileName = $new;
            return true;
        }else{
            return false;
        }
    }

    private function folderExists(){
        if (!file_exists($this->target_dir)) {
            if (!mkdir($this->target_dir, 0777, true)) {
                die('Failed to create folders...');
            }
        }else{
            echo "Folder exists  \n";
        }
    }

    public function upload(){
        if($this->isImage() && $this->allowdExt()){
            if(!$this->moveFile()){
                $this->errors[]  = "Could not move file to folder...";
                return false;
            }else{
                echo "File moved";
                return true;
            }
        }
    }

    public function errors(){
        return $this->errors;
    }

    public function getFileName(){
        return $this->fileName;
    }

}

?>