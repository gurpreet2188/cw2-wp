<?php
    /*
     Template Name: Help
    */
?>
<?php get_header()?>

<div class="about">
    <div class="about-title">
        <h2>About</h2>
    </div>
<div class="about-crumb">
        <a href="<?php echo site_url()?>">Home</a>
        <p> <i class="fa-solid fa-chevron-right"></i> </p>
        <a href="<?php echo site_url('/home/help')?>">Help</a>
        <p> <i class="fa-solid fa-chevron-right"></i> </p>
        <p>About</p>
    </div>

    <div class="about-mall">
        <div class="about-mall-desc">
            <h3>About Causeway Point Shopping Mall</h3>
                <p>In 2011, Causeway Point won a Green Mark Platinum Award by Building & Construction Authority. It was voted Best Suburban Mall by The Straits Times and awarded the Best A&P Effort Award by the Singapore Retailers Association in 2004. In 2015, it was also awarded the BCA Universal Design Mark Gold Plus award.</p>
            </div>
        <div class="about-mall-loc">
            <p><i class="fa-solid fa-location-dot"></i> 1 Woodlands Square Singapore 738099 </p>
            <?php 
            $wp_query =  new WP_Query(array('post_type'=>'post', 'post_status'=>'publish', 'posts_per_page'=>1));
            while ( $wp_query->have_posts() ) : $wp_query->the_post();
                the_post_thumbnail();
            endwhile; ?>
        </div>
        <div class="about-mall-add">
            <div class="about-mall-add-hours">
            <i class="fa fa-solid fa-clock"></i>
            <p>10.30am to 10.30pm</p>
            </div>
            <div class="about-mall-add-call">
            <i class="fa fa-solid fa-phone"></i>
            <p>(65) 6894 2237</p>
            </div>
            <div class="about-mall-add-cs">
                <i class="fa-solid fa-circle-question"></i>
                <p>L2: 10am to 10pm</p>
            </div>
            <div class="about-mall-add-nursing">
                <i class="fa-solid fa-baby"></i>
                <p>L1, L5 and L7</p>
            </div>
            <!-- <div class="about-mall-add-loc">
                <i class="fa-solid fa-location-dot"></i>
                <p>1 Woodlands Square Singapore 738099</p>
            </div> -->
            <div class="about-mall-add-atm">
                <i class="fa-solid fa-money-check-dollar"></i>
                <p>B1: POSB / AXS <br>
                L1: OCBC <br>
                L2: Citibank / Maybank
            </p>
            </div>
            <div class="about-mall-add-parking">
                <i class="fa fa-solid fa-car-side"></i>
                <p>Weekdays: 7am to 10:30pm <br>
                Weekends & PH: 7am to 12am<br>
                Firs Hour: $1.20 then $0.60
                </p>
            </div>
        </div>
    </div>

</div>

<?php get_footer()?>

