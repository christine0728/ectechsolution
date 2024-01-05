<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Imperial Bootstrap Template</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Facebook Opengraph integration: https://developers.facebook.com/docs/sharing/opengraph -->
  <meta property="og:title" content="">
  <meta property="og:image" content="">
  <meta property="og:url" content="">
  <meta property="og:site_name" content="">
  <meta property="og:description" content="">

  <!-- Twitter Cards integration: https://dev.twitter.com/cards/  -->
  <meta name="twitter:card" content="summary">
  <meta name="twitter:site" content="">
  <meta name="twitter:title" content="">
  <meta name="twitter:description" content="">
  <meta name="twitter:image" content="">
<!-- Favicons -->
<link href="{{ asset('assets/img/favicon.png') }}" rel="icon">
<link href="{{ asset('assets/img/apple-touch-icon.png') }}" rel="apple-touch-icon">

<!-- Google Fonts -->
<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Raleway:300,400,500,700,800" rel="stylesheet">

<!-- Vendor CSS Files -->
<link href="{{ asset('assets/css/aos.css') }}" rel="stylesheet">
<link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet">
<link href="{{ asset('assets/css/bootstrap-icons.css') }}" rel="stylesheet">
<link href="{{ asset('assets/css/glightbox.min.css') }}" rel="stylesheet">
<link href="{{ asset('assets/css/swiper-bundle.min.css') }}" rel="stylesheet">

  <!-- Template Main CSS File -->
<link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">
<style type="text/css">
    /**
* Template Name: Imperial
* Updated: Sep 18 2023 with Bootstrap v5.3.2
* Template URL: https://bootstrapmade.com/imperial-free-onepage-bootstrap-theme/
* Author: BootstrapMade.com
* License: https://bootstrapmade.com/license/
*/

/*--------------------------------------------------------------
# General
--------------------------------------------------------------*/
body {
  background: #fff;
  color: #666666;
  font-family: "Open Sans", sans-serif;
}

a {
  text-decoration: none;
  color: #03C4EB;
  transition: 0.5s;
}

a:hover,
a:active,
a:focus {
  color: #03c5ec;
  outline: none;
  text-decoration: none;
}

p {
  padding: 0;
  margin: 0 0 30px 0;
}

h1,
h2,
h3,
h4,
h5,
h6 {
  font-family: "Raleway", sans-serif;
  font-weight: 400;
  margin: 0 0 20px 0;
  padding: 0;
}

/* Prelaoder */
#preloader {
  position: fixed;
  left: 0;
  top: 0;
  z-index: 999;
  width: 100%;
  height: 100%;
  overflow: visible;
  background: #fff url("../img/preloader.svg") no-repeat center center;
}

/*--------------------------------------------------------------
# Back to top button
--------------------------------------------------------------*/
.back-to-top {
  position: fixed;
  visibility: hidden;
  opacity: 0;
  right: 15px;
  bottom: 15px;
  z-index: 996;
  background: #03C4EB;
  width: 40px;
  height: 40px;
  border-radius: 4px;
  transition: all 0.4s;
}

.back-to-top i {
  font-size: 28px;
  color: #fff;
  line-height: 0;
}

.back-to-top:hover {
  background: #1bd6fc;
  color: #fff;
}

.back-to-top.active {
  visibility: visible;
  opacity: 1;
}

/*--------------------------------------------------------------
# Welcome
--------------------------------------------------------------*/
#hero {
  display: table;
  width: 100%;
  height: 100vh;
  background: url(../img/hero-bg.jpg) top center;
  background-size: cover;
}

@media (min-width: 1024px) {
  #hero {
    background-attachment: fixed;
  }
}

#hero .hero-logo {
  margin: 20px;
}

#hero .hero-logo img {
  max-width: 100%;
}

#hero .hero-container {
  background: rgba(0, 0, 0, 0.8);
  display: table-cell;
  margin: 0;
  padding: 0;
  text-align: center;
  vertical-align: middle;
}

#hero h1 {
  margin: 30px 0 10px 0;
  font-weight: 700;
  line-height: 48px;
  text-transform: uppercase;
  color: #fff;
}

@media (max-width: 768px) {
  #hero h1 {
    font-size: 28px;
    line-height: 36px;
  }
}

#hero h2 {
  color: #ccc;
  margin-bottom: 50px;
}

#hero h2 span {
  color: #fff;
  transition: 0.3s;
  border-bottom: 2px solid #03C4EB;
}

@media (max-width: 768px) {
  #hero h2 {
    font-size: 24px;
    line-height: 26px;
    margin-bottom: 30px;
  }

  #hero h2 .rotating {
    display: block;
  }
}

#hero .rotating>.animated {
  display: inline-block;
}

#hero .actions a {
  font-family: "Raleway", sans-serif;
  text-transform: uppercase;
  font-weight: 500;
  font-size: 16px;
  letter-spacing: 1px;
  display: inline-block;
  padding: 8px 20px;
  border-radius: 2px;
  transition: 0.5s;
  margin: 10px;
}

#hero .btn-get-started {
  background: #03C4EB;
  border: 2px solid #03C4EB;
  color: #fff;
}

#hero .btn-get-started:hover {
  background: none;
  border: 2px solid #fff;
  color: #fff;
}

#hero .btn-services {
  border: 2px solid #fff;
  color: #fff;
}

#hero .btn-services:hover {
  background: #03C4EB;
  border: 2px solid #03C4EB;
}

/*--------------------------------------------------------------
# Header
--------------------------------------------------------------*/
#header {
  background: #0d0d0d;
  transition: all 0.5s;
  z-index: 997;
  height: 70px;
}

@media (max-width: 992px) {
  #header {
    height: 60px;
  }
}

#header.fixed-top {
  background: rgba(0, 0, 0, 0.85);
}

#header .logo {
  font-size: 30px;
  margin: 0;
  padding: 0;
  line-height: 1;
  font-weight: 400;
  letter-spacing: 2px;
  text-transform: uppercase;
}

#header .logo a {
  color: #fff;
}

#header .logo img {
  height: 50px;
}

.scrolled-offset {
  margin-top: 70px;
}

@media (max-width: 992px) {
  .scrolled-offset {
    margin-top: 60px;
  }
}

/*--------------------------------------------------------------
# Navigation Menu
--------------------------------------------------------------*/
/**
* Desktop Navigation 
*/
.navbar {
  padding: 0;
}

.navbar ul {
  margin: 0;
  padding: 0;
  display: flex;
  list-style: none;
  align-items: center;
}

.navbar li {
  position: relative;
}

.navbar a,
.navbar a:focus {
  display: flex;
  align-items: center;
  justify-content: space-between;
  padding: 10px 0 10px 30px;
  font-family: "Raleway", sans-serif;
  font-size: 14px;
  color: #fff;
  white-space: nowrap;
  transition: 0.3s;
}

.navbar a i,
.navbar a:focus i {
  font-size: 12px;
  line-height: 0;
  margin-left: 5px;
}

.navbar a:hover,
.navbar .active,
.navbar .active:focus,
.navbar li:hover>a {
  color: #03C4EB;
}

.navbar .dropdown ul {
  display: block;
  position: absolute;
  left: 14px;
  top: calc(100% + 30px);
  margin: 0;
  padding: 10px 0;
  z-index: 99;
  opacity: 0;
  visibility: hidden;
  background: #fff;
  box-shadow: 0px 0px 30px rgba(127, 137, 161, 0.25);
  transition: 0.3s;
}

.navbar .dropdown ul li {
  min-width: 200px;
}

.navbar .dropdown ul a {
  padding: 10px 20px;
  text-transform: none;
  color: #333333;
}

.navbar .dropdown ul a i {
  font-size: 12px;
}

.navbar .dropdown ul a:hover,
.navbar .dropdown ul .active:hover,
.navbar .dropdown ul li:hover>a {
  color: #03C4EB;
}

.navbar .dropdown:hover>ul {
  opacity: 1;
  top: 100%;
  visibility: visible;
}

.navbar .dropdown .dropdown ul {
  top: 0;
  left: calc(100% - 30px);
  visibility: hidden;
}

.navbar .dropdown .dropdown:hover>ul {
  opacity: 1;
  top: 0;
  left: 100%;
  visibility: visible;
}

@media (max-width: 1366px) {
  .navbar .dropdown .dropdown ul {
    left: -90%;
  }

  .navbar .dropdown .dropdown:hover>ul {
    left: -100%;
  }
}

/**
* Mobile Navigation 
*/
.mobile-nav-toggle {
  color: #fff;
  font-size: 28px;
  cursor: pointer;
  display: none;
  line-height: 0;
  transition: 0.5s;
}

@media (max-width: 991px) {
  .mobile-nav-toggle {
    display: block;
  }

  .navbar ul {
    display: none;
  }
}

.navbar-mobile {
  position: fixed;
  overflow: hidden;
  top: 0;
  right: 0;
  left: 0;
  bottom: 0;
  background: rgba(26, 26, 26, 0.9);
  transition: 0.3s;
  z-index: 999;
}

.navbar-mobile .mobile-nav-toggle {
  position: absolute;
  top: 15px;
  right: 15px;
}

.navbar-mobile ul {
  display: block;
  position: absolute;
  top: 55px;
  right: 15px;
  bottom: 15px;
  left: 15px;
  padding: 10px 0;
  background-color: #fff;
  overflow-y: auto;
  transition: 0.3s;
}

.navbar-mobile a,
.navbar-mobile a:focus {
  padding: 10px 20px;
  font-size: 15px;
  color: #333333;
}

.navbar-mobile a:hover,
.navbar-mobile .active,
.navbar-mobile li:hover>a {
  color: #03C4EB;
}

.navbar-mobile .getstarted,
.navbar-mobile .getstarted:focus {
  margin: 15px;
}

.navbar-mobile .dropdown ul {
  position: static;
  display: none;
  margin: 10px 20px;
  padding: 10px 0;
  z-index: 99;
  opacity: 1;
  visibility: visible;
  background: #fff;
  box-shadow: 0px 0px 30px rgba(127, 137, 161, 0.25);
}

.navbar-mobile .dropdown ul li {
  min-width: 200px;
}

.navbar-mobile .dropdown ul a {
  padding: 10px 20px;
}

.navbar-mobile .dropdown ul a i {
  font-size: 12px;
}

.navbar-mobile .dropdown ul a:hover,
.navbar-mobile .dropdown ul .active:hover,
.navbar-mobile .dropdown ul li:hover>a {
  color: #03C4EB;
}

.navbar-mobile .dropdown>.dropdown-active {
  display: block;
}

/*--------------------------------------------------------------
# Sections
--------------------------------------------------------------*/
/* Sections Common
--------------------------------*/
section {
  overflow: hidden;
}

.section-title {
  font-size: 32px;
  color: #111;
  text-transform: uppercase;
  text-align: center;
  font-weight: 700;
}

.section-description {
  text-align: center;
  margin-bottom: 40px;
}

.section-title-divider {
  width: 50px;
  height: 3px;
  background: #03C4EB;
  margin: 0 auto;
  margin-bottom: 20px;
}

/* Get Started Section
--------------------------------*/
#about {
  background: #fff;
  padding: 80px 0;
}

#about .about-img {
  overflow: hidden;
}

#about .about-img img {
  max-width: 100%;
}

@media (max-width: 768px) {
  #about .about-img {
    height: auto;
  }

  #about .about-img img {
    margin-left: 0;
    padding-bottom: 30px;
  }
}

#about .about-content {
  background: #fff;
}

#about .about-title {
  color: #333;
  font-weight: 700;
  font-size: 28px;
}

#about .about-text {
  line-height: 26px;
  margin-bottom: 15px;
}

#about .about-text:last-child {
  margin-bottom: 0;
}

/* Services Section
--------------------------------*/
#services {
  background: linear-gradient(rgba(255, 255, 255, 0.9), rgba(255, 255, 255, 0.9)), url("../img/services-bg.jpg") fixed center center;
  background-size: cover;
  padding: 80px 0 60px 0;
}

#services .service-item {
  margin-bottom: 20px;
}

#services .service-icon {
  float: left;
  background: #03C4EB;
  border-radius: 50%;
  transition: 0.5s;
  border: 1px solid #03C4EB;
  display: inline-flex;
  align-items: center;
  justify-content: center;
  width: 64px;
  height: 64px;
}

#services .service-icon i {
  color: #fff;
  font-size: 24px;
  line-height: 0;
}

#services .service-item:hover .service-icon {
  background: #fff;
}

#services .service-item:hover .service-icon i {
  color: #03C4EB;
}

#services .service-title {
  margin-left: 80px;
  font-weight: 700;
  margin-bottom: 15px;
  text-transform: uppercase;
}

#services .service-title a {
  color: #111;
}

#services .service-description {
  margin-left: 80px;
  line-height: 24px;
}

/* Subscribe Section
--------------------------------*/
#subscribe {
  background: linear-gradient(rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.6)), url(../img/subscribe-bg.jpg) fixed center center;
  background-size: cover;
  padding: 80px 0;
}

#subscribe .subscribe-title {
  color: #fff;
  font-size: 28px;
  font-weight: 700;
}

#subscribe .subscribe-text {
  color: #fff;
}

#subscribe .subscribe-btn-container {
  text-align: center;
  padding-top: 20px;
}

#subscribe .subscribe-btn {
  font-family: "Raleway", sans-serif;
  text-transform: uppercase;
  font-weight: 500;
  font-size: 16px;
  letter-spacing: 1px;
  display: inline-block;
  padding: 8px 20px;
  border-radius: 2px;
  transition: 0.5s;
  margin: 10px;
  border: 2px solid #fff;
  color: #fff;
}

#subscribe .subscribe-btn:hover {
  background: #03C4EB;
  border: 2px solid #03C4EB;
}

/* Portfolio Section
--------------------------------*/
#portfolio {
  background: #fff;
  padding: 80px 0;
}

#portfolio #portfolio-flters {
  padding: 0;
  margin: 0 auto 35px auto;
  list-style: none;
  text-align: center;
}

#portfolio #portfolio-flters li {
  cursor: pointer;
  display: inline-block;
  padding: 8px 12px;
  font-size: 14px;
  font-weight: 600;
  line-height: 1;
  text-transform: uppercase;
  color: #666666;
  transition: all 0.3s ease-in-out;
}

#portfolio #portfolio-flters li:hover,
#portfolio #portfolio-flters li.filter-active {
  color: #03C4EB;
}

#portfolio #portfolio-flters li:last-child {
  margin-right: 0;
}

#portfolio .portfolio-item {
  margin-bottom: 30px;
}

#portfolio .portfolio-item .portfolio-info {
  opacity: 0;
  position: absolute;
  left: 12px;
  right: 12px;
  bottom: 0;
  z-index: 3;
  transition: all ease-in-out 0.3s;
  background: rgba(255, 255, 255, 0.85);
  padding: 15px;
}

#portfolio .portfolio-item .portfolio-info h4 {
  font-size: 18px;
  color: #fff;
  font-weight: 600;
  color: #333333;
  margin-bottom: 5px;
}

#portfolio .portfolio-item .portfolio-info p {
  color: #666666;
  font-size: 14px;
  margin-bottom: 0;
}

#portfolio .portfolio-item .portfolio-info .preview-link,
#portfolio .portfolio-item .portfolio-info .details-link {
  position: absolute;
  right: 48px;
  font-size: 28px;
  top: calc(50% - 28px);
  color: #4d4d4d;
}

#portfolio .portfolio-item .portfolio-info .preview-link:hover,
#portfolio .portfolio-item .portfolio-info .details-link:hover {
  color: #03C4EB;
}

#portfolio .portfolio-item .portfolio-info .details-link {
  right: 15px;
}

#portfolio .portfolio-item:hover .portfolio-info {
  opacity: 1;
}

/*--------------------------------------------------------------
# Portfolio Details
--------------------------------------------------------------*/
.portfolio-details {
  padding-top: 20px;
}

.portfolio-details .portfolio-details-slider img {
  width: 100%;
}

.portfolio-details .portfolio-details-slider .swiper-pagination {
  margin-top: 20px;
  position: relative;
}

.portfolio-details .portfolio-details-slider .swiper-pagination .swiper-pagination-bullet {
  width: 12px;
  height: 12px;
  background-color: #fff;
  opacity: 1;
  border: 1px solid #03C4EB;
}

.portfolio-details .portfolio-details-slider .swiper-pagination .swiper-pagination-bullet-active {
  background-color: #03C4EB;
}

.portfolio-details .portfolio-info {
  padding: 30px;
  box-shadow: 0px 0 30px rgba(51, 51, 51, 0.08);
}

.portfolio-details .portfolio-info h3 {
  font-size: 22px;
  font-weight: 700;
  margin-bottom: 20px;
  padding-bottom: 20px;
  border-bottom: 1px solid #eee;
}

.portfolio-details .portfolio-info ul {
  list-style: none;
  padding: 0;
  font-size: 15px;
}

.portfolio-details .portfolio-info ul li+li {
  margin-top: 10px;
}

.portfolio-details .portfolio-description {
  padding-top: 30px;
}

.portfolio-details .portfolio-description h2 {
  font-size: 26px;
  font-weight: 700;
  margin-bottom: 20px;
}

.portfolio-details .portfolio-description p {
  padding: 0;
}

/* Testimonials Section
--------------------------------*/
#testimonials {
  background: #f6f6f6;
  padding: 80px 0;
}

#testimonials .profile {
  text-align: center;
}

#testimonials .profile .pic {
  border-radius: 50%;
  border: 6px solid #fff;
  margin-bottom: 15px;
  overflow: hidden;
  height: 260px;
  width: 260px;
}

#testimonials .profile .pic img {
  max-width: 100%;
}

#testimonials .profile h4 {
  font-weight: 700;
  color: #03C4EB;
  margin-bottom: 5px;
}

#testimonials .profile span {
  color: #333333;
}

#testimonials .quote {
  position: relative;
  background: #fff;
  padding: 60px;
  margin-top: 40px;
  font-size: 16px;
  font-style: italic;
  border-radius: 5px;
}

#testimonials .quote b {
  display: inline-block;
  font-size: 22px;
  left: -9px;
  position: relative;
  top: -8px;
}

#testimonials .quote small {
  display: inline-block;
  right: -9px;
  position: relative;
  top: 4px;
}

/* Team Section
--------------------------------*/
#team {
  background: #fff;
  padding: 80px 0 60px 0;
}

#team .member {
  text-align: center;
  margin-bottom: 20px;
}

#team .member .pic {
  margin-bottom: 15px;
  overflow: hidden;
  height: 260px;
}

#team .member .pic img {
  max-width: 100%;
}

#team .member h4 {
  font-weight: 700;
  margin-bottom: 2px;
}

#team .member span {
  font-style: italic;
  display: block;
  font-size: 13px;
}

#team .member .social {
  margin-top: 15px;
}

#team .member .social a {
  color: #b3b3b3;
}

#team .member .social a:hover {
  color: #03C4EB;
}

#team .member .social i {
  font-size: 18px;
  margin: 0 2px;
}

/* Contact Section
--------------------------------*/
#contact {
  background: #f7f7f7;
  padding: 80px 0 120px 0;
}

#contact .info {
  color: #333333;
}

#contact .info i {
  font-size: 32px;
  color: #03C4EB;
  float: left;
  line-height: 0;
}

#contact .info p {
  padding: 0 0 10px 50px;
  line-height: 24px;
}

#contact .php-email-form .error-message {
  display: none;
  color: #fff;
  background: #ed3c0d;
  text-align: left;
  padding: 15px;
  font-weight: 600;
}

#contact .php-email-form .error-message br+br {
  margin-top: 25px;
}

#contact .php-email-form .sent-message {
  display: none;
  color: #fff;
  background: #18d26e;
  text-align: center;
  padding: 15px;
  font-weight: 600;
}

#contact .php-email-form .loading {
  display: none;
  background: #fff;
  text-align: center;
  padding: 15px;
}

#contact .php-email-form .loading:before {
  content: "";
  display: inline-block;
  border-radius: 50%;
  width: 24px;
  height: 24px;
  margin: 0 10px -6px 0;
  border: 3px solid #18d26e;
  border-top-color: #eee;
  animation: animate-loading 1s linear infinite;
}

#contact .php-email-form input,
#contact .php-email-form textarea {
  border-radius: 0;
  box-shadow: none;
}

#contact .php-email-form input::focus,
#contact .php-email-form textarea::focus {
  background-color: #03C4EB;
}

#contact .php-email-form button[type=submit] {
  background: #03C4EB;
  border: 0;
  padding: 10px 24px;
  color: #fff;
  transition: 0.4s;
}

#contact .php-email-form button[type=submit]:hover {
  background: #25d8fc;
}

@keyframes animate-loading {
  0% {
    transform: rotate(0deg);
  }

  100% {
    transform: rotate(360deg);
  }
}

/*--------------------------------------------------------------
# Breadcrumbs
--------------------------------------------------------------*/
.breadcrumbs {
  padding: 30px 0;
}

.breadcrumbs h2 {
  font-size: 26px;
  font-weight: 300;
}

.breadcrumbs ol {
  display: flex;
  flex-wrap: wrap;
  list-style: none;
  padding: 0;
  margin: 0;
  font-size: 15px;
}

.breadcrumbs ol li+li {
  padding-left: 10px;
}

.breadcrumbs ol li+li::before {
  display: inline-block;
  padding-right: 10px;
  color: gray;
  content: "/";
}

@media (max-width: 768px) {
  .breadcrumbs .d-flex {
    display: block !important;
  }

  .breadcrumbs ol {
    display: block;
  }

  .breadcrumbs ol li {
    display: inline-block;
  }
}

/*--------------------------------------------------------------
# Footer
--------------------------------------------------------------*/
#footer {
  background: #111;
  padding: 30px 0;
  color: #fff;
}

#footer .copyright {
  text-align: center;
}

#footer .credits {
  padding-top: 10px;
  text-align: center;
  font-size: 13px;
  color: #ccc;
}
</style>

  <!-- =======================================================
  * Template Name: Imperial
  * Updated: Sep 18 2023 with Bootstrap v5.3.2
  * Template URL: https://bootstrapmade.com/imperial-free-onepage-bootstrap-theme/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Hero Section ======= -->
  <section id="hero">
    <div class="hero-container">
      <div data-aos="fade-in">
        <div class="hero-logo">
          <img class="" src="assets/img/logo.png" alt="Imperial">
        </div>

        <h1>Welcome to Imperial studios</h1>
        <h2>We create <span class="typed" data-typed-items="beautiful graphics, functional websites, working mobile apps"></span></h2>
        <div class="actions">
          <a href="#about" class="btn-get-started">Get Strated</a>
          <a href="#services" class="btn-services">Our Services</a>
        </div>
      </div>
    </div>
  </section><!-- End Hero -->

  <!-- ======= Header ======= -->
  <header id="header" class="d-flex align-items-center">
    <div class="container d-flex align-items-center justify-content-between">

      <a href="index.html" class="logo mr-auto"><img src="assets/img/logo.png" alt=""></a>
      <!-- Uncomment below if you prefer to use a text logo -->
      <!-- <h1 class="logo mr-auto"><a href="index.html">Imperial</a></h1> -->

      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto active" href="#hero">Home</a></li>
          <li><a class="nav-link scrollto" href="#about">About</a></li>
          <li><a class="nav-link scrollto" href="#services">Services</a></li>
          <li><a class="nav-link scrollto " href="#portfolio">Portfolio</a></li>
          <li><a class="nav-link scrollto" href="#testimonials">Testimonials</a></li>
          <li><a class="nav-link scrollto" href="#team">Team</a></li>
          <li class="dropdown"><a href="#"><span>Drop Down</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
              <li><a href="#">Drop Down 1</a></li>
              <li class="dropdown"><a href="#"><span>Deep Drop Down</span> <i class="bi bi-chevron-right"></i></a>
                <ul>
                  <li><a href="#">Deep Drop Down 1</a></li>
                  <li><a href="#">Deep Drop Down 2</a></li>
                  <li><a href="#">Deep Drop Down 3</a></li>
                  <li><a href="#">Deep Drop Down 4</a></li>
                  <li><a href="#">Deep Drop Down 5</a></li>
                </ul>
              </li>
              <li><a href="#">Drop Down 2</a></li>
              <li><a href="#">Drop Down 3</a></li>
              <li><a href="#">Drop Down 4</a></li>
            </ul>
          </li>
          <li><a class="nav-link scrollto" href="#contact">Contact</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->

  <main id="main">

    <!-- ======= About Section ======= -->
    <section id="about">
      <div class="container" data-aos="fade-up">
        <div class="row">
          <div class="col-md-12">
            <h3 class="section-title">About Us</h3>
            <div class="section-title-divider"></div>
            <p class="section-description">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam</p>
          </div>
        </div>
      </div>
      <div class="container about-container" data-aos="fade-up" data-aos-delay="200">
        <div class="row">

          <div class="col-lg-6 about-img">
            <img src="assets/img/about-img.jpg" alt="">
          </div>

          <div class="col-md-6 about-content">
            <h2 class="about-title">We provide great services and ideass</h2>
            <p class="about-text">
              Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor
              in reprehenderit in voluptate
            </p>
            <p class="about-text">
              Ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim
              id est laborum
            </p>
            <p class="about-text">
              Ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt molli.
            </p>
          </div>
        </div>
      </div>
    </section><!-- End About Section -->

    <!-- ======= Services Section ======= -->
    <section id="services">
      <div class="container">
        <div class="row" data-aos="fade-up">
          <div class="col-md-12">
            <h3 class="section-title">Our Services</h3>
            <div class="section-title-divider"></div>
            <p class="section-description">At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium</p>
          </div>
        </div>

        <div class="row" data-aos="fade-up" data-aos-delay="200">
          <div class="col-lg-4 col-md-6 service-item">
            <div class="service-icon"><i class="bi bi-briefcase"></i></div>
            <h4 class="service-title"><a href="">Lorem Ipsum</a></h4>
            <p class="service-description">Voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident</p>
          </div>
          <div class="col-lg-4 col-md-6 service-item">
            <div class="service-icon"><i class="bi bi-card-checklist"></i></div>
            <h4 class="service-title"><a href="">Dolor Sitema</a></h4>
            <p class="service-description">Minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat tarad limino ata</p>
          </div>
          <div class="col-lg-4 col-md-6 service-item">
            <div class="service-icon"><i class="bi bi-bar-chart"></i></div>
            <h4 class="service-title"><a href="">Sed ut perspiciatis</a></h4>
            <p class="service-description">Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur</p>
          </div>
          <div class="col-lg-4 col-md-6 service-item">
            <div class="service-icon"><i class="bi bi-binoculars"></i></div>
            <h4 class="service-title"><a href="">Magni Dolores</a></h4>
            <p class="service-description">Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum</p>
          </div>
          <div class="col-lg-4 col-md-6 service-item">
            <div class="service-icon"><i class="bi bi-brightness-high"></i></div>
            <h4 class="service-title"><a href="">Nemo Enim</a></h4>
            <p class="service-description">At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque</p>
          </div>
          <div class="col-lg-4 col-md-6 service-item">
            <div class="service-icon"><i class="bi bi-calendar4-week"></i></div>
            <h4 class="service-title"><a href="">Eiusmod Tempor</a></h4>
            <p class="service-description">Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi</p>
          </div>
        </div>
      </div>
    </section><!-- End Services Section -->

    <!-- ======= Subscrbe Section ======= -->
    <section id="subscribe">
      <div class="container" data-aos="fade-up">
        <div class="row">
          <div class="col-md-8">
            <h3 class="subscribe-title">Subscribe For Updates</h3>
            <p class="subscribe-text">Join our 1000+ subscribers and get access to the latest tools, freebies, product announcements and much more!</p>
          </div>
          <div class="col-md-4 subscribe-btn-container">
            <a class="subscribe-btn" href="#">Subscribe Now</a>
          </div>
        </div>
      </div>
    </section><!-- End Subscrbe Section -->

    <!-- ======= Portfolio Section ======= -->
    <section id="portfolio">
      <div class="container" data-aos="fade-up">
        <div class="row">
          <div class="col-md-12">
            <h3 class="section-title">Portfolio</h3>
            <div class="section-title-divider"></div>
            <p class="section-description">Si stante, hoc natura videlicet vult, salvam esse se, quod concedimus ses haec dicturum fuisse</p>
          </div>
        </div>

        <div class="row">
          <div class="col-lg-12 d-flex justify-content-center">
            <ul id="portfolio-flters">
              <li data-filter="*" class="filter-active">All</li>
              <li data-filter=".filter-app">App</li>
              <li data-filter=".filter-card">Card</li>
              <li data-filter=".filter-web">Web</li>
            </ul>
          </div>
        </div>

        <div class="row portfolio-container">

          <div class="col-lg-4 col-md-6 portfolio-item filter-app">
            <img src="assets/img/portfolio/portfolio-1.jpg" class="img-fluid" alt="">
            <div class="portfolio-info">
              <h4>App 1</h4>
              <p>App</p>
              <a href="assets/img/portfolio/portfolio-1.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link" title="App 1"><i class="bi bi-plus"></i></a>
              <a href="portfolio-details.html" class="details-link" title="More Details"><i class="bi bi-link"></i></a>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-web">
            <img src="assets/img/portfolio/portfolio-2.jpg" class="img-fluid" alt="">
            <div class="portfolio-info">
              <h4>Web 3</h4>
              <p>Web</p>
              <a href="assets/img/portfolio/portfolio-2.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link" title="Web 3"><i class="bi bi-plus"></i></a>
              <a href="portfolio-details.html" class="details-link" title="More Details"><i class="bi bi-link"></i></a>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-app">
            <img src="assets/img/portfolio/portfolio-3.jpg" class="img-fluid" alt="">
            <div class="portfolio-info">
              <h4>App 2</h4>
              <p>App</p>
              <a href="assets/img/portfolio/portfolio-3.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link" title="App 2"><i class="bi bi-plus"></i></a>
              <a href="portfolio-details.html" class="details-link" title="More Details"><i class="bi bi-link"></i></a>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-card">
            <img src="assets/img/portfolio/portfolio-4.jpg" class="img-fluid" alt="">
            <div class="portfolio-info">
              <h4>Card 2</h4>
              <p>Card</p>
              <a href="assets/img/portfolio/portfolio-4.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link" title="Card 2"><i class="bi bi-plus"></i></a>
              <a href="portfolio-details.html" class="details-link" title="More Details"><i class="bi bi-link"></i></a>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-web">
            <img src="assets/img/portfolio/portfolio-5.jpg" class="img-fluid" alt="">
            <div class="portfolio-info">
              <h4>Web 2</h4>
              <p>Web</p>
              <a href="assets/img/portfolio/portfolio-5.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link" title="Web 2"><i class="bi bi-plus"></i></a>
              <a href="portfolio-details.html" class="details-link" title="More Details"><i class="bi bi-link"></i></a>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-app">
            <img src="assets/img/portfolio/portfolio-6.jpg" class="img-fluid" alt="">
            <div class="portfolio-info">
              <h4>App 3</h4>
              <p>App</p>
              <a href="assets/img/portfolio/portfolio-6.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link" title="App 3"><i class="bi bi-plus"></i></a>
              <a href="portfolio-details.html" class="details-link" title="More Details"><i class="bi bi-link"></i></a>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-card">
            <img src="assets/img/portfolio/portfolio-7.jpg" class="img-fluid" alt="">
            <div class="portfolio-info">
              <h4>Card 1</h4>
              <p>Card</p>
              <a href="assets/img/portfolio/portfolio-7.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link" title="Card 1"><i class="bi bi-plus"></i></a>
              <a href="portfolio-details.html" class="details-link" title="More Details"><i class="bi bi-link"></i></a>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-card">
            <img src="assets/img/portfolio/portfolio-8.jpg" class="img-fluid" alt="">
            <div class="portfolio-info">
              <h4>Card 3</h4>
              <p>Card</p>
              <a href="assets/img/portfolio/portfolio-8.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link" title="Card 3"><i class="bi bi-plus"></i></a>
              <a href="portfolio-details.html" class="details-link" title="More Details"><i class="bi bi-link"></i></a>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-web">
            <img src="assets/img/portfolio/portfolio-9.jpg" class="img-fluid" alt="">
            <div class="portfolio-info">
              <h4>Web 3</h4>
              <p>Web</p>
              <a href="assets/img/portfolio/portfolio-9.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link" title="Web 3"><i class="bi bi-plus"></i></a>
              <a href="portfolio-details.html" class="details-link" title="More Details"><i class="bi bi-link"></i></a>
            </div>
          </div>

        </div>

      </div>
    </section><!-- End Portfolio Section -->

    <!-- ======= Testimonials Section ======= -->
    <section id="testimonials">
      <div class="container" data-aos="fade-up">
        <div class="row">
          <div class="col-md-12">
            <h3 class="section-title">Testimonials</h3>
            <div class="section-title-divider"></div>
            <p class="section-description">Erdo lide, nora porodo filece, salvam esse se, quod concedimus ses haec dicturum fuisse</p>
          </div>
        </div>

        <div class="row">
          <div class="col-md-3">
            <div class="profile">
              <div class="pic"><img src="assets/img/client-1.jpg" alt=""></div>
              <h4>Saul Goodman</h4>
              <span>Lawless Inc</span>
            </div>
          </div>
          <div class="col-md-9">
            <div class="quote">
              <b><img src="assets/img/quote_sign_left.png" alt=""></b> Proin iaculis purus consequat sem cure digni ssim donec porttitora entum suscipit rhoncus. Accusantium quam, ultricies eget id, aliquam eget nibh et. Maecen aliquam, risus at semper. <small><img src="assets/img/quote_sign_right.png" alt=""></small>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-md-9">
            <div class="quote">
              <b><img src="assets/img/quote_sign_left.png" alt=""></b> Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis architecto beatae. <small><img src="assets/img/quote_sign_right.png" alt=""></small>
            </div>
          </div>
          <div class="col-md-3">
            <div class="profile">
              <div class="pic"><img src="assets/img/client-2.jpg" alt=""></div>
              <h4>Sara Wilsson</h4>
              <span>Odeo Inc</span>
            </div>
          </div>
        </div>

      </div>
    </section><!-- End Testimonials Section -->

    <!-- ======= Team Section ======= -->
    <section id="team">
      <div class="container" data-aos="fade-up">
        <div class="row">
          <div class="col-md-12">
            <h3 class="section-title">Our Team</h3>
            <div class="section-title-divider"></div>
            <p class="section-description">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque</p>
          </div>
        </div>

        <div class="row">
          <div class="col-md-3">
            <div class="member">
              <div class="pic"><img src="assets/img/team/team-1.jpg" alt=""></div>
              <h4>Walter White</h4>
              <span>Chief Executive Officer</span>
              <div class="social">
                <a href=""><i class="bi bi-twitter"></i></a>
                <a href=""><i class="bi bi-facebook"></i></a>
                <a href=""><i class="bi bi-instagram"></i></a>
                <a href=""><i class="bi bi-linkedin"></i></a>
              </div>
            </div>
          </div>

          <div class="col-md-3">
            <div class="member">
              <div class="pic"><img src="assets/img/team/team-2.jpg" alt=""></div>
              <h4>Sarah Jhinson</h4>
              <span>Product Manager</span>
              <div class="social">
                <a href=""><i class="bi bi-twitter"></i></a>
                <a href=""><i class="bi bi-facebook"></i></a>
                <a href=""><i class="bi bi-instagram"></i></a>
                <a href=""><i class="bi bi-linkedin"></i></a>
              </div>
            </div>
          </div>

          <div class="col-md-3">
            <div class="member">
              <div class="pic"><img src="assets/img/team/team-3.jpg" alt=""></div>
              <h4>William Anderson</h4>
              <span>CTO</span>
              <div class="social">
                <a href=""><i class="bi bi-twitter"></i></a>
                <a href=""><i class="bi bi-facebook"></i></a>
                <a href=""><i class="bi bi-instagram"></i></a>
                <a href=""><i class="bi bi-linkedin"></i></a>
              </div>
            </div>
          </div>

          <div class="col-md-3">
            <div class="member">
              <div class="pic"><img src="assets/img/team/team-4.jpg" alt=""></div>
              <h4>Amanda Jepson</h4>
              <span>Accountant</span>
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
    </section><!-- End Team Section -->

    <!-- ======= Contact Section ======= -->
    <section id="contact">
      <div class="container" data-aos="fade-up">
        <div class="row">
          <div class="col-md-12">
            <h3 class="section-title">Contact Us</h3>
            <div class="section-title-divider"></div>
            <p class="section-description">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque</p>
          </div>
        </div>

        <div class="row justify-content-center">
          <div class="col-lg-3 col-md-4">
            <div class="info">
              <div>
                <i class="bi bi-geo-alt"></i>
                <p>A108 Adam Street<br>New York, NY 535022</p>
              </div>

              <div>
                <i class="bi bi-envelope"></i>
                <p>info@example.com</p>
              </div>

              <div>
                <i class="bi bi-phone"></i>
                <p>+1 5589 55488 55s</p>
              </div>

            </div>
          </div>

          <div class="col-lg-5 col-md-8">
            <div class="form">
              <form action="forms/contact.php" method="post" role="form" class="php-email-form">
                <div class="form-group">
                  <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" required>
                </div>
                <div class="form-group mt-3">
                  <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" required>
                </div>
                <div class="form-group mt-3">
                  <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" required>
                </div>
                <div class="form-group mt-3">
                  <textarea class="form-control" name="message" rows="5" placeholder="Message" required></textarea>
                </div>
                <div class="my-3">
                  <div class="loading">Loading</div>
                  <div class="error-message"></div>
                  <div class="sent-message">Your message has been sent. Thank you!</div>
                </div>
                <div class="text-center"><button type="submit">Send Message</button></div>
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
        <div class="col-md-12">
          <div class="copyright">
            &copy; Copyright <strong>Imperial Theme</strong>. All Rights Reserved
          </div>
          <div class="credits">
            <!--
            All the links in the footer should remain intact.
            You can delete the links only if you purchased the pro version.
            Licensing information: https://bootstrapmade.com/license/
            Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/buy/?theme=Imperial
          -->
            Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
          </div>
        </div>
      </div>
    </div>
  </footer><!-- End Footer -->

  <div id="preloader"></div>
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
<script src="{{ asset('assets/js/aos.js') }}"></script>
<script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('assets/js/glightbox.min.js') }}"></script>
<script src="{{ asset('assets/js/isotope.pkgd.min.js') }}"></script>
<script src="{{ asset('assets/js/swiper-bundle.min.js') }}"></script>
<script src="{{ asset('assets/js/typed.umd.js') }}"></script>
<script src="{{ asset('assets/js/validate.js') }}"></script>

<!-- Template Main JS File -->
<script src="{{ asset('assets/js/main.js') }}"></script>


</body>

</html>