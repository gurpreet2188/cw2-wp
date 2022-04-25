
<?php get_header()?>
   


<?php 
    if(have_posts() ) {
        ?> 
            <div class="shp">
            <div class="events-crumb">
                <a href="<?php echo site_url()?>">Home</a>
                <p> <i class="fa-solid fa-chevron-right"></i> </p>
                <a href="<?php echo site_url('/home/shops')?>">Shops</a>
                
        <?php
        
        while ( have_posts() ) : the_post();
        ?>
                        <p> <i class="fa-solid fa-chevron-right"></i> </p>
                        <p><?php echo the_title(); ?></p>
                    </div>
                    <div class="shp-title">
                        <h2>
                            Shop: <?php echo the_title(); ?>
                        </h2>
                    </div>
                    <div class="shp-content">
                        <div class="shp-content-inner">
                            <div class="shp-content-img">
                                <?php the_post_thumbnail();?>
                            </div>
                            <div class="home-body-all-container-posts-post-content-title">
                                <h2><?php echo get_post_meta( get_the_ID(), '_cw2_shop_promo', true )? get_post_meta( get_the_ID(), '_cw2_shop_promo', true ) : "Current there are no promotions." ?></h2>
                            </div>
                            <div class="shp-excerpt">
                                <p>
                                    <!-- <?php the_content();?> -->
                                </p>
                            </div>
                        </div>

                        <div class="shp-content-title">
                            <h2><?php echo the_title(); ?></h2>
                        </div>

                        <div class="shp-content-loc">
                            <i class="fa fa-solid fa-location-dot"></i>
                            <p><?php echo get_post_meta( get_the_ID(), '_cw2_shop_find', true );?></p>
                        </div>
        
                        <div class="shp-content-call">
                            <i class="fa-solid fa-phone"></i>
                            <p><?php echo get_post_meta( get_the_ID(), '_cw2_shop_contact', true ); ?></p>
                        </div>
        
                        <div class="shp-content-hours">
                            <i class="fa-solid fa-clock"></i>
                            <p><?php  echo get_post_meta( get_the_ID(), '_cw2_shop_open', true ); ?>
                            -
                            <?php echo get_post_meta( get_the_ID(), '_cw2_shop_close', true );?></p>
                        </div>
    
                    </div>
                    
                    

                <?php
            
        endwhile;

        ?> 
            </div>
        <?php
    }
?> 

<?php get_footer()?>

