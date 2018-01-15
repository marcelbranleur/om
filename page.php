<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Omforma
 */

get_header(); ?>

<main class="blog">
	<div class="container">
		<div class="row">

			<?php // Check if there are any sidebars
			ob_start();
			dynamic_sidebar('sidebar-sidebar');
			dynamic_sidebar('sidebar-widgets');
			$has_sidebar = ob_get_clean();
			if($has_sidebar) { ?>
				<div class="col-lg-4 order-sidebar">

					<?php // Check if there's a menu sidebar  
					ob_start();
					dynamic_sidebar('sidebar-sidebar');
					$sidebar_sidebar = ob_get_clean();
					if($sidebar_sidebar) { ?>
						<div class="col">
							<div class="sidebar">
								<?php print $sidebar_sidebar; ?>
							</div>
						</div>
					<?php } ?>

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
				<div class="col-lg-8 order-content">
				<?php } else { ?>
					<div class="col-lg-8 offset-lg-2">
				<?php } ?>
					<div class="page-content">
						<?php // Page content
							while ( have_posts() ) : the_post();
							get_template_part( 'template-parts/content', 'page' );
							endwhile;
						?>
					</div>
				</div>
		</div>
	</div>
</main>

<?php
get_footer();
