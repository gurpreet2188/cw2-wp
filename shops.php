<?php
    /*
     Template Name: Shops
    */
?>
<?php get_header()?>

<div class="shops">

    <div class="shops-search">
        <div class="shops-search-category">
            <div class="shops-search-category-title">
                <h2>Find Shops by category</h2>
            </div>
            <div class="shops-search-category-container">
                <button class="utensils">
                <i class="fa fa-solid fa-utensils"></i>
                </button>
                <button class="shirt"> 
                <i class="fa fa-solid fa-shirt"></i>
                </button>
                <button class="running">
                <i class="fa fa-solid fa-person-running"></i>
                </button>
                <button class="laptop">
                <i class="fa fa-solid fa-laptop"></i>
                </button>
                <button class="shopping">
                <i class="fa fa-solid fa-cart-shopping"></i>
                </button>
                <button class="film">
                <i class="fa-solid fa-film"></i>
                </button>
            </div>
        </div>
        <div class="shops-search-manual">
            <div class="shops-search-manual-title">
                <h2>Or simply search.</h2>
            </div>
            <div class="shops-search-manual-input">
                <input type="text" placeholder="For e.g; food">
            </div>
        </div>
    </div>
    <div class="shops-list">
        <div class="shops-list-container">
            <div class="shops-list-container-title">
                <h2>All Shops</h2>
            </div>
            <div class="shops-list-container-cards">
                    <?php cw2_shop_cards(-1) ?>
            </div>

            <div class="shops-list-container-cards-more">
                <button>Load More</button>
            </div>

        </div>
    </div>

    <!-- <?php 
    cw2_search('a');
    ?> -->
    
</div>

<?php get_footer()?>