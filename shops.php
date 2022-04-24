<?php
    /*
     Template Name: Shops
    */
?>
<?php get_header()?>

<div class="shops">
    <div class="shops-title">
        <h1>Shops</h1>
    </div>
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
            <form name ="cw2-search-shop" class="shops-search-manual-input-form" action="cw2_search" id="cw2-search-shop" action="" method="post">
                <button name="cw2-search-shop-submit" type="submit" id="cw2-search-shop-submit"><i class="fa fa-solid fa-magnifying-glass"></i></button>
                <input name="cw2-search-shop-value" type="text" placeholder="For e.g; food">
                <button name="cw2-search-shop-submit" type="submit" id="cw2-search-shop-submit"><i class="fa-solid fa-chevron-right"></i></button>
            </form>
            </div>
        </div>
    </div>
    <div class="shops-list">
        <div class="shops-list-container">
        <?php cw2_shop_cards(NULL, 'All Shops', 6) ?>

            <div class="shops-list-container-cards-more">
                <button>Load More</button>
            </div>

        </div>
    </div>
    
</div>

<?php get_footer()?>