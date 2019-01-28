<?php
/**
 * Registering meta boxes
 *
 * All the definitions of meta boxes are listed below with comments.
 * Please read them CAREFULLY.
 *
 * You also should read the changelog to know what has been changed before updating.
 *
 * For more information, please visit:
 * @link http://metabox.io/docs/registering-meta-boxes/
 */
add_filter( 'rwmb_meta_boxes', 'edificarinmobiliaria_register_meta_boxes' );
/**
 * Register meta boxes
 *
 * Remember to change "edificarinmobiliaria" to actual prefix in your project
 *
 * @param array $meta_boxes List of meta boxes
 *
 * @return array
 */
function edificarinmobiliaria_register_meta_boxes( $meta_boxes )
{
	/**
	* prefix of meta keys (optional)
	* Use underscore (_) at the beginning to make keys hidden
	* Alt.: You also can make prefix empty to disable it
	*/
	// Better has an underscore as last sign
	$prefix = 'edificarinmobiliaria_';
	// 1st meta box
	$meta_boxes[] = array(
		// Meta box id, UNIQUE per meta box. Optional since 4.1.5
		'id'         => 'standard',
		// Meta box title - Will appear at the drag and drop handle bar. Required.
		'title'      => __( 'Precios de la Propiedad', 'edificarinmobiliaria' ),
		// Post types, accept custom post types as well - DEFAULT is 'post'. Can be array (multiple post types) or string (1 post type). Optional.
		'post_types' => array( 'post' ),
		// 'post_types' => array( 'home_page' ),
		// Where the meta box appear: normal (default), advanced, side. Optional.
		'context'    => 'normal',
		// Order of meta box: high (default), low. Optional.
		'priority'   => 'high',
		// Auto save: true, false (default). Optional.
		'autosave'   => true,
		// List of meta fields
		'fields'     => array(

			/*// TEXT: Código de la propiedad
			array(
				// Field name - Will be used as label
				'name'  => __( 'Código de la Propiedad.', 'edificarinmobiliaria' ),
				// Field ID, i.e. the meta key
				'id'    => "edificarinmobiliaria_codigo",
				// Field description (optional)
				'desc'  => __( 'Inserte un código único para esta propiedad.', 'edificarinmobiliaria' ),
				'type'  => 'text',
				// Default value (optional)
				'std'   => __( '', 'edificarinmobiliaria' ),
				// CLONES: Add to make the field cloneable (i.e. have multiple value)
				'clone' => false,
			),*/

/*
			// DIVIDER
			array(
				'type' => 'divider',
				'id'   => 'edificarinmobiliaria_2', // Not used, but needed
			),


			// CHECKBOX
			array(
				'name' => __( 'Vendido', 'edificarinmobiliaria' ),
				'id'   => "edificarinmobiliaria_vendido",
				'type' => 'checkbox',
				// Value can be 0 or 1
				'std'  => 0,
			),

			// DIVIDER
			array(
				'type' => 'divider',
				'id'   => 'edificarinmobiliaria_3', // Not used, but needed
			),

			// CHECKBOX
			array(
				'name' => __( 'Reservado', 'edificarinmobiliaria' ),
				'id'   => "edificarinmobiliaria_reservado",
				'type' => 'checkbox',
				// Value can be 0 or 1
				'std'  => 0,
			),

			// DIVIDER
			array(
				'type' => 'divider',
				'id'   => 'edificarinmobiliaria_4', // Not used, but needed
			),

			// TEXT
			array(
				// Field name - Will be used as label
				'name'  => __( 'Meta: Palabras claves.', 'edificarinmobiliaria' ),
				// Field ID, i.e. the meta key
				'id'    => "edificarinmobiliaria_meta_keywords",
				// Field description (optional)
				'desc'  => __( 'Palabras claves (keywords) separadas por comas. Son útiles para SEO en algunos buscadores. Máximo 160 caracteres.', 'edificarinmobiliaria' ),
				'type'  => 'text',
				// Default value (optional)
				'std'   => __( '', 'edificarinmobiliaria' ),
				// CLONES: Add to make the field cloneable (i.e. have multiple value)
				'clone' => false,
			),*/
			// RADIO BUTTONS
			/*array(
				'name'    => __( 'Radio', 'edificarinmobiliaria' ),
				'id'      => "edificarinmobiliaria_radio",
				'type'    => 'radio',
				// Array of 'value' => 'Label' pairs for radio options.
				// Note: the 'value' is stored in meta field, not the 'Label'
				'options' => array(
					'value1' => __( 'Label1', 'edificarinmobiliaria' ),
					'value2' => __( 'Label2', 'edificarinmobiliaria' ),
				),
			),
			// SELECT BOX
			array(
				'name'        => __( 'Select', 'edificarinmobiliaria' ),
				'id'          => "edificarinmobiliaria_select",
				'type'        => 'select',
				// Array of 'value' => 'Label' pairs for select box
				'options'     => array(
					'value1' => __( 'Label1', 'edificarinmobiliaria' ),
					'value2' => __( 'Label2', 'edificarinmobiliaria' ),
				),
				// Select multiple values, optional. Default is false.
				'multiple'    => false,
				'std'         => 'value2',
				'placeholder' => __( 'Select an Item', 'edificarinmobiliaria' ),
			),
			// HIDDEN
			array(
				'id'   => "edificarinmobiliaria_hidden",
				'type' => 'hidden',
				// Hidden field must have predefined value
				'std'  => __( 'Hidden value', 'edificarinmobiliaria' ),
			),
			// PASSWORD
			array(
				'name' => __( 'Password', 'edificarinmobiliaria' ),
				'id'   => "edificarinmobiliaria_password",
				'type' => 'password',
			),*/

			// TEXTAREA
			/*array(
				'name' => __( 'Meta: Descripción', 'edificarinmobiliaria' ),
				'desc' => __( 'Es una descripción que aparece en el meta description. Es muy recomendable para SEO. Máximo 160 caracteres.', 'edificarinmobiliaria' ),
				'id'   => "edificarinmobiliaria_meta_descripcion",
				'type' => 'textarea',
				'cols' => 20,
				'rows' => 3,
			),*/
/*
		),
		'validation' => array(
			'rules'    => array(
				"edificarinmobiliaria_password" => array(
					'required'  => true,
					'minlength' => 7,
				),
			),
			// optional override of default jquery.validate messages
			'messages' => array(
				"edificarinmobiliaria_password" => array(
					'required'  => __( 'Password is required', 'edificarinmobiliaria' ),
					'minlength' => __( 'Password must be at least 7 characters', 'edificarinmobiliaria' ),
				),
			)
		)
	);
	// 2nd meta box
	$meta_boxes[] = array(
		'title'  => __( 'Características de la propiedad', 'edificarinmobiliaria' ),
		'fields' => array(

			// SLIDER
			array(
				'name'       => __( 'Slider', 'edificarinmobiliaria' ),
				'id'         => "edificarinmobiliaria_slider",
				'type'       => 'slider',
				// Text labels displayed before and after value
				'prefix'     => __( '$', 'edificarinmobiliaria' ),
				'suffix'     => __( ' USD', 'edificarinmobiliaria' ),
				// jQuery UI slider options. See here http://api.jqueryui.com/slider/
				'js_options' => array(
					'min'  => 10,
					'max'  => 255,
					'step' => 5,
				),
			),*/

			// Precio
			array(
				'name' => __( 'Precio en $', 'edificarinmobiliaria' ),
				'id'   => "edificarinmobiliaria_precio",
				'type' => 'number',
				'min'  => 0,
				'step' => 1,
			),

			// Precio u$s
			array(
				'name' => __( 'Precio en U$s', 'edificarinmobiliaria' ),
				'id'   => "edificarinmobiliaria_precio_dolar",
				'type' => 'number',
				'min'  => 0,
				'step' => 1,
			),

			// DIVIDER
			array(
				'type' => 'divider',
				'id'   => 'edificarinmobiliaria_4', // Not used, but needed
			),

			

			// WYSIWYG/RICH TEXT EDITOR
			array(
				'name'    => __( 'WYSIWYG / Rich Text Editor', 'edificarinmobiliaria' ),
				'id'      => "edificarinmobiliaria_wysiwyg",
				'type'    => 'wysiwyg',
				// Set the 'raw' parameter to TRUE to prevent data being passed through wpautop() on save
				'raw'     => false,
				'std'     => __( 'Pegar aquí el código del mapa.', 'edificarinmobiliaria' ),
				// Editor settings, see wp_editor() function: look4wp.com/wp_editor
				'options' => array(
					'textarea_rows' => 4,
					'teeny'         => true,
					'media_buttons' => false,
				),
			),

			/*
			// Dirección
			array(
				// Field name - Will be used as label
				'name'  => __( 'Dirección.', 'edificarinmobiliaria' ),
				// Field ID, i.e. the meta key
				'id'    => "edificarinmobiliaria_direccion",
				// Field description (optional)
				'desc'  => __( 'Calle, número, ciudad...', 'edificarinmobiliaria' ),
				'type'  => 'text',
				// Default value (optional)
				'std'   => __( '', 'edificarinmobiliaria' ),
				// CLONES: Add to make the field cloneable (i.e. have multiple value)
				'clone' => false,
			),

			// Comodidades
			array(
				// Field name - Will be used as label
				'name'  => __( 'Comodidades.', 'edificarinmobiliaria' ),
				// Field ID, i.e. the meta key
				'id'    => "edificarinmobiliaria_comodidades",
				// Field description (optional)
				'desc'  => __( 'Aire acondicionado, calefacción, etc...', 'edificarinmobiliaria' ),
				'type'  => 'text',
				// Default value (optional)
				'std'   => __( '', 'edificarinmobiliaria' ),
				// CLONES: Add to make the field cloneable (i.e. have multiple value)
				'clone' => false,
			),*/

			/*
			// Reservas
			array(
				'name'       => __( 'Calendario de Reservas', 'edificarinmobiliaria' ),
				'id'         => "edificarinmobiliaria_date",
				'type'       => 'date',
				// jQuery date picker options. See here http://api.jqueryui.com/datepicker
				'js_options' => array(
					'appendText'		=> __( ' día-mes-año', 'edificarinmobiliaria' ),
					'dateFormat'		=> __( '"dd-mm-yy"', 'edificarinmobiliaria' ),
					'changeMonth'		=> true,
					'changeYear'		=> true,
					'showButtonPanel'	=> true,
					'autoSize'			=> true,
					'selectMultiple'	=> true,
				),
			),
			// DATETIME
			array(
				'name'       => __( 'Datetime picker', 'edificarinmobiliaria' ),
				'id'         => $prefix . 'datetime',
				'type'       => 'datetime',
				// jQuery datetime picker options.
				// For date options, see here http://api.jqueryui.com/datepicker
				// For time options, see here http://trentrichardson.com/examples/timepicker/
				'js_options' => array(
					'stepMinute'     => 15,
					'showTimepicker' => true,
				),
			),
			// TIME
			array(
				'name'       => __( 'Time picker', 'edificarinmobiliaria' ),
				'id'         => $prefix . 'time',
				'type'       => 'time',
				// jQuery datetime picker options.
				// For date options, see here http://api.jqueryui.com/datepicker
				// For time options, see here http://trentrichardson.com/examples/timepicker/
				'js_options' => array(
					'stepMinute' => 5,
					'showSecond' => true,
					'stepSecond' => 10,
				),
			),
			// COLOR
			array(
				'name' => __( 'Color picker', 'edificarinmobiliaria' ),
				'id'   => "edificarinmobiliaria_color",
				'type' => 'color',
			),
			// AUTOCOMPLETE
			array(
				'name'    => __( 'Autocomplete', 'edificarinmobiliaria' ),
				'id'      => "edificarinmobiliaria_autocomplete",
				'type'    => 'autocomplete',
				// Options of autocomplete, in format 'value' => 'Label'
				'options' => array(
					'value1' => __( 'Label1', 'edificarinmobiliaria' ),
					'value2' => __( 'Label2', 'edificarinmobiliaria' ),
				),
				// Input size
				'size'    => 30,
				// Clone?
				'clone'   => false,
			),
			// EMAIL
			array(
				'name' => __( 'Email', 'edificarinmobiliaria' ),
				'id'   => "edificarinmobiliaria_email",
				'desc' => __( 'Email description', 'edificarinmobiliaria' ),
				'type' => 'email',
				'std'  => 'name@email.com',
			),
			// RANGE
			array(
				'name' => __( 'Range', 'edificarinmobiliaria' ),
				'id'   => "edificarinmobiliaria_range",
				'desc' => __( 'Range description', 'edificarinmobiliaria' ),
				'type' => 'range',
				'min'  => 0,
				'max'  => 100,
				'step' => 5,
				'std'  => 0,
			),
			// URL
			array(
				'name' => __( 'URL', 'edificarinmobiliaria' ),
				'id'   => "edificarinmobiliaria_url",
				'desc' => __( 'URL description', 'edificarinmobiliaria' ),
				'type' => 'url',
				'std'  => 'http://google.com',
			),
			// OEMBED
			array(
				'name' => __( 'oEmbed', 'edificarinmobiliaria' ),
				'id'   => "edificarinmobiliaria_oembed",
				'desc' => __( 'oEmbed description', 'edificarinmobiliaria' ),
				'type' => 'oembed',
			),
			// SELECT ADVANCED BOX
			array(
				'name'        => __( 'Select', 'edificarinmobiliaria' ),
				'id'          => "edificarinmobiliaria_select_advanced",
				'type'        => 'select_advanced',
				// Array of 'value' => 'Label' pairs for select box
				'options'     => array(
					'value1' => __( 'Label1', 'edificarinmobiliaria' ),
					'value2' => __( 'Label2', 'edificarinmobiliaria' ),
				),
				// Select multiple values, optional. Default is false.
				'multiple'    => false,
				// 'std'         => 'value2', // Default value, optional
				'placeholder' => __( 'Select an Item', 'edificarinmobiliaria' ),
			),
			// TAXONOMY
			array(
				'name'    => __( 'Taxonomy', 'edificarinmobiliaria' ),
				'id'      => "edificarinmobiliaria_taxonomy",
				'type'    => 'taxonomy',
				'options' => array(
					// Taxonomy name
					'taxonomy' => 'category',
					// How to show taxonomy: 'checkbox_list' (default) or 'checkbox_tree', 'select_tree', select_advanced or 'select'. Optional
					'type'     => 'checkbox_list',
					// Additional arguments for get_terms() function. Optional
					'args'     => array()
				),
			),
			// POST
			array(
				'name'        => __( 'Posts (Pages)', 'edificarinmobiliaria' ),
				'id'          => "edificarinmobiliaria_pages",
				'type'        => 'post',
				// Post type
				'post_type'   => 'page',
				// Field type, either 'select' or 'select_advanced' (default)
				'field_type'  => 'select_advanced',
				'placeholder' => __( 'Select an Item', 'edificarinmobiliaria' ),
				// Query arguments (optional). No settings means get all published posts
				'query_args'  => array(
					'post_status'    => 'publish',
					'posts_per_page' => - 1,
				)
			),
			// WYSIWYG/RICH TEXT EDITOR
			array(
				'name'    => __( 'WYSIWYG / Rich Text Editor', 'edificarinmobiliaria' ),
				'id'      => "edificarinmobiliaria_wysiwyg",
				'type'    => 'wysiwyg',
				// Set the 'raw' parameter to TRUE to prevent data being passed through wpautop() on save
				'raw'     => false,
				'std'     => __( 'WYSIWYG default value', 'edificarinmobiliaria' ),
				// Editor settings, see wp_editor() function: look4wp.com/wp_editor
				'options' => array(
					'textarea_rows' => 4,
					'teeny'         => true,
					'media_buttons' => false,
				),
			),
			// CHECKBOX LIST
			array(
				'name'    => __( 'Checkbox list', 'edificarinmobiliaria' ),
				'id'      => "edificarinmobiliaria_checkbox_list",
				'type'    => 'checkbox_list',
				// Options of checkboxes, in format 'value' => 'Label'
				'options' => array(
					'value1' => __( 'Label1', 'edificarinmobiliaria' ),
					'value2' => __( 'Label2', 'edificarinmobiliaria' ),
				),
			),
			*/

			/*// DIVIDER
			array(
				'type' => 'divider',
				'id'   => 'edificarinmobiliaria_1', // Not used, but needed
			),

			// HEADING
			array(
				'type' => 'heading',
				'name' => __( 'Imágenes y Fotos', 'edificarinmobiliaria' ),
				// Not used but needed for plugin
				'id'   => 'fake_id',
				'desc' => __( 'Las fotos deben ser mínimo de 2000px de ancho. Pesan aproximadamente 1 a 2 Megabytes', 'edificarinmobiliaria' ),
			),

			// PLUPLOAD IMAGE UPLOAD (WP 3.3+)
			array(
				'name'             => __( 'Subir varias fotos desde aquí.', 'edificarinmobiliaria' ),
				'id'               => 'edificarinmobiliaria_imagenes',
				'type'             => 'image_advanced',
				'max_file_uploads' => false,
			),

			// HEADING
			array(
				'type' => 'heading',
				'name' => __( 'Ubicación de la Propiedad en el Mapa', 'edificarinmobiliaria' ),
				// Not used but needed for plugin
				'id'   => 'fake_id',
				'desc' => __( 'Si quieres mostrarlo en el mapa, mueve el puntero hasta la indicación deseada', 'edificarinmobiliaria' ),
			),*/

			// Ubicación en el Mapa
			/*array(
				'type'         => 'map',
				'id'			=> 'edificarinmobiliaria_map',
				'width'        => '100%', // Map width, default is 640px. Can be '%' or 'px'
				'height'       => '480px', // Map height, default is 480px. Can be '%' or 'px'
				'zoom'         => 25,  // Map zoom, default is the value set in admin, and if it's omitted - 14
				'marker'       => true, // Display marker? Default is 'true',
				'marker_title' => '', // Marker title when hover
				'info_window'  => '<h3>Info Window Title</h3>Info window content. HTML <strong>allowed</strong>', // Info window content, can be anything. HTML allowed.
				'js_options'   => array(

					// 'mapTypeId'   => 'HYBRID',
					'zoomControl' => true,
					// You can use 'zoom' inside 'js_options' or as a separated parameter
					'zoom'        => 16,
				)
			),
			// echo rwmb_meta( 'loc', $args ); // For current post
			// echo rwmb_meta( 'loc', $args, $post_id ); // For another post with $post_id

			// FILE UPLOAD
			/*
			array(
				'name' => __( 'File Upload', 'edificarinmobiliaria' ),
				'id'   => "edificarinmobiliaria_file",
				'type' => 'file',
			),
			// FILE ADVANCED (WP 3.5+)
			array(
				'name'             => __( 'File Advanced Upload', 'edificarinmobiliaria' ),
				'id'               => "edificarinmobiliaria_file_advanced",
				'type'             => 'file_advanced',
				'max_file_uploads' => false,
				'mime_type'        => 'application,audio,video', // Leave blank for all file types
			),
			// IMAGE UPLOAD
			array(
				'name' => __( 'Image Upload', 'edificarinmobiliaria' ),
				'id'   => "edificarinmobiliaria_image",
				'type' => 'image',
			),
			// THICKBOX IMAGE UPLOAD (WP 3.3+)
			array(
				'name' => __( 'Thickbox Image Upload', 'edificarinmobiliaria' ),
				'id'   => "edificarinmobiliaria_thickbox",
				'type' => 'thickbox_image',
			),
			// IMAGE ADVANCED (WP 3.5+)
			array(
				'name'             => __( 'Image Advanced Upload', 'edificarinmobiliaria' ),
				'id'               => "edificarinmobiliaria_imgadv",
				'type'             => 'image_advanced',
				'max_file_uploads' => 4,
			),
			// PLUPLOAD IMAGE UPLOAD (WP 3.3+)
			array(
				'name'             => __( 'Subir varias fotos desde aquí.', 'edificarinmobiliaria' ),
				'id'               => "edificarinmobiliaria_plupload",
				'type'             => 'plupload_image',
				'max_file_uploads' => false,
			),

			// BUTTON
			array(
				'id'   => "edificarinmobiliaria_button",
				'type' => 'button',
				'name' => 'edificarinmobiliaria_map', // Empty name will "align" the button to all field inputs
			),
			*/
		)
	);
	return $meta_boxes;
};

/*
// Es para las páginas
add_filter( 'rwmb_meta_boxes', 'meta_paginas_register_meta_boxes' );
function meta_paginas_register_meta_boxes( $meta_boxes )
{
	// Better has an underscore as last sign
	$prefix = 'meta_paginas_';
	// 1st meta box
	$meta_boxes[] = array(
		// Meta box id, UNIQUE per meta box. Optional since 4.1.5
		'id'         => 'estandard',
		// Meta box title - Will appear at the drag and drop handle bar. Required.
		'title'      => __( 'S.E.O. y posicionamiento web', 'edificarinmobiliaria' ),
		// Post types, accept custom post types as well - DEFAULT is 'post'. Can be array (multiple post types) or string (1 post type). Optional.
		'post_types' => array( 'page' ),
		// 'post_types' => array( 'home_page' ),
		// Where the meta box appear: normal (default), advanced, side. Optional.
		'context'    => 'normal',
		// Order of meta box: high (default), low. Optional.
		'priority'   => 'high',
		// Auto save: true, false (default). Optional.
		'autosave'   => true,
		// List of meta fields
		'fields'     => array(
			// TEXT
			array(
				// Field name - Will be used as label
				'name'  => __( 'Palabras claves.', 'edificarinmobiliaria' ),
				// Field ID, i.e. the meta key
				'id'    => "meta_paginas_meta_keywords",
				// Field description (optional)
				'desc'  => __( 'Palabras claves (keywords) separadas por comas. Son útiles para SEO en algunos buscadores. Máximo 160 caracteres.', 'edificarinmobiliaria' ),
				'type'  => 'text',
				// Default value (optional)
				'std'   => __( '', 'edificarinmobiliaria' ),
				// CLONES: Add to make the field cloneable (i.e. have multiple value)
				'clone' => false,
			),
		// TEXTAREA
			array(
				'name' => __( 'Descripción', 'edificarinmobiliaria' ),
				'desc' => __( 'Es una descripción que aparece en el meta description. Es muy recomendable para SEO. Máximo 160 caracteres.', 'edificarinmobiliaria' ),
				'id'   => "meta_paginas_meta_descripcion",
				'type' => 'textarea',
				'cols' => 20,
				'rows' => 2,
			),
		));
		*/
// 	return $meta_boxes;
// };