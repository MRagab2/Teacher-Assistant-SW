<?php
require_once '../models/user/assistant.php';
session_start();

if(isset($_GET['goto']))
{
    switch ($_GET['goto']) {
        case 'attendance':
            $_SESSION['grade_type'] = 'attendance';
            break;
        case 'quiz':
            $_SESSION['grade_type'] = 'quiz_grade';
            break;
        case 'hw':
            $_SESSION['grade_type'] = 'hw_grade';
            break;
        case 'exam':
            $_SESSION['grade_type'] = 'exam_grade';
            break;
    }
    header('location: ..\Student\Grades.php');
}

$ass_availability = new Assistant;

$assistant_result = $ass_availability->view_All_Availability();

?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Assistants Availability</title>

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

            <li class="nav-item">
                <a class="nav-link" href="../Student/Student Data.php">
                    <i class="fa fa-users"></i>
                    <span>Student Data</span></a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="?goto=attendance">
                    <i class="fa fa-users"></i>
                    <span>Student Attendance</span></a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="?goto=quiz">
                    <i class="fa fa-users"></i>
                    <span>Student Quizzes</span></a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="?goto=hw">
                    <i class="fa fa-users"></i>
                    <span>Student HomeWorks</span></a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="?goto=exam">
                    <i class="fa fa-users"></i>
                    <span>Student Exams</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Assistants
            </div>
        
            <!-- Nav Item - Tables -->
            <li class="nav-item ">
                <a class="nav-link" href="Assistant Data.php">
                    <i class="fa fa-users"></i>
                    <span>Assistants Data</span></a>
            </li>
             <!-- Nav Item - Tables -->
             <li class="nav-item active">
                <a class="nav-link" href="Availability.php">
                    <i class="far fa-calendar-alt"></i>
                    <span>Assistants Availability</span></a>
            </li>
            
             <!-- Nav Item - Tables -->
             <li class="nav-item ">
                <a class="nav-link" href="Assistant History.php">
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

                    <!-- DataTales Example -->
                    
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                                <h5 class="m-0 font-weight-bold text-primary">Assistants Availability</h5>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                            <input type="text" id="myInput" onkeyup="myFunction()"
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
                                            <th>Assistant</th>
                                            <th>Sat</th>
                                            <th>Sun</th>
                                            <th>Mon</th>
                                            <th>Tue</th>
                                            <th>Wed</th>
                                            <th>Thu</th>
                                            <th>Fri</th>
                                            <th>Edit</th>
                                        </tr>
                                    </thead>
                                    
                                    <tbody>
                                        <?php
                                            foreach($assistant_result as $ass){
                                                $ass_availability->id = $ass['assistant_id'];
                                                $ass_result = $ass_availability->view_1_Assistant()
                                        ?>
                                            
                                        <tr>                                            
                                            <td> <?= $ass['assistant_id'] ?></td>
                                            <td> <?= $ass_result['name'] ?></td>
                                            <!--Saturday-->
                                        <?php
                                                $bg_color = $ass['sat']? 'green' :'red';
                                                $availability = $ass['sat']? 'OK' :'NO';
                                        ?>
                                            <td style="background-color:<?= $bg_color ?>; color:white"> <?= $availability ?></td>
                                            
                                            <!--Sunday-->
                                        <?php
                                                $bg_color = $ass['sun']? 'green' :'red';
                                                $availability = $ass['sun']? 'OK' :'NO';
                                        ?>
                                            <td style="background-color:<?= $bg_color ?>; color:white"> <?= $availability ?></td>
                                            
                                            <!--Monday-->
                                        <?php
                                                $bg_color = $ass['mon']? 'green' :'red';
                                                $availability = $ass['mon']? 'OK' :'NO';
                                        ?>
                                            <td style="background-color:<?= $bg_color ?>; color:white"> <?= $availability ?></td>
                                            
                                            <!--Tuesday-->
                                        <?php
                                                $bg_color = $ass['tue']? 'green' :'red';
                                                $availability = $ass['tue']? 'OK' :'NO';
                                        ?>
                                            <td style="background-color:<?= $bg_color ?>; color:white"> <?= $availability ?></td>
                                            
                                            <!--Wednesday-->
                                        <?php
                                                $bg_color = $ass['wed']? 'green' :'red';
                                                $availability = $ass['wed']? 'OK' :'NO';
                                            ?>
                                            <td style="background-color:<?= $bg_color ?>; color:white"> <?= $availability ?></td>
                                            
                                            <!--Thuresday-->
                                        <?php
                                                $bg_color = $ass['thu']? 'green' :'red';
                                                $availability = $ass['thu']? 'OK' :'NO';
                                        ?>
                                            <td style="background-color:<?= $bg_color ?>; color:white"> <?= $availability ?></td>
                                            
                                            <!--Friday-->
                                        <?php
                                                $bg_color = $ass['fri']? 'green' :'red';
                                                $availability = $ass['fri']? 'OK' :'NO';
                                        ?>
                                            <td style="background-color:<?= $bg_color ?>; color:white"> <?= $availability ?></td>
                                            
                                            <th>
                                                <form action="Availability Edit.php" method="GET">
                                                    <input type="hidden" name="assistant_id" value= "<?= $ass['assistant_id']?>">
                                                    <button type="submit" name="edit" class="btn btn-info btn-user btn-block"><i class="fas fa-edit"></i></button>
                                                </form>
                                            </th>
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