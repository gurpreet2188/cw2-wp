<?php
    /*
     Template Name: Events
    */
?>
<?php get_header()?>

<div class="events">
<div class="about-title">
        <h2>Events</h2>
    </div>
    <div class="events-crumb">
        <a href="<?php echo site_url()?>">Home</a>
        <p> <i class="fa-solid fa-chevron-right"></i> </p>
        <p>Events</p>
    </div>

    <div class="events-cards">
        <?php cw2_events_cards(4)?>
    </div>
</div>

<?php get_footer()?>

