<?php 
session_start();
?>
<html>
<head>
    <title>Manage Exams</title>
    <link rel="stylesheet" href="common.css">
    <?php include'../link.php' ?>
    <style type="text/css">
    </style>
    </head>
<body>
    <?php
    if(isset($_POST['deleteexam'])){
        $exam = $_POST['deleteexam'];
        $delete = "delete from se_exam where exam_id = '$exam'";
        $delete_query = mysqli_query($conn, $delete);
        if($delete_query){
            $_SESSION['delexam'] = "Exam deleted successfully";
        }
        else{
            $_SESSION['delnotexam'] = "Error!! Exam not deleted.";
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
                        <a href="se_add_student.php"><img src="https://img.icons8.com/ios-filled/25/ffffff/student-registration.png"/> Students</a>
                    </li>
					<li>
                        <a href="se_add_staff.php"><img src="https://img.icons8.com/ios-filled/25/ffffff/student-registration.png"/> Staffs</a>
                    </li>
					<li>
                        <a href="se_add_exam.php" class="active_link"><img src="https://img.icons8.com/ios-filled/25/ffffff/student-registration.png"/> Exams</a>
                    </li>
                    <li>
                        <a href="se_add_room.php"><img src="https://img.icons8.com/metro/25/ffffff/building.png"/> Rooms</a>
                    </li>
                    <li>
                        <a href="dashboard.php"><img src="https://img.icons8.com/nolan/30/ffffff/summary-list.png"/> Allotment</a>
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
            </button><span class="page-name"> Manage Exams</span>
            <button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <img src="https://img.icons8.com/ios-filled/20/ffffff/menu--v3.png"/>
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
        if(isset($_SESSION['exam'])){
            echo "<div class='alert alert-warning alert-dismissible fade show' role='alert'>".$_SESSION['exam']."<button class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>";
            unset($_SESSION['exam']);
        }
        if(isset($_SESSION['examnot'])){
            echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>".$_SESSION['examnot']."<button class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>";
            unset($_SESSION['examnot']);
        }
        if(isset($_SESSION['delexam'])){
            echo "<div class='alert alert-warning alert-dismissible fade show' role='alert'>".$_SESSION['delstudent']."<button class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>";
            unset($_SESSION['delexam']);
        }
        if(isset($_SESSION['delnotexam'])){
            echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>".$_SESSION['delnotexam']."<button class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>";
            unset($_SESSION['delnotexam']);
        }
        ?>
        <div class="table-responsive border">
            <table class="table table-hover text-center">
               <thead class="thead-light">
                <tr>
                    <th>Name</th>
					<th>Date</th>
					<th>S.Time</th>
					<th>E.Time</th>
                    <th>Session</th>
					<th>Class</th>
					<th>Subject</th>
					<th>Action</th>
                </tr>   
                </thead>
                <tbody>
                <tr>
                <form action="se_addexam.php" method="post">
                    <th class="py-3 bg-light">
                         <select id="ename" name="ename" class="form-control">
                                <option value="">--select--</option>
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
                            <input type="date" id="edate" name="edate">
                        </th>
						<th class="py-3 bg-light">
                            <input type="time" id="stime" name="stime">
                        </th>
						<th class="py-3 bg-light">
                            <input type="time" id="etime" name="etime">
                        </th>
						<th class="py-3 bg-light">
                            <select id="esession" name="esession" class="form-control">
                                <option value="">select</option>
                                <option value="FN">FN</option>
                                <option value="AN">AN</option>
                            </select>
                        </th>
						<th class="py-3 bg-light">
                            					<select id="cname" name="cname" class="form-control">
												<?php 
													$result= $conn->query("select `class_name` from `se_class` group by class_name order by class_name");
													echo "<option value=''>--select--</option>";
													if($result){
													while( $row = $result->fetch_assoc() ) {
														
														echo "<option value=".$row['class_name'].">".$row['class_name']." </option>";
													}
													}
													     else{
                        echo "<option value=''>No options</option>";
                    }
												?>
												</select>
                        </th>
						
						<th class="py-3 bg-light">
                        <select id="ssub" name="ssub" class="form-control">
                    <?php 
                    $selectclass = "select sub_name from se_subject group BY sub_name";
                    $selectclassQuery = mysqli_query($conn, $selectclass);
                    if($selectclassQuery){
                        echo "<option value=''>--select--</option>";
                        while($row = mysqli_fetch_assoc($selectclassQuery)){
                            echo "<option value=".$row['sub_name'].">".$row['sub_name']." </option>";
                        }
                    }
                    else{
                        echo "<option value=''>No options</option>";
                    }
                    ?>
                    </select>
                    </th>
						
                    <th class="py-3 bg-light">
                        <button class="btn btn-primary" name="addexam">Add</button>
                    </th>
                </tr>  
            </form>
                <?php
                $selectclass = "SELECT * FROM `se_exam` ORDER BY ex_id desc";
                $selectclassquery = mysqli_query($conn, $selectclass);
                if($selectclassquery){
                    while ($row = mysqli_fetch_assoc($selectclassquery)) {
                        echo "<tr>
                        <td>".$row['ex_name']."</td>
						<td>".$row['ex_date']."</td>
						<td>".$row['ex_stime']."</td>
						<td>".$row['ex_etime']."</td>
						<td>".$row['ex_session']."</td>
						<td>".$row['ex_classid']."</td>
                        <td>".$row['ex_subid']." </td>
                        <form method='post'>
                        <td>
                            <button class='btn btn-light px-1 py-0' type='submit' value='".$row['ex_id']."' name='deleteexam'>
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