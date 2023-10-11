<!DOCTYPE html>

<html lang="en" class="light-style layout-navbar-fixed " dir="ltr" data-theme="theme-default"
    data-assets-path="https://demos.themeselection.com/sneat-bootstrap-html-admin-template/assets/"
    data-template="front-pages">

<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <meta charset="utf-8" />
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title>{{ $title ?? config('APP_NAME') }} | Repository jurnal dan skripsi</title>


    <meta name="description"
        content="Most Powerful &amp; Comprehensive Bootstrap 5 HTML Admin Dashboard Template built for developers!" />
    <meta name="keywords" content="dashboard, bootstrap 5 dashboard, bootstrap 5 design, bootstrap 5">
    <!-- Canonical SEO -->
    <link rel="canonical" href="">




    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{ asset('backend_theme/') }}/assets/img/favicon/favicon.ico" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
        rel="stylesheet">


    <link rel="stylesheet" href="{{ asset('backend_theme/') }}/assets/vendor/fonts/boxicons.css" />


    <!-- Core CSS -->
    {{-- <link rel="stylesheet"
        href="https://demos.themeselection.com/sneat-bootstrap-html-admin-template/assets/vendor/css/rtl/core.css"
        class="template-customizer-core-css" /> --}}
    <link rel="stylesheet" href="{{ asset('backend_theme/') }}/assets/vendor/css/core.css"
        class="template-customizer-core-css" />
    {{-- <link rel="stylesheet"
        href="https://demos.themeselection.com/sneat-bootstrap-html-admin-template/assets/vendor/css/rtl/theme-default.css"
        class="template-customizer-theme-css" /> --}}
    <link rel="stylesheet" href="{{ asset('backend_theme/') }}/assets/vendor/css/rtl/theme-semi-dark.css"
        class="template-customizer-theme-css" />
    {{-- <link rel="stylesheet"
        href="https://demos.themeselection.com/sneat-bootstrap-html-admin-template/assets/css/demo.css" /> --}}
    <link rel="stylesheet" href="{{ asset('backend_theme/') }}/assets/css/demo.css" />
    {{-- <link rel="stylesheet"
        href="https://demos.themeselection.com/sneat-bootstrap-html-admin-template/assets/vendor/css/pages/front-page.css" /> --}}
    <link rel="stylesheet" href="{{ asset('backend_theme/') }}/assets/vendor/css/pages/front-page.css" />
    <!-- Vendors CSS -->

    <link rel="stylesheet" href="{{ asset('backend_theme/') }}/assets/vendor/libs/nouislider/nouislider.css" />
    <link rel="stylesheet" href="{{ asset('backend_theme/') }}/assets/vendor/libs/swiper/swiper.css" />
    {{-- <link rel="stylesheet"
        href="https://demos.themeselection.com/sneat-bootstrap-html-admin-template/assets/vendor/libs/nouislider/nouislider.css" /> --}}
    {{-- <link rel="stylesheet" href="https://demos.themeselection.com/sneat-bootstrap-html-admin-template/assets/vendor/libs/swiper/swiper.css" /> --}} <!-- Page CSS -->

    <link rel="stylesheet" href="{{ asset('backend_theme/') }}/assets/vendor/css/pages/front-page-landing.css" />
    {{-- <link rel="stylesheet"
        href="https://demos.themeselection.com/sneat-bootstrap-html-admin-template/assets/vendor/css/pages/front-page-landing.css" /> --}}

    <!-- Helpers -->
    {{-- <link rel="stylesheet" href="{{ asset('backend_theme/') }}/assets/vendor/js/helpers.js" /> --}}
    <script src="https://demos.themeselection.com/sneat-bootstrap-html-admin-template/assets/vendor/js/helpers.js"></script>
    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Template customizer: To hide customizer set displayCustomizer value false in config.js.  -->
    <script
        src="https://demos.themeselection.com/sneat-bootstrap-html-admin-template/assets/vendor/js/template-customizer.js">
    </script>
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="https://demos.themeselection.com/sneat-bootstrap-html-admin-template/assets/js/front-config.js"></script>
    <style>
        @media screen and (max-width: 768px) {
            .hilang {
                display: none;
            }
        }
    </style>
</head>

<body>


    <!-- ?PROD Only: Google Tag Manager (noscript) (Default ThemeSelection: GTM-5DDHKGP, PixInvent: GTM-5J3LMKC) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-5DDHKGP" height="0" width="0"
            style="display: none; visibility: hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->







    <script src="https://demos.themeselection.com/sneat-bootstrap-html-admin-template/assets/vendor/js/dropdown-hover.js">
    </script>
    <script src="https://demos.themeselection.com/sneat-bootstrap-html-admin-template/assets/vendor/js/mega-dropdown.js">
    </script>
