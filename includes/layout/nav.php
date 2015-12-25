<nav class="navbar navbar-inverse">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">Fun To Learn</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li class="active"><a href="#">Home</a></li>
                <li><a href="category.php">Categories</a></li>
                <li><a href="app.php">Parser</a></li>
                <?php

                    if(isset($_SESSION['user'])){
                        echo "<li><a href='?logout'>Log out</a></li>";
                    }

                ?>


            </ul>
        </div><!--/.nav-collapse -->
    </div>
</nav>