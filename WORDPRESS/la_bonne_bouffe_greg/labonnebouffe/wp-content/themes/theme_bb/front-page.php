<?php get_header(); ?>

	<?php echo showCategory(); ?>
	
	<?php if(have_posts()) : ?>

		<?php while(have_posts()) : the_post(); ?>
			<!-- debut contenu HMTL -->
			<h2><a href="<?php the_permalink(); ?>"><?php the_title() ?></a></h2>
			<div class="contenu">
				<?php the_content(); ?>
			</div>
			<!-- FIN contenu HTML -->
		<?php endwhile; ?>
	
	<?php endif; ?>

	
	
	
	


<?php get_footer(); ?>