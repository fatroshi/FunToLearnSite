<?php
session_start();

if(isset($_GET['logout']) && isset($_SESSION['user'])){
    session_unset();

}

if(!isset($_SESSION['user'])){
    header("Location: index.php");
}else{

}
?>
<?php include_once("includes/DB/Controller.php")                           ?>
<?php include_once("includes/Files/Upload.php")                            ?>
<?php include_once("includes/layout/header.php")            // HTML header ?>
<?php include_once("includes/layout/nav.php")               // Navigation  ?>

<?php
$controller = new Controller();



if(isset($_GET['delete']) && is_numeric($_GET['delete'])){
    $controller->delete($_GET['delete'],"categories");
}


if(isset($_POST['submit'])){

    $uploadErrors = array();
    $category = "";
    // Get input from form

    if(isset($_POST['name']) && $_POST['name'] == ""){
        $uploadErrors[] = "name";
    }else{
        $name = $_POST['name'];
    }

    if(count($uploadErrors) == 0){
        //Firest check if the category exists
        if($controller->addCategory($name)){
            // Success
        }else{
            // Fail
        }

    }
}
?>

    <div class="container">
        <div class="starter-template">
            <h1>Create a new category</h1>
            <form action="" method="post" enctype="multipart/form-data">
                Category name:
                <input type="text" name="name">
                <input type="submit" value="Create" name="submit">
            </form>
        </div>

        <hr>

        <ul class="list-group">
            <h2>All Categories</h2>
            <?php
            $categories = $controller->allCategories();
            if(count($categories) > 0){
                foreach($categories as $key => $value){
                    echo "<li class=\"list-group-item\">";
                       // <span class="badge">14</span> use this for show items in category
                        echo "<a href='items.php?cat={$key}'>{$value}</a>";
                        echo "<span class=\"badge \"><a href='category.php?delete={$key}' class='text-success'>Delete</a></span>";
                    echo "</li>";
                }
            }
            ?>
        </ul>

    </div><!-- /.container -->

<?php include_once("includes/layout/footer.php")            // HTML Footer ?>