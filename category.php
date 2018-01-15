<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Omforma
 */

get_header(); ?>

<main class="blog">
	<div class="container">
		<div class="row">
			<div class="col-lg-4 order-sidebar">
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
			<div class="col-lg-8 order-content">
				<?php // Blog posts 
					the_archive_title( '<h1 class="page-title">', '</h1>' );
					echo '<div class="blog-list">';
					if ( have_posts() ) {
						while ( have_posts() ) : the_post();
							get_template_part( 'template-parts/content-excerpt', get_post_format() );
						endwhile;
					}
					echo '</div>';
					?>
					<?php if(function_exists('load_more_button')) {
						load_more_button();
					} ?>
			</div>
		</div>
	</div>	
</main>

<?php
get_footer();
