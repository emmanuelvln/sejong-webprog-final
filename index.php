<?php
    session_start();

    include("connection.php");
    include("functions.php");

	if (isset($_SESSION['user_id'])) {
		$id = $_SESSION['user_id'];
		$query = "SELECT * FROM users WHERE user_id = '$id' LIMIT 1";

        $result = mysqli_query($con, $query);
		if ($result && mysqli_num_rows($result) > 0) {
			$user_data = mysqli_fetch_assoc($result);
		}
	}
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="index.css">
    <title>Korean journey - home</title>
</head>
<body onload="load()">
    <div id="header">Korean journey</div>
    
    <div id="top-ribbon">
        <img class="ribbon-img" src="imgs/ribbon.png">
        <span class="ribbon-txt">Welcome<?php
                if (isset($user_data)) {
                    echo ' ';
                    echo $user_data['user_name'];
                }
            ?>!</span>
    </div>

    <div class="nav-bar">
        <?php
            if (!isset($user_data)) {
                echo <<<HTML
                        <a class="nav-button" href="login.php">
                            <img class="nav-icon" src="imgs/logout.png">
                            <div class="nav-text">Log in</div>
                        </a>
                    HTML;
            } else {
                echo <<<HTML
                    <a class="nav-button" href="logout.php">
                        <img class="nav-icon" src="imgs/logout.png">
                        <div class="nav-text">Sign out</div>
                    </a>
                    <a class="nav-button" href="upload.php">
                        <img class="nav-icon" src="imgs/upload.png">
                        <div class="nav-text">Upload</div>
                    </a>
                    <a class="nav-button" href="profile.php">
                        <img class="nav-icon" src="imgs/profile.png">
                        <div class="nav-text">Profile</div>
                    </a>
                HTML;
            }
        ?>
    </div>
        
    <div class="sort-bar">
        <div class="sort-indicator">Sort by:</div>
        <?php
            if (!isset($_GET['sorting'])) {
                echo '<div id="sort-selected" class="sort-option">Recentness</div>';
            } else {
                echo '<a href="index.php" class="sort-option">Recentness</a>';
            }

            if (isset($_GET['sorting']) && $_GET['sorting'] == "old") {
                echo '<div id="sort-selected" class="sort-option">Oldest</div>';
            } else {
                echo '<a href="index.php?sorting=old" class="sort-option">Oldest</a>';
            }

            if (isset($_GET['sorting']) && $_GET['sorting'] == "title") {
                echo '<div id="sort-selected" class="sort-option">Title</div>';
            } else {
                echo '<a href="index.php?sorting=title" class="sort-option">Title</a>';
            }

            if (isset($_GET['sorting']) && $_GET['sorting'] == "location") {
                echo '<div id="sort-selected" class="sort-option">Location</div>';
            } else {
                echo '<a href="index.php?sorting=location" class="sort-option">Location</a>';
            }
        ?>
    </div>

    <div id="content">
        <?php 
            if (!isset($_GET['sorting'])) {
                $sql = "SELECT * FROM content ORDER BY id DESC";
            } else if ($_GET['sorting'] == "old") {
                $sql = "SELECT * FROM content ORDER BY id ASC";
            } else if ($_GET['sorting'] == "title") {
                $sql = "SELECT * FROM content ORDER BY title ASC";
            } else if ($_GET['sorting'] == "location") {
                $sql = "SELECT * FROM content ORDER BY location ASC";
            }

            $res = mysqli_query($con,  $sql);

            if (mysqli_num_rows($res) > 0) {
          	    while ($images = mysqli_fetch_assoc($res)) {  ?>
             
                <div class="card">
                    <div class="frame">
                        <img class="image" src="uploads/<?=$images['url']?>">
                    </div>
                    <div class="description">
                        <div class="title"><?=$images['title']?></div>
                        <div class="sub-title"><?=$images['location']?></div>
                        <div class="author"><?=$images['user']?></div>
                    </div>
                </div>
          		
        <?php } }?>
	</div>

</body>
</html>