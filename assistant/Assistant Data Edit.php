<?php

require_once '../models/user/assistant.php';
session_start();

$assOld = new Assistant;
$assNew = new Assistant;

$_SESSION['assistant_id'] = $_GET['assistant_id'] ? $_GET['assistant_id'] : '';

$assOld->id = $_SESSION['assistant_id'];

$assistant_data = $assOld->view_1_Assistant();

$assOld->full_name = $assistant_data['name'];
$assOld->phone_no  = $assistant_data['phone'];

if (isset($_POST['assistant_name']) && isset($_POST['assistant_id']))
{
    if(!empty($_POST['assistant_name']) && !empty($_POST['assistant_id']))
    {        
        $assNew->full_name = $_POST['assistant_name'];
        $assNew->id        = $_POST['assistant_id'];
        $assNew->phone_no  = $_POST['phone_num'];

        $assOld->update_Assistant($assNew);
        header("location: Assistant Data.php");
    }
}

$all_assistant = $assOld->view_All_Assistant();

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

                            <form class="user" action="Assistant Data Edit.php" method="POST">
                                <div class="form-group">
                                        <input type="text" class="form-control form-control-user" id="assistant_name" name="assistant_name"
                                            placeholder="Name" value="<?= $assOld->full_name ?>" required>                                    
                                </div>

                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <select  style="border-radius: 25px; width:inherit; height:45px; padding: 10px;" id="assistant_id" name="assistant_id" required>
                                            <option value="">ID..</option>
                                            <?php 
                                            for($i=1;$i<99;$i++){
                                                $conn = 0;
                                                foreach($all_assistant as $one_id){
                                                    if($one_id['id'] == $i){
                                                        if($assOld->id == $i){
                                                            $conn = 1;
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
                                            id="phone_num" name="phone_num" placeholder="Phone Num" value="<?= $assOld->phone_no ?>" required>
                                    </div>
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