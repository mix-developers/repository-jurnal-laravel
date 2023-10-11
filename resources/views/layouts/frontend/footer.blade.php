<div class="footer-bottom py-3">
    <div class="container d-flex flex-wrap justify-content-between flex-md-row flex-column text-center text-md-start">
        <div class="mb-2 mb-md-0">
            <span class="footer-text">©
                <script>
                    document.write(new Date().getFullYear());
                </script>
            </span>
            <a href="{{ url('/') }}" target="_blank" class="fw-medium text-white footer-link">Repository jurnal dan
                skripsi Universitas Musamus Merauke ,</a>
            <span class="footer-text"> Made with ❤️ .</span>
        </div>
        {{-- <div>
            <a href="#!" class="footer-link me-3" target="_blank">
                <img src="https://demos.themeselection.com/sneat-bootstrap-html-admin-template/assets/img/front-pages/icons/github-light.png"
                    alt="github icon" data-app-light-img="front-pages/icons/github-light.png"
                    data-app-dark-img="front-pages/icons/github-dark.png" />
            </a>
            <a href="#!" class="footer-link me-3" target="_blank">
                <img src="https://demos.themeselection.com/sneat-bootstrap-html-admin-template/assets/img/front-pages/icons/facebook-light.png"
                    alt="facebook icon" data-app-light-img="front-pages/icons/facebook-light.png"
                    data-app-dark-img="front-pages/icons/facebook-dark.png" />
            </a>
            <a href="#!" class="footer-link me-3" target="_blank">
                <img src="https://demos.themeselection.com/sneat-bootstrap-html-admin-template/assets/img/front-pages/icons/twitter-light.png"
                    alt="twitter icon" data-app-light-img="front-pages/icons/twitter-light.png"
                    data-app-dark-img="front-pages/icons/twitter-dark.png" />
            </a>
            <a href="#!" class="footer-link" target="_blank">
                <img src="https://demos.themeselection.com/sneat-bootstrap-html-admin-template/assets/img/front-pages/icons/instagram-light.png"
                    alt="google icon" data-app-light-img="front-pages/icons/instagram-light.png"
                    data-app-dark-img="front-pages/icons/instagram-dark.png" />
            </a>
        </div> --}}
    </div>
</div>
</footer>
<!-- Footer: End -->



@stack('js')

{{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script> --}}
<script src="{{ asset('frontend_theme') }}/js/ajax/jquery.min.js"></script>
<script src="{{ asset('backend_theme/') }}/assets/vendor/libs/jquery/jquery.js"></script>
<!-- Core JS -->
<!-- build:js assets/vendor/js/core.js -->
{{-- <script src="https://demos.themeselection.com/sneat-bootstrap-html-admin-template/assets/vendor/libs/popper/popper.js">
</script>
<script src="https://demos.themeselection.com/sneat-bootstrap-html-admin-template/assets/vendor/js/bootstrap.js">
</script> --}}
<script src="{{ asset('backend_theme/') }}/assets/vendor/libs/popper/popper.js"></script>
<script src="{{ asset('backend_theme/') }}/assets/vendor/js/bootstrap.js"></script>

<!-- endbuild -->

<!-- Vendors JS -->
<script
    src="https://demos.themeselection.com/sneat-bootstrap-html-admin-template/assets/vendor/libs/nouislider/nouislider.js">
</script>
<script src="https://demos.themeselection.com/sneat-bootstrap-html-admin-template/assets/vendor/libs/swiper/swiper.js">
</script>

<!-- Main JS -->
<script src="https://demos.themeselection.com/sneat-bootstrap-html-admin-template/assets/js/front-main.js"></script>


<!-- Page JS -->
<script src="https://demos.themeselection.com/sneat-bootstrap-html-admin-template/assets/js/front-page-landing.js">
</script>
<link rel="stylesheet"
    href="https://demos.themeselection.com/sneat-bootstrap-html-laravel-admin-template/demo/assets/vendor/libs/flatpickr/flatpickr.css" />
<script>
    flatpickr("input[type=date]");
</script>

</body>

</html>

<!-- beautify ignore:end -->
