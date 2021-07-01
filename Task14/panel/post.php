<?php 
 include ("../db.php"); 
 ob_start();
 session_start();
 if(!isset($_SESSION["oturum"])){ 
    header("location:login.php");
 }
 if(isset($_POST["create"]))
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
    $comment = 0;
    
    $query  = $db->query("INSERT INTO posts (post_title, post_author, post_date,post_image,post_text,post_comment_number) 
                            VALUES ('$title','$author','$date','$image','$text',$comment)",PDO::FETCH_ASSOC);
    if($query == TRUE)
    {                   
        echo '<script>window.location.href = "http://localhost/staj/blog.php";</script>';
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
    <title>Post Create</title>
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
</head>

<body>
    <div class="container jumbatron">
        <div class="row justify-content-center">
            <div class="col-sm-6 align-self-center" style="margin-top: 20vh;">
                <div class="card card-login mx-auto mt-5 align-self-center">
                    <div class="card-header">
                        New Post
                    </div>
                    <div class="card-body">
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
                                    <label for="inputposttext">Post Text</label>
                                    <textarea type="text" id="inputposttext" name="posttext" class="form-control"
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
                                    <button class="btn btn-outline-primary btn-block mt-2" name="create" type="submit"
                                        style="width: 100%;">Create</button>
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