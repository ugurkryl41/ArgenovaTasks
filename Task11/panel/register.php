<?php

include ("../db.php");
	
if($_POST)
{
    $name =$_POST["username"];
    $pass =$_POST["password"];
    $mail =$_POST["mail"];

    $query  = $db->query("SELECT * FROM users WHERE user='$name' && mail='$mail' ",PDO::FETCH_ASSOC);
    if ( $say = $query -> rowCount() ){

        if( $say > 0 ){            
            
            echo '<script>window.location.href = "http://localhost/staj/panel/register.php";</script>';
            
        }
    }
    else
    {
        $query  = $db->query("INSERT INTO users (user, pass, mail) VALUES ('$name','$pass','$mail')",PDO::FETCH_ASSOC);
        if($query == TRUE)
        {                   
            echo '<script>window.location.href = "http://localhost/staj/panel/login.php";</script>';
        }
        else
        {
        $error_message = "Oops! something wrong.";
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

    <title>Register Page</title>


    <!-- Bootstrap core JavaScript-->
    <link rel="stylesheet" href="../bootstrap.css">
    <script src="../bootstrap.js"></script>
    <script src="../jquery-3.6.0.min.js"></script>

</head>

<body>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-sm-4 align-self-center" style="margin-top: 20vh;">
                <div class="card card-login mx-auto mt-5">
                    <div class="card-header">
                        Register
                    </div>
                    <div class="card-body">
                        <form action="" method="post">
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
                            <div class="form-group mt-2">
                                <div class="form-label-group">
                                    <label for="inputMail">Mail</label>
                                    <input type="email" id="inputMail" name="mail" class="form-control"
                                        placeholder="Email" required="required">
                                </div>
                            </div>
                            <div class="row justify-content-end">
                                <div class="col-sm-4">
                                    <button class="btn btn-outline-primary btn-block mt-2" name="login" type="submit"
                                        style="width: 100%;">Register</button>
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