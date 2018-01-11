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
					<h4>Kalender</h4>
					<?php
					$today = date('Ymd');
					$args = array(
						'post_type' => 'calendar',
						'post_status' => 'publish',
						'posts_per_page' => 6, 
						'meta_key' => 'calendar_date',
						'orderby' => 'meta_value_num',
						'order' => 'ASC',
						'meta_query' => array(
							'key' => 'date',
							'value' => $today,
							'compare' => '>='
						)
					);
					$query = new WP_Query($args);
					if($query->have_posts()) {
						echo '<ul>';
							while($query->have_posts()) {
								$query->the_post();
								echo '<li>';
								echo '<a href="' . get_permalink() . '">';
								$date = strtotime(CFS()->get('calendar_date'));
								$date_display = date_i18n('d/m/Y', $date);
								echo '<h6>' . $date_display . '</h6>';
								echo '<p>' . get_the_title() . '</p>';
								echo '</a>';
								echo '</li>';
							}
						echo '</ul>';
					}
					wp_reset_postdata();
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
