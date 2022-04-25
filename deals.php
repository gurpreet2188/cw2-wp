<?php
    /*
     Template Name: Deals
    */
?>
<?php get_header()?>

<div class="deal">
<div class="deal-title">
        <h2>Deals</h2>
    </div>
    <div class="deal-crumb">
        <a href="<?php echo site_url()?>">Home</a>
        <p> <i class="fa-solid fa-chevron-right"></i> </p>
        <p>Deals</p>
    </div>

    <div class="deal-cards">
        <?php cw2_deal_page_posts('Deals', 7, 'promo')?>
    </div>
</div>

<?php get_footer()?>

