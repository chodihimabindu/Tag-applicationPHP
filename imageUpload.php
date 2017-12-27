<?php

session_start();
require('db_config.php');
if(isset($_POST) && !empty($_POST['title'])){

	$name = $_FILES['image']['name'];
	list($txt, $ext) = explode(".", $name);
	$image_name = time().".".$ext;
	$tmp = $_FILES['image']['tmp_name'];

	if(!empty($_FILES['image']['name']) && move_uploaded_file($tmp, 'uploads/'.$image_name)){

		$sql = "INSERT INTO image_gallery (title, image,tag,comments) VALUES ('".$_POST['title']."', '".$image_name."','".$_POST['tag']."','".$_POST['comments']."')";
		$mysqli->query($sql);

		$_SESSION['success'] = 'Uploaded successfully.';
		header("Location: http://localhost/phpimages");
	}else{
		$sql = "INSERT INTO image_gallery (title,tag,comments) VALUES ('".$_POST['title']."','".$_POST['tag']."','".$_POST['comments']."')";
		$mysqli->query($sql);
		$_SESSION['success'] = 'Data Uploaded successfully';
		header("Location: http://localhost/phpimages");
	}
}else{
	$_SESSION['error'] = 'Please Select Image or Write title';
	header("Location: http://localhost/phpimages");
}

?>
