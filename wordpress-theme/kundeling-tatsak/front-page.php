<?php
/**
 * Homepage template.
 *
 * @package Kundeling_Tatsak
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

get_header();
?>

<!-- ── HERO ── -->
<section class="hero" id="home">
	<div class="hero-bg">
		<img src="<?php echo esc_url( get_theme_file_uri( 'assets/images/hero-cover-1.jpg' ) ); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>" onerror="this.style.display='none'">
	</div>
	<div class="hero-overlay"></div>

	<div class="hero-content">
		<p class="hero-eyebrow"><?php esc_html_e( 'His Eminence', 'kundeling-tatsak' ); ?></p>
		<h1>Kundeling Tatsak<span class="title-accent">Rinpoche</span></h1>
		<div class="hero-rule"></div>
		<div class="hero-subtitle"><?php esc_html_e( 'In service to the Buddha Dharma and the world: Awakening wisdom, cultivating compassion, and uplifting society for the benefit of all beings.', 'kundeling-tatsak' ); ?></div>
		<a href="<?php echo esc_url( home_url( '/about-rinpoche/' ) ); ?>" class="hero-cta"><span><?php esc_html_e( 'Discover His Eminence', 'kundeling-tatsak' ); ?></span></a>
	</div>

	<a href="#news" class="hero-scroll"><?php esc_html_e( 'Scroll to explore', 'kundeling-tatsak' ); ?></a>
</section>

<!-- ── NEWS + SCHEDULE SPLIT ── -->
<section class="news-schedule" id="news">
	<!-- Left: latest news (real WordPress posts) -->
	<div class="news-block">
		<p class="sec-label"><?php esc_html_e( 'Latest', 'kundeling-tatsak' ); ?></p>
		<h2 class="sec-title"><?php esc_html_e( 'News &amp; Updates', 'kundeling-tatsak' ); ?></h2>
		<div class="sec-rule"></div>
		<div id="home-news">
			<?php
			$kundeling_news = new WP_Query(
				array(
					'post_type'           => 'post',
					'posts_per_page'      => 3,
					'ignore_sticky_posts' => true,
				)
			);
			if ( $kundeling_news->have_posts() ) :
				while ( $kundeling_news->have_posts() ) :
					$kundeling_news->the_post();
					?>
					<div class="news-item fade-in visible">
						<span class="news-item-date"><?php echo esc_html( get_the_date() ); ?></span>
						<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
						<p><?php echo esc_html( wp_trim_words( get_the_excerpt(), 32 ) ); ?></p>
						<a href="<?php the_permalink(); ?>" class="read-more"><?php esc_html_e( 'Read more', 'kundeling-tatsak' ); ?></a>
					</div>
					<?php
				endwhile;
				wp_reset_postdata();
			else :
				?>
				<p><?php esc_html_e( 'News updates will appear here soon.', 'kundeling-tatsak' ); ?></p>
			<?php endif; ?>
		</div>
	</div>

	<!-- Right: upcoming schedule -->
	<div class="schedule-panel fade-in" id="schedule">
		<p class="sec-label"><?php esc_html_e( 'Upcoming', 'kundeling-tatsak' ); ?></p>
		<h2 class="sec-title"><?php esc_html_e( 'Schedule', 'kundeling-tatsak' ); ?></h2>
		<div class="sec-rule"></div>
		<div id="home-schedule">
				<?php
				// Upcoming events: posts in the "Schedule" category dated today or
				// later, soonest first. Fully editable from the Posts screen.
				$type_labels = array(
					'teaching' => __( 'Teaching', 'kundeling-tatsak' ),
					'ceremony' => __( 'Ceremony', 'kundeling-tatsak' ),
					'event'    => __( 'Event', 'kundeling-tatsak' ),
				);
				$sched_cats  = kundeling_schedule_cat_ids();
				$home_events = array();
				if ( ! empty( $sched_cats ) ) {
					$hq = new WP_Query(
						array(
							'post_type'           => 'post',
							'post_status'         => 'publish',
							'posts_per_page'      => 5,
							'category__in'        => $sched_cats,
							'ignore_sticky_posts' => true,
							'meta_key'            => 'kt_event_date',
							'orderby'             => 'meta_value',
							'order'               => 'ASC',
							'meta_query'          => array(
								array(
									'key'     => 'kt_event_date',
									'value'   => gmdate( 'Y-m-d' ),
									'compare' => '>=',
									'type'    => 'DATE',
								),
							),
						)
					);
					if ( $hq->have_posts() ) {
						while ( $hq->have_posts() ) {
							$hq->the_post();
							$home_events[] = array(
								'parts' => kundeling_event_date_parts( get_the_ID() ),
								'type'  => get_post_meta( get_the_ID(), 'kt_event_type', true ),
								'venue' => get_post_meta( get_the_ID(), 'kt_event_venue', true ),
								'title' => get_the_title(),
							);
						}
						wp_reset_postdata();
					}
				}

				if ( ! empty( $home_events ) ) {
					foreach ( $home_events as $ev ) {
						$p         = $ev['parts'];
						$type      = $ev['type'] ? $ev['type'] : 'event';
						$tag_label = isset( $type_labels[ $type ] ) ? $type_labels[ $type ] : ucfirst( $type );
						?>
						<div class="sched-entry">
							<div class="sched-date">
								<span class="month"><?php echo esc_html( $p['month'] ); ?></span>
								<span class="day"><?php echo esc_html( $p['day'] ); ?></span>
							</div>
							<div class="sched-info">
								<h4><?php echo esc_html( $ev['title'] ); ?></h4>
								<?php if ( $ev['venue'] ) : ?>
									<p class="location"><?php echo esc_html( $ev['venue'] ); ?></p>
								<?php endif; ?>
								<span class="sched-tag tag-<?php echo esc_attr( $type ); ?>"><?php echo esc_html( $tag_label ); ?></span>
							</div>
						</div>
						<?php
					}
				} else {
					echo '<p class="sched-none">' . esc_html__( 'No upcoming events at this time.', 'kundeling-tatsak' ) . '</p>';
				}
				?>
			</div>
			<a href="<?php echo esc_url( home_url( '/schedule/' ) ); ?>" class="schedule-viewall"><?php esc_html_e( 'View full schedule', 'kundeling-tatsak' ); ?> &rarr;</a>
	</div>
</section>

<!-- ── DIVIDER ── -->
<div class="full-divider"><hr></div>

<!-- ── ABOUT ── -->
<section class="about-section">
	<p class="sec-label"><?php esc_html_e( 'About', 'kundeling-tatsak' ); ?></p>
	<h2 class="sec-title"><?php esc_html_e( 'The Lineage &amp; Tradition', 'kundeling-tatsak' ); ?></h2>
	<div class="sec-rule"></div>

	<div class="about-grid">
		<a href="<?php echo esc_url( home_url( '/about-rinpoche/' ) ); ?>" class="about-card">
			<div class="card-num">01</div>
			<h3><?php esc_html_e( 'Kundeling Tatsak Rinpoche', 'kundeling-tatsak' ); ?></h3>
			<p><?php esc_html_e( 'One of the oldest and most distinguished lineages of the Gelug tradition — six centuries of scholarship, realisation, and compassionate service, continuing today with the 13th Rinpoche.', 'kundeling-tatsak' ); ?></p>
			<span class="card-link"><?php esc_html_e( 'Read more', 'kundeling-tatsak' ); ?> &rarr;</span>
		</a>
		<a href="<?php echo esc_url( home_url( '/buddhism/' ) ); ?>" class="about-card">
			<div class="card-num">02</div>
			<h3><?php esc_html_e( 'Buddhism', 'kundeling-tatsak' ); ?></h3>
			<p><?php esc_html_e( 'The path to enlightenment through ethical living, meditation, compassion and wisdom — from the Four Noble Truths to the three great traditions.', 'kundeling-tatsak' ); ?></p>
			<span class="card-link"><?php esc_html_e( 'Read more', 'kundeling-tatsak' ); ?> &rarr;</span>
		</a>
		<a href="<?php echo esc_url( home_url( '/tibetan-buddhism/' ) ); ?>" class="about-card">
			<div class="card-num">03</div>
			<h3><?php esc_html_e( 'Tibetan Buddhism', 'kundeling-tatsak' ); ?></h3>
			<p><?php esc_html_e( 'A living tradition of Bodhicitta, sacred arts, and the Guru-Disciple relationship, woven into the heart of Tibetan life for over a millennium.', 'kundeling-tatsak' ); ?></p>
			<span class="card-link"><?php esc_html_e( 'Read more', 'kundeling-tatsak' ); ?> &rarr;</span>
		</a>
		<a href="<?php echo esc_url( home_url( '/gelugpa/' ) ); ?>" class="about-card">
			<div class="card-num">04</div>
			<h3><?php esc_html_e( 'Gelugpa Tradition', 'kundeling-tatsak' ); ?></h3>
			<p><?php esc_html_e( 'The Way of Virtue — founded by Je Tsongkhapa on rigorous scholarship, monastic discipline, and the Madhyamaka and Lamrim teachings.', 'kundeling-tatsak' ); ?></p>
			<span class="card-link"><?php esc_html_e( 'Read more', 'kundeling-tatsak' ); ?> &rarr;</span>
		</a>
	</div>
</section>

<!-- ── DIVIDER ── -->
<div class="full-divider"><hr></div>

<!-- ── TEACHINGS — VIDEO ── -->
<section class="teachings" id="teachings">
	<div class="teachings-top">
		<div>
			<p class="sec-label"><?php esc_html_e( 'Dharma on Video', 'kundeling-tatsak' ); ?></p>
			<h2 class="sec-title"><?php esc_html_e( 'Teachings &amp; Dharma Talks', 'kundeling-tatsak' ); ?></h2>
			<div class="sec-rule"></div>
		</div>
		<a href="<?php echo esc_url( home_url( '/teaching/' ) ); ?>" class="view-all"><?php esc_html_e( 'View all teachings', 'kundeling-tatsak' ); ?></a>
	</div>

	<div class="video-row">
		<div class="video-card fade-in">
			<div class="video-frame">
				<iframe src="https://www.youtube.com/embed/DIF0pYl8IAc" title="Teaching by Kundeling Tatsak Rinpoche" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
			</div>
			<div class="video-caption">
				<span class="vid-tag"><?php esc_html_e( 'Teaching', 'kundeling-tatsak' ); ?></span>
				<h3><?php esc_html_e( 'Dharma Teaching by Kundeling Tatsak Rinpoche', 'kundeling-tatsak' ); ?></h3>
				<p><?php esc_html_e( 'A recorded teaching and dharma transmission by His Eminence.', 'kundeling-tatsak' ); ?></p>
			</div>
		</div>

		<div class="video-card fade-in">
			<div class="video-frame">
				<iframe src="https://www.youtube.com/embed/OfNQ9GU4_rI" title="Teaching by Kundeling Tatsak Rinpoche" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
			</div>
			<div class="video-caption">
				<span class="vid-tag"><?php esc_html_e( 'Dharma Talk', 'kundeling-tatsak' ); ?></span>
				<h3><?php esc_html_e( 'Dharma Talk by Kundeling Tatsak Rinpoche', 'kundeling-tatsak' ); ?></h3>
				<p><?php esc_html_e( 'A recorded dharma talk and teaching by His Eminence.', 'kundeling-tatsak' ); ?></p>
			</div>
		</div>
	</div>
</section>

<?php
get_footer();
