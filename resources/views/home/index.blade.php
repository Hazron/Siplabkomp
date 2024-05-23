<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Siplabkomp - Pinjam Ruang via Website</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="asset_homepage/img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700&family=Open+Sans:wght@400;500;600;700&display=swap"
        rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="asset_homepage/lib/animate/animate.min.css" rel="stylesheet">
    <link href="asset_homepage/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="asset_homepage/css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="asset_homepage/css/style.css" rel="stylesheet">
</head>

<body>
    <div class="container-l bg-white p-0 full-screen">
        <!-- Spinner Start -->
        <div id="spinner"
            class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <!-- Spinner End -->


        <!-- Navbar & Hero Start -->
        <div class="container-xxl position-relative p-0">
            <nav class="navbar navbar-expand-lg navbar-light px-4 px-lg-5 py-3 py-lg-0">
                <a href="" class="navbar-brand p-0">
                    <h1 class="m-0"><i class="fa fa-server me-3"></i>SIPLABKOMP</h1>
                    <!-- <img src="img/logo.png" alt="Logo"> -->
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarCollapse">
                    <span class="fa fa-bars"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <div class="navbar-nav ms-auto py-0">
                        <a href="index.html" class="nav-item nav-link active">Home</a>
                        <a href="about.html" class="nav-item nav-link">Tentang Siplabkomp</a>
                        <a href="domain.html" class="nav-item nav-link">Jadwal</a>
                    </div>
                    @if (Route::has('login'))
                        @auth
                            <a href="{{ url('/dashboard') }}" class="btn btn-secondary py-2 px-4 ms-3">Profile</a>
                        @else
                            <a href="{{ url('/login') }}" class="btn btn-secondary py-2 px-4 ms-3">login</a>
                        @endif
                    @endauth
                </div>
            </nav>
            <!-- NAV END -->

            <!-- HERO -->
            <div class="container-xxl py-5 bg-info hero-header mb-2">
                <div class="container my-5 py-5 px-lg-5">
                    <div class="row g-5">
                        <div class="col-lg-6 pt-5 text-center text-lg-start">
                            <h1 class="display-4 text-white mb-4 animated slideInLeft">SIPLABKOMP FST UNJA</h1>
                            <a href="#" class="btn btn-secondary py-sm-3 px-sm-5 me-3 animated slideInLeft">Cek
                                Jadwal</a>
                        </div>
                        <!-- TABLE JADWAL -->
                        <div class="col-lg-6">
                            <div class="col-lg-12 col-xl-12 bg-white p-4 rounded">
                                <h4 class="mb-3">Jadwal Pemakaian Hari ini</h4>
                                <!-- Pilihan ruangan -->
                                <div class="mb-3" style="width: 200px;">
                                    <label for="ruang" class="form-label">Pilih Ruangan:</label>
                                    <select class="form-select form-select-sm" id="ruang" style="font-size: 12px;">
                                        <option selected>Pilih Ruangan...</option>
                                        <!-- List ruangan berdasarkan ruang_id dari data jadwal -->
                                        @foreach ($jadwals->unique('ruang_id') as $jadwal)
                                            <option value="{{ $jadwal->ruang_id }}">{{ $jadwal->ruang->nama_lab }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <!-- Tabel jadwal -->
                                <table class="table table-fixed">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Waktu</th>
                                            <th>Matakuliah</th>
                                            <th>Kelompok Belajar</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>

                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>





            <!-- HERO END -->

            <!-- Navbar & Hero End -->


            <!-- Full Screen Search Start -->
            <div class="modal fade" id="searchModal" tabindex="-1">
                <div class="modal-dialog modal-fullscreen">
                    <div class="modal-content" style="background: rgba(29, 40, 51, 0.8);">
                        <div class="modal-header border-0">
                            <button type="button" class="btn bg-white btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body d-flex align-items-center justify-content-center">
                            <div class="input-group" style="max-width: 600px;">
                                <input type="text" class="form-control bg-transparent border-light p-3"
                                    placeholder="Type search keyword">
                                <button class="btn btn-light px-4"><i class="bi bi-search"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Full Screen Search End -->


            <!-- Domain Search Start -->

            <!-- Domain Search End -->


            <!-- About Start -->
            <div class="container-xxl py-5">
                <div class="container px-lg-5">
                    <div class="row g-5 align-items-center">
                        <div class="col-lg-7 wow fadeInUp" data-wow-delay="0.1s">
                            <div class="section-title position-relative mb-4 pb-4">
                                <h1 class="mb-2">Selamat datang di website SIPLABKOMP</h1>
                            </div>
                            <p class="mb-4">Siplabkomp merupakan Sistem Informasi Peminjaman Ruang Komputasi,
                                bertujuan memudahkan proses peminjaman ruang untuk perkuliahan hingga kegiatan himpunan.
                            </p>
                        </div>
                        <div class="col-lg-5">
                            <img class="img-fluid wow zoomIn" data-wow-delay="0.8s"
                                src="asset_homepage/img/illustration_comp.jpg">
                        </div>
                    </div>
                </div>
            </div>
            <!-- About End -->


            <!-- Pricing Start -->

            <!-- Pricing End -->


            <!-- Comparison Start -->

            <!-- Comparison Start -->


            <!-- Testimonial Start -->

            <!-- Testimonial End -->


            <!-- Team Start -->

            <!-- Team End -->


            <!-- Footer Start -->
            <div class="container-fluid bg-info text-white footer mt-5 pt-5 wow fadeIn" data-wow-delay="0.1s">
                <div class="container py-5 px-lg-5">
                    <div class="row gy-5 gx-4 pt-5">
                        <div class="col-12">
                            <h2 class="fw-bold text-white mb-4">SIPLABKOMP</h2>
                            <p class="fw-bold text-white">Siplabkomp adalah website pelayanan mahasiswa guna untuk
                                mempermudah peminjaman ruang untuk perkuliahan yang ada di fakultas sains dan teknologi
                            </p>
                        </div>
                        <div class="col-lg-5 col-md-12">
                            <div class="row gy-5 g-4">
                                <div class="col-md-6">
                                    <h5 class="fw-bold text-white mb-4">About Us</h5>
                                    <a class="btn btn-link" href="">About Us</a>
                                    <a class="btn btn-link" href="">Contact Us</a>
                                    <a class="btn btn-link" href="">Privacy Policy</a>
                                    <a class="btn btn-link" href="">Terms & Condition</a>
                                    <a class="btn btn-link" href="">Support</a>
                                </div>
                                <div class="col-md-6">
                                    <h5 class="fw-bold text-white mb-4">Our Services</h5>
                                    <a class="btn btn-link" href="">Domain Register</a>
                                    <a class="btn btn-link" href="">Shared Hosting</a>
                                    <a class="btn btn-link" href="">VPS Hosting</a>
                                    <a class="btn btn-link" href="">Dedicated Hosting</a>
                                    <a class="btn btn-link" href="">Reseller Hosting</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="container px-lg-5">
                    <div class="copyright">
                        <div class="row">
                            <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                                &copy; <a class="border-bottom" href="#">Siplabkomp</a>, All Right Reserved.

                                <!--/*** This template is free as long as you keep the footer author’s credit link/attribution link/backlink. If you'd like to use the template without the footer author’s credit link/attribution link/backlink, you can purchase the Credit Removal License from "https://htmlcodex.com/credit-removal". Thank you for your support. ***/-->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Footer End -->


            <!-- Back to Top -->
            <a href="#" class="btn btn-lg btn-secondary btn-lg-square back-to-top"><i
                    class="bi bi-arrow-up"></i></a>
        </div>

        <!-- JavaScript Libraries -->
        <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
        <script src="asset_homepage/lib/wow/wow.min.js"></script>
        <script src="asset_homepage/lib/easing/easing.min.js"></script>
        <script src="asset_homepage/lib/waypoints/waypoints.min.js"></script>
        <script src="asset_homepage/lib/counterup/counterup.min.js"></script>
        <script src="asset_homepage/lib/owlcarousel/owl.carousel.min.js"></script>

        <!-- Template Javascript -->
        <script src="asset_homepage/js/main.js"></script>
</body>

</html>
