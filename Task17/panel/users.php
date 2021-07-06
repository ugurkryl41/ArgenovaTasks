<?php
 include ("../includes/db.php");
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
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Dashboard - SB Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
    <link href="css/styles.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous">
    </script>

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

<body class="sb-nav-fixed">
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
        <!-- Navbar Brand-->
        <a class="navbar-brand ps-3" href="./index.php">Admin - Panel</a>
        <!-- Sidebar Toggle-->
        <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i
                class="fas fa-bars"></i></button>
        <!-- Navbar Search-->
        <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
            <div class="input-group">
                <input class="form-control" type="text" placeholder="Search for..." aria-label="Search for..."
                    aria-describedby="btnNavbarSearch" />
                <button class="btn btn-primary" id="btnNavbarSearch" type="button"><i
                        class="fas fa-search"></i></button>
            </div>
        </form>
        <!-- Navbar-->
        <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
            <li class="nav-item dropdown">

                <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown"
                    aria-expanded="false"><i class="fas fa-user fa-fw">
                    </i></a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item" href="#!">Settings</a></li>
                    <li><a class="dropdown-item" href="#!">Activity Log</a></li>
                    <li>
                        <hr class="dropdown-divider" />
                    </li>
                    <li><a class="dropdown-item" href="./logout.php">Logout</a></li>
                </ul>
            </li>
        </ul>
    </nav>
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                <div class="sb-sidenav-menu">
                    <div class="nav">
                        <div class="sb-sidenav-menu-heading">Core</div>
                        <a class="nav-link" href="index.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                            Dashboard
                        </a>
                        <div class="sb-sidenav-menu-heading">Interface</div>
                        <a class="nav-link collapsed" href="#" data-bs-toggle="collapse"
                            data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                            <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                            Blog Management
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne"
                            data-bs-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href="./post.php">Post Edit</a>
                            </nav>
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href="./comments.php">Comment Edit</a>
                            </nav>
                        </div>
                        <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapsePages"
                            aria-expanded="false" aria-controls="collapsePages">
                            <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                            User Management
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="collapsePages" aria-labelledby="headingTwo"
                            data-bs-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                                <a class="nav-link" href="./users.php">User Edit</a>
                            </nav>
                        </div>
                        <div class="sb-sidenav-menu-heading">Addons</div>
                        <a class="nav-link" href="charts.html">
                            <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                            Charts
                        </a>
                        <a class="nav-link" href="tables.html">
                            <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                            Tables
                        </a>
                    </div>
                </div>
                <div class="sb-sidenav-footer">
                    <div class="small">Logged in as:</div>
                    <span style="color:white;"><?php  echo $_SESSION['name']; ?></span>
                </div>
            </nav>
        </div>
        <div id="layoutSidenav_content">
            <main>
                <div class="container">
                    <div class="row justify-content-center" style="margin-top: 5vh;">
                        <div class="col-sm-10 mt-3">
                            <button type='button' class='btn btn-success' data-toggle='modal'
                                data-target='#add_modal'>Yeni
                                Kullanıcı
                                Ekle</button>
                        </div>
                        <div class="col-sm-10">
                            <hr>
                        </div>
                        <div class="col-sm-10 mt-3">
                            <table id="myTable" class="table table-striped" style="width:100%">
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
                                <button type='button' class='btn btn-danger'  data-toggle='modal' data-target='#delete_modal$k' style='margin-right:10px;'>Sil</button>
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
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="" method="post" enctype="multipart/form-data">
                                                        <div class="form-group">
                                                            <label for="user_id">User ID</label>
                                                            <input type="text" class="form-control" name="user_id"
                                                                readonly value="<?php echo $row["id"]; ?>">
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
                                                            <input type="submit" class="btn btn-primary"
                                                                name="edit_user" value="Güncelle">
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
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="" method="post" enctype="multipart/form-data">
                                                        <span> Kullanıcı Tamamen Silinsin mi? </span>
                                                        <hr>
                                                        <div class="form-group">
                                                            <label for="user_id">User ID</label>
                                                            <input type="text" class="form-control" name="user_id"
                                                                readonly value="<?php echo $row["id"]; ?>">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="user_name">User Name</label>
                                                            <input type="text" class="form-control" name="user_name"
                                                                value="<?php echo "$user_name" ?>" readonly>
                                                        </div>
                                                        <div class="form-group">
                                                            <input type="submit" class="btn btn-primary"
                                                                name="delete_user" value="Sil">
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
            </main>
            <footer class="py-4 bg-light mt-auto">
                <div class="container-fluid px-4">
                    <div class="d-flex align-items-center justify-content-between small">
                        <div class="text-muted">Copyright &copy; Your Website 2021</div>
                        <div>
                            <a href="#">Privacy Policy</a>
                            &middot;
                            <a href="#">Terms &amp; Conditions</a>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous">
    </script>
    <script src="js/scripts.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
    <script src="assets/demo/chart-area-demo.js"></script>
    <script src="assets/demo/chart-bar-demo.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
    <script src="js/datatables-simple-demo.js"></script>

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