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

$assistant = new Assistant;

if(isset($_POST["del"])){
    if($_GET['DEL']==2){
        if(!empty($_POST["date"])){
            $a->date = $_POST["date"];
            if($assisController->deleteAssistantDay($a)){
                $assis = $assisController->viewAllAssistantDay();
                header('location: Assistant History.php');
            }
        }
        $_GET['DEL'] = 0;
    }
}

$assistant_history = $assistant->view_All_assistant_history();

?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>History</title>

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
            <li class="nav-item ">
                <a class="nav-link" href="Availability.php">
                    <i class="far fa-calendar-alt"></i>
                    <span>Assistants Availability</span></a>
            </li>
            
             <!-- Nav Item - Tables -->
             <li class="nav-item active">
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
                                <h5 class="m-0 font-weight-bold text-primary">History</h5>
                                    <a href="Assistant History Add.php" class="btn btn-primary btn-icon-split"><span class="icon text-white">
                                        <i class="fa fa-calendar-plus"></i></span><span class="text">  New Day ?</a>
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
                                            <th onclick="sortTable(0)">Date</th>
                                            <th>Class</th>
                                            <th>Center</th>
                                            <th>Assistant 1</th>
                                            <th>Assistant 2</th>
                                            <th>Assistant 3</th>
                                            <th>Assistant 4</th>
                                            <th>Assistant 5</th>
                                            <th>Assistant 6</th>
                                            <th>Edit</th>
                                            
                                        </tr>
                                    </thead>
                                    
                                    <tbody>
                                        <?php
                                            foreach($assistant_history as $ass)
                                            {   
                                        ?> 
                                        <tr>
                                            <td> <?= $ass['date'] ?> </td>
                                            <td> <?= $ass['year'] ?> </td>
                                            <td> <?= $ass['center'] ?> </td>
                                        <?php
                                                for($i=1;$i<=6;$i++)
                                                {
                                                    if($ass['assistant_'.$i])
                                                    {
                                                        $assistant->id = $ass['assistant_'.$i];
                                                        $ass_result = $assistant->view_1_Assistant();
                                                    }
                                                    else
                                                        $ass_result['name'] = '';
                                        ?>
                                            <td> <?= $ass_result['name'] ?> </td>
                                        <?php        
                                                }
                                        ?>   
                                            <td>
                                                <form action="Assistant History Edit.php" method="GET">
                                                    <input type="hidden" name="date" value= "<?= $assistant_['date']?>">
                                                    <button type="submit" name="edit" class="btn btn-info btn-user btn-block"><i class="fas fa-edit"></i></button>
                                                </form>

                                                <hr>
                                                <?php
                                                if(isset($_GET['DEL']))
                                                {
                                                    if($_GET['DEL']==1)
                                                    {
                                                ?>
                                                <form action="Assistant History.php?DEL=2" method="POST" >                                                        
                                                    <input type="hidden" name="date" value= "<?= $a['date']?>">
                                                    <button type="submit" name="del" class="btn btn-google btn-user btn-block" ><i class="fas fa-trash-alt"></i></button>
                                                </form>
                                                <?php
                                                    }
                                                    else
                                                    {
                                                        ?>
                                                        <form action="Assistant History.php?DEL=1" method="POST" >
                                                            <input type="hidden" name="date" value= "<?= $a['date']?>">
                                                            <button type="submit" name="del" class="btn btn-google btn-user btn-block" ><i class="fas fa-trash-alt"></i></button>
                                                        </form>
                                                    <?php
                                                    }
                                                }
                                                else
                                                {
                                                ?>
                                                    <form action="Assistant History.php?DEL=1" method="POST" >
                                                        <input type="hidden" name="date" value= "<?= $a['date']?>">
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