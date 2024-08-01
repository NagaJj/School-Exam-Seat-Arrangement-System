<?php 
session_start();
?>
<html>
<head>
    <title>Manage Staffs</title>
    <link rel="stylesheet" href="common.css">
    <?php include'../link.php' ?>
    <style type="text/css">
    </style>
    </head>
<body>
    <?php
    if(isset($_POST['deletestaff'])){
        $Staff = $_POST['deletestaff'];
        $delete = "delete from se_staff where staff_id = '$Staff'";
        $delete_query = mysqli_query($conn, $delete);
        if($delete_query){
            $_SESSION['delstaff'] = "Staff deleted successfully";
        }
        else{
            $_SESSION['delnotstaff'] = "Error!! Staff not deleted.";
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
                        <a href="se_add_staff.php" class="active_link"><img src="https://img.icons8.com/ios-filled/25/ffffff/student-registration.png"/> Staffs</a>
                    </li>
					<li>
                        <a href="se_add_exam.php" ><img src="https://img.icons8.com/ios-filled/25/ffffff/student-registration.png"/> Exams</a>
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
            echo "<div class='alert alert-warning alert-dismissible fade show' role='alert'>".$_SESSION['staff']."<button class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>";
            unset($_SESSION['staff']);
        }
        if(isset($_SESSION['staffnot'])){
            echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>".$_SESSION['staffnot']."<button class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>";
            unset($_SESSION['staffnot']);
        }
        if(isset($_SESSION['delstaff'])){
            echo "<div class='alert alert-warning alert-dismissible fade show' role='alert'>".$_SESSION['delstudent']."<button class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>";
            unset($_SESSION['delstaff']);
        }
        if(isset($_SESSION['delnotstaff'])){
            echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>".$_SESSION['delnotstaff']."<button class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>";
            unset($_SESSION['delnotstaff']);
        }
        ?>
        <div class="table-responsive border">
            <table class="table table-hover text-center">
               <thead class="thead-light">
                <tr>
                    <th>Name</th>
					<th>Gender</th>
					<th>class</th>
					<th>Subject</th>
                    <th>Actions</th>
                </tr>   
                </thead>
                <tbody>
                <tr>
                <form action="se_addstaff.php" method="post">
                    <th class="py-3 bg-light">
                        <input class="form-control" type="text" name="sname">
                    </th>
					<th class="py-3 bg-light">
                            <select id="gender" name="gender" class="form-control">
                                <option value="">--select--</option>
                                <option value="M">MALE</option>
                                <option value="F">FEMALE</option>
                                <option value="O">OTHERS</option>
                            </select>
                        </th>
						<th class="py-3 bg-light">
                            <select id="cname" name="cname" class="form-control">
                                <option value="">--select--</option>
                                <option value="6">6th</option>
                                <option value="7">7th</option>
                                <option value="8">8th</option>
								<option value="9">9th</option>
                                <option value="10">10th</option>
                                <option value="11">11th</option>
                                <option value="12">12th</option>
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
                        <button class="btn btn-primary" name="addstaff">Add</button>
                    </th>
                </tr>  
            </form>
                <?php
                $selectclass = "SELECT * FROM `se_staff` ORDER BY staff_id desc";
                $selectclassquery = mysqli_query($conn, $selectclass);
                if($selectclassquery){
                    while ($row = mysqli_fetch_assoc($selectclassquery)) {
                        echo "<tr>
                        <td>".$row['staff_name']."</td>
						<td>".$row['staff_gender']."</td>
						<td>".$row['class_name']."</td>
                        <td>".$row['sub_name']." </td>
                        <form method='post'>
                        <td>
                            <button class='btn btn-light px-1 py-0' type='submit' value='".$row['staff_id']."' name='deletestaff'>
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