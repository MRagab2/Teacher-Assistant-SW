<?php

require_once 'controllers/studentController.php';
require_once 'models/studentAttendance.php';
require_once 'models/studentExams.php';
require_once 'models/studentQuizzes.php';
require_once 'models/studentHW.php';

$studentController = new StudentControllers;
$stA = new StudentAttendance;
$stE = new StudentExams;
$stQ = new StudentQuizzes;
$stH = new StudentHW;

$id = $_GET['stID'];
$class = $_GET['class'];
$sClass = $_GET['subClass'];
if(isset($_GET['place'])){
    $center = $_GET['place'];
}



switch($class){
    case '3rd sec':
        $stA->class = '3rd sec';
        $stE->class = '3rd sec';
        $stQ->class = '3rd sec';
        $stH->class = '3rd sec';
        $days = $studentController->viewAll3rdAttendance();
        $quizzes = $studentController->viewAll3rdQuizzes();
        $exams = $studentController->viewAll3rdExams();
        $homes = $studentController->viewAll3rdHW();

        break;
    case '2nd sec':
        switch($sClass){
            case'Math':
                $stA->class = '2nd sec (Math)';
                $stE->class = '2nd sec (Math)';
                $stQ->class = '2nd sec (Math)';
                $stQ->class = '2nd sec (Math)';
                $days = $studentController->viewAll2ndMathAttendance($center);
                $quizzes = $studentController->viewAll2ndMathQuizzes($center);
                $exams = $studentController->viewAll2ndMathExams($center);
                $homes = $studentController->viewAll2ndMathHW($center);

                break;

            case'Mech':
                $stA->class = '2nd sec (Mech)';
                $stE->class = '2nd sec (Mech)';
                $stQ->class = '2nd sec (Mech)';
                $stQ->class = '2nd sec (Mech)';
                $days = $studentController->viewAll2ndMechAttendance($center);  
                $quizzes = $studentController->viewAll2ndMechQuizzes($center);
                $exams = $studentController->viewAll2ndMechExams($center);
                $homes = $studentController->viewAll2ndMechHW($center);

                break;
        }
        break;
    case '1st sec':
        $stA->class = '1st sec';
        $stE->class = '1st sec';
        $stQ->class = '1st sec';
        $stH->class = '1st sec';
        $days = $studentController->viewAll1stAttendance($center);
        $quizzes = $studentController->viewAll1stQuizzes($center);
        $exams = $studentController->viewAll1stExams($center);
        $homes = $studentController->viewAll1stHW($center);

        break;
    
}
$stA->id = $id;
$stE->id = $id;
$stQ->id = $id;
$stH->id = $id;
if($center){
    $stA->center = $center;
    $stE->center = $center;
    $stQ->center = $center;
    $stH->center = $center;
}

$studentA = $studentController->viewStudentAllAttendance($stA);
$studentE = $studentController->viewStudentAllExams($stE);
$studentQ = $studentController->viewStudentAllQuizzes($stQ);
$studentH = $studentController->viewStudentAllHW($stH);


?>

<!DOCTYPE html>
<html lang="en">

<script
        src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js">
    </script>

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Student Details</title>

    <!-- Custom fonts for this template -->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

    

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div>
                <div class="sidebar-brand-text mx-3">BoB<sup>v1.4</sup></div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="index.php">
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
            <li class="nav-item ">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapse3rd"
                    aria-expanded="true" aria-controls="collapse3rd">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>3rd sec</span>
                </a>
                <div id="collapse3rd" class="collapse " aria-labelledby="heading3rd" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="3rd/3rd Data.php">Data</a>
                        <a class="collapse-item" href="3rd/3rd Quizzes.php">Quizzes</a>
                        <a class="collapse-item" href="3rd/3rd HW.php">HomeWork</a>
                        <a class="collapse-item" href="3rd/3rd Attendance.php">Attendance</a>
                        <a class="collapse-item" href="3rd/3rd Exams.php">Exams</a>
                        <!-- <a class="collapse-item" href="">Notes</a> -->
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

                        <a class="collapse-item" href="2nd/2nd Data.php?place=Helwan">Data</a>

                        <h6 class="collapse-header">Mathematics</h6>
                        <a class="collapse-item" href="2nd math/2nd Math Quizzes.php?place=Helwan">Quizzes</a>
                        <a class="collapse-item" href="2nd math/2nd Math HW.php?place=Helwan">HomeWork</a>
                        <a class="collapse-item" href="2nd math/2nd Math Attendance.php?place=Helwan">Attendance</a>
                        <a class="collapse-item" href="2nd math/2nd Math Exams.php?place=Helwan">Exams</a>

                        <div class="collapse-divider"></div>

                        <h6 class="collapse-header">Mechanics</h6>
                        <a class="collapse-item" href="2nd mech/2nd Mech Quizzes.php?place=Helwan">Quizzes</a>
                        <a class="collapse-item" href="2nd mech/2nd Mech HW.php?place=Helwan">HomeWork</a>
                        <a class="collapse-item" href="2nd mech/2nd Mech Attendance.php?place=Helwan">Attendance</a>
                        <a class="collapse-item" href="2nd mech/2nd Mech Exams.php?place=Helwan">Exams</a>
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

                        <a class="collapse-item" href="2nd/2nd Data.php?place=Mayo">Data</a>

                        <h6 class="collapse-header">Mathematics</h6>
                        <a class="collapse-item" href="2nd math/2nd Math Quizzes.php?place=Mayo">Quizzes</a>
                        <a class="collapse-item" href="2nd math/2nd Math HW.php?place=Mayo">HomeWork</a>
                        <a class="collapse-item" href="2nd math/2nd Math Attendance.php?place=Mayo">Attendance</a>
                        <a class="collapse-item" href="2nd math/2nd Math Exams.php?place=Mayo">Exams</a>

                        <div class="collapse-divider"></div>

                        <h6 class="collapse-header">Mechanics</h6>
                        <a class="collapse-item" href="2nd mech/2nd Mech Quizzes.php?place=Mayo">Quizzes</a>
                        <a class="collapse-item" href="2nd mech/2nd Mech HW.php?place=Mayo">HomeWork</a>
                        <a class="collapse-item" href="2nd mech/2nd Mech Attendance.php?place=Mayo">Attendance</a>
                        <a class="collapse-item" href="2nd mech/2nd Mech Exams.php?place=Mayo">Exams</a>
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
                        <a class="collapse-item" href="1st/1st Data.php?place=Helwan">Data</a>
                        <a class="collapse-item" href="1st/1st Quizzes.php?place=Helwan">Quizzes</a>
                        <a class="collapse-item" href="1st/1st HW.php?place=Helwan">HomeWork</a>
                        <a class="collapse-item" href="1st/1st Attendance.php?place=Helwan">Attendance</a>
                        <a class="collapse-item" href="1st/1st Exams.php?place=Helwan">Exams</a>
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
                        <a class="collapse-item" href="1st/1st Data.php?place=Mayo">Data</a>
                        <a class="collapse-item" href="1st/1st Quizzes.php?place=Mayo">Quizzes</a>
                        <a class="collapse-item" href="1st/1st HW.php?place=Mayo">HomeWork</a>
                        <a class="collapse-item" href="1st/1st Attendance.php?place=Mayo">Attendance</a>
                        <a class="collapse-item" href="1st/1st Exams.php?place=Mayo">Exams</a>
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
                <a class="nav-link" href="assistant/Assistant Data.php">
                    <i class="fa fa-users"></i>
                    <span>Assistants Data</span></a>
            </li>
            
            <!-- Nav Item - Tables -->
            <li class="nav-item ">
                <a class="nav-link" href="assistant/Availability.php">
                    <i class="far fa-calendar-alt"></i>
                    <span>Assistants Availability</span></a>
            </li>
             <!-- Nav Item - Tables -->
             <li class="nav-item ">
                <a class="nav-link" href="assistant/Assistant History.php">
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
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">
                
                    <!-- DataTales Quizzes -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                                <h3 class="m-0 font-weight-bold text-primary">Quizzes</h3>
                                
                                <a href="javascript:history.back()" class="d-none d-sm-inline-block btn btn-google shadow-sm">
                                    Back <i class="fas fa-arrow-right"></i></a>
                            </div>
                        </div>                                                     
                                           
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>ID</th>
                                            <?php
                                            foreach($quizzes as $q){
                                                ?>
                                                    <th><?= $q['0'] ?></th>
                                                <?php
                                            }
                                            ?>
                                        </tr>
                                    </thead>
                                    
                                    <tbody>
                                        <tr>
                                            <td><?= $studentQ['name'] ?></td>
                                            <td><?= $studentQ['id'] ?></td>
                                            <?php
                                            foreach($quizzes as $q){
                                            ?>
                                                <td><?= $studentQ["$q[0]"] ?></td>
                                            <?php
                                            }
                                        ?>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    
                    </div>

                    <!-- DataTales Exams -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                                <h6 class="m-0 font-weight-bold text-primary">Exams</h6>
                            </div>
                        </div>
                        
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>ID</th>
                                            <?php
                                            foreach($exams as $ex){
                                            ?>
                                                <th><?= $ex['0'] ?></th>
                                            <?php
                                            }
                                            ?>
                                        </tr>
                                    </thead>
                                    
                                    <tbody>
                                        <tr>
                                            <td><?= $studentE['name'] ?></td>
                                            <td><?= $studentE['id'] ?></td>
                                            <?php
                                            foreach($exams as $ex){
                                            ?>
                                                <td><?= $studentE["$ex[0]"] ?></td>
                                            <?php
                                            }
                                        ?>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                
                    <!-- DataTales Attendance -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                                <h6 class="m-0 font-weight-bold text-primary">Attendance</h6>
                            </div>
                        </div>
                        
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>ID</th>
                                            <?php
                                            foreach($days as $da){
                                                ?>
                                                    <th><?= $da['0'] ?></th>
                                                <?php
                                            }
                                            ?>
                                        </tr>
                                    </thead>
                                    
                                    <tbody>
                                    
                                        <tr>
                                            <td><?= $studentA['name'] ?></td>
                                            <td><?= $studentA['id'] ?></td>
                                            <?php
                                            foreach($days as $da){
                                                if($studentA["$da[0]"] == 'Yes'){
                                                ?>
                                                    <td style="background-color:green; color:white"><?= $studentA["$da[0]"] ?></td>
                                                <?php
                                                }
                                                else {
                                                    if($studentA["$da[0]"] == 'No'){
                                                    ?>
                                                        <td style="background-color:red; color:white"><?= $studentA["$da[0]"] ?></td>
                                                    <?php
                                                    }
                                                    else{
                                                    ?>
                                                        <td><?= $studentA["$da[0]"] ?></td>
                                                    <?php
                                                    }
                                                }
                                            }
                                            ?>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <!-- DataTales HomeWork -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                                <h6 class="m-0 font-weight-bold text-primary">HomeWork</h6>
                            </div>
                        </div>
                        
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>ID</th>
                                            <?php
                                            foreach($homes as $ho){
                                                ?>
                                                    <th><?= $ho['0'] ?></th>
                                                <?php
                                            }
                                            ?>
                                        </tr>
                                    </thead>
                                    
                                    <tbody>
                                    
                                        <tr>
                                            <td><?= $studentH['name'] ?></td>
                                            <td><?= $studentH['id'] ?></td>
                                            <?php
                                            foreach($homes as $ho){
                                                if($studentH["$ho[0]"] == 'A+'){
                                                ?>
                                                    <td style="background-color:#00ff00; color:black"><?= $studentH["$ho[0]"] ?></td>
                                                <?php
                                                }
                                                else if($studentH["$ho[0]"] == 'A'){
                                                ?>
                                                    <td style="background-color:#008000; color:white"><?= $studentH["$ho[0]"] ?></td>
                                                <?php
                                                }
                                                else if($studentH["$ho[0]"] == 'B'){
                                                ?>
                                                    <td style="background-color:#ffff99; color:black"><?= $studentH["$ho[0]"] ?></td>
                                                <?php
                                                }
                                                else if($studentH["$ho[0]"] == 'C'){
                                                ?>
                                                    <td style="background-color:#ffff00; color:black"><?= $studentH["$ho[0]"] ?></td>
                                                <?php
                                                }
                                                else if($studentH["$ho[0]"] == 'D'){
                                                ?>
                                                    <td style="background-color:#ff9933; color:black"><?= $studentH["$ho[0]"] ?></td>
                                                <?php
                                                }
                                                else if($studentH["$ho[0]"] == 'F'){
                                                ?>
                                                    <td style="background-color:#ff0000; color:black"><?= $studentH["$ho[0]"] ?></td>
                                                <?php
                                                }
                                                else{
                                                ?>
                                                    <td><?= $studentH["$ho[0]"] ?></td>
                                                <?php
                                                }
                                                
                                            }
                                            ?>
                                        </tr>
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
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/datatables-demo.js"></script>
    <script src="charts/ch.js"></script>


</body>

</html>