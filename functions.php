<?php 

    // register custom post type to work with
    function lc_create_post_type() {
        // set up labels
        $labels = array (
        'name' => 'Events',
        'singular_name' => 'Event',
        'add_new' => 'Add New Event',
        'add_new_item' => 'Add New Event',
        'edit_item' => 'Edit Event',
        'new_item' => 'New Event',
        'all_items' => 'All Events',
        'view_item' => 'View Event',
        'search_items' => 'Search Events',
        'not_found' => 'No Events Found',
        'not_found_in_trash' => 'No Events found in Trash',
        'parent_item_colon' => '',
        'menu_name' => 'Events',
        );
        //register post type
        register_post_type ( 'event', array(
        'labels' => $labels,
        'has_archive' => true,
        'public' => true,
        'supports' => array( 'title', 'editor', 'excerpt', 'custom-fields', 'thumbnail','page-attributes' ),
        'taxonomies' => array( 'post_tag', 'category' ),
        'exclude_from_search' => false,
        'capability_type' => 'post',
        'rewrite' => array( 'slug' => 'events' ),
        )
        );
        }
    
    add_action( 'init', 'lc_create_post_type' );
    
    add_theme_support('title-tag');
    add_theme_support('custom-logo');
    add_theme_support('post-thumbnails');

    
    function cw2_custom_nav_class ($classes, $item) {
        if (in_array('current-menu-item', $classes) ){
            $classes[] = 'home-header-nav-menu-active';
        } else{
            $classes[] = 'home-header-nav-menu-inactive';
        }
        return $classes;
    }
    add_filter('nav_menu_css_class' , 'cw2_custom_nav_class' , 10 , 2);


    function cw2_menus () {
        $locations = array(
            'primary' => "Desktop Primary",
            'footer' => "Footer Menus"
        );
        register_nav_menus($locations);
    }
    add_action('init', 'cw2_menus');

   

    function cw2_add_styles(){
        $version = wp_get_theme()->get('Version');
        wp_enqueue_style('cw2-bootstrap-css', 'https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css');
        // wp_enqueue_style('cw2-bootstrap', "https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css", array(), "4.3.1", 'all');
        wp_enqueue_style('cw2-fontawesome', "https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css", array(), '6.1.1', 'all');
        wp_enqueue_style('cw2-css', get_template_directory_uri() . "/style.css", array(), $version, 'all');
    }
    add_action('wp_enqueue_scripts', 'cw2_add_styles');


    function cw2_add_scripts(){
        $version = wp_get_theme()->get('Version');
      wp_enqueue_script("cw2-jquery", "https://code.jquery.com/jquery-3.6.0.min.js", array(), '3.6.0', true);
      wp_enqueue_script("cw2-popper", "https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js", array(), '2.10.2', true);
      wp_enqueue_script("cw2-bootstrap", "https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js", array(), '5.1.3', true);
      
      //   wp_enqueue_script("cw2-bootstrap", "https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js", array(), '4.4.1', true);
      wp_enqueue_script('cw2-js', get_template_directory_uri() . "/assests/js/main.js", array(), $version, true);

      wp_register_script('custom-script', get_template_directory_uri() . "/assests/js/loadmore.js", array('jquery'), false, true);
      $script_data_array = array(
          'ajaxurl' => admin_url('admin-ajax.php'),
          'security' => wp_create_nonce( 'load_more_posts' ),
      );
      wp_localize_script( 'custom-script', 'blog', $script_data_array );
      wp_enqueue_script( 'custom-script' );
    }
    add_action('wp_enqueue_scripts', 'cw2_add_scripts');


    function add_file_types_to_uploads($file_types){
        $new_filetypes = array();
        $new_filetypes['svg'] = 'image/svg+xml';
        $file_types = array_merge($file_types, $new_filetypes );
        return $file_types;
    }
    add_filter('upload_mimes', 'add_file_types_to_uploads');



    function limit_words($string, $limit){
        return $str = mb_strimwidth($string, 0, $limit, "..."); 
    }
    // Common card stlye for posts on homepage.
    function cw2_custom_post($type,$category, $limit) {
         $wp_query = new WP_Query(array('post_type'=>'post','category_name' => $category, 'post_status'=>'publish', 'posts_per_page'=>$limit, 'paged' => 1)); 
         $total = $wp_query->found_posts;
         if ($wp_query->have_posts()) {
             echo "<div class='home-body-all-category'>";
             echo "<h2 class='home-body-all-category-type'>",$type,"</h2>";
             echo "<div class='home-body-all-category-posts ",$category.'-cw2'. "'>";
             while ( $wp_query->have_posts() ) : $wp_query->the_post();
                                    echo "<a href=",the_permalink()," class='home-body-all-category-posts-post'>";;
                                    the_post_thumbnail();
                                    echo "<p>",get_the_date('d-m-y'),"</p>";
                                    echo "<h2>",mb_strimwidth(get_the_title(), 0, 30, "..."),"</h2>";
                                    echo "<p style=",strlen(get_the_excerpt()) > 40? "margin-bottom:0.2rem": "margin-bottom:1.2rem",">",limit_words(get_the_excerpt(),60),"</p>";
                                    echo "</a>";
            endwhile; 
            echo "</div>";
            echo '<button class="home-body-all-category-posts-more ',$category,' ', $total > 4 ? "":"cw2-hide",'">See More of '.$type.'</button>';
            echo "</div>";
         } else {
             echo "No posts";
         }
        wp_reset_postdata();
    }

function cw2_custom_post_load_more() {
    check_ajax_referer('load_more_posts', 'security');
    $paged = $_POST['page'];
    $category = $_POST['category'];
   
        $wp_query = new WP_Query(array(
            'post_type' => 'post',
            'post_status' => 'publish',
            'posts_per_page' => 4,
            'paged' => $paged,
            'category_name' => $category
        )); 
        if($wp_query->have_posts()){
            while ( $wp_query->have_posts() ) : $wp_query->the_post();
                echo "<a href=",the_permalink()," class='home-body-all-category-posts-post'>";;
                the_post_thumbnail();
                echo "<p>",get_the_date('d-m-y'),"</p>";
                echo "<h2>",mb_strimwidth(get_the_title(), 0, 30, "..."),"</h2>";
                echo "<p style=",strlen(get_the_excerpt()) > 40? "margin-bottom:0.2rem": "margin-bottom:1.2rem",">",limit_words(get_the_excerpt(),60),"</p>";
                echo "</a>";
            endwhile; 
        }
        wp_die();
    }

    add_action('wp_ajax_load_posts_by_ajax', 'cw2_custom_post_load_more');
    add_action('wp_ajax_nopriv_load_posts_by_ajax', 'cw2_custom_post_load_more');

    function cw2_custom_carousel() {
        $wp_query = new WP_Query(array('post_type'=>'post','category_name' => 'event', 'post_status'=>'publish', 'posts_per_page'=>-1)); 
        if ($wp_query->have_posts()) {
            $count=0;
            echo "<div id='carouselExampleSlidesOnly' class='carousel slide' data-bs-ride='carousel'>";
            echo "<div class='carousel-inner'>";
           
            while ( $wp_query->have_posts() ) : $wp_query->the_post();
                    echo "<div class='carousel-item",$count === 0 ? " active" : "","'>";
                    the_post_thumbnail();
                    echo "</div>";
                    $count++;               
           endwhile; 
           echo "</div>";
           echo "</div>";
        } else {
            echo "No posts";
        }
       wp_reset_postdata();
   }
