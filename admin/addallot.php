<?php
include '../db.php';
session_start();
if(isset($_POST['addallotment'])){
    $room = $_POST['room'];
    $room = mysqli_real_escape_string($conn, $room);
    $room = htmlentities($room);
	$cname = $_POST['cname'];
    $cname = mysqli_real_escape_string($conn, $cname);
    $cname = htmlentities($cname);
	$classname = "select * from se_class where class_id='$cname'";

    $classname = mysqli_query($conn, $classname);
										if($classname){
                                            
                                            while( $row = mysqli_fetch_assoc($classname))
											{
                                                
                                                    $classname1 = $row['class_name'];
													$division = $row['division'];
                                            }
                                        } 
										
    $ename = $_POST['ename'];
    $ename = mysqli_real_escape_string($conn, $ename);
    $ename = htmlentities($ename);
    $ssub = $_POST['ssub'];
    $ssub = mysqli_real_escape_string($conn, $ssub);
    $ssub = htmlentities($ssub);
	$start = $_POST['start'];
    $start = mysqli_real_escape_string($conn, $start);
    $start = htmlentities($start);
    $end = $_POST['end'];
    $end = mysqli_real_escape_string($conn, $end);
    $end = htmlentities($end);
	$total = $end - $start;
	$total = $total + 1;


    $insert = "insert into se_batch(class_id,class_name,division,room_id,exam_id,sub_id,start_no,end_no,total) VALUES ('$cname','$classname1','$division','$room','$ename','$ssub','$start','$end','$total')";
    $insert_query = mysqli_query($conn, $insert);
    if($insert_query){
        $_SESSION['batch'] = "New allotment placed successfully.";
    }
    else{
        $_SESSION['batchnot'] = "Error!! New allotment not placed.";
    }
    header("Location: dashboard.php");
}

?>