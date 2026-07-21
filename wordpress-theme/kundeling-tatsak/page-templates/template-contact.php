<?php
/**
 * Template Name: Contact
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
		<?php esc_html_e( 'Contact', 'kundeling-tatsak' ); ?>
	</div>
	<h1><?php esc_html_e( 'Get in Touch', 'kundeling-tatsak' ); ?></h1>
	<p class="subtitle"><?php esc_html_e( 'We welcome your enquiries, requests for teachings, and correspondence with the Ladrang office', 'kundeling-tatsak' ); ?></p>
	<div class="header-rule"></div>
</header>

<!-- ── CONTACT CONTENT ── -->
<section class="contact-layout">
	<div class="contact-cards">

		<div class="contact-block fade-in">
			<div class="contact-block-icon">
				<svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><rect x="2" y="4" width="20" height="16" rx="2"/><path d="m22 7-8.97 5.7a1.94 1.94 0 0 1-2.06 0L2 7"/></svg>
			</div>
			<p class="contact-block-label"><?php esc_html_e( 'Email', 'kundeling-tatsak' ); ?></p>
			<h3>Kundeling Ladrang</h3>
			<p><a href="mailto:kundelingladrang@gmail.com">kundelingladrang@gmail.com</a></p>
		</div>

		<div class="contact-block fade-in">
			<div class="contact-block-icon">
				<svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><path d="M20 10c0 6-8 12-8 12s-8-6-8-12a8 8 0 0 1 16 0Z"/><circle cx="12" cy="10" r="3"/></svg>
			</div>
			<p class="contact-block-label"><?php esc_html_e( 'Address', 'kundeling-tatsak' ); ?></p>
			<h3>Kundeling Ladrang</h3>
			<address>
				Dre Gomang Lama Camp No. 2<br>
				P.O. Tibetan Colony, 581411<br>
				Mundgod, Karnataka State<br>
				India
			</address>
			<a href="https://www.google.com/maps/search/Drepung+Gomang+Monastery+Mundgod+Karnataka+India" target="_blank" rel="noopener noreferrer" class="map-link">
				<?php esc_html_e( 'View on Google Maps', 'kundeling-tatsak' ); ?>
				<svg width="11" height="11" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M7 17L17 7"/><path d="M7 7h10v10"/></svg>
			</a>
		</div>

		<div class="contact-block fade-in">
			<div class="contact-block-icon">
				<svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07A19.5 19.5 0 0 1 4.99 12a19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 3.92 1.27h3a2 2 0 0 1 2 1.72c.127.96.361 1.903.7 2.81a2 2 0 0 1-.45 2.11L8.09 9a16 16 0 0 0 6.29 6.29l1.08-1.08a2 2 0 0 1 2.11-.45c.907.339 1.85.573 2.81.7A2 2 0 0 1 22 16.92z"/></svg>
			</div>
			<p class="contact-block-label"><?php esc_html_e( 'Phone', 'kundeling-tatsak' ); ?></p>
			<h3><?php esc_html_e( 'Ladrang Office', 'kundeling-tatsak' ); ?></h3>
			<div class="contact-phones">
				<a href="tel:+919882430529">+91 98824 30529</a>
				<a href="tel:+919972817750">+91 99728 17750</a>
			</div>
		</div>

	</div>
</section>

<?php
get_footer();
