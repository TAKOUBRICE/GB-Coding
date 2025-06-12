<?php
require "init.php";
$db = new \App\Database\Database;
$panier = new \App\Panier\Panier;
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
            <a href="index " > GB-Commerce</a>
        </div>
        <hr>
        <div class="humberger__menu__widget ">               
                <div class="header__top__right__auth sess_head" style="padding: 2px 0 0">
               
                </div>
                
        </div>
        <hr>
        <nav class="humberger__menu__nav mobile-menu">
            <ul>
                <li class="active" ><a href="./index"><i class="ri-home-smile-2-line" style="font-size:20px;color:#7fad39"></i> <span style="color:#7fad39"> Accueil</span></a></li>
                <li><a href="contact"> contact</a></li>
                
                <li><a href="panier"><i class="bi bi-cart" style="font-size:20px"></i> Panier</a></li>
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
                                <li><i class="bi bi-envelope"></i> takoubrice0@gmail.com</li>
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
                <li class="active"><a href="index"><i class="ri-home-smile-2-line" style="font-size:20px"></i> Accueil</a></li>
                <li><a href="contact"> contact</a></li>
            
                <li><a href="panier" ><i class="bi bi-cart" style="font-size:20px"></i>  Panier</a></li>            
                        </ul>
                    </nav>
                </div>
                <div class="col-lg-3">
                   
                    <div class="header__cart" id="headpanier">
                        
                    </div>
                </div>  
            </div>
            <div class="humberger__open" >
                <i class="fa fa-bars"></i>
            </div>
        </div>
    </header>
    <!-- Header Section End -->
    
    

    <!-- Hero Section Begin *-->
    <section class="hero">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 d-none d-lg-block">
                    <div class="hero__categories" >
                        <div class="hero__categories__all">
                            <i class="bi bi-list toggle-sidebar-btn"></i>
                            <span>Categories</span>
                        </div>
                        <ul>
                            <?php 
                            $cat = $db->query("SELECT * FROM categories",[],true); 
                            foreach ($cat as $row ) 
                            {   
                                echo '<li><a href="cat.php?id='.$row['id'] .'">'.$row['category'] .'</a></li>';    
                            }
                            
                            ?>  
                        </ul>
      
                        
                    </div>
                </div>
                
                <div class="col-lg-9">
                    
                    <div class="hero__item set-bg" data-setbg="<?= IMG_PATH."/hero/banner.jpg" ?>">
                        <div class="hero__text">
                            <span>ALIMENTS FRAIS</span>
                            <h2>Aliments <br />100% Saint</h2>
                            
                            <a href="" class="primary-btn">Commander</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Hero Section End -->

    <!-- Categories Section Begin *-->
    <section class="categories">
        <div class="container">
           <div class="section-title">
                    <h2>Catalogue</h2>
            </div>
            <div class="row">
                <div class="categories__slider owl-carousel">
        <?php 
                
            $items = $db->query('SELECT * FROM categories ORDER BY id DESC',[],true);
        
                foreach($items as $item){
                echo '<div class="col" style="margin-left:10px">
                    <div class="categories__item set-bg" data-setbg="'.IMG_PATH.'/hero/catalogue.jpg">';
                echo      '<h5><a style="color:7fad39" href="cat.php?id='.$item["id"].'">'.$item["category"] .'</a></h5>' ;  
                echo   '</div>
                </div>';
                
                };
    
        ?>
                
    
                </div>
            </div>
        </div>
    </section>
    <!-- Categories Section End -->
   
   
    <!--new products ***-->
   <section class="product spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="product__discount" >
                        <div class="section-title">
                            <h2>Nouveau Produits</h2>
                        </div>
                        <div class="row">
                            <div class="product__discount__slider owl-carousel" >
                              <?php 
                                
                
            $news = $db->query('SELECT items.id, items.produit, categories.category, items.price, items.files 
            FROM items LEFT JOIN categories ON items.categorie_id = categories.id  
            ORDER BY  items.id DESC LIMIT 5', [], true);
        foreach($news as $new) {
           
            echo'<div class="col">
                <div class="product__discount__item"  style="margin-left:10px">
                    <a href="voire.php?id='.$new["id"] .'" ><div class="product__discount__item__pic set-bg"
                        data-setbg="'.IMG_PATH.'/'.'produits/'. $new["files"].'">
                        <div class="product__discount__percent">New</div>
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
     
    <!--end new products-->
   

    <!-- Tableau de produit  ***-->
    <section class="featured spad" class="">
        <div class="container">
           <div class="row">
                <div class="col-lg-12 d-none d-lg-block d-md-block">
                    <div class="section-title">
                        <h2>Liste des Produits</h2>
                    </div>
                    <div class="featured__controls">
                        <ul>
                           <?php
                    echo '<li class="active" data-filter="*">Tous</li>';    
                        
                
                $menu = $db->query('SELECT * FROM categories ORDER BY id DESC LIMIT 4', [], true);
                foreach($menu as $menus){
                    echo'<li data-filter=".'.$menus["category"].'">'.$menus["category"] .'</li>';
                }
                 
                ?>     
                        </ul> 
                    </div>
                </div>
            </div>
            <div class="row featured__filter">
               <?php
                
                $item = $db->query('SELECT items.id, items.produit, items.price, items.files, categories.category 
                FROM items LEFT JOIN categories ON items.categorie_id = categories.id 
                LIMIT 10',[], true);
                foreach($item as $items){
            echo'<div class="product__item col-lg-3 col-md-4 col-sm-6 mix '.$items["category"].'">
                <div class="featured__item">
                    <div class="featured__item__pic set-bg" data-setbg="'.IMG_PATH.'/'.'produits/'.$items["files"] .'">
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
    <!--  End de produit -->

    <!-- Banner Begin -->
    <div class="banner">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="banner__pic">
                        <img src="<?= IMG_PATH."/banner/banner-1.jpg" ?>" alt="banner">
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="banner__pic">
                        <img src="<?= IMG_PATH."/banner/banner-2.jpg" ?>" alt="banner">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Banner End -->

    <!-- Latest Product Section Begin -->
    <section class="latest-product spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <div class="latest-product__text">
                        <h4> Ancients Produits</h4>
                        <div class="latest-product__slider owl-carousel" id="last_items">
                           <!--ancient 1-->
                            <div class="latest-prdouct__slider__item">
                <?php
                
            $stats = $db->query('SELECT id, produit, price, files FROM items WHERE id < (SELECT COUNT(*)/2 FROM items ) ORDER BY  id ASC LIMIT 3',[],true);
        foreach($stats as $last){
            echo' <a href="voire.php?id='.$last['id'].'" class="latest-product__item">
                    <div class="latest-product__item__pic">
                            <img src="'.IMG_PATH.'/'.'produits/'.$last['files'].'" alt="'.$last['produit'].'">
                    </div>
                    <div class="latest-product__item__text">
                            <h6>'.$last['produit'].'</h6>
                            <span>'.$last['price'].'fcfa</span>
                    </div>
                </a>';
        }
            
                ?>
                             
                               
                               
                               
                            </div>
                            
                           <!--ancient 2--> 
                           <div class="latest-prdouct__slider__item">
                            <?php
                
            $stats = $db->query('SELECT id, produit, price, files FROM items WHERE id < (SELECT COUNT(*)/2 FROM items ) ORDER BY  id DESC LIMIT 3', [], true);
        foreach ($stats as $last){
            echo' <a href="voire.php?id='.$last['id'].'" class="latest-product__item">
                    <div class="latest-product__item__pic">
                            <img src="'.IMG_PATH.'/'.'produits/'.$last['files'].'" alt="'.$last['produit'].'">
                    </div>
                    <div class="latest-product__item__text">
                            <h6>'.$last['produit'].'</h6>
                            <span>'.$last['price'].'fcfa</span>
                    </div>
                </a>';
        }
            
                ?>
                                
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="latest-product__text">
                        <h4>Top des Produits</h4>
                        <div class="latest-product__slider owl-carousel" id='top_items'>
                            <!--TOP 1-->
                            <div class="latest-prdouct__slider__item">
                <?php
                
            $stats = $db->query('SELECT id, produit, price, files FROM items WHERE id > (SELECT COUNT(*)/2 FROM items ) ORDER BY  id ASC LIMIT 3',[], true);
        foreach($stats as $last){
            echo' <a href="voire.php?id='.$last['id'].'" class="latest-product__item">
                    <div class="latest-product__item__pic">
                            <img src="'.IMG_PATH.'/'.'produits/'.$last['files'].'" alt="'.$last['produit'].'" style="background-color:#e9f5f3">
                    </div>
                    <div class="latest-product__item__text">
                            <h6>'.$last['produit'].'</h6>
                            <span>'.$last['price'].'fcfa</span>
                    </div>
                </a>';
        }
            
                ?>
                             
                               
                               
                               
                            </div>
                            
                           <!--TOP 2--> 
                           <div class="latest-prdouct__slider__item">
                            <?php
                
            $stats = $db->query('SELECT id, produit, price, files FROM items WHERE id > (SELECT COUNT(*)/2 FROM items ) ORDER BY  id DESC LIMIT 3', [],true);
        foreach ($stats as $last){
            echo' <a href="voire.php?id='.$last['id'].'" class="latest-product__item">
                    <div class="latest-product__item__pic">
                            <img src="'.IMG_PATH.'/'.'produits/'.$last['files'].'" alt="'.$last['produit'].'">
                    </div>
                    <div class="latest-product__item__text">
                            <h6>'.$last['produit'].'</h6>
                            <span>'.$last['price'].'fcfa</span>
                    </div>
                </a>';
        }
            
                ?>
                                
                            </div>
                        </div>
                    </div>
                </div>
                

                
                <?php
                
        $count = $db->queryCount('SELECT id, produit_id, statut FROM items_love', []);
        if($count > 3){
            echo '<div class="col-lg-4 col-md-6">
                    <div class="latest-product__text">
                        <h4>Top des Produits</h4>
                        <div class="latest-product__slider owl-carousel">';
            //<!-- best 1-->;    
                    echo'<div class="latest-prdouct__slider__item">';
               
                
            $aimes = $db->query("SELECT items.id, items.produit, items.price, items.files FROM items RIGHT JOIN items_love ON items.id = items_love.produit_id AND (SELECT SUM(statut) FROM items_love GROUP BY produit_id) > (SELECT AVG(statut) FROM items_love ) LIMIT 3 ");
        foreach ($aimes as $aime){
            echo' <a href="voire.php?id='.$aime['id'].'" class="latest-product__item">
                    <div class="latest-product__item__pic">
                            <img src="'.IMG_PATH.'/'.'produits/'.$aime['files'].'" alt="'.$aimer['produit'].'">
                    </div>
                    <div class="latest-product__item__text">
                            <h6>'.$aime['produit'].'</h6>
                            <span>'.$aime['price'].'fcfa</span>
                    </div>
                </a>';
        }
            
                  
                        echo '</div>';
                            //<!--best 2--> 
                            echo'<div class="latest-prdouct__slider__item">';
                
            $loves = $db->query('SELECT items.id, items.produit, items.price, items.files FROM items RIGHT JOIN items_love ON items.id = items_love.produit_id AND (SELECT SUM(statut) FROM items_love GROUP BY produit_id) > (SELECT AVG(statut) FROM items_love ) LIMIT 3',[], true);
        foreach ($loves as $love){
            echo' <a href="voire.php?id='.$love['id'].'" class="latest-product__item">
                    <div class="latest-product__item__pic">
                            <img src="'.IMG_PATH.'/'.'produits/'.$love['files'].'" alt="'.$love['produit'].'">
                    </div>
                    <div class="latest-product__item__text">
                            <h6>'.$love['produit'].'</h6>
                            <span>'.$love['price'].'fcfa</span>
                    </div>
                </a>';
        }
            
                
                                
                            echo '</div>
                        </div>
                    </div>
                </div>';
            
           
        }
                
        ?>                       
                
                                
                            
                       
            </div>   
        </div>
    </section>
    <!-- Latest Product Section End -->
    
    <!-- Blog Section Begin -->
    <section class="from-blog spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title from-blog__title">
                        <h2>PLUS <i class="bi bi-bag-plus" style="color:#7fad39"></i></h2>
                    </div>
                </div>
            </div>
            <div class="row" >
            <?php
                
    $prs = $db->query('SELECT id, produit, locality,price,files, date(date_debut) FROM items ORDER BY id DESC LIMIT 15', [],true);
  
    foreach ($prs as $pr) {
        echo'<div class="col-lg-4 col-md-4 col-sm-6 mb-4">
        
            <div class="card">
            <img src="'.IMG_PATH.'/'.'produits/'.$pr["files"] .'"  alt="" style="background-color:#ebfffb">

                    <div class="card-body">
                    <h5 class="card-title"><i class="fa fa-calendar-o"></i> '.$pr["date(date_debut)"] .'</h5>
                    <p class="card-text"> '.$pr["produit"] .': <span style="color:#25e418">'.$pr["price"] .'fcfa</span></p>
                    <p class="card-text">Lieu : '.$pr["locality"] .'</p>
                    
                    <a class="btn btn-outline-success addpanier" href="#" data-id="'.$pr["id"].'"><i class="bi bi-cart-plus" style="font-size:20px"></i> Ajouter au panier</a>
                    </div>
                </div>    
            </div>';
                        
        }; 
    ?>
        </div>
    </div>
    </section> 
    
    <?php
    $db -> disconnect();
    ?> 
  <?php require 'layout/footer.php';?>  
</body>

