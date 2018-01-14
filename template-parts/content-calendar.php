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
	<div class="event">
		<?php
			if ( is_singular() ) :
				the_title( '<h2>', '</h2>' );
			else :
				the_title( '<h2><a href="' . esc_url( get_permalink() ) . '">', '</a></h2>' );
			endif;
		?>

		<?php if (has_post_thumbnail()) { ?>	
			<?php	the_post_thumbnail('large', array('class' => 'attachment-full')); ?>
		<?php }	?>

		<?php 
		$date = strtotime(CFS()->get('calendar_date'));
		$date_display = date_i18n('j F', $date);
		$place = CFS()->get('calendar_place');
		$time = CFS()->get('calendar_time');
		if($date_display) { echo '<div><span>Datum: </span>' . $date_display . '</div>'; }
		if($time) {	echo '<div><span>Tid: </span>' . $time . '</div>'; }
		if($place) {	echo '<div><span>Plats: </span>' . $place . '</div>'; }
		?>

		<?php the_content(); ?>

	</div>
</div>

<div class="comments">
<?php	if ( is_singular() ) { ?>
	<?php
		if ( comments_open() || get_comments_number() ) :
				comments_template();
		endif;
	?>
<?php } ?>
</div>
