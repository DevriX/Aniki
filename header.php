<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Aniki
 */

?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="//gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

	<div id="page" class="site">
		<a class="skip-link screen-reader-text" href="#content">
			<?php esc_html_e( 'Skip to content', 'aniki' ); ?>
		</a>
		<div class="row">
			<div class="columns small-12">
				<header id="masthead" class="site-header">
					<div class="site-branding">
						<div class="site-logo">
							<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
							<div class="site-description">
								<?php $description = get_bloginfo( 'description', 'display' );
									if ( $description || is_customize_preview() ) : ?>
										<?php echo $description; /* WPCS: xss ok. */ ?><?php
									endif;
								?>
							</div>
						</div>
						<div class="site-search">
							<i class="fa fa-search"></i>
							<?php get_search_form(); ?>
						</div>
						<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><i class="fa fa-reorder"></i></button>
					</div>
					<!-- <div class="right-branding"> -->
					
					<?php if ( has_nav_menu( 'primary' ) ) : ?>
					<nav id="site-navigation" class="main-navigation">
						<div class="menu-primary-container">
							<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'primary-menu' ) ); ?>
						</div>
						<!-- .menu-primary-container -->
					</nav>
					<?php endif; ?>
						<!-- #site-navigation -->
					<!-- </div>		 -->
				</header>
			</div><!-- .small-12 -->
		</div>
		<!-- #site-header -->
		<div id="content" class="site-content">
