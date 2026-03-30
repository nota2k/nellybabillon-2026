<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package nellybabillon
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<div class="column" id="left">
			<a class="back" href="<?php echo esc_url( home_url() ); ?>">
				<svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 256 256"><g fill="blue"><path d="M224 128a96 96 0 1 1-96-96a96 96 0 0 1 96 96" opacity="0.2"/><path d="M128 24a104 104 0 1 0 104 104A104.11 104.11 0 0 0 128 24m0 192a88 88 0 1 1 88-88a88.1 88.1 0 0 1-88 88m48-88a8 8 0 0 1-8 8h-60.69l18.35 18.34a8 8 0 0 1-11.32 11.32l-32-32a8 8 0 0 1 0-11.32l32-32a8 8 0 0 1 11.32 11.32L107.31 120H168a8 8 0 0 1 8 8"/></g></svg>
			</a>
		<?php
			if ( is_singular() ) :
				the_title( '<h1 class="entry-title-project">', '</h1>' );
			else :
				the_title( '<h2 class="entry-title-project"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
			endif;

			$technos = get_the_terms(get_the_ID(), 'techno');
			if($technos) {
				echo '<div class="technos">';
				foreach($technos as $techno) {
					echo '<span class="techno-tag">'.$techno->name.'</span>';
				}
				echo '</div>';
			}
		?>
		<hr class="split"/>
		<p class="description">
			<?php the_field('description_projet'); ?>
		</p>
		</div>
		<div class="column" id="right">
			<div class="arc"></div>
			<?php nellybabillon_post_thumbnail(); ?>
		</div>
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php
		the_content(
			sprintf(
				wp_kses(
					/* translators: %s: Name of current post. Only visible to screen readers */
					__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'nellybabillon' ),
					array(
						'span' => array(
							'class' => array(),
						),
					)
				),
				wp_kses_post( get_the_title() )
			)
		);
		?>
		<a class="back" href="<?php echo esc_url( home_url() ); ?>">
				<svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 256 256"><g fill="blue"><path d="M224 128a96 96 0 1 1-96-96a96 96 0 0 1 96 96" opacity="0.2"/><path d="M128 24a104 104 0 1 0 104 104A104.11 104.11 0 0 0 128 24m0 192a88 88 0 1 1 88-88a88.1 88.1 0 0 1-88 88m48-88a8 8 0 0 1-8 8h-60.69l18.35 18.34a8 8 0 0 1-11.32 11.32l-32-32a8 8 0 0 1 0-11.32l32-32a8 8 0 0 1 11.32 11.32L107.31 120H168a8 8 0 0 1 8 8"/></g></svg>
		</a>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php nellybabillon_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-<?php the_ID(); ?> -->
