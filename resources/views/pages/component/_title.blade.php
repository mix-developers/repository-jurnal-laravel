 <!-- Hero: Start -->
 <section id="hero-animation">
     <div id="landingHero" class="section-py landing-hero position-relative" style="height: 400px;">
         <div class="container">
             <div class="hero-text-box text-center">
                 <h1 class="text-primary hero-title display-4 fw-bold">Repository jurnal dan skripsi</h1>
                 <h2 class="hero-sub-title h6 mb-4 pb-1">
                     Jurusan Sistem Informasi<br class="d-none d-lg-block" />
                     Universitas Musamus Merauke
                 </h2>
                 <div class="landing-hero-btn d-inline-block position-relative">
                     <a href="{{ route('register') }}" class="btn btn-primary">Daftarkan akun</a>
                 </div>
             </div>
             <div id="heroDashboardAnimation" class="hero-animation-img text-center mt-4">
                 <a href="{{ url('/') }}">
                     <div id="heroAnimationImg" class="position-relative mb-4">
                         {{-- <img src="musamus.png" alt="hero dashboard" class="animation-img"
                             data-app-light-img="musamus.png" data-app-dark-img="musamus.png" /> --}}

                         {{-- <img src="{{ asset('/img/musamus.png') }}" alt="" class="animation-img "
                             width="500px"> --}}
                     </div>
                 </a>
             </div>
         </div>
     </div>
 </section>
 <!-- Hero: End -->
