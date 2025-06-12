<?php
require "init.php";
?>

<?php
require "layout/header.php";
?>  
<body>
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>
    
    <!-- Humberger Begin -->
    <div class="humberger__menu__overlay"></div>
     <div class="humberger__menu__wrapper">
        <div class="btn croix" style="font-size:40px;top:0; margin-left: 80%;margin-top:0;opacity:0.5"><span class="bi bi-x"></span></div>
        <div class="humberger__menu__logo">
           <a href="index">GB-Commerce</a>
        </div>
        <hr>
        <div class="humberger__menu__widget">
            
            <div class="header__top__right__auth sess_head" style="padding: 2px 0 0">
                
            </div>
        </div>
        <nav class="humberger__menu__nav mobile-menu">
            <ul>
                <li><a href="index"><i class="ri-home-smile-2-line" style="font-size:20px"></i> Accueil</a></li>
                <li><a href="contact"> <span style="color:#7fad39"> contact</span></a></li>
                
                    
                </li>
                <li class="active"><a href="panier"><i class="bi bi-cart" style="font-size:20px;"></i> Panier</a></li>
            </ul>
        </nav>
        <div id="mobile-menu-wrap"></div>
        <div class="header__top__right__social">
            <a href="#"><i class="ri-facebook-fill"></i></a>
            <a href="#" ><i class="ri-whatsapp-fill"></i></a>
            <a href="#"><i class="ri-linkedin-fill"></i></a>
        </div>
    </div>
    <!-- Humberger End -->

    <!-- Header Section Begin -->
     <header class="header">
         <div class="header__top">
             <div class="container">
                 <div class="row">
                     <div class="col-lg-6 col-md-6">
                         <div class="header__top__left">
                             <ul>
                                 <li><i class="fa fa-envelope"></i> jbriceminkande89@yahoo.com</li>
                                 <li>Notre équipe est à votre disposition.</li>
                             </ul>
                         </div>
                     </div>
                     <div class="col-lg-6 col-md-6">
                         <div class="header__top__right">
                             <div class="header__top__right__social">
                            <a href="#"><i class="ri-facebook-fill"></i></a>
                            <a href="#" ><i class="ri-whatsapp-fill"></i></a>
                            <a href="#"><i class="ri-linkedin-fill"></i></a>
                             </div>
                             
                             <div class="header__top__right__auth sess_head">
                                
                             </div>
                         </div>
                     </div>
                 </div>
             </div>
         </div>
         <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="header__logo">
                        <a href="index"><img src="<?= IMG_PATH."/favico/logo.jpg" ?>" width="50" alt="logo"></a>
                    </div>
                </div>
                <div class="col-lg-6">
                    <nav class="header__menu">
                        <ul>
                <li><a href="index"><i class="ri-home-smile-2-line" style="font-size:20px"></i> Accueil</a></li>
                <li class="active"><a href="contact"> contact</a></li>
                
                </li>
                <li><a href="panier"><i class="bi bi-cart" style="font-size:20px"></i> Panier</a></li>            
            </ul>
                    </nav>
                </div>
                
            </div>
            <div class="humberger__open">
                <i class="fa fa-bars" ></i>
            </div>
        </div>
     </header>
    <!-- Header Section End -->

   

    
    <!-- Breadcrumb Section End -->
    <section class="breadcrumb-section set-bg" data-setbg="<?= IMG_PATH."/banner/breadcrumb.jpg" ?>">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>contacts</h2>
                        <div class="breadcrumb__option">
                            <a href="index">Acceuil</a>
                            <span>contact</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    <!--presentation--> 
<div class="container py-4">
    <header class="pb-3 mb-4 border-bottom">
      <a href="/" class="d-flex align-items-center text-body-emphasis text-decoration-none">
        <img src="<?= IMG_PATH."/favico/logo.jpg" ?>" width="38" alt="">
        <span class="fs-4">GB Programmation</span>
      </a>
    </header>

    <div class="p-5 mb-4 bg-body-tertiary rounded-3">
      <div class="container-fluid py-5">
        <h1 class="display-5 fw-bold">NOTRE COMPAGNIE</h1>
        <p class="col-md-8 fs-4">Notre plateforme est un lieu de rencontre virtuel des producteurs et des acheteurs. <br>
            Nous avons créer un système simple et éfficace, qui permet aux agriculteurs de mettre en avant leurs 
            produits tout en offrant aux consommateurs, aux distributeurs la possibilité de trouver facilement des
            produits locaux de qualité.</p>
        <!-- <button class="btn btn-primary btn-lg" type="button">Example button</button> -->
      </div>
    </div>

    <div class="row align-items-md-stretch">
      <div class="col-md-6">
        <div class="h-100 p-5 text-bg-dark rounded-3">
          <h2 style="color: #fff;">Notre Mission</h2>
          <p>Faciliter les échanges entre les offreurs et demandeurs des produits agricoles, 
            pour promouvoir une agriculture durable et responsable.</p>
          <!-- <button class="btn btn-outline-light" type="button">Example button</button> -->
        </div>
      </div>
      <div class="col-md-6">
        <div class="h-100 p-5 bg-body-tertiary border rounded-3">
          <h2>Avantages</h2>
          Accès direct au marché : nous rapprochons le marché vers les acteurs.
              <br>
               Accès à des produits locaux frais et de qualité : nous favorisons des circuits de ventes courts,
               <br>
            Accès à une communauté engagée : nous créons un réseau d’agriculteurs et acheteurs soucieux de promouvoir l’agriculture durable. 
          <!-- <button class="btn btn-outline-secondary" type="button">Example button</button> -->
        </div>
      </div>
    </div>
  </div>
<hr>
    

    
    
    <section class="blog-details spad">
        <div class="container">
            <div class="row">
 
                
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-6 text-center">
                    <div class="contact__widget">
                       <i class="bi bi-globe2" style="font-size:60px;color: #7fad39"></i>
                        <h2>Informations</h2>
        <p>Nous mettons à votre disposition, des informations sur chaque produit à temps réel.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-6 text-center">
                    <div class="contact__widget">
                <i class="bi bi-cart-check" style="font-size:60px;color: #7fad39"></i> 
                        <h2>Achats</h2>
        <p>Vous pouvez faire des achats en ligne, en tout sérénité.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-6 text-center">
                    <div class="contact__widget">
                    <i class="bi bi-coin" style="font-size:50px;color: #7fad39"></i>  
                        <h2>Ventes</h2>
        <p>Vous avez possibilité de ventre vos produits, n'importe où que vous soyez.</p>
                    </div>
                </div>
                
            </div>
        </div>
    </section>
    
    <!--fin de la présentation-->

   
    <!-- Contact Section Begin -->
    <section class="contact spad" style="width: 95%">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <h2>contacts</h2>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 text-center">
                    <div class="contact__widget">
                        <span class="icon_phone"></span>
                        <h4>Téléphone</h4>
                        <p>(+237) 691 266 20</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 text-center">
                    <div class="contact__widget">
                        <span class="icon_pin_alt"></span>
                        <h4>Addresse</h4>
                        <p>Douala, Cameroun</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 text-center">
                    <div class="contact__widget">
                        <span class="icon_clock_alt"></span>
                        <h4>Ouvert</h4>
                        <p>24h/24</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 text-center">
                    <div class="contact__widget">
                        <span class="icon_mail_alt"></span>
                        <h4>Email</h4>
                        <p>jbriceminkande89@yahoo.com</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Contact Section End -->

    <!-- Map Begin -->
   
    <!-- Map End -->

    <!-- Contact Form Begin -->
    <div class="contact-form spad" style="background:  linear-gradient(rgba(62, 63, 64, 0.6), rgba(62, 63, 64, 0.6)), url('<?= IMG_PATH."/1719490203566-2000x1333.jpg" ?>');background-position: center">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="contact__form__title">
                        <h2 style="color:#fff">Laissez un Message</h2>
                    </div>
                </div>
            </div>
            <form action="contact.php" method="POST" id="form_contact">
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <input type="text" placeholder="votre nom" name="name" required>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <input type="email" placeholder="Votre Email" name="email" required>
                    </div>
                    <div class="col-lg-12 text-center">
                        <textarea placeholder="votre message" name="message" required></textarea>
                        <button type="submit" class="site-btn" id="contact_sub" style="border-radius:10px;"> Envoyer</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- Contact Form End -->

    <?php  require 'layout/footer.php';?> 

</body>
