<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>SIPADU IPNU JATENG</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link rel="icon" type="image/x-icon" href="<?= base_url() ?>/template/dist/img/sipadu-fav.png" />
  <link href="<?= base_url() ?>/sipadu-template/assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,700|Open+Sans:300,300i,400,400i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="<?= base_url() ?>/sipadu-template/assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="<?= base_url() ?>/sipadu-template/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="<?= base_url() ?>/sipadu-template/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="<?= base_url() ?>/sipadu-template/assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="<?= base_url() ?>/sipadu-template/assets/css/style.css" rel="stylesheet">


  <!-- Bootstrap CSS nggak kepakai
<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.2/css/bootstrap.min.css'>

<link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.3.1/css/all.css'>
Font Awesome CSS -->

  <!-- =======================================================
  * Template Name: Avilon - v4.5.0
  * Template URL: https://bootstrapmade.com/avilon-bootstrap-landing-page-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top d-flex align-items-center header-transparent">
    <div class="container d-flex justify-content-between align-items-center">
      <div class="flash-data" data-flashdata="<?= $this->session->flashdata('flash'); ?>"></div>
      <div id="logo">
        <h1><a href="<?= base_url() ?>"><img src="<?= base_url() ?>/sipadu-template/assets/img/logo-new.png" /></a></h1>
        <!-- Uncomment below if you prefer to use an image logo -->
        <!-- <a href="index.html"><img src="assets/img/logo.png" alt=""></a> -->
      </div>

      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto active" href="#hero">Home</a></li>
          <li><a class="nav-link scrollto" href="#about">About</a></li>
          <li><a class="nav-link scrollto" href="#features">Features</a></li>
          <!--<li><a class="nav-link scrollto" href="#team">Team</a></li>-->
          <li><a class="nav-link scrollto" href="#contact">Contact</a></li>
          <!--<li><a class="nav-link" href="" data-toggle="modal" data-target="#loginModal">Sign in</a></li>-->
          <?php if ($this->session->userdata('level') == 'user') { ?>
              <li><a class="nav-link" href="<?= base_url(); ?>user">Dashboard</a></li>
            <?php }elseif ($this->session->userdata('level') == 'superuser') { ?>
              <li><a class="nav-link" href="<?= base_url(); ?>admin/dashboard">Dashboard</a></li>
            <?php }elseif ($this->session->userdata('level') == 'anggota') { ?>
              <li><a class="nav-link" href="<?= base_url(); ?>anggota">Dashboard</a></li>
        <?php   }else{ ?>
          <li><a class="nav-link" href="" data-toggle="modal" data-target="#loginModal">Sign in</a></li>
          <?php } ?>

        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->
    </div>
  </header><!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <section id="hero">

    <div class="hero-text" data-aos="zoom-out">
      <h2>Welcome to SIPADU APP</h2>
      <p>Sistem Informasi Pelajar dan Administrasi Terpadu<br/> adalah aplikasi yang dikembangkan oleh Developer IPNU Jateng</p>
      <a href="#about" class="btn-get-started scrollto">Get Started</a>
    </div>

    <div class="product-screens">

      <div class="product-screen-1" data-aos="fade-up" data-aos-delay="400">
        <img src="<?= base_url() ?>/sipadu-template/assets/img/background1.jpg" width="314px" alt="">
      </div>

      <div class="product-screen-2" data-aos="fade-up" data-aos-delay="200">
        <img src="<?= base_url() ?>/sipadu-template/assets/img/background2.jpg" width="314px" alt="">
      </div>

      <div class="product-screen-3" data-aos="fade-up">
        <img src="<?= base_url() ?>/sipadu-template/assets/img/background3.jpg" width="314px" alt="">
      </div>

    </div>

  </section><!-- End Hero Section -->

  <main id="main">

    <!-- ======= About Section ======= -->
    <section id="about" class="section-bg">
      <div class="container-fluid" data-aos="fade-up">
        <div class="section-header">
          <h3 class="section-title">About Us</h3>
          <span class="section-divider"></span>
          <p class="section-description">
            Sistem Informasi Pelajar dan Administrasi Terpadu<br>
            Aplikasi Terintegrasi Database dan Administrasi Pelajar NU se Jawa Tengah
          </p>
        </div>

        <div class="row">
          <div class="col-lg-6 about-img" data-aos="fade-right" dat-aos-delay="100">
            <img src="<?= base_url() ?>/sipadu-template/assets/img/zonakreator.jpg" alt="">
          </div>

          <div class="col-lg-6 content" data-aos="fade-left" dat-aos-delay="100">
            <h2>SIPADU</h2>
            <h3>Sistem Informasi Pelajar NU dan Administrasi Terpadu.</h3>
            <p>
              Dikembangkan untuk memudahkan pengelolaan database anggota dan administrasi Pelajar NU se Jawa Tengah. Yang secara khusus diterapkan di PW, PC dan PAC (PR, PK) IPNU & IPPNU se Jawa Tengah. Sipadu App ditujukan untuk:
            </p>

            <ul>
              <li><i class="bi bi-check-circle"></i> Efisiensi Perekaman dan Pengelolaan Data.</li>
              <li><i class="bi bi-check-circle"></i> Efektifitas Pengelolaan Data.</li>
              <li><i class="bi bi-check-circle"></i> Data Terpadu dan Terintegrasi.</li>
            </ul>

            <p>
              Seluruh data dari Komisariat, Ranting, PAC, PC se Jawa Tengah akan terintegrasi dalam satu Cloud penyimpanan yang memudahkan untuk pengelolaan dan pengembangan data secara menyeluruh di tingkat provinsi.<br/> Dengan adanya data terpadu dan terintegrasi ini IPNU IPPNU se Jawa Tengah akan dengan mudah memetakan potensi dan arah gerak kedepan dalam pengembangan dan menfasilitasi kader-kader se Jawa Tengah dengan lebih mudah dan akurat sesuai kebutuhan.
            </p>
          </div>
        </div>

      </div>
    </section><!-- End About Section -->

    <!-- ======= Featuress Section ======= -->
    <section id="features">
      <div class="container" data-aos="fade-up">

        <div class="row">

          <div class="col-lg-8 offset-lg-4">
            <div class="section-header">
              <h3 class="section-title">Sipadu App Featuress</h3>
              <span class="section-divider"></span>
            </div>
          </div>

          <div class="col-lg-4 col-md-5 features-img">
            <img src="<?= base_url() ?>/sipadu-template/assets/img/sipadu-mobile.png" alt="" data-aos="fade-right">
          </div>

          <div class="col-lg-8 col-md-7 ">

            <div class="row">

              <div class="col-lg-6 col-md-6 box" data-aos="fade-up">
                <div class="icon"><i class="bi bi-card-checklist"></i></div>
                <h4 class="title"><b>Database Anggota</b></h4>
                <p class="description">Perekaman data yang efisien dan pengelolaan database yang terintegrasi mewujudkan data satu pintu bagi IPNU dan IPPNU.</p>
              </div>
              <div class="col-lg-6 col-md-6 box" data-aos="fade-up">
                <div class="icon"><i class="bi bi-chat-text-fill"></i></div>
                <h4 class="title"><b>Administrasi</b></h4>
                <p class="description">Perekaman surat keluar dan surat masuk. Serta manajemen data administrasi lainnya seperti keuangan, inventaris barang dan program kerja.</p>
              </div>

              <div class="col-lg-6 col-md-6 box" data-aos="fade-up" dat-aos-delay="100">
                <div class="icon"><i class="bi bi-clipboard-data"></i></div>
                <h4 class="title"><b>Statistik Organisasi</b></h4>
                <p class="description">Data statistik organisasi dan pemetaan potensi kader dapat dipetakan otomatis melalui aplikasi ini. Sehingga memudahkan dalam fasilitasi pengembangan SDM kader.</p>
              </div>
              <div class="col-lg-6 col-md-6 box" data-aos="fade-up" data-aos-delay="100">
                <div class="icon"><i class="bi bi-printer-fill"></i></div>
                <h4 class="title"><b>Laporan Organisasi</b></h4>
                <p class="description">Support untuk merangkum laporan organisasi yang dapat dicetak secara berkala (bulanan, tahunan atau akhir masa khidmat). Fitur ini memudahkan dalam merangkai Laporan Pertanggung Jawaban (LPJ).</p>
              </div>
            </div>

          </div>

        </div>

      </div>

    </section><!-- End Featuress Section -->

    <!-- ======= Advanced Featuress Section ======= -->
    <section id="advanced-features">

      <div class="features-row section-bg" data-aos="fade-up">
        <div class="container">
          <div class="row">
            <div class="col-12">
              <img class="advanced-feature-img-right wow fadeInRight" src="<?= base_url() ?>/sipadu-template/assets/img/responsive-device.png" alt="">
              <div>
                <h2>Desain Aplikasi yang Responsive berdasar UI/UX yang baik</h2>
                <h3>Responsive digunakan di semua platform (Komputer, Laptop, Tablet maupun Smartphone).</h3>
                <p>Aplikasi ini didesain menyesuaikan desain kekinian yang mempertimbangkan UI/UX sehingga mudah dan nyaman digunakan di semua platform.</p>
                <p>Anda dapat memilih platform yang nyaman anda gunakan tanpa mengurangi fungsi dan fitur aplikasi yang tersedia. Dapat digunakan pada komputer, laptop, tablet maupun smartphone. Disediakan pula Aplikasi Mobile  (Android).</p>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="features-row" data-aos="fade-up">
        <div class="container">
          <div class="row">
            <div class="col-12">
              <img class="advanced-feature-img-left" src="<?= base_url() ?>/sipadu-template/assets/img/kta-print.png" alt="">
              <div>
                <h2>Anda Dengan Mudah Mengelola Berbagai Data Organisasi</h2>
                <i class="bi bi-calendar4-week"></i>
                <p>Manajemen data kegiatan yang merekam progress pelaksanaan Program Kerja organisasi. Presentase kesuksesan organisasi dalam menjalankan program.</p>
                <i class="bi bi-chat-text-fill"></i>
                <p>Manajemen data administrasi organisasi dapat merekam (termasuk mencetak data) surat keluar, surat masuk, manajemen keuangan dan inventaris barang.</p>
                <i class="bi bi-emoji-heart-eyes"></i>
                <p>Perekaman Database organisasi terpadu di semua tingkatan mulai PR, PK, PAC, PC sampai PW akan terintegrasi se Jawa Tengah. Termasuk didalamnya fitur Mencetak KTA.</p>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="features-row section-bg" data-aos="fade-up">
        <div class="container">
          <div class="row">
            <div class="col-12">
              <img class="advanced-feature-img-right wow fadeInRight" src="<?= base_url() ?>/sipadu-template/assets/img/advanced-feature-3.jpg" alt="">
              <div>
                <h2>Data Statistik Organisasi dan Pemetaan Potensi Kader</h2>
                <h3>Membaca dengan tepat potensi pengembangan SDM anggota dan kader se Jawa Tengah secara otomatis.</h3>
                <p>Sistem akan membantu pemetaan kader berdasar statistik organisasi yang ada untuk fasilitasi pengembangan SDM anggota dan kader. Rekomendasi <b>smart system</b> dapat berupa bentuk kegiatan maupun penyaluran scholarship fund.</p>
                <i class="bi bi-card-heading"></i>
                <p>Termasuk didalamnya sistem ini dikembangan sampai pada pembuatan dan pencetakan <b>Sertifikat Kaderisasi</b> yang diambil dari data potensi kader yang ada. Arsitektur data aplikasi ini dirancang sedemikian rupa untuk menjadi alur yang saling terintegrasi sehingga memudahkan berbagai analisis untuk kemajuan organisasi.</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section><!-- End Advanced Featuress Section -->

    <!-- ======= Call To Action Section ======= -->
    <section id="call-to-action">
      <div class="container">
        <div class="row">
          <div class="col-lg-9 text-center text-lg-start">
            <h3 class="cta-title">Download SIPADU APP</h3>
            <p class="cta-text"> Untuk memasang Aplikasi SIPADU APP anda dapat mengunduh aplikasi yang telah tersedia. Fitur download ini tersedia untuk platform Aplikasi Mobile (Android/Apk).</p>
          </div>
          <div class="col-lg-3 cta-btn-container text-center">
            <a class="cta-btn align-middle" href="#">Download Now</a>
          </div>
        </div>

      </div>
    </section><!-- End Call To Action Section -->


    <!-- ======= Clients Section ======= -->
    <section id="clients">
      <div class="container" data-aos="fade-up">

        <div class="row">

          <div class="col-md-2">
            <img src="<?= base_url() ?>/sipadu-template/assets/img/clients/pwnu.png" alt="">
          </div>

          <div class="col-md-2">
            <img src="<?= base_url() ?>/sipadu-template/assets/img/clients/ipnujateng.png" alt="">
          </div>

          <div class="col-md-2">
            <img src="<?= base_url() ?>/sipadu-template/assets/img/clients/180channel.png" alt="">
          </div>

          <div class="col-md-2">
            <img src="<?= base_url() ?>/sipadu-template/assets/img/clients/180dev-new.png" alt="">
          </div>

          <div class="col-md-2">
            <img src="<?= base_url() ?>/sipadu-template/assets/img/clients/ippnujateng.png" alt="">
          </div>

          <div class="col-md-2">
            <img src="<?= base_url() ?>/sipadu-template/assets/img/clients/maarif.png" alt="">
          </div>

        </div>
      </div>
    </section><!-- End Clients Section -->


    <!-- ======= Team Section ======= -->
    <!--<section id="team" class="section-bg">
      <div class="container" data-aos="fade-up">
        <div class="section-header">
          <h3 class="section-title">Our Team</h3>
          <span class="section-divider"></span>
          <p class="section-description"><b>180 Dev</b> Departemen KOMINFO PW IPNU Provinsi Jawa Tengah</p>
        </div>
        <div class="row">
          <div class="col-lg-3 col-md-6">
            <div class="member">
              <div class="pic"><img src="<?= base_url() ?>/sipadu-template/assets/img/team/wawan.jpg" alt=""></div>
              <h4>Muhammad Kurniawan</h4>
              <span>Project Manager Sipadu App</span>
              <div class="social">
                <a href=""><i class="bi bi-twitter"></i></a>
                <a href=""><i class="bi bi-facebook"></i></a>
                <a href=""><i class="bi bi-instagram"></i></a>
                <a href=""><i class="bi bi-linkedin"></i></a>
              </div>
            </div>
          </div>

          <div class="col-lg-3 col-md-6">
            <div class="member">
              <div class="pic"><img src="<?= base_url() ?>/sipadu-template/assets/img/team/adnan.jpg" alt=""></div>
              <h4>Muhammad Adnan</h4>
              <span>Inisiator and Fullstack Developer</span>
              <div class="social">
                <a href=""><i class="bi bi-twitter"></i></a>
                <a href=""><i class="bi bi-facebook"></i></a>
                <a href=""><i class="bi bi-instagram"></i></a>
                <a href=""><i class="bi bi-linkedin"></i></a>
              </div>
            </div>
          </div>

          <div class="col-lg-3 col-md-6">
            <div class="member">
              <div class="pic"><img src="<?= base_url() ?>/sipadu-template/assets/img/team/alam.jpg" alt=""></div>
              <h4>Maulana Bahrul Alam</h4>
              <span>System Analyst</span>
              <div class="social">
                <a href=""><i class="bi bi-twitter"></i></a>
                <a href=""><i class="bi bi-facebook"></i></a>
                <a href=""><i class="bi bi-instagram"></i></a>
                <a href=""><i class="bi bi-linkedin"></i></a>
              </div>
            </div>
          </div>

          <div class="col-lg-3 col-md-6">
            <div class="member">
              <div class="pic"><img src="<?= base_url() ?>/sipadu-template/assets/img/team/juki.jpg" alt=""></div>
              <h4>Marzuqi Rouf</h4>
              <span>Designer</span>
              <div class="social">
                <a href=""><i class="bi bi-twitter"></i></a>
                <a href=""><i class="bi bi-facebook"></i></a>
                <a href=""><i class="bi bi-instagram"></i></a>
                <a href=""><i class="bi bi-linkedin"></i></a>
              </div>
            </div>
          </div>
        </div>

      </div>
    </section>--><!-- End Team Section -->

    <!-- ======= Contact Section ======= -->
    <section id="contact">
      <div class="container" data-aos="fade-up">
        <div class="row">

          <div class="col-lg-4 col-md-4">
            <div class="contact-about">
              <h3>180 Dev</h3>
              <p>Sipadu App dikembangkan oleh tim 180 Dev dibawah koordinasi Departemen Kominfo Pimpinan Wilayah Ikatan Pelajar Nahdlatul Ulama Provinsi Jawa Tengah yang berkantor di Semarang.</p>
              <div class="social-links">
                <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
                <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
                <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
                <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
                <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
              </div>
            </div>
          </div>

          <div class="col-lg-3 col-md-4">
            <div class="info">
              <div>
                <i class="bi bi-geo-alt"></i>
                <p>Jl. Dr. Cipto 180<br>Semarang, Jawa Tengah</p>
              </div>

              <div>
                <i class="bi bi-envelope"></i>
                <p>sipadu@ipnujateng.or.id</p>
              </div>

              <div>
                <i class="bi bi-phone"></i>
                <p>+62 819-0680-6090</p>
              </div>

            </div>
          </div>

          <div class="col-lg-5 col-md-8">
            <div class="form">
              <form action="<?= base_url() ?>/sipadu-template/forms/contact.php" method="post" role="form" class="php-email-form">
                <div class="row">
                  <div class="form-group col-lg-6">
                    <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" data-rule="minlen:4" data-msg="Please enter at least 4 chars">
                  </div>
                  <div class="form-group col-lg-6 mt-3 mt-lg-0">
                    <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" data-rule="email" data-msg="Please enter a valid email">
                  </div>
                </div>
                <div class="form-group mt-3">
                  <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject">
                </div>
                <div class="form-group mt-3">
                  <textarea class="form-control" name="message" rows="5" placeholder="Message" required></textarea>
                </div>
                <div class="my-3">
                  <div class="loading">Loading</div>
                  <div class="error-message"></div>
                  <div class="sent-message">Your message has been sent. Thank you!</div>
                </div>
                <div class="text-center"><button type="submit" title="Send Message">Send Message</button></div>
              </form>
            </div>
          </div>

        </div>

      </div>
    </section><!-- End Contact Section -->

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer">
    <div class="container">
      <div class="row">
        <div class="col-lg-6 text-lg-start text-center">
          <div class="copyright">
            &copy; Copyright <strong>IPNU JATENG</strong>. All Rights Reserved
          </div>
          <div class="credits">
            <!--
            All the links in the footer should remain intact.
            You can delete the links only if you purchased the pro version.
            Licensing information: https://bootstrapmade.com/license/
            Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/buy/?theme=Avilon
          -->
          </div>
        </div>
        <div class="col-lg-6">
          <nav class="footer-links text-lg-right text-center pt-2 pt-lg-0">
            <a href="#intro" class="scrollto">Home</a>
            <a href="#about" class="scrollto">About Us</a>
            <a href="#about" class="scrollto">Sign In</a>
          </nav>
        </div>
      </div>
    </div>
  </footer><!-- End  Footer -->
<!-- Login IPNU -->
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-chevron-up"></i></a>

<div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header border-bottom-0">
        <h6 class="text-center" style="color: #3498db"><b>Sign In Administrator IPNU</b></h6>
        <button style="background: #3498db;color:#fff;border:none;" type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-title text-center">
          <img src="<?= base_url() ?>/sipadu-template/assets/img/logo-login.png" width="300px">
          <br/><p></p>
        </div>
        <div class="d-flex flex-column text-center">
          <form method="POST" action="<?=base_url()?>home/login"><br/>
            <div class="form-group">
              <input type="hidden" name="kategori_user" id="kategori_user" value="1" />
              <input type="text" class="form-control" name="username" id="username" placeholder="Email or NIA" required>
            </div><br/>
            <div class="form-group">
              <input type="password" class="form-control" name="password" id="password1" placeholder="Password" required>
            </div><br/>
            <button type="submit" style="background: #3498db;color:#fff;" class="form-control btn btn-block btn-round">Login</button>
          </form>


          <div class="d-flex justify-content-center social-buttons">


        </div>
      </div>
    </div>
      <div class="modal-footer d-flex justify-content-center">
        <div class="signup-section">*) <a href="" data-toggle="modal" data-target="#loginModal2" class="text-info"> Sign In Administrator IPPNU</a></div>
      </div>
  </div>
</div>

<!-- Login IPPNU -->
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-chevron-up"></i></a>

<div class="modal fade" id="loginModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header border-bottom-0">
        <h6 class="text-center" style="color: #3498db;"><b>Sign In Administrator IPPNU</b></h6>
        <button type="button" style="background: #3498db;color:#fff;border:none;" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body"><br/>
        <div class="form-title text-center">
          <img src="<?= base_url() ?>/sipadu-template/assets/img/logo-login.png" width="300px">
          <br/><p></p>
        </div>
        <div class="d-flex flex-column text-center">
        <form method="POST" action="<?=base_url()?>home/login"><br/>
            <div class="form-group">
            <input type="hidden" name="kategori_user" id="kategori_user" value="0" />
              <input type="text" class="form-control" name="username" id="username" placeholder="Email or NIA" required>
            </div><br/>
            <div class="form-group">
              <input type="password" class="form-control" name="password" id="password1" placeholder="Password" required>
            </div><br/>
            <button type="submit" style="background: #3498db;color:#fff;" class="form-control btn btn-block btn-round">Login</button>
          </form>

          <div class="d-flex justify-content-center social-buttons">


        </div>
      </div>
    </div>
      <div class="modal-footer d-flex justify-content-center">
        <div class="signup-section">*) <a href="" data-toggle="modal" data-target="#loginModal2" class="text-info"> Sign In Administrator IPNU</a></div>
      </div>
  </div>
</div>


<!-- jQuery Login -->
<script src='https://code.jquery.com/jquery-3.3.1.slim.min.js'></script>
<!-- Popper JS -->
<script src='https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js'></script>
<!-- Bootstrap JS -->
<script src='https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js'></script>
<!-- Login Selesai-->


  <!-- Vendor JS Files -->
  <script src="<?= base_url() ?>/sipadu-template/assets/vendor/aos/aos.js"></script>
  <script src="<?= base_url() ?>/sipadu-template/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="<?= base_url() ?>/sipadu-template/assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="<?= base_url() ?>/sipadu-template/assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="<?= base_url() ?>/sipadu-template/assets/js/main.js"></script>
  <script src="<?=base_url();?>sweetalert/dist/sweetalert2.all.min.js"></script>
  <script src="<?=base_url();?>sweetalert/dist/myscript.js"></script>
</body>

</html>
