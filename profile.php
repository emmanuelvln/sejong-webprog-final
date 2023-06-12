<?php
    session_start();

    include("connection.php");
    include("functions.php");

    $user_data = check_login($con);

    $user_id = $user_data['user_id'];
    $sql = "SELECT * FROM content WHERE user_id = '$user_id' ORDER BY id DESC";
    $res = mysqli_query($con,  $sql);

    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        $image_id = $_POST['image_id'];

        $query = "DELETE FROM content WHERE id = '$image_id' LIMIT 1";
        mysqli_query($con, $query);

        $images = mysqli_fetch_assoc($res);

        $path = 'uploads/'.$images['url'];
        
        header("Location: profile.php");
        die();
    }
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="profile.css">
    <title>Korean journey - profile</title>
</head>
<body>
    <div id="header">Korean journey</div>

    <div id="top-ribbon">
        <img class="ribbon-img" src="imgs/ribbon.png">
        <span class="ribbon-txt">Here is your profile!</span>
    </div>

    <div class="nav-bar">
        <a class="nav-button" href="index.php">
            <img class="nav-icon" src="imgs/home.png">
            <div class="nav-text">Home page</div>
        </a>
    </div>   

    <div class="info">
        <?php
            if (mysqli_num_rows($res) > 0) {
                echo 'Here are all the pictures you have uploaded';
            }
            else {
                echo "Uh oh, it looks like you have not posted anything yet";
            }
        ?>
    </div>

    <div id="content">
        <?php 
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
                        <form method="post">
                            <input type="hidden" name="image_id" value="<?=$images['id']?>">
                            <input class="submit-button" type="submit" name="submit" value="&#10006; Delete"/>
                        </form>
                    </div>
                </div>
          		
        <?php } }?>
	</div>
</body>
</html>