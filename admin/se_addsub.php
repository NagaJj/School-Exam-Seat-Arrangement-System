<?php
include '../db.php';
session_start();
if(isset($_POST['addsub'])){
	$subject = $_POST['sub'];
	$subject = mysqli_real_escape_string($conn, $subject);
	$subject = htmlentities($subject);
	$cname = $_POST['cname'];
	$cname = mysqli_real_escape_string($conn, $cname);
	$cname = htmlentities($cname);
	
	$insert = "insert into se_subject(sub_name, class_name) VALUES ('$subject','$cname')";
	// echo $insert;
	$insert_query = mysqli_query($conn, $insert);
	if($insert_query){
		$_SESSION['class'] = "New subject added successfully.";
	}
	else{
		$_SESSION['classnot'] = "Error!! New subject not added.";
	}
	header("Location: se_add_sub.php");
}

?>