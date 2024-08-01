<?php
include "../db.php";
session_start();
if(isset($_POST['addstudent'])){
	$name = $_POST['sname'];
	$name = mysqli_real_escape_string($conn, $name);
	$name = htmlentities($name);
	$gender = $_POST['gender'];
	$gender = mysqli_real_escape_string($conn, $gender);
	$gender = htmlentities($gender);
	$cname = $_POST['cname'];
	$cname = mysqli_real_escape_string($conn, $cname);
	$cname = htmlentities($cname);
	$roll = $_POST['sroll'];
	$roll = mysqli_real_escape_string($conn, $roll);
	$roll = htmlentities($roll);
	$div = $_POST['div'];
	$div = mysqli_real_escape_string($conn, $div);
	$div = htmlentities($div);
	
	$insert = "insert into se_student(std_name,std_rollno,std_gender,std_class,division) VALUES ('$name','$roll','$gender','$cname', '$div')";
	$insert_query = mysqli_query($conn, $insert);
	if($insert_query){
		$_SESSION['student'] = "New student added successfully.";
	}
	else{
		$_SESSION['studentnot'] = "Error!! New student not added.";
	}
	header("Location: se_add_student.php");
}

?>