<?php get_header(); ?>
<?php showCategoryByPostType('restaurant'); ?>

	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
	<div class="contenu"><?php $visuel = getImage(); //the_content(); ?>
	<a href="<?php the_permalink(); ?>">
				<span class="titre"><?php the_title(); ?></span><br>
				<?php echo $visuel; ?>
			</a>
	</div>
	<?php endwhile; else: ?>
	<p><?php _e('Sorry, no posts matched your criteria.','Astoned'); ?></p>
	 <?php endif; ?>
	 
<?php get_sidebar(); ?>
<?php get_footer(); ?>