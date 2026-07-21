<?php
/**
 * Template Name: Teachings
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
		<?php esc_html_e( 'Teachings', 'kundeling-tatsak' ); ?>
	</div>
	<h1><?php esc_html_e( 'Teachings &amp; Dharma Talks', 'kundeling-tatsak' ); ?></h1>
	<p class="subtitle"><?php esc_html_e( "Video recordings of Rinpoche's precious teachings, offered for the benefit of all beings seeking the path to liberation and enlightenment", 'kundeling-tatsak' ); ?></p>
	<div class="header-rule"></div>
</header>

<!-- ── VIDEO GRID ── -->
<section class="video-grid">

	<div class="video-card fade-in">
		<div class="video-frame">
			<iframe src="https://www.youtube.com/embed/DIF0pYl8IAc" title="Dharma Teaching by Kundeling Tatsak Rinpoche" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
		</div>
		<div class="video-caption">
			<span class="vid-tag tag-teaching"><?php esc_html_e( 'Teaching', 'kundeling-tatsak' ); ?></span>
			<h3><?php esc_html_e( 'Dharma Teaching by Kundeling Tatsak Rinpoche', 'kundeling-tatsak' ); ?></h3>
			<p><?php esc_html_e( 'A recorded teaching and dharma transmission by His Eminence on the path to liberation.', 'kundeling-tatsak' ); ?></p>
		</div>
	</div>

	<div class="video-card fade-in">
		<div class="video-frame">
			<iframe src="https://www.youtube.com/embed/OfNQ9GU4_rI" title="Dharma Talk by Kundeling Tatsak Rinpoche" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
		</div>
		<div class="video-caption">
			<span class="vid-tag tag-dharma-talk"><?php esc_html_e( 'Dharma Talk', 'kundeling-tatsak' ); ?></span>
			<h3><?php esc_html_e( 'Dharma Talk by Kundeling Tatsak Rinpoche', 'kundeling-tatsak' ); ?></h3>
			<p><?php esc_html_e( 'A recorded dharma talk by His Eminence on the practice of compassion and wisdom.', 'kundeling-tatsak' ); ?></p>
		</div>
	</div>

</section>

<?php
get_footer();
