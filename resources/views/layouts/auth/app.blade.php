<!DOCTYPE html>

<html lang="en" class="light-style customizer-hide" dir="ltr" data-theme="theme-default"
    data-assets-path="{{ asset('backend_theme/') }}/assets/" data-template="vertical-menu-template-free">

<head>
    <meta charset="utf-8" />
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title>Authentication | Jurnal</title>

    <meta name="description" content="" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{ asset('backend_theme/') }}/assets/img/favicon/favicon.ico" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
        rel="stylesheet" />

    <!-- Icons. Uncomment required icon fonts -->
    <link rel="stylesheet" href="{{ asset('backend_theme/') }}/assets/vendor/fonts/boxicons.css" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="{{ asset('backend_theme/') }}/assets/vendor/css/core.css"
        class="template-customizer-core-css" />
    <link rel="stylesheet" href="{{ asset('backend_theme/') }}/assets/vendor/css/theme-default.css"
        class="template-customizer-theme-css" />
    <link rel="stylesheet" href="{{ asset('backend_theme/') }}/assets/css/demo.css" />

    <!-- Vendors CSS -->
    <link rel="stylesheet"
        href="{{ asset('backend_theme/') }}/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />

    <!-- Page CSS -->
    <!-- Page -->
    <link rel="stylesheet" href="{{ asset('backend_theme/') }}/assets/vendor/css/pages/page-auth.css" />
    <!-- Helpers -->
    <script src="{{ asset('backend_theme/') }}/assets/vendor/js/helpers.js"></script>

    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="{{ asset('backend_theme/') }}/assets/js/config.js"></script>
</head>

<body>
    <!-- Content -->

    <div class="container-xxl">
        <div class="authentication-wrapper authentication-basic container-p-y">
            <div class="authentication-inner">
                <!-- form -->
                @yield('content')
                <!-- /form -->
            </div>
        </div>
    </div>

    <!-- / Content -->


    <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->
    <script src="{{ asset('backend_theme/') }}/assets/vendor/libs/jquery/jquery.js"></script>
    <script src="{{ asset('backend_theme/') }}/assets/vendor/libs/popper/popper.js"></script>
    <script src="{{ asset('backend_theme/') }}/assets/vendor/js/bootstrap.js"></script>
    <script src="{{ asset('backend_theme/') }}/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>

    <script src="{{ asset('backend_theme/') }}/assets/vendor/js/menu.js"></script>
    <!-- endbuild -->

    <!-- Vendors JS -->

    <!-- Main JS -->
    <script src="{{ asset('backend_theme/') }}/assets/js/main.js"></script>

    <!-- Page JS -->

    <!-- Place this tag in your head or just before your close body tag. -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
    <script>
        $(document).ready(function() {
            $('#role').on('change', function() {
                if (this.value == 'dosen') {
                    $("#nidn").show();
                    $("#nim").hide();
                    $("#with-title").show();
                    $("#no-title").hide();
                    document.getElementById("name").disabled = false;
                    document.getElementById("identity").disabled = false;
                    document.getElementById("phone").disabled = false;
                    document.getElementById("email").disabled = false;
                    document.getElementById("password").disabled = false;
                    document.getElementById("password-confirm").disabled = false;
                } else if (this.value == 'mahasiswa') {
                    $("#nidn").hide();
                    $("#nim").show();
                    $("#with-title").hide();
                    $("#no-title").show();
                    document.getElementById("name").disabled = false;
                    document.getElementById("identity").disabled = false;
                    document.getElementById("phone").disabled = false;
                    document.getElementById("email").disabled = false;
                    document.getElementById("password").disabled = false;
                    document.getElementById("password-confirm").disabled = false;
                } else {
                    document.getElementById("name").disabled = true;
                    document.getElementById("identity").disabled = true;
                    document.getElementById("phone").disabled = true;
                    document.getElementById("email").disabled = true;
                    document.getElementById("password").disabled = true;
                    document.getElementById("password-confirm").disabled = true;
                }

            });
        });
    </script>
</body>

</html>
