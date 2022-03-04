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
	<?php if ( is_singular() && pings_open( get_queried_object() ) ) : ?>
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<?php endif; ?>
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<?php
    if ( function_exists( 'wp_body_open' ) ) {
        wp_body_open();
    }
    ?>

	<div id="page" class="site">
		<a class="skip-link screen-reader-text" href="#content"><?php _e( 'Skip to content', 'aniki' ); ?></a>
		<div class="row">
			<div class="columns small-12">
				<header id="masthead" class="site-header">
					<div class="site-branding">
						<div class="site-logo">
							<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
							<?php $aniki_description = get_bloginfo( 'description', 'display' ); ?>
							<?php if ( $aniki_description || is_customize_preview() ) : ?>
								<div class="site-description">
									<p><?php echo esc_html( $aniki_description ); ?></p>
								</div>
							<?php endif; ?>
						</div>
						<div class="site-search">
							<i class="fas fa-search"></i>
							<?php get_search_form(); ?>
						</div>
						<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><i class="fas fa-bars"></i></button>
					</div>
					<!-- <div class="right-branding"> -->
					
					<?php if ( has_nav_menu( 'primary' ) ) : ?>
					<nav id="site-navigation" class="main-navigation">
						<div class="menu-primary-container">
							<?php
							wp_nav_menu(
								array(
									'theme_location' => 'primary',
									'menu_id'        => 'primary-menu',
								)
							);
							?>
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
