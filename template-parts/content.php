<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Omforma
 */

?>

<div class="blog-post-full">
	<?php the_title( '<h3>', '</h3>' ); ?>

	<?php the_content(); ?>

</div>

<?php	if ( is_singular() ) { ?>
	<?php
		if ( comments_open() || get_comments_number() ) :
			echo '<div class="comments">';
				comments_template();
			echo '</div>';
		endif;
	?>
<?php } ?>
