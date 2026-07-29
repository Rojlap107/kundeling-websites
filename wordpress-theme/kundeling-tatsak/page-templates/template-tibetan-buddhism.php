<?php
/**
 * Template Name: Tibetan Buddhism
 *
 * @package Kundeling_Tatsak
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

get_header();

$bg_url = kundeling_media_url_by_filename( 'Tibetan Buddhism.jpg', 'full' );
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
		Tibetan Buddhism
	</div>
	<h1>Tibetan Buddhism</h1>
	<p class="subtitle">A living tradition of wisdom, compassion, and devotion woven into the heart of Tibetan life</p>
	<div class="header-rule"></div>
</header>

<article class="article">

	<section class="article-section fade-in">
		<h2>A Way of Life</h2>
		<div class="section-rule"></div>
		<p>Buddhism is a spiritual tradition that has shaped the cultural and philosophical landscape of Tibet for nearly a millennium and a half. Buddhism in Tibet is not just a religion but a way of life, deeply interwoven with our daily practices, values, and collective consciousness.</p>
		<p>Buddhism was introduced to Tibet in the 7th century, primarily through the efforts of Indian scholars such as Shantarakshita and Padmasambhava, who were invited to Tibet by the then-king, Trisong Deutsen. Their teachings laid the foundation for what would become Tibetan Buddhism, a unique blend of Mahayana and Vajrayana traditions, enriched by the indigenous Bon practices.</p>
	</section>

	<div class="pull-quote fade-in">
		<blockquote>The altruistic aspiration to attain Buddhahood not for oneself alone, but to help all beings find liberation from suffering.</blockquote>
	</div>

	<section class="article-section fade-in">
		<h2>Bodhicitta &amp; Compassion</h2>
		<div class="section-rule"></div>
		<p>Central to Tibetan Buddhism is the pursuit of enlightenment for the benefit of all sentient beings. This altruistic motivation, known as Bodhicitta, is the heart of our practice. It reflects the compassionate aspiration to attain Buddhahood not for oneself alone, but to help others find liberation from suffering and full enlightenment or Buddhahood. This profound compassion, encompassing wisdom, is embodied in the figure of Avalokiteshvara, the Bodhisattva of Compassion, who holds a special place in Tibetan hearts and minds.</p>
	</section>

	<section class="article-section fade-in">
		<h2>The Guru-Disciple Relationship</h2>
		<div class="section-rule"></div>
		<p>Tibetan Buddhism places a significant emphasis on the Guru-Disciple relationship, recognizing the importance of a qualified teacher in guiding one's spiritual journey. Eventually the external guru shifts to our internal guru as we gain correct experience. The teachings are transmitted through an unbroken lineage of realized masters, ensuring the authenticity and purity of the teachings. This lineage is symbolized by the Dalai Lama, who is revered not only as a spiritual leader but also as a symbol of Tibetan identity and resilience.</p>
	</section>

	<section class="article-section fade-in">
		<h2>Sacred Arts &amp; Ritual</h2>
		<div class="section-rule"></div>
		<p>One of the most distinctive aspects of Tibetan Buddhism is its rich ritual and artistic expressions. From the intricate sand mandalas that symbolize the impermanence of life to the melodious chanting of mantras that resonate with the energy of the universe, these practices are designed to engage all aspects of our being — body, speech, and mind — in the path to enlightenment.</p>
		<p>The sacred texts, thangkas (Buddhist paintings), and stupas (relic monuments) are not merely objects of reverence but are integral to our meditative and devotional practices. Thus Tibetan Buddhist rituals have deep meaning augmenting our deepest understanding and experience of reality through bodhicitta, wisdom and compassion.</p>

		<div class="aspects-grid">
			<div class="aspect-card">
				<span class="aspect-label">Visual Arts</span>
				<h3>Sand Mandalas</h3>
				<p>Intricate geometric creations symbolizing the impermanence of all compounded phenomena.</p>
			</div>
			<div class="aspect-card">
				<span class="aspect-label">Sacred Sound</span>
				<h3>Mantra Chanting</h3>
				<p>Melodious recitations that resonate with the energy of the universe, engaging body, speech, and mind.</p>
			</div>
			<div class="aspect-card">
				<span class="aspect-label">Sacred Painting</span>
				<h3>Thangkas</h3>
				<p>Detailed scroll paintings depicting Buddhas, bodhisattvas, and the stages of the spiritual path.</p>
			</div>
			<div class="aspect-card">
				<span class="aspect-label">Sacred Architecture</span>
				<h3>Stupas</h3>
				<p>Relic monuments serving as focal points for meditation, devotion, and the accumulation of merit.</p>
			</div>
		</div>
	</section>

	<section class="article-section fade-in">
		<h2>Relevance in the Modern World</h2>
		<div class="section-rule"></div>
		<p>In today's world, the teachings of Buddhism are more relevant than ever. Despite our advances in technology, AI, and medicine, we face a growing crisis of mental health, marked by stress, anxiety, and a sense of disconnection and hopelessness. The teachings of the Buddha offer a path to inner peace and resilience, emphasizing mindfulness, compassion, and ethical living. These principles can help us navigate the complexities of modern life, fostering a sense of wellbeing that transcends material achievements.</p>
		<p>The Dalai Lama, our most prominent leader, tirelessly advocates for peace, compassion, and environmental sustainability. His message echoes the Buddha's universal call for harmony and non-violence. His efforts remind us that our spiritual practice must extend beyond meditation and rituals to embrace active engagement in alleviating the suffering of others and protecting our planet.</p>
	</section>

	<section class="article-section fade-in">
		<h2>Interdependence</h2>
		<div class="section-rule"></div>
		<p>Tibetan Buddhism also underscores the importance of interdependence, a principle that is increasingly relevant in our globalized world. Understanding that our happiness and well-being are intertwined with that of others encourages us to act with kindness and responsibility. It is through this lens of interconnectedness that we approach the challenges of our time, seeking solutions that benefit all beings.</p>
		<p>Buddhism, as practiced and lived in Tibet, is a rich tapestry of wisdom, compassion, and devotion to serve others. It offers not only a path to personal enlightenment but also a guide to living harmoniously with others and the natural world. As we navigate the complexities of modern life, the timeless teachings of the Buddha provide a beacon of hope and a reminder of our shared potential for enlightenment and boundless compassion.</p>
	</section>

</article>

<nav class="about-nav">
	<div class="about-nav-inner">
		<a href="<?php echo esc_url( home_url( '/buddhism/' ) ); ?>" class="about-nav-link prev">
			<span class="arrow">&larr;</span>
			Buddhism
		</a>
		<a href="<?php echo esc_url( home_url( '/gelugpa/' ) ); ?>" class="about-nav-link next">
			Gelugpa Sect
			<span class="arrow">&rarr;</span>
		</a>
	</div>
</nav>

<?php
get_footer();
