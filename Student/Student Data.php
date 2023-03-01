<?php

require_once '../models/user/student.php';
session_start();

$student = new Student;

//Filters
    if(isset($_GET['class_filter'])){
        $_SESSION['year'] = $_GET['class_filter'];
    }

    if(isset($_SESSION['year'])){
        if($_SESSION['year'] == '2nd_math' || $_SESSION['year'] == '2nd_mech')
            $_SESSION['year'] = '2nd';
        $student->year = $_SESSION['year'];
    }

    if(isset($_GET['center_filter'])){
        $_SESSION['center'] = $_GET['center_filter'];
    }    
    if(isset($_SESSION['center'])){
        if($student->year == '3rd' && $_SESSION['center'] =='Mayo')
            $_SESSION['center'] = 'Helwan';

        $student->center = $_SESSION['center'];
    }

if(isset($_POST["del"]))
{
    if($_GET['DEL']==2)
    {
        if(!empty($_POST["stuID"]))
        {
            $student->id = $_POST["stuID"];            

            if($student->delete_Student())
            {
                if($student->center)
                    $student_result = $student->view_All_Student_Center_Class();
                
                else
                    $student_result = $student->view_All_Student_Class();
                 
                header('location: Student Data.php');
            }
        }
        $_GET['DEL'] = 0;
    }
}

if($student->center)
    $student_result = $student->view_All_Student_Center_Class();

else
    $student_result = $student->view_All_Student_Class();

?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title><?= $_SESSION['year']; ?> Sec Data</title>

    <!-- Custom fonts for this template -->
    <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="../css/sb-admin-2.min.css" rel="stylesheet">
    <link href="../css/tabelRows.css" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="../vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="../index.php">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div>
                <div class="sidebar-brand-text mx-3">BoB<sup>v1.5</sup></div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link" href="../index.php">
                    <i class="fas fa-home"></i>
                    <span>Home</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Students
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item active">
                <a class="nav-link " href="#" data-toggle="collapse" data-target="#collapse3rd"
                    aria-expanded="true" aria-controls="collapse3rd">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>3rd sec</span>
                </a>
                <div id="collapse3rd" class="collapse show" aria-labelledby="heading3rd" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item active" href="Data.php">Data</a>
                        <a class="collapse-item"        href="3rd Quizzes.php">Quizzes</a>
                        <a class="collapse-item"        href="Grades.php">HomeWork</a>
                        <a class="collapse-item"        href="3rd Attendance.php">Attendance</a>
                        <a class="collapse-item"        href="3rd Exams.php">Exams</a>
                        <!-- <a class="collapse-item"        href="">Notes</a> -->
                    </div>
                </div>
            </li>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapse2ndH"
                    aria-expanded="true" aria-controls="collapse2ndH">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>2nd Sec (Helwan)</span>
                </a>
                <div id="collapse2ndH" class="collapse" aria-labelledby="heading2ndH" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">

                        <a class="collapse-item" href="../2nd/2nd Data.php?place=Helwan">Data</a>

                        <h6 class="collapse-header">Mathematics</h6>
                        <a class="collapse-item" href="../2nd math/2nd Math Quizzes.php?place=Helwan">Quizzes</a>
                        <a class="collapse-item" href="../2nd math/2nd Math HW.php?place=Helwan">HomeWork</a>
                        <a class="collapse-item" href="../2nd math/2nd Math Attendance.php?place=Helwan">Attendance</a>
                        <a class="collapse-item" href="../2nd math/2nd Math Exams.php?place=Helwan">Exams</a>

                        <div class="collapse-divider"></div>

                        <h6 class="collapse-header">Mechanics</h6>
                        <a class="collapse-item" href="../2nd mech/2nd Mech Quizzes.php?place=Helwan">Quizzes</a>
                        <a class="collapse-item" href="../2nd mech/2nd Mech HW.php?place=Helwan">HomeWork</a>
                        <a class="collapse-item" href="../2nd mech/2nd Mech Attendance.php?place=Helwan">Attendance</a>
                        <a class="collapse-item" href="../2nd mech/2nd Mech Exams.php?place=Helwan">Exams</a>
                    </div>
                </div>
            </li>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapse2ndM"
                    aria-expanded="true" aria-controls="collapse2ndM">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>2nd Sec (Mayo)</span>
                </a>
                <div id="collapse2ndM" class="collapse" aria-labelledby="heading2ndM" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">

                        <a class="collapse-item" href="../2nd/2nd Data.php?place=Mayo">Data</a>

                        <h6 class="collapse-header">Mathematics</h6>
                        <a class="collapse-item" href="../2nd math/2nd Math Quizzes.php?place=Mayo">Quizzes</a>
                        <a class="collapse-item" href="../2nd math/2nd Math HW.php?place=Mayo">HomeWork</a>
                        <a class="collapse-item" href="../2nd math/2nd Math Attendance.php?place=Mayo">Attendance</a>
                        <a class="collapse-item" href="../2nd math/2nd Math Exams.php?place=Mayo">Exams</a>

                        <div class="collapse-divider"></div>

                        <h6 class="collapse-header">Mechanics</h6>
                        <a class="collapse-item" href="../2nd mech/2nd Mech Quizzes.php?place=Mayo">Quizzes</a>
                        <a class="collapse-item" href="../2nd mech/2nd Mech HW.php?place=Mayo">HomeWork</a>
                        <a class="collapse-item" href="../2nd mech/2nd Mech Attendance.php?place=Mayo">Attendance</a>
                        <a class="collapse-item" href="../2nd mech/2nd Mech Exams.php?place=Mayo">Exams</a>
                    </div>
                </div>
            </li>
            

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapse1stH"
                    aria-expanded="true" aria-controls="collapse1stH">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>1st sec (Helwan)</span>
                </a>
                <div id="collapse1stH" class="collapse" aria-labelledby="heading1stH" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="../1st/1st Data.php?place=Helwan">Data</a>
                        <a class="collapse-item" href="../1st/1st Quizzes.php?place=Helwan">Quizzes</a>
                        <a class="collapse-item" href="../1st/1st HW.php?place=Helwan">HomeWork</a>
                        <a class="collapse-item" href="../1st/1st Attendance.php?place=Helwan">Attendance</a>
                        <a class="collapse-item" href="../1st/1st Exams.php?place=Helwan">Exams</a>
                    </div>
                </div>
            </li>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapse1stM"
                    aria-expanded="true" aria-controls="collapse1stM">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>1st sec (Mayo)</span>
                </a>
                <div id="collapse1stM" class="collapse" aria-labelledby="heading1stM" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="../1st/1st Data.php?place=Mayo">Data</a>
                        <a class="collapse-item" href="../1st/1st Quizzes.php?place=Mayo">Quizzes</a>
                        <a class="collapse-item" href="../1st/1st HW.php?place=Mayo">HomeWork</a>
                        <a class="collapse-item" href="../1st/1st Attendance.php?place=Mayo">Attendance</a>
                        <a class="collapse-item" href="../1st/1st Exams.php?place=Mayo">Exams</a>
                    </div>
                </div>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Assistants
            </div>
        
            <!-- Nav Item - Tables -->
            <li class="nav-item ">
                <a class="nav-link" href="../assistant/Assistant Student Data.php">
                    <i class="fa fa-users"></i>
                    <span>Assistants Data</span></a>
            </li>
            <!-- Nav Item - Tables -->
            <li class="nav-item ">
                <a class="nav-link" href="../assistant/Availability.php">
                    <i class="far fa-calendar-alt"></i>
                    <span>Assistants Availability</span></a>
            </li>
             
             <!-- Nav Item - Tables -->
             <li class="nav-item ">
                <a class="nav-link" href="../assistant/Assistant History.php">
                    <i class="far fa-clock"></i>
                    <span>Assistants History</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-light navbar-expand bg-white shadow mb-4 topbar static-top" style="padding-left: 0px;padding-bottom: 0px;padding-top: 0px;">
                    <div >
                    <div class="btn-group" style="padding-left: 30px;">
                            <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <?= $_SESSION['year'] ? $_SESSION['year'] : 'Class'  ?>
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item" href="#">Class</a>
                                <a class="dropdown-item <?= $_SESSION['year']=='3rd' ? 'active': '' ?>" href="Student Data.php?class_filter=3rd">3rd</a>
                                <a class="dropdown-item <?= $_SESSION['year']=='2nd' ? 'active': '' ?>" href="Student Data.php?class_filter=2nd">2nd</a>
                                <a class="dropdown-item <?= $_SESSION['year']=='1st' ? 'active': '' ?>" href="Student Data.php?class_filter=1st">1st</a>
                            </div>
                        </div>
                        <div class="btn-group" style="padding-left: 20px;">
                            <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Data
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item active" href="Student Data.php">Data</a>
                                <a class="dropdown-item" href="Grades.php?grade_filter=attendance">Attendance</a>
                                <a class="dropdown-item" href="Grades.php?grade_filter=quiz_grade">Quizzes</a>
                                <a class="dropdown-item" href="Grades.php?grade_filter=hw_grade">Homewok</a>
                                <a class="dropdown-item" href="Grades.php?grade_filter=exam_grade">Exams</a>
                            </div>
                        </div>
                        <div class="btn-group" style="padding-left: 20px;">
                            <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <?= $_SESSION['center'] ? $_SESSION['center'] : 'Center'  ?>
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item <?= !$_SESSION['center'] ? 'active': '' ?>" href="Student Data.php?center_filter=">Center</a>
                                <a class="dropdown-item <?= $_SESSION['center']=='Helwan' ? 'active': '' ?>" href="Student Data.php?center_filter=Helwan">Helwan</a>
                                <a class="dropdown-item <?= $_SESSION['center']=='Mayo' ? 'active': '' ?>" href="Student Data.php?center_filter=Mayo">Mayo</a>
                            </div>
                        </div>
                    </div>
                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                                <h6 class="m-0 font-weight-bold text-primary"><?= $_SESSION['year']; ?> Sec Data <?= $_SESSION['center'] ? '('.$_SESSION['center'].')' : ''; ?></h6>
                                    <a href="Student Data Add.php" class="btn btn-primary btn-icon-split"><span class="icon text-white"><i class="fa fa-user-plus"></i>
                                    </span><span class="text"> New Student</a>
                            </div>
                        </div>
                        
                        <div class="card-body">
                            <div class="table-responsive">
                            <input type="text" id="myInput" onkeyup="search()"
                                placeholder="Search for.." title="Type in a name"
                                style=" width: 100%;
                                        font-size: 16px;
                                        padding: 12px 20px 12px 40px;
                                        border: 1px solid #ddd;
                                        margin-bottom: 12px;">

                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>                                            
                                            <th onclick="sortTable(0)">ID</th>
                                            <th>Name</th>
                                            <th>Personal Num.</th>
                                            <th>Parent Num.1</th>
                                            <th>Parent Num.2</th>
                                            <th>School</th>
                                            <?php if(!$student->center) { ?>
                                            <th>Center</th>
                                            <?php } ?>
                                            <th>Edit</th>                                            
                                        </tr>
                                    </thead>
                                    
                                    <tbody>
                                        <?php 
                                            foreach($student_result as $st){
                                        ?>  
                                            <tr>
                                                <td><?= $st['id'] ?></td>
                                                <td><?= $st['name'] ?></a></td>
                                                <td><?= $st['phone_no'] ?></td>
                                                <td><?= $st['parent_no_1'] ?></td>
                                                <td><?= $st['parent_no_2'] ?></td>
                                                <td><?= $st['school'] ?></td>
                                                <?php if(!$student->center) { ?>
                                                <td><?= $st['center'] ?></td>
                                                <?php } ?>
                                                <td>
                                                    <form action="Student Data Edit.php" method="GET">
                                                        <input type="hidden" name="student_id" value= "<?= $st['id'] ?>">
                                                        <button type="submit" name="" class="btn btn-info btn-user btn-block" ><i class="fas fa-user-edit"></i></button>
                                                    </form>
                                                    <hr>

                                                    <?php
                                                    if(isset($_GET['DEL'])){
                                                        if($_GET['DEL']==1){
                                                    ?>
                                                    <form action="Student Data.php?DEL=2" method="POST" >                                                        
                                                        <input type="hidden" name="stuID" value= "<?= $st['id']?>">
                                                        <button type="submit" name="del" class="btn btn-google btn-user btn-block" ><i class="fas fa-trash-alt"></i></button>
                                                    </form>
                                                    <?php
                                                        }
                                                        else{
                                                            ?>
                                                            <form action="Student Data.php?DEL=1" method="POST" >
                                                                <input type="hidden" name="stuID" value= "<?= $st['id']?>">
                                                                <button type="submit" name="del" class="btn btn-google btn-user btn-block" ><i class="fas fa-trash-alt"></i></button>
                                                            </form>
                                                        <?php
                                                        }
                                                    }
                                                    else{
                                                    ?>
                                                        <form action="Student Data.php?DEL=1" method="POST" >
                                                            <input type="hidden" name="stuID" value= "<?= $st['id']?>">
                                                            <button type="submit" name="del" class="btn btn-google btn-user btn-block" ><i class="fas fa-trash-alt"></i></button>
                                                        </form>
                                                    <?php
                                                    }
                                                    ?>
                                                    
                                                </td>
                                            </tr>       
                                        <?php
                                            }
                                        ?>  

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Done By M.Ragab ;)</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Bootstrap core JavaScript-->
    <script src="../vendor/jquery/jquery.min.js"></script>
    <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="../js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <!-- <script src="../vendor/datatables/jquery.dataTables.min.js"></script> -->
    <script src="../vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="../js/demo/datatables-demo.js"></script>
    <script src="../js/tableFunc.js"></script>

</body>

</html>