<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Omforma
 */

get_header(); ?>

<main class="content">
	<div class="container">
		<div class="row">
			<div class="col-md-4 order-sidebar">

				<div class="col">
					<div class="sidebar">
						<?php // Sidebar
						$instance = array(
	    				'dropdown' => 0,
	  				  'count'    => 0,
							'title'    => 'Kategorier',
						);
						$args = array(
	  				  'before_title' => '<h4>',
	  				  'after_title' => '</h4>',
						);
						the_widget( 'WP_Widget_Categories', $instance, $args );
						?>
					</div>
				</div>

				<?php // Check if there's a widget sidebar
				ob_start();
				dynamic_sidebar('sidebar-widgets');
				$sidebar_widgets = ob_get_clean();
				if($sidebar_widgets) { ?>
					<div class="col">
						<div class="sidebar-widget">
							<?php print $sidebar_widgets; ?>
						</div>
					</div>
				<?php } ?>

			</div>
			<div class="col-md-8 order-content">
				<?php
				while ( have_posts() ) : the_post();
					get_template_part( 'template-parts/content', get_post_type() );
				endwhile;
				?>
			</div>
		</div>
	</div>
</main>

<?php
get_footer();
