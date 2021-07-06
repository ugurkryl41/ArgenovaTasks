<?php include ("./includes/header.php"); ?>

<?php include ("./includes/menu.php"); ?>

<nav>
    <div
        style=" width: 100%; height: 300px; background-image: url(images/contact.jpeg); background-repeat: no-repeat; background-size: 100% 100%; ">
        <div class="container">
            <div class="col-3" style="padding-top: 8%;">
                <p class="text-light fw-bold" style="font-size: xx-large ; margin-bottom: -2%;"> Contact </p>
                <a class="text-light fw-bold" href="index.php">Home / <span style="color: cadetblue;"
                        class="fw-bold">Contact</span></a>

            </div>
        </div>
    </div>
</nav>

<section>
    <div class="container contact" style="margin-top: 5%; margin-bottom: 2%;">
        <div class="row justify-content-center">
            <div class="col-sm-4">
                <div class="contact-form bg-primary" style="border-top-right-radius: 15%; border-bottom-left-radius: 15%; margin-right: 3%; padding-left: 3%;">
                    <div class="form-group" style="margin-top: 5%; padding-bottom: 5%;">
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
            <div class="col-sm-8">
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
                                        <input type="email" class="form-control" id="femail" placeholder="Enter Email"
                                            name="femail" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" required>
                                        <span id="test2" style="font-size: 15px; font-weight: bold; color: red;"></span>
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
                                        <span id="test3" style="font-size: 15px; font-weight: bold; color: red;"></span>
                                    </div>
                                    <div class="col">
                                        <input type="tel" class="form-control" id="fphone" placeholder="555 111 00 99"
                                            name="fphone" pattern="[0-9]{10}" required>
                                        <span id="test4" style="font-size: 15px; font-weight: bold; color: red;"></span>
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

<section>
    <div class="row">
        <div class="col mt-4">
            <iframe src="https://maps.google.com/maps?q=rstheme&t=&z=13&ie=UTF8&iwloc=&output=embed" width="100%"
                height="400px"></iframe>
        </div>
    </div>
</section>


<?php include ("./includes/footer.php"); ?>

<script>
var check = true;

$("#formbutton1").on("click", function() {

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
            $('#formcontact').on('submit', function(e) {
                e.preventDefault();
                var form = $('formcontact');
                Swal.fire('İsim alanında argo kelime içermektedir..!').then((result) => {
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
            $('#formcontact').on('submit', function(e) {
                e.preventDefault();
                var form = $('formcontact');
                Swal.fire('Şifre alanında argo kelime içermektedir..!').then((result) => {
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
            $('#formcontact').on('submit', function(e) {
                e.preventDefault();
                var form = $('formcontact');
                Swal.fire('Mail alanında argo kelime içermektedir..!').then((result) => {
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
            $('#formcontact').on('submit', function(e) {
                e.preventDefault();
                var form = $('formcontact');
                Swal.fire('Mesaj alanında argo kelime içermektedir..!').then((result) => {
                    if (result.isConfirmed) {
                        document.getElementById("comment").value = "";
                    }
                })
            });
            check = false;
        }
    }

    if (check != false) {
        $('#formcontact').on('submit', function(e) {
            e.preventDefault();
            var form = $('formcontact');
            Swal.fire({
                title: 'Mesajınız bizlere iletilmiştir',
                text: "Teşekkürler",
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

$("#fname").on("click", function() {
    $("#fname").css("border", "1px solid grey");
    $("#test1").text("");
    check = true;
});
$("#fpassword").on("click", function() {
    $("#fpassword").css("border", "1px solid grey");
    $("#test2").text("");
    check = true;
});
$("#femail").on("click", function() {
    $("#femail").css("border", "1px solid grey");
    $("#test3").text("");
    check = true;
});
$("#fphone").on("click", function() {
    $("#fphone").css("border", "1px solid grey");
    $("#test4").text("");
    check = true;
});
$("#comment").on("click", function() {
    $("#comment").css("border", "1px solid grey");
    check = true;
});

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