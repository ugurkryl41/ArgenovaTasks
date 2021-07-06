<?php

 ob_start();
 session_start();
 if(!isset($_SESSION["oturum"])){ 
    header("location:login.php");
 }

?>

<?php include ("../includes/db.php");  ?>

<?php

if(isset($_POST["create_post"]))
{
    $dizin = '../images/';
    $yuklenecek_dosya = $dizin . basename($_FILES['imageupload']['name']);
 
    if (move_uploaded_file($_FILES['imageupload']['tmp_name'], $yuklenecek_dosya))
    {
    
    } else {
        echo "Dosya yüklenemedi!\n";
    }

    $image= basename($_FILES['imageupload']['name']);
    $author =$_POST["author"];  
    $title =$_POST["posttitle"];
    $text =$_POST["posttext"];
    $date = date("Y/m/d");
    
    $query  = $db->query("INSERT INTO posts (post_title, post_author, post_date,post_image,post_text) 
                            VALUES ('$title','$author','$date','$image','$text')",PDO::FETCH_ASSOC);
    if($query == TRUE)
    {                   
        echo '<script>window.location.href = "http://localhost/staj/panel/post.php";</script>';
    }
    else
    {
    $error_message = "Oops! something wrong.";
    }    
}

?>

<?php

if(isset($_POST["update_post"]))
{  

    $pid1=$_POST["pid"];  
    $author1 =$_POST["pauthor"];  
    $title1 =$_POST["ptitle"];
    $text1 =$_POST["ptext"];
    $date1 = date("Y/m/d");
    $query1  = $db->query("UPDATE posts SET post_title='$title1',post_author='$author1',post_date='$date1',post_text='$text1'
                         WHERE post_id = '$pid1'",PDO::FETCH_ASSOC);
    if($query1 == TRUE)
    {                   
       // echo '<script>window.location.href = "http://localhost/staj/panel/post.php";</script>';
    }
    else
    {
      $error_message = "Oops! something wrong.";
    }      
}

?>

<?php

if(isset($_POST["delete_post"]))
{
    $deleteid = $_POST["p_id"];

    $query  = $db->query("DELETE FROM posts WHERE post_id = '$deleteid'",PDO::FETCH_ASSOC);
    if($query == TRUE)
    {                   
        echo '<script>window.location.href = "http://localhost/staj/panel/post.php";</script>';
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

    <script src="../ckeditor/ckeditor.js"> </script>
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
                        <div class="col-sm-12 mt-3">
                            <button type='button' class='btn btn-success' data-toggle='modal' data-target='#add_modal'>
                                New POST</button>
                        </div>
                        <div class="col-sm-12">
                            <hr>
                        </div>
                        <div class="col-sm-12 mt-3">
                            <table id="myTable" class="table table-striped" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Author</th>
                                        <th>Date</th>
                                        <th>Image</th>
                                        <th>Title</th>
                                        <th>Text</th>
                                        <th>İşlemler</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php                          
                         $query  = $db->query("SELECT * FROM posts",PDO::FETCH_ASSOC);                                               
                         $k = 1;
                         while($row = $query->fetch(PDO::FETCH_ASSOC))
                         {
                            $post_id = $row["post_id"];
                            $post_author= $row["post_author"];
                            $post_date = $row["post_date"];
                            $post_image = $row["post_image"];
                            $post_title= $row["post_title"];
                            $post_text = $row["post_text"];
                            echo "<tr>
                            <td>{$post_id}</td>
                            <td>{$post_author}</td>
                            <td style='width:10%;'>{$post_date}</td>
                            <td>{$post_image}</td>
                            <td>{$post_title}</td>
                            <td>{$post_text}</td>
                            <td>
                            <div class='btn-group' role='group' aria-label='Basic mixed styles example'>
                                <button type='button' class='btn btn-danger'  data-toggle='modal' data-target='#delete_modal$k' style='margin-right:10px;'>Sil</button>
                                <button type='button' class='btn btn-warning'  data-toggle='modal' data-target='#edit_modal$k'>Güncelle</button>                                                                
                            </div>
                            </td>
                            </tr>";
                                                 
                        ?>
                                    <div id="edit_modal<?php echo "$k";?>" class="modal fade">
                                        <div class="modal-dialog modal-xl" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Edit Post</h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="" method="post" enctype="multipart/form-data">
                                                        <div class="form-group">
                                                            <label for="pid">POST ID</label>
                                                            <input type="text" class="form-control" name="pid" readonly
                                                                value="<?php echo $row["post_id"]; ?>">
                                                        </div>
                                                        <form action="" method="post" id="loginform"
                                                            enctype="multipart/form-data">
                                                            <div class="form-group">
                                                                <div class="form-label-group">
                                                                    <label for="inputauthor">Author</label>
                                                                    <input type="text" id="inputauthor" name="pauthor"
                                                                        class="form-control"
                                                                        value='<?php echo "$post_author" ?>'
                                                                        required="required" autofocus="autofocus"
                                                                        readonly>
                                                                </div>
                                                                <div class="form-label-group mt-3">
                                                                    <label for="inputposttitle">Post Title</label>
                                                                    <input type="text" id="inputposttitle" name="ptitle"
                                                                        class="form-control" required="required"
                                                                        autofocus="autofocus"
                                                                        value='<?php echo "$post_title" ?>'>
                                                                </div>
                                                                <div class="form-label-group mt-3">
                                                                    <label for="ckeditor1">Post Text</label>
                                                                    <textarea type="text" id="ckeditor1" name="ptext"
                                                                        class="ckeditor" required="required"
                                                                        autofocus="autofocus"
                                                                        rows="5"> <?php echo "$post_text" ?> </textarea>
                                                                </div>
                                                            </div>
                                                            <div class="row justify-content-end">
                                                                <div class="col-sm-4">
                                                                    <button
                                                                        class="btn btn-outline-primary btn-block mt-2"
                                                                        name="update_post" type="submit"
                                                                        style="width: 100%;">Update</button>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="delete_modal<?php echo "$k";?>" class="modal fade">
                                        <div class="modal-dialog modal-lg" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Delete POST</h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="" method="post" enctype="multipart/form-data">
                                                        <span> Post silinsin mi? </span>
                                                        <hr>
                                                        <div class="form-group">
                                                            <label for="p_id">Post ID</label>
                                                            <input type="text" class="form-control" name="p_id" readonly
                                                                value="<?php echo $row["post_id"]; ?>">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="p_title">Post Title</label>
                                                            <input type="text" class="form-control" name="p_title"
                                                                value="<?php echo "$post_title" ?>" readonly>
                                                        </div>
                                                        <div class="form-group">
                                                            <input type="submit" class="btn btn-primary"
                                                                name="delete_post" value="Delete">
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
                    <div class="modal-dialog modal-xl" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">New POST</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form action="" method="post" id="loginform" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <div class="form-label-group">
                                            <label for="inputauthor">Author</label>
                                            <input type="text" id="inputauthor" name="author" class="form-control"
                                                value='<?php echo $_SESSION["name"]; ?>' required="required"
                                                autofocus="autofocus" readonly>
                                        </div>
                                        <div class="form-label-group mt-3">
                                            <label for="inputposttitle">Post Title</label>
                                            <input type="text" id="inputposttitle" name="posttitle" class="form-control"
                                                required="required" autofocus="autofocus">
                                        </div>
                                        <div class="form-label-group mt-3">
                                            <label for="ckeditor1">Post Text</label>
                                            <textarea type="text" id="ckeditor1" name="posttext" class="ckeditor"
                                                required="required" autofocus="autofocus" rows="5"> </textarea>
                                        </div>
                                        <div class="form-label-group mt-3">
                                            <div class="input-group">
                                                <input type="file" class="form-control" id="imageupload"
                                                    aria-describedby="inputGroupFileAddon04" aria-label="Upload"
                                                    style="padding-bottom: 35px;" name="imageupload">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row justify-content-end">
                                        <div class="col-sm-4">
                                            <button class="btn btn-outline-primary btn-block mt-2" name="create_post"
                                                type="submit" style="width: 100%;">Create</button>
                                        </div>
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