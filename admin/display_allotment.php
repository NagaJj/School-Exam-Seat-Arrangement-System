<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<?php
include "../link.php";
if(isset($_POST['display'])){
	$roomid = $_POST['display'];
	
	$result= $conn->query("select * from `se_room` where room_id ='$roomid'");
													
													if($result){
													while( $row1 = $result->fetch_assoc() ) {
														
														$room_no=$row1['room_no'];
													}
													}
													     else{
												$room_no=$row1['room_no'];
													}
													
													
		$res= $conn->query("select class_id,start_no,end_no from `se_batch` where room_id ='$roomid' ORDER BY batch_id" );
													$count =mysqli_num_rows($res);
													if($res){
														$i=1;
														$numbers = array();
														while($row = mysqli_fetch_assoc($res))
														{

													    $numbers[$i]= range($row['start_no'],$row['end_no'],1);
														$i=$i+1;
													//print_r($numbers);

														}
														$cal1 = $numbers[1][0];
														$cal2 = $numbers[1][1];
														$cal3 = $numbers[1][2];
														$cal4 = $numbers[1][3];
														$cal5 = $numbers[1][4];
														$cal6 = $numbers[1][5];
														$cal7 = $numbers[1][6];
														$cal8 = $numbers[1][7];
														$cal9 = $numbers[1][8];
														$cal10 = $numbers[1][9];
														
														$cal11 = $numbers[2][0];
														$cal12 = $numbers[2][1];
														$cal13 = $numbers[2][2];
														$cal14 = $numbers[2][3];
														$cal15 = $numbers[2][4];
														$cal16 = $numbers[2][5];
														$cal17 = $numbers[2][6];
														$cal18 = $numbers[2][7];
														$cal19 = $numbers[2][8];
														$cal110 = $numbers[2][9];
														
														$cal21 = $numbers[3][0];
														$cal22 = $numbers[3][1];
														$cal23 = $numbers[3][2];
														$cal24 = $numbers[3][3];
														$cal25 = $numbers[3][4];
														$cal26 = $numbers[3][5];
														$cal27 = $numbers[3][6];
														$cal28 = $numbers[3][7];
														$cal29 = $numbers[3][8];
														$cal210 = $numbers[3][9];
														
														
														echo "<table class='table table-bordered' style='width:40%' >
														<tr><th colspan='7'>Seating</th></tr>
														<tr>
														<td>".$cal1."</td>
														<td>".$cal11."</td>
														<td>".$cal21."</td>
														<td></td>
														<td>".$cal10."</td>
														<td>".$cal110."</td>
														<td>".$cal210."</td>
														</tr>
														<tr>
														<td>".$cal2."</td>
														<td>".$cal12."</td>
														<td>".$cal22."</td>
														<td></td>
														<td>".$cal9."</td>
														<td>".$cal19."</td>
														<td>".$cal29."</td>
														</tr>
														<tr>
														<td>".$cal3."</td>
														<td>".$cal13."</td>
														<td>".$cal23."</td>
														<td></td>
														<td>".$cal8."</td>
														<td>".$cal18."</td>
														<td>".$cal28."</td>
														</tr><tr>
														<td>".$cal4."</td>
														<td>".$cal14."</td>
														<td>".$cal24."</td>
														<td></td>
														<td>".$cal7."</td>
														<td>".$cal17."</td>
														<td>".$cal27."</td>
														</tr><tr>
														<td>".$cal5."</td>
														<td>".$cal15."</td>
														<td>".$cal25."</td>
														<td></td>
														<td>".$cal6."</td>
														<td>".$cal16."</td>
														<td>".$cal26."</td>
														</tr>
														</table>";
													}
													else{
												echo "not working";
													}
													
													
													
	$result= $conn->query("select room_no from `se_room` where room_id ='$roomid'");
													
													if($result){
													while( $row1 = $result->fetch_assoc() ) {
														
														$room_no=$row1['room_no'];
													}
													}
													     else{
												$room_no=$row1['room_no'];
													}
	echo "<table class='table table-bordered' style='width:40%'>
			<thead>
			<tr>
			<th>Student rollno</th>
			<th>Student Details</th>
			<th>Room No.</th>
			</tr>
			</thead>
			<tbody>
	";
	$display = "select sb.room_id,ss.std_rollno,ss.std_name,ss.std_class,ss.division from se_student ss,se_batch sb WHERE ss.std_class=sb.class_name and ss.division=sb.division  AND sb.room_id='$roomid' AND ss.std_rollno >= sb.start_no AND ss.std_rollno <= sb.end_no ";
	$display_query = mysqli_query($conn, $display);
	if(mysqli_num_rows($display_query)>0){
		while($row = mysqli_fetch_assoc($display_query)){
			echo "<tr>
					<td>".$row['std_rollno']."</td>
					<td>".$row['std_name']." ".$row['std_class']." ".$row['division']."</td>
					<td>Rm.N0-".$room_no."</td>
				</tr>
					";
		}
	}
}

?>