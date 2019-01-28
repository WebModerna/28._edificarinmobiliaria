<?php
/* functions.php
* @package WordPress
* @subpackage edificarinmobiliaria
* @since edificarinmobiliaria 1.0
*/

// Deshabilitar Iconos Emoji
remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('wp_print_styles', 'print_emoji_styles');

// Inclusión de soporte para metaboxes
require_once "includes/meta-box/meta-box.php";
require_once "includes/demo.php";


// Permitir comentarios encadenados
function enable_threaded_comments(){if(is_singular() AND comments_open() AND (get_option('thread_comments')==1)){wp_enqueue_script('comment-reply');}}; add_action('get_header','enable_threaded_comments');

//Permitir shortcodes en widgets
add_filter('widget_text','do_shortcode');

// Deshabilitar la edición desde otros programas, el link corto y la versión del WP.
remove_action('wp_head', 'rsd_link');
remove_action('wp_head', 'wp_generator'); 
remove_action('wp_head', 'feed_links', 2);
remove_action('wp_head', 'index_rel_link');
remove_action('wp_head', 'wlwmanifest_link'); 
remove_action('wp_head', 'feed_links_extra', 3);
remove_action('wp_head', 'wp_shortlink_wp_head');
remove_action('wp_head', 'start_post_rel_link', 10, 0);
remove_action('wp_head', 'parent_post_rel_link', 10, 0);
remove_action('wp_head', 'adjacent_posts_rel_link', 10, 0);

// Quitar cajas del escritorio
function quita_cajas_escritorio()
{
	// if( !current_user_can('manage_options') )
	// {
		remove_meta_box('dashboard_activity', 'dashboard', 'normal' ); // Actividad
		remove_meta_box('dashboard_right_now', 'dashboard', 'normal');   // Ahoramismo
		remove_meta_box('dashboard_recent_comments', 'dashboard', 'normal'); // Comentarios recientes
		remove_meta_box('dashboard_incoming_links', 'dashboard', 'normal');  // Enlaces entrantes
		remove_meta_box('dashboard_plugins', 'dashboard', 'normal');   // Plugins
		remove_meta_box('dashboard_quick_press', 'dashboard', 'side');  // Publicación rápida
		remove_meta_box('dashboard_recent_drafts', 'dashboard', 'side');  // Borradores recientes
		remove_meta_box('dashboard_primary', 'dashboard', 'side');   // Noticas del blog de WordPress
		remove_meta_box('dashboard_secondary', 'dashboard', 'side');   // Otras noticias de WordPress
	// utiliza 'dashboard-network' como segundo parámetro para quitar cajas del escritorio de red.
	// }
}
add_action('wp_dashboard_setup', 'quita_cajas_escritorio' );

// Removiendo el panel de bienvenida del wordpress
remove_action('welcome_panel', 'wp_welcome_panel');


// remove unnecessary page/post meta boxes
function remove_meta_boxes()
{

	// posts
	remove_meta_box('postcustom','post','normal');
	remove_meta_box('trackbacksdiv','post','normal');
	remove_meta_box('commentstatusdiv','post','normal');
	remove_meta_box('commentsdiv','post','normal');
	// remove_meta_box('categorydiv','post','normal');
	remove_meta_box('tagsdiv-post_tag','post','normal');
	remove_meta_box('slugdiv','post','normal');
	remove_meta_box('authordiv','post','normal');
	remove_meta_box('postexcerpt','post','normal');
	remove_meta_box('revisionsdiv','post','normal');

	// pages
	remove_meta_box('postcustom','page','normal');
	remove_meta_box('commentstatusdiv','page','normal');
	remove_meta_box('trackbacksdiv','page','normal');
	remove_meta_box('commentsdiv','page','normal');
	remove_meta_box('slugdiv','page','normal');
	remove_meta_box('authordiv','page','normal');
	remove_meta_box('revisionsdiv','page','normal');
	remove_meta_box('postexcerpt','page','normal');
}
add_action('admin_init','remove_meta_boxes');

//Remover clases e ids automáticos de los menúes
add_filter('nav_menu_css_class', 'my_css_attributes_filter', 100, 1);
add_filter('nav_menu_item_id', 'my_css_attributes_filter', 100, 1);
add_filter('page_css_class', 'my_css_attributes_filter', 100, 1);
function my_css_attributes_filter($var) {
  return is_array($var) ? array_intersect($var, array('current-menu-item', 'current_page_item')) : '';};

// Añadir Google Analytics al footer
function add_google_analytics() {
	/*echo '<script src="http://www.google-analytics.com/ga.js" type="text/javascript"></script>';
	echo '<script type="text/javascript">';
	echo 'var pageTracker = _gat._getTracker("UA-hola-X");';
	echo 'pageTracker._trackPageview();';
	echo '</script>';*/
	echo "<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-44140442-1', 'edificarinmobiliaria.com');
  ga('send', 'pageview');

</script>";
}
add_action('wp_footer', 'add_google_analytics');

// Personalizar las palabras del excerpt; o sea de los pequeños reúmenes.
function custom_excerpt_length($length) {return 40;}; add_filter('excerpt_length','custom_excerpt_length');

//Remover versiones de los scripts y css innecesarios
function remove_script_version($src) {$parts = explode('?', $src); return $parts[0];}; add_filter('script_loader_src','remove_script_version',15,1); //add_filter('style_loader_src','remove_script_version',15,1);

//Remover versión del WordPress
function remove_wp_version(){return'';}; add_filter('the_generator','remove_wp_version');

//Eliminar el atributo rel="category tag".
function remove_category_list_rel($output) {return str_replace(' rel="category tag"','',$output);}; add_filter('wp_list_categories','remove_category_list_rel'); add_filter('the_category','remove_category_list_rel');

//Eliminar css y scripts de comentarios cuando no hagan falta
function clean_header(){wp_deregister_script('comment-reply');}; add_action('init','clean_header');

//Crear el sidebar
register_sidebar( array(
	'id'			=>	'sidebar_1', 
	'name'			=>	'Sidebar',
	'before_widget'	=>	'<section class="navbar-inner">',
	'after_widget'	=>	'</section>',
	'before_title'	=>	'<h4>',
	'after_title'	=>	'</h4>'
));

//Definir tamaños personalizados de miniaturas - hay que configurarlas
add_theme_support('post-thumbnails', array('post','page'));
add_image_size('custom-thumb-860', 860, 300, true);
add_image_size('custom-thumb-690', 690, 510, true);
add_image_size('custom-thumb-320', 320, 225, true);
add_image_size('logo', 400, 132, true);

//Registrar las menúes de navegación
register_nav_menus (array(
	'header_nav'  => __('Menú Principal',  'edificarinmobiliaria'),
	'footer_nav'  => __('Menú Secundario', 'edificarinmobiliaria'),
	'sidebar_nav' => __('Menú Sidebar',    'edificarinmobiliaria'),
	'sidebar_nav2'=> __('Menú Secundario 2', 'edificarinmobiliaria')
	)
);

//Habilitar botones de edición avanzados
function habilitar_mas_botones($buttons) {
$buttons[] = 'hr';
$buttons[] = 'sub';
$buttons[] = 'sup';
$buttons[] = 'fontselect';
$buttons[] = 'fontsizeselect';
$buttons[] = 'cleanup';
$buttons[] = 'styleselect';
return $buttons;
}
add_filter("mce_buttons_3", "habilitar_mas_botones");


//Las miguitas de pan ;-)
function the_breadcrumb() {
	//Defino la ubicación como una variable; así la puedo cargar en la función del bradcrums.
	$ubicacion = __('Ud. está aquí: ', 'edificarinmobiliaria');
	echo '<ul id="breadcrumbs" class="inline">';   
		if (!is_home()) {
			echo '<li class="label label-inverse">'.$ubicacion.'</li><li><a href="';
			echo get_option('home');
			echo '">';
			echo _e('Inicio', 'edificarinmobiliaria');
			echo "</a></li><li> &raquo;</li>";
				if (is_category()) {
					echo '<li>'.single_cat_title("", false).'</li>';
				};
			if (is_single()) {
				the_category('<li> &raquo;</li>');
				echo "<li> &raquo;</li><li class='muted'>";
				echo the_title(); 
				echo '</li>';
			};
			if (is_page()) { echo "<li class='muted'>".the_title().'</li>';
			};
		};
	echo '</ul>';
};

// Agregar varias imágenes a las entradas y páginas
function add_custom_meta_box() {
	add_meta_box(
	'custom_meta_box', // id
	'<strong><em>Subir las fotos del producto desde aquí</em></strong>', // título
	'show_custom_meta_box', // función a la que llamamos
	'page', // sólo para páginas
	'normal', // contexto
	'high'); // prioridad

	add_meta_box(
	'custom_meta_box', // id
	'<strong><em>Subir las fotos del producto desde aquí</em></strong>', // título
	'show_custom_meta_box', // función a la que llamamos
	'post', // sólo para entradas
	'normal', // contexto
	'high'); // prioridad
};
add_action('add_meta_boxes', 'add_custom_meta_box');

// Para imágenes cargamos el script sólo si estamos en páginas.
function add_admin_scripts ($hook) {
	global $post;
	if ( $hook == 'post-new.php' || $hook == 'post.php' ) {wp_enqueue_script('custom-js', get_template_directory_uri().'/js/custom-js.js');}
};
add_action( 'admin_enqueue_scripts', 'add_admin_scripts', 10, 1 );

//Nombre del campo personalizado.
$prefix = 'custom_';
$custom_meta_fields = array( // Dentro de este array podemos incluir más tipos
	 array(
	   'label'  => 'Fotos',
	   'desc'   => '<strong>IMPORTANTE!!: </strong>Las imágenes deben ser mínimo de <strong><em><i style="color:red;">2048px (ancho) por 1536px (alto);</i></em></strong> ya que hay que optimizar para Tablets y Móviles, es muy importante cargar imágenes al doble del tamaño en el cual van a aparecer en la página web (A las imágenes más chicas o de diferentes tamaños, el sistema las cortará autmáticamente). Tiene que ser de esta forma para que el tamaño se pueda optimizar y ver correctamente en los dispositivos con tecnología Retina Display. Estos aparatos lo que hacen es cuadriplicar la densidad en píxeles; por lo tanto una foto común ser vería en esos dispositivos en la mitad de su tamaño real (en el mejor de los casos); o si no, horriblemente pixelada (lo más común).
	  ',
	   'id'     => $prefix.'imagenrepetible',
	   'type'   => 'imagenrepetible' ));

// Función show custom metabox. Es larguísimaaaa!!!
function show_custom_meta_box() {
	global $custom_meta_fields, $post;
	// Usamos nonce para verificación
    /*echo '<input type="hidden" name="custom_meta_box_nonce" value="'.wp_create_nonce(basename(__FILE__)).'" />';
    Reemplazé por lo de más abajo para desaparecer los errores del depurador
    */
    wp_nonce_field( basename( __FILE__ ), 'custom_meta_box_nonce' );
 // Creamos la tabla de campos personalizados y empezamos un loop con todos ellos
	echo '<table class="form-table">';
	foreach ($custom_meta_fields as $field) { // Hacemos un loop con todos los campos personalizados
					// obtenemos el valor del campo personalizado si existe para este $post->ID
		$meta = get_post_meta($post->ID, $field['id'], true);
					// comenzamos una fila de la tabla
	echo '<tr><th><label for="'.$field['id'].'">'.$field['label'].'</label></th><td>';
	switch($field['type']) { // Si tenemos varios tipos de campos aquí se seleccionan
// En nuestro caso tenemos solo uno: Imagen repetible
	case 'imagenrepetible': // Lo que pone en "type" más arriba
		$image = get_template_directory_uri().'/img/logocontexto.png'; // Ponemos una imagen por defecto
		echo '<i class="custom_default_image" style="display:none">'.$image.'</i>'; // Al principio no la mostramos
		echo '<ul id="'.$field['id'].'-repeatable" class="custom_repeatable">';
		$i = 0;
	if ($meta) { // Si get_post_meta nos ha dado valores, hacemos un foreach
		foreach($meta as $row) {

// Obtenemos la imagen en su tamaño máximo. Podéis poner en su lugar thumbnail, medium o large      
		$image = wp_get_attachment_image_src($row, 'custom-thumb-320');
// la primera parte de wp_get_attachment_image_src nos da su url.
		$image = $image[0]; ?>
	<li><!-- Añadimos la imagen que se arrastra para cambiar posición, dentro de tu tema -->
		<i class="sort hndle" style="float:left;"><img src="<?php echo get_template_directory_uri().'/img/drag_drop.gif';?>" />&nbsp;&nbsp;&nbsp;</i>
	<!-- El input con el valor del meta. Su attributo "name" tiene un número que se irá incrementando a medida que creamos nuevos campos -->
	<input name="<?php echo $field['id'] . '['.$i.']'; ?>" id="<?php echo $field['id']; ?>" type="hidden" class="custom_upload_image" value="<?php echo $row; ?>" />
	<!-- mostramos la imagen con 200px de ancho para ver lo que hemos subido -->
	<img src="<?php echo $image; ?>" class="custom_preview_image" alt="" width="200"/><br />
	<!-- El botón de Seleccionar Imagen -->
	<input class="custom_upload_image_button button" type="button" value="Seleccionar imagen" />
	<!-- Los botones de eliminar imagen y de quitar fila-->
	<small><a href="#" class="custom_clear_image_button">Eliminar imagen</a></small>                      
	&nbsp;&nbsp;&nbsp;<a class="repeatable-remove button" href="#">Quitar fila</a>
</li>
	<?php $i++; // Incrementamos el contador para que no se repita el atributo "name"
} // Fin del foreach
	} else { // Si no hay datos ?>

<li><i class="sort hndle" style="float:left;"><img src="<?php echo get_template_directory_uri().'/img/img/drag_drop.gif';?>" />&nbsp;&nbsp;&nbsp;</i>
	<input name="<?php echo $field['id'] . '['.$i.']'; ?>" id="<?php echo $field['id']; ?>" type="hidden" class="custom_upload_image" value="<?php echo $row; ?>" />
	<img src="<?php echo $image; ?>" class="custom_preview_image" alt="" width="200" /><br />
	<input class="custom_upload_image_button button" type="button" value="Seleccionar imagen" />
	<small><a href="#" class="custom_clear_image_button">Eliminar imagen</a></small>
	&nbsp;&nbsp;&nbsp;<a class="repeatable-remove button" href="#">Quitar fila</a>
</li>
<?php } ?>
</ul><br />
<!-- Botón para añadir una nueva fila -->
<a class="repeatable-add button-primary" href="#">+ A&ntilde;adir</a>
<!-- Aquí va la descripción -->
<br clear="all" /><br /><p class="description"><?php echo $field['desc']; ?></p>
<?php break;} // fin del switch
	echo '</td></tr>';} // fin del foreach
	echo '</table>'; // fin de la tabla
}; // Fin de la función

// Grabar los datos de las imágenes subidas.
function save_custom_meta($post_id) {
	global $custom_meta_fields;
// verificamos usando nonce
/*if (!wp_verify_nonce($_POST['custom_meta_box_nonce'], basename(__FILE__)))
Reemplazé por lo de más abajo para desaparecer los errores del depurador.*/
    if (!isset($_POST['custom_meta_box_nonce']) || !wp_verify_nonce($_POST['custom_meta_box_nonce'], basename(__FILE__)))
    return $post_id;
// comprobamos si se ha realizado una grabación automática, para no tenerla en cuenta
	if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE)
	return $post_id;
// comprobamos que el usuario puede editar
	if ('page' == $_POST['post_type']) {
		if (!current_user_can('edit_page', $post_id))
		return $post_id;
		} elseif (!current_user_can('edit_post', $post_id)) {
		return $post_id;
}
// hacemos un loop por todos los campos y guardamos los datos
	foreach ($custom_meta_fields as $field) {
		$old = get_post_meta($post_id, $field['id'], true);
		$new = $_POST[$field['id']];
	if ($new && $new != $old) {
		update_post_meta($post_id, $field['id'], $new);
	} elseif ('' == $new && $old) {
		delete_post_meta($post_id, $field['id'], $old);}
	} // final del foreach
};
add_action('save_post', 'save_custom_meta');

// Paginación avanzada
function pagination($pages = '', $range = 4) {
	$pagina_palabra = __('Página', 'edificarinmobiliaria');
	$de_palabra = __('de', 'edificarinmobiliaria');
	$showitems = ($range * 2)+1; 
	global $paged;
	if(empty($paged)) $paged = 1;
	if($pages == '')
	{
		global $wp_query;
		$pages = $wp_query->max_num_pages;
		if(!$pages) {
			$pages = 1;
		}
	}  
	if(1 != $pages) {
		echo "<div class='pagination'><span>".$pagina_palabra." ".$paged." ".$de_palabra." ".$pages."</span>";
		if($paged > 2 && $paged > $range+1 && $showitems < $pages) echo "<a href='".get_pagenum_link(1)."'>&laquo;</a>";
		if($paged > 1 && $showitems < $pages) echo "<a href='".get_pagenum_link($paged - 1)."'>&lsaquo;</a>";
	   for ($i=1; $i <= $pages; $i++) {
			if (1 != $pages &&( !($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitems )) {
				 echo ($paged == $i)? "<span class='current'>".$i."</span>":"<a href='".get_pagenum_link($i)."' class='inactive'>".$i."</a>";
			}
		}
		if ($paged < $pages && $showitems < $pages) echo "<a href='".get_pagenum_link($paged + 1)."'>&rsaquo;</a>"; 
		if ($paged < $pages-1 &&  $paged+$range-1 < $pages && $showitems < $pages) echo "<a href='".get_pagenum_link($pages)."'>&raquo;</a>";
		 echo "</div>\n";
	}
};

//Para hacer traducible esta plantilla
load_theme_textdomain( 'edificarinmobiliaria', TEMPLATEPATH.'/languages' ); $locale = get_locale(); $locale_file = TEMPLATEPATH."/languages/$locale.php"; if (is_readable($locale_file)) require_once($locale_file);


//Remover atributos de ancho y alto de las imágenes insertadas
add_filter( 'post_thumbnail_html', 'remove_width_attribute', 10 );
add_filter( 'image_send_to__ditor', 'remove_width_attribute', 10 );
function remove_width_attribute( $html )
{
   $html = preg_replace( '/(width|height)="\d*"\s/', "", $html );
   return $html;
};

//Modifica el pie de página del panel de administarción
function remove_footer_admin()
{
	echo 'Creado por <a href="http://www.webmoderna.com.ar" target="_blank">...:: WebModerna | el futuro de la web ::...</a></p>';
};
add_filter('admin_footer_text','remove_footer_admin');

//Ocultar los errores en la pantalla de Inicio de sesión de WordPress
function no__rrors_please()
{
	return __('¡Sal de mi jardín! ¡AHORA MISMO!', 'cabalgata_brocheriana');
};
add_filter('login__rrors','no__rrors_please');


//Eliminar palabras cortas de URL
function remove_short_words($slug)
{
    if (!is_admin()) return $slug;
    $slug = explode('-', $slug);
    foreach ($slug as $k => $word)
    {
        if (strlen($word) < 3)
        {
            unset($slug[$k]);
        }
    }
    return implode('-', $slug);
};
add_filter('sanitize_title', 'remove_short_words');

//Relativas las urls
function relative_url()
{
    // Don't do anything if:
    // - In feed
    // - In sitemap by WordPress SEO plugin
    if ( is_feed() || get_query_var( 'sitemap' ) )
      return;
    $filters = array(
      'post_link',       // Normal post link
      'post_type_link',  // Custom post type link
      'page_link',       // Page link
      'attachment_link', // Attachment link
      'get_shortlink',   // Shortlink
      'post_type_archive_link',    // Post type archive link
      'get_pagenum_link',          // Paginated link
      'get_comments_pagenum_link', // Paginated comment link
      'term_link',   // Term link, including category, tag
      'search_link', // Search link
      'day_link',   // Date archive link
      'month_link',
      'year_link',

      // site location
      // 'option_siteurl',
      // 'blog_option_siteurl',
      // 'option_home',
      // 'admin_url',
      // 'home_url',
      // 'includes_url',
      // 'site_url',
      'site_option_siteurl',
      'network_home_url',
      // 'network_site_url',

      // debug only filters
      'get_the_author_url',
      'get_comment_link',
      'wp_get_attachment_image_src',
      'wp_get_attachment_thumb_url',
      'wp_get_attachment_url',
      'wp_login_url',
      'wp_logout_url',
      'wp_lostpassword_url',
      'get_stylesheet_uri',
      'get_stylesheet_directory_uri',//
      'plugins_url',//
      'plugin_dir_url',//
      'stylesheet_directory_uri',//
      'get_template_directory_uri',//
      'template_directory_uri',//
      'get_locale_stylesheet_uri',
      'script_loader_src', // plugin scripts url
      // 'style_loader_src', // plugin styles url
      'get_theme_root_uri',
      'home_url'
    );
    foreach ( $filters as $filter )
    {
      add_filter( $filter, 'wp_make_link_relative' );
    };
    home_url($path = '', $scheme = null);
};
add_action( 'template_redirect', 'relative_url', 0 );

//Cambiar el logo del login y la url del mismo y el título
function custom_login_logo()
{
	echo '<style type="text/css">
		h1 a
		{
			background: url('.get_bloginfo('stylesheet_directory').'/img/logocontexto.png) center center no-repeat !important;
			width: 300px !important;
			height: 150px !important;
			background-size: 100% !important;
			-o-background-size: 100% !important;
			-ms-background-size: 100% !important;
			-moz-background-size: 100% !important;
			-webkit-background-size: 100% !important;
		}
		div#login {padding:0 !important;}
		</style>';
};
add_action('login_head', 'custom_login_logo');
function the_url( $url )
{
    return get_bloginfo( 'url' );
}
add_filter( 'login_headerurl', 'the_url' );
function change_wp_login_title()
{
	return get_option('blogname');
};
add_filter('login_headertitle', 'change_wp_login_title');

// Agregando un favicon al área de administración
function admin_favicon()
{
	echo '<link rel="shortcut icon" type="image/x-icon" href="' . get_bloginfo('stylesheet_directory') . '/img/favicon.ico" />';
}
add_action('admin_head', 'admin_favicon', 1);


//Función para Minificar el HTML
class WP_HTML_Compression
{
	protected $compress_css = true;
	protected $compress_js = true;
	protected $info_comment = true;
	protected $remove_comments = true;
	protected $html;
	public function __construct($html)
	{
		if (!empty($html))
		{
			$this->parseHTML($html);
		}
	}
	public function __toString()
	{
		return $this->html;
	}
	protected function bottomComment($raw, $compressed)
	{
		$raw = strlen($raw);
		$compressed = strlen($compressed);		
		$savings = ($raw-$compressed) / $raw * 100;		
		$savings = round($savings, 2);		
		return '<!-- HTML Minify | Se ha reducido el tamaño de la web un '.$savings.'% | De '.$raw.' Bytes a '.$compressed.' Bytes -->';
	}
	protected function minifyHTML($html)
	{
		$pattern = '/<(?<script>script).*?<\/script\s*>|<(?<style>style).*?<\/style\s*>|<!(?<comment>--).*?-->|<(?<tag>[\/\w.:-]*)(?:".*?"|\'.*?\'|[^\'">]+)*>|(?<text>((<[^!\/\w.:-])?[^<]*)+)|/si';
		preg_match_all($pattern, $html, $matches, PREG_SET_ORDER);
		$overriding = false;
		$raw_tag = false;
		$html = '';
		foreach ($matches as $token)
		{
			$tag = (isset($token['tag'])) ? strtolower($token['tag']) : null;
			$content = $token[0];
			if (is_null($tag))
			{
				if ( !empty($token['script']) )
				{
					$strip = $this->compress_js;
				}
				else if ( !empty($token['style']) )
				{
					$strip = $this->compress_css;
				}
				else if ($content == '<!--wp-html-compression no compression-->')
				{
					$overriding = !$overriding;
					continue;
				}
				else if ($this->remove_comments)
				{
					if (!$overriding && $raw_tag != 'textarea')
					{
						$content = preg_replace('/<!--(?!\s*(?:\[if [^\]]+]|<!|>))(?:(?!-->).)*-->/s', '', $content);
					}
				}
			}
			else
			{
				if ($tag == 'pre' || $tag == 'textarea')
				{
					$raw_tag = $tag;
				}
				else if ($tag == '/pre' || $tag == '/textarea')
				{
					$raw_tag = false;
				}
				else
				{
					if ($raw_tag || $overriding)
					{
						$strip = false;
					}
					else
					{
						$strip = true;
						$content = preg_replace('/(\s+)(\w++(?<!\baction|\balt|\bcontent|\bsrc)="")/', '$1', $content);
						$content = str_replace(' />', '/>', $content);
					}
				}
			}
			if ($strip)
			{
				$content = $this->removeWhiteSpace($content);
			}
			$html .= $content;
		}
		return $html;
	}
	public function parseHTML($html)
	{
		$this->html = $this->minifyHTML($html);
		if ($this->info_comment)
		{
			$this->html .= "\n" . $this->bottomComment($html, $this->html);
		}
	}
	protected function removeWhiteSpace($str)
	{
		$str = str_replace("\t", ' ', $str);
		$str = str_replace("\n",  '', $str);
		$str = str_replace("\r",  '', $str);
		while (stristr($str, '  '))
		{
			$str = str_replace('  ', ' ', $str);
		}
		return $str;
	}
}
function wp_html_compression_finish($html)
{
	return new WP_HTML_Compression($html);
}
function wp_html_compression_start()
{
	ob_start('wp_html_compression_finish');
}
add_action('get_header', 'wp_html_compression_start');
?>