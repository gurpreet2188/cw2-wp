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
    <div class="home">

        <div class="home-announcement">
            <div class="home-announcement-container">
                <i class="fa fa-solid fa-bullhorn"></i>
                <?php cw2_announcement(1)?>
                <button class="close-sticky"><i class="fa fa-solid fa-xmark"></i></button>
            </div>
        </div>
   
    <header class="home-header">
        <div class="home-header-top">
        <a class="home-header-top-brand-mobile" href="#">
               <?php logoSvg()?>
                </a>
                <div class="home-header-top-empty">
                    
                </div>
       
                <div class="home-header-top-info">
                    <div>
                    <i class="fa fa-thin fa-clock "></i> <p>10:00 am- 10:00pm</p>
                    </div>
                    <div>
                    <i class="fa fa-thin fa-phone"></i> <p>(65) 6894 2237</p>
                    </div>
                </div>
                <div class="home-header-top-themeswitch-desktop">
                    <!-- <a href=""><span><i class="fa fa-sun"></i></span> <p class="home-header-top-themeswitch-company">FrX</p></a> -->
                
                   
                    <p class="home-header-top-themeswitch-text">Dark Mode</p>
                    <button class="home-header-top-themeswitch"><span class="home-header-top-themeswitch-circle"><i class="fa fa-sun fa-theme"></i></span></button>
                </div>
                

                <button class="home-header-top-btnNav">
                    <span class="home-header-top-btnNav-l1"></span>
                    <span class="home-header-top-btnNav-l2"></span>
                    <span class="home-header-top-btnNav-l3"></span>
            </button>

        </div>
           
	    <nav class="home-header-nav" >
        <?php 
                    if(function_exists('the_custom_logo')) {
                        // the_custom_logo();
                        // $custom_logo_id = get_theme_mod('custom_logo');
                        // $logo = wp_get_attachment_image_src($custom_logo_id);
                    }
                ?>	    
                <a class="home-header-nav-brand-desktop" href="#">
               <?php logoSvg()?>
                </a>
                
            <div class="home-header-nav-container">
               
                <?php 
                    wp_nav_menu(
                        array(
                            'menu' => 'pri-menu',
                            'container' => '',
                            'theme_location' => 'primary',
                            'items_wrap' => '<ul id="" class="home-header-nav-container-menu">%3$s</ul> '
                        )
                    );
                ?>
            </div>

            <div class="home-header-nav-container-mobile">
               
               <?php 
                   wp_nav_menu(
                       array(
                           'menu' => 'sec-menu',
                           'container' => '',
                           'theme_location' => 'primary',
                           'items_wrap' => '<ul id="" class="home-header-nav-container-menu">%3$s</ul> '
                       )
                   );
               ?>
           </div>
                
            <div class="home-header-top-themeswitch-mobile">
                    <!-- <a href=""><span><i class="fa fa-sun"></i></span> <p class="home-header-top-themeswitch-company">FrX</p></a> -->
                
                   
                    <p class="home-header-top-themeswitch-text">Dark Mode</p>
                    <button class="home-header-top-themeswitch"><span class="home-header-top-themeswitch-circle"><i class="fa fa-sun fa-theme"></i></span></button>
                </div>
        
    </nav>

    </header>