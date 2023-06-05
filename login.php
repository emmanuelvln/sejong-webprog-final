<?php
    session_start();
    session_unset();
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Korean travel - login</title>
</head>
<body>
    <form method="post" action="index.php">
        <p> Enter your username:
            <input type="text" name="user"/> 
        </p>
        <p> Enter your password:
            <input type="password" name="pass"/> 
        </p>
        <p>
            <input type="submit" name="submit" value="Submit"/> 
        </p>
    </form>
</body>
</html>