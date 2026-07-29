<?php
/**
 * Template Name: Gallery (Video)
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
		<a href="<?php echo esc_url( home_url( '/' ) ); ?>">Home</a>
		<span>/</span>
		<a href="<?php echo esc_url( home_url( '/gallery/' ) ); ?>">Gallery</a>
		<span>/</span>
		Videos
	</div>
	<h1>Video Gallery</h1>
	<p class="subtitle">Dharma teachings, ceremonies, and precious moments captured on video</p>
	<div class="header-rule"></div>
</header>

<section class="video-gallery-content">

	<div class="gallery-tabs">
		<div class="gallery-tab-pill">
			<a href="<?php echo esc_url( home_url( '/gallery/' ) ); ?>">Photo Gallery</a>
			<a href="<?php echo esc_url( get_permalink() ); ?>" class="active">Video Gallery</a>
		</div>
	</div>

	<div class="video-grid">

		<div class="video-card fade-in">
			<div class="video-frame">
				<iframe src="https://www.youtube.com/embed/DIF0pYl8IAc" title="Dharma Teaching by Kundeling Tatsak Rinpoche" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
			</div>
			<div class="video-caption">
				<span class="vid-tag tag-teaching">Teaching</span>
				<h3>Dharma Teaching by Kundeling Tatsak Rinpoche</h3>
				<p>A recorded teaching and dharma transmission by His Eminence.</p>
			</div>
		</div>

		<div class="video-card fade-in">
			<div class="video-frame">
				<iframe src="https://www.youtube.com/embed/OfNQ9GU4_rI" title="Dharma Talk by Kundeling Tatsak Rinpoche" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
			</div>
			<div class="video-caption">
				<span class="vid-tag tag-dharma-talk">Dharma Talk</span>
				<h3>Dharma Talk by Kundeling Tatsak Rinpoche</h3>
				<p>A recorded dharma talk and teaching by His Eminence.</p>
			</div>
		</div>

		<div class="video-card fade-in">
			<div class="video-frame"><div class="coming-soon"><span>Coming Soon</span></div></div>
			<div class="video-caption">
				<span class="vid-tag tag-teaching">Teaching</span>
				<h3>Upcoming Teaching</h3>
				<p>New video content will be available soon.</p>
			</div>
		</div>

		<div class="video-card fade-in">
			<div class="video-frame"><div class="coming-soon"><span>Coming Soon</span></div></div>
			<div class="video-caption">
				<span class="vid-tag tag-dharma-talk">Dharma Talk</span>
				<h3>Upcoming Dharma Talk</h3>
				<p>New video content will be available soon.</p>
			</div>
		</div>

		<div class="video-card fade-in">
			<div class="video-frame"><div class="coming-soon"><span>Coming Soon</span></div></div>
			<div class="video-caption">
				<span class="vid-tag tag-teaching">Teaching</span>
				<h3>Upcoming Teaching</h3>
				<p>New video content will be available soon.</p>
			</div>
		</div>

		<div class="video-card fade-in">
			<div class="video-frame"><div class="coming-soon"><span>Coming Soon</span></div></div>
			<div class="video-caption">
				<span class="vid-tag tag-dharma-talk">Dharma Talk</span>
				<h3>Upcoming Dharma Talk</h3>
				<p>New video content will be available soon.</p>
			</div>
		</div>

	</div>
</section>

<?php
get_footer();
