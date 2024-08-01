<html>
<head>
    <title>Manage Classes</title>
    <link rel="stylesheet" href="common.css">
    <?php include'../link.php' ?>
    <style type="text/css">
    </style>
    </head>
<body>
<?php
    session_start();
    if(isset($_POST['deleteclass'])){
        $class = $_POST['deleteclass'];
        $delete = "delete from se_class where class_id = '$class'";
        $delete_query = mysqli_query($conn, $delete);
        if($delete_query){
            $_SESSION['delete'] = "Class deleted successfully";
        }
        else{
            $_SESSION['deletenot'] = "Error!! Class not deleted.";
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
                        <a href="se_add_class.php" class="active_link" ><img src="https://img.icons8.com/ios-filled/26/ffffff/google-classroom.png"/>Classes</a>
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
                        <a href="se_add_exam.php"><img src="https://img.icons8.com/ios-filled/25/ffffff/student-registration.png"/> Exams</a>
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
            </button><span class="page-name"> Manage Classes</span>
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
        if(isset($_SESSION['class'])){
            echo "<div class='alert alert-warning alert-dismissible fade show' role='alert'>".$_SESSION['class']."<button class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>";
            unset($_SESSION['class']);
        }
        if(isset($_SESSION['classnot'])){
            echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>".$_SESSION['classnot']."<button class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>";
            unset($_SESSION['classnot']);
        }

        if(isset($_SESSION['delete'])){
            echo "<div class='alert alert-warning alert-dismissible fade show' role='alert'>".$_SESSION['delete']."<button class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>";
            unset($_SESSION['delete']);
        }
        if(isset($_SESSION['deletenot'])){
            echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>".$_SESSION['deletenot']."<button class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>";
            unset($_SESSION['deletenot']);
        }


        ?>
      
    <div class="table-responsive border">
            <table class="table table-hover text-center">
                <thead class="thead-light">
                    <tr>
                        <th>Class Name</th>
                        <th>Division</th>
                        <th>Class Teacher</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <form action="se_addclass.php" method="post">
                     <tr>
                        <th class="py-3 bg-light">
                            <select id="year" name="year" class="form-control">
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
                            <select id="div" name="div" class="form-control">
                                <option value="">--select--</option>
                                <option value="A">A</option>
                                <option value="B">B</option>
                                <option value="C">C</option>
                            </select>
                        </th>
                        <th class="py-3 bg-light">
                            <select id="teach" name="teach" class="form-control">
                                <option value="">--select--</option>
                                <option value="SELVAKUMAR">SELVAKUMAR</option>
                                <option value="PUVI">PUVI</option>
                                <option value="NAGARAJ">NAGARAJ</option>
                            </select>
                        </th>
                        <th class="py-3 bg-light">
                            <button class="btn btn-primary" name="addclass">Add</button>
                        </th>
                    </tr>  
                </form>
                <?php
                $selectclass = "Select * from se_class order by class_id";
                $selectclassquery = mysqli_query($conn, $selectclass);
                if($selectclassquery){
                    while ($row = mysqli_fetch_assoc($selectclassquery)) {
                        echo "<tr>
                        <td>".$row['class_name']."</td>
                        <td>".$row['division']."</td>
                        <td>".$row['class_teacher']."</td>
                        <form method='post'>
                        <td>
                            <button class='btn btn-light px-1 py-0' type='submit' value='".$row['class_id']."' name='deleteclass'>
                                <img src='https://img.icons8.com/color/25/000000/delete-forever.png'/>
                            </button>
                        </td>
                        </form>
                    </tr>";
                    }
                }
                else{
                    echo "<tr><td>No classes available.</td></tr>";
                }
                ?>
                </tbody>
            </table>
        </div>
    </div>
    </div>
</div>
<?php include'footer.php' ?>
<script type="text/javascript">
   
</script>