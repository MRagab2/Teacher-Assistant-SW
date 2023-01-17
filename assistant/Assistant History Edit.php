<?php

require_once '../models/assisData.php';
require_once '../controllers/assisController.php';

$assisController = new AssisController;
$ahOld = new AssisHitory;
$ahNew = new AssisHitory;

$a = new AssisData;
$assis = $assisController->viewAllAssistantData();

$ahOld->date = $_GET['date'];


$assish = $assisController->viewAssistantDay($ahOld);
$ahOld->date    = $assish['date'];
$ahOld ->class  = $assish['Class'];
$ahOld ->assis1 = $assish['Assistant1'];
$ahOld ->assis2 = $assish['Assistant2'];
$ahOld ->assis3 = $assish['Assistant3'];
$ahOld ->assis4 = $assish['Assistant4'];
$ahOld ->assis5 = $assish['Assistant5'];
$ahOld ->assis6 = $assish['Assistant6'];


if (isset($_POST['date']) && isset($_POST['class']) && isset($_POST['assis1'])){
    if (!empty($_POST['date']) && !empty($_POST['class']) && !empty($_POST['assis1'])){
        
        $ahNew->date   = $_POST['date'];
        $ahNew->class  = $_POST['class'];
        $ahNew->assis1 = $_POST['assis1'];
        $ahNew->assis2 = $_POST['assis2'];
        $ahNew->assis3 = $_POST['assis3'];
        $ahNew->assis4 = $_POST['assis4'];
        $ahNew->assis5 = $_POST['assis5'];
        $ahNew->assis6 = $_POST['assis6'];

        if($assisController->deleteAssistantDay($ahOld)){
            if($assisController->newAssistantDay($ahNew)){
                header("location: Assistant History.php");
            }
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

    <title>Edit "<?= $ahOld->date ?>" Day </title>

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
                                <h1 class="h4 text-gray-900 mb-4">Edit "<?= $ahOld->date ?>" Day</h1>
                            </div>
                            <form action="Assistant History Edit.php?date=<?= $ahOld->date ?>" method="POST" class="user">
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="date" class="form-control form-control-user" id="date" name="date" value="<?= $ahOld->date ?>" required>
                                    </div>

                                    <div class="col-sm-6">
                                        <select  style="border-radius: 25px; width:inherit; height:45px; padding: 10px;" id="class" name="class" required>
                                            <option value="">Class..</option>
                                            <?php 
                                                if($ahOld->class=="3rd Sec"){
                                                    ?>
                                                        <option selected>3rd Sec</option>
                                                    <?php
                                                }
                                                else{
                                                    ?>
                                                        <option>3rd Sec</option>
                                                    <?php
                                                }
                                                if($ahOld->class=="2nd Sec (Math)"){
                                                    ?>
                                                        <option selected>2nd Sec (Math)</option>
                                                    <?php
                                                }
                                                else{
                                                    ?>
                                                        <option>2nd Sec (Math)</option>
                                                    <?php
                                                }
                                                if($ahOld->class=="2nd Sec (Mech)"){
                                                    ?>
                                                        <option selected>2nd Sec (Mech)</option>
                                                    <?php
                                                }
                                                else{
                                                    ?>
                                                        <option>2nd Sec (Mech)</option>
                                                    <?php
                                                }
                                                if($ahOld->class=="1st Sec"){
                                                    ?>
                                                        <option selected>1st Sec</option>
                                                    <?php
                                                }
                                                else{
                                                    ?>
                                                        <option>1st Sec</option>
                                                    <?php
                                                }
                                            ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-sm-6">
                                        <select  style="border-radius: 25px; width:inherit; height:45px; padding: 10px;" id="assis1" name="assis1" required>
                                            <option value="">Assistant 1..</option>
                                            <?php
                                                foreach($assis as $a){
                                                    if($a['name']==$ahOld->assis1){
                                                        ?>
                                                        <option selected><?= $a['name'] ?></option>
                                                        <?php
                                                    }
                                                    else{
                                                        ?>
                                                        <option><?= $a['name'] ?></option>
                                                        <?php
                                                    }
                                                }
                                            ?>
                                        </select>
                                    </div>

                                    <div class="col-sm-6">
                                        <select  style="border-radius: 25px; width:inherit; height:45px; padding: 10px;" id="assis2" name="assis2">
                                            <option value="">Assistant 2..</option>
                                            <?php
                                                foreach($assis as $a){
                                                    if($a['name']==$ahOld->assis2){
                                                        ?>
                                                        <option selected><?= $a['name'] ?></option>
                                                        <?php
                                                    }
                                                    else{
                                                        ?>
                                                        <option><?= $a['name'] ?></option>
                                                        <?php
                                                    }
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
                                                    if($a['name']==$ahOld->assis3){
                                                        ?>
                                                        <option selected><?= $a['name'] ?></option>
                                                        <?php
                                                    }
                                                    else{
                                                        ?>
                                                        <option><?= $a['name'] ?></option>
                                                        <?php
                                                    }
                                                }
                                            ?>
                                        </select>
                                    </div>

                                    <div class="col-sm-6">
                                        <select  style="border-radius: 25px; width:inherit; height:45px; padding: 10px;" id="assis4" name="assis4">
                                            <option value="">Assistant 4..</option>
                                            <?php
                                                foreach($assis as $a){
                                                    if($a['name']==$ahOld->assis4){
                                                        ?>
                                                        <option selected><?= $a['name'] ?></option>
                                                        <?php
                                                    }
                                                    else{
                                                        ?>
                                                        <option><?= $a['name'] ?></option>
                                                        <?php
                                                    }
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
                                                    if($a['name']==$ahOld->assis5){
                                                        ?>
                                                        <option selected><?= $a['name'] ?></option>
                                                        <?php
                                                    }
                                                    else{
                                                        ?>
                                                        <option><?= $a['name'] ?></option>
                                                        <?php
                                                    }
                                                }
                                            ?>
                                        </select>
                                    </div>

                                    <div class="col-sm-6">
                                        <select  style="border-radius: 25px; width:inherit; height:45px; padding: 10px;" id="assis6" name="assis6">
                                            <option value="">Assistant 6..</option>
                                            <?php
                                                foreach($assis as $a){
                                                    if($a['name']==$ahOld->assis6){
                                                        ?>
                                                        <option selected><?= $a['name'] ?></option>
                                                        <?php
                                                    }
                                                    else{
                                                        ?>
                                                        <option><?= $a['name'] ?></option>
                                                        <?php
                                                    }
                                                }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                
                                <button type="submit" class="btn btn-success btn-user btn-block">
                                    Save
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