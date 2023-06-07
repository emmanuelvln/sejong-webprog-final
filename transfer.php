<?php 
    session_start();

    include("connection.php");
    include("functions.php");

    $user_data = check_login($con);

    if (isset($_POST['submit']) && isset($_FILES['my_image'])) {

        $title = $_POST['title'];
        $location = $_POST['location'];

        if ($title === "") {
            $title = "Untitled";
        }
        if ($location === "") {
            $location = "Unknown location";
        }

	    $img_name = $_FILES['my_image']['name'];
	    $img_size = $_FILES['my_image']['size'];
	    $tmp_name = $_FILES['my_image']['tmp_name'];
	    $error = $_FILES['my_image']['error'];

    	if ($error === 0) {
		    if ($img_size > 500000) {
			    $em = "File is too large";
		        header("Location: upload.php?error=$em");
		    } else {
			    $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
			    $img_ex_lc = strtolower($img_ex);

    			$allowed_exs = array("jpg", "jpeg", "png"); 

    			if (in_array($img_ex_lc, $allowed_exs)) {
				    $new_img_name = uniqid("IMG-", true).'.'.$img_ex_lc;
				    $img_upload_path = 'uploads/'.$new_img_name;
				    move_uploaded_file($tmp_name, $img_upload_path);
                    $user_name = $user_data['user_name'];
                    $user_id = $user_data['user_id'];
				    $sql = "INSERT INTO content (url, title, location, user, user_id) VALUES ('$new_img_name', '$title', '$location', '$user_name', '$user_id')";
				    mysqli_query($con, $sql);
				    header("Location: index.php");
			    } else {
				    $em = "Image is not of the right type";
		            header("Location: upload.php?error=$em");
			    }
		    }
	    } else {
		    $em = "Invalid inputs";
		    header("Location: upload.php?error=$em");
	    }

    } else {
		$em = "Invalid inputs";
		header("Location: upload.php?error=$em");
    }

?>