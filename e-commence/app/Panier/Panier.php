<?php
namespace App\Panier;
    class Panier
    {
        public function __construct(){
           if(!isset($_SESSION)){
               session_start();
           }
           if(!isset($_SESSION['panier'])){
               $_SESSION['panier'] = array();
           }
            if(isset($_GET["del"])){
                $this -> del($_GET["del"]);
            }
            
            
       }
       
        
        public function count(){
            $count = 0;
            foreach($_SESSION['panier'] as $produit => $item) {
                    $count += 1;
                }
            return $count;
        }
        
        public function total(){
            $total = 0;
            if(isset($_SESSION['panier'])){
                foreach($_SESSION['panier'] as $produit => $item) {
                    $total += $_SESSION['panier'][$produit]['price']* $_SESSION['panier'][$produit]['quantite'];
                }
            }
           
            return $total;  
        }
        
        
        public function del($product_id)
        {
            unset($_SESSION['panier'] [$product_id]);
        }
        
        
    }
    //-------------------- gestion de notification admin------------
    //-----------------------------------------------------------------

    class notify
    {
       public function __construct(){
            if(!isset($_SESSION)){
                session_start();
            }
            if(!isset($_SESSION['notify'])){
                $_SESSION['notify'] = array();
            }
           
      }
      
      public function add_notify($id,$title, $content, $lien ,	$moment){
        
        
            if(!isset($_SESSION['notify'][$id])){
                
                    $_SESSION['notify'][$id]['title'] = $title;
                    $_SESSION['notify'][$id]['content'] = $content;
                    $_SESSION['notify'][$id]['lien'] = $lien;
                    $_SESSION['notify'][$id]['time'] = $moment ;         
                
            }
            
        }
        
       public function notify_db($id,$title, $content, $lien ,	$moment){
            
       }
    
       
       public function count_notify(){
            $count = 0;
            if(!empty($_SESSION['notify'])){
                $count = count($_SESSION['notify']);
            }
           
           return $count;
       }
      
       
       public function del($notify_id)
       {
           unset($_SESSION['notify'][$notify_id]);
       }
       
       
    }

    


?>