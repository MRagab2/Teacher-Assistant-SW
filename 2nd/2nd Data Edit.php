<?php


require_once "../models/studentData.php";
require_once "../controllers/studentController.php";

$center = $_GET['place'];

$stOld = new StudentData;
$stOld->id = $_GET['stuID'];
$stOld->center = $center;

$studentController= new StudentControllers;
$student = $studentController->viewStudentData($stOld);

$studentAll = $studentController->viewAll2ndStudentData($center);
$stAll = new StudentData;

$stOld->name        = $student['name'];
$stOld->class       = "2nd sec";
$stOld->lec         = $student['lec'];
$stOld->personNum   = $student['person num'];
$stOld->parentNum1  = $student['parent num1'];
$stOld->parentNum2  = $student['parent num2'];
$stOld->school      = $student['school'];

if(isset($_POST['name']) && isset($_POST['id'])){
    if(!empty($_POST['name']) && !empty($_POST['id'])){
        $stNew = new StudentData;
        
            
        $stNew->class       = '2nd sec';
        $stNew->lec         = $stOld->lec;
        $stNew->name        = $_POST['name'];
        $stNew->id          = $_POST['id'];
        $stNew->parentNum1  = $_POST['parentNum1'];
        $stNew->parentNum2  = $_POST['parentNum2'];
        $stNew->personNum   = $_POST['personNum'];
        $stNew->school      = $_POST['school'];
        $stNew->center      = $center;

        if($studentController->editStudentData($stOld,$stNew)){
            header("location: 2nd Data.php?place=$center");
        }
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

    <title><?= $stOld->name ?> Data Edit</title>

    <!-- Custom fonts for this template-->
    <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="../css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

    <div class="container">

        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
                    <div class="col-lg-7">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Edit Student Data</h1>
                            </div>
                            <form method="POST" action="2nd Data Edit.php?stuID=<?= $stOld->id ?>&place=<?=$center?>" class="user">
                                
                                <div class="form-group ">
                                    <input type="text" class="form-control form-control-user" id="name" name="name"
                                        placeholder="Full Name" value="<?= $stOld->name ?>" required> 
                                </div>

                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <select  style="border-radius: 25px; width:inherit; height:45px; padding: 10px;" id="id" name="id" required>
                                            <option value="">ID..</option>
                                            <?php 
                                            for($i=2001;$i<3000;$i++){
                                                $con = 0;
                                                foreach($studentAll as $stAll){
                                                    if($stAll['id'] == $i){
                                                        if($stOld->id == $i){
                                                            $con =1;
                                                        }
                                                        else{
                                                            $con = 2;
                                                        }
                                                    }
                                                }
                                                switch($con){
                                                    case 1:
                                                    ?>
                                                        <option selected><?= $i ?></option>
                                                    <?php
                                                        break;
                                                    case 2:
                                                        continue 2;
                                                        break;
                                                    case 0:
                                                    ?>
                                                        <option><?= $i ?></option>
                                                    <?php    
                                                        break;
                                                }                                         
                                            }
                                            ?>
                                        </select>
                                    </div>                                

                                    <div class="col-sm-6">
                                        <select  style="border-radius: 25px; width:inherit; height:45px; padding: 10px;" id="lec" name="lec">
                                            <option value="">Lec..</option>
                                            <?php
                                            if($stOld->class == '2nd sec' && $stOld->lec == 'Math'){
                                            ?>
                                                <option selected>2nd(Math)</option>
                                            <?php
                                            }
                                            else{
                                            ?>
                                                <option>2nd(Math)</option>
                                            <?php
                                            }
                                            if($stOld->class == '2nd sec' && $stOld->lec == 'Mech'){
                                            ?>
                                                <option selected>2nd(Mech)</option>
                                            <?php                                                
                                            }
                                            else{
                                            ?>
                                                <option>2nd(Mech)</option>
                                            <?php
                                            }
                                            if($stOld->class == '2nd sec' && !$stOld->lec){
                                            ?>
                                                <option selected>2nd(Both)</option>
                                            <?php
                                            }
                                            else{
                                            ?>
                                                <option >2nd(Both)</option>
                                            <?php
                                            }
                                            ?>
                                        </select>
                                    </div>

                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="text" class="form-control form-control-user"
                                            id="personNum" name="personNum" placeholder="Personal Num." value="<?= $stOld->personNum ?>"> 
                                    </div>

                                    <div class="col-sm-6">
                                        <input type="text" class="form-control form-control-user"
                                            id="parentNum1" name="parentNum1" placeholder="Parent Num.1" value="<?= $stOld->parentNum1 ?>">
                                    </div>

                                </div>
                                
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="text" class="form-control form-control-user"
                                            id="parentNum2" name="parentNum2" placeholder="Parent Num.2" value="<?= $stOld->parentNum2 ?>">
                                    </div>

                                    <div class="col-sm-6">
                                        <input type="text" class="form-control form-control-user"
                                            id="school" name="school" value="<?= $stOld->school ?>" placeholder="School">
                                    </div>

                                </div>

                                <button type="submit" class="btn btn-success btn-user btn-block">
                                    Save
                                </button>
                                <hr>
                                <a href="2nd Data.php?place=<?=$center?>" class="btn btn-google btn-user btn-block">
                                    Cancel
                                </a>
                            </form>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="../vendor/jquery/jquery.min.js"></script>
    <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="../js/sb-admin-2.min.js"></script>

</body>

</html>