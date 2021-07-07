<?php
 ob_start();
 session_start();
 if(!isset($_SESSION["oturum"])){ 
    header("location:login.php");
 }

 include ("../includes/db.php");
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
                    <div class="col-sm-12">
                        <h1 style="color:blue;">POST LIST</h1>
                    </div>
                    <hr>
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
                    ?>
                    <div class="card mb-3 mt-4">
                        <div class="row g-0">
                            <div class="col-md-4 mt-4">
                                <img src="../images/<?php echo $post_image ?>" class="img-fluid rounded-start"
                                    alt="...">
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <h5 class="card-title"><?php echo $post_title ?></h5>
                                    <p class="card-text"><?php echo $post_text ?></p>
                                    <p class="card-text"><small class="text-muted"><?php echo $post_date ?></small></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php } $k++;?>
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
</body>

</html>