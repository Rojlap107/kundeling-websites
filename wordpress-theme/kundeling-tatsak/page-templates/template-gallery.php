<?php
/**
 * Template Name: Gallery (Photo)
 *
 * Main photo-gallery index: category sections of collection cards. Each card
 * links to a page at /gallery/<slug>/ using the "Gallery Collection" template.
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
		<?php esc_html_e( 'Gallery', 'kundeling-tatsak' ); ?>
	</div>
	<h1><?php esc_html_e( 'Photo Gallery', 'kundeling-tatsak' ); ?></h1>
	<p class="subtitle"><?php esc_html_e( 'Moments from the life and travels of His Eminence Kundeling Tatsak Rinpoche', 'kundeling-tatsak' ); ?></p>
	<div class="header-rule"></div>
</header>

<!-- ── GALLERY TAB SWITCHER ── -->
<div class="gallery-tabs">
	<div class="gallery-tab-pill">
		<a href="<?php echo esc_url( get_permalink() ); ?>" class="active"><?php esc_html_e( 'Photo Gallery', 'kundeling-tatsak' ); ?></a>
		<a href="<?php echo esc_url( home_url( '/gallery/videos/' ) ); ?>"><?php esc_html_e( 'Video Gallery', 'kundeling-tatsak' ); ?></a>
	</div>
</div>

<div class="gallery-category fade-in">
        <h2 class="category-title">Travels &amp; Teachings</h2>
        <div class="category-rule"></div>
        <div class="gallery-grid">
            <a href="<?php echo esc_url( home_url( '/gallery/andorra/' ) ); ?>" class="gallery-card">
                <span class="card-category">Europe</span>
                <h3>Andorra</h3>
                <p class="card-desc">Diplomatic and spiritual engagements in the Principality of Andorra.</p>
                <span class="card-meta">Photo Collection</span>
            </a>
            <a href="<?php echo esc_url( home_url( '/gallery/boston-us/' ) ); ?>" class="gallery-card">
                <span class="card-category">United States</span>
                <h3>Boston, US</h3>
                <p class="card-desc">Teachings and community visits in Boston, Massachusetts.</p>
                <span class="card-meta">Photo Collection</span>
            </a>
            <a href="<?php echo esc_url( home_url( '/gallery/california-us/' ) ); ?>" class="gallery-card">
                <span class="card-category">United States</span>
                <h3>California, US</h3>
                <p class="card-desc">Dharma activities and meetings on the West Coast.</p>
                <span class="card-meta">Photo Collection</span>
            </a>
            <a href="<?php echo esc_url( home_url( '/gallery/connecticut-us/' ) ); ?>" class="gallery-card">
                <span class="card-category">United States</span>
                <h3>Connecticut, US</h3>
                <p class="card-desc">Teachings and blessings in Connecticut.</p>
                <span class="card-meta">Photo Collection</span>
            </a>
            <a href="<?php echo esc_url( home_url( '/gallery/czech-republic/' ) ); ?>" class="gallery-card">
                <span class="card-category">Europe</span>
                <h3>Czech Republic</h3>
                <p class="card-desc">Dharma teachings and cultural engagements in the Czech Republic.</p>
                <span class="card-meta">Photo Collection</span>
            </a>
            <a href="<?php echo esc_url( home_url( '/gallery/germany/' ) ); ?>" class="gallery-card">
                <span class="card-category">Europe</span>
                <h3>Germany</h3>
                <p class="card-desc">Teachings and community gatherings across Germany.</p>
                <span class="card-meta">Photo Collection</span>
            </a>
            <a href="<?php echo esc_url( home_url( '/gallery/italy/' ) ); ?>" class="gallery-card">
                <span class="card-category">Europe</span>
                <h3>Italy</h3>
                <p class="card-desc">Interfaith dialogue and meeting with His Holiness the Pope.</p>
                <span class="card-meta">Photo Collection</span>
            </a>
            <a href="<?php echo esc_url( home_url( '/gallery/kumbh-mela/' ) ); ?>" class="gallery-card">
                <span class="card-category">India</span>
                <h3>Kumbh Mela</h3>
                <p class="card-desc">Participation in one of the world's largest spiritual gatherings.</p>
                <span class="card-meta">Photo Collection</span>
            </a>
            <a href="<?php echo esc_url( home_url( '/gallery/mon-tawang/' ) ); ?>" class="gallery-card">
                <span class="card-category">India</span>
                <h3>Mon Tawang</h3>
                <p class="card-desc">Visit to the historic Tawang Monastery in Arunachal Pradesh.</p>
                <span class="card-meta">Photo Collection</span>
            </a>
            <a href="<?php echo esc_url( home_url( '/gallery/mongolia/' ) ); ?>" class="gallery-card">
                <span class="card-category">Asia</span>
                <h3>Mongolia</h3>
                <p class="card-desc">Reviving Buddhist connections in the land of Chinggis Khan.</p>
                <span class="card-meta">Photo Collection</span>
            </a>
            <a href="<?php echo esc_url( home_url( '/gallery/nepal/' ) ); ?>" class="gallery-card">
                <span class="card-category">Asia</span>
                <h3>Nepal</h3>
                <p class="card-desc">Pilgrimages and teachings in the birthplace of the Buddha.</p>
                <span class="card-meta">Photo Collection</span>
            </a>
            <a href="<?php echo esc_url( home_url( '/gallery/new-york/' ) ); ?>" class="gallery-card">
                <span class="card-category">United States</span>
                <h3>New York</h3>
                <p class="card-desc">Dharma events and community engagements in New York.</p>
                <span class="card-meta">Photo Collection</span>
            </a>
            <a href="<?php echo esc_url( home_url( '/gallery/russia/' ) ); ?>" class="gallery-card">
                <span class="card-category">Europe</span>
                <h3>Russia</h3>
                <p class="card-desc">Teachings and Buddhist revival activities in Russia.</p>
                <span class="card-meta">Photo Collection</span>
            </a>
            <a href="<?php echo esc_url( home_url( '/gallery/spain/' ) ); ?>" class="gallery-card">
                <span class="card-category">Europe</span>
                <h3>Spain</h3>
                <p class="card-desc">Dharma teachings and cultural exchanges in Spain.</p>
                <span class="card-meta">Photo Collection</span>
            </a>
            <a href="<?php echo esc_url( home_url( '/gallery/sri-lanka/' ) ); ?>" class="gallery-card">
                <span class="card-category">Asia</span>
                <h3>Sri Lanka</h3>
                <p class="card-desc">Inter-tradition Buddhist dialogue in Sri Lanka.</p>
                <span class="card-meta">Photo Collection</span>
            </a>
            <a href="<?php echo esc_url( home_url( '/gallery/switzerland/' ) ); ?>" class="gallery-card">
                <span class="card-category">Europe</span>
                <h3>Switzerland</h3>
                <p class="card-desc">Teachings and community visits in Switzerland.</p>
                <span class="card-meta">Photo Collection</span>
            </a>
            <a href="<?php echo esc_url( home_url( '/gallery/ladakh/' ) ); ?>" class="gallery-card">
                <span class="card-category">India</span>
                <h3>Ladakh</h3>
                <p class="card-desc">Spiritual activities in the high-altitude Buddhist heartland.</p>
                <span class="card-meta">Photo Collection</span>
            </a>
            <a href="<?php echo esc_url( home_url( '/gallery/gaya/' ) ); ?>" class="gallery-card">
                <span class="card-category">India</span>
                <h3>Gaya</h3>
                <p class="card-desc">Pilgrimage to Bodh Gaya, the site of the Buddha's enlightenment.</p>
                <span class="card-meta">Photo Collection</span>
            </a>
        </div>
    </div>

    <!-- Category 2: With Dignitaries -->
    <div class="gallery-category fade-in">
        <h2 class="category-title">With Dignitaries</h2>
        <div class="category-rule"></div>
        <div class="gallery-grid">
            <a href="<?php echo esc_url( home_url( '/gallery/with-his-holiness-the-dalai-lama/' ) ); ?>" class="gallery-card">
                <span class="card-category">Spiritual Leaders</span>
                <h3>With His Holiness the Dalai Lama</h3>
                <p class="card-desc">Meetings and audiences with His Holiness the 14th Dalai Lama.</p>
                <span class="card-meta">Photo Collection</span>
            </a>
            <a href="<?php echo esc_url( home_url( '/gallery/with-prime-minister-modi/' ) ); ?>" class="gallery-card">
                <span class="card-category">Political Leaders</span>
                <h3>With Prime Minister Modi</h3>
                <p class="card-desc">Engagements with the Prime Minister of India.</p>
                <span class="card-meta">Photo Collection</span>
            </a>
            <a href="<?php echo esc_url( home_url( '/gallery/politicians-and-people/' ) ); ?>" class="gallery-card">
                <span class="card-category">Dignitaries</span>
                <h3>Politicians &amp; People</h3>
                <p class="card-desc">Meetings with political figures and community leaders.</p>
                <span class="card-meta">Photo Collection</span>
            </a>
            <a href="<?php echo esc_url( home_url( '/gallery/taiwan-embassy-delhi/' ) ); ?>" class="gallery-card">
                <span class="card-category">Diplomacy</span>
                <h3>Taiwan Embassy, Delhi</h3>
                <p class="card-desc">Diplomatic engagements at the Taiwan Embassy in New Delhi.</p>
                <span class="card-meta">Photo Collection</span>
            </a>
            <a href="<?php echo esc_url( home_url( '/gallery/tyc-meeting/' ) ); ?>" class="gallery-card">
                <span class="card-category">Community</span>
                <h3>TYC Meeting</h3>
                <p class="card-desc">Engagements with the Tibetan Youth Congress.</p>
                <span class="card-meta">Photo Collection</span>
            </a>
        </div>
    </div>

    <!-- Category 3: Community -->
    <div class="gallery-category fade-in">
        <h2 class="category-title">Community</h2>
        <div class="category-rule"></div>
        <div class="gallery-grid">
            <a href="<?php echo esc_url( home_url( '/gallery/mundgod-india/' ) ); ?>" class="gallery-card">
                <span class="card-category">India</span>
                <h3>Mundgod, India</h3>
                <p class="card-desc">Life and activities at the Tibetan settlement in Mundgod, Karnataka.</p>
                <span class="card-meta">Photo Collection</span>
            </a>
            <a href="<?php echo esc_url( home_url( '/gallery/tcv/' ) ); ?>" class="gallery-card">
                <span class="card-category">Education</span>
                <h3>TCV</h3>
                <p class="card-desc">Visits and events at Tibetan Children's Village schools.</p>
                <span class="card-meta">Photo Collection</span>
            </a>
            <a href="<?php echo esc_url( home_url( '/gallery/chauntra/' ) ); ?>" class="gallery-card">
                <span class="card-category">India</span>
                <h3>Chauntra</h3>
                <p class="card-desc">Community activities at the Chauntra settlement in Himachal Pradesh.</p>
                <span class="card-meta">Photo Collection</span>
            </a>
        </div>
    </div>

    <!-- Category 4: Portraits & Heritage -->
    <div class="gallery-category fade-in">
        <h2 class="category-title">Portraits &amp; Heritage</h2>
        <div class="category-rule"></div>
        <div class="gallery-grid">
            <a href="<?php echo esc_url( home_url( '/gallery/portrait/' ) ); ?>" class="gallery-card">
                <span class="card-category">Portraits</span>
                <h3>Portrait</h3>
                <p class="card-desc">Formal and informal portraits of His Eminence Kundeling Tatsak Rinpoche.</p>
                <span class="card-meta">Photo Collection</span>
            </a>
            <a href="<?php echo esc_url( home_url( '/gallery/previous-tatsak-rinpoche/' ) ); ?>" class="gallery-card">
                <span class="card-category">Heritage</span>
                <h3>Previous Tatsak Rinpoche</h3>
                <p class="card-desc">Historical photographs of previous incarnations of Tatsak Rinpoche.</p>
                <span class="card-meta">Photo Collection</span>
            </a>
        </div>
    </div>

</section>

<?php
get_footer();
