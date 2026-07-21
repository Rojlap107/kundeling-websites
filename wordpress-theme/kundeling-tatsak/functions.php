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
	} elseif ( is_page() && get_page_template_slug() ) {
		// Page templates named "template-<slug>.php" load "<slug>.css".
		$slug = str_replace( 'template-', '', basename( get_page_template_slug(), '.php' ) );
		if ( file_exists( get_theme_file_path( "assets/css/{$slug}.css" ) ) ) {
			$page_css = $slug;
		}
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
 * Build a one-time filename → attachment-ID map from the media library so the
 * gallery can reuse images already uploaded (no re-uploading). Keyed by exact
 * lowercased basename and by a normalised stem (minus -scaled / size / -e
 * suffixes) so slightly-renamed variants still resolve.
 *
 * @return array<string,int>
 */
function kundeling_media_map() {
	static $map = null;
	if ( null !== $map ) {
		return $map;
	}
	$cached = get_transient( 'kundeling_media_map' );
	if ( is_array( $cached ) ) {
		$map = $cached;
		return $map;
	}

	global $wpdb;
	$rows = $wpdb->get_results( "SELECT post_id, meta_value FROM {$wpdb->postmeta} WHERE meta_key = '_wp_attached_file'" ); // phpcs:ignore WordPress.DB
	$map  = array();
	foreach ( $rows as $row ) {
		$fn = strtolower( wp_basename( $row->meta_value ) );
		if ( ! isset( $map[ $fn ] ) ) {
			$map[ $fn ] = (int) $row->post_id;
		}
		$stem = kundeling_image_stem( $fn );
		if ( $stem && ! isset( $map[ '#' . $stem ] ) ) {
			$map[ '#' . $stem ] = (int) $row->post_id;
		}
	}
	set_transient( 'kundeling_media_map', $map, HOUR_IN_SECONDS );
	return $map;
}

/**
 * Resolve a gallery image filename to a media-library URL (large size), or ''.
 */
function kundeling_media_url_by_filename( $filename, $size = 'large' ) {
	$map = kundeling_media_map();
	$fn  = strtolower( $filename );
	$id  = 0;
	if ( isset( $map[ $fn ] ) ) {
		$id = $map[ $fn ];
	} else {
		$stem = kundeling_image_stem( $fn );
		if ( isset( $map[ '#' . $stem ] ) ) {
			$id = $map[ '#' . $stem ];
		}
	}
	if ( ! $id ) {
		return '';
	}
	$img = wp_get_attachment_image_url( $id, $size );
	return $img ? $img : '';
}

/**
 * Load the bundled gallery collections manifest (slug, title, images).
 *
 * @return array<int,array>
 */
function kundeling_gallery_data() {
	static $data = null;
	if ( null !== $data ) {
		return $data;
	}
	$file = get_theme_file_path( 'assets/data/gallery-data.json' );
	$data = array();
	if ( file_exists( $file ) ) {
		$decoded = json_decode( file_get_contents( $file ), true ); // phpcs:ignore WordPress.WP.AlternativeFunctions
		if ( is_array( $decoded ) ) {
			$data = $decoded;
		}
	}
	return $data;
}

/**
 * Find a single gallery collection by slug.
 */
function kundeling_gallery_collection( $slug ) {
	foreach ( kundeling_gallery_data() as $collection ) {
		if ( isset( $collection['slug'] ) && $collection['slug'] === $slug ) {
			return $collection;
		}
	}
	return null;
}

/**
 * Split rendered post HTML into (a) body text with the images removed and
 * (b) an ordered list of the images, so single.php can show the article text
 * followed by an "In Pictures" gallery strip. The featured (cover) image is
 * excluded from the gallery by filename so it isn't repeated.
 *
 * @param string $html          Rendered post content.
 * @param string $featured_url  Full-size URL of the featured image, if any.
 * @return array{content:string,images:array<int,array{src:string,alt:string}>}
 */
function kundeling_split_gallery( $html, $featured_url = '' ) {
	$images = array();

	if ( preg_match_all( '/<img[^>]+>/i', $html, $matches ) ) {
		foreach ( $matches[0] as $tag ) {
			$src = '';
			$alt = '';
			if ( preg_match( '/src=["\']([^"\']+)["\']/i', $tag, $s ) ) {
				$src = $s[1];
			}
			if ( preg_match( '/alt=["\']([^"\']*)["\']/i', $tag, $a ) ) {
				$alt = $a[1];
			}
			if ( $src ) {
				$images[] = array(
					'src' => $src,
					'alt' => $alt,
				);
			}
		}
	}

	// Remove featured image (compare on a size-suffix-stripped filename stem).
	$featured_stem = $featured_url ? kundeling_image_stem( $featured_url ) : '';
	if ( $featured_stem ) {
		$images = array_values(
			array_filter(
				$images,
				function ( $img ) use ( $featured_stem ) {
					return kundeling_image_stem( $img['src'] ) !== $featured_stem;
				}
			)
		);
	}

	// Strip images (and their figure / link wrappers) out of the body text.
	$content = $html;
	$content = preg_replace( '/<figure[^>]*>\s*(<a[^>]*>)?\s*<img[^>]+>\s*(<\/a>)?\s*(<figcaption[^>]*>.*?<\/figcaption>)?\s*<\/figure>/is', '', $content );
	$content = preg_replace( '/<a[^>]*>\s*<img[^>]+>\s*<\/a>/is', '', $content );
	$content = preg_replace( '/<img[^>]+>/i', '', $content );
	$content = preg_replace( '/<p>(\s|&nbsp;)*<\/p>/i', '', $content );

	return array(
		'content' => $content,
		'images'  => $images,
	);
}

/**
 * Reduce an image URL to a comparable filename stem: drop the path, the
 * extension, WordPress size suffixes (-1024x768) and the -scaled marker.
 */
function kundeling_image_stem( $url ) {
	$name = wp_basename( wp_parse_url( $url, PHP_URL_PATH ) );
	$name = preg_replace( '/\.(jpe?g|png|gif|webp)$/i', '', $name );
	$name = preg_replace( '/-\d+x\d+$/', '', $name );
	$name = preg_replace( '/-scaled$/', '', $name );
	return strtolower( $name );
}

/**
 * Compatibility shims for the legacy Impreza / WPBakery shortcodes embedded in
 * the imported news posts. Without these the shortcodes print as raw text
 * (e.g. "[us_image image="2146" ...]"). These render them sensibly under our
 * theme so the 51 existing posts read cleanly without editing each one.
 */
function kundeling_sc_us_image( $atts ) {
	$atts = shortcode_atts( array( 'image' => 0 ), $atts, 'us_image' );
	$id   = absint( $atts['image'] );
	if ( ! $id ) {
		return '';
	}
	$img = wp_get_attachment_image( $id, 'large', false, array( 'loading' => 'lazy' ) );
	return $img ? '<figure>' . $img . '</figure>' : '';
}

function kundeling_sc_us_separator( $atts ) {
	$atts = shortcode_atts( array( 'size' => 'medium' ), $atts, 'us_separator' );
	$map  = array(
		'small'  => '16px',
		'medium' => '28px',
		'large'  => '44px',
		'huge'   => '64px',
	);
	$h = isset( $map[ $atts['size'] ] ) ? $map[ $atts['size'] ] : '28px';
	return '<div style="height:' . esc_attr( $h ) . '"></div>';
}

/**
 * Register the shims, plus strip any other stray legacy wrapper shortcodes
 * (vc_row, vc_column, etc.) so their bracket text never leaks into content.
 */
function kundeling_register_legacy_shortcodes() {
	add_shortcode( 'us_image', 'kundeling_sc_us_image' );
	add_shortcode( 'us_separator', 'kundeling_sc_us_separator' );

	// Wrapper shortcodes: output their inner content, drop the wrapper tag.
	foreach ( array( 'vc_row', 'vc_column', 'vc_column_text', 'vc_row_inner', 'vc_column_inner', 'us_single_image', 'us_text' ) as $tag ) {
		add_shortcode(
			$tag,
			function ( $atts, $content = '' ) {
				return do_shortcode( $content );
			}
		);
	}
}
add_action( 'init', 'kundeling_register_legacy_shortcodes' );

/**
 * Bridge WordPress's default menu markup onto the theme's dropdown design.
 * Parent items get `.has-dropdown`; their sub-menus get `.dropdown`, so the
 * existing global.css hover-dropdown styling applies to a WP-managed menu.
 */
function kundeling_nav_parent_class( $classes, $item, $args ) {
	if ( isset( $args->theme_location ) && 'primary' === $args->theme_location
		&& in_array( 'menu-item-has-children', (array) $classes, true ) ) {
		$classes[] = 'has-dropdown';
	}
	return $classes;
}
add_filter( 'nav_menu_css_class', 'kundeling_nav_parent_class', 10, 3 );

function kundeling_nav_submenu_class( $classes, $args, $depth ) {
	if ( isset( $args->theme_location ) && 'primary' === $args->theme_location ) {
		$classes[] = 'dropdown';
	}
	return $classes;
}
add_filter( 'nav_menu_submenu_css_class', 'kundeling_nav_submenu_class', 10, 3 );

/**
 * Disable Jetpack's auto-appended Related Posts — the theme renders its own
 * styled Related section (with cover images) at the end of single.php.
 */
add_filter( 'jetpack_relatedposts_filter_enabled_for_request', '__return_false' );

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
