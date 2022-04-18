
<?php get_header()?>

		<div class="home-body">
			<div class="home-body-promos">
			
				<?php 
					cw2_custom_carousel();
				?>
			</div>

			<article class="home-body-all">
				<?php 
					cw2_custom_post("Hot Deals!!","deals", 4);
				?>
				<?php 
					cw2_custom_post("What's New.","articles", 4);
				?>
			</article>

		</div>
	
<?php get_footer()?>
	
