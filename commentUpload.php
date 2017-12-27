<?php

session_start();
require('db_config.php');

		$sql = "INSERT INTO image_gallery (comments) VALUES ('".$_POST['comments']."')";
		$mysqli->query($sql);

		$_SESSION['success'] = 'Image Uploaded successfully.';
		header("Location: http://localhost/phpimages");


?>
