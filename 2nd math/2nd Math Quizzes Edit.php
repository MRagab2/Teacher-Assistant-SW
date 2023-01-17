<?php
require_once '../controllers/studentController.php';
require_once '../models/studentQuizzes.php';

$studentController = new StudentControllers;
$center = $_GET['place'];

$studentView = $studentController->viewAll2ndMathStudentQuizzes($center);
$studentEntry = $studentController->viewAll2ndMathStudentQuizzes($center);

$student = new StudentQuizzes;
$student->day    = $_GET['quizDate'];
$student->center = $center;

if(isset($_POST["saveEdit"])){
    foreach($studentEntry as $stEntry){
        if(!empty($_POST[$stEntry['id'].'g'])){

            $student->name  = $stEntry['name'];
            $student->id    = $stEntry['id'];
            $student->class = '2nd sec (Math)';
            $student->grade = trim($_POST[$stEntry['id'].'g']);

            if(!$studentController->newStudentQuizzGrade($student)){
                break ;  
            }
        }
    }
}
if($_GET['edit']){
    header("location: 2nd Math Quizzes.php?place=$center");
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

    <title>2nd sec Math Edit '<?= $student->day ?>' Quiz</title>

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
            <li class="nav-item ">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapse3rd"
                    aria-expanded="true" aria-controls="collapse3rd">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>3rd sec</span>
                </a>
                <div id="collapse3rd" class="collapse " aria-labelledby="heading3rd" data-parent="#accordionSidebar">
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

            <?php if($center == 'Helwan'){
            
            ?>
            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item active">
                <a class="nav-link " href="#" data-toggle="collapse" data-target="#collapse2nd"
                    aria-expanded="true" aria-controls="collapse2nd">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>2nd Sec (Helwan)</span>
                </a>
                <div id="collapse2nd" class="collapse show" aria-labelledby="heading2nd" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">

                        <a class="collapse-item" href="../2nd/2nd Data.php?place=Helwan">Data</a>

                        <h6 class="collapse-header">Mathematics</h6>
                        <a class="collapse-item active" href="2nd Math Quizzes.php?place=Helwan">Quizzes</a>
                        <a class="collapse-item"        href="2nd Math HW.php?place=Helwan">HomeWork</a>
                        <a class="collapse-item"        href="2nd Math Attendance.php?place=Helwan">Attendance</a>
                        <a class="collapse-item"        href="2nd Math Exams.php?place=Helwan">Exams</a>

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
                        <a class="collapse-item" href="2nd Math Quizzes.php?place=Mayo">Quizzes</a>
                        <a class="collapse-item" href="2nd Math HW.php?place=Mayo">HomeWork</a>
                        <a class="collapse-item" href="2nd Math Attendance.php?place=Mayo">Attendance</a>
                        <a class="collapse-item" href="2nd Math Exams.php?place=Mayo">Exams</a>

                        <div class="collapse-divider"></div>

                        <h6 class="collapse-header">Mechanics</h6>
                        <a class="collapse-item" href="../2nd mech/2nd Mech Quizzes.php?place=Mayo">Quizzes</a>
                        <a class="collapse-item" href="../2nd mech/2nd Mech HW.php?place=Mayo">HomeWork</a>
                        <a class="collapse-item" href="../2nd mech/2nd Mech Attendance.php?place=Mayo">Attendance</a>
                        <a class="collapse-item" href="../2nd mech/2nd Mech Exams.php?place=Mayo">Exams</a>
                    </div>
                </div>
            </li>

            <?php }
            else{
                ?>

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
                        <a class="collapse-item" href="2nd Math Quizzes.php?place=Helwan">Quizzes</a>
                        <a class="collapse-item" href="2nd Math HW.php?place=Helwan">HomeWork</a>
                        <a class="collapse-item" href="2nd Math Attendance.php?place=Helwan">Attendance</a>
                        <a class="collapse-item" href="2nd Math Exams.php?place=Helwan">Exams</a>

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
            <li class="nav-item active">
                <a class="nav-link " href="#" data-toggle="collapse" data-target="#collapse2ndM"
                    aria-expanded="true" aria-controls="collapse2ndM">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>2nd Sec (Mayo)</span>
                </a>
                <div id="collapse2ndM" class="collapse show" aria-labelledby="heading2ndM" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">

                        <a class="collapse-item" href="../2nd/2nd Data.php?place=Mayo">Data</a>

                        <h6 class="collapse-header">Mathematics</h6>
                        <a class="collapse-item active" href="2nd Math Quizzes.php?place=Mayo">Quizzes</a>
                        <a class="collapse-item"        href="2nd Math HW.php?place=Mayo">HomeWork</a>
                        <a class="collapse-item"        href="2nd Math Attendance.php?place=Mayo">Attendance</a>
                        <a class="collapse-item"        href="2nd Math Exams.php?place=Mayo">Exams</a>

                        <div class="collapse-divider"></div>

                        <h6 class="collapse-header">Mechanics</h6>
                        <a class="collapse-item" href="../2nd mech/2nd Mech Quizzes.php?place=Mayo">Quizzes</a>
                        <a class="collapse-item" href="../2nd mech/2nd Mech HW.php?place=Mayo">HomeWork</a>
                        <a class="collapse-item" href="../2nd mech/2nd Mech Attendance.php?place=Mayo">Attendance</a>
                        <a class="collapse-item" href="../2nd mech/2nd Mech Exams.php?place=Mayo">Exams</a>
                    </div>
                </div>
            </li>

            <?php
            }
            ?>

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
                <a class="nav-link" href="../assistant/Assistant Data.php">
                    <i class="fa fa-users"></i>
                    <span>Assistants Data</span></a>
            </li>
            <!-- Nav Item - Tables -->
            <li class="nav-item ">
                <a class="nav-link" href="../assistant/Assistant Availability.php">
                    <i class="far fa-calendar-alt"></i>
                    <span>Assistants Availability</span></a>
            </li>
             
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
                    <form method="POST" action="2nd Math Quizzes Edit.php?quizDate=<?= $student->day ?>&edit=1&place=<?=$center?>">
                        <div class="card shadow mb-4">
                            <div class="card-header py-3">
                                <div class="d-sm-flex align-items-center justify-content-between mb-4">
                                    <h6 class="m-0 font-weight-bold text-primary">Edit '<?= $student->day ?>' Quiz...</h6>
                                    <button type="submit" class="btn btn-success shadow-sm" name="saveEdit" id="saveEdit">
                                        <i class="fas fa-check-circle"></i> Save
                                    </button>
                                    <a href="2nd Math Quizzes.php?place=<?=$center?>" class="d-none d-sm-inline-block btn btn-google shadow-sm">
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
                                                <th><?= $student->day ?></th>
                                                
                                            </tr>
                                        </thead>
                                       
                                        <tbody>
                                            <?php
                                            foreach($studentView as $stView){
                                            ?>
                                            <tr>
                                                <td><?= $stView['id'] ?></td>
                                                <td><?= $stView['name'] ?></td>
                                                <?php
                                                    $student->id = $stView['id'];
                                                    $student->class = '2nd sec (Math)';
                                                    $studentGrade = $studentController->viewStudentAllQuizzes($student);
                                                ?>
                                                <td><input type="text" class="form-control form-control-user"
                                                        name="<?=$stView['id'].'g'?>" id="<?=$stView['id'].'g'?>" value="<?= trim($studentGrade["$student->day"])?>" 
                                                            placeholder="Enter Grade" ></td>
                                            <?php
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
    <script>        
        function getNumber(string) {
            const num = (/^\d+$/.test(string) && string.charAt(0) !== '0') ? Number(string) : false;
            return num;
        }        
        
        function myFunction() {
            var input, filter, table, tr, td, i, txtValue;

            input = document.getElementById("myInput");
            filter = input.value.toUpperCase();
            table = document.getElementById("dataTable");
            tr = table.getElementsByTagName("tr");  
            
            if(getNumber(filter)){
                for (i = 0; i < tr.length; i++) {
                    td = tr[i].getElementsByTagName("td")[0];
                    if (td) {
                        txtValue = td.textContent || td.innerText;
                        if (txtValue.toUpperCase().indexOf(filter) > -1) {
                            tr[i].style.display = "";
                        } 
                        else {
                            tr[i].style.display = "none";
                        }
                    }                    
                }
            }
            
            else{
                for (i = 0; i < tr.length; i++) {
                    td = tr[i].getElementsByTagName("td")[1];
                    if (td) {
                        txtValue = td.textContent || td.innerText;
                        if (txtValue.toUpperCase().indexOf(filter) > -1) {
                            tr[i].style.display = "";
                        } 
                        else {
                            tr[i].style.display = "none";
                        }
                    }                        
                }
            }
        }
    </script>
    <script>
    function sortTable(n) {
        var table, rows, switching, i, x, y, shouldSwitch, dir, switchcount = 0;
        table = document.getElementById("dataTable");
        switching = true;

        //Set the sorting direction to ascending:
        dir = "asc"; 

        /*Make a loop that will continue until
        no switching has been done:*/
        while (switching) {
            //start by saying: no switching is done:
            switching = false;
            rows = table.rows;

            /*Loop through all table rows (except the
            first, which contains table headers):*/
            for (i = 1; i < (rows.length - 1); i++) {
                    
                //start by saying there should be no switching:
                shouldSwitch = false;

                /*Get the two elements you want to compare,
                one from current row and one from the next:*/
                x = rows[i].getElementsByTagName("TD")[n];
                y = rows[i + 1].getElementsByTagName("TD")[n];

                /*check if the two rows should switch place,
                based on the direction, asc or desc:*/
                if (dir == "asc") {
                    if (x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase()) {
                        //if so, mark as a switch and break the loop:
                        shouldSwitch= true;
                        break;
                    }
                } 
                else if (dir == "desc") {
                    if (x.innerHTML.toLowerCase() < y.innerHTML.toLowerCase()) {
                        //if so, mark as a switch and break the loop:
                        shouldSwitch = true;
                        break;
                    }
                }
            }
            if (shouldSwitch) {
                /*If a switch has been marked, make the switch
                and mark that a switch has been done:*/
                rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
                switching = true;
                //Each time a switch is done, increase this count by 1:
                switchcount ++;      
            } 
            else {
            /*If no switching has been done AND the direction is "asc",
            set the direction to "desc" and run the while loop again.*/
                if (switchcount == 0 && dir == "asc") {
                    dir = "desc";
                    switching = true;
                }
            }
        }
    }
</script>
    <script src="../js/demo/chart-area-demo.js"></script>
    

</body>

</html>