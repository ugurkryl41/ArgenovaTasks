<?php include ("../includes/db.php");  ?>

<?php
 ob_start();
 session_start();
 if(!isset($_SESSION["oturum"])){ 
    header("location:login.php");
 }
?>

<?php

if(isset($_POST["delete_comment"]))
{
    $deleteid = $_POST["c_id"];

    $query  = $db->query("DELETE FROM comments WHERE Id = '$deleteid'",PDO::FETCH_ASSOC);
    if($query == TRUE)
    {                   
        echo '<script>window.location.href = "http://localhost/staj/panel/comments.php";</script>';
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
    <?php include ("./links.php"); ?>
</head>

<?php include ("./dashboard.php"); ?>

            <main>
                <div class="container">
                    <div class="row justify-content-center" style="margin-top: 5vh;">
                        <div class="col-sm-12 mt-3">
                            <h1>Comments</h1>
                        </div>
                        <div class="col-sm-12">
                            <hr>
                        </div>
                        <div class="col-sm-12 mt-3">
                            <table id="myTable" class="table table-striped" style="width:100%">
                                <thead>
                                    <tr>
                                        <th scope="col">Id</th>
                                        <th scope="col">PostID</th>
                                        <th scope="col">Author</th>
                                        <th scope="col">Mail</th>
                                        <th scope="col">Date</th>
                                        <th scope="col">Text</th>
                                        <th scope="col">İşlemler</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                     $k = 1; 
                                    $query  = $db->query("SELECT * FROM comments ORDER BY cdate DESC",PDO::FETCH_ASSOC);
                                    while($row = $query->fetch(PDO::FETCH_ASSOC))
                                    {
                                        $commentid=$row["Id"];
                                        $commentpostid = $row["postid"];
                                        $commentname= $row["vname"];
                                        $commentmail = $row["mail"];
                                        $commenttext = $row["ctext"];
                                        $commentdate = $row["cdate"];
                                                //
                            echo "<tr>
                            <td>{$commentid}</td>
                            <td>{$commentpostid}</td>
                            <td>{$commentname}</td>
                            <td>{$commentmail}</td>
                            <td style='width:10%;'>{$commentdate}</td>
                            <td>{$commenttext}</td>
                            <td>
                            <div class='btn-group' role='group' aria-label='Basic mixed styles example'>
                                <button type='button' class='btn btn-danger'  data-toggle='modal' data-target='#delete_modal$k' style='margin-left:10px;'>Sil</button>
                                                                                             
                            </div>
                            </td>
                            </tr>";
                                                 
                        ?>
                                    <div id="delete_modal<?php echo "$k";?>" class="modal fade">
                                        <div class="modal-dialog modal-lg" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Delete Comment</h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="" method="post" enctype="multipart/form-data">
                                                        <span> Yorum silinsin mi? </span>
                                                        <hr>
                                                        <div class="form-group">
                                                            <label for="c_id">Comment ID</label>
                                                            <input type="text" class="form-control" name="c_id" readonly
                                                                value="<?php echo $row["Id"]; ?>">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="p_title">Comment Message</label>
                                                            <input type="text" class="form-control" name="p_title"
                                                                value="<?php echo "$commenttext" ?>" readonly>
                                                        </div>
                                                        <div class="form-group">
                                                            <input type="submit" class="btn btn-primary"
                                                                name="delete_comment" value="Delete">
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