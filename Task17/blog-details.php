<?php include ("./includes/db.php"); session_start(); ?>

<?php 
    if(isset($_POST['postid']))
    {
        $intpostid=intval($_POST['postid']);     
    }
    if(empty($intpostid))
    {
        if(empty($_SESSION['pid']))
        {
            $_SESSION['pid']=1;
        }
    }
    else{
        $_SESSION['pid'] = $intpostid;
    }    
    
    $pid = intval($_SESSION['pid']);


$query  = $db->query("SELECT * FROM posts where post_id=$pid",PDO::FETCH_ASSOC);
while($row = $query->fetch(PDO::FETCH_ASSOC))
{
   $postid1 = $row["post_id"];
   $posttitle = $row["post_title"];
   $postauthor = $row["post_author"];
   $postdate = $row["post_date"];
   $postimage = $row["post_image"];
   $posttext = $row["post_text"];
}

    $query2  = $db->query("SELECT count(*) as 'test' FROM posts AS p JOIN comments AS c ON c.postid = p.post_id
                 Where c.postid = $postid1 GROUP BY c.postid ORDER BY c.cdate Desc",PDO::FETCH_ASSOC);

    $postcommentcount= $query2->fetchColumn();
    if(empty($postcommentcount)) {  $postcommentcount = 0;    }
?>

<?php 
if(isset($_POST["comsubmit"]))
{   
   $commentname =$_POST["fname"];  
   $commentmail =$_POST["femail"];
   $commenttext =$_POST["comment"];
   $commentdate = date("Y/m/d");
  
   
   $query  = $db->query("INSERT INTO comments (postid, vname, mail,ctext,cdate) 
                           VALUES ('$pid','$commentname','$commentmail','$commenttext','$commentdate')",PDO::FETCH_ASSOC);
   if($query == TRUE)
   {                   
       echo '<script>window.location.href = "http://localhost/staj/blog-details.php";</script>';
   }
   else
   {
   $error_message = "Oops! something wrong.";
   }

}
?>

<?php include ("./includes/header.php"); ?>

<?php include ("./includes/menu.php"); ?>

<nav>
    <div
        style=" width: 100%; height: 300px; background-image: url(images/Blog-header.jpg); background-repeat: no-repeat; background-size: 100% 100%; filter: brightness(100%); ">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-sm-6" style="padding-top: 5%;  text-align: center;">
                    <p class="fw-bold" style="font-size: xx-large ; color: dodgerblue; filter: brightness(100%); ">
                        <?php echo $posttitle ?> </p>
                    <a class="text-light mt-4 fw-bold" href="index.php">Home / <a class="text-light" href="blog.php">Blog
                            / <a class="text-light fw-bold" href="#">It Services /
                            </a> </a> </a>
                    <span style="color: steelblue; font-size: small;" class="fw-bold"><?php echo $posttitle ?></span>
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
                    <div class="col-md-11">

                        <img src="images/<?php echo $postimage ?>" alt="post img"
                            class="pull-left img-responsive thumb margin10 img-thumbnail">
                        <h3><?php echo $posttitle ?></h3>
                        <article>
                            <p>
                                <span>Date: <?php echo "$postdate" ?> </span>
                                <span>Author: <?php echo"$postauthor" ?> </span>
                                <span>Comment: <?php echo"$postcommentcount" ?> </span>
                            </p>
                            <p class="mt-2">
                                <?php echo"$posttext" ?>
                            </p>
                        </article>
                    </div>
                </div>
                <div class="row mt-4 justify-content-end">
                    <?php
                            $k=1;
                            $query  = $db->query("SELECT * FROM comments where postid=$pid ORDER BY cdate DESC",PDO::FETCH_ASSOC);
                            while($row = $query->fetch(PDO::FETCH_ASSOC))
                            {
                               $commentname= $row["vname"];
                               $commentmail = $row["mail"];
                               $commenttext = $row["ctext"];
                               $commentdate = $row["cdate"];
                          
                         ?>
                    <div class="col-sm-10">
                        <div class="col-sm-10 mt-4">
                            <fieldset style="padding: 15px;">
                                <legend> Comment <?php echo $k; $k++; ?></legend>
                                <img src="images/person.png" alt="post img" class="img-thumbnail"
                                    style="witdh: 30px; height: 50px; float:left; margin-right:10px">
                                <h6><?php echo $commentname; ?></h6>
                                <h6><?php echo $commentdate; ?></h6>
                                <article class="mt-2">
                                    <p style="padding-left: 20px;"><?php echo $commenttext; ?></p>
                                </article>
                            </fieldset>
                        </div>
                    </div>
                    <?php } ?>
                </div>
                <div class="row mt-4">
                    <div class="col-md-11">
                        <hr>
                        <div class="row justify-content-md-center">
                            <div class="col-sm-10">
                                <div class="contact-form">
                                    <form action="" method="post"> <span class="fw-bold"
                                            style="font-size: x-large;">Leave a Reply</span>

                                        <div class="form-group">
                                            <div class="col-sm-12 mt-3">
                                                <div class="row">
                                                    <div class="col">
                                                        <input type="text" class="form-control" id="fname"
                                                            placeholder="Enter Name*" name="fname" required>
                                                    </div>
                                                    <div class="col">
                                                        <input type="email" class="form-control" id="femail"
                                                            placeholder="Enter Email*" name="femail" required>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="col-sm-12  mt-3">
                                                <textarea class="form-control" rows="5" id="comment"
                                                    name="comment"></textarea>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="col-sm-offset-12 col-sm-12 mt-3">
                                                <div class="row justify-content-end">
                                                    <div class="col-3">
                                                        <button type="submit" class="btn btn-outline-primary"
                                                            style="width: 100%;" name="comsubmit">Submit
                                                            Now</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
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