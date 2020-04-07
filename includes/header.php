<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>JobBoard &mdash; Website Template by Colorlib</title>
  <meta name="description" content="">
  <meta name="keywords" content="">
  <meta name="author" content="Free-Template.co">
  <link rel="shortcut icon" href="/assets/images/favicon.ico">
  <link rel="stylesheet" href="/assets/css/bootstrap.min.css">
  <link rel="stylesheet" href="/assets/css/jquery.fancybox.min.css">
  <link rel="stylesheet" href="/assets/css/bootstrap-select.min.css">
  <link rel="stylesheet" href="/assets/fonts/icomoon.css">
  <link rel="stylesheet" href="/assets/css/owl.carousel.min.css">
  <link rel="stylesheet" href="/assets/css/animate.min.css">
  <link rel="stylesheet" href="/assets/css/quill.snow.min.css">
  <link rel="stylesheet" href="/assets/css/style.css">
</head>
<body id="top">
  <div id="overlayer"></div>
  <div class="loader">
    <div class="spinner-border text-primary" role="status">
      <span class="sr-only">Loading...</span>
    </div>
  </div>
  <div class="site-wrap">
    <div class="site-mobile-menu site-navbar-target">
      <div class="site-mobile-menu-header">
        <div class="site-mobile-menu-close mt-3">
          <span class="icon-close2 js-menu-toggle"></span>
        </div>
      </div>
      <div class="site-mobile-menu-body"></div>
    </div>
    <header class="site-navbar mt-3">
      <div class="container-fluid">
        <div class="row align-items-center">
          <div class="site-logo col-6"><a href="/">JobBoard</a></div>
          <nav class="mx-auto site-navigation">
            <ul class="site-menu js-clone-nav d-none d-xl-block ml-0 pl-0">
              <li><a href="/" class="nav-link active">Home</a></li>
              <li><a href="/about">About</a></li>
              <li><a href="/jobs">Jobs</a></li>
              <li class="has-children">
                <a href="/services">Pages</a>
                <ul class="dropdown">
                  <li><a href="/services">Services</a></li>
                  <li><a href="/service">Service Single</a></li>
                  <li><a href="/blogs">Blogs</a></li>
                  <li><a href="/blog">Blog Single</a></li>
                  <li><a href="/portfolios">Portfolio</a></li>
                  <li><a href="/portfolio">Portfolio Single</a></li>
                  <li><a href="/testimonials">Testimonials</a></li>
                  <li><a href="/faqs">Frequently Ask Questions</a></li>
                  <li><a href="/gallery">Gallery</a></li>
                </ul>
              </li>
              <li><a href="/contact">Contact</a></li>
              <li class="d-lg-none"><a href="/post-job"><span class="mr-2">+</span> Post a Job</a></li>
              <li class="d-lg-none"><a href="/login">Log In</a></li>
            </ul>
          </nav>
          <div class="right-cta-menu text-right d-flex aligin-items-center col-6">
            <div class="ml-auto">
              <?php if (isset($_SESSION['user_id'])): ?>
              <a href="/post-job" class="btn btn-outline-white border-width-2 d-none d-lg-inline-block"><span class="mr-2 icon-add"></span>Post a Job</a>
              <a href="/logout" class="btn btn-primary border-width-2 d-none d-lg-inline-block"><span class="mr-2 icon-lock_outline"></span>Log Out</a>
              <?php else: ?>
              <a href="/register" class="btn btn-outline-white border-width-2 d-none d-lg-inline-block"><span class="mr-2 icon-add"></span>Register</a>
              <a href="/login" class="btn btn-primary border-width-2 d-none d-lg-inline-block"><span class="mr-2 icon-lock_outline"></span>Log In</a>
              <?php endif; ?>
            </div>
            <a href="#" class="site-menu-toggle js-menu-toggle d-inline-block d-xl-none mt-lg-2 ml-3"><span class="icon-menu h3 m-0 p-0 mt-2"></span></a>
          </div>
        </div>
      </div>
    </header>
