
<?php get_header()?>
   


<?php 
    if(have_posts() ) {
        ?> 
            <div class="blg">
            <div class="events-crumb">
                <a href="<?php echo site_url()?>">Home</a>
                <p> <i class="fa-solid fa-chevron-right"></i> </p>
                <a href="<?php echo site_url('/home/latest/blog')?>">Blog</a>
                
        <?php
        
        while ( have_posts() ) : the_post();
        ?>
                        <p> <i class="fa-solid fa-chevron-right"></i> </p>
                        <p><?php echo the_title(); ?></p>
                    </div>
                    <div class="blg-title">
                        <h2><?php echo the_title(); ?></h2>
                    </div>
                    <div class="blg-date">
                    <?php echo get_the_date() ?>
                    </div>
                    
                    <div class="blg-img">
                        <?php the_post_thumbnail();?>
                    </div>

                    <div class="blg-content">
                        <p>
                            <?php the_content();?>
                        </p>
                    </div>

                <?php
            
        endwhile;

        ?> 
            </div>
        <?php
    }
?>

  

<?php get_footer()?>

