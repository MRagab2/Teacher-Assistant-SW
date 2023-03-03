<?php

require_once '../models/user/student.php';
require_once '../models/work/student_work.php';
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
    header('location: Grades.php');
}

$student_grade = new Student_Work();
$student = new Student();

$student_grade->year   = $_SESSION['year'];
$student_grade->center = $_SESSION['center'];
$student_grade->type   = $_SESSION['grade_type'];

$student->center = $_SESSION['center'];
$student->year   = $_SESSION['year'];

$student_result = $student_grade->view_grades();


$student_grade->date = $_GET['dayDate'];       

if(isset($_POST["saveEdit"])){
    foreach($student_result as $student_id){

        if(!empty($_POST[$student_id['student_id']])){

            $student->id  = $student_id['student_id'];

            if($_POST[$student_id['student_id']] != " ")
                if(is_numeric(trim($_POST[$student_id['student_id']])))
                    $student_grade->grade = trim($_POST[$student_id['student_id']]);
                else
                    $student_grade->grade = "'".trim($_POST[$student_id['student_id']])."'";
                
            $student_grade->add_1_grade($student);
        }        
    }
}
if($_GET['edit']){
    header("location: Grades.php");
}
 
//Get Dates
$all_days = array();
if($student_result){
    $all_days = array_keys($student_result[0]);
    $all_days = \array_diff($all_days,['student_name','student_id',$_GET['dayDate']]);
    rsort($all_days);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title><?= $_SESSION['year'] ?> Sec Edit '<?= $_GET['dayDate']."'s ".$_SESSION['grade_type'] ?> Attendance</title>

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
                <a class="nav-link" href="../assistant/Assistant Data.php">
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
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- DataTales Example -->
                    <form method="POST" action="Grades Edit.php?dayDate=<?= $_GET['dayDate'] ?>&edit=1">
                        <div class="card shadow mb-4">
                            <div class="card-header py-3">
                                <div class="d-sm-flex align-items-center justify-content-between mb-4">
                                    <h6 class="m-0 font-weight-bold text-primary">Edit '<?= $_GET['dayDate'] ?>'s <?= $_SESSION['grade_type']?>...</h6>
                                    <button type="submit" class="btn btn-success shadow-sm" name="saveEdit" id="saveEdit">
                                        <i class="fas fa-check-circle"></i> Save
                                    </button>
                                    <a href="Grades.php" class="d-none d-sm-inline-block btn btn-google shadow-sm">
                                        <i class="fas fa-ban"></i> Cancel </a>
                                        
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
                                                <th>Name</th>
                                                <th><?= $_GET['dayDate'] ?></th>
                                                <?php
                                            foreach($all_days as $day){
                                                ?>
                                                    <th><?= $day ?></th>
                                                <?php
                                            }
                                            ?>
                                            </tr>
                                        </thead>
                                       
                                        <tbody>
                                            <?php
                                            foreach($student_result as $st){
                                            ?>
                                            <tr>
                                                <td><?= $st['student_id'] ?></td>
                                                <td><?= $st['student_name'] ?></td>
                                                <?php
                                                    $student->id = $st['student_id'];
                                                    
                                                    $single_result = $student->view_1_Student_1_Grade($_SESSION['grade_type'],$_GET['dayDate']);
                                                ?>
                                                <td style="color:white; background-color:
                                                        <?php
                                                        foreach($single_result as $sr)
                                                            switch (trim($sr[$_GET['dayDate']])) {
                                                                case 'A+':
                                                                    echo '#00ff00';
                                                                    break;
                                                                case 'A':
                                                                    echo '#008000';
                                                                    break;
                                                                case 'B':
                                                                    echo '#ffff99';
                                                                    break;
                                                                case 'C':
                                                                    echo '#ffff00';
                                                                    break;
                                                                case 'D':
                                                                    echo '#ff9933';
                                                                    break;
                                                                case 'F':
                                                                    echo '#ff0000';
                                                                    break;
                                                                case 'Yes':
                                                                    echo 'green';
                                                                    break;
                                                                case 'No':
                                                                    echo 'red';
                                                                    break;
                                                                default:
                                                                    echo 'white'; 
                                                            }                                                                    
                                                        ?>
                                                    ">     
                                                        <?php 
                                                        switch ($_SESSION['grade_type']){
                                                            case 'attendance':
                                                        ?>
                                                            <select style="border-radius: 25px; width:inherit; height:45px; padding: 10px;"                                                                                                                                        
                                                                    name="<?=$st['student_id']?>" id="<?= $st['student_id']?>">

                                                                <option value=" "> yes / no </option>
                                                                <?php
                                                                    foreach($single_result as $sr)
                                                                ?>
                                                                <option style="background-color:green; color:white" <?= trim($sr[$_GET['dayDate']]) == 'Yes' ? 'selected':'' ?>>
                                                                    Yes</option>
                                                        
                                                                <option style="background-color:red; color:white" <?= trim($sr[$_GET['dayDate']]) == 'No' ? 'selected':'' ?>>
                                                                    No</option>
                                                        <?php
                                                                break;
                                                            case 'hw_grade':
                                                        ?>
                                                            <select style="border-radius: 25px; width:inherit; height:45px; padding: 10px;"                                                                                                                                        
                                                                    name="<?=$st['student_id']?>" id="<?= $st['student_id']?>">
                                                                
                                                                <option value=" "> Grade </option>
                                                                <option style="background-color:#00ff00; color:black" <?= trim($sr[$_GET['dayDate']]) == 'A+' ? 'selected':'' ?>>
                                                                        A+</option>
                                                                <option style="background-color:#008000; color:white" <?= trim($sr[$_GET['dayDate']]) == 'A' ? 'selected':'' ?>>
                                                                        A</option>
                                                                <option style="background-color:#ffff99; color:black" <?= trim($sr[$_GET['dayDate']]) == 'B' ? 'selected':'' ?>>
                                                                        B</option>
                                                                <option style="background-color:#ffff00; color:black" <?= trim($sr[$_GET['dayDate']]) == 'C' ? 'selected':'' ?>>
                                                                        C</option>
                                                                <option style="background-color:#ff9933; color:black" <?= trim($sr[$_GET['dayDate']]) == 'D' ? 'selected':'' ?>>
                                                                        D</option>
                                                                <option style="background-color:#ff0000; color:black" <?= trim($sr[$_GET['dayDate']]) == 'F' ? 'selected':'' ?>>
                                                                        F</option>
                                                                <option style="background-color:#333333; color:white" <?= trim($sr[$_GET['dayDate']]) == 'No HW' ? 'selected':'' ?>>
                                                                        No HW</option>
                                                        <?php
                                                                break;
                                                            default:
                                                        ?>
                                                            <input type="text" class="form-control form-control-user"
                                                                    name="<?=$st['student_id']?>" id="<?= $st['student_id']?>" value="<?= trim($sr[$_GET['dayDate']])?>" 
                                                                    placeholder="Enter Grade" >
                                                    <?php

                                                    }
                                                    ?>
                                                            
                                                            
                                                    </select>
                                                </td>
                                            <?php
                                                foreach($all_days as $day){

                                                    switch($st[$day]){
                                                        case 'A+':
                                                            ?>
                                                            <td style="background-color:#00ff00; color:black"><?= $st[$day] ?></td>
                                                            <?php
                                                            break;
                                                        case 'A':
                                                            ?>
                                                            <td style="background-color:#008000; color:white"><?= $st[$day] ?></td>
                                                            <?php
                                                            break;
                                                        case 'B':
                                                            ?>
                                                            <td style="background-color:#ffff99; color:black"><?= $st[$day] ?></td>
                                                            <?php
                                                            break;
                                                        case 'C':
                                                            ?>
                                                            <td style="background-color:#ffff00; color:black"><?= $st[$day] ?></td>
                                                            <?php
                                                            break;
                                                        case 'D':
                                                            ?>
                                                            <td style="background-color:#ff9933; color:black"><?= $st[$day] ?></td>
                                                            <?php
                                                            break;
                                                        case 'F':
                                                            ?>
                                                            <td style="background-color:#ff0000; color:black"><?= $st[$day] ?></td>
                                                            <?php
                                                            break;
                                                        case 'No HW':
                                                            ?>
                                                            <td style="background-color:#333333; color:white"><?= $st[$day] ?></td>
                                                            <?php
                                                            break;
                                                        case 'Yes':
                                                            ?>
                                                            <td style="background-color:green; color:white"><?= $st[$day] ?></td>
                                                            <?php
                                                            break;
                                                        case 'No':
                                                            ?>
                                                            <td style="background-color:red; color:white"><?= $st[$day] ?></td>
                                                            <?php
                                                            break;
                                                        default:
                                                            ?>
                                                            <td><?= $st[$day] ?></td>
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
                    </form>
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
    <script src="../vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="../js/demo/datatables-demo.js"></script>
    <script src="../js/demo/chart-area-demo.js"></script>
    <script src="../js/tableFunc.js"></script>    

</body>

</html>