<?php include("include/db_connection.php"); 
session_start();


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>MMD-Chennai | Contact Us</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <?Php include "include/sourcelink_css.php" ?>
</head>

<body>
    <?Php include "include/header.php" ?>


    <!-- Page Header Start -->
    <div class="container-fluid page-header py-5 mb-1 wow fadeIn" data-wow-delay="0.1s">

    </div>
    <!-- Page Header End -->
    <div class="container-fluid breadcrum_bg">
        <div class=" py-1 px-5">
            <nav aria-label="breadcrumb animated slideInDown">
                <ol class="breadcrumb breadcrumb_font justify-content-right mb-0">
                    <li class="breadcrumb-item "><a class="" href="#"><i class="fa fa-home"></i></a></li>
                    <li class="breadcrumb-item  active" aria-current="page"> <a class="" href="#">Feedback</a></li>
                </ol>
            </nav>
        </div>
        <!-- <div class="py-1 px-5">
            <div class="one ">
                <h1 class="justify-content-left">Contact Us </h1>
            </div>
        </div> -->
    </div>
    <div class="container-fluid main_title">
        <div class=" py-3 px-5">
            <div class="one ">
                <h1 class="justify-content-left">Feedback</h1>
            </div>
        </div>
    </div>

    <!-- About Start -->
    <div class="container-fluid container-fluid-pg py-4">
        <div class="py-3 px-5">
            <div class="container-contact100">
                <div class="wrap-contact100">
                    <form class="contact100-form validate-form" id="feedback_form">
                        <span class="contact100-form-title">Get in Touch</span>
                        <!-- <div class="wrap-input100 validate-input" data-validate="Name is required">
                            <input class="input100" id="name"  type="text" name="name" placeholder="Name">
                            <label for="label-input100" for="name">
                                <span class="lnr lnr-user"></span>
                            </label>
                        </div> -->
                        <div class="wrap-input100 validate-input" data-validate="Name is required">
                            <input class="input100" id="name" type="text" name="name" placeholder="Name">
                            <label class="label-input100" for="email">
                                <span class="lnr lnr-user"></span>
                            </label>
                        </div>
                        <div class="wrap-input100 validate-input" data-validate="Valid email is required: ex@abc.xyz">
                            <input class="input100" id="email" type="text" name="email" placeholder="Email">
                            <label class="label-input100" for="email">
                                <span class="lnr lnr-envelope"></span>
                            </label>
                        </div>
                        <div class="wrap-input100 validate-input" data-validate="Message is required">
                            <textarea class="input100" name="message" placeholder="Your message..."></textarea>
                        </div>
                        <!-- <div class="wrap-input100 validate-input" data-validate="Phone is required">
                            <input class="input100" id="phone" type="text" name="phone" placeholder="Phone">
                            <label class="label-input100" for="phone">
                            <span class="lnr lnr-phone-handset"></span>
                            </label>
                        </div> -->
                        <div class="d-flex">
                            <div class="wrap-input50 validate-input" data-validate="Enter the Captch code">
                                <input type="text" class="input50" name="captcha_code" id="captcha_img" placeholder="captcha">
                            </div>
                            <img src="captcha/image.php" class="captcha_code" alt="Captcha Image">
                            <!-- <a href="#" id="refresh-captcha"><i class="fa fa-sync-alt"></i></a> -->
                        </div>
                        <div class="container-contact100-form-btn">
                            <div class="wrap-contact100-form-btn">
                            <div class="contact100-form-bgbtn"></div>
                            <button class="contact100-form-btn" type="submit">
                            Submit
                            </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- About End -->



    <?Php include "include/bottom_footer.php";
    include "include/sourcelink_js.php"
    ?>
</body>
<script>
    (function($) {
    "use strict";
    var input = $('.validate-input .input100,.validate-input .input50');


    $('.validate-form').on('submit', function(event) {
        event.preventDefault();
        var check = true;
  5
        for (var i = 0; i < input.length; i++) {
            if (validate(input[i]) == false) {
                showValidate(input[i]);
                check = false;
            }
        }
        
        // return check;
        if (check) {
            // If the form is valid, make an AJAX call
            var formData = $('#feedback_form').serialize(); // Serialize form data
            // console.log(formData);

            $.ajax({
                type: 'POST',
                url: 'webservice/add_feedback.php', // Replace with the actual URL to handle form submission
                data: formData,
                success: function(response) {
                    var res = JSON.parse(response)
                    // console.log(res.status);
                   
                    if (res.status == 'cap_error') {

                        var swal_title = 'Invalid captcha';
                        
                        swal({
                            title: swal_title,
                            confirmButtonText: "Ok",
                            confirmButtonColor: "#041e42",

                        });
                    }else if (res.status == 'ok') {

                    var swal_title = 'Feedback Submitted';

                    swal({
                        title: swal_title,
                        confirmButtonText: "Ok",
                        confirmButtonColor: "#041e42",

                    },function(isConfirm) {
                        location.reload();
                    })
                    }
                    else{
                            swal({
                                title: 'Something went wrong!',
                                confirmButtonText: "Ok",
                                confirmButtonColor: "#041e42",
                                cancelButtonColor: "#DD6B55",
                            });
                    }

                    
                },
                error: function(error) {
                    // Handle the error response
                    console.log('AJAX error:', error);
                }
            });
        }
    });
    $('.validate-form .input100').each(function() {
        $(this).focus(function() {
            hideValidate(this);
        });
    });

    function validate(input) {
        if ($(input).attr('type') == 'email' || $(input).attr('name') == 'email') {
            if ($(input).val().trim().match(/^([a-zA-Z0-9_\-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([a-zA-Z0-9\-]+\.)+))([a-zA-Z]{1,5}|[0-9]{1,3})(\]?)$/) == null) {
                return false;
            }
        } else {
            if ($(input).val().trim() == '') {
                return false;
            }
        }
    }

    function showValidate(input) {
        var thisAlert = $(input).parent();
        $(thisAlert).addClass('alert-validate');
    }

    function hideValidate(input) {
        var thisAlert = $(input).parent();
        $(thisAlert).removeClass('alert-validate');
        // feedback_submit();
    }
})(jQuery);

function feedback_submit() {
    console.log('dsfsd');
}

var refreshButton = document.getElementById("refresh-captcha");
		var captchaImage = document.getElementById("captcha_img");

		refreshButton.onclick = function(event) {
        
			event.preventDefault();
       
			captchaImage.src = 'captcha/image.php?' + Date.now();
		};
</script>

</html>