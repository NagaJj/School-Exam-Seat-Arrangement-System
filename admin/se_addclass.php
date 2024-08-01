<?php
include '../db.php';
session_start();
if(isset($_POST['addclass'])){
	$year = $_POST['year'];
	$year = mysqli_real_escape_string($conn, $year);
	$year = htmlentities($year);
	$div = $_POST['div'];
	$div = mysqli_real_escape_string($conn, $div);
	$div = htmlentities($div);
    $dept = $_POST['teach'];
	$dept = mysqli_real_escape_string($conn, $dept);
	$dept = htmlentities($dept);
	
	$insert = "insert into se_class(class_name, division, class_teacher) VALUES ('$year','$div','$dept')";
	// echo $insert;
	$insert_query = mysqli_query($conn, $insert);
	if($insert_query){
		$_SESSION['class'] = "New class added successfully.";
	}
	else{
		$_SESSION['classnot'] = "Error!! New class not added.";
	}
	header("Location: se_add_class.php");
}

?>