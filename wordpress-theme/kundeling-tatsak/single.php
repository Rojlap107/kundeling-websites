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
			// Cover image at the top.
			if ( has_post_thumbnail() ) {
				the_post_thumbnail( 'large', array( 'class' => 'wp-post-image' ) );
			}

			// Split the body: text stays here, images move to the gallery below.
			$kundeling_rendered = apply_filters( 'the_content', get_the_content() );
			$kundeling_featured = get_the_post_thumbnail_url( get_the_ID(), 'full' );
			$kundeling_split    = kundeling_split_gallery( $kundeling_rendered, $kundeling_featured ? $kundeling_featured : '' );

			echo $kundeling_split['content']; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- rendered post content.
			?>
		</div>
	</article>

	<?php
	// ── In Pictures: gallery of the article's remaining images ──
	$kundeling_gallery = $kundeling_split['images'];
	if ( ! empty( $kundeling_gallery ) ) :
		?>
		<div class="news-gallery">
			<h2><?php esc_html_e( 'In Pictures', 'kundeling-tatsak' ); ?></h2>
			<div class="gallery-strip-wrap">
				<div class="gallery-strip" id="galleryStrip">
					<?php foreach ( $kundeling_gallery as $i => $img ) : ?>
						<div class="gallery-strip-item" onclick="kundelingOpenLightbox(<?php echo (int) $i; ?>)">
							<img src="<?php echo esc_url( $img['src'] ); ?>" alt="<?php echo esc_attr( $img['alt'] ); ?>" loading="lazy">
						</div>
					<?php endforeach; ?>
				</div>
				<?php if ( count( $kundeling_gallery ) > 2 ) : ?>
					<div class="strip-arrows">
						<button class="strip-arrow" onclick="kundelingScrollStrip(-1)" aria-label="<?php esc_attr_e( 'Previous', 'kundeling-tatsak' ); ?>">
							<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="15 18 9 12 15 6"/></svg>
						</button>
						<button class="strip-arrow" onclick="kundelingScrollStrip(1)" aria-label="<?php esc_attr_e( 'Next', 'kundeling-tatsak' ); ?>">
							<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="9 18 15 12 9 6"/></svg>
						</button>
					</div>
				<?php endif; ?>
			</div>
		</div>

		<!-- Lightbox -->
		<div class="lightbox" id="lightbox" onclick="kundelingCloseOnBg(event)">
			<button class="lightbox-close" onclick="kundelingCloseLightbox()" aria-label="<?php esc_attr_e( 'Close', 'kundeling-tatsak' ); ?>">&times;</button>
			<button class="lightbox-nav lightbox-prev" id="lbPrev" onclick="kundelingLightboxNav(-1)" aria-label="<?php esc_attr_e( 'Previous', 'kundeling-tatsak' ); ?>">
				<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="15 18 9 12 15 6"/></svg>
			</button>
			<div class="lightbox-img-wrap">
				<img class="lightbox-img" id="lightboxImg" src="" alt="">
			</div>
			<button class="lightbox-nav lightbox-next" id="lbNext" onclick="kundelingLightboxNav(1)" aria-label="<?php esc_attr_e( 'Next', 'kundeling-tatsak' ); ?>">
				<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="9 18 15 12 9 6"/></svg>
			</button>
			<div class="lightbox-counter" id="lbCounter"></div>
		</div>

		<script>
			( function () {
				var images = <?php echo wp_json_encode( wp_list_pluck( $kundeling_gallery, 'src' ) ); ?>;
				var current = 0;
				var lb = document.getElementById( 'lightbox' );
				var lbImg = document.getElementById( 'lightboxImg' );
				var lbPrev = document.getElementById( 'lbPrev' );
				var lbNext = document.getElementById( 'lbNext' );
				var lbCount = document.getElementById( 'lbCounter' );
				var strip = document.getElementById( 'galleryStrip' );

				window.kundelingScrollStrip = function ( dir ) {
					if ( strip ) { strip.scrollBy( { left: dir * 560, behavior: 'smooth' } ); }
				};
				function update() {
					lbCount.textContent = ( current + 1 ) + ' / ' + images.length;
					lbPrev.classList.toggle( 'hidden', current === 0 );
					lbNext.classList.toggle( 'hidden', current === images.length - 1 );
				}
				window.kundelingOpenLightbox = function ( i ) {
					current = i; lbImg.src = images[ current ]; update();
					lb.classList.add( 'open' ); document.body.style.overflow = 'hidden';
				};
				window.kundelingCloseLightbox = function () {
					lb.classList.remove( 'open' ); document.body.style.overflow = '';
					setTimeout( function () { lbImg.src = ''; }, 300 );
				};
				window.kundelingCloseOnBg = function ( e ) { if ( e.target === lb ) { window.kundelingCloseLightbox(); } };
				window.kundelingLightboxNav = function ( dir ) {
					current = ( current + dir + images.length ) % images.length;
					lbImg.style.opacity = '0';
					setTimeout( function () { lbImg.src = images[ current ]; lbImg.style.opacity = '1'; update(); }, 150 );
				};
				document.addEventListener( 'keydown', function ( e ) {
					if ( ! lb.classList.contains( 'open' ) ) { return; }
					if ( e.key === 'Escape' ) { window.kundelingCloseLightbox(); }
					if ( e.key === 'ArrowLeft' && current > 0 ) { window.kundelingLightboxNav( -1 ); }
					if ( e.key === 'ArrowRight' && current < images.length - 1 ) { window.kundelingLightboxNav( 1 ); }
				} );
			} )();
		</script>
		<?php
	endif;
	?>

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

	<div class="news-back-wrap">
		<a href="<?php echo esc_url( home_url( '/news/' ) ); ?>" class="news-back"><span class="arrow">&larr;</span> <?php esc_html_e( 'Back to News', 'kundeling-tatsak' ); ?></a>
	</div>

	<?php
endwhile;

get_footer();
