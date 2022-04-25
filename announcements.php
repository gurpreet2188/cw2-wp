<?php
    /*
     Template Name: Announcements
    */
?>
<?php get_header()?>

<div class="announcement">
    <div class="announcement-crumb">
        <a href="<?php echo site_url()?>">Home</a>
        <p> <i class="fa-solid fa-chevron-right"></i> </p>
        <a href="<?php echo site_url('/home/latest')?>">What's New</a>
        <p> <i class="fa-solid fa-chevron-right"></i> </p>
        <p> Announcments </p>
    </div>
    <div class="announcement-title">
                <h2>Announcements</h2>
            </div>
    <div class="announcement-cards">
            <?php cw2_announcement_cards(4)?>
    </div>
</div>

<?php get_footer()?>