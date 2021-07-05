<?php
 include ("../db.php"); 
 ob_start();
 session_start();
 if(!isset($_SESSION["oturum"])){ 
    header("location:login.php");
 }
 
 ?>

<?php

if(isset($_POST["add_user"]))
{
    $name =$_POST["user_name"];
    $pass =$_POST["user_password"];
    $mail =$_POST["user_email"];

    $query  = $db->query("SELECT * FROM users WHERE user='$name' && mail='$mail' ",PDO::FETCH_ASSOC);
    if ( $say = $query -> rowCount() ){

        if( $say > 0 ){            
            
            echo '<script>window.location.href = "http://localhost/staj/panel/users.php";</script>';
            
        }
    }
    else
    {
        $query  = $db->query("INSERT INTO users (user, pass, mail) VALUES ('$name','$pass','$mail')",PDO::FETCH_ASSOC);
        if($query == TRUE)
        {                   
            echo '<script>window.location.href = "http://localhost/staj/panel/users.php";</script>';
        }
        else
        {
        $error_message = "Oops! something wrong.";
        }
    }      
}

?>

<?php

if(isset($_POST["edit_user"]))
{
    $updateid = $_POST["user_id"];
    $updatename =$_POST["user_name"];
    $updatepass =$_POST["user_password"];
    $updatemail =$_POST["user_email"];

    $query  = $db->query("UPDATE users SET user='$updatename',pass='$updatepass',mail = '$updatemail' WHERE id = '$updateid'",PDO::FETCH_ASSOC);
    if($query == TRUE)
    {                   
        echo '<script>window.location.href = "http://localhost/staj/panel/users.php";</script>';
    }
    else
    {
      $error_message = "Oops! something wrong.";
    }      
}

?>

<?php

if(isset($_POST["delete_user"]))
{
    $deleteid = $_POST["user_id"];

    $query  = $db->query("DELETE FROM users WHERE id = '$deleteid'",PDO::FETCH_ASSOC);
    if($query == TRUE)
    {                   
        echo '<script>window.location.href = "http://localhost/staj/panel/users.php";</script>';
    }
    else
    {
      $error_message = "Oops! something wrong.";
    }      
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task-12</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <script src="https://code.jquery.com/jquery-1.11.3.min.js" type="text/javascript"></script>
    <script src="https://cdn.datatables.net/1.10.9/js/jquery.dataTables.min.js" type="text/javascript"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.9/css/jquery.dataTables.min.css" />

</head>

<body>
    <div class="container">
        <div class="row justify-content-center" style="margin-top: 20vh;">
            <div class="col-sm-7 mt-3">
                <h1><?php echo "Kullanıcı: " . $_SESSION["name"] . ".<br>"; ?></h1>
                <span>
                    <form action="" method="post">
                        <button type="submit" class='btn btn-outline-primary' name="exitbutton" > Çıkış </button>
                    </form>
                    <?php 
                       if(isset($_POST["exitbutton"]))
                       {
                        ob_start();
                        session_unset();
                        // Session öldürülür/yok edilir :)
                        session_destroy();
                        header("location:login.php");
                       }
                    ?>
                </span>
            </div>
            <div class="col-sm-7 mt-3">
                <table id="myTable" class="table table-responsive mt-3">
                    <button type='button' class='btn btn-success' data-toggle='modal' data-target='#add_modal'>Yeni
                        Kullanıcı
                        Ekle</button>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Kullanıcı Adı</th>
                            <th>Şifre</th>
                            <th>Mail</th>
                            <th>İşlemler</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php                          
                         $query  = $db->query("SELECT * FROM users",PDO::FETCH_ASSOC);                                               
                         $k = 1;
                         while($row = $query->fetch(PDO::FETCH_ASSOC))
                         {
                            $user_id = $row["id"];
                            $user_name = $row["user"];
                            $user_password = $row["pass"];
                            $user_mail = $row["mail"];

                            echo "<tr>
                            <td>{$user_id}</td>
                            <td>{$user_name}</td>
                            <td>{$user_password}</td>
                            <td>{$user_mail}</td>
                            <td>
                            <div class='btn-group' role='group' aria-label='Basic mixed styles example'>
                                <button type='button' class='btn btn-danger'  data-toggle='modal' data-target='#delete_modal$k'>Sil</button>
                                <button type='button' class='btn btn-warning'  data-toggle='modal' data-target='#edit_modal$k'>Güncelle</button>                                                                
                            </div>
                            </td>
                            </tr>";
                                                 
                        ?>
                        <div id="edit_modal<?php echo "$k";?>" class="modal fade">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Edit User</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="" method="post" enctype="multipart/form-data">
                                            <div class="form-group">
                                                <label for="user_id">User ID</label>
                                                <input type="text" class="form-control" name="user_id" readonly
                                                    value="<?php echo $row["id"]; ?>">
                                            </div>
                                            <div class="form-group">
                                                <label for="user_name">User Name</label>
                                                <input type="text" class="form-control" name="user_name"
                                                    value="<?php echo "$user_name" ?>">
                                            </div>
                                            <div class="form-group">
                                                <label for="user_password">User Password</label>
                                                <input type="text" class="form-control" name="user_password"
                                                    value="<?php echo "$user_password" ?>">
                                            </div>
                                            <div class="form-group">
                                                <label for="user_email">User Email</label>
                                                <input type="email" class="form-control" name="user_email"
                                                    value="<?php echo "$user_mail" ?>">
                                            </div>
                                            <div class="form-group">
                                                <input type="submit" class="btn btn-primary" name="edit_user"
                                                    value="Güncelle">
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="delete_modal<?php echo "$k";?>" class="modal fade">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Delete User</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="" method="post" enctype="multipart/form-data">
                                            <span> Kullanıcı Tamamen Silinsin mi? </span>
                                            <hr>
                                            <div class="form-group">
                                                <label for="user_id">User ID</label>
                                                <input type="text" class="form-control" name="user_id" readonly
                                                    value="<?php echo $row["id"]; ?>">
                                            </div>
                                            <div class="form-group">
                                                <label for="user_name">User Name</label>
                                                <input type="text" class="form-control" name="user_name"
                                                    value="<?php echo "$user_name" ?>" readonly>
                                            </div>
                                            <div class="form-group">
                                                <input type="submit" class="btn btn-primary" name="delete_user"
                                                    value="Sil">
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php $k++; } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div id="add_modal" class="modal fade">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add New User</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="" method="post">
                        <div class="form-group">
                            <label for="user_name">User Name</label>
                            <input type="text" class="form-control" name="user_name">
                        </div>
                        <div class="form-group">
                            <label for="user_password">User Password</label>
                            <input type="text" class="form-control" name="user_password">
                        </div>
                        <div class="form-group">
                            <label for="user_email">User Email</label>
                            <input type="email" class="form-control" name="user_email">
                        </div>
                        <div class="form-group">
                            <input type="hidden" name="user_id" value="">
                            <input type="submit" class="btn btn-primary" name="add_user" value="Add User">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
    function userinfo() {
        document.getElementById("demo").innerHTML = "Hello World";
    }
    </script>

    <script>
    $('#myModal').on('shown.bs.modal', function() {
        $('#myInput').trigger('focus')
    })
    </script>

    <script type="text/javascript">
    $(document).ready(function() {
        $('#datatable').dataTable({});
    });
    </script>
    <script>
    $('#myTable').DataTable({
        language: {
            info: "_TOTAL_ kayıttan _START_ - _END_ kayıt gösteriliyor.",
            infoEmpty: "Gösterilecek hiç kayıt yok.",
            loadingRecords: "Kayıtlar yükleniyor.",
            sLengthMenu: "Sayfada _MENU_ kayıt göster",
            zeroRecords: "Tablo boş",
            search: "Arama:",
            infoFiltered: "(toplam _MAX_ kayıttan filtrelenenler)",
            buttons: {
                copyTitle: "Panoya kopyalandı.",
                copySuccess: "Panoya %d satır kopyalandı",
                copy: "Kopyala",
                print: "Yazdır",
            },

            paginate: {
                first: "İlk",
                previous: "Önceki",
                next: "Sonraki",
                last: "Son"
            },
        }
    });
    </script>
</body>

</html>