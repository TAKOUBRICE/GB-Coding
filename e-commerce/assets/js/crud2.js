jQuery(document).ready(function($){

///-------------------------------------------
    //---*********** contruction de fonction ************* 
    //--------------------------------------------------------
    function sweetSuccess(){
         Swal.fire({
          icon: "success",
          title: 'succès!!',
          showConfirmButton: false,
          timer: 1000
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
     
    const Toast = Swal.mixin({
      toast: true,
      position: "top-end",
      showConfirmButton: false,
      timer: 3000,
      timerProgressBar: false,
      
    });
    function sweetToast(icon, message){   
     Toast.fire({
      icon: icon,
      title: message
    });   
    }
    
    function hideModal(ID){
        $(ID).modal('hide');
    }        
    //----- I**--- function d'affichage ****----
    
     function fetch_id(action,ID){
        $.ajax({
            url:"php/ajax/crud_admin.php",
            type:"post",
            data: {action: action},
            success:function(response){
              //console.log(response);
                $(ID).html(response);
            }
        });
    }
     //---pour multiple class:
    //** classe: classe sur laquelle s'applique  la fonction
   
    function fetch_class(classe, action, ID){
             $('body').on('click',classe, function(e){
            let id = this.dataset.id;
            e.preventDefault();

            $.ajax ({
                type : 'post',
                url: "php/ajax/crud_admin.php",
                data: {action: action, id : id},
                success: function(response){
                    $(ID).html(response);
                }

            });
        });
    }

    //------------- Afficher les clients -----------
    fetch_id("fetch_user","#getclients");
     //------------- Afficher les commandes **-----------
    
    fetch_id("fetch_com","#getcom");
     //------------- gestion de commande ******-----------
    //---get commande
    fetch_class(".eye_com","eye_com" ,"#see_com");
    //---valide la commande
    $('body').on('click', '.check_com', function(e){
        let id = this.dataset.id;
        e.preventDefault();
          
        Swal.fire({
          title: "Êtes vous sûre?",
          text: "Cette commande sera considerer comme livré!",
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
                    url: "php/ajax/admin.php",
                    data: {action: "check_com" ,id : id},
                    success: function(response){
                      if(response== 1){
                        sweetSuccess();
                        fetch_id("fetch_com","#getcom");
                      }else{
                        sweetElse(response);
                      }
                        
                    },
                    error:function(error){
                      sweetError();
                    }
                    
                });
            }
        });
        
    });
     //---annulé  la commande
    $('body').on('click', '.over_com', function(e){
        let id = this.dataset.id;
        e.preventDefault();
          
        Swal.fire({
          title: "Êtes vous sûre?",
          text: "Cette commande sera considerer comme annulé!",
          icon: "warning",
          showCancelButton: true,
          confirmButtonColor: "#3085d6",
          cancelButtonColor: "#d33",
          cancelButtonText: "Annulé" ,
          confirmButtonText: "Valider"
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax ({
                    type : 'POST',
                    url: "php/ajax/admin.php",
                    data: {action: "over_com" ,id : id},
                    success: function(response){
                      if(response== 1){
                        sweetSuccess();
                         fetch_id("fetch_com","#getcom");
                      }else{sweetElse(response);}
                            
                    },
                    error: function(error){
                      sweetError();
                    }

                });

            }
        });
        
    });

     //-------------chartjs ----------
     //------ n :titre ,valeur possible{"ventes", "revenue", "clients", "top_selling", "best_user"} et l'id qui recuper la response ----
     //- d: temps du graphe, valeur possible{"d", "m", "y"} ----------------------------
     //- -----------------------------------------------------------------  --------------------------------
    
    function chart(n,d, rec){
        var title = n;
        var dat = d;
        var id = rec;
        $.ajax({
            url:"php/ajax/chart.php",
            type:"post",
            data: {title:title , dat: dat},
            success:function(response){
                $(id).html(response);
            }
        });
    }
    //default chart
    chart("ventes", "y", "#ventes");
    chart( "revenue", "y",  "#revenue");
    chart( "clients", "y",  "#clients");
    chart( "top_selling", "y",  "#top_selling");
    chart( "best_user", "y",  "#best_user");
    
    $("#day").on('click', function(e){
       e.preventDefault();
        chart("ventes", "d", "#ventes");
        chart( "revenue", "d",  "#revenue");
        chart( "clients", "d",  "#clients");
        chart( "top_selling", "d",  "#top_selling");
        chart( "best_user", "d",  "#best_user");
        
       //console.log(v);
          
   });
    $("#month").on('click', function(e){
       e.preventDefault();
        chart("ventes", "m", "#ventes");
        chart( "revenue", "m",  "#revenue");
        chart( "clients", "m",  "#clients");
        chart( "top_selling", "m",  "#top_selling");
        chart( "best_user", "m",  "#best_user");
          
   });
    $("#year").on('click', function(e){
       e.preventDefault();
        chart("ventes", "y", "#ventes");
        chart( "revenue", "y",  "#revenue");
        chart( "clients", "y",  "#clients");
        chart( "top_selling", "y",  "#top_selling");
        chart( "best_user", "y",  "#best_user");
          
   });  
    
    function barchart(){
        $.ajax({
            url:"php/ajax/chart.php",
            type:"post",
            data: {action:"barchart"},
            success:function(response){
                var cat = JSON.parse(response);
                var  categorie = cat.categorie;
                var total = cat.total ;
                
        new ApexCharts(document.querySelector('#barChart'), {
            series: [{
              data: total
            }],
            chart: {
              type: 'bar',
              height: 350
            },
            plotOptions: {
              bar: {
                borderRadius: 4,
                horizontal: true,
              }
            },
            dataLabels: {
              enabled: false
            },
            xaxis: {
              categories:categorie ,
            }
      }).render();
                
            }
        });
    }
    barchart();
    function time_money(){    
        $.ajax({
            url:"php/ajax/chart.php",
            type:"post",
            data: {action:"time_money"},
            success:function(response){
                var value = JSON.parse(response);
                var  revenu = value.revenu;
                var quantite = value.quantite;
                var date_action = value.date;
                
        new ApexCharts(document.querySelector("#reportsChart"), {
                        series: [{
                          name: 'Revenues',
                          data: revenu,
                        }, {
                          name: 'Quantités',
                          data: quantite
                        }],
                        chart: {
                          height: 350,
                          type: 'area',
                          toolbar: {
                            show: false
                          },
                        },
                        markers: {
                          size: 4
                        },
                        colors: ['#4154f1', '#2eca6a', '#ff771d'],
                        fill: {
                          type: "gradient",
                          gradient: {
                            shadeIntensity: 1,
                            opacityFrom: 0.3,
                            opacityTo: 0.4,
                            stops: [0, 90, 100]
                          }
                        },
                        dataLabels: {
                          enabled: false
                        },
                        stroke: {
                          curve: 'smooth',
                          width: 2
                        },
                        xaxis: {
                          type: 'datetime',
                          categories: date_action
                        },
                        tooltip: {
                          x: {
                            format: 'yy/MM/dd HH:mm:ss'
                          },
                        }
                      }).render();
                
            }
        });
    }
    time_money();
     //-------------gestion les notification ----------
        function fetch_notify(){
          $.ajax({
            url:"php/ajax/admin.php",
            type:"post",
            data: {action: "fetch_notify"},
            success:function(response){
              //console.log(response);
                $("#fetch_notify").html(response);
            }
          });
        }
        fetch_notify();

      function create_notify(){
        $.ajax({
          url:"php/ajax/admin.php",
          type:"post",
          data: {action: "new_notify"},
          success:function(data){
            let info  = JSON.parse(data);
            //console.log(info.action);
              if(info.action == 'yes'){
                  sweetToast("success", info.title);
                  fetch_notify();
              }
                
          }
        });
      }
      //create_notify();
     setInterval(() => {
      create_notify();   
     }, 3000);
    
     $("#noty_clear").on("click", function(){
         var resol = $.parseJSON($.cookie("notify"));
         resol.forEach(function(item){
             notification.update(item.id);
         });    
         newcom();
     });
     $('body').on('click', '.noty_id', function(){
         let id = this.dataset.id;
         notification.update(id);
         newcom();
     });

    
    
    
   
    
    
    //fin documentjquery
});    







