<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */

get_header(); ?>

<main class="blog">
	<div class="container">
		<div class="row">
			<div class="col-md-4 order-sidebar">
				<div class="sidebar">
					<?php // Sidebar
					$instance = array(
	    			'dropdown' => 0,
	  			  'count'    => 0,
						'title'    => 'Blogg',
					);
					$args = array(
	  			  'before_title' => '<h4>',
	  			  'after_title' => '</h4>',
					);
					the_widget( 'WP_Widget_Categories', $instance, $args );
					?>
				</div>
			</div>
			<div class="col-md-8 order-content">
				<div class="blog-list">
				<?php // Blog posts
				if ( have_posts() ) {
					while ( have_posts() ) : the_post();
						get_template_part( 'template-parts/content-excerpt', get_post_format() );
					endwhile;
				}
				?>
				</div>
				<?php load_more_button(); ?>
			</div>
		</div>
	</div>
</main>

<?php get_footer(); ?>
