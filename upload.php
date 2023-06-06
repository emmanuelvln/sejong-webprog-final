<?php
    session_start();

    include("connection.php");
    include("functions.php");

    $user_data = check_login($con);
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="upload.css">
	<title>Korean journey - upload</title>
</head>
<body>
    <div id="header">Korean journey</div>

    <div id="top-ribbon">
        <img class="ribbon-img" src="imgs/ribbon.png">
        <span class="ribbon-txt">Upload a new image</span>
    </div>

    <div class="nav-bar">
        <a class="nav-button" href="index.php">
            <img class="nav-icon" src="imgs/home.png">
            <div class="nav-text">Home page</div>
        </a>
    </div> 

    <div id="page">
        <form method="post" action="transfer.php" enctype="multipart/form-data">
                <?php
                    if (isset($_GET['error'])) {
                        echo '<p>';
                        echo $_GET['error'];
                        echo '</p>';
                    }
                ?>
                <p>Enter a title:
                    <input type="text" name="title"/> 
                </p>

                <p>Enter a location:
                    <input type="text" name="location"/> 
                </p>

                <p>Upload an image:
                    <input type="file" name="my_image"/>
                </p>

                <input type="submit" name="submit" value="Upload"/>
        </form>
    </div>
</body>
</html>