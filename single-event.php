
<?php get_header()?>
   


<?php 
    if(have_posts() ) {
        ?> 
            <div class="evt">
            <div class="events-crumb">
                <a href="<?php echo site_url()?>">Home</a>
                <p> <i class="fa-solid fa-chevron-right"></i> </p>
                <a href="<?php echo site_url('/home/events/')?>">Events</a>
                
        <?php
        
        while ( have_posts() ) : the_post();
        $date_start = strtotime(get_post_meta( get_the_ID(), '_cw2_event_start', true ));
        $date_end = strtotime(get_post_meta( get_the_ID(), '_cw2_event_end', true ));
        ?>
                        <p> <i class="fa-solid fa-chevron-right"></i> </p>
                        <p><?php echo the_title(); ?></p>
                    </div>
                    <div class="evt-title">
                        <h2><?php echo the_title(); ?></h2>
                    </div>
                    
                    <div class="evt-img">
                        <?php the_post_thumbnail();?>
                    </div>
                    <div class="evt-date">
                    <p><i class="fa-solid fa-calendar-day"></i></i> <?php echo date('d M',$date_start).' - ' .date('d M', $date_end) ?></p>
                    <p><i class="fa-solid fa-location-dot"></i>&nbsp; <?php echo get_post_meta( get_the_ID(), '_cw2_event_venue', true )?>&nbsp;in Causeway Point Shopping Mall.</p>
                    </div>

                    <div class="evt-content">
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

