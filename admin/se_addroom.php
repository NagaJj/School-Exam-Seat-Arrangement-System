<?php
include "../db.php";
session_start();
if(isset($_POST['addroom'])){
	$roomno = $_POST['roomno'];
	$roomno = mysqli_real_escape_string($conn, $roomno);
	$roomno = htmlentities($roomno);
	$capacity = $_POST['cap'];
	$capacity = mysqli_real_escape_string($conn, $capacity);
	$capacity = htmlentities($capacity);
	
	$insert = "insert into se_room (room_no, capacity)VALUE ('$roomno','$capacity')";
	$insert_query = mysqli_query($conn, $insert);
	if($insert_query){
		$_SESSION['room'] = "New room added successfully.";
	}
	else{
		$_SESSION['roomnot'] = "Error!! New room not added.";
	}
	header("Location: se_add_room.php");
}

?>