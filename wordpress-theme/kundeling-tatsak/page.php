<?php
/**
 * Generic page template.
 *
 * @package Kundeling_Tatsak
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

get_header();

while ( have_posts() ) :
	the_post();
	?>

	<header class="page-header">
		<div class="breadcrumb">
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php esc_html_e( 'Home', 'kundeling-tatsak' ); ?></a>
			<span>/</span>
			<?php the_title(); ?>
		</div>
		<h1><?php the_title(); ?></h1>
		<div class="header-rule"></div>
	</header>

	<article class="article">
		<div class="article-section">
			<?php the_content(); ?>
		</div>
	</article>

	<?php
endwhile;

get_footer();
