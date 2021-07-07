<div class="col-sm-3">
    <div class="row align-items-center" style="background-color: ghostwhite; margin-top: 3%; height: 100px;">
        <form class="d-flex" style="height: 50%; ">
            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-primary" type="submit">Search</button>
        </form>
    </div>

    <div class="row" style=" background-color: ghostwhite; margin-top: 10%;">
        <h3 class="fw-bold">Latest Posts</h3>
        <hr style="width: 30%; color: blue; height: 3px; margin-left: 5%;" class="fw-bold">
        <hr style="color: grey;">
        <?php                        
        $query1  = $db->query("SELECT * FROM posts where post_date BETWEEN DATE_SUB( CURDATE() ,INTERVAL 10 DAY ) AND CURDATE()",PDO::FETCH_ASSOC);
        while($row1 = $query1->fetch(PDO::FETCH_ASSOC))
        {                           
           $postid1 = $row1["post_id"];
           $posttitle1 = $row1["post_title"];
           $postauthor1 = $row1["post_author"];
           $postdate1 = $row1["post_date"];
           $postimage1 = $row1["post_image"];
           $posttext1 = $row1["post_text"];
        
        ?>
        <div class="row">
            <div class="row g-0">
                <div class="col">
                    <img src="images/office.jpg" alt="..." class="mt-2" id="sola-kaydir">
                    <p id="three-dot"><?php echo $posttitle1; ?></p>
                </div>
            </div>
            <div class="row g-0">
                <p class="d-flex justify-content-center"> Author: <?php echo $postauthor1 ?> - Date:
                    <?php echo $postdate1 ?></p>
            </div>
            <hr style="color: grey;">
        </div>
        <?php } ?>
    </div>

    <div class="row" style=" background-color: ghostwhite; margin-top: 10%;">

        <h3 class="fw-bold">Categories</h3>
        <hr style="width: 30%; color: blue; height: 3px; margin-left: 5%;" class="fw-bold">
        <hr style="color: grey; ">
        <div class="col-md-2 mb-md-0 mb-3">
            <a href="" class="link-secondary"> Software Development </a>
        </div>
        <hr style="color: grey; ">
        <div class="col-md-2 mb-md-0 mb-3">
            <a href="" class="link-secondary"> Web Development </a>
        </div>
        <hr style="color: grey; ">
        <div class="col-md-2 mb-md-0 mb-3">
            <a href="" class="link-secondary"> Analytic Solutions </a>
        </div>
        <hr style="color: grey; ">
        <div class="col-md-2 mb-md-0 mb-3">
            <a href="" class="link-secondary"> Cloud and DevOps</a>
        </div>
        <hr style="color: grey; ">
        <div class="col-md-2 mb-md-0 mb-3">
            <a href="" class="link-secondary"> Project Design</a>
        </div>
    </div>
</div>