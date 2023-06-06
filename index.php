<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="index.css">
    <title>Korean journey - index</title>

    <?php
        session_start();

        include("connection.php");
        include("functions.php");

        $user_data = check_login($con);
    ?>
</head>
<body>
    <div id="header">Korean journey</div>
    
    <div id="top-ribbon">
        <img class="ribbon-img" src="imgs/ribbon.png">
        <span class="ribbon-txt">Welcome <?php echo $user_data['user_name']; ?>!</span>
    </div>

    <a href="logout.php">Logout</a>
</body>
</html>