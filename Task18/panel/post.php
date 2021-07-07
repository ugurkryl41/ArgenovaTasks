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
    $seot = $_POST["seotitle"];  
    $seod = $_POST["seodesc"];  
    $seok = $_POST["seokey"];  

    $query  = $db->query("INSERT INTO posts (post_title, post_author, post_date,post_image,post_text,seotitle,seodescription,seokeywords) 
                            VALUES ('$title','$author','$date','$image','$text','$seot','$seod','$seok')",PDO::FETCH_ASSOC);
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
    $seot1 = $_POST["pseotitle"];  
    $seod1 = $_POST["pseodesc"];  
    $seok1 = $_POST["pseokey"];  
    $query1  = $db->query("UPDATE posts SET post_title='$title1',post_author='$author1',post_date='$date1',post_text='$text1',
                                                    seotitle='$seot1',seodescription='$seod1',seokeywords='$seok1'
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
    <?php include ("./links.php"); ?>
</head>

<?php include ("./dashboard.php"); ?>


<main>
    <div class="" style="padding-left:1%;padding-right:1%;">
        <div class="row justify-content-center">
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
                            <th>SEO Title</th>
                            <th>SEO Description</th>
                            <th>SEO Keywords</th>
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
                            $post_seot = $row["seotitle"];
                            $post_seod = $row["seodescription"];
                            $post_seok = $row["seokeywords"];
                            echo "<tr>
                            <td>{$post_id}</td>
                            <td>{$post_author}</td>
                            <td style='width:10%;'>{$post_date}</td>
                            <td>{$post_image}</td>
                            <td>{$post_title}</td>
                            <td style='width:20%;'>{$post_text} </td>
                            <td>{$post_seot}</td>
                            <td>{$post_seod}</td>
                            <td>{$post_seok}</td>
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
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="" method="post" id="updateform" enctype="multipart/form-data">
                                            <div class="row g-3">
                                                <div class="col-md-6">
                                                    <label for="pid">POST ID</label>
                                                    <input type="text" class="form-control" name="pid" readonly
                                                        value="<?php echo $row["post_id"]; ?>">
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="inputauthor">Author</label>
                                                    <input type="text" id="inputauthor" name="pauthor"
                                                        class="form-control" value='<?php echo "$post_author" ?>'
                                                        required="required" autofocus="autofocus" readonly>
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="inputseotitle">SEO Title</label>
                                                    <input type="text" id="inputseotitle" name="pseotitle"
                                                        class="form-control" required="required" autofocus="autofocus"
                                                        value='<?php echo "$post_seot" ?>'>
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="inputseodesc">SEO Description</label>
                                                    <input type="text" id="inputseodesc" name="pseodesc"
                                                        class="form-control" required="required" autofocus="autofocus"
                                                        value='<?php echo "$post_seod" ?>'>
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="inputseokeywords">SEO Keywords</label>
                                                    <input type="text" id="inputseokeywords" name="pseokey"
                                                        class="form-control" required="required" autofocus="autofocus"
                                                        value='<?php echo "$post_seok" ?>'>
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="inputposttitle">Post Title</label>
                                                    <input type="text" id="inputposttitle" name="ptitle"
                                                        class="form-control" required="required" autofocus="autofocus"
                                                        value='<?php echo "$post_title" ?>'>
                                                </div>
                                                <div class="col-md-12">
                                                    <label for="ckeditor1">Post Text</label>
                                                    <textarea type="text" id="ckeditor1" name="ptext" class="ckeditor"
                                                        required="required" autofocus="autofocus"
                                                        rows="5"> <?php echo "$post_text" ?> </textarea>
                                                </div>
                                                <div class="row justify-content-end">
                                                    <div class="col-sm-4">
                                                        <button class="btn btn-outline-primary btn-block mt-2"
                                                            name="update_post" type="submit"
                                                            style="width: 100%;">Update</button>
                                                    </div>
                                                </div>
                                            </div>
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
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
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
                                                <input type="submit" class="btn btn-primary" name="delete_post"
                                                    value="Delete">
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
                    <form action="" method="post" id="createform" enctype="multipart/form-data" class="row g-3">
                        <div class="col-md-6">
                            <label for="inputauthor">Author</label>
                            <input type="text" id="inputauthor" name="author" class="form-control"
                                value='<?php echo $_SESSION["name"]; ?>' required="required" autofocus="autofocus"
                                readonly>
                        </div>
                        <div class="col-md-6">
                            <label for="inputseotitle">SEO Title</label>
                            <input type="text" id="inputseotitle" name="seotitle" class="form-control"
                                required="required" autofocus="autofocus" placeholder="SEO Title Giriniz...">
                        </div>
                        <div class="col-md-6">
                            <label for="inputseodesc">SEO Description</label>
                            <input type="text" id="inputseodesc" name="seodesc" class="form-control" required="required"
                                autofocus="autofocus" placeholder="SEO Description Giriniz...">
                        </div>
                        <div class="col-md-6">
                            <label for="inputseokeywords">SEO Keywords</label>
                            <input type="text" id="inputseokeywords" name="seokey" class="form-control"
                                required="required" autofocus="autofocus">
                        </div>
                        <div class="col-md-6">
                            <label for="inputposttitle">Post Title</label>
                            <input type="text" id="inputposttitle" name="posttitle" class="form-control"
                                required="required" autofocus="autofocus">
                        </div>
                        <div class="col-md-12">
                            <label for="ckeditor1">Post Text</label>
                            <textarea type="text" id="ckeditor1" name="posttext" class="ckeditor" required="required"
                                autofocus="autofocus" rows="5"> </textarea>
                        </div>
                        <div class="form-label-group mt-3">
                            <div class="input-group">
                                <input type="file" class="form-control" id="imageupload"
                                    aria-describedby="inputGroupFileAddon04" aria-label="Upload"
                                    style="padding-bottom: 20px;" name="imageupload">
                            </div>
                        </div>

                        <div class="row justify-content-end">
                            <div class="col-sm-4">
                                <button class="btn btn-outline-primary btn-block mt-2" name="create_post" type="submit"
                                    style="width: 100%;">Create</button>
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