<?php
/**
 * Template Name: Gallery Collection
 *
 * Renders a single photo collection (horizontal strip + lightbox). The
 * collection is chosen by matching the page slug to a slug in
 * assets/data/gallery-data.json. Images are reused from the media library.
 *
 * @package Kundeling_Tatsak
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

get_header();

$slug       = get_post_field( 'post_name', get_the_ID() );
$collection = kundeling_gallery_collection( $slug );

// Resolve images to media-library URLs; keep captions aligned.
$resolved = array();
if ( $collection && ! empty( $collection['images'] ) ) {
	foreach ( $collection['images'] as $img ) {
		$url = kundeling_media_url_by_filename( $img['file'] );
		if ( $url ) {
			$resolved[] = array(
				'url'     => $url,
				'caption' => isset( $img['caption'] ) ? $img['caption'] : '',
			);
		}
	}
}

$title    = $collection ? $collection['title'] : get_the_title();
$subtitle = $collection && ! empty( $collection['subtitle'] ) ? $collection['subtitle'] : '';
?>

<!-- ── PAGE HEADER ── -->
<header class="page-header">
	<div class="breadcrumb">
		<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php esc_html_e( 'Home', 'kundeling-tatsak' ); ?></a>
		<span>/</span>
		<a href="<?php echo esc_url( home_url( '/gallery/' ) ); ?>"><?php esc_html_e( 'Gallery', 'kundeling-tatsak' ); ?></a>
		<span>/</span>
		<?php echo esc_html( $title ); ?>
	</div>
	<h1><?php echo esc_html( $title ); ?></h1>
	<?php if ( $subtitle ) : ?>
		<p class="subtitle"><?php echo esc_html( $subtitle ); ?></p>
	<?php endif; ?>
	<div class="header-rule"></div>
</header>

<?php if ( ! empty( $resolved ) ) : ?>
	<section class="collection">
		<div class="photo-row" id="photoRow">
			<?php foreach ( $resolved as $i => $img ) : ?>
				<div class="photo-item" onclick="kundelingOpenLightbox(<?php echo (int) $i; ?>)">
					<img src="<?php echo esc_url( $img['url'] ); ?>" alt="<?php echo esc_attr( $title . ' — ' . ( $i + 1 ) ); ?>" loading="lazy">
					<?php if ( $img['caption'] ) : ?>
						<div class="photo-caption"><p><?php echo esc_html( $img['caption'] ); ?></p></div>
					<?php endif; ?>
				</div>
			<?php endforeach; ?>
		</div>

		<?php if ( count( $resolved ) > 3 ) : ?>
			<div class="strip-arrows" style="display:flex;gap:8px;justify-content:flex-end;max-width:1080px;margin:14px auto 0;padding:0 48px;">
				<button class="strip-arrow" onclick="kundelingScrollStrip(-1)" aria-label="<?php esc_attr_e( 'Previous', 'kundeling-tatsak' ); ?>">
					<svg viewBox="0 0 24 24" width="20" height="20" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="15 18 9 12 15 6"/></svg>
				</button>
				<button class="strip-arrow" onclick="kundelingScrollStrip(1)" aria-label="<?php esc_attr_e( 'Next', 'kundeling-tatsak' ); ?>">
					<svg viewBox="0 0 24 24" width="20" height="20" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="9 18 15 12 9 6"/></svg>
				</button>
			</div>
		<?php endif; ?>
	</section>

	<div class="collection-back">
		<a href="<?php echo esc_url( home_url( '/gallery/' ) ); ?>"><span class="arrow">&larr;</span> <?php esc_html_e( 'Back to Gallery', 'kundeling-tatsak' ); ?></a>
	</div>

	<!-- Lightbox -->
	<div class="lightbox" id="lightbox" onclick="kundelingCloseOnBg(event)">
		<button class="lightbox-close" onclick="kundelingCloseLightbox()" aria-label="<?php esc_attr_e( 'Close', 'kundeling-tatsak' ); ?>">&times;</button>
		<button class="lightbox-nav lightbox-prev" id="lbPrev" onclick="kundelingLightboxNav(-1)" aria-label="<?php esc_attr_e( 'Previous', 'kundeling-tatsak' ); ?>">
			<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="15 18 9 12 15 6"/></svg>
		</button>
		<div class="lightbox-img-wrap">
			<img class="lightbox-img" id="lightboxImg" src="" alt="">
			<div class="photo-caption" id="lbCaption"><p></p></div>
		</div>
		<button class="lightbox-nav lightbox-next" id="lbNext" onclick="kundelingLightboxNav(1)" aria-label="<?php esc_attr_e( 'Next', 'kundeling-tatsak' ); ?>">
			<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="9 18 15 12 9 6"/></svg>
		</button>
		<div class="lightbox-counter" id="lbCounter"></div>
	</div>

	<script>
		( function () {
			var images = <?php echo wp_json_encode( wp_list_pluck( $resolved, 'url' ) ); ?>;
			var captions = <?php echo wp_json_encode( wp_list_pluck( $resolved, 'caption' ) ); ?>;
			var current = 0;
			var lb = document.getElementById( 'lightbox' );
			var lbImg = document.getElementById( 'lightboxImg' );
			var lbPrev = document.getElementById( 'lbPrev' );
			var lbNext = document.getElementById( 'lbNext' );
			var lbCount = document.getElementById( 'lbCounter' );
			var lbCaption = document.getElementById( 'lbCaption' ).querySelector( 'p' );
			var row = document.getElementById( 'photoRow' );

			window.kundelingScrollStrip = function ( dir ) { if ( row ) { row.scrollBy( { left: dir * 500, behavior: 'smooth' } ); } };
			function update() {
				lbCount.textContent = ( current + 1 ) + ' / ' + images.length;
				lbCaption.textContent = captions[ current ] || '';
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
<?php else : ?>
	<section class="collection">
		<p style="max-width:1080px;margin:0 auto;padding:0 48px 80px;color:var(--stone-500);">
			<?php esc_html_e( 'Photos for this collection are being prepared.', 'kundeling-tatsak' ); ?>
		</p>
	</section>
<?php endif; ?>

<?php
get_footer();
