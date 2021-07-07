<?php include ("./includes/db.php"); session_start(); session_destroy();?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">  
    <meta name="description" content="">
    <meta name="keywords" content="">
    <title>Task-18</title>
    <?php include ("./includes/link.php"); ?>
</head>

<?php include ("./includes/header.php"); ?>

<?php include ("./includes/menu.php"); ?>

<nav>
    <div
        style=" width: 100%; height: 300px; background-image: url(images/Blog-header.jpg); background-repeat: no-repeat; background-size: 100% 100%; ">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-3" style="padding-top: 8%;  text-align: center;">
                    <p class="text-primary fw-bold" style="font-size: xx-large ; margin-bottom: -2%;"> Blog </p>
                    <a class="text-light fw-bold" href="blog.php">Home / <span style="color: cadetblue;"
                            class="fw-bold">Blog</span></a>
                </div>
            </div>
        </div>
    </div>
</nav>

<section>
    <div class="container" style="margin-top: 5%; margin-bottom: 3%;">
        <div class="row justify-content-md-center">
            <div class="col-sm-9">
                <div class="row">
                    <?php                        
                        $query  = $db->query("SELECT * FROM posts",PDO::FETCH_ASSOC);
                        while($row = $query->fetch(PDO::FETCH_ASSOC))
                        {                           
                           $postid = $row["post_id"];
                           $posttitle = $row["post_title"];
                           $postauthor = $row["post_author"];
                           $postdate = $row["post_date"];
                           $postimage = $row["post_image"];
                           $posttext = $row["post_text"];


                           $query2  = $db->query("SELECT count(*) as 'test'
                           FROM posts AS p
                           JOIN comments AS c
                           ON c.postid = p.post_id
                           Where c.postid = $postid
                           GROUP BY c.postid
                           ORDER BY c.cdate Desc",PDO::FETCH_ASSOC);

                           $postcommentcount= $query2->fetchColumn();

                           if(empty($postcommentcount))
                           {
                               $postcommentcount = 0;
                           }
                                                   
                        ?>

                    <div class="col-md-11">
                        <img src="images/<?php echo"$postimage" ?>" alt="post img"
                            class="pull-left img-responsive thumb margin10 img-thumbnail">
                        <h3><?php echo"$posttitle" ?></h3>
                        <article>
                            <p>
                                <span>Date: <?php echo "$postdate" ?> </span>
                                <span>Author: <?php echo"$postauthor" ?> </span>
                                <span>Comments: <?php echo"$postcommentcount" ?> </span>
                            </p>
                            <p class="mt-2" id="two-dot">
                                <?php echo"$posttext" ?>
                            </p>

                        </article>
                        <form action="blog-details.php" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <input type="hidden" class="form-control" name="postid"
                                    value="<?php echo $row["post_id"];?>">

                                <input type="submit" class="btn btn-blog pull-right marginBottom10" name="postsent"
                                    value="READ MORE">
                            </div>
                        </form>
                    </div>
                    <?php } ?>
                </div>
            </div>
            <?php include ("./includes/sidebar.php"); ?>
        </div>
    </div>
</section>

<?php include ("./includes/footer.php"); ?>

<script>
document.addEventListener("DOMContentLoaded", function() {
    // make it as accordion for smaller screens
    if (window.innerWidth > 992) {

        document.querySelectorAll('.navbar .nav-item').forEach(function(everyitem) {

            everyitem.addEventListener('mouseover', function(e) {

                let el_link = this.querySelector('a[data-bs-toggle]');

                if (el_link != null) {
                    let nextEl = el_link.nextElementSibling;
                    el_link.classList.add('show');
                    nextEl.classList.add('show');
                }

            });
            everyitem.addEventListener('mouseleave', function(e) {
                let el_link = this.querySelector('a[data-bs-toggle]');

                if (el_link != null) {
                    let nextEl = el_link.nextElementSibling;
                    el_link.classList.remove('show');
                    nextEl.classList.remove('show');
                }


            })
        });

    }
    // end if innerWidth
});
</script>
</body>

</html>