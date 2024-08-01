<?php

$conn = mysqli_connect("localhost","root","","ssms");
if($conn){
	// echo "Successfully";
}
else{
    die("no conn" . mysqli_connect_error());
}

?>