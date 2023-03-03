<?php

require_once '../models/user/assistant.php';
session_start();

$assistant = new Assistant;



if (isset($_POST['date']) && isset($_POST['class']) && isset($_POST['center'])){
    if (!empty($_POST['date']) && !empty($_POST['class']) && !empty($_POST['center'])){
        $ah = new AssisHitory;
        $signUp = new AssisController;

        $ah->date   = $_POST['date'];
        $ah->class  = $_POST['class'];
        $ah->assis1 = $_POST['assis1'];
        $ah->assis2 = $_POST['assis2'];
        $ah->assis3 = $_POST['assis3'];
        $ah->assis4 = $_POST['assis4'];
        $ah->assis5 = $_POST['assis5'];
        $ah->assis6 = $_POST['assis6'];

        if($signUp->newAssistantDay($ah)){
            header("location: Assistant History.php");
        }
    }
}
$assis = $assisController->viewAllAssistantData();
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Add New Day !</title>

    <!-- Custom fonts for this template-->
    <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="../css/sb-admin-2.min.css" rel="stylesheet">
    <link href="../css/tabelRows.css" rel="stylesheet">

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
                                <h1 class="h4 text-gray-900 mb-4">New Day !</h1>
                            </div>
                            <form action="Assistant History Add.php" method="POST" class="user">
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="date" class="form-control form-control-user" id="date" name="date" required>
                                    </div>

                                    <div class="col-sm-6">
                                        <select  style="border-radius: 25px; width:inherit; height:45px; padding: 10px;" id="class" name="class" required>
                                            <option value="">Class..</option>
                                            <option>3rd Sec</option>
                                            <option>2nd Sec (Math)</option>
                                            <option>2nd Sec (Mech)</option>
                                            <option>1st Sec</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-sm-6">
                                        <select  style="border-radius: 25px; width:inherit; height:45px; padding: 10px;" id="assis1" name="assis1" required>
                                            <option value="">Assistant 1..</option>
                                            <?php
                                                foreach($assis as $a){
                                                    ?>
                                                    <option><?= $a['name'] ?></option>
                                                    <?php
                                                }
                                            ?>
                                        </select>
                                    </div>

                                    <div class="col-sm-6">
                                        <select  style="border-radius: 25px; width:inherit; height:45px; padding: 10px;" id="assis2" name="assis2">
                                            <option value="">Assistant 2..</option>
                                            <?php
                                                foreach($assis as $a){
                                                    ?>
                                                    <option><?= $a['name'] ?></option>
                                                    <?php
                                                }
                                            ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-sm-6">
                                        <select  style="border-radius: 25px; width:inherit; height:45px; padding: 10px;" id="assis3" name="assis3">
                                            <option value="">Assistant 3..</option>
                                            <?php
                                                foreach($assis as $a){
                                                    ?>
                                                    <option><?= $a['name'] ?></option>
                                                    <?php
                                                }
                                            ?>
                                        </select>
                                    </div>

                                    <div class="col-sm-6">
                                        <select  style="border-radius: 25px; width:inherit; height:45px; padding: 10px;" id="assis4" name="assis4">
                                            <option value="">Assistant 4..</option>
                                            <?php
                                                foreach($assis as $a){
                                                    ?>
                                                    <option><?= $a['name'] ?></option>
                                                    <?php
                                                }
                                            ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-sm-6">
                                        <select  style="border-radius: 25px; width:inherit; height:45px; padding: 10px;" id="assis5" name="assis5">
                                            <option value="">Assistant 5..</option>
                                            <?php
                                                foreach($assis as $a){
                                                    ?>
                                                    <option><?= $a['name'] ?></option>
                                                    <?php
                                                }
                                            ?>
                                        </select>
                                    </div>

                                    <div class="col-sm-6">
                                        <select  style="border-radius: 25px; width:inherit; height:45px; padding: 10px;" id="assis6" name="assis6">
                                            <option value="">Assistant 6..</option>
                                            <?php
                                                foreach($assis as $a){
                                                    ?>
                                                    <option><?= $a['name'] ?></option>
                                                    <?php
                                                }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                
                                <button type="submit" class="btn btn-success btn-user btn-block">
                                    New Day
                                </button>
                                <hr>
                                <a href="Assistant History.php" class="btn btn-google btn-user btn-block">
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