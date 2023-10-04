<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Burkina Textile</title>
  <meta content="" name="description">
  <meta content="" name="keywords">


  {{-- <link rel="stylesheet" href="{{asset('formasset/fonts/material-icon/css/material-design-iconic-font.min.css')}}">
    <link rel="stylesheet" href="{{asset('formasset/vendor/nouislider/nouislider.min.css')}}">

    <!-- Main css -->
    <link rel="stylesheet" href="{{asset('formasset/css/style.css')}}"> --}}

  <!-- Favicons -->

        <!-- Related styles of various icon packs and plugins -->
        <link rel="stylesheet" href="{{asset('form_asset/css/plugins.css')}}">

        <!-- The main stylesheet of this template. All Bootstrap overwrites are defined in here -->
        <link rel="stylesheet" href="{{asset('form_asset/css/main.css')}}">

        <!-- Include a specific file here from css/themes/ folder to alter the default theme of the template -->

        <!-- The themes stylesheet of this template (for using specific theme color in individual elements - must included last) -->
        <link rel="stylesheet" href="{{asset('form_asset/css/themes.css')}}">


  <link href="{{asset('assets/img/logo-burkina.png')}}" rel="icon">
  <link href="{{asset('assets/img/apple-touch-icon.png')}}" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{asset('assets/vendor/animate.css/animate.min.css')}}" rel="stylesheet">
  {{-- <link href="{{asset('assets/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet"> --}}
 <link href="{{asset('assets/vendor/bootstrap-icons/bootstrap-icons.css')}}" rel="stylesheet">
 <link href="{{asset('assets/vendor/boxicons/css/boxicons.min.css')}}" rel="stylesheet">
   <link href="{{asset('assets/vendor/glightbox/css/glightbox.min.css')}}" rel="stylesheet">
   <link href="{{asset('assets/vendor/remixicon/remixicon.css')}}" rel="stylesheet">
  <link href="{{asset('assets/vendor/swiper/swiper-bundle.min.css')}}" rel="stylesheet">

  <!-- Template Main CSS File -->

  {{-- <link href="{{asset('assets/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet"> --}}
  <link rel="stylesheet" href="{{asset('form_asset/css/bootstrap.min.css')}}">
  <link href="{{asset('assets/css/style.css')}}" rel="stylesheet">

  <script src="{{asset('js/vendor/modernizr.min.js')}}"></script>

  <!-- =======================================================
  * Template Name: MyBiz - v4.7.0
  * Template URL: https://bootstrapmade.com/mybiz-free-business-bootstrap-theme/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Top Bar ======= -->
  <section id="topbar" class="fixed-top d-flex align-items-center">
    <div class="container d-flex justify-content-center justify-content-md-between">
      <div class="contact-info d-flex align-items-center">
        <i class="bi bi-envelope d-flex align-items-center"><a href="mailto:contact@example.com">info@burkinatextile.bf</a></i>
        <i class="bi bi-phone d-flex align-items-center ms-4"><span> +226 25 39 80 60 / 61 - 53 30 52 53</span></i>
      </div>
      <div class="social-links d-none d-md-flex" style="margin-left: 80%;">
        <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
        <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
        <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
        <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></i></a>
      </div>
    </div>
  </section>

  <!-- ======= Header ======= -->
  <header id="header"  class="fixed-top d-flex align-items-center">
    <div class="container d-flex align-items-center justify-content-between">
    
      <div class="logo">
      
        <h1><a href="{{route('accueil')}}">BURKINA <span>TEXTILE</span></a></h1>
       
      </div>
      <div class="img-logo">
        <img alt="Logo Burkina Textile" src="{{asset('assets/img/logo-burkina.png')}}"/>
        
      </div>
      <nav id="navbar" class="navbar"> 
        <ul>
          <li><a class="nav-link scrollto active" href="{{route('accueil')}}">Accueil</a></li>
          <li><a class="nav-link scrollto" href="#mode" data-toggle="modal">Comment s'inscrire?</a></li>
          <li><a class="nav-link scrollto" href="#choix_type_personne" data-toggle="modal">S'inscrire</a></li>

           <li><a class="nav-link scrollto " href="{{route('poursuivre.inscription')}}">Poursuivre</a></li> 
          {{-- <li><a class="nav-link scrollto " href="#portfolio">Telecharger le formulaire</a></li> --}}

         <!-- <li><a class="nav-link scrollto" href="#team">Team</a></li>
           <li class="dropdown"><a href="#"><span>CEFORE</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
              <li><a href="#">Création d'entreprise</a></li>
              <li class="dropdown"><a href="#"><span>Types d'Entreprises</span> <i class="bi bi-chevron-right"></i></a>
                 <ul>
                   <li><a href="#">Deep Drop Down 1</a></li>
                  <li><a href="#">Deep Drop Down 2</a></li>
                  <li><a href="#">Deep Drop Down 3</a></li>
                  <li><a href="#">Deep Drop Down 4</a></li>
                  <li><a href="#">Deep Drop Down 5</a></li>
                 </ul>
              </li>
              <li><a href="#">Modification d'entreprises</a></li>
              <li><a href="#">Radiation d'entreprises</a></li>
               <li><a href="#">Demande de Prestations</a></li>
            </ul>
          </li>
          <li><a class="nav-link scrollto" href="#contact">Contact</a></li>-->
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->
