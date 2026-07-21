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
	// ── Related articles (same category, with cover images) ──
	$cat_ids = wp_get_post_categories( get_the_ID() );
	$related = new WP_Query(
		array(
			'category__in'        => ! empty( $cat_ids ) ? $cat_ids : array(),
			'post__not_in'        => array( get_the_ID() ),
			'posts_per_page'      => 3,
			'ignore_sticky_posts' => true,
			'no_found_rows'       => true,
		)
	);
	if ( $related->have_posts() ) :
		?>
		<section class="news-related">
			<h2 class="related-title"><?php esc_html_e( 'Related', 'kundeling-tatsak' ); ?></h2>
			<div class="related-grid">
				<?php
				while ( $related->have_posts() ) :
					$related->the_post();
					?>
					<a href="<?php the_permalink(); ?>" class="related-card">
						<span class="related-cover">
							<?php
							if ( has_post_thumbnail() ) {
								the_post_thumbnail( 'kundeling-news', array( 'loading' => 'lazy' ) );
							} else {
								printf(
									'<img src="%s" alt="%s" loading="lazy">',
									esc_url( get_theme_file_uri( 'assets/images/kundeling.jpg' ) ),
									esc_attr( get_the_title() )
								);
							}
							?>
						</span>
						<span class="related-date"><?php echo esc_html( get_the_date() ); ?></span>
						<h3 class="related-name"><?php the_title(); ?></h3>
					</a>
					<?php
				endwhile;
				wp_reset_postdata();
				?>
			</div>
		</section>
		<?php
	endif;
	?>

	<?php
endwhile;

get_footer();
