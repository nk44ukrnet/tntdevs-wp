<div class="hb-blog-loop__item">
	<?php if ( has_post_thumbnail() ) { ?>
		<a href="<?php echo get_the_permalink(); ?>" class="hb-blog-loop__featured">
			<?php the_post_thumbnail(); ?>
		</a>
	<?php } ?>
	<a href="<?php echo get_the_permalink(); ?>"
	   class="hb-blog-loop__title hb-subheading"><?php echo get_the_title(); ?></a>
	<div class="hb-blog-loop__content">
		<?php echo wp_trim_words( apply_filters( 'the_content', get_the_content() ), 25 ); ?>
	</div>
	<a href="<?php echo get_the_permalink(); ?>"
	   class="hb-blog-loop__more hb-cta hb-cta_colored"><?php esc_html_e( 'Read More', 'adw' ); ?></a>
</div>