<?php
require_once '../models/user/assistant.php';

$assistant = new Assistant;

if (isset($_POST['name']) && isset($_POST['id']))
{
    $assistant->full_name = $_POST['name'];
    $assistant->id        = $_POST['id'];
    $assistant->phone_no  = $_POST['phone'];

    if($assistant->new_Assistant())
        header("location: Assistant Data.php");
}

$all_assistant = $assistant->view_All_Assistant();

?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Add New Assistant</title>

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
                                <h1 class="h4 text-gray-900 mb-4">New Assistant !</h1>
                            </div>
                            <form action="Assistant Data Add.php" method="POST" class="user">
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user" id="name" name="name" required
                                        placeholder="Assistant Name">
                                </div>

                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <select  style="border-radius: 25px; width:inherit; height:45px; padding: 10px;" id="id" name="id" required>
                                            <option value="">ID..</option>
                                            <?php 
                                            for($i = 1 ; $i<99 ; $i++){
                                                $con = 0;
                                                foreach($all_assistant as $ass){
                                                    if($ass['id'] == $i){
                                                        $con = 1;
                                                    }
                                                }
                                                if($con){
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

                                    <div class="col-sm-6">
                                    <input type="text" class="form-control form-control-user" required
                                            id="phone" name="phone" placeholder="Phone Num">
                                    </div>
                                </div>
                                
                                <button type="submit" class="btn btn-success btn-user btn-block">
                                    New Assistant
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