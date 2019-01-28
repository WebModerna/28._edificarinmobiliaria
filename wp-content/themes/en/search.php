<?php
/* search.php
* @package WordPress
* @subpackage edificarinmobiliaria
* @since edificarinmobiliaria 1.0
*/
?>
<?php get_header();?>
	<h2><?php _e('Resultado de la búsqueda', 'edificarinmobiliaria');?></h2>
	<?php if (have_posts()) : while (have_posts()) : the_post();?>
<article id="search" class="page-header">
	<div class="thumbnail img-polaroid span2">
	<a href="<?php the_permalink();?>">
		<?php if (has_post_thumbnail()) {
			the_post_thumbnail('thumbnail');
		}	else { ?>
			<img class="" src="<?php echo get_stylesheet_directory_uri();?>/img/thumbnail.jpg" alt="<?php _e('Sin imagen', 'edificarinmobiliaria');?>">
		<?php };?>
	</a>
	</div>
	<div class="span10">
	<h3 ><a href="<?php the_permalink();?>"><?php the_title();?></a></h3>
	<small class="muted"><span class="label"><?php _e('Publicado el', 'edificarinmobiliaria');?></span> <?php the_time('j/m/Y');?><span> &raquo; </span>
		<span class="label"><?php _e('Clasificado en', 'edificarinmobiliaria');?></span> <?php the_category(' | ');?></small>
		
	<?php the_excerpt();?>
	</div>
</article>
<?php endwhile;?>

<!-- La paginación -->
<?php if (function_exists("pagination")) {pagination();};?>

<?php else: ?>
	<p class="hero-unit"><?php _e('Lo sentimos, pero no hay resultados con este término de búsqueda. Intenta otra búsqueda :-(','edificarinmobiliaria');?></p>

<?php endif;?>
</section>
<?php get_sidebar();?>
<?php get_footer();?>