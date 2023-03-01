<?php
require_once '../models/user/student.php';
session_start();

$student = new Student;

if(isset($_POST['name']) && isset($_POST['id']))
{
    $student->full_name   = $_POST['name'];
    $student->id          = $_POST['id'];
    $student->year        = $_POST['year'];
    $student->center      = $_POST['center'];
    $student->phone_no    = $_POST['personNum'];
    $student->parent_no_1 = $_POST['parentNum1'];
    $student->parent_no_2 = $_POST['parentNum2'];
    $student->school      = $_POST['school'];
    
    if($student->new_Student())
    {
        $_SESSION['year']   = $_POST['year'];
        $_SESSION['center'] = $_POST['center'];
        header("location: Student Data.php");
    }
}

$all_student = $student->view_All_Student();

?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Add New Student !</title>

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
                                <h1 class="h4 text-gray-900 mb-4">Add New Student !</h1>
                            </div>
                            <form class="user "action="Student Data Add.php" method="POST">
                                <div class="form-group ">
                                    <input type="text" class="form-control form-control-user" id="name" name="name" required
                                        placeholder="Student Name">
                                </div>
                                
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <select  style="border-radius: 25px; width:inherit; height:45px; padding: 10px;" id="year" name="year" onchange="updateCenterList()" required >
                                            <option value=''>Year..</option>
                                            <option value="3rd">3rd</option>
                                            <option value="2nd">2nd</option>
                                            <option value="1st">1st</option>
                                        </select>
                                    </div>
                                    <div class="col-sm-6">
                                        <select  style="border-radius: 25px; width:inherit; height:45px; padding: 10px;" id="id" name="id" required >
                                            <option value="">ID...</option>
                                            <?php 
                                            for($i = 1001 ; $i<4000 ; $i++){
                                                $conn = 0;
                                                foreach($all_student as $one_id){
                                                    if($one_id['id'] == $i){
                                                        $conn = 1;
                                                    }
                                                }
                                                if($conn){
                                                    continue ;
                                                }
                                                else{
                                                ?>
                                                    <option><?= $i ?></option>
                                                <?php
                                                }
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <select  style="border-radius: 25px; width:inherit; height:45px; padding: 10px;" id="center" name="center">
                                            <option value="Helwan">Helwan</option>
                                            <option value="Mayo">Mayo</option>
                                        </select>
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control form-control-user"
                                            id="personNum" name="personNum" placeholder="Personal Num.">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="text" class="form-control form-control-user"
                                            id="parentNum1" name="parentNum1" placeholder="Parent Num.1">
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control form-control-user"
                                            id="parentNum2" name="parentNum2" placeholder="Parent Num.2">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user"
                                        id="school" name="school" placeholder="School">
                                </div>
                                
                                
                                <button type="submit" class="btn btn-success btn-user btn-block">
                                    Add Student
                                </button>
                                <hr>
                                <a href="Student Data.php" class="btn btn-google btn-user btn-block">
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
    <script>
        function updateCenterList() {
            var firstList = document.getElementById("year");
            var secondList = document.getElementById("center");
            secondList.innerHTML = "";

            var option0 = document.createElement("option");

            if (firstList.value === "3rd") {
                var option1 = document.createElement("option");
                option1.value = "Helwan";
                option1.text = "Helwan";
                secondList.appendChild(option1);
            } 
            
            else {
                var option1 = document.createElement("option");
                option1.value = "Helwan";
                option1.text = "Helwan";
                secondList.appendChild(option1);
                
                var option2 = document.createElement("option");
                option2.value = "Mayo";
                option2.text = "Mayo";
                secondList.appendChild(option2);
            }
        }
    </script>
</body>

</html>