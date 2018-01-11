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

	<?php	the_title( '<h4>', '</h4>' ); ?>	

	<?php if (has_post_thumbnail()) { ?>	
		<?php the_post_thumbnail('large', array('class' => 'img-fluid w-100')); ?>
		<?php echo '<a href="' . esc_url( get_permalink() ) . '" class="blog-link">Read more &rarr;</a>'; ?> 			
	<?php }	else { ?>
		<p>
		<?php
			echo excerpt(50);
			echo '<a href="' . esc_url( get_permalink() ) . '" class="blog-link">Read more &rarr;</a>'; 
		?>
		</p>
	<?php } ?>

</div>

