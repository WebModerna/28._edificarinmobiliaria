<?php
/* contacto.php
* @package WordPress
* @subpackage edificarinmobiliaria
* @since edificarinmobiliaria 1.0
* Template Name: Contacto
*/ ?>
<?php get_header();?>
<!-- El loop de WordPress -->
<?php if (have_posts()) : while (have_posts()) : the_post();
get_page($page_id); $page_data = get_page($page_id);?>
<article id="contacto-mapa">
	<?php the_breadcrumb();?>
	<h2 class="alert alert-success"><?php the_title();?></h2>
	<?php the_content();?>
	<!-- El formulario de contacto -->
	<?php //if (uls_get_user_language()!=='en_US'){ ?>
	<div class="formulario span4"><?php echo do_shortcode('[contact-form-7 id="10" title="Formulario de contacto"]');?></div>
	<!--<?php// } else { ?>-->
	<!--<div class="formulario span4"><?php //echo do_shortcode('[contact-form-7 id="225" title="Contact Form"]');?></div>-->	
	<!--<?php// };?>-->
	<!-- El Mapa de Ubicación de la Inmobiliaria -->
	<div class="elmapa span6 pull-right"><?php echo do_shortcode('[codepeople-post-map]');?></div>
	<?php endwhile;?>
	<?php endif;?>
	<div class="clearfix"></div>
</article>
</section>
<?php get_sidebar();?>
<?php get_footer();?>