<?php
    /*
     Template Name: latest
    */
?>
<?php get_header()?>

<div class="latest">
    <div class="latest-title">
        <h2>What's New</h2>
    </div>
    <div class="latest-crumb">
        <a href="<?php echo site_url()?>">Home</a>
        <p> <i class="fa-solid fa-chevron-right"></i> </p>
        <p>What's New</p>
    </div>
    <div class="latest-cards">
        <div class="latest-cards-announcement">
            <div class="latest-cards-announcement-title">
                <a href="<?php echo site_url('/home/latest/announcement')?>" >Announcements <i class="fa fa-solid fa-chevron-right"></i></a>
            </div>
            <?php cw2_announcement_cards(4)?>
        </div>
        <div class="latest-cards-blog">
            <div class="latest-cards-blog-title">
                <a href="<?php echo site_url('/home/latest/blog')?>">Blog Posts <i class="fa fa-solid fa-chevron-right"></i></a>
            </div>
            <?php cw2_blog_cards(1)?>
    </div>
    </div>
</div>

<?php get_footer()?>