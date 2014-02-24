<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package Alpha West
 */
?><html <?php language_attributes(); ?>>
	<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	
	<title><?php wp_title( '|', true, 'right' ); ?></title>
	
		<link rel="profile" href="http://gmpg.org/xfn/11">
		<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

		<link rel="dns-prefetch" href="//www.google-analytics.com">
		<link rel="shortcut icon" href="<?php echo get_stylesheet_directory_uri(); ?>/favicon.ico">
		<link rel="icon" href="<?php echo get_stylesheet_directory_uri(); ?>/favicon.ico" type="image/x-icon">

		<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/stylesheets/app.css" />
		<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/stylesheets/foundation-icons.css" />

		<!--[if lt IE 9]>
			<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/stylesheets/ie8.css" />
		<![endif]-->

		<!--[if lt IE 9]>
		  <script src="//cdnjs.cloudflare.com/ajax/libs/html5shiv/3.6.2/html5shiv.js"></script>
		  <script src="//s3.amazonaws.com/nwapi/nwmatcher/nwmatcher-1.2.5-min.js"></script>
		  <script src="//html5base.googlecode.com/svn-history/r38/trunk/js/selectivizr-1.0.3b.js"></script>
		  <script src="//cdnjs.cloudflare.com/ajax/libs/respond.js/1.1.0/respond.min.js"></script>
          <script src="<?php echo get_template_directory_uri(); ?>/js/rem.min.js"></script>

		<![endif]-->
		
		<?php wp_head(); ?>
		<?php flush(); ?>
            
</head>
<body <?php body_class(); ?>>
<div id="page" class="hfeed site">

	<header id="masthead" class="site-header" role="banner">

				<nav class="top-bar" data-topbar data-magellan-expedition="fixed"  role="nav">

				 <ul class="title-area">
				    <li class="toggle-topbar menu-icon"><a href="#">Menu</a></li>
				  </ul>				  
				  
				  <section class="top-bar-section">
				       <?php foundation_top_bar_l(); ?>
				  </section>
				  
				</nav>
			
	</header><!-- #masthead -->

	<div id="content" class="site-content">
