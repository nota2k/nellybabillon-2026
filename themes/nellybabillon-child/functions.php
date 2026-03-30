<?php

// Include ACF fields for CV
require_once get_stylesheet_directory() . '/inc/acf-cv.php';

// Style enfant uniquement : le parent charge déjà nellybabillon-style (voir thème parent)
function enqueue_child_styles() {
    $version = wp_get_theme()->get('Version');
    wp_enqueue_style(
        'child-style',
        get_stylesheet_directory_uri() . '/style.css',
        array('nellybabillon-style'),
        $version
    );
}

add_action('wp_enqueue_scripts', 'enqueue_child_styles');

function style_editor_gutenberg() {
    add_theme_support( 'editor-styles' );
    add_editor_style('style-editor.css');
}
add_action('after_setup_theme', 'style_editor_gutenberg');

function enqueue_child_theme_script() {
    wp_register_script('sidebar-script', get_stylesheet_directory_uri() . '/js/sidebar.js', array(), '1.0', true);

    wp_enqueue_script('sidebar-script');
}
add_action('wp_enqueue_scripts', 'enqueue_child_theme_script');


// Load script only for custom templates
function enqueue_custom_script_for_page_template() {
    if (is_page_template('about-template.php')) { // Remplacez 'votre-template.php' par le nom de votre modèle de page
        wp_enqueue_script('cv', get_stylesheet_directory_uri() . '/js/cv.js', array(), '1.0', true);
    }
    else{ // Remplacez 'votre-template.php' par le nom de votre modèle de page
        wp_enqueue_script('allprojects', get_stylesheet_directory_uri() . '/js/allprojects.js', array(), '1.0', true);
        wp_enqueue_script('isotope-script', get_stylesheet_directory_uri() . '/js/isotope.pkgd.min.js', array('jquery'), '1.5.19', true);
        // wp_enqueue_script('isotope-custom', get_stylesheet_directory_uri() . '/js/isotope-custom.js', array('jquery'), '1.5.19', true);
    }
}
add_action('wp_enqueue_scripts', 'enqueue_custom_script_for_page_template');


// Add custom colors

function custom_theme_colors() {
    add_theme_support(
        'editor-color-palette',
        array(
            array(
                'name'  => __('Fond Noir', 'text-domain'),
                'slug'  => 'background-color-dark',
                'color' => '#131611',
            ),
            array(
                'name'  => __('Fond Blanc', 'text-domain'),
                'slug'  => 'background-color-light',
                'color' => '#ffffff',
            ),
            array(
                'name'  => __('Bordures Foncées', 'text-domain'),
                'slug'  => 'border-dark-color',
                'color' => 'blue',
            ),
            array(
                'name'  => __('Bordures Claires', 'text-domain'),
                'slug'  => 'border-light-color',
                'color' => '#d3d7ca',
            ),
            array(
                'name'  => __('Texte Clair', 'text-domain'),
                'slug'  => 'font-light',
                'color' => '#d3d7ca',
            ),
            array(
                'name'  => __('Texte Foncé', 'text-domain'),
                'slug'  => 'font-dark',
                'color' => 'blue',
            ),
            array(
                'name'  => __('Bleu primaire', 'text-domain'),
                'slug'  => 'blue-primary',
                'color' => 'blue',
            ),
        )
    );
}
add_action('after_setup_theme', 'custom_theme_colors');


// Add SVG

function allow_svg_upload($mimes) {
    $mimes['svg'] = 'image/svg+xml';
    return $mimes;
}
add_filter('upload_mimes', 'allow_svg_upload');


// add CPT on homepage template
function modify_main_query_for_projects($query) {
    if ($query->is_home() && $query->is_main_query()) {
        $query->set('post_type', array('projet'));
        $query->set('posts_per_page', -1);
    }
}
add_action('pre_get_posts', 'modify_main_query_for_projects');

/* Ajout des termes dans les classes CSS des éléments du portfolio */
function ntp_item_portfolio_class($classes, $class, $ID) {
	$taxonomy = 'type-projet';
	$terms = get_the_terms((int) $ID, $taxonomy);
	if(!empty($terms)) {
		foreach((array) $terms as $order => $term) {
			if(!in_array($term->slug, $classes)) {
				$classes[] = $term->slug;
			}
		}
	}
	return $classes;
}
add_filter('post_class', 'ntp_item_portfolio_class', 10, 3);

// Modify the default wordpress gallery by category

add_filter('post_gallery', 'custom_gallery_html', 10, 3);

function custom_gallery_html($output, $attr, $instance) {
    // Retrieve the images from the gallery
    $ids = explode(',', $attr['ids']);

    $output = '<div class="custom-gallery">';

    foreach ($ids as $id) {
        $image_src = wp_get_attachment_image_src($id, 'thumbnail');
        $output .= '<img src="' . $image_src[0] . '" alt="">';
    }

    $output .= '</div>';

    return $output;
}


//Remove <p> tag from Contact Form 7
add_filter('wpcf7_autop_or_not', '__return_false');


// Add custom field to quick edit of CPT

function my_acf_quick_edit_fields($field_group) {
    $fields_to_add = array(
        'group_659fb937baba9'
    );

    foreach ($fields_to_add as $field_key) {
        // Ajoutez le champ personnalisé à la modification rapide
        add_action('quick_edit_custom_box', function() use ($field_key) {
            acf_render_field_wrap(array(
                'type' => 'text', // Remplacez 'text' par le type de champ approprié
                'name' => $field_key, // Utilisez la clé de champ
                'label' => 'Lien', // Vous pouvez définir un label personnalisé si nécessaire
                'prefix' => '', // Préfixe du champ (optionnel)
                'value' => '', // La valeur du champ (optionnel)
            ));
        });
    }
}
function register_projet_taxonomies() {
    register_taxonomy('techno', 'projet', array(
        'label' => 'Techno',
        'rewrite' => array('slug' => 'techno'),
        'hierarchical' => false,
        'show_admin_column' => true,
    ));
}
add_action('init', 'register_projet_taxonomies');

add_action('acf/input/admin_footer', 'my_acf_quick_edit_fields');


