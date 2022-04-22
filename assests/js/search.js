jQuery( document ).ready( function(){
    var page = 2;
    function load (search, appendTo){
      var data = {
        'action': 'cw2_shop_search',
        // 'page': page,
        // 'security': wpAjax.security,
        's': search
      };
          jQuery.post( wpAjax.ajaxurl, data, function( response ) {
              // console.log(response)
            if( $.trim(response) != 0 ) {
              jQuery( appendTo ).html( response );
              page++;
            } else {
            
            }
          });
    }
    jQuery( function($) {
      $('#cw2-search-shop').submit(function(e){
          e.preventDefault();
          console.log($('input[name="cw2-search-shop-value"]').val());
          load($('input[name="cw2-search-shop-value"]').val(), '.shops-list-container');
        })
    });
      

    });