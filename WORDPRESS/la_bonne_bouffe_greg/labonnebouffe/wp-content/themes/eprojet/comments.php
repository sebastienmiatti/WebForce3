
<div id="comments">
	<?php if ( have_comments() ) :     echo get_comments_number();	endif; ?> commentaire(s).<br>

		
			

		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // are there comments to navigate through ?>
        <nav>
			<?php _e( 'Comment navigation', 'eprojet' ); ?>
			<?php previous_comments_link( __( '&larr; Older Comments', 'eprojet' ) ); ?>
			<?php next_comments_link( __( 'Newer Comments &rarr;', 'eprojet' ) ); ?>
		</nav>
	<?php endif; ?>

       <?php wp_list_comments();?>
        
	<?php if ( comments_open() ) : ?>
		<?php comment_form(array('comment_notes_after' => ' ')); ?>
	<?php elseif ( have_comments() ) : ?>
		<?php _e( 'Comments are closed.', 'eprojet' ); ?>
	<?php endif; ?>

</div><!-- #comments -->