<?php
/**
 * Fallback template — used when no more specific template matches.
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
	</div>
	<h1><?php echo esc_html( is_search() ? __( 'Search Results', 'kundeling-tatsak' ) : get_the_title( get_option( 'page_for_posts' ) ) ); ?></h1>
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
		the_posts_pagination();
	else :
		?>
		<p><?php esc_html_e( 'Nothing found.', 'kundeling-tatsak' ); ?></p>
	<?php endif; ?>
</section>

<?php
get_footer();
