<?php
/**
 * Template Name: Buddhism
 *
 * @package Kundeling_Tatsak
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

get_header();

$bg_url = kundeling_media_url_by_filename( 'Buddhism.jpg', 'full' );
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
		Buddhism
	</div>
	<h1>Buddhism</h1>
	<p class="subtitle">A path to enlightenment through ethical living, meditation, compassion and wisdom</p>
	<div class="header-rule"></div>
</header>

<article class="article">

	<section class="article-section fade-in">
		<h2>The Enlightened One</h2>
		<div class="section-rule"></div>
		<p>Buddhism is a philosophical, psychologic, and spiritual tradition that originated in India over 2,500 years ago with the teachings of Siddhartha Gautama. He is known as the Buddha, which means "the Enlightened One." Buddhism offers a path to enlightenment through ethical living, meditation, compassion and wisdom.</p>
	</section>

	<div class="pull-quote fade-in">
		<blockquote>Suffering arises from desire and attachment. It can be overcome by following the Eightfold Path.</blockquote>
	</div>

	<section class="article-section fade-in">
		<h2>The Four Noble Truths</h2>
		<div class="section-rule"></div>
		<p>Central to Buddhism are the Four Noble Truths, which outline the nature of suffering and the path to the elimination of suffering. The Four Noble Truths teach that suffering is part and parcel of existence. Suffering arises from desire and attachment. It can be overcome by following the Eightfold Path. This path includes right understanding, intention, speech, action, livelihood, effort, mindfulness, and concentration.</p>

		<div class="path-grid">
			<div class="path-item"><div class="path-num">1</div><div class="path-label">Right<br>Understanding</div></div>
			<div class="path-item"><div class="path-num">2</div><div class="path-label">Right<br>Intention</div></div>
			<div class="path-item"><div class="path-num">3</div><div class="path-label">Right<br>Speech</div></div>
			<div class="path-item"><div class="path-num">4</div><div class="path-label">Right<br>Action</div></div>
			<div class="path-item"><div class="path-num">5</div><div class="path-label">Right<br>Livelihood</div></div>
			<div class="path-item"><div class="path-num">6</div><div class="path-label">Right<br>Effort</div></div>
			<div class="path-item"><div class="path-num">7</div><div class="path-label">Right<br>Mindfulness</div></div>
			<div class="path-item"><div class="path-num">8</div><div class="path-label">Right<br>Concentration</div></div>
		</div>
	</section>

	<section class="article-section fade-in">
		<h2>Impermanence, Interdependence &amp; Liberation</h2>
		<div class="section-rule"></div>
		<p>Buddhism emphasizes the concepts of impermanence, interdependence, and the absence of a reified self. Through practices such as mindfulness and meditation, individuals can develop greater awareness and compassion, ultimately leading to the cessation of suffering and the attainment of Nirvana, a state of liberation and peace.</p>
	</section>

	<section class="article-section fade-in">
		<h2>The Three Great Traditions</h2>
		<div class="section-rule"></div>
		<p>The tradition has diversified into various schools, including Theravada, Mahayana, and Vajrayana, each with its unique interpretations and practices. Each tradition emphasizes particular teachings of the Buddha. Despite these differences, all schools share a commitment to the core teachings of the Buddha and the pursuit of enlightenment for the benefit of all sentient beings.</p>

		<div class="schools-row">
			<div class="school-card">
				<span class="school-origin">South &amp; Southeast Asia</span>
				<h3>Theravada</h3>
				<p>The "Way of the Elders" — emphasizes individual liberation through monastic discipline and the Pali Canon.</p>
			</div>
			<div class="school-card">
				<span class="school-origin">East Asia</span>
				<h3>Mahayana</h3>
				<p>The "Great Vehicle" — emphasizes the bodhisattva ideal and the aspiration to attain enlightenment for all beings.</p>
			</div>
			<div class="school-card">
				<span class="school-origin">Tibet &amp; Himalayas</span>
				<h3>Vajrayana</h3>
				<p>The "Diamond Vehicle" — employs tantric methods and esoteric practices for swift realization of Buddhahood.</p>
			</div>
		</div>
	</section>

</article>

<nav class="about-nav">
	<div class="about-nav-inner">
		<a href="<?php echo esc_url( home_url( '/about-rinpoche/' ) ); ?>" class="about-nav-link prev">
			<span class="arrow">&larr;</span>
			About Rinpoche
		</a>
		<a href="<?php echo esc_url( home_url( '/tibetan-buddhism/' ) ); ?>" class="about-nav-link next">
			Tibetan Buddhism
			<span class="arrow">&rarr;</span>
		</a>
	</div>
</nav>

<?php
get_footer();
