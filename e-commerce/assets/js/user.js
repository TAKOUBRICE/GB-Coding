jQuery(document).ready(function($){
   ///-------------------------------------------
    //---*********** gestion des action utilisateur  ************* 
    //--------------------------------------------------------

    // statut connecter/deconnecter de l'utilisateur
    gb.fetchAjax("addpanier.php","sess_head",".sess_head");
   //---la quantite de produit du panier**--
   gb.fetchAjax("addpanier.php","head","#headpanier");
   //-- affichage du panier
   gb.fetchAjax("addpanier.php","bodypanier","#bodypanier");

   //---- Ajouter un produit au panier----
    $('body').on('click', '.addpanier', function(e){
        let id = this.dataset.id;
        e.preventDefault();
          
        $.ajax ({
            type : 'post',
            url: "addpanier.php",
            data: {action:"add", id : id},
            success: function(response){
                gb.fetchAjax("addpanier.php","head","#headpanier");
                gb.toastify("produit Ajouter au panier.", "top",2000 ,"success");
            }

        });
    });

     //---supprimer un produit du panier
    $('body').on('click', '.del_item', function(e){
        let id = this.dataset.id;
    //console.log("ok");
    //console.log(id);
        e.preventDefault();
          
        $.ajax ({
            type : 'post',
            url: "addpanier.php",
            data: {action:"del_item", id : id},
            success: function(response){
                gb.fetchAjax("addpanier.php","head","#headpanier");
                gb.fetchAjax("addpanier.php","bodypanier","#bodypanier");
                gb.toastify("produit supprimer du panier","top",2000,"success" );
                
            }

        });
    });
    
//------------- Modifier la quantité -----------
    
    $('body').on('click', '.qt', function(e){ 
        let id = this.dataset.id;
        e.preventDefault();
        Swal.fire({
            title: "Modifier la quantité",
            input: "number",
            inputLabel: "Saisir la quantité souhaiter:",
            showCancelButton: true,
            inputValidator: (value) => {
            if (!value ) {
              return "Vous devez saisir une quantité";
                }else{
                    
             $.ajax ({
            type : 'POST',
            url: "addpanier.php",
            data: { action:"up_qt",value : value,
                    id : id},
            success: function(result){
                gb.fetchAjax("addpanier.php","head","#headpanier");
                gb.fetchAjax("addpanier.php","bodypanier","#bodypanier");
                gb.toastify("Quantite modifier","top",2000,"success" );
                
                }
                
            });
            }
            }
        });
    });
     
     //------------- Valider la commande -----------
        
    $('body').on('click', '#vld_com', function(e)
    {
   Swal.fire({
  showCancelButton: true,
  confirmButtonColor: "#29a129",
  confirmButtonText: "Valider",
  cancelButtonText: "Annuler",
  cancelButtonColor: "#c8cbcc",
  html: `
    <form id= "form_commande" method = "post" enctype="multipart/form-data">
        <div class="col-12 d-flex justify-content-center align-items-center mb-3">
            <h3> Passer La Commande</h3> 
        </div> 
   <div class="row">
       <div class="col-lg-6 col-md-6 col-sm-12 mb-2">
            <label for="phone" class="form-label">Téléphone<span style="color:red">*</span></label>
            <input type="text" class="form-control" value="" name="phone" id="phone" placeholder="numéro d\'utilisateur">  
        </div>
        <div class="col-lg-6 col-md-6 col-sm-12 mb-2">
            <label for="password" class="form-label">Votre Mot de passe<span style="color:red">*</span></label>
            <input type="text" class="form-control" name="password" id="password" placeholder="mot de passe d\'utilisateur">  
        </div>
        <div class="col-lg-6 col-md-6 col-sm-12 mb-2">
            <label for="localite" class="form-label">Localité<span style="color:red">*</span></label>
            <input type="text" class="form-control" placeholder="Lieux de livraison" id="localite" name="localite" >  
        </div>
        <div class="col-lg-6 col-md-6 col-sm-12 mb-2">
            <label for="date_end" class="form-label">Date de livraison<span style="color:red">*</span></label>
            <input type="date" id="date_end" name="date_end" class="form-control" >  
        </div>
   </div>
    
</form>  
  `,
  focusConfirm: false
}).then((result) => {

      if (result.isConfirmed) {
        var form = $("#form_commande");  
            if(form[0].checkValidity()){ 
               $.ajax({				
                type : 'POST',
                url:"admin/php/ajax/commande.php",
                data : form.serialize(),
                beforeSend: function(){	
                    $("#vld_com").html('<i class="bx bx-transfer"></i>&nbsp; ...');
                },
                success : function(response){
                    if(response== 1){
                        $("#vld_com").html('<span class="spinner-border text-light"><span class="visually-hidden"></span></span> &nbsp; Envoie ...');
                        headpanier();
                        bodypanier();
                        sweetSuccess();
                        $("#vld_com").html('Validé');
                        form[0].reset();
                    }else{
                        sweetElse(response);
                        
                        $("#vld_com").html('Validé');
                    }


                },
                Error: function(error){
                    sweetError();
                }
            }); 
            }


      }
    });

});
    

    
    //--------------------- */
        //active heart icon
	//--------------------- */
    $(".heart-button").on('click', function (e) {
        e.preventDefault();
        let id = this.dataset.id;
        
            //ajax------
                $.ajax({
            url:"admin/php/ajax/commande.php",
            type:"post",
            data: {action: "fetch-heart", 
                  id: id},
            success:function(response){
                if(response=="ok"){
                    
                    location.href = "voire.php"; 
                }else{
                     Swal.fire({
                        showCancelButton: true,
                        showConfirmButton: false,
                        cancelButtonColor: "#d33",
                        cancelButtonText: "OK",
                        icon: "error",
                        title: "Oops...!!",
                        text: response,
                        showClass: {
                            popup: `
                              animate__animated
                              animate__shakeX
                              animate__faster
                            `
                        }
                      
                    });
                }
                
            },
            Error: function(error){
                Swal.fire({
                    showCancelButton: true,
                    showConfirmButton: false,
                    cancelButtonColor: "#d33",
                    cancelButtonText: "OK",
                    icon: "error",
                    title: "Oops...!!",
                    text: "problème détecter, essayer plus tard.",
                    showClass: {
                        popup: `
                          animate__animated
                          animate__shakeX
                          animate__faster
                        `
                    }
                });
            }
        });
        
    });
   

    
});
