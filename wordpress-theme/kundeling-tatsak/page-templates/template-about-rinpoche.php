<?php
/**
 * Template Name: About Rinpoche
 *
 * @package Kundeling_Tatsak
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

get_header();

$bg_url      = kundeling_media_url_by_filename( 'about kundleing.jpg', 'full' );
$founder_url = kundeling_media_url_by_filename( '1. Baso Choekyi Gyaltsen.jpg', 'large' );
$hhdl_url    = kundeling_media_url_by_filename( 'A9300149-scaled-e1761635821911.jpg', 'large' );
$portrait_url = kundeling_media_url_by_filename( 'mmexport1587457493084-scaled.jpg', 'large' );
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
		About Rinpoche
	</div>
	<h1>Kundeling Tatsak Rinpoche</h1>
	<p class="subtitle">One of the oldest and most distinguished lineages of the Gelug tradition of Tibetan Buddhism — six centuries of profound scholarship, spiritual realisation, and compassionate service</p>
	<div class="header-rule"></div>
</header>

<article class="article">

	<section class="article-section fade-in">
		<h2>An Enduring Lineage</h2>
		<div class="section-rule"></div>
		<p>The Kyabje Kundeling Tatsak Rinpoche lineage is one of the oldest, most distinguished, and historically influential lineages in the Gelug tradition of Tibetan Buddhism. Originating with the great Buddhist master Trichen Baso Choekyi Gyaltsen (1402&ndash;1473) &mdash; one of the principal disciples of Je Tsongkhapa and the younger brother of the First Panchen Lama, Khedrup Je &mdash; this lineage has, for over six centuries, made extraordinary contributions to the preservation and flourishing of the Buddha Dharma, the spiritual and temporal affairs of Tibet, and the welfare of countless sentient beings.</p>
		<p>Throughout its successive reincarnations, the Kundeling Tatsak lineage has consistently embodied the inseparable union of profound scholarship, spiritual realisation, compassionate leadership, and dedicated public service. It has produced eminent scholars, accomplished meditators, renowned teachers, abbots, tutors to Dalai Lamas, Regents of Tibet, diplomats, and spiritual advisors whose influence extended far beyond Tibet to Mongolia, China, and the broader Himalayan region.</p>
		<?php if ( $founder_url ) : ?>
		<figure style="margin: 40px auto; max-width: 480px; text-align: center;">
			<img src="<?php echo esc_url( $founder_url ); ?>" alt="Trichen Baso Choekyi Gyaltsen — the First Kundeling Tatsak Rinpoche" style="width: 100%; border-radius: 12px; box-shadow: 0 8px 32px rgba(28,25,23,0.1);">
			<figcaption style="margin-top: 14px; font-family: 'Cormorant', serif; font-style: italic; font-size: 0.9rem; color: var(--stone-400);">Trichen Baso Choekyi Gyaltsen — the First Kundeling Tatsak Rinpoche (1402&ndash;1473)</figcaption>
		</figure>
		<?php endif; ?>
	</section>

	<div class="pull-quote fade-in">
		<blockquote>For over six centuries, the lineage has embodied the inseparable union of profound scholarship, spiritual realisation, compassionate leadership, and dedicated public service.</blockquote>
	</div>

	<section class="article-section fade-in">
		<h2>A Close Bond with the Dalai Lamas</h2>
		<div class="section-rule"></div>
		<p>One of the most remarkable features of the Kyabje Kundeling Tatsak lineage is its exceptionally close and enduring association with the successive Dalai Lamas throughout Tibetan history. This special relationship can be traced back to the founder of the lineage, Trichen Baso Choekyi Gyaltsen, who was the younger brother and disciple of Khedrup Je, one of the foremost disciples of Je Tsongkhapa and later recognised as the First Panchen Lama.</p>
		<p>Having received many profound teachings and transmissions from Je Tsongkhapa and Khedrup Je, Baso Choekyi Gyaltsen became one of the principal holders of Je Tsongkhapa's lineage. When the position of the Sixth Ganden Tripa became vacant, His Holiness the First Dalai Lama, Gendun Drup, respectfully declined the appointment and instead personally recommended Baso Choekyi Gyaltsen, praising his unparalleled scholarship, realisation, wisdom, and service to the Buddha Dharma. Consequently, Baso Choekyi Gyaltsen became the Sixth Ganden Tripa, the supreme holder of Je Tsongkhapa's throne, and one of the principal custodians of the rare secret oral transmissions originating from Manjushri.</p>
		<p>In the centuries that followed, the Kundeling Tatsak Rinpoches maintained a close spiritual relationship with the Dalai Lamas. Successive incarnations received ordinations, teachings, and transmissions from Dalai Lamas, while several served as tutors to the Dalai Lamas, trusted spiritual advisors, and Regents of Tibet.</p>

		<?php if ( $hhdl_url ) : ?>
		<figure style="margin: 40px auto; max-width: 560px; text-align: center;">
			<img src="<?php echo esc_url( $hhdl_url ); ?>" alt="His Eminence the Kundeling Tatsak Rinpoche with His Holiness the Fourteenth Dalai Lama" style="width: 100%; border-radius: 12px; box-shadow: 0 8px 32px rgba(28,25,23,0.1);">
			<figcaption style="margin-top: 14px; font-family: 'Cormorant', serif; font-style: italic; font-size: 0.9rem; color: var(--stone-400);">His Eminence the Kundeling Tatsak Rinpoche with His Holiness the Fourteenth Dalai Lama</figcaption>
		</figure>
		<?php endif; ?>

		<div class="connections-grid">
			<div class="connection-card">
				<p class="conn-role">Sixth Ganden Tripa</p>
				<h3>Baso Choekyi Gyaltsen</h3>
				<p>Supreme holder of Je Tsongkhapa's golden throne</p>
			</div>
			<div class="connection-card">
				<p class="conn-role">Fourth Rinpoche</p>
				<h3>Tutor to the Fourth Dalai Lama</h3>
				<p>Selected as tutor before his untimely passing</p>
			</div>
			<div class="connection-card">
				<p class="conn-role">Ninth Rinpoche</p>
				<h3>Tutor to the Eleventh Dalai Lama</h3>
				<p>Entrusted with the education of the Dalai Lama</p>
			</div>
			<div class="connection-card">
				<p class="conn-role">Tenth Rinpoche</p>
				<h3>Tutor to the Thirteenth Dalai Lama</h3>
				<p>A principal tutor who bestowed the novice ordination</p>
			</div>
			<div class="connection-card">
				<p class="conn-role">Eighth &amp; Tenth Rinpoches</p>
				<h3>Regents of Tibet</h3>
				<p>Providing stable leadership after the passing of the Eighth and Twelfth Dalai Lamas</p>
			</div>
			<div class="connection-card">
				<p class="conn-role">Without the Golden Urn</p>
				<h3>Recognised the Ninth &amp; Thirteenth Dalai Lamas</h3>
				<p>Reflecting the extraordinary confidence placed in the lineage</p>
			</div>
		</div>
	</section>

	<section class="article-section fade-in">
		<h2>Contributions Across Tibet, Mongolia &amp; China</h2>
		<div class="section-rule"></div>
		<p>Throughout its history, the Kundeling Tatsak lineage has made enduring contributions not only to the preservation of the Buddha Dharma but also to the religious, cultural, and political life of Tibet. Successive incarnations founded monasteries, restored ancient temples and sacred monuments, composed important philosophical treatises, safeguarded rare oral transmission lineages, promoted monastic education, and nurtured generations of scholars and practitioners.</p>
		<p>Beyond Tibet, several Kundeling Tatsak Rinpoches strengthened the spiritual and diplomatic ties between Tibet, Mongolia, and China. His Eminence the Sixth Kundeling Tatsak Rinpoche travelled to Mongolia as the representative of His Holiness the Great Fifth Dalai Lama, helped reconcile regional conflicts, and later became the spiritual advisor to the Kangxi Emperor of the Qing Dynasty.</p>
		<p>The Seventh Kundeling Tatsak Rinpoche was invited by Emperor Qianlong, appointed Abbot of the imperial Yonghe Monastery in Beijing, and became one of the emperor's principal Buddhist teachers. His Eminence the Eighth Kundeling Tatsak Rinpoche likewise maintained close relations with the Qing court while faithfully safeguarding the interests of Tibetan Buddhism. Their lives exemplify the Mahayana ideal of combining profound wisdom with boundless compassion in service of all sentient beings.</p>
	</section>

	<section class="article-section fade-in">
		<h2>The Thirteenth Kundeling Tatsak Rinpoche</h2>
		<div class="section-rule"></div>
		<p>Today, the noble lineage continues by His Eminence the 13th Kundeling Tatsak Rinpoche, Jetsun Tenzin Choekyi Gyaltsen Palzangpo, who was born in Lhasa, Central Tibet, in 1983 to Mr. Lobsang Dhodup and Mrs. Chime Youdon amidst many auspicious signs.</p>
		<?php if ( $portrait_url ) : ?>
		<figure style="margin: 40px auto; max-width: 480px; text-align: center;">
			<img src="<?php echo esc_url( $portrait_url ); ?>" alt="His Eminence the 13th Kundeling Tatsak Rinpoche" style="width: 100%; border-radius: 12px; box-shadow: 0 8px 32px rgba(28,25,23,0.1);">
			<figcaption style="margin-top: 14px; font-family: 'Cormorant', serif; font-style: italic; font-size: 0.9rem; color: var(--stone-400);">His Eminence the 13th Kundeling Tatsak Rinpoche, Jetsun Tenzin Choekyi Gyaltsen Palzangpo (b. 1983)</figcaption>
		</figure>
		<?php endif; ?>
		<p>Following the converging indications of the State Oracle Nechung Choegyal Chenpo, Lamo Tsangpa, and a series of examinations personally conducted by His Holiness the Fourteenth Dalai Lama, he was officially recognised as the authentic reincarnation of the Twelfth Kundeling Tatsak Rinpoche. After safely arriving in India, His Holiness graciously performed the hair-cutting ceremony, bestowed novice ordination, conferred upon him the name Tenzin Choekyi Gyaltsen Palzangpo, and composed a Long Life Prayer for him.</p>
		<p>Under the guidance of His Holiness and his principal tutor, the Venerable Jetsun Lobsang Tsultrim Palzangpo, His Eminence pursued the complete traditional curriculum at Drepung Gomang Monastic University, distinguishing himself through his humility, exemplary monastic discipline, and dedication to study, debate, and meditation. Following the advice of His Holiness, he completed his Geshe studies and continued higher tantric training at Gyumed Tantric Monastery. He has since received extensive teachings, empowerments, transmissions, and profound instructions from His Holiness the Dalai Lama and many eminent masters from all traditions of Tibetan Buddhism.</p>
		<p>Acting upon the guidance of His Holiness, he actively promotes universal human values, interreligious and non-sectarian harmony, dialogue between Buddhism and modern science, and the Middle Way Approach, while encouraging unity among Tibetans beyond regional and sectarian differences. He has also restored the rare lineage of <em>The Rosary of Gems of Hundred Empowerments</em> (Wangya Norbu Trengwa), after receiving its complete transmission from His Holiness the Sakya Trizin, thereby contributing to the preservation of an important spiritual heritage. While continuing his own studies and retreat practice, His Eminence travels extensively to teach the Buddha Dharma and work for the benefit of all sentient beings.</p>
	</section>

	<section class="article-section fade-in">
		<h2>A Living Legacy</h2>
		<div class="section-rule"></div>
		<p>For more than six centuries, the Kundeling Tatsak Rinpoche lineage has remained a distinguished source of spiritual guidance, scholarship, compassionate leadership, and selfless service. Through its unwavering dedication to the teachings of the Buddha, its close association with the successive Dalai Lamas and renowned Tibetan Buddhist masters, its invaluable contributions to the religious and temporal life of Tibet, and its tireless efforts to benefit sentient beings, the lineage continues to uphold the noble legacy established by its founder and carried forward by each successive incarnation.</p>
	</section>

</article>

<nav class="about-nav">
	<div class="about-nav-inner">
		<a href="<?php echo esc_url( home_url( '/buddhism/' ) ); ?>" class="about-nav-link next">
			Buddhism
			<span class="arrow">&rarr;</span>
		</a>
	</div>
</nav>

<?php
get_footer();
