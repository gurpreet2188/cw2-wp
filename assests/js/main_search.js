jQuery( document ).ready( function(){
    var page = 2;
    function load (search, appendTo){
      var data = {
        'action': 'cw2_main_search',
        // 'page': page,
        // 'security': wpAjax.security,
        's': search
      };
          jQuery.post( wpAjax.ajaxurl, data, function( response ) {
            // console.log(response)
            if( $.trim(response) != 0 ) {
              // console.log(window.location.pathname)
              if(window.location.pathname != '/search/'){
                localStorage.setItem('search', response);
                window.location= '/search/'
              } else {
                localStorage.setItem('search', response);
                location.reload()

              }
              // jQuery( appendTo ).html( response );
              page++;
            } else {
            
            }
          });
    }
    jQuery( function($) {
      $('#cw2-main-search').submit(function(e){
          e.preventDefault();
          console.log($('input[name="cw2-main-search-value"]').val());
          load($('input[name="cw2-main-search-value"]').val(), '.search-posts');
        })
    });
      

    });