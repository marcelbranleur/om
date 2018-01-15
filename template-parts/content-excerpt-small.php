<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Omforma
 */

?>

<div class="blog-post-img">
	<?php echo '<a href="' . esc_url( get_permalink() ) . '">'; ?>
	<?php if (has_post_thumbnail()) { ?>	
		<?php the_post_thumbnail('large', array('class' => 'img-fluid')); ?>
	<?php } ?>
	<?php	the_title( '<h3>', '</h3>' ); ?>	
	<?php echo '</a>'; ?>
</div>

