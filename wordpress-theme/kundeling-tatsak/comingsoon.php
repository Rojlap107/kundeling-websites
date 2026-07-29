<?php
/**
 * Standalone "Coming Soon" page. Served to visitors (not logged-in editors)
 * when the Coming Soon toggle is enabled in Settings → Reading. Outputs its
 * own complete document — it deliberately bypasses the normal header/footer.
 *
 * @package Kundeling_Tatsak
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$photo = kundeling_media_url_by_filename( 'mmexport1587457493084-scaled.jpg', 'large' );

nocache_headers();
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="robots" content="noindex,follow">
	<title><?php echo esc_html( get_bloginfo( 'name' ) ); ?> — Coming Soon</title>
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=DM+Sans:ital,opsz,wght@0,9..40,400;0,9..40,500&family=Fraunces:ital,opsz,wght@0,9..144,300;0,9..144,400&family=Cormorant:ital,wght@1,400;1,500&display=swap" rel="stylesheet">
	<style>
		* { margin: 0; padding: 0; box-sizing: border-box; }
		html, body { height: 100%; }
		body {
			font-family: 'DM Sans', sans-serif;
			background: radial-gradient(120% 80% at 50% 0%, #faf8f4 0%, #f1ece4 55%, #ece5da 100%);
			color: #2b2622;
			min-height: 100vh;
			display: flex;
			align-items: center;
			justify-content: center;
			padding: 48px 24px;
			-webkit-font-smoothing: antialiased;
		}
		.soon {
			width: 100%;
			max-width: 520px;
			text-align: center;
		}
		.eyebrow {
			font-size: 0.7rem;
			font-weight: 500;
			letter-spacing: 3px;
			text-transform: uppercase;
			color: #8b6d47;
			margin-bottom: 14px;
		}
		h1 {
			font-family: 'Fraunces', serif;
			font-weight: 300;
			font-size: clamp(2.4rem, 7vw, 3.6rem);
			line-height: 1.05;
			letter-spacing: 0.5px;
			margin-bottom: 34px;
		}
		.photo {
			width: 100%;
			max-width: 430px;
			height: auto;
			display: block;
			margin: 0 auto;
			border-radius: 16px;
			box-shadow: 0 24px 60px rgba(43, 38, 34, 0.22);
		}
		.msg {
			font-family: 'Cormorant', serif;
			font-style: italic;
			font-size: 1.18rem;
			line-height: 1.6;
			color: #5c534a;
			max-width: 480px;
			margin: 34px auto 30px;
		}
		.socials {
			display: flex;
			gap: 16px;
			justify-content: center;
			margin-top: 40px;
		}
		.socials a {
			width: 46px;
			height: 46px;
			border-radius: 50%;
			display: flex;
			align-items: center;
			justify-content: center;
			background: rgba(255, 255, 255, 0.75);
			border: 1px solid rgba(139, 109, 71, 0.18);
			color: #6b5c47;
			text-decoration: none;
			transition: all 0.3s ease;
		}
		.socials a:hover {
			background: #8b6d47;
			color: #fff;
			transform: translateY(-3px);
			box-shadow: 0 10px 22px rgba(139, 109, 71, 0.28);
		}
		.note {
			margin-top: 38px;
			font-size: 0.72rem;
			letter-spacing: 1px;
			text-transform: uppercase;
			color: #a89a88;
		}
		@media (max-width: 600px) {
			h1 { margin-bottom: 26px; }
			.photo { max-width: 300px; }
			.msg { font-size: 1.05rem; }
		}
	</style>
</head>
<body>
	<main class="soon">
		<p class="eyebrow"><?php esc_html_e( 'His Eminence Kundeling Tatsak Rinpoche', 'kundeling-tatsak' ); ?></p>
		<h1><?php esc_html_e( 'Coming Soon', 'kundeling-tatsak' ); ?></h1>
		<?php if ( $photo ) : ?>
			<img class="photo" src="<?php echo esc_url( $photo ); ?>" alt="<?php esc_attr_e( 'His Eminence the 13th Kundeling Tatsak Rinpoche', 'kundeling-tatsak' ); ?>">
		<?php endif; ?>
		<div class="socials">
			<a href="https://www.instagram.com/kundeling_tatsak_rinpoche/" target="_blank" rel="noopener" aria-label="Instagram"><svg viewBox="0 0 24 24" width="20" height="20" fill="currentColor"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zM12 0C8.741 0 8.333.014 7.053.072 2.695.272.273 2.69.073 7.052.014 8.333 0 8.741 0 12c0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98C8.333 23.986 8.741 24 12 24c3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98C15.668.014 15.259 0 12 0zm0 5.838a6.162 6.162 0 100 12.324 6.162 6.162 0 000-12.324zM12 16a4 4 0 110-8 4 4 0 010 8zm6.406-11.845a1.44 1.44 0 100 2.881 1.44 1.44 0 000-2.881z"/></svg></a>
			<a href="https://www.facebook.com/p/Kundeling-Tatsak-Rinpoche-100063684593364/" target="_blank" rel="noopener" aria-label="Facebook"><svg viewBox="0 0 24 24" width="20" height="20" fill="currentColor"><path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/></svg></a>
			<a href="https://www.youtube.com/@kundelingtatsakrinpoche6907" target="_blank" rel="noopener" aria-label="YouTube"><svg viewBox="0 0 24 24" width="20" height="20" fill="currentColor"><path d="M23.498 6.186a3.016 3.016 0 00-2.122-2.136C19.505 3.545 12 3.545 12 3.545s-7.505 0-9.377.505A3.017 3.017 0 00.502 6.186C0 8.07 0 12 0 12s0 3.93.502 5.814a3.016 3.016 0 002.122 2.136c1.871.505 9.376.505 9.376.505s7.505 0 9.377-.505a3.015 3.015 0 002.122-2.136C24 15.93 24 12 24 12s0-3.93-.502-5.814zM9.545 15.568V8.432L15.818 12l-6.273 3.568z"/></svg></a>
		</div>
		<p class="note">tatsakrinpoche.com</p>
	</main>
</body>
</html>
<?php
exit;
