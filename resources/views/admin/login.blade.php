<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>{{ config('app.name') }} | Admin Login</title>

	<link href="{{ url('/') }}/public/assets/frontend/images/favicon/favicon.png" rel="icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    {{-- Toastr Js Css --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" integrity="sha512-vKMx8UnXk60zUwyUnUPM3HbQo8QfmNx7+ltw8Pm5zLusl1XIfwcxo8DbWCqMGKaWeNxWA8yrx5v3SaVpMvR3CA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    {{-- End Toastr Js Css --}}

    <style type="text/css">
        body{
            height: 100vh;
            background: url("{{ url('/public/assets/admin/images/admin_bg.webp') }}");
            background-repeat: no-repeat;
            background-size: cover;
            background-position: center;
            color:#ffff;
        }
        .admin_head_wrap{
            box-shadow: rgba(60, 64, 67, 0.3) 0px 1px 2px 0px, rgba(60, 64, 67, 0.15) 0px 1px 3px 1px;
            padding: 20px;
        }
        .login_card_box{
            box-shadow: rgba(60, 64, 67, 0.3) 0px 1px 2px 0px, rgba(60, 64, 67, 0.15) 0px 1px 3px 1px;
            padding: 20px;
            border-radius: 10px;
        }
        .b-1{
            background-color: #183768;
        }
        .b-2{
            background-color: #fdc305;
        }
        .b-3{
            background-color: #e30613;
        }
        .b-4{
            background-color: #1ba038;
        }
        .h-410{
            height: 410px;
        }
        .login_cards_wrapper{
            /* height: 100vh; */
            height: 475px;
            display: flex;
            align-items: center;
        }
        .login_cards_wrapper a{
            text-decoration: none;
        }
        .login_card_box{
            transition: 0.3s ease-in;
        }
        .login_card_box:hover{
            box-shadow: rgba(0, 0, 0, 0.25) 0px 14px 28px, rgba(0, 0, 0, 0.22) 0px 10px 10px;
            transform: translateY(-5px);
        }
        .admin-login-card, .service-provider-login-card{
            cursor:pointer;
        }

        /* request loader css start */
        .request-loader {
            position: fixed;
            top: 0;
            left: 0;
            height: 100%;
            width: 100%;
            background-color: #0000007a;
            z-index: 10000;
            display: none;
        }

        .request-loader img {
            position: fixed;
            display: none;
            width: 80px;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
        }

        .request-loader.show {
            display: block;
        }

        .request-loader.show img {
            display: block;
        }
        /* request loader css end */

        @media (max-width:768px) {
            .admin_logo img{
                height: 50px;
            }
        }
    </style>
</head>
<body>
    <section class="login_cards_wrapper">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-12">
                    <div class="login_card_box m-2 b-1 h-410 d-flex align-items-center justify-content-center admin-login-card">
                        <div class="icon_box text-center">
                            <img src="{{ url('/') }}/public/assets/admin/images/admin.png" height="90px" alt="icons">
                            <h4 class="mt-3 text-white"><b>Admin Login</b></h4>
                        </div>
                        <div class="row d-flex align-items-center justify-content-center d-none">
                            <div class="col-md-8 mt-3">
                                <form class="ajaxForm" action="{{ route('admin.login.post') }}" method="POST">
                                    @csrf
                                    <div class="mb-3">
                                        <label for="email" class="form-label"><b>Email :</b></label>
                                        <input type="email" class="form-control" placeholder="Enter registered email" name="email">
                                    </div>
                                    <div class="mb-3">
                                        <label for="password" class="form-label"><b>Password :</b></label>
                                        <input type="password" class="form-control" placeholder="Enter your password" name="password">
                                    </div>
                                    <div class="text-center">
                                        <button type="submit" class="btn btn-success submitBtn">Login</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <footer class="footer mt-3 pt-5">
        <div class="container-fluid clearfix text-center">
            <span class="text-dark d-block text-center text-sm-left d-sm-inline-block">Copyright © {{ date('Y') }} <a href="{{ route('frontend.index') }}" class="text-decoration-none">{{ config('app.name') }}</a>. All rights reserved.</span>
        </div>
    </footer>

    {{-- Loader --}}
    <div class="request-loader">
        <img src="{{ url('/') }}/public/assets/admin/images/loader.gif" alt="loader">
    </div>
    {{-- Loader --}}

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js" integrity="sha512-pumBsjNRGGqkPzKHndZMaAG+bir374sORyzM3uulLV14lN5LyykqNk8eEeUlUkB3U0M4FApyaHraT65ihJhDpQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>

    {{-- Toastr Js Script --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"
    integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    {{-- End Toastr Js Script --}}

    <script>
		toastr.options = {
			"closeButton": false,
			"debug": false,
			"newestOnTop": false,
			"progressBar": false,
			"positionClass": "toast-bottom-right",
			"preventDuplicates": false,
			"onclick": null,
			"showDuration": "300",
			"hideDuration": "1000",
			"timeOut": "5000",
			"extendedTimeOut": "1000",
			"showEasing": "swing",
			"hideEasing": "linear",
			"showMethod": "fadeIn",
			"hideMethod": "fadeOut",
		}
	</script>

    <script>
        $(document).on('click','.admin-login-card',function() {
            $(".em").each(function () {
                $(this).html("");
            });
            if($(this).hasClass('admin-login-card')) {
                $(this).removeClass('h-410 d-flex align-items-center justify-content-center').find('.row').removeClass('d-none');
            }
        });
        /* ***************************************************************
        ==========disabling default behave of form submits start==========
        *****************************************************************/

        $("#ajaxForm").attr("onsubmit", "return false");
        $(document.getElementsByClassName("ajaxForm")).attr("onsubmit", "return false");

        /* *************************************************************
        ==========disabling default behave of form submits end==========
        ***************************************************************/
  
        /* ***************************************************
        ==========Form Submit with AJAX Request Start==========
        ******************************************************/

        $(document).on("click", ".submitBtn", function (e) {
            $(e.target).attr("disabled", true);
  
            $(".request-loader").addClass("show");
        
            let ajaxForm = $(e.target).parent().closest("form");
            let fd = new FormData(ajaxForm[0]);
            let url = ajaxForm.attr("action");
            let method = ajaxForm.attr("method");
        
            $.ajax({
                url: url,
                method: method,
                data: fd,
                contentType: false,
                processData: false,
                success: function (data) {
                    $(e.target).attr("disabled", false);
                    $(".request-loader").removeClass("show");
        
                    $(".em").each(function () {
                        $(this).html("");
                    });
        
                    if (data == "success") {
                        location.reload();
                    }
        
                    // if error occurs
                    else if (typeof data.error != "undefined") {
                        for (let x in data) {
                            if (x == "error") {
                                continue;
                            }
                            ajaxForm
                                .find("[name='" + x + "']")
                                .after(
                                    `<p class="mb-0 text-danger em">${data[x][0]}</p`
                                );
                        }
                    }
                },
                error: function (error) {
                    $(".em").each(function () {
                        $(this).html("");
                    });
                    for (let x in error.responseJSON.errors) {
                        ajaxForm
                            .find("[name='" + x + "']")
                            .after(
                                `<p class="mt-0 mb-0 text-danger em">${error.responseJSON.errors[x][0]}</p`
                            );
                    }
                    $(".request-loader").removeClass("show");
                    $(e.target).attr("disabled", false);
                },
            });
        });

        $(document).on("click", "#submitBtn", function (e) {
            $(e.target).attr("disabled", true);
            $(".request-loader").addClass("show");

            let ajaxForm = document.getElementById("ajaxForm");
            let fd = new FormData(ajaxForm);
            let url = $("#ajaxForm").attr("action");
            let method = $("#ajaxForm").attr("method");

            $.ajax({
                url: url,
                method: method,
                data: fd,
                contentType: false,
                processData: false,
                success: function (data) {
                    $(e.target).attr("disabled", false);
                    $(".request-loader").removeClass("show");

                    $(".em").each(function () {
                        $(this).html("");
                    });

                    if (data == "success") {
                        location.reload();
                    } else if (data.status == 'success' && data.call == 'enterOtp'){
                        enterOtp(data.info);
                    }

                    // if error occurs
                    else if (typeof data.error != "undefined") {
                        for (let x in data) {
                            if (x == "error") {
                                continue;
                            }
                            document.getElementById("err" + x).innerHTML = data[x][0];
                        }
                    }
                },
                error: function (error) {
                    $(".em").each(function () {
                        $(this).html("");
                    });
                    for (let x in error.responseJSON.errors) {
                        document.getElementById("err" + x).innerHTML =
                            error.responseJSON.errors[x][0];
                    }
                    $(".request-loader").removeClass("show");
                    $(e.target).attr("disabled", false);
                },
            });
        });

        /* ***************************************************
        ==========Form Submit with AJAX Request End==========
        ******************************************************/
    </script>

</body>
</html>