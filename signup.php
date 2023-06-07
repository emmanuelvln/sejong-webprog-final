<?php
    session_start();

    include("connection.php");
    include("functions.php");

    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        $email = $_POST['email'];
		$user = $_POST['user'];
		$pass = $_POST['pass'];

        $query = "SELECT email FROM users WHERE email = '$email'";
        if (mysqli_num_rows(mysqli_query($con, $query))) {
            $em = "This email is already in use";
            header("Location: signup.php?error=$em");
            die();
        }

        $query = "SELECT user_name FROM users WHERE user_name = '$user'";
        if (mysqli_num_rows(mysqli_query($con, $query))) {
            $em = "This user name is already in use";
            header("Location: signup.php?error=$em");
            die();
        }

		$user_id = random_num();
        $pass = password_hash($pass, PASSWORD_DEFAULT);
		$query = "INSERT INTO users (user_id, user_name, password, email) VALUES ('$user_id', '$user', '$pass', '$email')";

		mysqli_query($con, $query);

        header("Location: login.php");
		die();
	}
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="signup.css">
    <title>Korean journey - signup</title>

    <script>
        function validateForm() {
            var email = document.getElementById('email');
            var user = document.getElementById('user');
            var pass = document.getElementById('pass');
            var isOk = true;

            if (!(/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(email.value))) {
                email.style.border = "1px solid red";
                isOk = false;
            }
            else {
                email.style.border = "";
            }

            if (user.value == null || !isNaN(user.value)) {
                user.style.border = "1px solid red";
                isOk = false;
            }
            else {
                user.style.border = "";
            }
            
            if (pass.value == "") {
                pass.style.border = "1px solid red";
                isOk = false;
            }
            else {
                pass.style.border = "";
            }
            
            return isOk;
        }
    </script>
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
        <form onsubmit="return validateForm()" method="post">
            <?php
                if (isset($_GET['error'])) {
                    echo '<p>';
                    echo $_GET['error'];
                    echo '</p>';
                }
            ?>
            <p>Enter your email address:</br>
                <input id="email" type="text" name="email"/> 
            </p>
            <p>Enter your username:</br>
                <input id="user" type="text" name="user"/> 
            </p>
            <p>Enter your password:</br>
                <input id="pass" type="password" name="pass"/> 
            </p>
            <p>
                <input type="submit" name="submit" value="Submit"/> 
            </p>
            <a href="login.php">Log in</a>
        </form>
    </div>
</body>
</html>