<?php
require_once '../models/user/assistant.php';
session_start();

$_SESSION['assistant_id'] = $_GET['assistant_id'] ? $_GET['assistant_id'] : '';

$avOld = new Assistant;
$avNew = new Assistant;

$avOld->id = $_SESSION['assistant_id'];
$assistant_result = $avOld->view_1_Availability();

$avOld->full_name           = $assistant_result['assistant_name'];
$avOld->availability['sat'] = $assistant_result['sat'];
$avOld->availability['sun'] = $assistant_result['sun'];
$avOld->availability['mon'] = $assistant_result['mon'];
$avOld->availability['tue'] = $assistant_result['tue'];
$avOld->availability['wed'] = $assistant_result['wed'];
$avOld->availability['thu'] = $assistant_result['thu'];
$avOld->availability['fri'] = $assistant_result['fri'];


if(isset($_GET['edit']))
{
    if(!empty($_GET['edit']))
    {        
        $avNew->availability['sat'] = $_POST['sat']=='OK' ? 1 : 0;
        $avNew->availability['sun'] = $_POST['sun']=='OK' ? 1 : 0;
        $avNew->availability['mon'] = $_POST['mon']=='OK' ? 1 : 0;
        $avNew->availability['tue'] = $_POST['tue']=='OK' ? 1 : 0;
        $avNew->availability['wed'] = $_POST['wed']=='OK' ? 1 : 0;
        $avNew->availability['thu'] = $_POST['thu']=='OK' ? 1 : 0;
        $avNew->availability['fri'] = $_POST['fri']=='OK' ? 1 : 0;

        $avOld->update_Availability($avNew);
        header("location: Availability.php");        
    }
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

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapse3rd"
                    aria-expanded="true" aria-controls="collapse3rd">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>3rd sec</span>
                </a>
                <div id="collapse3rd" class="collapse" aria-labelledby="heading3rd" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="../3rd/3rd Data.php">Data</a>
                        <a class="collapse-item" href="../3rd/3rd Quizzes.php">Quizzes</a>
                        <a class="collapse-item" href="../3rd/3rd HW.php">HomeWork</a>
                        <a class="collapse-item" href="../3rd/3rd Attendance.php">Attendance</a>
                        <a class="collapse-item" href="../3rd/3rd Exams.php">Exams</a>
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
                    <form method="POST" action="Availability Edit.php?assistant_id=<?= $avOld->id ?>&edit=1">
                        <div class="card shadow mb-4">
                            
                            <div class="card-header py-3">
                                <div class="d-sm-flex align-items-center justify-content-between mb-4">
                                    <h5 class="m-0 font-weight-bold text-primary">Edit Assistants Availability</h5>
                                    <button type="submit" class="btn btn-success shadow-sm">
                                        <i class="fas fa-check-circle"></i> Save
                                    </button>
                                    <a href="Availability.php" class="d-none d-sm-inline-block btn btn-google shadow-sm">
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
                                                <th>ID</th>
                                                <th>Assistant</th>
                                                <th>Sat</th>
                                                <th>Sun</th>
                                                <th>Mon</th>
                                                <th>Tue</th>
                                                <th>Wed</th>
                                                <th>Thu</th>
                                                <th>Fri</th>

                                            </tr>
                                        </thead>
                                        
                                        <tbody>
                                            <tr>
                                                <td> <?= $avOld->id ?></td>
                                                <td> <?= $avOld->full_name ?></td>
                                                <!--Saturday-->
                                                <?php
                                                $bg_color = $avOld->availability['sat']? 'green' :'red';
                                                $is_selected = $avOld->availability['sat']? 'selected' :'';                                                
                                                ?>
                                                <td style="background-color:<?= $bg_color ?>; color:white">
                                                    <select style="border-radius: 25px; width:inherit; height:45px; padding: 10px;"                                                                                                                                        
                                                            name="sat" id="sat">
                                                        <option style="background-color:red; color:white" <?= $is_selected ?>>
                                                            NO</option>
                                                        <option style="background-color:green; color:white" <?= $is_selected ?>>
                                                            OK</option>
                                                    </select>
                                                </td>
                                                
                                                <!--Sunday-->
                                                <?php
                                                $bg_color = $avOld->availability['sun']? 'green' :'red';
                                                $is_selected = $avOld->availability['sun']? 'selected' :'';                                                
                                                ?>
                                                <td style="background-color:<?= $bg_color ?>; color:white">
                                                    <select style="border-radius: 25px; width:inherit; height:45px; padding: 10px;"                                                                                                                                        
                                                            name="sun" id="sun">
                                                        <option style="background-color:red; color:white" <?= $is_selected ?>>
                                                            NO</option>
                                                        <option style="background-color:green; color:white" <?= $is_selected ?>>
                                                            OK</option>
                                                    </select>
                                                </td>
                                                <!--Monday-->
                                                <?php
                                                $bg_color = $avOld->availability['mon']? 'green' :'red';
                                                $is_selected = $avOld->availability['mon']? 'selected' :'';                                                
                                                ?>
                                                <td style="background-color:<?= $bg_color ?>; color:white">
                                                    <select style="border-radius: 25px; width:inherit; height:45px; padding: 10px;"                                                                                                                                        
                                                            name="mon" id="mon">
                                                        <option style="background-color:red; color:white" <?= $is_selected ?>>
                                                            NO</option>
                                                        <option style="background-color:green; color:white" <?= $is_selected ?>>
                                                            OK</option>
                                                    </select>
                                                </td>
                                                <!--Tuesday-->
                                                <?php
                                                $bg_color = $avOld->availability['tue']? 'green' :'red';
                                                $is_selected = $avOld->availability['tue']? 'selected' :'';                                                
                                                ?>
                                                <td style="background-color:<?= $bg_color ?>; color:white">
                                                    <select style="border-radius: 25px; width:inherit; height:45px; padding: 10px;"                                                                                                                                        
                                                            name="tue" id="tue">
                                                        <option style="background-color:red; color:white" <?= $is_selected ?>>
                                                            NO</option>
                                                        <option style="background-color:green; color:white" <?= $is_selected ?>>
                                                            OK</option>
                                                    </select>
                                                </td>
                                                <!--Wednesday-->
                                                <?php
                                                $bg_color = $avOld->availability['wed']? 'green' :'red';
                                                $is_selected = $avOld->availability['wed']? 'selected' :'';                                                
                                                ?>
                                                <td style="background-color:<?= $bg_color ?>; color:white">
                                                    <select style="border-radius: 25px; width:inherit; height:45px; padding: 10px;"                                                                                                                                        
                                                            name="wed" id="wed">
                                                        <option style="background-color:red; color:white" <?= $is_selected ?>>
                                                            NO</option>
                                                        <option style="background-color:green; color:white" <?= $is_selected ?>>
                                                            OK</option>
                                                    </select>
                                                </td>
                                                <!--Thuresday-->
                                                <?php
                                                $bg_color = $avOld->availability['thu']? 'green' :'red';
                                                $is_selected = $avOld->availability['thu']? 'selected' :'';                                                
                                                ?>
                                                <td style="background-color:<?= $bg_color ?>; color:white">
                                                    <select style="border-radius: 25px; width:inherit; height:45px; padding: 10px;"                                                                                                                                        
                                                            name="thu" id="thu">
                                                        <option style="background-color:red; color:white" <?= $is_selected ?>>
                                                            NO</option>
                                                        <option style="background-color:green; color:white" <?= $is_selected ?>>
                                                            OK</option>
                                                    </select>
                                                </td>
                                                <!--Friday-->
                                                <?php
                                                $bg_color = $avOld->availability['fri']? 'green' :'red';
                                                $is_selected = $avOld->availability['fri']? 'selected' :'';                                                
                                                ?>
                                                <td style="background-color:<?= $bg_color ?>; color:white">
                                                    <select style="border-radius: 25px; width:inherit; height:45px; padding: 10px;"                                                                                                                                        
                                                            name="fri" id="fri">
                                                        <option style="background-color:red; color:white" <?= $is_selected ?>>
                                                            NO</option>
                                                        <option style="background-color:green; color:white" <?= $is_selected ?>>
                                                            OK</option>
                                                    </select>
                                                </td>
                                                
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

    <!-- Page level custom scripts -->
    <script src="../js/demo/datatables-demo.js"></script>
    <script src="../js/tableFunc.js"></script>


</body>

</html>