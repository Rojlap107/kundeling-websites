<?php
/**
 * Header: document head + primary navigation.
 *
 * @package Kundeling_Tatsak
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// The homepage uses the transparent hero nav; other pages use the solid nav.
$kundeling_nav_class = is_front_page() ? 'nav-hero' : '';
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<!-- ── NAVIGATION ── -->
<nav id="mainNav"<?php echo $kundeling_nav_class ? ' class="' . esc_attr( $kundeling_nav_class ) . '"' : ''; ?>>
	<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="nav-name">
		<?php
		if ( has_custom_logo() ) {
			the_custom_logo();
		} else {
			printf(
				'<img src="%s" alt="%s" class="nav-logo">',
				esc_url( get_theme_file_uri( 'assets/images/Kundeling Tatsak Rinpoche Logo.png' ) ),
				esc_attr( get_bloginfo( 'name' ) )
			);
		}
		?>
	</a>
	<button class="nav-toggle" onclick="toggleMenu()" aria-label="<?php esc_attr_e( 'Menu', 'kundeling-tatsak' ); ?>">
		<span></span><span></span><span></span>
	</button>
	<?php
	if ( has_nav_menu( 'primary' ) ) {
		wp_nav_menu(
			array(
				'theme_location' => 'primary',
				'container'      => false,
				'menu_class'     => 'nav-links',
				'items_wrap'     => '<ul class="%2$s"><li class="nav-close"><button onclick="closeMenu()" aria-label="' . esc_attr__( 'Close menu', 'kundeling-tatsak' ) . '">&times;</button></li>%3$s</ul>',
			)
		);
	} else {
		kundeling_default_menu();
	}
	?>
</nav>
