<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package nellybabillon
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'nellybabillon' ); ?></a>
<div id="page" class="site main-container grid">
	

	<header id="masthead" class="bio-container">
		<div class="bio-wrapper flex-column">

			<div class="info-wrapper">
				<h1 class="site-title">
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a>
				</h1>
				<div class="infobis-wrapper">
					<h2>Graphiste</h2>
					<h2>Web Developer</h2>
				</div>
			</div>
			<a href="<?php echo esc_url(get_permalink(51)); ?>"><div class="smiley">
					<img src="https://www.nellybabillon.fr/wp-content/uploads/2024/01/smiley-txt.png" alt="curriculum vitae" class="smiley-txt-icon"/>
					<div class="smiley-container">
						<img src="https://www.nellybabillon.fr/wp-content/uploads/2024/01/smiley.png" alt="smiley qui tourne" class="smiley-icon"/>
					</div>
				</div>
			</a>
			<div class="social flex-column">
				<a target="_blank" href="https://www.linkedin.com/in/nelly-babillon/">
					<img src="https://www.nellybabillon.fr/wp-content/uploads/2024/01/linkedin.svg">
				</a>
			</div>
			<a href="<?php echo esc_url(get_permalink(245)); ?>" class="contact-wrapper flex-column">
				<p class="contact-btn">Contact
				</p>
				<img class="mail-icon" src="https://www.nellybabillon.fr/wp-content/uploads/2024/01/mail-icon.png">
			</a>
			
		</div>

	</header><!-- #masthead -->
