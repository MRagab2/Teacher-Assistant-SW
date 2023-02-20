<?php

require_once '../models/user/student.php';
session_start();
echo $_SESSION['year'];
echo $_SESSION['center'];
echo $_SESSION['grade_type'];
echo $_SESSION['student_id'];

$stOld = new Student;
$stNew = new Student;

$stOld->id = $_SESSION['student_id'];


$student_data = $stOld->view_1_Student();

$stOld->full_name   = $student_data['name'];
$stOld->year        = $student_data['year'];
$stOld->center      = $student_data['center'];
$stOld->phone_no    = $student_data['phone_no'];
$stOld->parent_no_1 = $student_data['parent_no_1'];
$stOld->parent_no_2 = $student_data['parent_no_2'];
$stOld->school      = $student_data['school'];

if(isset($_POST['student_name']) && isset($_POST['student_id'])){
    if(!empty($_POST['student_name']) && !empty($_POST['student_id'])){
        
        $stNew->full_name   = $_POST['student_name'];
        $stNew->id          = $_POST['student_id'];
        $stNew->phone_no    = $_POST['personNum'];
        $stNew->parent_no_1 = $_POST['parentNum1'];
        $stNew->parent_no_2 = $_POST['parentNum2'];
        $stNew->school      = $_POST['school'];

        $stOld->update_Student($stNew);
        header("location: Data.php");
    }
}

$all_student = $stOld->view_All_Student();

?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title><?= $stOld->full_name ?> Data Edit</title>

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
                            <form method="POST" action="Data Edit.php" class="user">
                                
                                <div class="form-group ">
                                    <input type="text" class="form-control form-control-user" id="student_name" name="student_name"
                                        placeholder="Full Name" value="<?= $stOld->full_name ?>" required> 
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <select style="border-radius: 25px; width:inherit; height:45px; padding: 10px;" id="student_id" name="student_id" required>
                                            <option value="">ID..</option>
                                            <?php 
                                                for($i=1001;$i<4000;$i++){
                                                    $conn = 0;
                                                    foreach($all_student as $one_id){
                                                        if($one_id['id'] == $i){
                                                            if($stOld->id == $i){
                                                                $conn =1;
                                                            }
                                                            else{
                                                                $conn = 2;
                                                            }
                                                        }
                                                    }
                                                    switch($conn){
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
                                        <input type="text" class="form-control form-control-user"
                                                id="personNum" name="personNum" placeholder="Personal Num." value="<?= $stOld->phone_no ?>">
                                    </div>

                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="text" class="form-control form-control-user"
                                                id="parentNum1" name="parentNum1" placeholder="Parent Num.1" value="<?= $stOld->parent_no_1 ?>">
                                    </div>

                                    <div class="col-sm-6">
                                    <input type="text" class="form-control form-control-user"
                                                id="parentNum2" name="parentNum2" placeholder="Parent Num.2" value="<?= $stOld->parent_no_2 ?>">
                                    </div>

                                </div>
                                
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user"
                                            id="school" name="school" value="<?= $stOld->school ?>" placeholder="School">
                                </div>

                                <button type="submit" class="btn btn-success btn-user btn-block">
                                    Save
                                </button>
                                <hr>
                                <a href="Data.php" class="btn btn-google btn-user btn-block">
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