<?php
/**
 * Template Name: News
 *
 * Full news archive in the theme's card design, with a client-side search +
 * year filter (all posts rendered, filtered in the browser).
 *
 * @package Kundeling_Tatsak
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

get_header();

$news_args = array(
	'post_type'           => 'post',
	'post_status'         => 'publish',
	'posts_per_page'      => -1,
	'ignore_sticky_posts' => true,
	'orderby'             => 'date',
	'order'               => 'DESC',
);

// Keep schedule events out of the news list.
$schedule_cats = kundeling_schedule_cat_ids();
if ( ! empty( $schedule_cats ) ) {
	$news_args['category__not_in'] = $schedule_cats;
}

$news_query = new WP_Query( $news_args );

// Collect the distinct years present, for the year dropdown.
$years = array();
if ( $news_query->have_posts() ) {
	foreach ( $news_query->posts as $p ) {
		$years[ get_the_date( 'Y', $p ) ] = true;
	}
}
$years = array_keys( $years );
rsort( $years );
?>

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

<!-- ── FILTERS ── -->
<div class="news-filters">
	<div class="filter-search">
		<svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="11" cy="11" r="8"/><line x1="21" y1="21" x2="16.65" y2="16.65"/></svg>
		<input type="text" id="newsSearch" placeholder="<?php esc_attr_e( 'Search news…', 'kundeling-tatsak' ); ?>" autocomplete="off">
	</div>
	<select class="filter-select" id="newsYear">
		<option value=""><?php esc_html_e( 'All Years', 'kundeling-tatsak' ); ?></option>
		<?php foreach ( $years as $y ) : ?>
			<option value="<?php echo esc_attr( $y ); ?>"><?php echo esc_html( $y ); ?></option>
		<?php endforeach; ?>
	</select>
	<button class="filter-clear" id="newsClear" onclick="kundelingClearNews()"><?php esc_html_e( 'Clear filters', 'kundeling-tatsak' ); ?></button>
	<span class="news-count" id="newsCount"></span>
</div>

<section class="news-listing" id="newsListing">
	<?php
	if ( $news_query->have_posts() ) :
		while ( $news_query->have_posts() ) :
			$news_query->the_post();
			$search_text = strtolower( get_the_title() . ' ' . wp_strip_all_tags( get_the_excerpt() ) );
			?>
			<article <?php post_class( 'news-article fade-in' ); ?> data-year="<?php echo esc_attr( get_the_date( 'Y' ) ); ?>" data-text="<?php echo esc_attr( $search_text ); ?>">
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
		wp_reset_postdata();
	else :
		?>
		<p><?php esc_html_e( 'No news articles yet.', 'kundeling-tatsak' ); ?></p>
	<?php endif; ?>
	<p class="news-empty" id="newsEmpty"><?php esc_html_e( 'No news matches your search.', 'kundeling-tatsak' ); ?></p>
</section>

<script>
	( function () {
		var items    = Array.prototype.slice.call( document.querySelectorAll( '#newsListing .news-article' ) );
		var searchEl = document.getElementById( 'newsSearch' );
		var yearEl   = document.getElementById( 'newsYear' );
		var clearBtn = document.getElementById( 'newsClear' );
		var countEl  = document.getElementById( 'newsCount' );
		var emptyEl  = document.getElementById( 'newsEmpty' );

		function apply() {
			var q    = searchEl.value.toLowerCase().trim();
			var year = yearEl.value;
			var visible = 0;
			items.forEach( function ( el ) {
				var matchText = ! q || el.getAttribute( 'data-text' ).indexOf( q ) !== -1;
				var matchYear = ! year || el.getAttribute( 'data-year' ) === year;
				var show = matchText && matchYear;
				el.style.display = show ? '' : 'none';
				if ( show ) { visible++; }
			} );
			var filtered = q || year;
			clearBtn.classList.toggle( 'visible', !! filtered );
			countEl.textContent = filtered ? visible + ( visible === 1 ? ' result' : ' results' ) : '';
			emptyEl.classList.toggle( 'visible', visible === 0 );
		}

		window.kundelingClearNews = function () {
			searchEl.value = '';
			yearEl.value = '';
			apply();
		};

		searchEl.addEventListener( 'input', apply );
		yearEl.addEventListener( 'change', apply );
	} )();
</script>

<?php
get_footer();
