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
				<div class="col">
					<div class="sidebar">
					<h4>Kalender</h4>
					<?php
					$today = date('Ymd');
					$args = array(
						'post_type' => 'calendar',
						'post_status' => 'publish',
						'posts_per_page' => 999, 
						'meta_key' => 'calendar_date',
						'orderby' => 'meta_value',
						'order' => 'ASC',
						'meta_query' => array(
							'key' => 'calendar_date',
							'value' => $today,
							'compare' => '>=',
							'type' => 'DATE',
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
			<div class="col-lg-8 order-content">

			<?php
				$today = date('Ymd');
				$args = array(
					'post_type' => 'calendar',
					'post_status' => 'publish',
					'posts_per_page' => 999, 
					'meta_key' => 'calendar_date',
					'orderby' => 'meta_value',
					'order' => 'ASC',
					'meta_query' => array(
						'key' => 'calendar_date',
						'value' => $today,
						'compare' => '>=',
						'type' => 'DATE',
					)
				);
				query_posts($args);
				if(have_posts()) {
					while ( have_posts() ) : the_post();
						get_template_part( 'template-parts/content-calendar', get_post_format() );
						endwhile;
				} else {
					get_template_part( 'template-parts/content-calendar', 'empty' );
				} ?>
			</div>

		</div>
	</div>	
</main>

<?php
get_footer();
