<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Omforma
 */

?>

<?php the_title( '<h1>', '</h1>' ); ?>

<?php if (has_post_thumbnail()) { ?>	
	<?php	the_post_thumbnail('large', array('class' => 'img-fluid w-100')); ?>
<?php }	?>

<?php the_content(); ?>
