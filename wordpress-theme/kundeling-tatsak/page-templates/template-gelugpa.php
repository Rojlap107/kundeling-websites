<?php
/**
 * Template Name: Gelugpa
 *
 * @package Kundeling_Tatsak
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

get_header();

$bg_url = kundeling_media_url_by_filename( 'Gelugpa Sect.jpg', 'full' );
?>

<?php if ( $bg_url ) : ?>
<style>body::before{background-image:url('<?php echo esc_url( $bg_url ); ?>');}</style>
<?php endif; ?>

<header class="page-header">
	<div class="breadcrumb">
		<a href="<?php echo esc_url( home_url( '/' ) ); ?>">Home</a>
		<span>/</span>
		<a href="#">About</a>
		<span>/</span>
		Gelugpa Sect
	</div>
	<h1>The Gelugpa Tradition</h1>
	<p class="subtitle">The Way of Virtue — founded on rigorous scholarship, monastic discipline, and the pursuit of wisdom</p>
	<div class="header-rule"></div>
</header>

<article class="article">

	<section class="article-section fade-in">
		<h2>The Way of Virtue</h2>
		<div class="section-rule"></div>
		<p>The Gelugpa tradition, also known as the Gelug or "Way of Virtue" school, is one of the four major schools of Tibetan Buddhism. It was founded in the late 14th century by the revered Tibetan scholar and saint, Je Tsongkhapa (1357–1419), who was renowned for his deep understanding of Buddhist philosophy and his emphasis on monastic discipline.</p>
		<p>Central to the Gelugpa tradition is a strong emphasis on ethical conduct, rigorous monastic training, and a systematic approach to Buddhist teachings. Tsongkhapa's reform efforts were aimed at revitalizing monastic life and ensuring the purity of Buddhist practice.</p>
	</section>

	<div class="pull-quote fade-in">
		<blockquote>Je Tsongkhapa wrote extensively on the Madhyamaka philosophy and the Lamrim teachings, providing a comprehensive guide to the path to enlightenment.</blockquote>
	</div>

	<section class="article-section fade-in">
		<h2>Philosophical Foundation</h2>
		<div class="section-rule"></div>
		<p>He wrote extensively on Buddhist philosophy, particularly on the Madhyamaka (Middle Way) philosophy of Nagarjuna and the Lamrim (Stages of the Path) teachings, which provide a comprehensive guide to the path to enlightenment.</p>
		<p>The Gelugpa school is distinguished by its focus on logic and debate as tools for understanding and realizing the Buddha's teachings. Monastic education in the Gelug tradition includes intensive study and debate on Buddhist scriptures, philosophy, and ethics. This method helps practitioners develop a deep, analytical understanding of the Dharma.</p>

		<div class="pillars-grid">
			<div class="pillar-card">
				<span class="pillar-label">Philosophy</span>
				<h3>Madhyamaka</h3>
				<p>The Middle Way philosophy of Nagarjuna, exploring the subtlest teachings about reality including the self, or lack thereof.</p>
			</div>
			<div class="pillar-card">
				<span class="pillar-label">Path</span>
				<h3>Lamrim</h3>
				<p>Stages of the Path teachings providing a systematic, comprehensive guide from beginner to full enlightenment.</p>
			</div>
			<div class="pillar-card">
				<span class="pillar-label">Method</span>
				<h3>Logic &amp; Debate</h3>
				<p>Rigorous analytical inquiry through formal debate, developing deep understanding of the Dharma.</p>
			</div>
		</div>
	</section>

	<section class="article-section fade-in">
		<h2>Leadership &amp; Structure</h2>
		<div class="section-rule"></div>
		<p>One of the defining features of the Gelugpa tradition is its hierarchical structure, headed by the Ganden Tripa, the throne holder of Ganden Monastery, which is the principal seat of the Gelug school. Although hierarchical, great practitioners and scholars advance based on merit.</p>
		<p>However, the most internationally recognized figure within the Gelugpa lineage is His Holiness the Dalai Lama, who is outside of this merit driven leadership.</p>
	</section>

	<section class="article-section fade-in">
		<h2>Tantric Practices</h2>
		<div class="section-rule"></div>
		<p>The Gelugpa school also places great importance on tantric practices, particularly the Guhyasamaja, Chakrasamvara, and Yamantaka tantras. These advanced practices are intended for those who have established a firm foundation in the preliminary practices and philosophical study, aiming to transform the practitioner's mind and body to achieve the state of a fully enlightened being.</p>
		<p>They require a firm foundation in compassion and wisdom. This is because in these practices our harmful emotions such as anger and desire are transformed into the subtlest levels of compassion and wisdom.</p>

		<div class="tantra-list">
			<div class="tantra-item">
				<h3>Guhyasamaja</h3>
				<p>The "Secret Assembly" tantra — considered the king of all tantras in the Gelug tradition.</p>
			</div>
			<div class="tantra-item">
				<h3>Chakrasamvara</h3>
				<p>The "Wheel of Supreme Bliss" — practices for transforming ordinary experience into wisdom.</p>
			</div>
			<div class="tantra-item">
				<h3>Yamantaka</h3>
				<p>The "Destroyer of Death" — the wrathful form of Manjushri, the Bodhisattva of Wisdom.</p>
			</div>
		</div>
	</section>

	<section class="article-section fade-in">
		<h2>A Living Tradition</h2>
		<div class="section-rule"></div>
		<p>The Gelugpa sect of Tibetan Buddhism is characterized by its rigorous monastic discipline, emphasis on scholarly study and debate, and commitment to ethical conduct. Central to the study is the subtlest Madhyamaka teachings about reality including the self, or lack thereof.</p>
		<p>Its teachings, rooted in the profound insights of Je Tsongkhapa, continue to inspire practitioners to pursue a path of wisdom, compassion, and altruistic service for the benefit of all sentient beings.</p>
	</section>

</article>

<nav class="about-nav">
	<div class="about-nav-inner">
		<a href="<?php echo esc_url( home_url( '/tibetan-buddhism/' ) ); ?>" class="about-nav-link prev">
			<span class="arrow">&larr;</span>
			Tibetan Buddhism
		</a>
		<a href="<?php echo esc_url( home_url( '/lineage/' ) ); ?>" class="about-nav-link next">
			Lineage
			<span class="arrow">&rarr;</span>
		</a>
	</div>
</nav>

<?php
get_footer();
