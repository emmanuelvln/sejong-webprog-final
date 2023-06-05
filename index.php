<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="index.css">
    <title>Korean travel - index</title>

    <?php
        session_start();

        $_SESSION['username'] = $_POST['user'];
        $_SESSION['userpass'] = $_POST['pass'];
        $_SESSION['authuser'] = 1;

        if (!isset($_SESSION['username'])) {
            header('Location: login.php');
            die();
        }
    ?>
</head>
<body>
    <div id="header">Korean travel</div>

    <?php
        echo '<div id="top-ribbon"><img class="ribbon-img" src="imgs/ribbon.png"><a class="ribbon-txt">Welcome ';
        echo $_SESSION['username'];
        echo '!</a></div>';
    ?>
</body>
</html>