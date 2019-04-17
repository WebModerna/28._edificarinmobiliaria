<!DOCTYPE html>
<html <?php language_attributes();?>>
<head>
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0" />
<meta name="description" content="<?php bloginfo('description');?>" />
<meta name="keywords" content="real estate office, Mina Clavero, Villa Cura Brochero, Nono, Panaholma, Arroyo de los Patos, San Lorenzo, Los Hornillos, Traslasierra, sell, buy, rentals, fields, houses, flat, lands, hotels" />

<?php if ( is_home() ) {?>
<title><?php bloginfo('name');?> | <?php _e('Tu inmobiliaria en Traslasierra', 'edificarinmobiliaria');?></title>

<?php } elseif ( is_category() ) {?>
	<title><?php printf( __( '%s', 'edificarinmobiliaria' ), single_cat_title( '', false ) ); ?> - <?php bloginfo('name');?></title>

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

<!-- Los favicones -->
<link rel="shortcut icon" type="image/x-icon" href="<?php bloginfo('stylesheet_directory');?>/img/favicon.ico" />
<link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?php bloginfo('stylesheet_directory');?>/img/apple-touch-icon-144x144.png" />
<link rel="apple-touch-icon-precomposed" sizes="152x152" href="<?php bloginfo('stylesheet_directory');?>/img/apple-touch-icon-152x152.png" />
<link rel="icon" type="image/png" href="<?php bloginfo('stylesheet_directory');?>/img/favicon-32x32.png" sizes="32x32" />
<link rel="icon" type="image/png" href="<?php bloginfo('stylesheet_directory');?>/img/favicon-16x16.png" sizes="16x16" />

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
					<?php
					$recent = new WP_Query("page_id=230"); while($recent->have_posts()) : $recent->the_post();?>
					<a href="<?php bloginfo('url');?>"><h1><?php the_post_thumbnail('logo'); endwhile; wp_reset_query();?></h1></a>
					<?php wp_reset_query();?>
				</div><!-- #logo -->
				<div class="span8 page-header">
					<?php if (!wp_is_mobile()==true) { ?><h2><?php _e('tu inmobiliaria en Traslasierra', 'edificarinmobiliaria');?></h2><?php };?>
						<span id="traduccion"><?php if ( function_exists( 'the_msls' ) ) the_msls(); ?></span>
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