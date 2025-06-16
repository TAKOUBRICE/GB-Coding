jQuery(document).ready(function($){
    ///-------------------------------------------
    //---*********** contruction de fonction ************* 
    //--------------------------------------------------------
    // ---fonction sweetalert {success, warning,error, toast}
    //--- icon : {"error","success","warning"}
    function sweetSuccess(){
         Swal.fire({
          icon: "success",
          title: 'succès!!',
          showConfirmButton: false,
          timer: 1500
        });
    }
    function sweetError(){
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
    function sweetElse(response){
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
     
    
    function hideModal(ID){
        $(ID).modal('hide');
    }
    
    
    //----- I**--- function d'affichage ****----
    //--pour unique id
    // **ID: id qui resoit le resultat de la requette
    // ** action : la qui sera envoyer 
     function fetch_id(action,ID){
        $.ajax({
            url:"php/ajax/crud_admin.php",
            type:"post",
            data: {action: action},
            success:function(response){
                $(ID).html(response);
            }
        });
    }
    
   
    //---def la fonction sans '()'
    
    function delet_classe(classe ,text, action, act,ID){
         $('body').on('click', classe, function(e){
        let id = this.dataset.id;
        e.preventDefault();
          
        Swal.fire({
              title: "Êtes vous sûre?",
              text: text,
              icon: "warning",
              showCancelButton: true,
              confirmButtonColor: "#3085d6",
              cancelButtonColor: "#d33",
              cancelButtonText: "Annulé" ,
              confirmButtonText: "Supprimer!"
        }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax ({
                        type : 'POST',
                        url: "php/ajax/delete.php",
                        data: {action: action ,id : id},
                        success: function(response){
                            if(response == 1){
                                sweetSuccess();
                                fetch_id(act,ID);
                            }else{
                                sweetElse(response);
                            }
                        }
                    });
                }
        });

        });
    }
   
    //------------- Afficher les categories -----------
    fetch_id("fetch","#getcat");
    
   //------------- Afficher les produits -----------
    fetch_id("fetch_prod","#getprod");
   
       
    //------------- Ajouter une categorie -----------
    $('#btn').on("click", function(e){
        e.preventDefault();
        Swal.fire({
            title: "Ajouter une catégorie",
            input: "text",
            inputLabel: "Nom de la catégorie",
            //inputValue,
            showCancelButton: true,
            cancelButtonText: "Annulé" ,
            inputValidator: (value) => {
            if (!value) {
              return "Vous devez saisir une categorie!";
                }else{
                    
             $.ajax ({
            type : 'POST',
            url: "php/ajax/crud_admin.php",
            data: { value : value},
            success: function(response){
                sweetSuccess();
                fetch_id("fetch","#getcat");
                }
                
            });
            }
            }
        });
    });
    //------------- Ajouter un produit -----------
     $('#produit').on('submit', function(e){
        e.preventDefault();
        let form = $('#produit');
        var formData= new FormData(this);
        $.ajax({
            url: "php/ajax/produit.php",
            type : 'post',
            data: formData,
            contentType: false,
            processData: false,
            success: function(data) {
                
                //$('#create_item').html('Ajouter');
              if(data == 1){
                  hideModal('#new_item');
                 sweetSuccess();  
                 form[0].reset();
                fetch_id("fetch_prod","#getprod");
                    }else{
                        hideModal('#new_item');
                        sweetElse(data);    
                    }
            },
            Error: function(error){
                //$('#create_item').html('Ajouter');
                sweetError();
                
            }  
        });
    });
    
    
    //------------- Modifier une categorie -----------
    //---get categorie
    $('body').on('click', '.up_cat', function(e){
        let id = this.dataset.id;
        e.preventDefault();
          
        $.ajax ({
            type : 'post',
            url: "php/ajax/crud_admin.php",
            data: {action:"up_cat", id : id},
            success: function(response){
                let cat_info = JSON.parse(response); 
                $('#update_cat').val(cat_info.category);
                $('#id_cat').val(cat_info.id);
                

            }

        });
    });
    //-----update 
    $('#up_categorie').on("click", function(e){
        
        let form = $('#form_upcat');
        if(form[0].checkValidity()){
            e.preventDefault();
            $.ajax ({
            url: "php/ajax/crud_admin.php",
            type : 'post',
            data: form.serialize() + '&action=up_categorie',
            success: function(response){
                if(response == 1){
                    hideModal('#update_category');
                    sweetSuccess();
                    fetch_id("fetch","#getcat"); 
                }else{
                    sweetElse(response);    
                }
                   
            }
                
            });
        }
            
    });
    //------------- Modifier un produit -----------
    //---get produit
    $('body').on('click', '.up_item', function(e){
        let id = this.dataset.id;
        e.preventDefault();
          
        $.ajax ({
            type : 'post',
            url: "php/ajax/crud_admin.php",
            data: {action:"up_item", id : id},
            success: function(response){
                let item_info = JSON.parse(response);
                
                
                $('#id_item').val(item_info.id);
                $('#item').val(item_info.produit);
                $('#username').val(item_info.username);
                $('#localite').val(item_info.locality);
                $('#price').val(item_info.price);
                $('#description').val(item_info.description);
                $('#date').val(item_info.date_f);
                
                
                
                //let stat_options = Array(select.option);
                //console.log(stat_options);
                //stat_options.forEach((o, i) => {
                //    if(o.valueOf == item_info.categorie_id){console.log(select.selected.Index) ; }
                //});
                //$('#update_item').Modal('hide');
            }

        });
    });
    //-------up produit -----------
    $('#up_produit').on('submit', function(e){
        e.preventDefault();
        var formData= new FormData(this);
        $.ajax({
            url: "php/ajax/up_produit.php",
            type : 'post',
            data: formData,
            contentType: false,
            processData: false,
            success: function(data) {
                
              if(data == 1){
                  hideModal('#update_item');
                  sweetSuccess();
                fetch_id("fetch_prod","#getprod");
              }else{
                sweetElse(data);
              }
            },
            Error: function(error){
                sweetError();
            }  
        });
    });
    

    //------------- Supprimer une categorie -----------
    delet_classe(".del_cat","Cette categorie sera supprimer!","del_cat","fetch","#getcat");
    //------------- Supprimer un produit -----------
    delet_classe(".del_item","Ce produit sera supprimer!","del_item","fetch_prod","#getprod");
    
   
    
    
    
     //setInterval(() => {
     //       let day = new Date();
     //       let hour = day.getHours();
     //       let min = day.getMinutes();
     //       let sec = day.getSeconds();
     //       
     //       if (sec < 10) {
     //           sec = '0' + sec;
     //       }
     //       if (min < 10) {
     //           min = '0' + min;
     //       }
     //       if (hour < 10) {
     //           hour = '0' + hour;
     //       }
     //       //console.log(hour + ' : ' + min + ' : ' + sec);
     //       //time.textContent = 
//
     //   }, 1000);

    
    //$('body').on('click', '.del_cat', function(e){
    //    let id = this.dataset.id;
    //    e.preventDefault();
    //      
    //    Swal.fire({
  //title: "Êtes vous sûre?",
  //text: "Cette categorie sera supprimer!",
  //icon: "warning",
  //showCancelButton: true,
  //confirmButtonColor: "#3085d6",
  //cancelButtonColor: "#d33",
  //cancelButtonText: "Annulé" ,
  //confirmButtonText: "Supprimer!"
//}).then((result) => {
    //if (result.isConfirmed) {
    //    $.ajax ({
    //        type : 'POST',
    //        url: "php/ajax/delete.php",
    //        data: {action: "del_cat" ,id : id},
    //        success: function(response){
    //            if(response == 1){
    //                Swal.fire({
    //                    title: "succès!!!",
    //                    text: "Categorie supprimer",
    //                    icon: "success"
    //                });
    //                getcategories();
    //            }else{
    //                 Swal.fire({
    //                    showCancelButton: true,
    //                    showConfirmButton: false,
    //                    cancelButtonColor: "#d33",
    //                    cancelButtonText: "OK",
    //                    icon: "error",
    //                    title: "Oops...!!",
    //                    text: response,
    //                    showClass: {
    //                        popup: `
    //                          animate__animated
    //                          animate__shakeX
    //                          animate__faster
    //                        `
    //                    }
    //                  
    //                });
    //               
    //            }
    //                
//
    //        }
//
    //    });

   
   
    

                 
});