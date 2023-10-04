
  <!-- // Header -->
@include('partials.frontend._header') 
  <!-- ======= Hero Section ======= -->
  <section id="hero" style="margin-top: 45px;">
    <div class="hero-container">
      <div id="heroCarousel" data-bs-interval="5000" class="carousel slide carousel-fade" data-bs-ride="carousel">

        <ol class="carousel-indicators" id="hero-carousel-indicators"></ol>

        <div class="carousel-inner" role="listbox">

          <!-- Slide 1 -->
          <div class="carousel-item active" style="background-image: url(assets/img/banniere_1.JPG);  background-color: #cccccc;">
            <div class="carousel-container">
              <div class="carousel-content">
                <h2 class="animate__animated animate__fadeInDown">Bienvenue sur la plateforme de l'incubateur de projets textiles au Burkina Faso</h2>
                <!-- <p class="animate__animated animate__fadeInUp slide-texte">Cette plateforme vise à vous permettre de soumettre votre avant-projet, afin de participer à l’appel à projet lancé dans le cadre du Guichet 2 du PReCA.
                    Veuillez suivre les étapes pas-à-pas et donner des informations de qualité, pour vous permettre de présenter un dossier compétitif pour la suite du processus. Rappelez-vous ! La compétition est ouverte à l’ensemble des 13 régions du Burkina Faso.</p> -->
                  <a href="#choix_type_personne" data-toggle="modal" class="btn-get-started scrollto animate__animated animate__fadeInUp">Souscrire</a>
              </div>
            </div>
          </div>

          <!-- Slide 2 -->
          {{-- <div class="carousel-item" style="background-image: url(assets/img/banière1.png);">
            <div class="carousel-container">
              <div class="carousel-content">
                <h2 class="animate__animated animate__fadeInDown">Informations</h2>
                <p class="animate__animated animate__fadeInUp slide-texte ">Ut velit est quam dolor ad a aliquid qui aliquid. Sequi ea ut et est quaerat sequi nihil ut aliquam. Occaecati alias dolorem mollitia ut. Similique ea voluptatem. Esse doloremque accusamus repellendus deleniti vel. Minus et tempore modi architecto.</p>
                <a href="#about" class="btn-get-started scrollto animate__animated animate__fadeInUp">Read More</a>
              </div>
            </div>
          </div>

          <!-- Slide 3 -->
          <div class="carousel-item" style="background-image: url(assets/img/banière2.png);">
            <div class="carousel-container">
              <div class="carousel-content">
                <h2 class="animate__animated animate__fadeInDown">Sequi ea ut et est quaerat</h2>
                <p class="animate__animated animate__adeInUp">Ut velit est quam dolor ad a aliquid qui aliquid. Sequi ea ut et est quaerat sequi nihil ut aliquam. Occaecati alias dolorem mollitia ut. Similique ea voluptatem. Esse doloremque accusamus repellendus deleniti vel. Minus et tempore modi architecto.</p>
                <a href="#about" class="btn-get-started scrollto animate__animated animate__fadeInUp">Lire Plus</a>
              </div>
            </div>
          </div> --}}

        </div>

        <a class="carousel-control-prev" href="#heroCarousel" role="button" data-bs-slide="prev">
          <span class="carousel-control-prev-icon ri-arrow-left-line" aria-hidden="true"></span>
        </a>

        <a class="carousel-control-next" href="#heroCarousel" role="button" data-bs-slide="next">
          <span class="carousel-control-next-icon ri-arrow-right-line" aria-hidden="true"></span>
        </a>

      </div>
    </div>
  </section><!-- End Hero -->

  <main id="main">

  <div class="horloge">
  <!-- <strong><p id="horloge"></p></strong> -->
</div>
    <!-- ======= About Section ======= -->
    <section id="about" class="about" style="margin-top: -65px;">
      <div class="container">
        <div class="row content">
          <div class="col-lg-4">
            <h3 style="text-decoration: underline;">Objectif</h3>
            <p style="text-align: justify">
            Offrir des services d'incubation et d’accompagnement dans la mobilisation des ressources 
            de financement aux acteurs dans le secteur du coton et textile au Burkina Faso.
            </p>
            <!-- <h3 style="text-decoration: underline;">Domaine d’intervention</h3>
            <p style="text-align: justify">
                Filières riz, oignon, karité, tomate,
                anacarde, mangue et maïs (maillon transformation).
            </p> -->
          </div>
          <div class="col-lg-7 pt-7 pt-lg-1 col-lg-offset-1">
            <!-- <h3 style="text-decoration: underline;">Zone d’intervention et durée du Guichet 2</h3>
            <p style="text-align: justify">
                Zone d'intervention : 13 régions du Burkina Faso <br>
                Durée du projet : 03 ans (36 mois), à partir du 03 mai 2022.
            </p> -->
          </div>
        </div>
      </div>
    </section><!-- End About Section -->
    <!-- ======= Services Section ======= -->
    <section id="services" style="margin-top: -50px;" class="services section-bg">
      <div class="container">
        <div class="section-title">
          <span style="margin-top: -20px;">Missions - Vision - Objectifs</span>
        </div>
        <div class="row">
          <div class="col-md-5" style="width: 580px;">
            <div class="icon-box" style="height: 200px;">
              <i class="bi bi-card-checklist"></i>
              <h4><a href="#">Vision</a></h4>
              <p>Faire du Burkina Faso un pays émergent dans le domaine de la transformation locale du coton et du textile, 
                à moyen et long terme, en accompagnant la création et le développement de 15 entreprises viables durant les 5 premières années.</p>
            </div>
          </div>
          <div class="col-md-5" style="width: 580px;">
            <div class="icon-box" style="height: 200px;">
              <i class="bi bi-card-checklist"></i>
              <h4><a href="#">Mission</a></h4>
              <p>L’incubateur BURKINA TEXTILE aura pour mission d’accompagner la création et le développement des entreprises de textile. 
                Celles-ci seront source de création d’emplois et de richesses. Elles contribueront à développer le tissu industriel local et à consolider la filière.</p>
            </div>
          </div>
          <div class="col-md-6" style="width: 580px;">
            <div class="icon-box" style="height: 200px;">
              <i class="bi bi-card-checklist"></i>
              <h4><a href="#">Objectif</a></h4>
              <p>Offrir des services d'incubation et d’accompagnement dans la mobilisation des 
                ressources de financement aux acteurs dans le secteur du coton et textile au Burkina Faso.</p>
            </div>
          </div>
          <!-- <div class="col-md-6 mt-4 mt-md-0" style="width: 580px;">
            <div class="icon-box" style="height: 150px;">
              <i class="bi bi-card-checklist"></i>
              <h4><a href="#">Composante 4</a></h4>
              <p> Coordination du projet, renforcement des capacités institutionnelles et composante d'intervention d'urgence contingente.</p>
            </div>
          </div> -->
        </div>
      </div>
    </section><!-- End Services Section -->
    <!-- ======= Counts Section ======= -->
    <section id="counts" class="counts">
      <div class="container position-relative">
        <div class="text-center title">
          <h3>Les Statistiques</h3>
          <!-- <p>Iusto et labore modi qui sapiente xpedita tempora et aut non ipsum consequatur illo.</p> -->
        </div>
        <div class="row counters">
          
@foreach ($souscriptionsParzone as $zone)
          <div class="col-lg-2 col-6 text-center">
            <span data-purecounter-start="0" data-purecounter-end="{{$zone->nombre}}" data-purecounter-duration="1" class="purecounter"></span>
            <p>{{$zone->libelle}}</p>
          </div>
@endforeach
        </div>
          <div class="row counters">
           
            <div class="col-lg-4 col-6 text-center">
              <span data-purecounter-start="0" data-purecounter-end="{{$nombreprojet}}" data-purecounter-duration="1" class="purecounter"></span>
              <p>Projets</p>
            </div>
         
          </div>

        </div>

      </div>
    </section><!-- End Counts Section -->

    <section id="services" class="services section-bg">
      <div class="container">
        <div class="section-title">
          <span>PARTENAIRES</span>

          <!-- <p>Sit sint consectetur velit quisquam cupiditate impedit suscipit alias</p> -->
        </div>
      </div>
    </section>


    <!-- ======= Testimonials Section ======= -->
    <section id="testimonials" class="testimonials">
      <div class="container position-relative">

        <div class="testimonials-slider swiper" data-aos="fade-up" data-aos-delay="100">
          <div class="swiper-wrapper">

            <div class="swiper-slide">
              <div class="testimonial-item">
                {{-- <img src="assets/img/testimonials/testimonials-1.jpg" class="testimonial-img" alt=""> --}}
                <img src="assets/img/logo-burkina.png" class="testimonial-img" alt="">
                <h3>Burkina Textile</h3>
                <h4>partenaire</h4>
                <p>
                  <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                  	Burkina Textile
                  <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                </p>
              </div>
            </div><!-- End testimonial item -->

            <div class="swiper-slide">
              <div class="testimonial-item">
                <img src="assets/img/armoirie.png" class="testimonial-img" alt="">
                <h3>ETAT</h3>
                <p>
                  <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                  Ministère du Développement Industriel, du Commerce, 
                  de l'Artisanat et des Petites et Moyennes Entreprises
                  <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                </p>
              </div>
            </div><!-- End testimonial item -->

            <div class="swiper-slide">
              <div class="testimonial-item">
                <img src="assets/img/logo_GIZ.jpg" class="testimonial-img" alt="">
                <h3>GIZ</h3>
                {{-- <h4>Store Owner</h4> --}}
                <p>
                  <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                  GIZ
                  <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                </p>
              </div>
            </div><!-- End testimonial item -->

            <div class="swiper-slide">
              <div class="testimonial-item">
                <img src="assets/img/logo_cooperation_allemande.jpg" width=50 height=50 class="testimonial-img" alt="">
                <h3>Coopération Allemande</h3>
                <p>
                  <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                  Coopération Allemande
                  <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                </p>
              </div>
            </div><!-- End testimonial item -->

            <div class="swiper-slide">
              <div class="testimonial-item">
                <img src="assets/img/logo_afppme.jpg" width=50 height=50 class="testimonial-img" alt="">
                <h3>AFP-PME</h3>

                <p>
                  <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                  AFP-PME
                  <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                </p>
              </div>
            </div>
            <div class="swiper-slide">
                <div class="testimonial-item">
                  <img src="assets/img/logo_mebf.jpg" class="testimonial-img" alt="">
                  <h3>MEBF</h3>
                  <p>
                    <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                    Maison de l'Entreprise du Burkina Faso
                    <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                  </p>
                </div>
              </div>
              <!-- <div class="swiper-slide">
                <div class="testimonial-item">
                  <img src="assets/img/CNA.png" class="testimonial-img" alt="">
                  <h3>CRA</h3>
                  <p>
                    <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                    Chambres Régionales d’Agriculture.
                    <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                  </p>
                </div>
              </div> -->
              <!-- <div class="swiper-slide">
                <div class="testimonial-item">
                  <img src="assets/img/APBEF-B-1.png" class="testimonial-img" alt="">
                  <h3>APBEF</h3>
                  <p>
                    <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                    Association Professionnelle des banques et établissements financiers.
                    <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                  </p>
                </div>
              </div> -->
              <!-- <div class="swiper-slide">
                <div class="testimonial-item">
                  <img src="assets/img/armoirie.png" class="testimonial-img" alt="">
                  <h3></h3>
                  <p>
                    <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                    Organisations et faîtières des filières concernées.
                    <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                  </p>
                </div>
              </div> -->
              <!-- <div class="swiper-slide">
                <div class="testimonial-item">
                  <img src="assets/img/cba.png" class="testimonial-img" alt="">
                  <h3>CBA</h3>
                  <p>
                    <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                    Conseil Burkinabè de l’Anacarde.
                    <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                  </p>
                </div>

              </div>End testimonial item -->

          </div>
          <div class="swiper-pagination"></div>
        </div>

      </div>
    </section><!-- End Testimonials Section -->
    <section id="services" class="services section-bg">
      <div class="container">
        <div class="section-title">
          <span>CONTACTEZ-NOUS</span>

          <!-- <p>Sit sint consectetur velit quisquam cupiditate impedit suscipit alias</p> -->
        </div>
      </div>
    </section>

    <!-- ======= Contact Section ======= -->

    <section id="contact" class="contact">
     <!--  <div class="container">
        <div class="section-title">
          <span>Contact</span>
          <h2>Contact</h2>
          <p>Sit sint consectetur velit quisquam cupiditate impedit suscipit alias</p>
        </div>
      </div>

      <div class="map">
        <iframe style="border:0; width: 100%; height: 350px;" src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d12097.433213460943!2d-74.0062269!3d40.7101282!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xb89d1fe6bc499443!2sDowntown+Conference+Center!5e0!3m2!1smk!2sbg!4v1539943755621" frameborder="0" allowfullscreen></iframe>
      </div>
-->
      <div class="container">

        <div class="info-wrap mt-5">
          <div class="row">
            <div class="col-lg-4 info">
              <i class="ri-map-pin-line"></i>
              <h4>Adresse:</h4>
              <p> 132, Avenue de Lyon 11 BP 379 Ouagadougou 11 | Burkina Faso</p>
            </div>
            <div class="col-lg-4 info mt-4 mt-lg-0">
              <i class="ri-mail-line"></i>
              <h4>Email: </h4>
              <p> info@burkinatextile.bf<br></p>
            </div>
            <div class="col-lg-4 info mt-4 mt-lg-0">
              <i class="ri-phone-line"></i>
              <h4>Téléphone:</h4>
              <p>+226 25 39 80 60 / 61</p>
            </div>
          </div>
        </div>

        <form action="forms/contact.php" method="post" role="form" class="php-email-form">
          <div class="row">
            <div class="col-md-6 form-group">
              <input type="text" name="name" class="form-control" id="name" placeholder="Votre Nom" required>
            </div>
            <div class="col-md-6 form-group mt-3 mt-md-0">
              <input type="email" class="form-control" name="email" id="email" placeholder="Votre Email" required>
            </div>
          </div>
          <div class="form-group mt-3">
            <input type="text" class="form-control" name="subject" id="subject" placeholder="Sujet" required>
          </div>
          <div class="form-group mt-3">
            <textarea class="form-control" name="message" rows="5" placeholder="Message" required></textarea>
          </div>
          <div class="my-3">
            <div class="loading"></div>
            <div class="error-message"></div>
            <div class="sent-message">Votre message a été envoyé. Merci!</div>
          </div>
          <div class="text-center"><button type="submit">Envoyer un message</button></div>
        </form>

      </div>

    </section><!-- End Contact Section -->

  </main><!-- End #main -->
  <!-- // Footer -->
  @include('partials.frontend._footer')

