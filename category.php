<?php
get_header();
?>

	<div class="hb-blog-loop hb-bg-dark hb-color-light">
		<div class="hb-container hb-container1">

			<h1><?php echo single_cat_title('', false);; ?></h1>

			<?php
			if ( have_posts() ) {
				?>
				<div class="hb-blog-loop__holder">
					<?php
					while ( have_posts() ) {
						the_post();

						get_template_part('partials/blog-loop-item');

					} ?>
				</div>
			<?php } ?>

			<?php
			if ( paginate_links() ) {
				?>
				<div class="hb-container1 hb-pagination">
					<?php echo paginate_links(); ?>
				</div>
				<?php
			}
			?>


		</div>
	</div>


<?php
get_footer();