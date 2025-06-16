<?php
require "init.php";
?>
<?php
$db = new \App\Database\Database;
$panier = new \App\Panier\Panier;
$usercontrol = new \App\Usercontrol\Usercontrol;

if(isset($_POST['action']) && $_POST['action'] == "add")
{
    
    $id = $usercontrol -> checkInput($_POST["id"]);
    $product = $db->query("SELECT * FROM items  WHERE id= '$id' ", []);
    $quantite = 1;
    if(isset($_SESSION['panier'] [$product['id']])){
        // si le produit est deja dans le panier
        // on met a jour la quantité
        $_SESSION['panier'] [$product['id']]['quantite'] ++;

    }else{
        // si le produit n'est pas encore dans le panier
        //ajout du produit dans le panier
       
        $_SESSION['panier'] [$product['id']]['produit']  = $product['produit'];
        $_SESSION['panier'] [$product['id']]['price']    = $product['price'];
        $_SESSION['panier'] [$product['id']]['files']   = $product['files'];
        $_SESSION['panier'] [$product['id']]['quantite']  = $quantite  ;

            } 
    //var_dump($_SESSION['panier'] [$product['id']]);
            $db->disconnect();
   
    if(empty($product)){
        die ("ce produit n'existe pas");
    }
}
//else{
//    die("vous n'avez pas selectionné de produit");
//}

//--- head session panier
if(isset($_POST['action']) && $_POST['action'] == "head")
{
    echo'<ul>
            <li><a class="btn btn-light" title="recherche" href="#" ><i class="ri-search-line"></i></a></li>
            <li><a href="panier"><i class="bi bi-cart" style="font-size:20px"></i><span>'.$panier ->count().'</span></a></li>
        </ul>
        <div class="header__cart__price">Total: <span>'.$panier ->total() .'fcfa</span></div>';
}
if(isset($_POST['action']) && $_POST['action'] == "sess_head")
{
    if(empty($_SESSION['user_sust'])){
        echo '<a class="btn btn-success" style="color:#fff" href="login"><i class="bi bi-person"></i> Connexion</a>';   
    }else{
        echo ' <a class="btn btn-danger" style="color:#fff" href="logout">Deconnexion <i class="bi bi-box-arrow-right" style="font-size:18px"></i></a>';
    };
}

///--------- body du panier ----------------

if(isset($_POST['action']) && $_POST['action'] == "bodypanier"){
    if(empty($_SESSION['panier'])){
        echo'
        <div class="container" style="background-color: #f7feff"> <br>
        <div class="col-8" style="margin: 0 auto">
        <div>
        <div class="bd-example" >
        
        <figure class="figure" >
        <img src="'.IMG_PATH.'/pub/paniervide.jpeg" alt="panier vide">

          <figcaption class="figure-caption">
            <div class="alert alert-info alert-dismissible fade show" role="alert">
                <i class="bi bi-info-circle me-1"></i>
                Votre panier est vide!
            </div>
          <a href="index.php" class="btn btn-primary"><i class="bi bi-arrow-left-square-fill"></i> FAIRE LE SHOPPING</a></figcaption>
        </figure>
        </div>
      </div>
   </div>
   </div>';
    }else{
        echo'
        
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-8 col-sm-12">
                    <div class="shoping__cart__table">
            
                    <table>
                    <thead>
                    <tr>
                        <th class="shoping__product">Produits</th>
                        <th>Prix</th>
                        <th>Quantité</th>
                        <th>Total</th>
                        <th></th>
                        </tr>
                        </thead>
                            <tbody>';
                        $Total = 0;
                        foreach ($_SESSION['panier'] as $produitId => $item){
                            //$id_stm = $pdo->query('SELECT nom FROM categories WHERE id='. $item['id'].' ');
                            //$produit_cat = $id_stm->fetchAll();
                            //dump($produit_cat);

                            $Total_produit = ($_SESSION['panier'][$produitId]['price'] ) * ($_SESSION['panier'][$produitId]['quantite']);
                            //dump($Total_produit);
                            $Total += $Total_produit ;
                            echo '<tr>
                                <td class="shoping__cart__item">
                                <img src="'.IMG_PATH.'/'.'produits/'.$_SESSION['panier'][$produitId]['files'].'" alt="'.$_SESSION['panier'][$produitId]['produit'].'">
                                    <h5>'.$_SESSION['panier'][$produitId]['produit'].'</h5>
                                </td>
                                <td class="shoping__cart__price">
                                    '.$_SESSION['panier'][$produitId]['price'].'fcfa
                                </td>
                                <td class="shoping__cart__quantity">
                                    <span>'.$_SESSION['panier'][$produitId]['quantite'].'</span> <button type="button" class="btn btn-outline-primary qt"  data-id="'.$produitId .'" style="font-size:13px"><i class="bi bi-chevron-down ms-auto"></i></button> 
                                </td>
                                <td class="shoping__cart__total">
                                    '.$Total_produit.'fcfa
                                </td>
                                <td class="shoping__cart__item__close">

                                <a href="#" data-id="'.$produitId.'" class="del_item"><i class="bi bi-trash" style="color:red"></i></a>     
                                </td>
                                </tr>';
                            }    

                                echo'</tbody>
                            </table>   
                    </div>  
                </div>
                
                
               <div class="col-lg-4 col-md-4 col-sm-12">
                            <div class="checkout__order">
                                <h4>Facture</h4>
                                <div class="checkout__order__products">Produit <span>Total</span></div>
                                <ul>';
                                    
                                    foreach ($_SESSION['panier'] as $produitId => $item){
                            
                                        $Total_produit = ($_SESSION['panier'][$produitId]['price']) * $_SESSION['panier'][$produitId]['quantite'];
                                       
                                            echo'
                                            <li>'.$_SESSION['panier'][$produitId]['produit'].'<span>'.$Total_produit.'fcfa</span></li>
                                            <hr>'; 
                                            }
                                    
                                echo '</ul>
                                
                                <div class="checkout__order__total">Total <span>'.$panier ->total().'fcfa</span></div>           
                                <button type="button" class="site-btn" id="vld_com" style="border-radius:5px">Validé</button>
                            </div>
                        <a href="index.php" class="primary-btn cart-btn mt-3"><i class="bi bi-arrow-left-square-fill"></i>CONTINUE SHOPPING</a>
                    </div> 
                
                
                
            </div>
            
        </div>';
        //<!-- Checkout Section Begin -->
    //<!-- Checkout Section End -->
    } 
}
//--- supprimer un item
if(isset($_POST['action']) && $_POST['action'] == "del_item"){
    $id = $usercontrol -> checkInput($_POST['id']);
    if(!empty($id)){
        $panier-> del($id);
    }
}
//--- Modifier la quantité
if(isset($_POST['action']) && $_POST['action'] == "up_qt"){
    if(!empty($_POST['value']) && !empty($_POST['id'])){
    $qnt = $_POST['value'];
    $id = $_POST['id'];
    
        if(isset($_SESSION['panier'][$id])){
            $_SESSION['panier'][$id]['quantite'] = $qnt; 
        }   
    }
}




?>    