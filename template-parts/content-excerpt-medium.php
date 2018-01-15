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
	<p>
	<?php
		echo excerpt(50);
		echo '<a href="' . esc_url( get_permalink() ) . '" class="blog-link">Read more &rarr;</a>'; 
	?>
	</p>
</div>

