<?php
require "init.php";
$db = new \App\Database\Database;
$panier = new \App\Panier\Panier;
$usercontrol = new \App\Usercontrol\Usercontrol;
?> 

<?php   
if (!empty($_GET["id"])) {
    $id = $usercontrol->checkInput($_GET["id"]);
}

$item = $db->query("SELECT items.id, items.produit, items.username,items.description,items.locality, items.price, categories.category, items.date_debut, items.files 
FROM items  LEFT JOIN categories ON items.categorie_id = categories.id  WHERE items.id= :id", [':id' => $id]);
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
        <hr>
        <nav class="humberger__menu__nav mobile-menu">
            <ul>
                <li class="active" ><a href="./index.php"><i class="ri-home-smile-2-line" style="font-size:20px;opacity:0.5"></i> Accueil</a></li>
                <li><a href="contact"> contact</a></li>
                
                    
                </li>
                <li><a href="./panier.php"><i class="bi bi-cart" style="font-size:20px"></i> Panier</a></li>
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
                <li><a href="contact"> Contact</a></li>
                 
                    
                </li>
                <li><a href="./panier.php"><i class="bi bi-cart" style="font-size:20px"></i> Panier</a></li>            
                        </ul>
                    </nav>
                </div>
                <div class="col-lg-3">
                    <div class="header__cart" id="headpanier">
                        
                    </div>
    </div>  
            </div>
            <div class="humberger__open">
                 <i class="fa fa-bars"></i>
            </div>
        </div>
    </header>
    <!-- Header Section End -->

   

    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-section set-bg" data-setbg="<?= IMG_PATH.'/banner/breadcrumb.jpg' ?>">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>Produit</h2>
                        <div class="breadcrumb__option">
                            <a href="index">Acceuil</a>
                            <span >Voire</span>  
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Product Details Section Begin -->
    <section class="product-details spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <div class="product__details__pic">
                        <div class="product__details__pic__item">
                            <img class="product__details__pic__item--large"
                                src="<?= IMG_PATH.'/'.'produits/'. $item['files'] ?>" alt="img">
                        </div> 
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                       <div class="product__details__text">
                        <h3><?php echo $item['produit'] ?> </h3>
                        <p>Lieu: <?php echo $item['locality']?> </p>
                        <div class="product__details__rating">
                            <i class="fa fa-star-o"></i>
                            <i class="fa fa-star-o"></i>
                            <i class="fa fa-star-o"></i>
                            <i class="fa fa-star-o"></i>
                            <i class="fa fa-star-o"></i>
                            <!--<span>(rien)</span>-->
                        </div>
                        <div class="product__details__price"><?php echo $item['price'] ?>fcfa</div>
                        <p><?php echo $item['description'] ?></p>
                        
                        <br>
                        <br>
                        
                        <a href="#" data-id="<?= $item['id'] ?>" class="primary-btn addpanier" style="border-radius: 15px "><span class="fa fa-plus"></span> Ajouter au panier</a>
                         <!--//si l'utilisateur a déjà aime ce produit-->
                        <?php
                    if(!empty($_SESSION['user_sust'])){
                        $user = $_SESSION['user_sust']['user_id'];
                        $ids = $item['id'];
                
            $verf = $db->query("SELECT user_id, produit_id FROM items_love  WHERE  user_id ='$user' AND produit_id= :ids ", [':ids' => $ids]);
                        if($verf){  
                            echo '<button  rol="presentation" type="button" class="heart-icon heart-button" data-id="'.$item['id'].'" style="border:none"><i class="bi bi-heart-fill on" style="color:"#ea6b14""></i></button>'; 
                        }else{

                        echo '<button  rol="presentation" type="button" class="heart-icon heart-button" data-id="'.$item['id'].'" style="border:none"><i class="bi bi-heart-fill on" style="color:#c2b7b7"></i></button>'; 
                        }
                    }else{
                        echo '<button  rol="presentation" type="button" class="heart-icon heart-button" data-id="'.$item['id'].'" style="border:none"><i class="bi bi-heart-fill on" style="color:#c2b7b7"></i></button>'; 
                    }
                
                        ?>     
                    </div>
                </div>
               
            </div>
        </div>
    </section>
    <!-- Product Details Section End -->

   
   <!--Meme  Categories  -->
   <section class="product spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="product__discount" >
                        <div class="section-title">
                            <h2>Même Categorie</h2>
                        </div>
                        <div class="row">
                            <div class="product__discount__slider owl-carousel" >
                              <?php 
                 $id_ =$item['id']; 
                 $cat = $item['category'];               
                
            $stat = $db->query("SELECT items.id,items.price, items.produit, categories.category, items.files FROM items, categories
WHERE items.categorie_id  = categories.id AND categories.category ='$cat' AND items.id NOT IN('$id_') ORDER BY items.id DESC LIMIT 5 ",[], true);
        foreach ($stat as $new) {
            echo'<div class="col" style="margin-left:10px">
                <div class="product__discount__item"  >
                    <a href="voire.php?id='.$new["id"] .'" ><div class="product__discount__item__pic set-bg"
                        data-setbg="'. IMG_PATH.'/'.'produits/'. $new['files'] .'">
                            </div></a>';
                    echo    '<div class="product__discount__item__text">
                                            <h5 style="color:7fad39">'.$new["produit"] .'</h5>
                                            <div class="product__item__price">'.$new["price"] .' fcfa</div>
                                            
                                </div>
                            </div>
                        </div>';
                    
        }; 

                                ?>
                              
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </section>
    
    
    
    <!-- FIN Meme Categories-->
   

    <!-- Related Product Section Begin -->
    <section class="related-product">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title related__product__title">
                        <h2>AUTRE</h2>
                    </div>
                </div>
            </div>
            <div class="row">
            <?php
                  
                
                $result = $db->query("SELECT items.id, items.produit, categories.category, items.files, items.price, categories.category FROM items, categories 
WHERE items.categorie_id = categories.id AND categories.category NOT IN('$cat')  LIMIT 8 ", [], true);
                
                foreach($result as $items){
                    echo'<div class="product__item col-lg-3 col-md-4 col-sm-6 mix '.$items["category"].'">
                        <div class="featured__item">
                            <div class="featured__item__pic set-bg" data-setbg="'. IMG_PATH.'/'.'produits/'.$items["files"] .'">
                                <ul class="featured__item__pic__hover">
                                    <li><a href="#" class="heart-button" data-id="'.$items["id"] .'"><i class="bi bi-heart-fill"></i></a></li>
                                    <li><a href="voire.php?id='.$items["id"] .'" ><i class="bi bi-eye-fill"></i></a></li>
                                    <li><a class="addpanier" href="#" data-id="'.$items["id"] .'"><i class="bi bi-cart-fill"></i></a></li>
                                </ul>
                            </div>
                            
                                     
                                <div class="featured__item__text">
                                    <h6><a href="voire.php?id='.$items["id"] .'" >'.$items['produit'].'</a></h6>
                                    <h5>'.$items['price'].'fcfa</h5>
                                </div>
                            </div>
                        </div>';
                        } 
            
                    
                ?>  
                
                
                
            </div>
        </div>
    </section>
    <!-- Related Product Section End -->

    <!-- Footer Section Begin -->
    
    <?php require 'layout/footer.php';?> 


</body>
