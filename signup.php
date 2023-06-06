<?php
    session_start();

    include("connection.php");
    include("functions.php");

    if ($_SERVER['REQUEST_METHOD'] == "POST") {
		$user = $_POST['user'];
		$pass = $_POST['pass'];

		if (!empty($user) && !empty($pass) && !is_numeric($user)) {
			$user_id = random_num(5);
			$query = "INSERT INTO users (user_id, user_name, password) VALUES ('$user_id', '$user', '$pass')";

			mysqli_query($con, $query);

			header("Location: login.php");
			die();
		}
        $em = "Invalid information";
        header("Location: signup.php?error=$em");
	}
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="signup.css">
    <title>Korean journey - signup</title>
</head>
<body>
    <div id="header">Korean journey</div>

    <div id="top-ribbon">
        <img class="ribbon-img" src="imgs/ribbon.png">
        <span class="ribbon-txt">Please sign-up</span>
    </div>

    <div class="nav-bar">
        <a class="nav-button" href="index.php">
            <img class="nav-icon" src="imgs/home.png">
            <div class="nav-text">Home page</div>
        </a>
    </div> 

    <div id="page">
        <form method="post">
            <?php
                if (isset($_GET['error'])) {
                    echo '<p>';
                    echo $_GET['error'];
                    echo '</p>';
                }
            ?>
            <p> Enter your username:</br>
                <input type="text" name="user"/> 
            </p>
            <p>Enter your password:</br>
                <input type="password" name="pass"/> 
            </p>
            <p>
                <input type="submit" name="submit" value="Submit"/> 
            </p>
            <a href="login.php">Log in</a>
        </form>
    </div>
</body>
</html>