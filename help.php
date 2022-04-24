<?php
    /*
     Template Name: Help
    */
?>
<?php get_header()?>

<div class="help">
    <div class="help-crumb">
        <a href="<?php echo site_url()?>">Home</a>
        <p> <i class="fa-solid fa-chevron-right"></i> </p>
        <p>Help</p>
    </div>

    <div class="help-faq">
        <div class="help-faq-title">
            <h2>F.A.Qs</h2>
        </div>
        <div class="help-faq-cards">
            <?php cw2_faq_cards(4)?>
        </div>
    </div>

    <div class="help-contact">
        <h3>Have addional quries or want to give feedback ?</h3>
        <a href="<?php echo site_url('/home/help/contact-us')?>">Contact Us. <i class="fa fa-solid fa-chevron-right"></i></a>
    </div>
</div>

<?php get_footer()?>

