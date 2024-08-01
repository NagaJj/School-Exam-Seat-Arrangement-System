<?php
include "../db.php";
session_start();
if(isset($_POST['addstaff'])){
	$name = $_POST['sname'];
	$name = mysqli_real_escape_string($conn, $name);
	$name = htmlentities($name);
	$gender = $_POST['gender'];
	$gender = mysqli_real_escape_string($conn, $gender);
	$gender = htmlentities($gender);
	$cname = $_POST['cname'];
	$cname = mysqli_real_escape_string($conn, $cname);
	$cname = htmlentities($cname);
	$ssub = $_POST['ssub'];
	$ssub = mysqli_real_escape_string($conn, $ssub);
	$ssub = htmlentities($ssub);
	
	
	$insert = "insert into se_staff(staff_name,staff_gender,class_name,sub_name) VALUES ('$name','$gender','$cname', '$ssub')";
	$insert_query = mysqli_query($conn, $insert);
	if($insert_query){
		$_SESSION['staff'] = "New staff added successfully.";
	}
	else{
		$_SESSION['staffnot'] = "Error!! New staff not added.";
	}
	header("Location: se_add_staff.php");
}

?>