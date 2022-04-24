<?php 
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
//   wp_enqueue_script("cw2-maps", "http://maps.googleapis.com/maps/api/js?sensor=true", array(),  '' , true);
  
  //   wp_enqueue_script("cw2-bootstrap", "https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js", array(), '4.4.1', true);
  wp_enqueue_script('cw2-js', get_template_directory_uri() . "/assests/js/main.js", array(), $version, true);

  wp_register_script('custom-script', get_template_directory_uri() . "/assests/js/loadmore.js", array('jquery'), false, true);
  wp_register_script('cw2_filter', get_template_directory_uri() . "/assests/js/filter.js", array('jquery'), NULL, true);
  wp_register_script('cw2_search', get_template_directory_uri() . "/assests/js/search.js", array('jquery'), NULL, true);
  $script_data_array = array(
      'ajaxurl' => admin_url('admin-ajax.php'),
      'security' => wp_create_nonce( 'load_more_posts' ),
  );

  $script_data_array = array(
    'ajaxurl' => admin_url('admin-ajax.php'),
);

    wp_localize_script( 'custom-script', 'blog', $script_data_array );
    wp_localize_script( 'cw2_filter', 'wpAjax', $script_data_array);
    wp_localize_script( 'cw2_search', 'wpAjax', $script_data_array);
    wp_enqueue_script( 'cw2_filter' );
    wp_enqueue_script( 'cw2_search' );
    wp_enqueue_script( 'custom-script' );
}
    add_action('wp_enqueue_scripts', 'cw2_add_scripts');
    add_theme_support('title-tag');
    add_theme_support('custom-logo');
    add_theme_support('post-thumbnails');



    // register custom post type to work with
    function cw2_even_post() {
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
        'register_meta_box_cb' => 'cw2_date_picker'
        );
        //register post type
        register_post_type ( 'event', array(
        'labels' => $labels,
        'has_archive' => true,
        'public' => true,
        'supports' => array( 'title', 'editor', 'excerpt', 'thumbnail','page-attributes' ),
        'taxonomies' => array( 'post_tag', 'category' ),
        'exclude_from_search' => false,
        'capability_type' => 'post',
        'rewrite' => array( 'slug' => 'events' ),
        )
        );
        }
    
    add_action( 'init', 'cw2_even_post' );

    function cw2_shops_post() {
        // set up labels
        $labels = array (
        'name' => 'Shops',
        'singular_name' => 'Shop',
        'add_new' => 'Add New Shop',
        'add_new_item' => 'Add New Shop',
        'edit_item' => 'Edit Shop Details',
        'set_featured_image' => 'Set Shop Logo',
        'new_item' => 'New Shop',
        'all_items' => 'All Shops',
        'view_item' => 'View Shop Info',
        'search_items' => 'Search Shops',
        'not_found' => 'No Shop Found',
        'not_found_in_trash' => 'No Shops found in Trash',
        'parent_item_colon' => '',
        'menu_name' => 'Shops',
        'register_meta_box_cb' => 'cw2_shop_meta_box'
        );
        //register post type
        register_post_type ( 'shop', array(
        'labels' => $labels,
        'has_archive' => true,
        'public' => true,
        'supports' => array( 'title', 'excerpt', 'thumbnail','page-attributes' ),
        'taxonomies' => array( 'post_tag', 'category' ),
        'exclude_from_search' => false,
        'capability_type' => 'post',
        'rewrite' => array( 'slug' => 'shops' ),
        )
        );
        }
    
    add_action( 'init', 'cw2_shops_post' );

    function cw2_faq_post() {
        // set up labels
        $labels = array (
        'name' => 'faqs',
        'singular_name' => 'FAQ',
        'add_new' => 'Add New FAQ',
        'add_new_item' => 'Add New FAQ',
        'edit_item' => 'Edit FAQ Details',
        'featured_image' => 'Set FAQ Image (If Any)',
        'set_featured_image' => 'Set Image',
        'new_item' => 'New FAQ',
        'all_items' => 'All FAQs',
        'view_item' => 'View FAQ Info',
        'search_items' => 'Search FAQs',
        'not_found' => 'No FAQ Found',
        'not_found_in_trash' => 'No FAQs found in Trash',
        'parent_item_colon' => '',
        'menu_name' => 'F.A.Qs',
        'register_meta_box_cb' => 'cw2_faq_metabox'
        );
        //register post type
        register_post_type ( 'faq', array(
        'labels' => $labels,
        'has_archive' => true,
        'public' => true,
        'supports' => array( 'title', 'thumbnail','page-attributes' ),
        'taxonomies' => array( 'post_tag', 'category' ),
        'exclude_from_search' => false,
        'capability_type' => 'post',
        'rewrite' => array( 'slug' => 'help' ),
        )
        );
        }
    
    add_action( 'init', 'cw2_faq_post' );

    function cw2_announcement_post() {
        // set up labels
        $labels = array (
        'name' => 'Announcements',
        'singular_name' => 'Announcement',
        'add_new' => 'Add New Announcement',
        'add_new_item' => 'Add New Announcement',
        'edit_item' => 'Edit Announcement Details',
        'set_featured_image' => 'Set Announcement Logo',
        'new_item' => 'New Announcement',
        'all_items' => 'All Announcements',
        'view_item' => 'View Announcement Info',
        'search_items' => 'Search Announcements',
        'not_found' => 'No Announcement Found',
        'not_found_in_trash' => 'No Announcements found in Trash',
        'parent_item_colon' => '',
        'menu_name' => 'Announcements',
        // 'register_meta_box_cb' => 'cw2_shop_metabox'
        );
        //register post type
        register_post_type ( 'announcement', array(
        'labels' => $labels,
        'has_archive' => true,
        'public' => true,
        'supports' => array( 'title', 'editor','excerpt', 'thumbnail','page-attributes' ),
        'taxonomies' => array( 'post_tag', 'category' ),
        'exclude_from_search' => false,
        'capability_type' => 'post',
        'rewrite' => array( 'slug' => 'announcements' ),
        )
        );
        }
    
    add_action( 'init', 'cw2_announcement_post' );

    function cw2_blog_post() {
        // set up labels
        $labels = array (
        'name' => 'Blog Posts',
        'singular_name' => 'blog',
        'add_new' => 'Add new Blog post',
        'add_new_item' => 'Add New blog',
        'edit_item' => 'Edit blog Details',
        'set_featured_image' => 'Set blog Logo',
        'new_item' => 'New blog Post',
        'all_items' => 'All blog posts',
        'view_item' => 'View blog post Info',
        'search_items' => 'Search blog posts',
        'not_found' => 'No Blog posts found',
        'not_found_in_trash' => 'No blog posts found in Trash',
        'parent_item_colon' => '',
        'menu_name' => 'Blog Posts',
        // 'register_meta_box_cb' => 'cw2_shop_metabox'
        );
        //register post type
        register_post_type ( 'blog', array(
        'labels' => $labels,
        'has_archive' => true,
        'public' => true,
        'supports' => array( 'title', 'editor','excerpt', 'thumbnail','page-attributes' ),
        'taxonomies' => array( 'post_tag', 'category' ),
        'exclude_from_search' => false,
        'capability_type' => 'post',
        'rewrite' => array( 'slug' => 'blog' ),
        )
        );
        }
    
    add_action( 'init', 'cw2_blog_post' );
    
    

    function cw_shop_tax(){
        register_taxonomy_for_object_type('category', 'shops');
    }
    add_action('init','cw_shop_tax');    

    
    function cw2_custom_nav_class ($classes, $item) {
        if (in_array('current-menu-item', $classes) ){
            $classes[] = 'home-header-nav-container-menu-active';
        } else{
            $classes[] = 'home-header-nav-container-menu-inactive';
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

   

    


    function logoSvg () {
        echo '
        <svg width="275" height="46"  viewBox="0 0 275 46" fill="rgb(var(--cw2-fontNormal))"  xmlns="http://www.w3.org/2000/svg">
        <path d="M21.0487 20.6429H18.0278C17.8491 19.7671 17.5365 18.9978 17.0899 18.3348C16.6514 17.6719 16.1154 17.1153 15.482 16.6652C14.8567 16.2068 14.1624 15.8631 13.399 15.6339C12.6357 15.4048 11.8399 15.2902 11.0116 15.2902C9.50114 15.2902 8.13281 15.6749 6.9066 16.4442C5.6885 17.2135 4.71809 18.3471 3.99535 19.8449C3.28073 21.3426 2.92343 23.1801 2.92343 25.3571C2.92343 27.5342 3.28073 29.3717 3.99535 30.8694C4.71809 32.3672 5.6885 33.5007 6.9066 34.2701C8.13281 35.0394 9.50114 35.4241 11.0116 35.4241C11.8399 35.4241 12.6357 35.3095 13.399 35.0804C14.1624 34.8512 14.8567 34.5115 15.482 34.0614C16.1154 33.6031 16.6514 33.0424 17.0899 32.3795C17.5365 31.7083 17.8491 30.939 18.0278 30.0714H21.0487C20.8213 31.3564 20.4071 32.5063 19.8062 33.5212C19.2053 34.5361 18.4582 35.3996 17.5649 36.1116C16.6717 36.8155 15.6688 37.3516 14.5562 37.7199C13.4518 38.0882 12.2703 38.2723 11.0116 38.2723C8.88397 38.2723 6.99186 37.7485 5.33525 36.7009C3.67865 35.6533 2.37528 34.1637 1.42517 32.2321C0.475057 30.3006 0 28.0089 0 25.3571C0 22.7054 0.475057 20.4137 1.42517 18.4821C2.37528 16.5506 3.67865 15.061 5.33525 14.0134C6.99186 12.9658 8.88397 12.442 11.0116 12.442C12.2703 12.442 13.4518 12.6261 14.5562 12.9944C15.6688 13.3627 16.6717 13.9029 17.5649 14.615C18.4582 15.3188 19.2053 16.1782 19.8062 17.1931C20.4071 18.1998 20.8213 19.3497 21.0487 20.6429Z" />
        <path d="M31.0462 38.3705C29.8606 38.3705 28.7846 38.1455 27.8182 37.6953C26.8519 37.237 26.0845 36.5781 25.516 35.7188C24.9476 34.8512 24.6634 33.8036 24.6634 32.5759C24.6634 31.4955 24.8745 30.6198 25.2968 29.9487C25.719 29.2693 26.2834 28.7374 26.9899 28.3527C27.6964 27.968 28.476 27.6816 29.3287 27.4933C30.1895 27.2969 31.0543 27.1414 31.9232 27.0268C33.0601 26.8795 33.9818 26.769 34.6883 26.6953C35.4029 26.6135 35.9226 26.4784 36.2474 26.2902C36.5804 26.1019 36.7469 25.7746 36.7469 25.308V25.2098C36.7469 23.9985 36.418 23.0573 35.7602 22.3862C35.1106 21.715 34.1239 21.3795 32.8002 21.3795C31.4278 21.3795 30.3519 21.6823 29.5723 22.2879C28.7927 22.8936 28.2446 23.5402 27.9279 24.2277L25.1993 23.2455C25.6866 22.0997 26.3362 21.2076 27.1483 20.5692C27.9685 19.9226 28.8617 19.4725 29.8281 19.2188C30.8026 18.9568 31.7608 18.8259 32.7028 18.8259C33.3037 18.8259 33.994 18.8996 34.7735 19.0469C35.5612 19.186 36.3205 19.4766 37.0514 19.9185C37.7904 20.3605 38.4035 21.0275 38.8907 21.9196C39.3779 22.8118 39.6216 24.0067 39.6216 25.5045V37.9286H36.7469V35.375H36.6007C36.4058 35.7842 36.081 36.2221 35.6262 36.6886C35.1715 37.1551 34.5665 37.5521 33.8113 37.8795C33.056 38.2069 32.1343 38.3705 31.0462 38.3705ZM31.4847 35.7679C32.6216 35.7679 33.5798 35.5428 34.3594 35.0926C35.1471 34.6425 35.7399 34.0614 36.1378 33.3493C36.5438 32.6373 36.7469 31.8884 36.7469 31.1027V28.4509C36.6251 28.5982 36.3571 28.7333 35.9429 28.856C35.5369 28.9706 35.0659 29.0729 34.5299 29.1629C34.0021 29.2448 33.4864 29.3185 32.983 29.3839C32.4876 29.4412 32.0856 29.4903 31.777 29.5313C31.0299 29.6295 30.3316 29.7891 29.6819 30.01C29.0404 30.2228 28.5207 30.5461 28.1228 30.9799C27.733 31.4055 27.5381 31.9866 27.5381 32.7232C27.5381 33.7299 27.9076 34.4911 28.6465 35.0067C29.3936 35.5141 30.3397 35.7679 31.4847 35.7679Z" />
        <path d="M77.3734 23.0818L74.791 23.8185C74.6286 23.3847 74.389 22.9632 74.0723 22.5539C73.7637 22.1365 73.3415 21.7928 72.8055 21.5227C72.2695 21.2526 71.5833 21.1176 70.7469 21.1176C69.6019 21.1176 68.6477 21.3836 67.8844 21.9156C67.1292 22.4394 66.7516 23.1064 66.7516 23.9167C66.7516 24.6369 67.0114 25.2057 67.5312 25.6231C68.0509 26.0406 68.8629 26.3884 69.9673 26.6667L72.7446 27.3542C74.4174 27.7634 75.664 28.3895 76.4841 29.2325C77.3043 30.0673 77.7144 31.1436 77.7144 32.4613C77.7144 33.5417 77.4058 34.5074 76.7887 35.3586C76.1796 36.2098 75.327 36.881 74.2307 37.372C73.1344 37.8631 71.8594 38.1086 70.4059 38.1086C68.4975 38.1086 66.918 37.6912 65.6675 36.8564C64.4169 36.0216 63.6251 34.8021 63.2922 33.1979L66.0207 32.5104C66.2806 33.5253 66.7719 34.2865 67.4946 34.7939C68.2255 35.3013 69.1796 35.5551 70.3571 35.5551C71.697 35.5551 72.7608 35.2686 73.5485 34.6957C74.3444 34.1146 74.7423 33.4189 74.7423 32.6086C74.7423 31.9539 74.5149 31.4055 74.0601 30.9635C73.6054 30.5134 72.907 30.1778 71.965 29.9568L68.8467 29.2202C67.1332 28.811 65.8745 28.1767 65.0706 27.3173C64.2748 26.4498 63.8769 25.3653 63.8769 24.064C63.8769 23 64.1733 22.0588 64.7661 21.2403C65.367 20.4219 66.1831 19.7794 67.2144 19.3129C68.2539 18.8464 69.4314 18.6131 70.7469 18.6131C72.5984 18.6131 74.052 19.0223 75.1077 19.8408C76.1715 20.6592 76.9267 21.7396 77.3734 23.0818Z" />
        <path d="M57.3316 30.2188V19.0714H60.2063V37.9286H57.3316V34.7366H57.1367C56.6982 35.6942 56.0161 36.5086 55.0903 37.1797C54.1646 37.8426 52.9952 38.1741 51.5822 38.1741C50.4129 38.1741 49.3734 37.9163 48.4639 37.4007C47.5544 36.8769 46.8398 36.0911 46.3201 35.0435C45.8003 33.9877 45.5405 32.6577 45.5405 31.0536V19.0714H48.4152V30.8571C48.4152 32.2321 48.7969 33.3289 49.5602 34.1473C50.3317 34.9658 51.3143 35.375 52.508 35.375C53.2226 35.375 53.9494 35.1909 54.6884 34.8225C55.4355 34.4542 56.0608 33.8895 56.5642 33.1284C57.0758 32.3672 57.3316 31.3973 57.3316 30.2188Z" />
        <path d="M90.5653 38.3214C88.7625 38.3214 87.2074 37.9204 85.9 37.1183C84.6007 36.308 83.5978 35.1786 82.8913 33.7299C82.1929 32.2731 81.8438 30.5789 81.8438 28.6473C81.8438 26.7158 82.1929 25.0134 82.8913 23.5402C83.5978 22.0588 84.5804 20.9048 85.8391 20.0781C87.1059 19.2433 88.5839 18.8259 90.273 18.8259C91.2474 18.8259 92.2097 18.9896 93.1599 19.317C94.11 19.6443 94.9748 20.1763 95.7544 20.9129C96.534 21.6414 97.1552 22.6071 97.6181 23.8103C98.081 25.0134 98.3124 26.4948 98.3124 28.2545V29.4821H84.7248L84.7322 26.9777H95.389C95.389 25.9137 95.1778 24.9643 94.7556 24.1295C94.3414 23.2946 93.7486 22.6358 92.9771 22.1529C92.2138 21.67 91.3124 21.4286 90.273 21.4286C89.128 21.4286 88.1372 21.715 87.3008 22.2879C86.4725 22.8527 85.835 23.5893 85.3884 24.4978C84.9418 25.4063 84.7185 26.3802 84.7185 27.4196V29.0893C84.7185 30.5134 84.9621 31.7206 85.4493 32.7109C85.9447 33.6931 86.6309 34.442 87.5079 34.9576C88.3849 35.465 89.4041 35.7188 90.5653 35.7188C91.3205 35.7188 92.0027 35.6124 92.6117 35.3996C93.2289 35.1786 93.7608 34.8512 94.2074 34.4174C94.654 33.9754 94.9992 33.4271 95.2428 32.7723L98.0201 33.558C97.7277 34.5074 97.2364 35.3423 96.5462 36.0625C95.8559 36.7746 95.0032 37.3311 93.9882 37.7321C92.9731 38.125 91.8321 38.3214 90.5653 38.3214Z" />
        <path d="M106.924 37.9286L101.224 19.0714H104.245L108.289 33.5089H108.483L112.479 19.0714H115.548L119.495 33.4598H119.69L123.734 19.0714H126.755L121.054 37.9286H118.228L114.135 23.442H113.843L109.75 37.9286H106.924Z" />
        <path d="M136.061 38.3705C134.876 38.3705 133.8 38.1455 132.833 37.6953C131.867 37.237 131.099 36.5781 130.531 35.7188C129.963 34.8512 129.678 33.8036 129.678 32.5759C129.678 31.4955 129.889 30.6198 130.312 29.9487C130.734 29.2693 131.298 28.7374 132.005 28.3527C132.711 27.968 133.491 27.6816 134.344 27.4933C135.204 27.2969 136.069 27.1414 136.938 27.0268C138.075 26.8795 138.997 26.769 139.703 26.6953C140.418 26.6135 140.938 26.4784 141.262 26.2902C141.595 26.1019 141.762 25.7746 141.762 25.308V25.2098C141.762 23.9985 141.433 23.0573 140.775 22.3862C140.126 21.715 139.139 21.3795 137.815 21.3795C136.443 21.3795 135.367 21.6823 134.587 22.2879C133.808 22.8936 133.26 23.5402 132.943 24.2277L130.214 23.2455C130.702 22.0997 131.351 21.2076 132.163 20.5692C132.983 19.9226 133.877 19.4725 134.843 19.2188C135.818 18.9568 136.776 18.8259 137.718 18.8259C138.319 18.8259 139.009 18.8996 139.789 19.0469C140.576 19.186 141.335 19.4766 142.066 19.9185C142.805 20.3605 143.418 21.0275 143.906 21.9196C144.393 22.8118 144.637 24.0067 144.637 25.5045V37.9286H141.762V35.375H141.616C141.421 35.7842 141.096 36.2221 140.641 36.6886C140.186 37.1551 139.581 37.5521 138.826 37.8795C138.071 38.2069 137.149 38.3705 136.061 38.3705ZM136.5 35.7679C137.637 35.7679 138.595 35.5428 139.374 35.0926C140.162 34.6425 140.755 34.0614 141.153 33.3493C141.559 32.6373 141.762 31.8884 141.762 31.1027V28.4509C141.64 28.5982 141.372 28.7333 140.958 28.856C140.552 28.9706 140.081 29.0729 139.545 29.1629C139.017 29.2448 138.501 29.3185 137.998 29.3839C137.503 29.4412 137.101 29.4903 136.792 29.5313C136.045 29.6295 135.347 29.7891 134.697 30.01C134.055 30.2228 133.536 30.5461 133.138 30.9799C132.748 31.4055 132.553 31.9866 132.553 32.7232C132.553 33.7299 132.923 34.4911 133.661 35.0067C134.409 35.5141 135.355 35.7679 136.5 35.7679Z" />
        <path d="M151.065 45C150.578 45 150.143 44.9591 149.762 44.8772C149.38 44.8036 149.116 44.7299 148.97 44.6562L149.701 42.1027C150.399 42.2827 151.016 42.3482 151.552 42.2991C152.088 42.25 152.563 42.0086 152.977 41.5748C153.4 41.1492 153.785 40.4576 154.135 39.5L154.671 38.0268L147.752 19.0714H150.87L156.035 34.0982H156.23L161.394 19.0714H164.513L156.571 40.6786C156.214 41.6525 155.771 42.4587 155.243 43.0971C154.715 43.7437 154.102 44.2225 153.404 44.5335C152.714 44.8445 151.934 45 151.065 45Z" />
        <path d="M178.344 37.9286V12.7857H186.773C188.731 12.7857 190.33 13.1417 191.573 13.8538C192.823 14.5577 193.749 15.5112 194.35 16.7143C194.951 17.9174 195.251 19.2597 195.251 20.7411C195.251 22.2225 194.951 23.5688 194.35 24.7801C193.757 25.9914 192.84 26.9572 191.597 27.6775C190.355 28.3895 188.763 28.7455 186.822 28.7455H181.365V26.0446H186.725C188.065 26.0446 189.141 25.8114 189.953 25.3449C190.765 24.8784 191.353 24.2481 191.719 23.4542C192.092 22.6522 192.279 21.7478 192.279 20.7411C192.279 19.7344 192.092 18.8341 191.719 18.0402C191.353 17.2463 190.761 16.6243 189.94 16.1741C189.12 15.7158 188.032 15.4866 186.676 15.4866H181.365V37.9286H178.344Z" />
        <path d="M238.317 37.9286V19.0714H241.192V37.9286H238.317ZM239.779 15.9286C239.218 15.9286 238.735 15.7362 238.329 15.3516C237.931 14.9669 237.732 14.5045 237.732 13.9643C237.732 13.4241 237.931 12.9617 238.329 12.577C238.735 12.1923 239.218 12 239.779 12C240.339 12 240.818 12.1923 241.216 12.577C241.622 12.9617 241.825 13.4241 241.825 13.9643C241.825 14.5045 241.622 14.9669 241.216 15.3516C240.818 15.7362 240.339 15.9286 239.779 15.9286Z" />
        <path d="M249.332 26.5848V37.9286H246.457V19.0714H249.234V22.0179H249.478C249.916 21.0603 250.582 20.2909 251.476 19.7098C252.369 19.1205 253.522 18.8259 254.935 18.8259C256.202 18.8259 257.31 19.0878 258.26 19.6116C259.21 20.1272 259.949 20.9129 260.477 21.9688C261.005 23.0164 261.269 24.3423 261.269 25.9464V37.9286H258.394V26.1429C258.394 24.6615 258.013 23.5074 257.249 22.6808C256.486 21.846 255.438 21.4286 254.107 21.4286C253.189 21.4286 252.369 21.6291 251.646 22.0301C250.931 22.4312 250.367 23.0164 249.953 23.7857C249.539 24.5551 249.332 25.4881 249.332 26.5848Z" />
        <path d="M274.659 19.0714V21.5268H264.963V19.0714H267.789V21.5268H270.664V19.0714H274.659ZM267.789 14.5536H270.664V32.5268C270.664 33.3452 270.781 33.9591 271.017 34.3683C271.26 34.7693 271.569 35.0394 271.943 35.1786C272.324 35.3095 272.726 35.375 273.149 35.375C273.465 35.375 273.725 35.3586 273.928 35.3259C274.131 35.285 274.294 35.2522 274.415 35.2277L275 37.8304C274.805 37.904 274.533 37.9777 274.184 38.0513C273.835 38.1332 273.392 38.1741 272.856 38.1741C272.044 38.1741 271.248 37.9981 270.469 37.6462C269.697 37.2943 269.056 36.7582 268.544 36.038C268.041 35.3177 267.789 34.4092 267.789 33.3125V14.5536Z"/>
        <path stroke="rgb(var(--cw2-fontNormal))" d="M230.211 24.1041C230.211 32.5522 223.363 39.4008 214.915 39.4008C206.467 39.4008 199.618 32.5522 199.618 24.1041C199.618 15.6559 206.467 8.80731 214.915 8.80731C223.363 8.80731 230.211 15.6559 230.211 24.1041Z" fill="none" />
        <path fill="rgb(var(--cw2-fontNormal))" stroke="rgb(var(--cw2-fontNormal))" d="M224.294 11.8532L224.366 12.8544L225.122 12.1943L228.764 9.01488L225.605 12.6927L224.958 13.4455L225.948 13.5172L230.786 13.8676L225.948 14.218L224.958 14.2897L225.605 15.0425L228.764 18.7203L225.122 15.5408L224.324 14.8442L224.293 15.903L223.951 27.7373L223.608 15.903L223.578 14.8442L222.78 15.5408L219.137 18.7203L222.296 15.0425L222.943 14.2897L221.953 14.218L217.116 13.8676L221.953 13.5172L222.943 13.4455L222.296 12.6927L219.137 9.01487L222.78 12.1943L223.536 12.8544L223.607 11.8532L223.951 7.03298L224.294 11.8532Z" fill="none"/>
        </svg>
        ';
    }


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
             echo "<div class='home-body-all-category ",$category.'-cw2'. "'>";
             echo "<h2 class='home-body-all-category-type'>",$type,"</h2>";
             echo "<div class='home-body-all-category-posts' />";
             while ( $wp_query->have_posts() ) : $wp_query->the_post();
                                    echo "<div class='home-body-all-category-posts-post'>";
                                    echo "<div class='home-body-all-category-posts-post-img' style='order:",$category === 'event'? "2" : "1","'".">
                                   <h2>",mb_strimwidth(get_the_title(), 0, 30, "..."),"</h2>
                                   <p class='home-body-all-category-posts-post-img-date'>",get_the_date('d-m-y'),"</p>
                                   <div class='home-body-all-category-posts-post-gradient'></div>
                                   ",the_post_thumbnail()," </div>";
                                   echo "<div class='home-body-all-category-posts-post-content' style='order:2'>
                                   <p class='home-body-all-category-posts-post-content-para'>",limit_words(get_the_excerpt(),200),"</p>
                                   <div class='home-body-all-category-posts-post-content-bottom'>
                                   <p class='home-body-all-category-posts-post-content-bottom-date'>",get_the_date('d-m-y'),"</p>
                                   <a href='",the_permalink(),"' class='home-body-all-category-posts-post-content-bottom-btn'>Continue Reading</a>
                                   </div>
                                   </div>";
                                   echo "</div>";
            endwhile;
            echo "<a href='' class='home-body-all-category-posts-btn'>More in ",$type,"  &nbsp;&nbsp;<i class='fa fa-solid fa-arrow-right'></i></a>"; 
            // echo '<button class="home-body-all-category-posts-more ',$category,' ', $total > 4 ? "":"cw2-hide",'">See More of '.$type.'</button>';
            echo "</div>";
            // echo '<button class="home-body-all-category-posts-more ',$category,' ', $total > 4 ? "":"cw2-hide",'">See More of '.$type.'</button>';
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

    add_action('wp_ajax_cw2_custom_post_load_more', 'cw2_custom_post_load_more');
    add_action('wp_ajax_nopriv_cw2_custom_post_load_more', 'cw2_custom_post_load_more');

// bootstrap carousel 
    function cw2_custom_carousel() {
        $wp_query = new WP_Query(array('post_type'=>'event', 'post_status'=>'publish', 'posts_per_page'=>-1)); 
        
        
        if ($wp_query->have_posts()) {
            $count=0;
            // echo "<div id='carouselExampleIndicators' class='carousel slide' data-bs-ride='carousel'>";
            echo "<div class='carousel-inner'>";
           
            while ( $wp_query->have_posts() ) : $wp_query->the_post();
                    echo "<div class='carousel-item",$count === 0 ? " active" : "","'>";
                    the_post_thumbnail();
                    echo "</div>";
                    $count++;               
           endwhile; 
           echo "</div>";
        //    echo "</div>";
        } else {
            echo "No posts";
        }
       wp_reset_postdata();
   }

// faq metabox

    function cw2_faq_meta_box () {
        add_meta_box( 'cw2_faq_q', 'Question', 'cw2_faq_q_meta_html');
        add_meta_box( 'cw2_faq_a', 'Answer', 'cw2_faq_a_meta_html');
    }

    add_action( 'add_meta_boxes_faq', 'cw2_faq_meta_box');

    function cw2_faq_q_meta_html($post) {
        $value  = get_post_meta( $post->ID, '_cw2_faq_q', true );
        ?>          
            <div>
                <input type="text" name="cw2_faq_q" value="<?php echo esc_attr( $value )?>" size="25"/>
            </div>
        <?php
    }
    function cw2_faq_a_meta_html($post) {
        $value  = get_post_meta( $post->ID, '_cw2_faq_a', true );
        ?>          
            <div>
                <input type="text" name="cw2_faq_a" value="<?php echo esc_attr( $value )?>" size="25"/>
            </div>
        <?php
    }

   function cw2_faq_save($post_id) {
    $keys = array('_cw2_faq_q','_cw2_faq_a');
    $name = array('cw2_faq_q','cw2_faq_a');
        foreach($name as $i=>$v) {
            if(array_key_exists($v, $_POST)) {
                update_post_meta( $post_id, $keys[$i], $_POST[$v]);
            }
        }
    }

    add_action('save_post_faq', 'cw2_faq_save');

// add custom meta box for event calendar
// NOTE: this lacks normal security to add/save/update the post in cw2_event_date_save function.
   function cw2_event_date_meta_box () {
       add_meta_box( 'cw2_event', 'Set Event Details', 'cw2_event_date_html');
   }

   add_action( 'add_meta_boxes_event', 'cw2_event_date_meta_box');

   function cw2_event_date_html($post) {
        $start = get_post_meta( $post->ID, '_cw2_event_start', true );
        $end = get_post_meta( $post->ID, '_cw2_event_end', true );
        $venue = get_post_meta( $post->ID, '_cw2_event_venue', true );
        ?>          
        <div>
            <label for="cw2_event_date_start"> Staring Date</label>
            <input style="margin-right:2rem" type="date" name="cw2_event_date_start" value="<?php echo esc_attr( $start )?>" size="25"/>
            <label for="cw2_event_date_end"> Ending Date</label>
            <input type="date"  name="cw2_event_date_end" value="<?php echo esc_attr( $end )?>" size="25"/><br>
            <label for="cw2_event_venue" style="margin-top:1rem; text-aling:center"> Venue</label>
            <input type="text" style="margin-top:1rem"  name="cw2_event_venue" value="<?php echo esc_attr( $venue )?>" size="25"/>

        </div>
        <?php
   }

   function cw2_event_date_save($post_id) {
       $keys = array('_cw2_event_start', '_cw2_event_end', '_cw2_event_venue');
       $name = array('cw2_event_date_start', 'cw2_event_date_end', 'cw2_event_venue');
       foreach($name as $i=>$v) {
           if(array_key_exists($v, $_POST)) {
                update_post_meta( $post_id, $keys[$i], $_POST[$v]);
           }
       }
   }

   add_action('save_post_event', 'cw2_event_date_save');

//    function cw2_get_event_date ($content) {
//        global $post;
//        $value = esc_attr( get_post_meta( $post->ID, '_cw2_event', true ) );
//        $date = "<div class=''>$value</div>";
//        return $date.$content;
//    }

//    add_filter('the_content', 'cw2_get_event_date');



// shop metaboxes

   function cw2_shop_metabox () {

        add_meta_box( 'cw2_shop_find', 'Shop Number', 'cw2_shop_html_find');
        add_meta_box( 'cw2_shop_call', 'Contact Number', 'cw2_shop_html_contact');
        add_meta_box( 'cw2_shop_open', 'Opens', 'cw2_shop_html_open');
        add_meta_box( 'cw2_shop_close', 'Closes', 'cw2_shop_html_close');
        add_meta_box( 'cw2_shop_promo', 'Promo', 'cw2_shop_html_promo');
   }

   add_action( 'add_meta_boxes_shop', 'cw2_shop_metabox');

   function cw2_shop_html_find($post) {
    $value = get_post_meta( $post->ID, '_cw2_shop_find', true );
    ?>
            <input type="text" name="cw2_shop_find" value="<?php echo esc_attr( $value )?>" size="25"/>
           
    <?php
}
function cw2_shop_html_contact($post) {
    $value = get_post_meta( $post->ID, '_cw2_shop_contact', true );
    ?>
            <input type="text" name="cw2_shop_contact" value="<?php echo esc_attr( $value )?>" size="25"/>
           
    <?php
}

function cw2_shop_html_open($post) {
    $value = get_post_meta( $post->ID, '_cw2_shop_open', true );
    ?>  
            <input type="time" name="cw2_shop_open" value="<?php echo esc_attr( $value )?>" size="25"/>
            
    <?php
}

function cw2_shop_html_close($post) {
    $value = get_post_meta( $post->ID, '_cw2_shop_close', true );
    ?> 
            <input type="time" name="cw2_shop_close" value="<?php echo esc_attr( $value )?>" size="25"/>
            
    <?php
}

function cw2_shop_html_promo($post) {
    $value = get_post_meta( $post->ID, '_cw2_shop_promo', true );
    ?> 
            <input type="text" name="cw2_shop_promo" value="<?php echo esc_attr( $value )?>" size="25"/>
            
    <?php
}

function cw2_shop_save($post_id) {
    $names =array(
        "cw2_shop_find",
        "cw2_shop_contact",
        "cw2_shop_open",
        "cw2_shop_close",
        "cw2_shop_promo"
    );
    $keys = array (
        '_cw2_shop_find',
        '_cw2_shop_contact',
        '_cw2_shop_open',
        '_cw2_shop_close',
        '_cw2_shop_promo'

    );


    foreach ($names as $index=>$value) {
        if(array_key_exists($value, $_POST)) {
        update_post_meta( $post_id,$keys[$index] , $_POST[$value]);
        }
    }

}

    add_action('save_post_shop', 'cw2_shop_save');


// comman custom shops cards

function cw2_shop_cards ($query, $title, $limit) {
    if(!$query) {
        $wp_query = new WP_Query(array('post_type'=>'shop', 'post_status'=>'publish', 'posts_per_page'=>$limit)); 

    } else {
        $wp_query = $query;
    }
    ?> 
        <div class="shops-list-container-title">
            <h2><?php echo $title ?></h2>
        </div>
        <div class="shops-list-container-cards">
    <?php
    
    while ( $wp_query->have_posts() ) : $wp_query->the_post();
    // var_dump(get_post_type());
    ?> 
    
        <div class="shops-list-container-cards-card">
                    <div class="shops-list-container-cards-card-img">
                    <?php the_post_thumbnail(); ?>
                    </div>

                    <div class="shops-list-container-cards-card-content">
                        <div class="shops-list-container-cards-card-content-title">
                        <h2><?php echo get_the_title()?></h2>
                        </div>
                        <div class="shops-list-container-cards-card-content-loc">
                        <i class="fa fa-solid fa-location-dot"></i>
                        <p><?php echo get_post_meta( get_the_ID(), '_cw2_shop_find', true );?></p>
                        </div>
        
                        <div class="shops-list-container-cards-card-content-call">
                        <i class="fa-solid fa-phone"></i>
                        <p><?php echo get_post_meta( get_the_ID(), '_cw2_shop_contact', true ); ?></p>
                        </div>
        
                        <div class="shops-list-container-cards-card-content-hours">
                        <i class="fa-solid fa-clock"></i>
                        <p><?php  echo get_post_meta( get_the_ID(), '_cw2_shop_open', true ); ?>
                        -
                        <?php echo get_post_meta( get_the_ID(), '_cw2_shop_close', true );?></p>
                        </div>
                        <!-- <div class="shops-list-container-cards-card-content-cat">
                        <?php get_the_category()?>
                        </div> -->
                    </div>
        </div>
    <?php
    endwhile;

    echo '  </div>';
}


//search  all

// function mySearchFilter( $query ) {
//     $post_type = $_GET['post_type'];
//     if (!$post_type) {
//        $post_type = 'any';
//     }
//     if ( $query->is_search ) {
//        $query->set( 'post_type', array( esc_attr( $post_type ) ) );
//     }
//     return $query;
// }
// add_filter( 'pre_get_posts', 'mySearchFilter' );



// function cw2_search_by_ajax() {
//     // check_ajax_referer('load_more_posts', 'security');
//     // $paged = $_POST['page'];
//     echo($_POST);
//     $category = $_POST['category'];
//     $ptype = $_POST['posttype'];
   
//         $wp_query = new WP_Query(array(
//             'post_type' =>  $ptype,
//             'post_status' => 'publish',
//             'posts_per_page' => -1,
//             // 'paged' => $paged,
//             'category_name' => $category
//         ));
        
//         var_dump($wp_query->have_posts());
//         if($wp_query->have_posts()){
//             while ( $wp_query->have_posts() ) : $wp_query->the_post();
//             the_post_thumbnail(); 
//             endwhile; 
//         }
//         wp_die();
//     }

//     add_action('wp_ajax_load_posts_by_ajax', 'cw2_search_by_ajax');
//     add_action('wp_ajax_nopriv_load_posts_by_ajax', 'cw2_search_by_ajax');

add_action( 'init', 'news_my_taxonomy');
  function news_my_taxonomy(){
 // custom post type taxonomies
    $labels = array(
    'name' => 'Categories',
    'singular_name' => 'Category',
    'add_new' => 'Add Category',
    'add_new_item' => 'Add New Category',
    'all_items' => 'All Categories',
    'edit_item' => 'Edit Item',
    'new_item' => 'New Item',
    'view_item' => 'View Item',
    'update_item' => 'Update Category',
    'search_items' => 'Search Categories',
    'not_found' => 'No record found',
    'not_found_in_trash' => 'No items found in trash',
    'parent_item_colon' => 'Parent Item',
    'menu_name' => 'Categories'
    );
    $args = array(
        'labels' => $labels,
        'hierarchical' => true,
        'has_archive' => true,
        'rewrite' => array('slug' => 'shops'),
        'show_ui' => true,
        'show_admin_column' => true,
        'query_var' => true,
        );
        register_taxonomy('shops', array('shop'), $args);
}

    function cw2_cw2_filter () {
        
        $category = $_POST['category'];
    
            $wp_query = new WP_Query(array(

                'post_type' =>  'shop',
                'post_status' => 'publish',
                'posts_per_page' => -1,
                // 'paged' => $paged,
                'category_name' => $category
            ));
            
            // var_dump($wp_query->have_posts());
            if($wp_query->have_posts()){
                
               cw2_shop_cards($wp_query, 'Showing only: '.$category, 4);
               
            }
            wp_die();
    }

    add_action('wp_ajax_nopriv_cw2_cw2_filter', 'cw2_cw2_filter');
    add_action('wp_ajax_cw2_cw2_filter', 'cw2_cw2_filter');

    function title_filter( $where, &$wp_query ) {
        global $wpdb;
        if ( $search_term = $wp_query->get( 'search_post_title' ) ) {
            $where .= ' AND ' . $wpdb->posts . '.post_title LIKE \'%' . $wpdb->esc_like( $search_term ) . '%\'';
        }
        return $where;
    }

    function cw2_shop_search_filter($query){

        if ($query->is_search && !is_admin()) {
            $query->set('post_type', 'shop');
        }
        // var_dump($query);

        return $query;
    }
   

    
    
    function cw2_shop_search () {
        // var_dump($_POST);
        add_filter('pre_get_posts', 'cw2_shop_search_filter');
        add_filter( 'posts_where', 'title_filter', 10, 2 );
        $search = $_POST['s'];
        // var_dump($search);
        if($search) {
            $wp_query = new WP_Query( array(
                'post_type' => 'shop',
                'post_status'=>'publish',
                'posts_per_page' => 6,
                // 'order' => 'ASC',
                's' => $search,
            ));
           
            if(!$wp_query->have_posts()){
                $wp_query = new WP_Query( array(
                    'post_type' => 'shop',
                    'post_status'=>'publish',
                    'posts_per_page' => 6,
                    // 'order' => 'ASC',
                    'category_name' => $search,
                ));
            }
            // remove_filter( 'pre_get_posts', 'cw2_shop_search_filter' );
            
        } else {
            $wp_query = new WP_Query( array(
                'post_type' => 'shop',
                'post_status'=>'publish',
                'posts_per_page' => 6,
            ));
        }
        remove_filter( 'posts_where', 'title_filter' );
        remove_filter( 'pre_get_posts', 'cw2_shop_search_filter' );
        
        if($wp_query->have_posts()){
            cw2_shop_cards($wp_query, $search ? 'Search Results for: '.$search : 'All Shops', 6);
        }
        wp_die();
        
    
    }

    add_action('wp_ajax_nopriv_cw2_shop_search', 'cw2_shop_search');
    add_action('wp_ajax_cw2_shop_search', 'cw2_shop_search');


// announcement
function cw2_announcement($limit) {
    $wp_query = new WP_Query(array(
        'post_type' =>  'announcement',
        'post_status' => 'publish',
        'posts_per_page' => $limit,
    ));

    while ( $wp_query->have_posts() ) : $wp_query->the_post();
                ?>
                     <p><?php the_excerpt() ?></p>
                     <p><marquee behavior="" width = "100%" direction="" loop="4" scrolldelay = "200"><?php the_excerpt() ?></marquee> </p>
                <?php
    endwhile; 
}

function cw2_shop_common_posts ($name, $limit, $category) {
    // var_dump($name, $limit, $category);
    $wp_query = new WP_Query(array('post_type'=>'shop', 'post_status'=>'publish', 'posts_per_page'=>$limit));

    if($category) {
        $wp_query = new WP_Query(array(
            'post_type' =>  'shop',
            'post_status' => 'publish',
            'posts_per_page' => $limit,
            'category_name' => $category
        ));
    }
        echo '<div class="home-body-all-container">';
        echo '<div class="home-body-all-container-name">';
        echo    '<h2>',$name,'</h2>';
        echo '</div>';
        echo '<div class="home-body-all-container-posts">';
        while ( $wp_query->have_posts() ) : $wp_query->the_post();
        ?>
        <div class="home-body-all-container-posts-post">
            
            <div class="home-body-all-container-posts-post-img">
                <?php the_post_thumbnail() ?>
            </div>
            <div class="home-body-all-container-posts-post-content">
                <div class="home-body-all-container-posts-post-content-title">
                    <h2><?php echo $category === 'promo' ? get_post_meta( get_the_ID(), '_cw2_shop_promo', true ): the_title() ?></h2>
                </div>
                <div class="home-body-all-container-posts-post-content-date" style="display:<?php echo $name == 'Shops' ? 'none;' : '' ?>">
                        <p><?php echo get_the_date('d-m-y')?></p>
                </div>
            </div>
        </div>
       <?php
        endwhile; 
    
    ?>
        <div class="home-body-all-container-posts-more">
            <button>More <?php echo $name?> <i class="fa fa-solid fa-chevron-right"></i></button>
        </div>
        </div>
      </div>
    <?php
    wp_reset_postdata();
}

function cw2_events_carousel() {
    $wp_query = new WP_Query(array('post_type'=>'event', 'post_status'=>'publish', 'posts_per_page'=>$limit));
    
    if ($wp_query->have_posts()) {
        $count=0;
        // echo "<div id='carouselExampleIndicators' class='carousel slide' data-bs-ride='carousel'>";
        echo "<div class='home-body-all-events-carousel-inner carousel-inner'>";
        
        while ( $wp_query->have_posts() ) : $wp_query->the_post();
        $date_start = strtotime(get_post_meta( get_the_ID(), '_cw2_event_start', true ));
        $date_end = strtotime(get_post_meta( get_the_ID(), '_cw2_event_end', true ));
                echo "<div class='home-body-all-events-carousel-item carousel-item",$count === 0 ? " active" : "","'>";
                ?>  
                    <div class="home-body-all-events-carousel-main">
                            <div class="home-body-all-events-carousel-main-img" >
                            <?php the_post_thumbnail()?>
                            <!-- <div class="home-body-all-events-carousel-main-img-overlay"></div> -->
                        </div>
                            <div class="home-body-all-events-carousel-main-title">
                                <h2><?php echo the_title()?></h2>
                            </div>
                            <div class="home-body-all-events-carousel-main-excerpt">
                                <?php echo the_excerpt()?>
                            </div>
                            <div class="home-body-all-events-carousel-main-date">
                                <p>Happening <?php echo date('d M',$date_start).' - ' .date('d M', $date_end) ?></p>
                            </div>
                            <div class="home-body-all-events-carousel-main-more">
                            
                                <p>Continue Reading <i class="fa fa-solid fa-chevron-right"></i></p>
                            </div>
                            
                    </div>
                <?php
                echo "</div>";
                $count++;               
       endwhile; 
       echo "</div>";
    //    echo "</div>";
    } else {
        echo "No posts";
    }
   wp_reset_postdata();
}


function cw2_events_cards ($limit) {
    $wp_query = new WP_Query(array('post_type'=>'event', 'post_status'=>'publish', 'posts_per_page'=>$limit));

    if ($wp_query->have_posts()) { 
        while ( $wp_query->have_posts() ) : $wp_query->the_post();
        ?> 
        <a href="<?php echo get_the_permalink() ?>">
         <div class="events-cards-card">
            <div class="events-cards-card-img">
            <?php the_post_thumbnail()?>
            </div>
            <div class="events-cards-card-content">
                <div class="events-cards-card-content-title">
                <h2><?php echo the_title()?></h2>
                </div>
                <div class="events-cards-card-content-date">
                <p>Happening <?php echo date('d M',$date_start).' - ' .date('d M', $date_end) ?></p>
                </div>
            </div>
        </div>
        </a>     
        <?php
        endwhile;

    wp_reset_postdata();

    }
}

function cw2_announcement_cards ($limit) {
    $wp_query = new WP_Query(array('post_type'=>'announcement', 'post_status'=>'publish', 'posts_per_page'=>$limit));

    if ($wp_query->have_posts()) { 
        ?>
        <div class="announcement-cards">

        <?php
        while ( $wp_query->have_posts() ) : $wp_query->the_post();
        ?>      
         <div class="announcement-cards-card">
            <div class="announcement-cards-card-img">
            <?php the_post_thumbnail()?>
            </div>
            <div class="announcement-cards-card-content">
                <div class="announcement-cards-card-content-title">
                <h2><?php echo the_title()?></h2>
                </div>
                <div class="announcement-cards-card-content-date">
                <p>Happening <?php echo get_the_date() ?></p>
                </div>
            </div>
        </div>
        <?php

        endwhile;

        ?>
        </div>
        <?php

    wp_reset_postdata();

    }
}

function cw2_blog_cards ($limit) {
    $wp_query = new WP_Query(array('post_type'=>'blog', 'post_status'=>'publish', 'posts_per_page'=>$limit));

    if ($wp_query->have_posts()) { 
        ?>
        <div class="blog-cards">

        <?php
       
        while ( $wp_query->have_posts() ) : $wp_query->the_post();
        ?>      
         <div class="blog-cards-card">
            <div class="blog-cards-card-img">
            <?php the_post_thumbnail()?>
            </div>
            <div class="blog-cards-card-content">
                <div class="blog-cards-card-content-title">
                <h2><?php echo the_title()?></h2>
                </div>
                <div class="blog-cards-card-content-date">
                <p>Happening <?php echo get_the_date() ?></p>
                </div>
            </div>
        </div>

        <?php
        endwhile;

        ?>
        </div>
        <?php
    wp_reset_postdata();

    }
}

function cw2_faq_cards ($limit) {
    $wp_query = new WP_Query(array('post_type'=>'faq', 'post_status'=>'publish', 'posts_per_page'=>$limit));

    if ($wp_query->have_posts()) { 
      
        while ( $wp_query->have_posts() ) : $wp_query->the_post();
        ?>      
            <div class="help-faq-cards-card">
                    <h2>Q. <?php echo get_post_meta( get_the_ID(), '_cw2_faq_q', true )?></h2>
                    <?php the_post_thumbnail() ? the_post_thumbnail() : NULL ?>
                    <p>A. <?php echo get_post_meta( get_the_ID(), '_cw2_faq_a', true )?></p>
            </div>
         
        <?php
        endwhile;

    wp_reset_postdata();

    }
}




   