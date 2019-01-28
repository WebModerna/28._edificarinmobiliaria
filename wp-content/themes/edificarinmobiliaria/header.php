<!DOCTYPE html>
<html <?php language_attributes();?>>
<head>
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0" />
<meta name="description" content="<?php bloginfo('description');?>" />
<meta name="keywords" content="inmobiliaria, Mina Clavero, Villa Cura Brochero, Nono, Panaholma, Arroyo de los Patos, San Lorenzo, Los Hornillos, Traslasierra, compra, venta, alquiler, campos, casas, chacras, terrenos, lotes, hoteles, cabañas, complejos, departamentos" />
<?php if (is_home()) {?>
<title><?php bloginfo('name');?> | <?php _e('Tu inmobiliaria en Traslasierra', 'edificarinmobiliaria');?></title>
<?php } else { ?> 
<title><?php the_title();?> | <?php bloginfo('name');?></title>
<?php };?>
<?php //include 'bootstrap.php';?>
<link href="<?php echo get_stylesheet_directory_uri();?>/css/bootstrap.css" rel="stylesheet" media="all">
<?php if (wp_is_mobile()==false) { ?>
<!-- Script Media Queries y semánticos para el IE -->
<!--[if IE 8]>
<script type="text/javascript" src="<?php echo get_stylesheet_directory_uri();?>/js/html5.js"></script>
<script type="text/javascript" src="<?php echo get_stylesheet_directory_uri();?>/js/css3-mediaqueries.js"></script>
<script type="text/javascript" src="<?php echo get_stylesheet_directory_uri();?>/js/selectivizr-min.js"></script>
<script type="text/javascript" src="<?php echo get_stylesheet_directory_uri();?>/js/lte-ie7.js"></script>
<![endif]-->
<!--[if gte IE 9]>
<style type="text/css">.gradient {filter:none;}</style>
<![endif]-->
<?php };?>

<link rel="shortcut icon" href="<?php //bloginfo('url');?>/favicon.ico" type="image/x-icon" />
<?php if (wp_is_mobile()) { // Favicones para iPad, etc... ?>
<!-- <link rel="apple-touch-icon-precomposed" sizes="57x57" href="<?php bloginfo('url');?>/img/apple-touch-icon-57x57.png" />
<link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?php bloginfo('url');?>/img/apple-touch-icon-114x114.png" />
<link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?php bloginfo('url');?>/img/apple-touch-icon-72x72.png" />
<link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?php bloginfo('url');?>/img/apple-touch-icon-144x144.png" />
<link rel="apple-touch-icon-precomposed" sizes="60x60" href="<?php bloginfo('url');?>/img/apple-touch-icon-60x60.png" />
<link rel="apple-touch-icon-precomposed" sizes="120x120" href="<?php bloginfo('url');?>/img/apple-touch-icon-120x120.png" />
<link rel="apple-touch-icon-precomposed" sizes="76x76" href="<?php bloginfo('url');?>/img/apple-touch-icon-76x76.png" />
<link rel="apple-touch-icon-precomposed" sizes="152x152" href="<?php bloginfo('url');?>/img/apple-touch-icon-152x152.png" /> -->
<?php };?>

<!--
<link rel="icon" type="image/png" href="<?php bloginfo('url');?>/img/favicon-196x196.png" sizes="196x196" />
<link rel="icon" type="image/png" href="<?php bloginfo('url');?>/img/favicon-96x96.png" sizes="96x96" />
<link rel="icon" type="image/png" href="<?php bloginfo('url');?>/img/favicon-32x32.png" sizes="32x32" />
<link rel="icon" type="image/png" href="<?php bloginfo('url');?>/img/favicon-16x16.png" sizes="16x16" />
<link rel="icon" type="image/png" href="<?php bloginfo('url');?>/img/favicon-128.png" sizes="128x128" />
<meta name="application-name" content="<?php bloginfo('name');?>"/>
<meta name="msapplication-TileColor" content="#FFFFFF" />
<meta name="msapplication-TileImage" content="<?php bloginfo('url');?>/img/mstile-144x144.png" />
<meta name="msapplication-square70x70logo" content="<?php bloginfo('url');?>/img/mstile-70x70.png" />
<meta name="msapplication-square150x150logo" content="<?php bloginfo('url');?>/img/mstile-150x150.png" />
<meta name="msapplication-wide310x150logo" content="<?php bloginfo('url');?>/img/mstile-310x150.png" />
<meta name="msapplication-square310x310logo" content="<?php bloginfo('url');?>/img/mstile-310x310.png" /> -->

<?php wp_head();?>
</head>
<body class="container-fluid">
	<div id="contenedor-sitio-web" class="row-fluid">
		<header id="header" class="span12">
			<nav id="header_nav" class="navbar navbar-inverse">
				<div class="navbar-inner">
					<div class="container-fluid">
						<a data-target=".navbar-responsive-collapse" data-toggle="collapse" class="btn btn-navbar collapsed">MENU</a>
					<div class="nav-collapse navbar-responsive-collapse collapse">
						<?php 
							$default=array(
								'container'=>false,
								'depth'=>2,
								'menu'=>'header_nav',
								'theme_location'=>'header_nav',
								'items_wrap'=>'<ul class="nav">%3$s</ul>'
							);
							wp_nav_menu($default);?>
						<ul class="visible-phonenav pull-right">
							<li>
								<form method="get" id="searchform" action="<?php bloginfo('url');?>" class="navbar-search form-search">
									<div class="input-append text-center">
										<input type="text" class="input-medium search-query" placeholder="<?php _e('Buscar...','edificarinmobiliaria');?>" value="<?php the_search_query();?>" name="s" id="s">
										<button type="submit" class="btn btn-inverse">
											<i class="icon-search"></i>
										</button>
									</div><!-- .input-append-->
								</form><!-- fin formulario -->
							</li>
						</ul><!-- .visible-phonenav -->
					</div><!-- .nav-collapse -->
				</div><!-- .container-fluid-->
			</div><!-- .navbar-inner -->
		</nav><!-- #header_nav -->
			<div class="row-fluid">
				<div id="logo" class="span4">
					<?php	$recent = new WP_Query("page_id=195"); while($recent->have_posts()) : $recent->the_post();?>
					<a href="<?php bloginfo('url');?>"><h1><?php the_post_thumbnail('logo'); endwhile; wp_reset_query();?></h1></a>
					<?php wp_reset_query();?>
				</div><!-- #logo -->
				<div class="span8 page-header">
					<?php if (wp_is_mobile()==false) { ?>
					<h2>
						<?php _e('tu inmobiliaria en Traslasierra', 'edificarinmobiliaria');?>
					</h2>
					<?php };?>
						<div id="traduccion"><?php if ( function_exists( 'the_msls' ) ) the_msls();?></div>
					<div id="redes-sociales" class="icomoon">
						<!--<a data-icon="&#xe017;" aria-hidden="true" href="http://www.facebook.com/edgardroul" target="_blank" title="Facebook"></a>
						<a data-icon="&#xe01f;" aria-hidden="true" href="http://www.skype.com" target="_blank" title="Skype"></a>
						<a data-icon="&#xe016;" aria-hidden="true" href="https://plus.google.com/u/0/103118338879273357474/posts?partnerid=gplp0" target="_blank" title="Google+"></a>
						<a data-icon="&#xe018;" aria-hidden="true" href="https://www.twitter.com/edgardroul" target="_blank" title="Twitter"></a>-->
						<a data-icon="&#xe014;" aria-hidden="true" href="<?php bloginfo('rss2_url');?>" target="_blank" title="RSS"></a>
						<a data-icon="&#xe015;" aria-hidden="true" href="mailto:info@edificarinmobiliaria.com" target="_blank" title="Email"></a>
					</div>
				</div><!-- .page-header -->
			</div><!-- .row-fluid -->
		</header><!-- #header -->
	<div class="row-fluid">
		<section id="contenedor-contenido" class="span8">