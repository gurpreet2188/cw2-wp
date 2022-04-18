jQuery( document ).ready( function(){
    var page = 2;
    function load (category, btnType, appendTo){
        var data = {
            'action': 'load_posts_by_ajax',
            'page': page,
            'security': blog.security,
            'category': category
          };
          jQuery.post( blog.ajaxurl, data, function( response ) {
            if( $.trim(response) != 0 ) {
              jQuery( appendTo ).append( response );
              page++;
            } else {
              jQuery( btnType ).hide();
              jQuery( ".no-more-post" ).html( "No More Post Available" );
            }
          });
    }

    jQuery( function($) {
      jQuery( 'body' ).on( 'click', '.articles', function() {
          load('articles', '.articles', '.articles-cw2');
      });
    });

    jQuery( function($) {
        jQuery( 'body' ).on( 'click', '.deals', function() {
            load('deals', '.deals', '.deals-cw2')
        });
      });
  });