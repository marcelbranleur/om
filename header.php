<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Omforma
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta http-equiv="X-UA-Compatible" content="IE=10">
  <meta http-equiv="x-ua-compatible" content="ie=edge"> 
	<link rel="profile" href="http://gmpg.org/xfn/11">

  <!--[if lt IE 9]>
  <script src="//cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.2/html5shiv.min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/respond.js/1.4.2/respond.js"></script>
  <![endif]-->

  <link rel="shortcut icon" type="image/png" href="<?php echo get_home_url();?>/wp-content/themes/om/src/img/favicon1.png">

	<?php wp_head(); ?>
</head>

<body>

		<nav class="navbar navbar-expand-lg navbar-light fixed-top">
			<a href="<?php echo get_home_url(); ?>" class="navbar-brand"><img src="<?php echo get_home_url();?>/wp-content/themes/om/src/img/logo.png" class="img-fluid"></a>
    	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

		<div class="collapse navbar-collapse" id="navbarTogglerDemo02">
		<a href="<?php echo get_home_url(); ?>/english" class="english">Summary in english <i class="fa fa-globe" aria-hidden="true"></i></a>
		<?php
				wp_nav_menu( array(
					'theme_location' => 'menu-1',
					'menu_id'        => 'header-menu',
					'menu_class'		=> 'navbar-nav ml-auto mt-2 mt-lg-0',
					'container'			=> null,						
				) );
			?>
		</nav><!-- #site-navigation -->
