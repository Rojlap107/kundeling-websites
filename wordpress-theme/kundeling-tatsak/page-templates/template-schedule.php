<?php
/**
 * Template Name: Schedule
 *
 * Events are ordinary posts in the "Schedule" category with event-date / venue
 * fields (see the Event Details panel in the post editor). Rendered as a
 * date-block list with a client-side search + year filter.
 *
 * @package Kundeling_Tatsak
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

get_header();

$cat_ids = kundeling_schedule_cat_ids();
$events  = array();

if ( ! empty( $cat_ids ) ) {
	$q = new WP_Query(
		array(
			'post_type'           => 'post',
			'post_status'         => 'publish',
			'posts_per_page'      => -1,
			'category__in'        => $cat_ids,
			'meta_key'            => 'kt_event_date', // phpcs:ignore WordPress.DB.SlowDBQuery.slow_db_query_meta_key
			'orderby'             => 'meta_value',
			'order'               => 'DESC',
			'ignore_sticky_posts' => true,
		)
	);
	if ( $q->have_posts() ) {
		while ( $q->have_posts() ) {
			$q->the_post();
			$parts          = kundeling_event_date_parts( get_the_ID() );
			$type           = get_post_meta( get_the_ID(), 'kt_event_type', true );
			$events[]       = array(
				'parts' => $parts,
				'type'  => $type ? $type : 'event',
				'venue' => get_post_meta( get_the_ID(), 'kt_event_venue', true ),
				'title' => get_the_title(),
				'link'  => get_permalink(),
			);
		}
		wp_reset_postdata();
	}
}

// Distinct years for the dropdown (newest first).
$years = array();
foreach ( $events as $e ) {
	if ( ! empty( $e['parts']['year'] ) ) {
		$years[ $e['parts']['year'] ] = true;
	}
}
$years = array_keys( $years );
rsort( $years );

$type_labels = array(
	'teaching' => __( 'Teaching', 'kundeling-tatsak' ),
	'ceremony' => __( 'Ceremony', 'kundeling-tatsak' ),
	'event'    => __( 'Event', 'kundeling-tatsak' ),
);
?>

<header class="page-header">
	<div class="breadcrumb">
		<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php esc_html_e( 'Home', 'kundeling-tatsak' ); ?></a>
		<span>/</span>
		<?php esc_html_e( 'Schedule', 'kundeling-tatsak' ); ?>
	</div>
	<h1><?php esc_html_e( 'Schedule', 'kundeling-tatsak' ); ?></h1>
	<p class="subtitle"><?php esc_html_e( 'Teachings, ceremonies, and events with His Eminence Kundeling Tatsak Rinpoche', 'kundeling-tatsak' ); ?></p>
	<div class="header-rule"></div>
</header>

<?php if ( ! empty( $events ) ) : ?>
<div class="schedule-filters">
	<div class="filter-search">
		<svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="11" cy="11" r="8"/><line x1="21" y1="21" x2="16.65" y2="16.65"/></svg>
		<input type="text" id="schedSearch" placeholder="<?php esc_attr_e( 'Search events…', 'kundeling-tatsak' ); ?>" autocomplete="off">
	</div>
	<select class="filter-select" id="schedYear">
		<option value=""><?php esc_html_e( 'All Years', 'kundeling-tatsak' ); ?></option>
		<?php foreach ( $years as $y ) : ?>
			<option value="<?php echo esc_attr( $y ); ?>"><?php echo esc_html( $y ); ?></option>
		<?php endforeach; ?>
	</select>
	<button class="filter-clear" id="schedClear" onclick="kundelingClearSched()"><?php esc_html_e( 'Clear filters', 'kundeling-tatsak' ); ?></button>
	<span class="schedule-count" id="schedCount"></span>
</div>
<?php endif; ?>

<section class="kt-sched">
	<p class="kt-sched-note"><?php esc_html_e( 'All dates are subject to change. Please check back regularly for updates and additional events.', 'kundeling-tatsak' ); ?></p>

	<?php if ( ! empty( $events ) ) : ?>
		<div class="kt-sched-list" id="schedList">
			<?php
			foreach ( $events as $e ) :
				$p         = $e['parts'];
				$type      = $e['type'];
				$tag_label = isset( $type_labels[ $type ] ) ? $type_labels[ $type ] : ucfirst( $type );
				$search    = strtolower( $e['title'] . ' ' . $e['venue'] . ' ' . $tag_label . ' ' . $p['month'] . ' ' . $p['year'] );
				?>
				<div class="kt-row" data-year="<?php echo esc_attr( $p['year'] ); ?>" data-text="<?php echo esc_attr( $search ); ?>">
					<div class="kt-date">
						<span class="wd"><?php echo esc_html( $p['weekday'] ); ?></span>
						<span class="dnum"><?php echo esc_html( $p['day'] ); ?></span>
						<span class="my"><?php echo esc_html( trim( $p['month'] . ' ' . $p['year'] ) ); ?></span>
					</div>
					<div class="kt-info">
						<?php if ( $tag_label ) : ?>
							<span class="kt-tag t-<?php echo esc_attr( $type ); ?>"><?php echo esc_html( $tag_label ); ?></span>
						<?php endif; ?>
						<h3><a href="<?php echo esc_url( $e['link'] ); ?>" style="color:inherit;text-decoration:none;"><?php echo esc_html( $e['title'] ); ?></a></h3>
						<?php if ( $e['venue'] ) : ?>
							<p class="venue"><?php echo esc_html( $e['venue'] ); ?></p>
						<?php endif; ?>
					</div>
				</div>
			<?php endforeach; ?>
		</div>
		<p class="kt-sched-empty" id="schedEmpty" style="display:none;"><?php esc_html_e( 'No events match your search.', 'kundeling-tatsak' ); ?></p>
	<?php else : ?>
		<p class="kt-sched-empty"><?php esc_html_e( 'No events are scheduled at this time. Please check back soon.', 'kundeling-tatsak' ); ?></p>
	<?php endif; ?>
</section>

<?php if ( ! empty( $events ) ) : ?>
<script>
	( function () {
		var rows     = Array.prototype.slice.call( document.querySelectorAll( '#schedList .kt-row' ) );
		if ( ! rows.length ) { return; }
		var searchEl = document.getElementById( 'schedSearch' );
		var yearEl   = document.getElementById( 'schedYear' );
		var clearBtn = document.getElementById( 'schedClear' );
		var countEl  = document.getElementById( 'schedCount' );
		var emptyEl  = document.getElementById( 'schedEmpty' );

		function apply() {
			var query = searchEl.value.toLowerCase().trim();
			var year  = yearEl.value;
			var visible = 0;
			rows.forEach( function ( el ) {
				var matchText = ! query || el.getAttribute( 'data-text' ).indexOf( query ) !== -1;
				var matchYear = ! year || el.getAttribute( 'data-year' ) === year;
				var show = matchText && matchYear;
				el.style.display = show ? '' : 'none';
				if ( show ) { visible++; }
			} );
			var filtered = query || year;
			clearBtn.classList.toggle( 'visible', !! filtered );
			countEl.textContent = filtered ? visible + ( visible === 1 ? ' event' : ' events' ) : '';
			if ( emptyEl ) { emptyEl.style.display = visible === 0 ? 'block' : 'none'; }
		}

		window.kundelingClearSched = function () {
			searchEl.value = '';
			yearEl.value = '';
			apply();
		};

		searchEl.addEventListener( 'input', apply );
		yearEl.addEventListener( 'change', apply );
	} )();
</script>
<?php endif; ?>

<?php
get_footer();
