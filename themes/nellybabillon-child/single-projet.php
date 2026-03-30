<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package nellybabillon
 */

get_header();
?>

	<main id="primary" class="site-main">
		
		<?php
		while ( have_posts() ) :
			the_post();
			// get_template_part( 'template-parts/content', get_post_type() );
			// the_post_navigation(
			// 	array(
			// 		'prev_text' => '<span class="nav-subtitle"><svg class="arrow-icon" xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24"><path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="m4 12l6-6m-6 6l6 6m-6-6h10.5m5.5 0h-2.5"/></svg></span> <span class="nav-title">%title</span>',
			// 		'next_text' => '<span class="nav-subtitle"></span> <span class="nav-title">%title</span><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24"><path fill="none" stroke="#ffffff" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 12h2.5M20 12l-6-6m6 6l-6 6m6-6H9.5"/></svg>',
			// 	)
			// );

			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;

			if (has_term( 'print','type-projet' )){
				get_template_part('template-parts/content', 'graphisme');
			}
			elseif (has_term( 'photographie','type-projet' )) {
				get_template_part('template-parts/content', 'photo');		       
		    }
		    elseif (has_term('graphisme', 'type-projet')) {
				get_template_part('template-parts/content', 'graphisme');		       
		    } else {
		      get_template_part('content', get_post_type());
		    }

			

		endwhile; // End of the loop.
		?>

	</main><!-- #main -->

<?php
get_sidebar();
get_footer();
