<?php
/**
 * Archive listing (category, tag, date, author).
 *
 * @package Kundeling_Tatsak
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

get_header();
?>

<header class="page-header">
	<div class="breadcrumb">
		<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php esc_html_e( 'Home', 'kundeling-tatsak' ); ?></a>
		<span>/</span>
		<a href="<?php echo esc_url( home_url( '/news/' ) ); ?>"><?php esc_html_e( 'News', 'kundeling-tatsak' ); ?></a>
	</div>
	<h1><?php the_archive_title(); ?></h1>
	<?php the_archive_description( '<p class="subtitle">', '</p>' ); ?>
	<div class="header-rule"></div>
</header>

<section class="news-listing">
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
		<p><?php esc_html_e( 'No articles found.', 'kundeling-tatsak' ); ?></p>
	<?php endif; ?>
</section>

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
