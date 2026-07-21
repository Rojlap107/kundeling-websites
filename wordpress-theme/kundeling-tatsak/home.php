<?php
/**
 * News listing (the posts index — set Settings → Reading → Posts page to "News").
 *
 * @package Kundeling_Tatsak
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

get_header();
?>

<!-- ── PAGE HEADER ── -->
<header class="page-header">
	<div class="breadcrumb">
		<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php esc_html_e( 'Home', 'kundeling-tatsak' ); ?></a>
		<span>/</span>
		<?php esc_html_e( 'News', 'kundeling-tatsak' ); ?>
	</div>
	<h1><?php esc_html_e( 'News &amp; Updates', 'kundeling-tatsak' ); ?></h1>
	<p class="subtitle"><?php esc_html_e( 'Latest news and activities from His Eminence Kundeling Tatsak Rinpoche', 'kundeling-tatsak' ); ?></p>
	<div class="header-rule"></div>
</header>

<!-- ── NEWS LISTING ── -->
<section class="news-listing" id="newsListing">
	<?php
	if ( have_posts() ) :
		while ( have_posts() ) :
			the_post();
			?>
			<article <?php post_class( 'news-article fade-in' ); ?>>
				<a href="<?php the_permalink(); ?>" class="news-article-image">
					<?php
					if ( has_post_thumbnail() ) {
						the_post_thumbnail( 'kundeling-news' );
					} else {
						printf(
							'<img src="%s" alt="%s" loading="lazy">',
							esc_url( get_theme_file_uri( 'assets/images/kundeling.jpg' ) ),
							esc_attr( get_the_title() )
						);
					}
					?>
				</a>
				<div class="news-article-body">
					<span class="news-article-date"><?php echo esc_html( get_the_date() ); ?></span>
					<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
					<p><?php echo esc_html( wp_trim_words( get_the_excerpt(), 40 ) ); ?></p>
					<a href="<?php the_permalink(); ?>" class="read-more"><?php esc_html_e( 'Read more', 'kundeling-tatsak' ); ?></a>
				</div>
			</article>
			<?php
		endwhile;
	else :
		?>
		<p><?php esc_html_e( 'No news articles yet.', 'kundeling-tatsak' ); ?></p>
	<?php endif; ?>
</section>

<!-- ── PAGINATION ── -->
<div class="news-archive">
	<?php
	the_posts_pagination(
		array(
			'mid_size'  => 2,
			'prev_text' => __( '&larr; Newer', 'kundeling-tatsak' ),
			'next_text' => __( 'Older &rarr;', 'kundeling-tatsak' ),
		)
	);
	?>
</div>

<?php
get_footer();
