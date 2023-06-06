<?php
    session_start();

    include("connection.php");
    include("functions.php");

    $user_data = check_login($con);
?>

<html>
<head>
	<title>Image Upload Using PHP</title>
	<style>
		body {
			display: flex;
			justify-content: center;
			align-items: center;
			flex-direction: column;
			min-height: 100vh;
		}
	</style>
</head>
<body>
	<?php if (isset($_GET['error'])): ?>
		<p><?php echo $_GET['error']; ?></p>
	<?php endif ?>
     <form action="transfer.php"
           method="post"
           enctype="multipart/form-data">

            <input type="text" name="title"/> 

            <input type="text" name="location"/> 

            <input type="file" name="my_image"/>

            <input type="submit" name="submit" value="Upload"/>
     	
     </form>
</body>
</html>