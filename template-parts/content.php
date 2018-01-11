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

	<?php if (has_post_thumbnail()) { ?>	
		<?php	the_post_thumbnail('large', array('class' => 'attachment-full')); ?>
	<?php }	?>

	<?php the_content(); ?>

</div>

<?php	if ( is_singular() ) { ?>
	<?php
		if ( comments_open() || get_comments_number() ) :
				comments_template();
		endif;
	?>
<?php } ?>
