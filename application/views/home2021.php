<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Progress Report Pengendalian Pembangunan Sumatera Utara</title>
    <link rel="icon" type="image/png" sizes="16x16" href="<?= base_url('images/preloader.png')?>">
    
    <link href="https://fonts.googleapis.com/css?family=Rubik:300,400,500,700,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?= base_url('assets/assets/css/animate.min.css')?>">
    <link rel="stylesheet" href="<?= base_url('assets/assets/css/bootstrap.min.css')?>">
    <link rel="stylesheet" href="<?= base_url('assets/assets/css/owl.carousel.min.css')?>">
    <link rel="stylesheet" href="<?= base_url('assets/assets/css/owl.theme.default.min.css')?>">
    <link rel="stylesheet" href="<?= base_url('assets/assets/css/magnific-popup.css')?>">
    <link rel="stylesheet" href="<?= base_url('assets/assets/css/font-awesome.min.css')?>">
    <link rel="stylesheet" href="<?= base_url('assets/assets/css/swiper.min.css')?>">
    <link rel="stylesheet" href="<?= base_url('assets/assets/plugins/dimon-icons/style.css')?>">

    <!-- template styles -->
    <link rel="stylesheet" href="<?= base_url('assets/assets/css/style.css')?>">
    <link rel="stylesheet" href="<?= base_url('assets/assets/css/responsive.css')?>">
</head>

<body>
    <div class="preloader">
        <img src="<?= base_url('assets/assets/images/resources/preloader.png')?>" class="preloader__image" alt="">
    </div><!-- /.preloader -->
    <div class="page-wrapper">
        <header class="site-header site-header__header-one ">
            <nav class="navbar navbar-expand-lg navbar-light header-navigation stricky">
                <div class="container clearfix">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <div class="logo-box clearfix">
                        <a class="navbar-brand" href="<?= base_url()?>">
                            <img src="<?= base_url('assets/assets/images/resources/logo.png')?>" class="main-logo" width="250" alt="Logo" />
                        </a>
                        <button class="menu-toggler" data-target=".main-navigation">
                            <span class="fa fa-bars"></span>
                        </button>
                    </div><!-- /.logo-box -->
                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="main-navigation">
                        <ul class="one-page-scroll-menu navigation-box">
                            <li class="scrollToLink">
                                <a href="<?= base_url()?>">Beranda</a>
                            </li>
                            <li class="scrollToLink">
                                <a href="http://biroadmpembg.sumutprov.go.id/index.php/id/homepage">Website</a>
                            </li>
                            <li class="scrollToLink">
                                <a href="<?= base_url('apbd-provinsi')?>">Provinsi</a>
                            </li>
                            <li class="scrollToLink">
                                <a href="<?= base_url('kabupaten-kota')?>">Kabupaten/Kota</a>
                            </li>
                        </ul>
                    </div><!-- /.navbar-collapse -->
                    <div class="right-side-box">
                        <a class="thm-btn header__cta-btn" href="<?= base_url('login')?>">
                                 <span> Login</span></a>
                    </div><!-- /.right-side-box -->
                    <!-- /.right-side-box -->
                </div>
                <!-- /.container -->
            </nav>
        </header><!-- /.site-header -->
        <section class="banner-one" id="banner">
            <span class="banner-one__shape-1"></span>
            <span class="banner-one__shape-2"></span>
            <span class="banner-one__shape-3"></span>
            <span class="banner-one__shape-4"></span>
            <div class="container">
                <div class="banner-one__moc">
                    <img src="<?= base_url('assets/assets/images/mocs/gubernur.png')?>" alt="Awesome Image" />
                </div><!-- /.banner-one__moc -->
                <div class="row">
                    <div class="col-xl-6 col-lg-8">
                        <div class="banner-one__content">
                            <h3 class="banner-one__title"><span>Aplikasi</span> <br>PRP2Sumut</h3><!-- /.banner-one__title -->
                            <br>
                            <h4>Progress Report Pengendalian Pembangunan Sumatera Utara</h4><!-- /.banner-one__title -->
                            <p class="banner-one__text">Biro Administrasi Pembangunan <br> Setda Provinsi Sumatera Utara</p>
                            <!-- /.banner-one__text -->

                        </div><!-- /.banner-one__content -->
                    </div><!-- /.col-lg-6 -->
                </div><!-- /.row -->
                
            </div><!-- /.container -->
        </section><!-- /.banner-one -->

        <section class="service-one" id="features">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 wow fadeInUp" data-wow-duration="1500ms">
                        <div class="service-one__single text-center">
                            <div class="service-one__inner">
                            <a href="<?= base_url('apbd-provinsi')?>" class="service-one__link"> APBD Provinsi Sumatera Utara</a>
                                <?php 
                                    $ch = curl_init(); 
                                    curl_setopt($ch, CURLOPT_URL, "http://prp2sumut.sumutprov.go.id/publik/dashboardcurl");
                                    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
                                    $output = curl_exec($ch); 
                                    curl_close($ch);      
                                    echo $output;
                                ?>
                                <p>Progress Report Pengendalian Pembangunan Provinsi Sumatera Utara
                                    <br>APBD Provinsi
                                </p>
                                <a href="<?= base_url('apbd-provinsi')?>" class="service-one__link"> Buka Aplikasi <i class="dimon-icon-right-arrow"></i></a>
                            </div>
                        </div>
                    </div><!-- /.col-lg-3 col-md-6 col-sm-12 -->

                    <div class="col-lg-4 col-md-6 col-sm-12 wow fadeInDown" data-wow-duration="1500ms">
                        <div class="service-one__single text-center">
                            <div class="service-one__inner">
                                <i class="service-one__icon dimon-icon-presentation"></i>
                                <p>Progress Report Pengendalian Pembangunan Provinsi Sumatera Utara</p>
                                <a href="<?= base_url('kabupaten-kota-2021')?>" class="service-one__link"> APBD Kabupaten/Kota 2021 <i class="dimon-icon-right-arrow"></i></a>
                                <a href="<?= base_url('kabupaten-kota-2022')?>" class="service-one__link"> APBD Kabupaten/Kota 2022 <i class="dimon-icon-right-arrow"></i></a>
                            </div><!-- /.service-one__inner -->
                        </div><!-- /.service-one__single -->
                    </div><!-- /.col-lg-3 col-md-6 col-sm-12 -->

                    <div class="col-lg-4 col-md-6 col-sm-12 wow fadeInDown" data-wow-duration="1500ms">
                        <div class="service-one__single text-center">
                            <div class="service-one__inner">
                                <i class="service-one__icon dimon-icon-visualization"></i>
                                <p>Progress Report Pengendalian Pembangunan Provinsi Sumatera Utara</p>
                                <a href="<?= base_url('dana-desa')?>" class="service-one__link"> Dana Desa <i class="dimon-icon-right-arrow"></i></a>
                            </div><!-- /.service-one__inner -->
                        </div><!-- /.service-one__single -->
                    </div><!-- /.col-lg-3 col-md-6 col-sm-12 -->

                    <div class="col-lg-4 col-md-6 col-sm-12 wow fadeInDown" data-wow-duration="1500ms">
                        <div class="service-one__single text-center">
                            <div class="service-one__inner">
                                <i class="service-one__icon dimon-icon-presentation"></i>
                                <p>Progress Report Pengendalian Pembangunan Provinsi Sumatera Utara</p>
                                <a href="<?= base_url('mandatory-spending-2021')?>" class="service-one__link"> Mandatory Spending 2021 <i class="dimon-icon-right-arrow"></i></a>
                                <a href="<?= base_url('mandatory-spending-2022')?>" class="service-one__link"> Mandatory Spending 2022 <i class="dimon-icon-right-arrow"></i></a>
                            </div><!-- /.service-one__inner -->
                        </div><!-- /.service-one__single -->
                    </div><!-- /.col-lg-3 col-md-6 col-sm-12 -->
                    
                </div>
                <!-- /.row -->
            </div><!-- /.container -->
        </section><!-- /.service-one -->
        <!-- /.video-one -->
        <!-- /.cta-one -->
        <!-- /.cta-two -->
        <!-- /.mailchimp-one -->
        <footer class="site-footer">
            <!-- /.site-footer__upper -->
            <div class="site-footer__bottom">
                <div class="container">
                    <div class="inner-container text-center">
                        <p class="site-footer__copy">&copy; copyright 2021 by <a href="#">Biro Administrasi Pembangunan Provinsi Sumatera Utara</a></p>
                        <!-- /.site-footer__copy -->
                    </div><!-- /.inner-container -->
                </div><!-- /.container -->
            </div><!-- /.site-footer__bottom -->
        </footer><!-- /.site-footer -->
    </div><!-- /.page-wrapper -->


    <a href="#" data-target="html" class="scroll-to-target scroll-to-top"><i class="fa fa-angle-up"></i></a>


    <script src="<?= base_url('assets/assets/js/jquery.min.js')?>"></script>
    <script src="<?= base_url('assets/assets/js/bootstrap.bundle.min.js')?>"></script>
    <script src="<?= base_url('assets/assets/js/owl.carousel.min.js')?>"></script>
    <script src="<?= base_url('assets/assets/js/waypoints.min.js')?>"></script>
    <script src="<?= base_url('assets/assets/js/jquery.counterup.min.js')?>"></script>
    <script src="<?= base_url('assets/assets/js/TweenMax.min.js')?>"></script>
    <script src="<?= base_url('assets/assets/js/wow.js')?>"></script>
    <script src="<?= base_url('assets/assets/js/jquery.magnific-popup.min.js')?>"></script>
    <script src="<?= base_url('assets/assets/js/jquery.ajaxchimp.min.js')?>"></script>
    <script src="<?= base_url('assets/assets/js/swiper.min.js')?>"></script>
    <script src="<?= base_url('assets/assets/js/jquery.easing.min.js')?>"></script>

    <!-- template scripts -->
    <script src="<?= base_url('assets/assets/js/theme.js')?>"></script>
</body>

</html>