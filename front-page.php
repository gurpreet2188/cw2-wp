
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
				cw2_shop_common_posts ('Deals', 8, 'promo');
				?>

				<div class="home-body-all-events">
					<div class="home-body-all-events-title">
						<h2>Events</h2>
					</div>

					<div id="events-carousel" class="home-body-all-events-carousel carousel slide" data-bs-ride="carousel" data-bs-interval="false">
						<!-- <div class="home-body-all-events-indicators carousel-indicators" style="z-index:200">
							<button type="button" data-bs-target="#events-carousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
							<button type="button" data-bs-target="#events-carousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
						</div> -->
								<?php 
								cw2_events_carousel(-1);
								?>
						<a class="home-body-all-events-control carousel-control-prev" href="#events-carousel" role="button" data-bs-slide="prev">
							<span class="home-body-all-events-control-prev carousel-control-prev-icon" aria-hidden="true"></span>
							<span class="sr-only">Previous</span>
						</a>
						<a class="home-body-all-events-control carousel-control-next" href="#events-carousel" role="button" data-bs-slide="next">
							<span class="home-body-all-events-control-next carousel-control-next-icon" aria-hidden="true"></span>
							<span class="sr-only">Next</span>
						</a>
					</div>
					<div class="home-body-all-events-more">
						<a href="<?php echo site_url('home/events/')?>">More Events <i class="fa fa-solid fa-chevron-right"></i></a>
					</div>
				</div>
				<?php 
				cw2_shop_common_posts ('Shops', 7, '');
				?>
				</div>

			<div class="home-bktop">
				<button class="home-bktop-btn">Scroll to Top &nbsp;&nbsp;<i class="fa-solid fa-arrow-up"></i></button>
			</div>

		</div>
	
<?php get_footer()?>
	
