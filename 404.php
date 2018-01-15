<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package Omforma
 */

get_header(); ?>

<main class="blog">
	<div class="container">
		<div class="row">
			<div class="col-lg-8 offset-lg-2">
				<div class="page-content">

					<h1 class="page-title"><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'omforma' ); ?></h1>

					<p><?php esc_html_e( 'It looks like nothing was found at this location.', 'omforma' ); ?></p>

				</div>
			</div>
		</div>
	</div>
</main>

<?php
get_footer();
