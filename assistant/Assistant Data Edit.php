<?php

require_once '../models/assisData.php';
require_once '../controllers/assisController.php';
$errMsg="";

$assisController = new AssisController;
$a = new AssisData;
$aNew = new AssisData;
$assisAll = $assisController->viewAllAssistantData();

$a->id = $_GET['assisID'];
$assis = $assisController->viewAssistantData($a);

if (isset($_POST['name']) && isset($_POST['location']) && isset($_POST['num1'])){
    if(!empty($_POST['name']) && !empty($_POST['location']) && !empty($_POST['num1'])){
        $a->name = $assis['name'];
        
        $aNew->name        = $_POST['name'];
        $aNew->id          = $_POST['id'];
        $aNew->location    = $_POST['location'];
        $aNew->num1        = $_POST['num1'];
        $aNew->num2        = $_POST['num2'];
        $aNew->facebookAcc = $_POST['faceAcc'];

        if($assisController->editAssistantData($a,$aNew)){
            //if($assisController->newAssistantData($aNew)){
                header("location: Assistant Data.php");
            //}
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

    <title>Edit Assistant Data</title>

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
                                <h1 class="h4 text-gray-900 mb-4">Edit Assistant </h1>
                            </div>

                            <form class="user" action="Assistant Data Edit.php?assisID=<?= $assis['id']?>" method="POST">
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="text" class="form-control form-control-user" id="name" name="name"
                                            placeholder="Name" value="<?= $assis['name'] ?>" required>
                                    </div>
                                    <div class="col-sm-6">
                                    <select  style="border-radius: 25px; width:inherit; height:45px; padding: 10px;" id="id" name="id" required>
                                            <option value="">ID..</option>
                                            <?php 
                                            for($i=1;$i<1000;$i++){
                                                $con = 0;
                                                foreach($assisAll as $stAll){
                                                    if($stAll['id'] == $i){
                                                        if($assis['id'] == $i){
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
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                    <input type="text" class="form-control form-control-user" id="location" name="location"
                                            placeholder="Location" value="<?= $assis['location'] ?>" required>
                                    </div>
                                    <div class="col-sm-6">
                                    <input type="text" class="form-control form-control-user"
                                            id="num1" name="num1" placeholder="Num.1" value="<?= $assis['num1'] ?>" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                    <input type="text" class="form-control form-control-user"
                                            id="num2" name="num2" placeholder="Num.2" value="<?= $assis['num2'] ?>">
                                    </div>
                                    <div class="col-sm-6">
                                    <input type="text" class="form-control form-control-user" id="faceAcc" name="faceAcc"
                                        placeholder="FaceBook Link" value="<?= $assis['facebook acc'] ?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    
                                </div>
                                
                                <button type="submit" class="btn btn-success btn-user btn-block">
                                    Save
                                </button>
                                <hr>
                                <a href="Assistant Data.php" class="btn btn-google btn-user btn-block">
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