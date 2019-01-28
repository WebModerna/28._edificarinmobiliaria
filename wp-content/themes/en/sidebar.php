<?php
/* sidebar.php
* @package WordPress
* @subpackage edificarinmobiliaria
* @since edificarinmobiliaria 1.0
*/
?>
<aside id="sidebar" class="span4">
	<section id="sidebar_nav" class="navbar-inner">
		<h4><?php _e('Filtrar por ubicación', 'edificarinmobiliaria');?>:</h4>
		<?php // La barra de navegación del sidebar
		$default=array(
 		'container'		=>	'nav',
 		'depth'			=>	1,
		'menu'			=>	'sidebar_nav',
		'theme_location'=>	'sidebar_nav',
		'items_wrap'	=>	'<ul class="nav nav-tabs nav-stacked gradient">%3$s</ul>');
		wp_nav_menu($default);?> 
	</section><!-- #sidebar_nav -->
	<section id="sidebar_nav2" class="navbar-inner">
		<h4><?php _e('Circuitos Turísticos', 'edificarinmobiliaria');?>:</h4>
		<?php // La barra de navegación del sidebar
		$default=array(
 		'container'		=>	'nav',
 		'depth'			=>	1,
		'menu'			=>	'sidebar_nav2',
		'theme_location'=>	'sidebar_nav2',
		'items_wrap'	=>	'<ul class="nav nav-tabs nav-stacked gradient">%3$s</ul>');
		wp_nav_menu($default);?> 
	</section><!-- #sidebar_nav2 -->
	<?php if ( wp_is_mobile() == false )
		{
			dynamic_sidebar('sidebar_1');
		}
	?>
</aside><!-- #sidebar -->