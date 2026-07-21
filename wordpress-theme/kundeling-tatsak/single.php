<?php
/**
 * Single news article.
 *
 * @package Kundeling_Tatsak
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

get_header();
?>

<div class="page-header" style="padding-bottom: 0;">
	<div class="breadcrumb">
		<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php esc_html_e( 'Home', 'kundeling-tatsak' ); ?></a>
		<span>/</span>
		<a href="<?php echo esc_url( home_url( '/news/' ) ); ?>"><?php esc_html_e( 'News', 'kundeling-tatsak' ); ?></a>
	</div>
</div>

<?php
while ( have_posts() ) :
	the_post();
	?>
	<article <?php post_class( 'news-single' ); ?>>
		<div class="news-meta">
			<span class="news-date"><?php echo esc_html( get_the_date() ); ?></span>
			<?php
			$cats = get_the_category();
			if ( ! empty( $cats ) ) {
				$names = wp_list_pluck( array_slice( $cats, 0, 2 ), 'name' );
				echo '<span class="news-category">' . esc_html( implode( ' · ', $names ) ) . '</span>';
			}
			?>
		</div>
		<h1><?php the_title(); ?></h1>
		<div class="news-body">
			<?php
			if ( has_post_thumbnail() ) {
				the_post_thumbnail( 'large' );
			}
			the_content();
			?>
			<a href="<?php echo esc_url( home_url( '/news/' ) ); ?>" class="news-back"><span class="arrow">&larr;</span> <?php esc_html_e( 'Back to News', 'kundeling-tatsak' ); ?></a>
		</div>
	</article>
	<?php
endwhile;

get_footer();
