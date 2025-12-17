 <!-- Footer Start -->
 <div class="container-fluid footer bg-dark text-light py-5">
     <div class="container py-4">
         <div class="row g-4">

             {{-- IDENTITAS SISTEM --}}
             <div class="col-md-6 col-lg-4">
                 <div class="footer-item">
                     <div class="d-flex align-items-center mb-3">
                         <img src="{{ asset('assets-guest/img/SiDesa.png') }}" alt="Logo Sistem" style="height:45px;"
                             class="me-2">
                         <h5 class="mb-0 fw-bold text-white">SiDesa</h5>
                     </div>
                     <p class="small opacity-75">
                         Sistem Informasi Desa yang menyediakan informasi profil desa,
                         agenda kegiatan, berita terkini, dan dokumentasi galeri
                         secara terintegrasi.
                     </p>
                 </div>
             </div>

             {{-- MENU CEPAT --}}
             <div class="col-md-6 col-lg-6 col-xl-3">
                        <div class="footer-item d-flex flex-column">
                            <h4 class="mb-4 text-white"> Menu </h4>
                            <a href="{{route('profil.index')}}"><i class="fas fa-angle-right me-2"></i> Profil Desa</a>
                            <a href="{{route('agenda.index')}}"><i class="fas fa-angle-right me-2"></i> Agenda Desa</a>
                            <a href="{{route('galeri.index')}}"><i class="fas fa-angle-right me-2"></i> Galeri Desa</a>
                            <a href="{{route('berita.index')}}"><i class="fas fa-angle-right me-2"></i> Berita Desa</a>
                        </div>
                    </div>

             {{-- KONTAK DESA --}}
             <div class="col-md-12 col-lg-4">
                 <div class="footer-item">
                     <h5 class="mb-3 text-white">Kontak Desa</h5>
                     <p class="small mb-1">
                         <i class="fas fa-map-marker-alt me-2"></i>
                         Jl. Raya Desa Sukamaju No. 12
                     </p>
                     <p class="small mb-1">
                         <i class="fas fa-envelope me-2"></i>
                         desasukamaju@gmail.com
                     </p>
                     <p class="small">
                         <i class="fas fa-phone me-2"></i>
                         0761-889977
                     </p>
                 </div>
             </div>
         </div>
     </div>
 </div>

 <!-- Footer End -->

 <!-- Copyright Start -->
 <div class="container-fluid copyright bg-black py-3">
     <div class="container">
         <div class="row align-items-center">

             {{-- KIRI --}}
             <div class="col-md-4 text-center text-md-start">
                 <small class="text-light opacity-75">
                     © {{ date('Y') }} SiDesa. All rights reserved.
                 </small>
             </div>

             {{-- KANAN : CREDIT TEMPLATE --}}
             <div class="col-md-4 text-center text-md-end text-body">
                 <small class="opacity-50">
                     Designed by
                     <a class="border-bottom text-light" href="https://htmlcodex.com" target="_blank">
                         HTML Codex
                     </a>
                 </small>
             </div>

         </div>
     </div>
 </div>


 <!-- Copyright End -->
