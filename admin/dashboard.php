<?php
session_start();
?>
<html>
<head>
    <title>Dashboard</title>
    <link rel="stylesheet" href="common.css">
    <?php include'../link.php' ?>
    </head>
<body>
<?php
    if(isset($_POST['deletebatch'])){
        $batch = $_POST['deletebatch'];
        $delete = "delete from se_batch where batch_id = '$batch'";
        $delete_query = mysqli_query($conn, $delete);
        if($delete_query){
            $_SESSION['delbatch'] = "Allotment deleted successfully";
        }
        else{
            $_SESSION['delnotbatch'] = "Error!! Allotment not deleted.";
        }
    }
?>
    <div class="wrapper">
        <nav id="sidebar">
            <div class="sidebar-header">
                <h4>DASHBOARD</h4>
            </div>
            <ul class="list-unstyled components">
                    <li>
                        <a href="se_add_class.php" ><img src="https://img.icons8.com/ios-filled/26/ffffff/google-classroom.png"/>Classes</a>
                    </li>
					 <li>
                        <a href="se_add_sub.php"  ><img src="https://img.icons8.com/ios-filled/26/ffffff/google-classroom.png"/>Subject</a>
                    </li>
                    <li>
                        <a href="se_add_student.php"><img src="https://img.icons8.com/ios-filled/25/ffffff/student-registration.png"/>Students</a>
                    </li>
					<li>
                        <a href="se_add_staff.php"><img src="https://img.icons8.com/ios-filled/25/ffffff/student-registration.png"/>Staffs</a>
                    </li>
					<li>
                        <a href="se_add_exam.php"><img src="https://img.icons8.com/ios-filled/25/ffffff/student-registration.png"/>Exams</a>
                    </li>
                    <li>
                        <a href="se_add_room.php"><img src="https://img.icons8.com/metro/25/ffffff/building.png"/> Rooms</a>
                    </li>
                    <li>
                        <a href="dashboard.php" class="active_link"><img src="https://img.icons8.com/nolan/30/ffffff/summary-list.png"/> Allotment</a>
                    </li>
					<li>
                         <a href="+918072005472" ><img src="https://img.icons8.com/nolan/30/ffffff/summary-list.png"/>Contact</a>
                    </li>
					<li>
                        <a href="https://wa.link/ug4wdl"><div class=" btn btn-success ">Naga_JJ (Get In touch)</div></a>
                    </li>
                </ul>
            </nav>
        <div id="content">
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="container-fluid">
                    <button type="button" id="sidebarCollapse" class="btn btn-info">
                        <img src="https://img.icons8.com/ios-filled/19/ffffff/menu--v3.png"/>
                    </button><span class="page-name"> Allotment</span>
                    <button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <img src="https://img.icons8.com/ios-filled/19/ffffff/menu--v3.png"/>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="nav navbar-nav ml-auto">
                            <li class="nav-item active">
                                <a class="nav-link" href="../logout.php">Logout</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
            <div class="main-content">
                 <?php
        if(isset($_SESSION['batch'])){
            echo "<div class='alert alert-warning alert-dismissible fade show' role='alert'>".$_SESSION['batch']."<button class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>";
            unset($_SESSION['batch']);
        }
        if(isset($_SESSION['batchnot'])){
            echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>".$_SESSION['batchnot']."<button class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>";
            unset($_SESSION['batchnot']);
        }

        if(isset($_SESSION['delbatch'])){
            echo "<div class='alert alert-warning alert-dismissible fade show' role='alert'>".$_SESSION['delbatch']."<button class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>";
            unset($_SESSION['delbatch']);
        }
        if(isset($_SESSION['delnotbatch'])){
            echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>".$_SESSION['delnotbatch']."<button class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>";
            unset($_SESSION['delnotbatch']);
        }
        ?>
            <div class="table-responsive border">
                <table class="table table-hover text-center">
                        <thead class="thead-light">
                            <tr>
                                <th>Room</th>
                                <th>Class</th>
								<th>Exam</th>
								<th>Subject</th>
                                <th>Start Roll No.</th>
                                <th>End Roll No.</th>
                                <th>Total</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <form action="addallot.php" method="post">
                           <tr>
                                <th class="py-3 bg-light">
                                    <select name="room" class="form-control"  style="width: 120px;">
                                        <?php
                                        $select_rooms = "SELECT * from se_room order by room_id";
                                        $select_rooms_query = mysqli_query($conn, $select_rooms);
                                        if(mysqli_num_rows($select_rooms_query)>0){
                                            echo "<option>select</option>";
                                            while($row = mysqli_fetch_assoc($select_rooms_query)){

                                                
                                                    echo "<option value=".$row['room_id']."> Rm.No-".$row['room_no']." </option>";
                                              
                                            }
                                        } 
                                        else{
                                            echo "<option>No Rooms</option>";
                                        }
                                        ?>
                                        
                                    </select>
                                </th>
								  
                                   <th class="py-3 bg-light">
											 <select name="cname" class="form-control">
                                        <?php
                                        $select_rooms = "SELECT * from se_class order by class_id";
                                        $select_rooms_query = mysqli_query($conn, $select_rooms);
                                        if(mysqli_num_rows($select_rooms_query)>0){
                                            echo "<option>select</option>";
                                            while($row = mysqli_fetch_assoc($select_rooms_query)){

                                                
                                                    echo "<option value=".$row['class_id'].">".$row['class_name']." ".$row['division']." </option>";
                                              
                                            }
                                        } 
                                        else{
                                            echo "<option>No Class</option>";
                                        }
                                        ?>
                                        
                                    </select>
									</th>
                                   <th class="py-3 bg-light">
                         <select id="ename" name="ename" class="form-control">
                                <option value="">select</option>
                                <option value="TERM-I">TERM-I</option>
                                <option value="TERM-II">TERM-II</option>
                                <option value="TERM-III">TERM-III</option>
								<option value="QURTALY">QURTALY</option>
								<option value="HALF-YEARLY">HALF-YEARLY</option>
								<option value="RIVISION-I">RIVISION-I</option>
								<option value="RIVISION-II">RIVISION-II</option>
								<option value="RIVISION-III">RIVISION-III</option>
                            </select>
                    </th>
					<th class="py-3 bg-light">
                                    <select name="ssub" class="form-control">
                                        <?php
                                        $select_rooms = "SELECT * from se_subject order by sub_id ";
                                        $select_rooms_query = mysqli_query($conn, $select_rooms);
                                        if(mysqli_num_rows($select_rooms_query)>0){
                                            echo "<option>select</option>";
                                            while($row = mysqli_fetch_assoc($select_rooms_query)){

                                                
                                                    echo "<option value=".$row['sub_id'].">".$row['sub_name']." </option>";
                                              
                                            }
                                        } 
                                        else{
                                            echo "<option>No Subject</option>";
                                        }
                                        ?>
                                        
                                    </select>
                                </th>
                                
								
                                <th class="py-3 bg-light"><input type="number" name="start" class="form-control" size=3></th>
                                <th class="py-3 bg-light"><input type="number" name="end" class="form-control" size=3></th>
                                <th class="py-3 bg-light"></th>
                                <th class="py-3 bg-light"><button class="btn btn-info form-control" name="addallotment">Add</button></th>
                            </tr> 
                            </form>    
                <?php
                $selectclass = "SELECT * FROM se_batch order by batch_id";
                $selectclassquery = mysqli_query($conn, $selectclass);
                if($selectclassquery){
                    while ($row = mysqli_fetch_assoc($selectclassquery)) {
						
					                                 $class_id=$row['class_id'];
													 $sub_id=$row['sub_id'];
													$result= $conn->query("select class_name,division from `se_class` where class_id ='$class_id'");
													
													if($result){
													while( $row1 = $result->fetch_assoc() ) {
														
														$class_name=$row1['class_name'];
														$division_name=$row1['division'];
													}
													}
													     else{
												$class_name=$row1['class_name'];
													}
													
													$res= $conn->query("select sub_name from `se_subject` where sub_id ='$sub_id'");
													
													if($res){
													while( $row2 = $res->fetch_assoc() ) {
														
														$subject_name=$row2['sub_name'];
														
													}
													}
													     else{
												$subject_name=$row2['sub_name'];
													}
											
						
                        echo "<tr>
                        <td>".$row['room_id']."</td>
						<td>".$class_name.' '.$division_name."</td>
                        <td>".$row['exam_id']."</td>
                        <td>".$subject_name."</td>
                        <td>".$row['start_no']."</td>
						<td>".$row['end_no']."</td>
						<td>".$row['total']."</td>
                        <form method='post'>
                        <td><button class='btn btn-light px-1 py-0' type='submit' value='".$row['batch_id']."' name='deletebatch'>
                        <img src='https://img.icons8.com/color/25/000000/delete-forever.png'/>
                        </button>
                        </td>
                        </form>
                    </tr>";
                    }
                }
                ?>
                        </tbody>
                    </table>
                </div>
            </div>
    </div>
</div>
<?php include'footer.php' ?>