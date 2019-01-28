<?php
/* index.php
* @package WordPress
* @subpackage edificarinmobiliaria
* @since edificarinmobiliaria 1.0
*/
?>
<?php get_header();?>
<?php //Compruebo si es o no un móvil
if (wp_is_mobile()==false) { ?>
<div id="myCarousel" class="carousel slide">
		<?php  wp_reset_query() // Fin del SlideShow ?>
<!-- Carousel items -->
<div class="carousel-inner">
<?php $recent = new WP_Query("page_id=235"); while($recent->have_posts()) : $recent->the_post();?>
	<figure class="active item">
		<?php the_post_thumbnail('custom-thumb-860', array('class'=>'img-rounded'));
		echo '<figcaption>'.get_post(get_post_thumbnail_id())->post_content.'</figcaption>';//con esto mostramos el alt o descripcion de la imágen. ?>
	</figure>
	<?php $attachID = (get_post_meta( $post->ID, 'custom_imagenrepetible',true));?>
	<?php if ($attachID !== '') {
		foreach ($attachID as $item) {
			$imagen = wp_get_attachment_image_src($item,'custom-thumb-860'); // Obtenemos las imágenes finitas de 800px;
			$alt = get_post_meta($item, '_wp_attachment_image_alt', true); // Si queremos obtener el alt de la imagen
			$descripcion = get_post_field('post_content', $item); // Si queremos obtener la descripción de la imagen
			echo '<figure class="item"><img class="img-rounded" src="' . $imagen[0] . '" width="' . $imagen[1] . '" height="' . $imagen[2] . '"';
			if (count($alt)) { echo ' alt="' . $alt . '"';}
			echo ' /><figcaption>' . $descripcion . '</figcaption></figure>';};}?>
	<?php if($attachID !== '') { ?>
	<?php };?>
	<?php endwhile; wp_reset_query() // Fin del SlideShow ?>
</div><!-- .carousel-inner -->
	<!-- Carousel Navegación -->
	<a class="carousel-control left" href="#myCarousel" data-slide="prev">&lsaquo;</a>
	<a class="carousel-control right" href="#myCarousel" data-slide="next">&rsaquo;</a>
</div><!-- #myCarousel -->
<?php }; // fin del slideshow carrousel ?>
<!-- El loop de WordPress -->
   <div class="clearfix">
	<!-- El Titular de donde estamos. Primero analizaremos si está o no en el home y de acuerdo a eso mostramos un mensaje. -->
	<?php if(is_home()==true) { ?>
	<h2><?php _e('Ultimos productos seleccionados','edificarinmobiliaria');?></h2>
	<?php } else { ?>
	<h2 class="alert alert-success"><?php the_title();?></h2>
	<?php };?>
	<!-- las entradas -->
	<article id="productos_home">
		<ul class="thumbnails">
			<?php //if (have_posts()) : while (have_posts()) : the_post() Este es el original ahora lo cambiaré por el que está más abajo para excluir la categoría Noticias;
			if ( have_posts() ) : query_posts($query_string .'&cat=-2'); while ( have_posts() ) : the_post();
			?>
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
					<?php
					$villabrochero_precio = rwmb_meta( 'villabrochero_precio', '' );
					$villabrochero_precio_dolar = rwmb_meta('villabrochero_precio_dolar', '');
					
					if( $villabrochero_precio )
					{
						echo '<span class="label label-warning">';
						echo __('Precio: ', 'edificarinmobiliaria');
						echo '$ ';
						echo $villabrochero_precio;
						echo '</span>';
					}
					else if( $villabrochero_precio_dolar )
					{
						echo '<span class="label label-warning">';
						echo __('Precio: ', 'edificarinmobiliaria');
						echo 'U$s ';
						echo $villabrochero_precio_dolar;
						echo '</span>';
					}
					else
					{
						echo '<span class="label label-warning">';
						echo __('Precio: ', 'edificarinmobiliaria');
						echo '$ ';
						echo __('Consultar', 'edificarinmobiliaria');
						echo '</span>';
					};?>
					<br><br>
				<?php the_excerpt();?>
				<p class="text-right"><a href="<?php the_permalink(); ?>" class="btn btn-success"><?php _e('Ver más...', 'edificarinmobiliaria');?></a></p>
			</div>
		</li>
<?php endwhile; else: ?>
 <p><?php _e('No hay entradas.', 'edificarinmobiliaria'); ?></p>
<?php endif; ?>
<?php wp_reset_query();?>
	</ul>
</article>
</div><!-- #fin de las entradas -->
<div class="clearfix"></div>
<!-- La paginación -->
<?php if (function_exists("pagination")) {pagination();};?>
</section><!-- #contendero-contenido -->
<?php get_sidebar();?>
<?php get_footer();?>