jQuery( document ).ready( function(){
    var page = 2;
    function load (category, appendTo){
        var data = {
            'action': 'cw2_cw2_filter',
            // 'page': page,
            // 'security': wpAjax.security,
            'category': category
          };
          jQuery.post( wpAjax.ajaxurl, data, function( response ) {
              
            if( $.trim(response) != 0 ) {
              jQuery( appendTo ).append( response );
            //   page++;
            } else {
                
            //   jQuery( btnType ).hide();
            //   jQuery( ".no-more-post" ).html( "No More Post Available" );
            }
          });
    }

    jQuery( function($) {
      jQuery( 'body' ).on( 'click', '.utensils', function() {
          load('food', '.shops-list-container');
      });
    });

  });