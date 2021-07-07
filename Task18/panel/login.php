<?php

include ("../includes/db.php");
	
if($_POST)
{
    $name =$_POST["username"];
    $pass =$_POST["password"];


    $query  = $db->query("SELECT * FROM users WHERE user='$name' && pass='$pass'",PDO::FETCH_ASSOC);
    if ( $say = $query -> rowCount() ){

        if( $say > 0 ){
            session_start();
            $_SESSION['oturum']=true;
            $_SESSION['name']=$name;
            $_SESSION['pass']=$pass;
            
            echo '<script> window.location.href = "http://localhost/staj/panel/index.php";</script>';

        }
    }else{
        echo '<script>window.location.href = "http://localhost/staj/panel/login.php";</script>';
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

    <title>SB Admin - Login</title>


    <!-- Bootstrap core JavaScript-->
    <link rel="stylesheet" href="../css/bootstrap.css">
    <script src="../js/bootstrap.js"></script>
    <script src="../js/jquery-3.6.0.min.js"></script>
    <!-- SweetAlert2 -->
    <script src="node_modules/sweetalert2/dist/sweetalert2.all.min.js"></script>
    <script src="node_modules/sweetalert2/dist/sweetalert2.js"></script>
    <link rel="stylesheet" href="node_modules/sweetalert2/dist/sweetalert2.min.css">


</head>

<body>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-sm-4 align-self-center" style="margin-top: 20vh;">
                <div class="card card-login mx-auto mt-5">
                    <div class="card-header">
                        Login
                    </div>
                    <div class="card-body">
                        <form action="" method="post" id="loginform">
                            <div class="form-group">
                                <div class="form-label-group">
                                    <label for="inputUsername">Username</label>
                                    <input type="text" id="inputUsername" name="username" class="form-control"
                                        placeholder="Username" required="required" autofocus="autofocus">
                                </div>
                            </div>
                            <div class="form-group mt-2">
                                <div class="form-label-group">
                                    <label for="inputPassword">Password</label>
                                    <input type="password" id="inputPassword" name="password" class="form-control"
                                        placeholder="Password" required="required">
                                </div>
                            </div>
                            <div class="row justify-content-end">
                                <div class="col-sm-8 mt-3">
                                    <span style="margin-left: 20px;"><a href="./register.php" class="link-primary">Register</a></span>
                                </div>
                                <div class="col-sm-4">
                                    <button class="btn btn-outline-primary btn-block mt-2" name="login" type="submit"
                                        style="width: 100%;">Login</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>