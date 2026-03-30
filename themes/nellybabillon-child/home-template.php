<?php
/**
 * Template Name: Homepage
 */

get_header();
?>

	<main id="primary" class="site-main projects-container">
		<?php 
				$terms = get_terms("type-projet"); 
				$count = count($terms); 
				// echo '<pre>';
				// print_r($terms);
				// echo '</pre>';
				echo '<ul id="portfolio-filter" class="filter">'; 
				echo '<li class="active-tag btn btn-small filter-btn"><a href="" data-filter="*" title="Tout">Tout</a></li>'; 
				if ( $count > 0 ) { 
					foreach ( $terms as $term ) { 
						$termname = ($term->slug); 
						echo ' <li class="btn btn-small filter-btn"><a href="#'.$termname.'" title="" data-filter="'.$termname.'" rel="'.$termname.'">'.$term->name.'</a></li>'; 
					} 
				} 
				echo "</ul>"; 
			?>
		<?php
		$args = array(
			    'post_type'      => 'projet', 
			    'posts_per_page' => -1,
			);

			$custom_query = new WP_Query($args);

			if ($custom_query->have_posts()) :
			?>
			<div class="all-projects">
			    <?php while ($custom_query->have_posts()) : $custom_query->the_post();
			        $thumbnail_url = get_the_post_thumbnail_url(get_the_ID(), 'full');
			        ?>


					<section id="post-<?php the_ID(); ?>" <?php post_class('item-portfolio single-project'); ?> role="article" >
						<a class="project-link" href="<?php 

						if(get_field('url')) {
							echo esc_attr( get_field('url') ).'" target="blank"';
						} else{
							the_permalink(get_the_ID());
						}?>">
							<div class="title-project-wrapper flex-column">
								
								<h2 class="category">
									<?php 
										$terms_list_object = get_the_terms(get_the_ID(), 'type-projet');
										$terms_list = join(' / ', wp_list_pluck($terms_list_object, 'name'));
										echo $terms_list;
									?>	
								</h2>

								<div class="bloc-title">
									<h2 class="single-project-name">
										<?php the_title();?>		
									</h2>
								</div>

								<div class="technos">
									<?php 
									$technos = get_the_terms(get_the_ID(), 'techno');
									if($technos) {
										foreach($technos as $techno) {
											echo '<span class="techno-tag">'.$techno->name.'</span>';
										}
									}
									?>
								</div>

								<div class="infoproject">
									<p class="details"><?php echo get_the_excerpt();?></p>
									<img class="icon" src="http://www.nellybabillon.fr/wp-content/uploads/2024/01/open-icon.png">
								</div>
							</div>
							<!-- <div class="thmb-project-wrapper">
								<img src="<?php echo esc_url($thumbnail_url);?>" class="thmb-project">
							</div> -->
						</a>
					</section>

					<?php
			    endwhile;?>
			  </div>
			<?php
			    wp_reset_postdata();
			else :
			    echo 'Aucun résultat trouvé.';
			endif;
		?>

	</main><!-- #main -->

<?php
get_sidebar();
get_footer();
