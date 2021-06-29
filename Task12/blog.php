<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task-9</title>
    <link rel="stylesheet" href="bootstrap.css">
    <script src="bootstrap.js"></script>

</head>
<style>
    a {
        color: seashell;
        padding-top: 0.3125rem;
        padding-bottom: 0.3125rem;
        margin-right: 1rem;
        font-size: 1.25rem;
        text-decoration: none;
        white-space: nowrap;
    }

    a:hover {
        color: silver;
        text-shadow: 1px 1px steelblue;
    }

    .btn-blog {
        color: #ffffff;
        background-color: dodgerblue;
        border-color: dodgerblue;
        border-radius: 0;
        margin-bottom: 10px
    }

    .btn-blog:hover,
    .btn-blog:focus,
    .btn-blog:active,
    .btn-blog.active,
    .open .dropdown-toggle.btn-blog {
        color: white;
        background-color: dodgerblue;
        border-color: dodgerblue;
    }

    h2 {
        color: dodgerblue;
    }

    .margin10 {
        margin-bottom: 10px;
        margin-right: 10px;
    }

    @media screen and (min-width:1440px) {
        div#header1 {
            display: initial;
        }

        img#logoimg1 {
            width: 100%;
            height: 100%;
        }

        img#imglogo {
            width: 30px;
            height: 30px;
        }
    }

    @media screen and (max-width:1440px) {
        div#header1 {
            display: none;
        }

        img#logoimg1 {
            width: 15vw;
            height: 5vh;
            padding-top: 1vh;
        }

        img#imglogo {
            width: 4vw;
            height: 4vh;
        }
        div#sociallogo
        {
            display: none;
        }
    }

    @media all and (min-width: 1440px) {
        .navbar .nav-item .dropdown-menu {
            display: none;
        }

        .navbar .nav-item:hover .nav-link {}

        .navbar .nav-item:hover .dropdown-menu {
            display: block;
        }

        .navbar .nav-item .dropdown-menu {
            margin-top: 0;
        }
    }
</style>

<body>
    <header>
        <div class="container contact">
            <div class="row justify-content-between">
                <div class="col-3 mt-3" >
                    <img src="images/logo-dark.png" id="logoimg1">
                </div>
                <div class="col-sm-6 mt-3" style="margin-right: 10%;" id="header1">
                    <div class="row justify-content-end">
                        <div class="col-4">
                            <img src="images/location.jpeg" style="float: left; margin-right: 5%;" id="imglogo">
                            <span class="fw-bold" style="font-size: small;">Adress:</span>
                            <br>
                            <span style="font-size: small;">New Jesrsy, 1201, USA</span>
                        </div>
                        <div class="col-3">
                            <img src="images/home.jpg" style="float: left; margin-right: 5%;" id="imglogo">
                            <span class="fw-bold" style="font-size: small;">Email:</span>
                            <br>
                            <span style="font-size: small;">info@info.com</span>
                        </div>
                        <div class="col-3">
                            <img src="images/phone.jpg" style="float: left; margin-right: 5%;" id="imglogo">
                            <span class="fw-bold" style="font-size: small;">Phone:</span>
                            <br>
                            <span style="font-size: small;">(123) 222-8888</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container">
            <a class="navbar-brand" href="#"></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#main_nav"
                aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="main_nav">
                <ul class="navbar-nav">
                    <li class="nav-item active"> <a class="nav-link" href="#" style="color: cornsilk;">Home +</a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#"> Multipages</a></li>
                            <li><a class="dropdown-item" href="#">  Onepages </a></li>
                        </ul>
                    </li>
                    <li class="nav-item"><a class="nav-link" href="#" style="color: cornsilk;"> About </a></li>
                    <li class="nav-item"><a class="nav-link" href="#" style="color: cornsilk;"> Services +</a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#"> Software Development</a></li>
                            <li><a class="dropdown-item" href="#">  Web Development </a></li>
                        </ul>
                    </li>
                    <li class="nav-item"><a class="nav-link" href="#" style="color: cornsilk;"> Pages +</a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#"> Services</a></li>
                            <li><a class="dropdown-item" href="#">  Our Team </a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link  dropdown-toggle" href="blog.php" data-bs-toggle="dropdown"
                            style="color: cornsilk;"> Blog </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="blog.php"> Blog</a></li>
                            <li><a class="dropdown-item" href="blog-details.php"> Blog Details </a></li>
                        </ul>
                    </li>
                    <li class="nav-item"><a class="nav-link" href="contact.php" style="color: cornsilk;"> Contact </a></li>
                </ul>
            </div> <!-- navbar-collapse.// -->
            <div id="sociallogo" style="margin-right: 10%;" >
                <form class="d-flex" >
                    <div class="row justify-content-start">
                        <div class="col align-self-center">
                            <a href="#"><img src="images/search.png" alt="" id="imglogo">
                                <span class="text-light fw-bold"> | </span></a>
                            <a href="#"><img src="images/f.png" alt="" id="imglogo"></a>
                            <a href="#"><img src="images/t.png" alt="" id="imglogo"></a>
                            <a href="#"><img src="images/i.png" alt="" id="imglogo"></a>
                        </div>
                    </div>
                </form>
            </div>
        </div> <!-- container-fluid.// -->
    </nav>
    <!--/.Navbar-->
    <nav>
        <div
            style=" width: 100%; height: 300px; background-image: url(images/office.jpg); background-repeat: no-repeat; background-size: 100% 100%; ">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-3" style="padding-top: 8%;  text-align: center;">
                        <p class="text-light fw-bold" style="font-size: xx-large ; margin-bottom: -2%;"> Blog </p>
                        <a class="text-light" href="index.php">Home / <span style="color: cadetblue;"
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
                        <div class="col-md-11">
                            <img src="images/office.jpg" alt="post img"
                                class="pull-left img-responsive thumb margin10 img-thumbnail">
                            <h3>Open Source Job Report Show More Openings Fewer</h3>
                            <article>
                                <p class="mt-2">
                                    Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem
                                    Ipsum has been the industry's standard dummy text
                                    ever since the 1500s, when..
                                </p>
                            </article>
                            <a class="btn btn-blog pull-right marginBottom10" href="blog-details.html">READ MORE</a>
                        </div>
                    </div>

                    <div class="row mt-4">
                        <div class="col-md-11">
                            <img src="images/office.jpg" alt="post img"
                                class="pull-left img-responsive thumb margin10 img-thumbnail">
                            <h3>Open Source Job Report Show More Openings Fewer</h3>
                            <article>
                                <p class="mt-2">
                                    Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem
                                    Ipsum has been the industry's standard dummy text
                                    ever since the 1500s, when..
                                </p>
                            </article>
                            <a class="btn btn-blog pull-right marginBottom10" href="blog-details.html">READ MORE</a>
                        </div>
                    </div>

                    <div class="row mt-4">
                        <div class="col-md-11">
                            <img src="images/office.jpg" alt="post img"
                                class="pull-left img-responsive thumb margin10 img-thumbnail">
                            <h3>Open Source Job Report Show More Openings Fewer</h3>
                            <article>
                                <p class="mt-2">
                                    Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem
                                    Ipsum has been the industry's standard dummy text
                                    ever since the 1500s, when..
                                </p>
                            </article>
                            <a class="btn btn-blog pull-right marginBottom10" href="blog-details.html">READ MORE</a>
                        </div>
                    </div>
                </div>

                <div class="col-sm-3">

                    <div class="row align-items-center"
                        style="background-color: ghostwhite; margin-top: 3%; height: 100px;">
                        <form class="d-flex" style="height: 50%; ">
                            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                            <button class="btn btn-outline-primary" type="submit">Search</button>
                        </form>
                    </div>

                    <div class="row" style=" background-color: ghostwhite; margin-top: 10%;">
                        <h3 class="fw-bold">Latest Posts</h3>
                        <hr style="width: 30%; color: blue; height: 3px; margin-left: 5%;" class="fw-bold">
                        <hr style="color: grey;">
                        <div class="row">
                            <div class="row g-0 align-items-center">
                                <div class="col-md-4">
                                    <img src="images/office.jpg" alt="..." class="img-thumbnail">
                                </div>
                                <div class="col-md-8">
                                    <div class="card-body">
                                        <p class="card-text"> Lorem Ipsum is simply dummy text of the printing and
                                            typesetting industry.</p>
                                        <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr style="color: grey;">
                        <div class="row">
                            <div class="row g-0 align-items-center">
                                <div class="col-md-4">
                                    <img src="images/office.jpg" alt="..." class="img-thumbnail">
                                </div>
                                <div class="col-md-8">
                                    <div class="card-body">
                                        <p class="card-text"> Lorem Ipsum is simply dummy text of the printing and
                                            typesetting industry.</p>
                                        <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr style="color: grey;">

                        <div class="row">
                            <div class="row g-0 align-items-center">
                                <div class="col-md-4">
                                    <img src="images/office.jpg" alt="..." class="img-thumbnail">
                                </div>
                                <div class="col-md-8">
                                    <div class="card-body">
                                        <p class="card-text"> Lorem Ipsum is simply dummy text of the printing and
                                            typesetting industry.</p>
                                        <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr style="color: grey;">

                        <div class="row">
                            <div class="row g-0 align-items-center">
                                <div class="col-md-4">
                                    <img src="images/office.jpg" alt="..." class="img-thumbnail">
                                </div>
                                <div class="col-md-8">
                                    <div class="card-body">
                                        <p class="card-text"> Lorem Ipsum is simply dummy text of the printing and
                                            typesetting industry.</p>
                                        <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
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
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="page-footer font-small blue pt-4">
        <div class="container-fluid text-md-left">
            <div class="row align-items-center mt-4 ">
                <!-- Grid row -->
                <div class="row justify-content-center">
                    <!-- Grid column -->
                    <div class="col-md-2 mt-md-0 mt-3">
                        <img src="images/logo-dark.png" class="rounded mx-auto d-block" alt="" width="80%" height="20%"
                            style="align-self: start;">
                        <br>
                        <p>
                            Sedut perspiciatis unde omnis iste natus error sitlutem acc usantium doloremque denounce
                            with
                            illo inventore veritatis
                        </p>
                    </div>
                    <!-- Grid column -->
                    <hr class="clearfix w-100 d-md-none pb-3">
                    <!-- Grid column -->
                    <div class="col-md-2 mb-md-0 mb-3">
                        <h5 class="fw-bold"> IT Services </h5>
                        <a href="" class="link-secondary"> Software Development </a>
                        <a href="" class="link-secondary"> Web Development </a>
                        <a href="" class="link-secondary"> Analytic Solutions </a>
                        <a href="" class="link-secondary"> Cloud and DevOps</a>
                        <a href="" class="link-secondary"> Project Design</a>
                    </div>
                    <!-- Grid column -->
                    <!-- Grid column -->
                    <div class="col-md-2 mb-md-0 mb-3">
                        <h5>Contact Info</h5>
                        <p>374 FA Tower, William S Blvd 2721, IL, USA</p>
                        <p>(+880)155-69569</p>
                        <p>support@rstheme.com</p>
                        <p>Opening Hours: 10:00 - 18:00</p>
                    </div>
                    <!-- Grid column -->
                    <!-- Grid column -->
                    <div class="col-md-2 mb-md-0 mb-3">
                        <h5>Newsletter</h5>
                        <p>We denounce with righteous and in and dislike men who are so beguiled and demo realized.</p>
                        <form class="d-flex">
                            <input class="form-control me-2" type="search" placeholder="Your Mail Adress">
                            <button class="btn btn-outline-primary" type="submit">Sign</button>
                        </form>
                    </div>
                    <!-- Grid column -->
                </div>
                <!-- Grid row -->
            </div>
        </div>
        <!-- Copyright -->
        <div class="footer-copyright text-center py-3">© 2020 Copyright:

        </div>
        <!-- Copyright -->
    </footer>
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            // make it as accordion for smaller screens
            if (window.innerWidth > 992) {

                document.querySelectorAll('.navbar .nav-item').forEach(function (everyitem) {

                    everyitem.addEventListener('mouseover', function (e) {

                        let el_link = this.querySelector('a[data-bs-toggle]');

                        if (el_link != null) {
                            let nextEl = el_link.nextElementSibling;
                            el_link.classList.add('show');
                            nextEl.classList.add('show');
                        }

                    });
                    everyitem.addEventListener('mouseleave', function (e) {
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