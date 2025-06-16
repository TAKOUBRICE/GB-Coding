(function (root, factory) {
    if (typeof define === 'function' && define.amd) {
      // AMD (RequireJS)
      define(['jquery'], factory);
    } else if (typeof module === 'object' && module.exports) {
      // CommonJS (Node.js)
      module.exports = factory(require('jquery'));
    } else {
      // Environnement global (navigateur sans AMD/CommonJS)
      root.gb = factory(root.jQuery);
    }
  }(typeof self !== 'undefined' ? self : this, function ($) {
    // Ici, $ est jQuery
    var gb = {
      success: function (msg, timer, bool ){
        Swal.fire({
          icon: "success",
          title: msg || null,
          showConfirmButton: bool || false,
          timer:timer|| 1000
        });
      },

      error: function (title , msg){
        Swal.fire({
            showCancelButton: true,
            showConfirmButton: false,
            cancelButtonColor: "#d33",
            cancelButtonText: "OK",
            icon: "error",
            title: title || "Oops...!!",
            text: msg || "problème détecter, essayer plus tard.",
            showClass: {
                popup: `
                  animate__animated
                  animate__shakeX
                  animate__faster
                `
            }
        }) 
      },
      toastify : function(msg, position, timer, icon){
        Swal.mixin({
          toast: true,
          position: position || "top-end",
          showConfirmButton: false,
          timer: timer || 5000,
          timerProgressBar: false,
          
        }).fire({
          icon: icon || 'info',
          title: msg || null
        })
      },
      hideModal : function(ID){
        $(ID).modal('hide');
      },

      fetchAjax :function(url,action, ID ,idAction){
          $.ajax({
              url: url,
              type:"post",
              data: {action: action, id: idAction || null},
              success:function(response){
                  $(ID).html(response);
              }
          });
      },
  
  
    }
  
    return gb;
  }));
  