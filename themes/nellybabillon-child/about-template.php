<?php
/**
 * Template Name: CV
 */

get_header();

// Fetch ACF fields
$cv_photo = get_field('cv_photo') ?: 'https://www.nellybabillon.fr/wp-content/uploads/2024/01/pp-glitch.jpg';
$cv_bio_list = get_field('cv_bio_list') ?: 'Graphic Designer,Webdesigner,Front-End Developer';
$cv_download = get_field('cv_download') ?: 'https://www.nellybabillon.fr/wp-content/uploads/2024/03/CV_2024.pdf';
?>

<div class="main-container cv-wrapper grid">
	<a href="<?php echo esc_url(home_url('/')); ?>" class="ariane-back">
		<div class="arrow-container">
			<div class="arrow-wrap">
				<span class="arr-line" id="arr01"></span>
				<span class="arr-line" id="arr02"></span>
			</div>
			<span class="arr-line" id="arrline"></span>
		</div>
	</a>

	<a class="download-cv" href="<?php echo esc_url($cv_download); ?>" download>
		<div class="download-wrapper">
			<p>CV</p>
			<img class="clickhere" src="https://www.nellybabillon.fr/wp-content/uploads/2024/01/click-here.svg" />
		</div>
	</a>

	<div class="cv-container grid">
		<div class="intro-container grid">
			<div class="photobio-container">
				<img src="<?php echo esc_url($cv_photo); ?>" class="photobio" />
			</div>
			<div class="intro-txt-container" data-bio="<?php echo esc_attr($cv_bio_list); ?>">
				<?php /* Les paragraphes sont générés par JS à partir de l'attribut data-bio */ ?>
			</div>
		</div>

		<!-- Formations -->
		<div class="cv-title formations">
			<h1 class="formations">Formations</h1>
		</div>

		<?php if (have_rows('formations')): ?>
			<?php while (have_rows('formations')):
				the_row(); ?>
				<p class="formation-year" id="y<?php echo get_row_index(); ?>">
					<?php the_sub_field('year'); ?>
				</p>
				<div class="bloc-formation" id="formation<?php echo get_row_index(); ?>">
					<h2 class="formation"><?php the_sub_field('school'); ?></h2>
					<p><?php the_sub_field('degree'); ?></p>
				</div>
			<?php endwhile; ?>
		<?php else: ?>
			<?php /* Contenu par défaut si vide */ ?>
			<p class="formation-year" id="y01">2024 - 2025</p>
			<div class="bloc-formation" id="formation01">
				<h2 class="formation">My Digital School</h2>
				<p>Bachelor Développeur d’application</p>
			</div>
		<?php endif; ?>

		<!-- Compétences -->
		<div class="cv-title competences">
			<h1 class="formations">Compétences</h1>
		</div>

		<?php if (have_rows('competences')): ?>
			<?php while (have_rows('competences')):
				the_row(); ?>
				<div class="bloc-competences <?php the_sub_field('column'); ?>" id="comp-<?php echo get_row_index(); ?>">
					<span class="competences-title">
						<h2 class="competences"><?php the_sub_field('title'); ?></h2>
					</span>
					<p><?php the_sub_field('description'); ?></p>
				</div>
			<?php endwhile; ?>
		<?php else: ?>
			<div class="bloc-competences col-left" id="professionnelles01">
				<span class="competences-title">
					<h2 class="competences">.professionnelles</h2>
				</span>
				<p>Respect du cahier des charges, des délais, gestion du temps et de la pression, échanges clients, chiffrer
					les prestations, adaptation et réactivité</p>
			</div>
		<?php endif; ?>

		<!-- Expériences -->
		<div class="cv-title experiences">
			<h1 class="experiences">Expériences</h1>
		</div>

		<?php if (have_rows('experiences')): ?>
			<?php while (have_rows('experiences')):
				the_row(); ?>
				<h1 class="exp-year <?php the_sub_field('column'); ?>"><?php the_sub_field('year'); ?></h1>
				<div class="bloc-experiences <?php the_sub_field('column'); ?>">
					<span class="experiences-title">
						<h2 class="experiences">
							<?php the_sub_field('title'); ?>
							<?php
							$clients = get_sub_field('clients');
							if ($clients):
								$client_names = array();
								foreach ($clients as $client) {
									$client_names[] = $client['name'];
								}
								echo ' <span class="experience-client">' . implode(', ', $client_names) . '</span>';
							endif;
							?>
						</h2>
					</span>
					<?php if (get_sub_field('description')): ?>
						<p class="exp-description"><?php the_sub_field('description'); ?></p>
					<?php endif; ?>
				</div>
			<?php endwhile; ?>
		<?php else: ?>
			<h1 class="exp-year col-right">2024-2025</h1>
			<div class="bloc-experiences col-right">
				<span class="experiences-title">
					<h2 class="experiences">Développeur front-end</h2>
				</span>
				<ul class="ref">
					<li>Agence Axome</li>
					<li>LDLC</li>
				</ul>
			</div>
		<?php endif; ?>

		<!-- Line -->
		<div class="line-wrapper">
			<svg id="svg_01" width="800" height="2000" xmlns="http://www.w3.org/2000/svg">
				<line id="line" y1="200" stroke="blue" fill="none" stroke-width="5" y2="3000" x1="0" x2="0"></line>
			</svg>
		</div>
	</div>
</div>

<?php
get_footer();
