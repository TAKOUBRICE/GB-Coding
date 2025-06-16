jQuery(document).ready(function($){
       
//---------------------------------------------------------
//   
//-------------- gestions des admins   -------
//
//--------------------------------------------  
    //------------- Afficher les administrateurs -----------
    
    function getadmins(){
        $.ajax({
            url:"php/ajax/admin.php",
            type:"post",
            data: {action: "fetch_admins"},
            success:function(response){
                $("#getadmins").html(response);
            }
        });
    }
    getadmins();
    //--------header  admin 
    function fetch_adm(){
        $.ajax({
            url:"php/ajax/admin.php",
            type:"post",
            data: {action: "fetch_adm"},
            success:function(response){
                $("#getadm").html(response);
            }
        });
    }
    fetch_adm();
    //----------- ajouter un administrateur -----------
     $("#add_admin").on("click", function(e){
        let form = $('#form_admin');
        
        if(form[0].checkValidity()){
          e.preventDefault();  
           $.ajax({				
			type : 'POST',
			url  : 'php/ajax/admin.php',
			data : form.serialize() ,
			beforeSend: function(){	
				$("#add_admin").html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span><span class="visually-hidden">...</span>');
			},
               
		    success : function(response){
                if(response== 1){
                    $("#add_admin").html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span><span class="visually-hidden">Loading...</span>');
                    $("#add_admins").modal('hide');
                     Swal.fire({
                        title: "Succès!!",
                        text: "Enregistrement réussi!",
                        icon: "success"
                    });
                    getadmins();
                    form[0].reset();

                }else{
                    Swal.fire({
                    icon: "error",
                    title: "Oops...!!",
                    text: response
                });
                    $("#add_admin").html('Créer le compte');    
                }
                
                   
			},
            Error: function(error){
                Swal.fire({
                    icon: "error",
                    title: "Oops...!!",
                    text: "un probléme s'est présenté, essayer plus tard!"
                });
            }
		}); 
        }
    });
    //------------- Supprimer un administrateur -----------
    $('body').on('click', '.del_admin', function(e){
        let id = this.dataset.id;
        e.preventDefault();
          
        Swal.fire({
          title: "Êtes vous sûre?",
          text: "Cette action affectera le fonctionnement du systeme",
          icon: "question",
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
                    data: {action: "del_admin" ,id : id},
                    success: function(response){
                        if(response == 1){
                            Swal.fire({
                                title: "succès!!!",
                                text: "Admirateur supprimer",
                                icon: "success"
                            });
                            getadmins();
                        }else{
                            Swal.fire({
                                icon: "error",
                                title: "Oops...!!",
                                text: response
                            });
                        }


                    }

                });

            }
        });      
});
    //------------- Modifier les infos admin -----------
    
    //---get admin
    $('body').on('click', '.up_admin', function(e){
        let id = this.dataset.id;
        e.preventDefault();
          
        $.ajax ({
            type : 'post',
            url: "php/ajax/admin.php",
            data: {action:"up_admin", id : id},
            success: function(response){
                let ad_info = JSON.parse(response);
                
                $('#admin_email').val(ad_info.admin_email);
                $('#id_admin').val(ad_info.id);
                $('#admin_name').val(ad_info.admin_name);
                $('#admin_phone').val(ad_info.admin_phone);
            }

        });
    });
    //-------up admin -----------
    $('#upd_admin').on('click',  function(e){
        let form = $('#up_admin');
        
        if(form[0].checkValidity()){
          e.preventDefault();  
           $.ajax({				
			type : 'POST',
			url  : 'php/ajax/admin.php',
			data : form.serialize() + '&action=upd_admin',               
		    success : function(response){
                if(response== 1){
                    getadmins();
                    fetch_adm();
                    $("#update_admin").modal('hide');
                    Swal.fire({
                        title: "Succès!!",
                        text: "Modification réussi!",
                        icon: "success"
                    });
                    
                    form[0].reset();

                }else{
                    Swal.fire({
                        icon: "error",
                        title: "Oops...!!",
                        text: response
                    });
                    
                }
                
                   
			},
            Error: function(error){
                Swal.fire({
                    icon: "error",
                    title: "Oops...!!",
                    text: "un probléme s'est présenté, essayer plus tard!"
                });
            }
		}); 
        }
    });
    
    //----------- acces compte administrateur -----------
    $("#log_admin").on("click", function(e){
        let form = $('#form_admin_lg');
        if(form[0].checkValidity()){
          e.preventDefault();  
           $.ajax({				
			type : 'POST',
			url  : 'php/ajax/admin.php',
			data : form.serialize()  + '&action=login',
			beforeSend: function(){	
				$("#log_admin").html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span><span class="visually-hidden">...</span>');
			},
               
		    success : function(response){
                if(response== 1){
                    $("#log_admin").html('<span class="spinner-border spinner-border-sm" role="status"></span><span class="visually">Loading...</span>');
                    
                     Swal.fire({
                      icon: "success",
                      title: 'succès!!',
                      showConfirmButton: false,
                      timer: 1000
                    });
                   setTimeout(function() {location.href = "index.php";},1100);	
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
                   
                     $("#add_admin").html('Connexion');   
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
        }
    });
    //---- supprimer l'image de profile -----
    $('#del_profile').on("click", function(e){ 
        let id = this.dataset.id;
        e.preventDefault();
          
            Swal.fire({
      title: "Êtes vous sûre?",
      text: "Cette image sera supprimer!",
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
                data: {action: "del_profile" ,id : id},
                success: function(response){
                    if(response == 1){
                        Swal.fire({
                            title: "succès!!!",
                            text: "image supprimer",
                            icon: "success"
                        });
                    }else{
                        Swal.fire({
                            icon: "error",
                            title: "Oops...!!",
                            text: response
                        });
                    }
                }
            });
        }

        });

    });

     

});
