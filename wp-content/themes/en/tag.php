<?php
/* tag.php
* @package WordPress
* @subpackage edificarinmobiliaria
* @since edificarinmobiliaria 1.0
*/
?>
<?php get_header();?>
<?php the_breadcrumb();?>
<?php $post = $posts[0];  ?>
<?php  if (is_category()) { ?>
	<?php } elseif( is_tag() ) { ?>
		<h4><?php _e('Etiqueta ','edificarinmobiliaria');?> &#8216;<?php single_tag_title(); ?>&#8217;</h4>
	<?php } elseif (is_day()) { ?>
		<h4><?php _e('Archivo para ','edificarinmobiliaria');?> <?php the_time('F jS Y'); ?>:</h4>
	<?php  } elseif (is_month()) { ?><h4>Archivo para <?php the_time('F, Y'); ?>:</h4>
	<?php } elseif (is_year()) { ?>
		<h4><?php _e('Archivo para ','edificarinmobiliaria');?> <?php the_time('Y'); ?>:</h4>
	<?php } elseif (is_author()) { ?>
		<h4><?php _e('Archivo del autor','edificarinmobiliaria');?></h4>
	<?php } elseif (isset($_GET['paged']) && !empty($_GET['paged'])) { ?>
		<h4><?php _e('Archivos del blog','edificarinmobiliaria');?></h4>
<?php } ?>

<!-- El loop de WordPress -->
	 <div class="">
		<!-- las entradas -->
		<article id="productos_home">
			<ul class="thumbnails">
			<?php if(have_posts()):while(have_posts()):the_post();?>
					<li class="span4">
				<div class="thumbnail">
					<a href="<?php the_permalink();?>">
								<?php //comprobando si hay miniaturas
								if(has_post_thumbnail()){the_post_thumbnail('custom-thumb-320');} else { ?>
						<img src="<?php echo get_stylesheet_directory_uri();?>/img/thumbnail.jpg" alt="<?php _e('Sin imagen', 'edificarinmobiliaria');?>">
						<?php };?>
					</a><!-- enlace de la imágen a la entrada -->
				<a href="<?php the_permalink(); ?>"><h4 class="text-center text-success page-header"><?php the_title();?></h4></a>
				<!-- Los precios -->
				<div>
					<?php los_precios();
					/*
					// Variables
					$edificarinmobiliaria_precio = rwmb_meta( 'edificarinmobiliaria_precio', '' );
					$edificarinmobiliaria_precio_dolar = rwmb_meta('edificarinmobiliaria_precio_dolar', '');
					
					if( $edificarinmobiliaria_precio )
					{
						echo '<span class="label label-warning">';
						echo __('Precio: ', 'edificarinmobiliaria');
						echo '$ ';
						echo $edificarinmobiliaria_precio;
						echo '</span>';
					}
					else if( $edificarinmobiliaria_precio_dolar )
					{
						echo '<span class="label label-warning">';
						echo __('Precio: ', 'edificarinmobiliaria');
						echo 'U$s ';
						echo $edificarinmobiliaria_precio_dolar;
						echo '</span>';
					}
					else
					{
						echo '<span class="label label-warning">';
						echo __('Precio: ', 'edificarinmobiliaria');
						echo '$ ';
						echo __('Consultar', 'edificarinmobiliaria');
						echo '</span>';
					};*/?>
					<br><br>
				<?php the_excerpt();?>
				<p class="text-right"><a href="<?php the_permalink(); ?>" class="btn btn-success"><?php _e('Ver más...', 'edificarinmobiliaria');?></a></p>
			</div>
		</li>
<?php endwhile; else: ?>
 <p class="hero-unit"><?php _e('No hay entradas ni productos publicados en esta categoría.', 'edificarinmobiliaria'); ?></p>
<?php endif;?>
	</ul>
</article>
</div><!-- #fin de las entradas -->

<!-- La paginación -->
<?php if (function_exists("pagination")) {pagination($additional_loop->max_num_pages);};?>
	
</section><!-- #contendero-contenido -->
<?php get_sidebar();?>
<?php get_footer();?>