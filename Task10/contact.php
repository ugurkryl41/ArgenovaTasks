<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task-9</title>
    <link rel="stylesheet" href="bootstrap.css">

    <script src="bootstrap.js"></script>
    <script src="jquery-3.6.0.min.js"></script>
    <!-- SweetAlert2 -->
    <script src="node_modules/sweetalert2/dist/sweetalert2.all.min.js"></script>
    <script src="node_modules/sweetalert2/dist/sweetalert2.js"></script>
    <link rel="stylesheet" href="node_modules/sweetalert2/dist/sweetalert2.min.css">


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

    @media screen and (min-width:1440px) {
        div#header1 {
            display: initial;
        }

        img#logoimg1 {
            width: 100%;
            height: 80%;
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
                <div class="col-3 mt-3">
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
    <nav>
        <div
            style=" width: 100%; height: 300px; background-image: url(images/contact.jpeg); background-repeat: no-repeat; background-size: 100% 100%; ">
            <div class="container">
                <div class="col-3" style="padding-top: 8%;">
                    <p class="text-light fw-bold" style="font-size: xx-large ; margin-bottom: -2%;"> Contact </p>
                    <a class="text-light" href="index.php">Home / <span style="color: cadetblue;"
                            class="fw-bold">Contact</span></a>

                </div>
            </div>
        </div>
    </nav>
    <section>
        <div class="container contact" style="margin-top: 5%; margin-bottom: 3%;">
            <div class="row justify-content-center">
                <div class="col-md-4 bg-primary"
                    style="border-top-right-radius: 15%; border-bottom-left-radius: 15%; margin-right: 3%; padding-left: 3%;">
                    <div class="contact-form">
                        <div class="form-group" style="margin-top: 10%;">
                            <div class="col-sm-10 mt-3">
                                <span class="text-light" style="font-size: x-large;">LET'S TALK</span>
                            </div>
                            <div class="col-sm-10 mt-3">
                                <span class="text-light fw-bold" style="font-size: xx-large;">Speak With Expert
                                    Engineers.</span>
                            </div>
                            <div class="col-sm-10 mt-4" style="margin-left: 5%;">
                                <div class="row mt-2">
                                    <div class="col-3">
                                        <img src="images/home.jpg" height="50px" width="40px">
                                    </div>
                                    <div class="col-7">
                                        <div class="col">
                                            <span class="text-light fw-bold">Email: </span>
                                        </div>
                                        <div class="col">
                                            <span class="text-light">info@info.com</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-2">
                                    <div class="col-3">
                                        <img src="images/phone.jpg" height="50px" width="40px">
                                    </div>
                                    <div class="col-7">
                                        <div class="col">
                                            <span class="text-light fw-bold">Phone: </span>
                                        </div>
                                        <div class="col">
                                            <span class="text-light">(123) 222-8888</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-2">
                                    <div class="col-3">
                                        <img src="images/location.jpeg" height="50px" width="40px">
                                    </div>
                                    <div class="col-9">
                                        <div class="col">
                                            <span class="text-light fw-bold">Adress: </span>
                                        </div>
                                        <div class="col">
                                            <span class="text-light">New Jesrsy, 1201, USA</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <form action="contact.html" id="formcontact" method="POST">
                        <div class="contact-form">
                            <span class="fw-bold" style="font-size: x-large;">Fill The Form Below</span>
                            <div class="form-group">
                                <div class="col-sm-10 mt-3">
                                    <div class="row">
                                        <div class="col">
                                            <input type="text" class="form-control" id="fname" placeholder="Enter Name"
                                                name="fname" required> <span id="test1"
                                                style="font-size: 15px; font-weight: bold; color: red;"></span>
                                        </div>
                                        <div class="col">
                                            <input type="email" class="form-control" id="femail"
                                                placeholder="Enter Email" name="femail"
                                                pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" required>
                                            <span id="test2"
                                                style="font-size: 15px; font-weight: bold; color: red;"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-10 mt-3">
                                    <div class="row">
                                        <div class="col">
                                            <input type="password" class="form-control" id="fpassword"
                                                placeholder="Enter Password" name="fpassword"
                                                pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" required>
                                            <span id="test3"
                                                style="font-size: 15px; font-weight: bold; color: red;"></span>
                                        </div>
                                        <div class="col">
                                            <input type="tel" class="form-control" id="fphone"
                                                placeholder="555 111 00 99" name="fphone" pattern="[0-9]{10}" required>
                                            <span id="test4"
                                                style="font-size: 15px; font-weight: bold; color: red;"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-5 mt-3">
                                    <select class="form-select" aria-label="Default select example">
                                        <option selected>Gender</option>
                                        <option value="1">Woman</option>
                                        <option value="2">Man</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-10  mt-3">
                                    <textarea class="form-control" rows="5" id="comment" name="comment"
                                        placeholder="Your Message Here" required></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-offset-10 col-sm-10 mt-3">
                                    <div class="row justify-content-end">
                                        <div class="col-3">
                                            <button type="submit" class="btn btn-outline-primary" style="width: 100%;"
                                                id="formbutton1">Submit Now</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="page-footer font-small blue pt-4">
        <div class="container-fluid text-md-left">
            <div class="row">
                <div class="col mt-4">
                    <iframe src="https://maps.google.com/maps?q=rstheme&t=&z=13&ie=UTF8&iwloc=&output=embed"
                        width="100%" height="400px"></iframe>
                </div>
            </div>
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
        <div class="footer-copyright text-center py-3">?? 2020 Copyright:

        </div>
        <!-- Copyright -->
    </footer>
    <script>

        var check = true;

        $("#formbutton1").on("click", function () {

            if ($("#fname").val() == "") {
                $("#fname").css("border", "2px solid red");
                $("#test1").text("Gerekli*");
                check = false;
            }
            if ($("#fpassword").val() == "") {
                $("#fpassword").css("border", "2px solid red");
                $("#test2").text("Gerekli*");
                check = false;
            }
            if ($("#femail").val() == "") {
                $("#femail").css("border", "2px solid red");
                $("#test3").text("Gerekli*");
                check = false;
            }
            if ($("#fphone").val() == "") {
                $("#fphone").css("border", "2px solid red");
                $("#test4").text("Gerekli*");
                check = false;
            }
            if ($("#comment").val() == "") {
                $("#comment").css("border", "2px solid red");
                check = false;
            }

            const argokelimeler = ["deli", "aptal", "manyak"];

            for (let i = 0; i < argokelimeler.length; i++) {

                var strfname = $("#fname").val();
                var resfname = strfname.search(argokelimeler[i]);
                if (resfname != -1) {
                    $('#formcontact').on('submit', function (e) {
                        e.preventDefault();
                        var form = $('formcontact');
                        Swal.fire('??sim alan??nda argo kelime i??ermektedir..!').then((result) => {
                            if (result.isConfirmed) {
                                document.getElementById('fname').value = "";
                            }
                        })
                    });
                    check = false;
                }

                var strfpassword = $("#fpassword").val();
                var resfpassword = strfpassword.search(argokelimeler[i]);
                if (resfpassword != -1) {
                    $('#formcontact').on('submit', function (e) {
                        e.preventDefault();
                        var form = $('formcontact');
                        Swal.fire('??ifre alan??nda argo kelime i??ermektedir..!').then((result) => {
                            if (result.isConfirmed) {
                                document.getElementById('fpassword').value = "";
                            }
                        })
                    });
                    check = false;
                }

                var strfemail = $("#femail").val();
                var resfemail = strfemail.search(argokelimeler[i]);
                if (resfemail != -1) {
                    $('#formcontact').on('submit', function (e) {
                        e.preventDefault();
                        var form = $('formcontact');
                        Swal.fire('Mail alan??nda argo kelime i??ermektedir..!').then((result) => {
                            if (result.isConfirmed) {
                                document.getElementById('femail').value = "";
                            }
                        })
                    });
                    check = false;
                }

                var strcomment = document.getElementById("comment").value;
                var rescomment = strcomment.search(argokelimeler[i]);
                if (rescomment != -1) {
                    $('#formcontact').on('submit', function (e) {
                        e.preventDefault();
                        var form = $('formcontact');
                        Swal.fire('Mesaj alan??nda argo kelime i??ermektedir..!').then((result) => {
                            if (result.isConfirmed) {
                                document.getElementById("comment").value = "";
                            }
                        })
                    });
                    check = false;
                }
            }

            if (check != false) {
                $('#formcontact').on('submit', function (e) {
                    e.preventDefault();
                    var form = $('formcontact');
                    Swal.fire({
                        title: 'Mesaj??n??z bizlere iletilmi??tir',
                        text: "Te??ekk??rler",
                        icon: 'success',
                        showCancelButton: false,
                        confirmButtonColor: '#3085d6',
                        confirmButtonText: 'Kapat'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            window.location.reload();
                        }
                    })
                });
            }
        });

        $("#fname").on("click", function () {
            $("#fname").css("border", "1px solid grey");
            $("#test1").text("");
            check = true;
        });
        $("#fpassword").on("click", function () {
            $("#fpassword").css("border", "1px solid grey");
            $("#test2").text("");
            check = true;
        });
        $("#femail").on("click", function () {
            $("#femail").css("border", "1px solid grey");
            $("#test3").text("");
            check = true;
        });
        $("#fphone").on("click", function () {
            $("#fphone").css("border", "1px solid grey");
            $("#test4").text("");
            check = true;
        });
        $("#comment").on("click", function () {
            $("#comment").css("border", "1px solid grey");
            check = true;
        });

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