<?php
/**
 * Kundeling Tatsak theme functions.
 *
 * @package Kundeling_Tatsak
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // No direct access.
}

if ( ! defined( 'KUNDELING_VERSION' ) ) {
	define( 'KUNDELING_VERSION', '1.0.0' );
}

/**
 * Theme setup: supported features, menus, image sizes.
 */
function kundeling_setup() {
	add_theme_support( 'title-tag' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'automatic-feed-links' );
	add_theme_support(
		'html5',
		array( 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption', 'style', 'script' )
	);
	add_theme_support(
		'custom-logo',
		array(
			'height'      => 64,
			'width'       => 64,
			'flex-height' => true,
			'flex-width'  => true,
		)
	);

	// Primary navigation (matches the static site's top nav).
	register_nav_menus(
		array(
			'primary' => __( 'Primary Navigation', 'kundeling-tatsak' ),
		)
	);

	// Image size used by the news listing thumbnails (16:10-ish).
	add_image_size( 'kundeling-news', 560, 350, true );
}
add_action( 'after_setup_theme', 'kundeling_setup' );

/**
 * Enqueue fonts, the shared design system, and shared scripts.
 */
function kundeling_assets() {
	// Google Fonts — Fraunces (headings), DM Sans (body), Cormorant (accents).
	wp_enqueue_style(
		'kundeling-fonts',
		'https://fonts.googleapis.com/css2?family=DM+Sans:ital,opsz,wght@0,9..40,300;0,9..40,400;0,9..40,500;1,9..40,300;1,9..40,400&family=Fraunces:ital,opsz,wght@0,9..144,300;0,9..144,400;0,9..144,500;0,9..144,700;1,9..144,300;1,9..144,400&family=Cormorant:ital,wght@0,300;0,400;0,500;0,600;1,300;1,400&display=swap',
		array(),
		null
	);

	// Shared design system.
	wp_enqueue_style(
		'kundeling-global',
		get_theme_file_uri( 'assets/css/global.css' ),
		array( 'kundeling-fonts' ),
		KUNDELING_VERSION
	);

	// Required theme header stylesheet (overrides + WP admin recognition).
	wp_enqueue_style(
		'kundeling-style',
		get_stylesheet_uri(),
		array( 'kundeling-global' ),
		KUNDELING_VERSION
	);

	// Shared behaviours (fade-in, nav scroll, logo spin, mobile menu).
	wp_enqueue_script(
		'kundeling-global',
		get_theme_file_uri( 'assets/js/global.js' ),
		array(),
		KUNDELING_VERSION,
		true
	);

	// Page-specific stylesheets (mirrors the static site's per-page inline CSS).
	$page_css = '';
	if ( is_front_page() ) {
		$page_css = 'home';
	} elseif ( is_singular( 'post' ) ) {
		$page_css = 'news-single';
	} elseif ( is_home() || is_archive() || is_search() ) {
		$page_css = 'news';
	}

	if ( $page_css && file_exists( get_theme_file_path( "assets/css/{$page_css}.css" ) ) ) {
		wp_enqueue_style(
			"kundeling-{$page_css}",
			get_theme_file_uri( "assets/css/{$page_css}.css" ),
			array( 'kundeling-global' ),
			KUNDELING_VERSION
		);
	}
}
add_action( 'wp_enqueue_scripts', 'kundeling_assets' );

/**
 * Fallback for the primary menu when none is assigned yet — mirrors the
 * static site's nav so the theme is usable immediately after activation.
 */
function kundeling_default_menu() {
	echo '<ul class="nav-links">';
	echo '<li class="nav-close"><button onclick="closeMenu()" aria-label="' . esc_attr__( 'Close menu', 'kundeling-tatsak' ) . '">&times;</button></li>';
	echo '<li><a href="' . esc_url( home_url( '/' ) ) . '">' . esc_html__( 'Home', 'kundeling-tatsak' ) . '</a></li>';
	echo '<li><a href="' . esc_url( home_url( '/about-rinpoche/' ) ) . '">' . esc_html__( 'About', 'kundeling-tatsak' ) . '</a></li>';
	echo '<li><a href="' . esc_url( home_url( '/lineage/' ) ) . '">' . esc_html__( 'Lineage', 'kundeling-tatsak' ) . '</a></li>';
	echo '<li><a href="' . esc_url( home_url( '/teaching/' ) ) . '">' . esc_html__( 'Teachings', 'kundeling-tatsak' ) . '</a></li>';
	echo '<li><a href="' . esc_url( home_url( '/schedule/' ) ) . '">' . esc_html__( 'Schedule', 'kundeling-tatsak' ) . '</a></li>';
	echo '<li><a href="' . esc_url( home_url( '/gallery/' ) ) . '">' . esc_html__( 'Gallery', 'kundeling-tatsak' ) . '</a></li>';
	echo '<li><a href="' . esc_url( home_url( '/news/' ) ) . '">' . esc_html__( 'News', 'kundeling-tatsak' ) . '</a></li>';
	echo '<li><a href="' . esc_url( home_url( '/contact/' ) ) . '">' . esc_html__( 'Contact', 'kundeling-tatsak' ) . '</a></li>';
	echo '</ul>';
}
