<?php
require "init.php";
$panier = new \App\Panier\Panier();
?>

<?php
require "layout/header.php";
?>  

<body >
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>

    <!-- Humberger Begin -->
    <div class="humberger__menu__overlay"></div>
     <div class="humberger__menu__wrapper">
        <div class="btn croix" style="font-size:40px;top:0; margin-left: 80%;margin-top:0"><span class="bi bi-x"></span></div>
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
                <li><a href="contact"> contact</a></li>
                
                    
                </li>
                <li class="active"><a href="./panier.php"><i class="bi bi-cart" style="font-size:20px; color:#7fad39"></i><span style="color:#7fad39"> Panier</span></a></li>
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

    <!-- Header Section Begin in lg-->
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
                <li><a href="contact"> Contact</a></li>
                   
                    
                </li>
                <li class="active"><a href="./cmd.php"><i class="bi bi-cart" style="font-size:20px"></i> Panier</a></li>            
                        </ul>
                    </nav>
                </div>
                <div class="col-lg-3">
                    <div class="header__cart" id="headpanier">
                        
                    </div>
                </div>    
            </div>
            <div class="humberger__open">
                <i class="fa fa-bars" ></i>
            </div>
        </div>
     </header>
    <!-- Header Section End -->
     <section class="breadcrumb-section set-bg" data-setbg="<?= IMG_PATH ."/banner/breadcrumb.jpg"?>">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>Panier</h2>
                        <div class="breadcrumb__option">
                            <a href="index">Acceuil</a>
                            <span>Panier</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
   
    <!-- Shoping Cart Section Begin -->
<section class="shoping-cart spad" id="bodypanier">
   
</section>  
   
    <!-- Shoping Cart Section End -->
  <!--  grille du panier-->
  <!-- crud 2 pour valide la commande -->
   
    
<?php require "layout/footer.php";?>
 
</body>
