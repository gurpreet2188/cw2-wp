<?php
    /*
     Template Name: Blog
    */
?>
<?php get_header()?>

<div class="blog">
    <div class="blog-crumb">
        <a href="<?php echo site_url()?>">Home</a>
        <p> <i class="fa-solid fa-chevron-right"></i> </p>
        <a href="<?php echo site_url('/home/latest')?>">What's New</a>
        <p> <i class="fa-solid fa-chevron-right"></i> </p>
        <p> Blog </p>
    </div>
    <div class="blog-title">
                <h2>Blog Posts</h2>
            </div>
    <div class="blog-cards">
            <?php cw2_blog_cards(4)?>
    </div>
</div>

<?php get_footer()?>