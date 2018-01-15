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

<header class="header">
	<div class="container">
		<div class="row">
			<div class="slider-wrapper">
				<div class="col-lg-4">
          <div class="col-slider">
            <div id="carouselExampleControls1" class="carousel slide" data-ride="carousel">
               <div class="carousel-inner">
								<?php
									if(function_exists('CFS')) {

									$loop = CFS()->get( 'slider_slide' );
									$length = count($loop);
									for($i = 0; $i < $length; $i++) {
										if($i == 0) {
											echo '<div class="carousel-item active">';
										} else {
											echo '<div class="carousel-item">';
										}
 									 	$attachment_id = $loop[$i]['slider_bild'];
										echo wp_get_attachment_image( $attachment_id, 'slider', "", array("class" => "d-block w-100 img-fluid slide-img"));
 										echo '<p class="slide-text">' . $loop[$i]['slider_text'];
 										echo ' <a href="' . $loop[$i]['slider_link']['url'] . '">Read more &rarr;</a></p>';
										echo '</div>';	
										}
									}
							?>
							</div>
              <a class="carousel-control-prev" href="#carouselExampleControls1" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"><i class="fa fa-chevron-left"></i></span>
                <span class="sr-only">Previous</span>
              </a>
              <a class="carousel-control-next" href="#carouselExampleControls1" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"><i class="fa fa-chevron-right"></i></span>
                <span class="sr-only">Next</span>
              </a>
            </div>
         </div>
      </div>

      <div class="col-lg-4">
        <div class="col-slider">
          <div id="carouselExampleControls2" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
							<?php
								if(function_exists('CFS')) {
								$loop = CFS()->get( 'slider2_slide' );
								$length = count($loop);
								for($i = 0; $i < $length; $i++) {
									if($i == 0) {
										echo '<div class="carousel-item active">';
									} else {
										echo '<div class="carousel-item">';
									}
 									$attachment_id = $loop[$i]['slider2_bild'];
									echo wp_get_attachment_image( $attachment_id, 'slider', "", array("class" => "d-block w-100 img-fluid slide-img"));
 									echo '<p class="slide-text">' . $loop[$i]['slider2_text'];
 									echo ' <a href="' . $loop[$i]['slider2_link']['url'] . '">Read more &rarr;</a></p>';
									echo '</div>';	
									}
								}
							?>
							</div><!-- /carousel-inner -->
              <a class="carousel-control-prev" href="#carouselExampleControls2" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"><i class="fa fa-chevron-left"></i></span>
                <span class="sr-only">Previous</span>
              </a>
              <a class="carousel-control-next" href="#carouselExampleControls2" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"><i class="fa fa-chevron-right"></i></span>
                <span class="sr-only">Next</span>
              </a>
            </div>
         </div>
      </div>

			<div class="col-lg-4">
        <div class="col-slider">
          <div id="carouselExampleControls3" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
							<?php
							if(function_exists('CFS')) {
								$loop = CFS()->get( 'slider3_slide' );
								$length = count($loop);
								for($i = 0; $i < $length; $i++) {
									if($i == 0) {
										echo '<div class="carousel-item active">';
									} else {
										echo '<div class="carousel-item">';
									}
 								  $attachment_id = $loop[$i]['slider3_bild'];
									echo wp_get_attachment_image( $attachment_id, 'slider', "", array("class" => "d-block w-100 img-fluid slide-img"));
 									echo '<p class="slide-text">' . $loop[$i]['slider3_text'];
 									echo ' <a href="' . $loop[$i]['slider3_link']['url'] . '">Read more &rarr;</a></p>';
									echo '</div>';	
								}
							}
							?>
						</div>
            <a class="carousel-control-prev" href="#carouselExampleControls3" role="button" data-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"><i class="fa fa-chevron-left"></i></span>
              <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleControls3" role="button" data-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"><i class="fa fa-chevron-right"></i></span>
              <span class="sr-only">Next</span>
            </a>
					</div>
        </div>
      </div>
			</div>
		</div>
	</div>
<header>

<section class="section-blog">
	<div class="container">
		<div class="row">
			<div class="col">
        <a href="/blogg"><h2 class="heading-primary text-left">Blogg</h2></a>
     	</div>
    </div>
		<div class="row">
			<div class="blog-wrapper">
				<div class="col-lg-8">
					<?php // First bloggpost
						$args = array(
						'post_type' => 'post',
						'posts_per_page' => 1, 
						'offset'=> 0, 
						);
						$query = new WP_Query($args);
						while($query->have_posts()) {
							$query->the_post();
							get_template_part('template-parts/content','excerpt-large', get_post_format());
						}
						wp_reset_postdata();
					?>
				</div>

				<?php // The calendar ?>
				<div class="col-lg-4">
   				<div class="calendar">
    		 		<h3 class="text-center"><i class="fa fa-calendar-o" aria-hidden="true"></i> KALENDER</h3>
						<?php
							$today = date('Ymd');
							$args = array(
								'post_type' => 'calendar',
								'post_status' => 'publish',
								'posts_per_page' => 6, 
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
						<a href="/calendar">Se kalender &rarr;</a>
					</div>
				</div>
			</div>
		</div>

		<div class="row">
			<div class="blog-excerpts-wrraper">
				<?php // Blog posts 2 and 3
				$args = array(
					'post_type' => 'post',
					'posts_per_page' => 2, 
					'offset'=> 1, 
				);
				$query = new WP_Query($args);
				while($query->have_posts()) {
					$query->the_post();
					if($query->current_post === 0) {
						echo "<div class='col-lg-4'>";
						get_template_part( 'template-parts/content','excerpt-small', get_post_format() );
						echo "</div>";
					} else {
						echo "<div class='col-lg-8'>";
						get_template_part( 'template-parts/content','excerpt-medium', get_post_format() );
						echo "</div>";
					}
				}
				wp_reset_postdata();
				?>
			</div>
		</div>
		<div class="row">
			<div class="blog-excerpts-wrraper">

				<?php // Blog posts 4 and 5
				$args = array(
					'post_type' => 'post',
					'posts_per_page' => 2, 
					'offset'=> 3, 
				);
				$query = new WP_Query($args);
				while($query->have_posts()) {
					$query->the_post();
					if($query->current_post === 0) {
						echo "<div class='col-lg-8'>";
						get_template_part( 'template-parts/content','excerpt-medium', get_post_format() );
						echo "</div>";
					} else {
						echo "<div class='col-lg-4'>";
						get_template_part( 'template-parts/content','excerpt-small', get_post_format() );
						echo "</div>";
					}
				}
				wp_reset_postdata();
			?>

			</div>
		</div>
	</div>
</section>

<?php 
get_footer();
