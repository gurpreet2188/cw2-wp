
<?php get_header()?>

		<div class="home-body">
			<div class="home-body-promos">
			<div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
				<div class="carousel-indicators">
					<button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
					<button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
					<button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
					</div>
					<?php 
					cw2_custom_carousel();
					?>
			</div>
			</div>

			<div class="home-body-all">
				<?php 
				cw2_shop_common_posts ('Deals', 3, 'promo');
				?>

				<div class="home-body-all-events">
					<div class="home-body-all-events-title">
						<h2>Events</h2>
					</div>

					<div id="events-carousel" class="carousel slide" data-bs-ride="carousel" data-bs-interval="false">
						<div class="carousel-indicators" style="z-index:200">
							<button type="button" data-bs-target="#events-carousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
							<button type="button" data-bs-target="#events-carousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
						</div>
								<?php 
								cw2_events_carousel(-1);
								?>
					</div>
					</div>
				</div>

				<?php 
				cw2_shop_common_posts ('Shops', 3, '');
				?>
		</div>
	
<?php get_footer()?>
	
