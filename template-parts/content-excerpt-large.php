<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Omforma
 */

?>

<div class="blog-post">
	<?php	the_title( '<h3>', '</h3>' ); ?>	
	<?php if (has_post_thumbnail()) { ?>	
		<?php the_post_thumbnail('large', array('class' => 'attachment-thumbnail img-fluid')); ?>
	<?php }	?>

	<p>
	<?php
		echo excerpt(60);
		echo '<a href="' . esc_url( get_permalink() ) . '" class="blog-link">Read more &rarr;</a>'; 
	?>
	</p>
</div>

