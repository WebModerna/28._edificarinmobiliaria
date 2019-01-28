<?php
/* single.php
* @package WordPress
* @subpackage edificarinmobiliaria
* @since edificarinmobiliaria 1.0
*/
?>
<?php get_header();?>
<div>
<?php if (have_posts()) : while (have_posts()) : the_post() ;?>
	<article id="producto">
		<?php the_breadcrumb();?>
		<h3 class="alert alert-success"><?php 
		// El Titular de que estamos viendo una entrada
		the_title();?></h3>
		<figure class="noticias">
			<?php //comprobando si hay miniaturas
			if(has_post_thumbnail()){the_post_thumbnail('custom-thumb-690',array('class'=>'img-rounded'));} else { ?>
			<img class="img-rounded" src="<?php echo get_stylesheet_directory_uri();?>/img/thumbnail.jpg" alt="<?php _e('Sin imagen', 'edificarinmobiliaria');?>">
			<?php };?>
		</figure>
		<?php the_content();?>
		<?php endwhile; else: ?>
			<p class="hero-unit"><?php _e('No hay entradas ni productos publicados.', 'edificarinmobiliaria'); ?></p>
		<?php endif; ?>
		<div class="clearfix"></div>
		<hr />
		<div class="comentarios">
			<?php // Los Comentarios
			comments_template(); ?>
		</div>
	</article>
</div><!-- #fin de las entradas -->

<!-- #pagination -->
<div class="alert alert-success">
	<span class="pull-left">
	<?php previous_post_link(); echo _e(" | Anterior", "edificarinmobiliaria");?>
	</span>
	<span class="pull-right">
		<?php echo _e("Siguiente | ", "edificarinmobiliaria"); next_post_link();?>
	</span>
	<div class="clearfix"></div>
</div>
<!-- #pagination -->
</section><!-- #contendero-contenido -->
<?php get_sidebar();?>
<?php get_footer();?>