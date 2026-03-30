<?php
if( function_exists('acf_add_local_field_group') ):

acf_add_local_field_group(array(
	'key' => 'group_cv_content',
	'title' => 'Contenu de la Page CV (ACF PRO)',
	'fields' => array(
		array(
			'key' => 'field_cv_header_tab',
			'label' => 'En-tête & Bio',
			'type' => 'tab',
		),
		array(
			'key' => 'field_cv_photo',
			'label' => 'Photo de profil',
			'name' => 'cv_photo',
			'type' => 'image',
			'return_format' => 'url',
			'preview_size' => 'thumbnail',
		),
		array(
			'key' => 'field_cv_bio_list',
			'label' => 'Texte Bio (Séparez par des virgules pour l\'animation)',
			'name' => 'cv_bio_list',
			'type' => 'text',
			'instructions' => 'Par exemple: Graphic Designer,Webdesigner,Front-End Developer',
			'default_value' => 'Graphic Designer,Webdesigner,Front-End Developer',
		),
		array(
			'key' => 'field_cv_download',
			'label' => 'Lien de téléchargement du CV',
			'name' => 'cv_download',
			'type' => 'file',
			'return_format' => 'url',
		),
		array(
			'key' => 'field_cv_formations_tab',
			'label' => 'Formations',
			'type' => 'tab',
		),
		array(
			'key' => 'field_cv_formations',
			'label' => 'Liste des Formations',
			'name' => 'formations',
			'type' => 'repeater',
			'layout' => 'block',
			'button_label' => 'Ajouter une formation',
			'sub_fields' => array(
				array(
					'key' => 'field_cv_formation_year',
					'label' => 'Année(s)',
					'name' => 'year',
					'type' => 'text',
					'wrapper' => array('width' => '20'),
				),
				array(
					'key' => 'field_cv_formation_school',
					'label' => 'Ecole',
					'name' => 'school',
					'type' => 'text',
					'wrapper' => array('width' => '40'),
				),
				array(
					'key' => 'field_cv_formation_degree',
					'label' => 'Diplôme / Formation',
					'name' => 'degree',
					'type' => 'text',
					'wrapper' => array('width' => '40'),
				),
			),
		),
		array(
			'key' => 'field_cv_competences_tab',
			'label' => 'Compétences',
			'type' => 'tab',
		),
		array(
			'key' => 'field_cv_competences',
			'label' => 'Liste des Compétences',
			'name' => 'competences',
			'type' => 'repeater',
			'layout' => 'block',
			'button_label' => 'Ajouter une compétence',
			'sub_fields' => array(
				array(
					'key' => 'field_cv_competence_title',
					'label' => 'Titre',
					'name' => 'title',
					'type' => 'text',
					'wrapper' => array('width' => '30'),
				),
				array(
					'key' => 'field_cv_competence_desc',
					'label' => 'Description (liste séparée par tirets ou virgules)',
					'name' => 'description',
					'type' => 'textarea',
					'rows' => 2,
					'wrapper' => array('width' => '50'),
				),
				array(
					'key' => 'field_cv_competence_col',
					'label' => 'Colonne',
					'name' => 'column',
					'type' => 'select',
					'choices' => array(
						'col-left' => 'Gauche',
						'col-right' => 'Droite',
					),
					'default_value' => 'col-left',
					'wrapper' => array('width' => '20'),
				),
			),
		),
		array(
			'key' => 'field_cv_experiences_tab',
			'label' => 'Expériences',
			'type' => 'tab',
		),
		array(
			'key' => 'field_cv_experiences',
			'label' => 'Liste des Expériences',
			'name' => 'experiences',
			'type' => 'repeater',
			'layout' => 'block',
			'button_label' => 'Ajouter une expérience',
			'sub_fields' => array(
				array(
					'key' => 'field_cv_experience_year',
					'label' => 'Année(s)',
					'name' => 'year',
					'type' => 'text',
					'wrapper' => array('width' => '15'),
				),
				array(
					'key' => 'field_cv_experience_title',
					'label' => 'Poste',
					'name' => 'title',
					'type' => 'text',
					'wrapper' => array('width' => '30'),
				),
				array(
					'key' => 'field_cv_experience_description',
					'label' => 'Description',
					'name' => 'description',
					'type' => 'textarea',
					'rows' => 2,
					'wrapper' => array('width' => '35'),
				),
				array(
					'key' => 'field_cv_experience_col',
					'label' => 'Colonne',
					'name' => 'column',
					'type' => 'select',
					'choices' => array(
						'col-left' => 'Gauche',
						'col-right' => 'Droite',
					),
					'default_value' => 'col-left',
					'wrapper' => array('width' => '10'),
				),
				array(
					'key' => 'field_cv_experience_clients',
					'label' => 'Clients / Références',
					'name' => 'clients',
					'type' => 'repeater',
					'button_label' => 'Ajouter un client',
					'sub_fields' => array(
						array(
							'key' => 'field_cv_experience_client_name',
							'label' => 'Nom du client',
							'name' => 'name',
							'type' => 'text',
						),
					),
					'wrapper' => array('width' => '20'),
				),
			),
		),
	),
	'location' => array(
		array(
			array(
				'param' => 'page_template',
				'operator' => '==',
				'value' => 'about-template.php',
			),
		),
	),
	'menu_order' => 0,
	'position' => 'normal',
	'style' => 'default',
	'label_placement' => 'top',
	'instruction_placement' => 'label',
	'hide_on_screen' => '',
	'active' => true,
	'description' => '',
));

endif;
