<!DOCTYPE html>
<html lang="en" data-theme="light"> 
<head>
    <!-- <title>Blog Site Template</title> -->
    <!-- Meta -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Cw2 Custom Theme">
    <meta name="author" content="Gurpreet Singh">    
    <link rel="shortcut icon" href="images/logo.png"> 
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,700;0,900;1,400&display=swap" rel="stylesheet">
	<?php 
        wp_head();
    ?>

</head> 

<body>
    
    <header class="home-header">
        <div class="home-header-top">
        <?php 
                    if(function_exists('the_custom_logo')) {
                        // the_custom_logo();


                        $custom_logo_id = get_theme_mod('custom_logo');
                        $logo = wp_get_attachment_image_src($custom_logo_id);
                    }
                ?>	    
                <a class="home-header-top-brand" href="index.html">
                <img class="home-header-top-brand-img" src="<?= $logo[0] ?>" alt="logo" >
                </a>
                
                <button class="home-header-top-themeswitch home-header-top-themeswitch-desktop"><span class="home-header-top-themeswitch-circle"><i class="fa fa-sun fa-theme"></i></span></button>
                <button class="home-header-top-btnNav">
                    <span class="home-header-top-btnNav-l1"></span>
                    <span class="home-header-top-btnNav-l2"></span>
                    <span class="home-header-top-btnNav-l3"></span>
            </button>

        </div>
           
	    <nav class="home-header-nav" >
        
                <?php 
                    wp_nav_menu(
                        array(
                            'menu' => 'primary',
                            'container' => '',
                            'theme_location' => 'primary',
                            'items_wrap' => '<ul id="" class="home-header-nav-menu">%3$s</ul> '
                        )
                    );
                ?>

        <button class="home-header-top-themeswitch home-header-top-themeswitch-mobile"><span class="home-header-top-themeswitch-circle"><i class="fa fa-sun fa-theme"></i></span></button>
		</nav>
    </header>