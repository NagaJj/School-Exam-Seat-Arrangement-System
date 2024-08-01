<?php
include "../db.php";
session_start();
if(isset($_POST['addexam'])){
	$name = $_POST['ename'];
	$name = mysqli_real_escape_string($conn, $name);
	$name = htmlentities($name);
	$edate = $_POST['edate'];
	$edate = mysqli_real_escape_string($conn, $edate);
	$edate = htmlentities($edate);
	$stime = $_POST['stime'];
	$stime = mysqli_real_escape_string($conn, $stime);
	$stime = htmlentities($stime);
	$etime = $_POST['etime'];
	$etime = mysqli_real_escape_string($conn, $etime);
	$etime = htmlentities($etime);
	$esession = $_POST['esession'];
	$esession = mysqli_real_escape_string($conn, $esession);
	$esession = htmlentities($esession);
	$cname = $_POST['cname'];
	$cname = mysqli_real_escape_string($conn, $cname);
	$cname = htmlentities($cname);
	$ssub = $_POST['ssub'];
	$ssub = mysqli_real_escape_string($conn, $ssub);
	$ssub = htmlentities($ssub);
	
	
	$insert = "insert into se_exam(ex_name,ex_date,ex_stime,ex_etime,ex_session,ex_classid,ex_subid) VALUES ('$name','$edate','$stime', '$etime','$esession','$cname','$ssub')";
	$insert_query = mysqli_query($conn, $insert);
	if($insert_query){
		$_SESSION['exam'] = "New Exam added successfully.";
	}
	else{
		$_SESSION['examnot'] = "Error!! New Exams not added.";
	}
	header("Location: se_add_exam.php");
}

?>