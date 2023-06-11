<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Pelayanan Surat Desa Mangkujajar - Home</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/LOGO.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,400i,600,700|Raleway:300,400,400i,500,500i,700,800,900" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: eBusiness
  * Updated: Mar 10 2023 with Bootstrap v5.2.3
  * Template URL: https://bootstrapmade.com/ebusiness-bootstrap-corporate-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top d-flex align-items-center">
    <div class="container d-flex justify-content-start">
      <a href="index.html"><img src="assets/img/LOGO.png" alt="" id="logo" class="img-fluid"></a>
      <div class="logo ms-4">
          <a href="index.html" id="judul"><span>Desa Mangkujajar</span> <br>Kabupaten Lamongan</a>
      </div>


        <!-- Uncomment below if you prefer to use an image logo -->


      <nav id="navbar" class="navbar ms-auto">
        <ul>
          <li><a class="nav-link scrollto active" href="#hero">Beranda</a></li>
          <li><a class="nav-link scrollto" href="#about">Jadwal Pelayanan</a></li>
          <li><a class="nav-link scrollto" href="#services">Alur Pengajuan</a></li>
          <li><a class="nav-link scrollto" href="#blog">Berita</a></li>
          <li><a class="nav-link scrollto" href="#contact">Contact</a></li>
          @auth
            <li><a class="nav-link scrollto" href="{{ route('dashboard') }}">Dashboard</a></li>
            @else
            <li><a href="{{ route('login') }}">Login</a></li>
          @endauth
      </nav>--> <!-- .navbar -->

    </div>
  </header><!-- End Header -->

  <!-- ======= hero Section ======= -->
  <section id="hero">
    <div class="hero-container">
      <div id="heroCarousel" class="carousel slide carousel-fade" data-bs-ride="carousel" data-bs-interval="5000">

        <ol id="hero-carousel-indicators" class="carousel-indicators"></ol>

        <div class="carousel-inner" role="listbox">

          <div class="carousel-item active" style="background-image: url(assets/img/hero-carousel/DESA1.jpg)">
            <div class="carousel-container">
              <div class="container">
                <h2 class="animate__animated animate__fadeInDown">Pelayanan Surat Desa Mangkujajar </h2>
                <p class="animate__animated animate__fadeInUp">Meningkatkan pelayanan kepada masyarakat Desa Mangkujajar dengan memanfaatkan Teknologi Informasi</p>
                <a href="#about" class="btn-get-started scrollto animate__animated animate__fadeInUp">Mulai</a>
              </div>
            </div>
          </div>

          <div class="carousel-item" style="background-image: url(assets/img/hero-carousel/DESA2.jpeg)">
            <div class="carousel-container">
              <div class="container">
                <h2 class="animate__animated animate__fadeInDown">Pelayanan Surat Desa Mangkujajar</h2>
                <p class="animate__animated animate__fadeInUp">Pelayanan dilakukan 24 jam, dapat diakses dimanapun dan kapanpun</p>
                <a href="#about" class="btn-get-started scrollto animate__animated animate__fadeInUp">Mulai</a>
              </div>
            </div>
          </div>

          <div class="carousel-item" style="background-image: url(assets/img/hero-carousel/DESA3.jpeg)">
            <div class="carousel-container">
              <div class="container">
                <h2 class="animate__animated animate__fadeInDown">Pelayanan Surat Desa Mangkujajar</h2>
                <p class="animate__animated animate__fadeInUp">Memudahkan pelayanan Surat SKTM dan Surat Pengantar Pembuatan KTP bagi masyarakat Desa Mangkujajar </p>
                <a href="#about" class="btn-get-started scrollto animate__animated animate__fadeInUp">Mulai</a>
              </div>
            </div>
          </div>

        </div>

        <a class="carousel-control-prev" href="#heroCarousel" role="button" data-bs-slide="prev">
          <span class="carousel-control-prev-icon bi bi-chevron-left" aria-hidden="true"></span>
        </a>

        <a class="carousel-control-next" href="#heroCarousel" role="button" data-bs-slide="next">
          <span class="carousel-control-next-icon bi bi-chevron-right" aria-hidden="true"></span>
        </a>

      </div>
    </div>
  </section><!-- End Hero Section -->

  <main id="main">

    <!-- ======= Jadwal Pelayanan Section ======= -->
    <div id="about" class="about-area area-padding">
      <div class="container">
        <div class="row">
          <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="section-headline text-center">
              <h2>Jadwal Pelayanan</h2>
            </div>
          </div>
        </div>
        <div class="row">
          <!-- single-well start-->
          <div class="col-md-6 col-sm-6 col-xs-12">
            <div class="well-left">
              <div class="single-well">
                <a href="#">
                  <img class="jam" src="assets/img/about/images-removebg-preview.png" alt="">
                </a>
              </div>
            </div>
          </div>
          <!-- single-well end-->
          <div class="col-md-6 col-sm-6 col-xs-12">
            <div class="well-middle">
              <div class="single-well">
                <a href="#">
                  <h4 class="sec-head">Jam Pelayanan Kantor Desa Mangkujajar</h4>
                </a>
                <p>
                  Di bawah ini merupakan jadwal jam pelayanan pembuatan surat di Desa Mangkujajar :
                </p>
                <ul>
                  <li>
                    <i class="bi bi-check"></i> Senin - Kamis (08.00 - 15.00)
                  </li>
                  <li>
                    <i class="bi bi-check"></i> Jum'at (08.00 - 14.00)
                  </li>
                  <li>
                    <i class="bi bi-check"></i> Jam Istirahat (12.00 - 12.30)
                  </li>
                  <li>
                    <i class="bi bi-check"></i> Pelayanan Online (24 JAM)
                  </li>
                  <li>
                    <i class="bi bi-check"></i> Tanggal Merah (LIBUR)
                  </li>
                </ul>
              </div>
            </div>
          </div>
          <!-- End col-->
        </div>
      </div>
    </div><!-- End Jadwal Pelayanan Section -->

    <!-- ======= Alur Pengajuan Section ======= -->
    <div id="services" class="services-area area-padding">
      <div class="container">
        <div class="row">
          <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="section-headline services-head text-center">
              <h2>Alur Permohonan Surat</h2>
            </div>
          </div>
        </div>
        <div class="row text-center">
          <!-- Start Left services -->
          <div class="col-md-4 col-sm-4 col-xs-12">
            <div class="about-move">
              <div class="services-details">
                <div class="single-services">
                  <a class="services-icon" href="#">
                    <i class="bi bi-briefcase"></i>
                  </a>
                  <h4>1. Login</h4>
                  <p>
                    User diharapkan login terlebih dahulu, apabila belum memiliki akun silahkan melakukan registrasi dengan cara menghubungi kontak yang tersedia.
                  </p>
                </div>
              </div>
              <!-- end about-details -->
            </div>
          </div>
          <div class="col-md-4 col-sm-4 col-xs-12">
            <div class="about-move">
              <div class="services-details">
                <div class="single-services">
                  <a class="services-icon" href="#">
                    <i class="bi bi-card-checklist"></i>
                  </a>
                  <h4>2. Memilih Jenis Permohonan</h4>
                  <p>
                    Pilih jenis permohonan surat yang diperlukan (Surat Keterangan Tidak Mampu, Surat Pengantar KTP dan Surat Keterangan Kematian).
                  </p>
                </div>
              </div>
              <!-- end about-details -->
            </div>
          </div>
          <div class="col-md-4 col-sm-4 col-xs-12">
            <!-- end col-md-4 -->
            <div class=" about-move">
              <div class="services-details">
                <div class="single-services">
                  <a class="services-icon" href="#">
                    <i class="bi bi-bar-chart"></i>
                  </a>
                  <h4>3. Melengkapi Form Pengajuan Surat</h4>
                  <p>
                    Isi data dengan lengkap dan pastikan data sudah
                  </p>
                </div>
              </div>
              <!-- end about-details -->
            </div>
          </div>
          <div class="col-md-4 col-sm-4 col-xs-12">
            <!-- end col-md-4 -->
            <div class=" about-move">
              <div class="services-details">
                <div class="single-services">
                  <a class="services-icon" href="#">
                    <i class="bi bi-binoculars"></i>
                  </a>
                  <h4>4. Upload Berkas </h4>
                  <p>
                    Lengkapi berkas yang diminta dan pastikan semua berkas terlihat dengan jelas.
                  </p>
                </div>
              </div>
              <!-- end about-details -->
            </div>
          </div>
          <!-- End Left services -->
          <div class="col-md-4 col-sm-4 col-xs-12">
            <!-- end col-md-4 -->
            <div class=" about-move">
              <div class="services-details">
                <div class="single-services">
                  <a class="services-icon" href="#">
                    <i class="bi bi-brightness-high"></i>
                  </a>
                  <h4>5. Cek Status Request Surat</h4>
                  <p>
                    Setelah melakukan permohonan surat, harap cek secara berkala status surat anda.
                  </p>
                </div>
              </div>
              <!-- end about-details -->
            </div>
          </div>
          <!-- End Left services -->
          <div class="col-md-4 col-sm-4 col-xs-12">
            <!-- end col-md-4 -->
            <div class=" about-move">
              <div class="services-details">
                <div class="single-services">
                  <a class="services-icon" href="#">
                    <i class="bi bi-calendar4-week"></i>
                  </a>
                  <h4>6. Cetak Surat</h4>
                  <p>
                    Apabila status surat anda "Selesai", maka surat dapat dicetak (untuk hardfile bisa diambil di Kantor Desa).
                  </p>
                </div>
              </div>
              <!-- end about-details -->
            </div>
          </div>
        </div>
      </div>
    </div><!-- End Alur Pengajuan Section -->

    <!-- ======= Blog Section ======= -->
    <div id="blog" class="blog-area">
      <div class="blog-inner area-padding">
        <div class="blog-overly"></div>
        <div class="container ">
          <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="section-headline text-center">
                <h2>Berita Terbaru</h2>
              </div>
            </div>
          </div>
          <div class="row">
            <!-- Start Left Blog -->
            <div class="col-md-4 col-sm-4 col-xs-12">
              <div class="single-blog">
                <div class="single-blog-img">
                  <a>
                    <img src="assets/img/blog/1.jpg" alt="">
                  </a>
                </div>
                <div class="blog-meta">
                  <span class="date-type">
                    <span class="fa fa-calendar">2023-04-17 / 09:10:16</span>
                  </span>
                </div>
                <div class="blog-text">
                  <h4>
                    <a>Libur Hari Raya Idul Fitri 2023</a>
                  </h4>
                  <p>
                    Libur hari raya dimulai tanggal 19 April 2023 s/d 26 April 2023, pelayanan buka kembali tanggal 27April 2023. Untuk pelayanan online tetap terbuka 24 jam.
                  </p>
                </div>
                <span>
                  <!--<a href="blog.html" class="ready-btn">Read more</a>-->
                </span>
              </div>
              <!-- Start single blog -->
            </div>
            <!-- End Left Blog-->
            <!-- Start Left Blog -->
            <div class="col-md-4 col-sm-4 col-xs-12">
              <div class="single-blog">
                <div class="single-blog-img">
                  <a>
                    <img src="assets/img/blog/2.jpg" alt="">
                  </a>
                </div>
                <div class="blog-meta">
                  <span class="date-type">
                    <span class="fa fa-calendar">2023-02-09 / 09:10:16</span>
                  </span>
                </div>
                <div class="blog-text">
                  <h4>
                    <a>Kendala tidak dapat registrasi?</a>
                  </h4>
                  <p>
                    Apabila tidak dapat melakukan registrasi harap menghubungi contact yang sudah tersedia pada jam kerja.
                  </p>
                </div>
                <span>
                  <!--<a href="blog.html" class="ready-btn">Read more</a>-->
                </span>
              </div>
              <!-- Start single blog -->
            </div>
            <!-- End Left Blog-->
            <!-- Start Right Blog-->
            <div class="col-md-4 col-sm-4 col-xs-12">
              <div class="single-blog">
                <div class="single-blog-img">
                  <a>
                    <img src="assets/img/blog/3.jpg" alt="">
                  </a>
                </div>
                <div class="blog-meta">
                  <span class="date-type">
                    <span class="fa fa-calendar">2023-01-05 / 09:10:16</span>
                  </span>
                </div>
                <div class="blog-text">
                  <h4>
                    <a>Syarat apabila mengajukan permohonan secara langsung</a>
                  </h4>
                  <p>
                    Diberitahukan kepada masyarakat Desa Mangkujajar yang mengajukan permohonan surat secara langsung ke kantor desa, diharapkan membawa KTP dan KK asli (beserta fotocopy 2 lembar).
                  </p>
                </div>
                <span>
                  <!--<a href="blog.html" class="ready-btn">Read more</a>-->
                </span>
              </div>
            </div>
            <!-- End Right Blog-->
          </div>
        </div>
      </div>
    </div><!-- End Blog Section -->

    <!-- ======= Suscribe Section ======= -->
    <div class="suscribe-area">
      <div class="container">
        <div class="row">
          <div class="col-lg-12 col-md-12 col-sm-12 col-xs=12">
            <div class="suscribe-text text-center">
              <!--<h3>MORE INFORMATION</h3>-->
              <!--<a class="sus-btn" href="#">Get A quote</a>-->
            </div>
          </div>
        </div>
      </div>
    </div><!-- End Suscribe Section -->

    <!-- ======= Contact Section ======= -->
    <div id="contact" class="contact-area">
      <div class="contact-inner area-padding">
        <div class="contact-overly"></div>
        <div class="container ">
          <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="section-headline text-center">
                <h2>Contact</h2>
              </div>
            </div>
          </div>
          <div class="row">
            <!-- Start contact icon column -->
            <div class="col-md-4">
              <div class="contact-icon text-center">
                <div class="single-icon">
                  <i class="bi bi-phone"></i>
                  <p>
                    Telepon: +628 123 456 7890<br>
                    <span>Senin-Jum'at (08.00-15.00)</span>
                  </p>
                </div>
              </div>
            </div>
            <!-- Start contact icon column -->
            <div class="col-md-4">
              <div class="contact-icon text-center">
                <div class="single-icon">
                  <i class="bi bi-envelope"></i>
                  <p>
                    Email: mangkujajar@gmail.com<br>
                    <span>Web: www.mangkujajar.com</span>
                  </p>
                </div>
              </div>
            </div>
            <!-- Start contact icon column -->
            <div class="col-md-4">
              <div class="contact-icon text-center">
                <div class="single-icon">
                  <i class="bi bi-geo-alt"></i>
                  <p>
                    Lokasi: Dusun Pilangpinggir [Utara Masjid Baiturrahman]<br>
                    <span>NY 535022 Mangkujajar, Kembangbahu</span>
                  </p>
                </div>
              </div>
            </div>
          </div>
          <div class="row">

            <!-- Start Google Map -->
            <div class="col-md-12">
              <!-- Start Map -->
              <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d22864.11283411948!2d-73.96468908098944!3d40.630720240038435!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c24fa5d33f083b%3A0xc80b8f06e177fe62!2sNew+York%2C+NY%2C+USA!5e0!3m2!1sen!2sbg!4v1540447494452" width="100%" height="380" frameborder="0" style="border:0" allowfullscreen></iframe>
              <!-- End Map -->
            </div>
            <!-- End Google Map -->

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer>
    <div class="footer-area">
      <div class="container">
        <div class="row">
          <div class="col-md-4">
            <div class="footer-content">
              <div class="footer-head">
                <div class="footer-logo">
                  <h2><span>Pelayanan Surat </span>Desa Mangkujajar</h2>
                </div>

                <p>Meningkatkan pelayanan kepada masyarakat Desa Mangkujajar dengan memanfaatkan Teknologi Informasi .</p>
                <div class="footer-icons">
                  <ul>
                    <!--<li>
                      <a href="#"><i class="bi bi-facebook"></i></a>
                    </li>-->
                    <li>
                      <a><i class="bi bi-facebook"></i></a>
                    </li>
                    <li>
                      <a><i class="bi bi-twitter"></i></a>
                    </li>
                    <li>
                      <a><i class="bi bi-instagram"></i></a>
                    </li>
                    <li>
                      <a><i class="bi bi-linkedin"></i></a>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
          <!-- end single footer -->
          <div class="col-md-4">
            <div class="footer-content">
              <div class="footer-head">
                <h4>informasi</h4>
                <p>
                  Apabila terdapat kendala maupun pertanyaan, silahkan hubungi contact yang ada di bawah ini.
                </p>
                <div class="footer-contacts">
                  <p><span>Telepon:</span> +628 123 456 7890</p>
                  <p><span>Email:</span> mangkujajar@gmail.com</p>
                  <p><span>Jam Kerja:</span> 08.00-15.00</p>
                </div>
              </div>
            </div>
          </div>
          <!-- end single footer -->
          <div class="col-md-4">
            <div class="footer-content">
              <div class="footer-head">
                <h4>Instagram</h4>
                <div class="flicker-img">
                  <!--<a href="#"><img src="assets/img/portfolio/1.jpg" alt=""></a>-->
                  <a><img src="assets/img/portfolio/1.jpg" alt=""></a>
                  <a><img src="assets/img/portfolio/2.jpg" alt=""></a>
                  <a><img src="assets/img/portfolio/3.jpg" alt=""></a>
                  <a><img src="assets/img/portfolio/4.jpg" alt=""></a>
                  <a><img src="assets/img/portfolio/5.jpg" alt=""></a>
                  <a><img src="assets/img/portfolio/6.jpg" alt=""></a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="footer-area-bottom">
      <div class="container">
        <div class="row">
          <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="copyright text-center">
              <p>
                &copy; Copyright <strong>eBusiness</strong>. All Rights Reserved
              </p>
            </div>
            <div class="credits">
              <!--
              All the links in the footer should remain intact.
              You can delete the links only if you purchased the pro version.
              Licensing information: https://bootstrapmade.com/license/
              Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/buy/?theme=eBusiness
            -->
              Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </footer><!-- End  Footer -->

  <div id="preloader"></div>
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>
