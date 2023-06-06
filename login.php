<?php
    session_start();

    include("connection.php");
    include("functions.php");

    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        $user = $_POST['user'];
        $pass = $_POST['pass'];

        if (!empty($user) && !empty($pass) && !is_numeric($user)) {
            $query = "select * from users where user_name = '$user' limit 1";
            $result = mysqli_query($con, $query);

            if ($result) {
                if ($result && mysqli_num_rows($result) > 0) {
                    $user_data = mysqli_fetch_assoc($result);
                
                    if ($user_data['password'] === $pass) {
                        $_SESSION['user_id'] = $user_data['user_id'];

                        header("Location: index.php");
                        die();
                    }
                }
            }
            echo "wrong username or password! 2";
        } else {
            echo "wrong username or password! 1";
        }
    }
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Korean journey - login</title>
</head>
<body>
    <form method="post">
        <p> Enter your username:
            <input type="text" name="user"/> 
        </p>
        <p> Enter your password:
            <input type="password" name="pass"/> 
        </p>
        <p>
            <input type="submit" name="submit" value="Submit"/> 
        </p>
        <a href="signup.php">Signup</a>
    </form>
</body>
</html>