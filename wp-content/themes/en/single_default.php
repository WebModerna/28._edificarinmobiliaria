<?php
/* single.php
* @package WordPress
* @subpackage edificarinmobiliaria
* @since edificarinmobiliaria 1.0
*/
?>
<?php get_header();?>
<!-- El loop de WordPress -->
<div>
<?php if (have_posts()) : while (have_posts()) : the_post() ;?>
 <article id="producto">
	<?php the_breadcrumb();?>
	<h3 class="alert alert-success"><?php 
	// El Titular de que estamos viendo una entrada
	the_title();?></h3>
	<!-- las entradas -->
			<!-- Comprobando si es un móvil o no. Solo se muestra si no lo es -->
	<div id="carousel-post" class="carousel slide span9"><!-- Imágenes de tamaño full -->
		<div class="carousel-inner">
			<?php $attachID = (get_post_meta( $post->ID, 'custom_imagenrepetible',true));?>
			<?php //comprobando si hay miniaturas
				if(has_post_thumbnail()){the_post_thumbnail('custom-thumb-320',array('class'=>'active item'));} else { ?>
				<img class="item active" src="<?php echo get_stylesheet_directory_uri();?>/img/thumbnail.jpg" alt="<?php _e('Sin imagen', 'edificarinmobiliaria');?>">
				<?php };?>
			<?php if ($attachID !== '') {
			foreach ($attachID as $item) {
				$imagen = wp_get_attachment_image_src($item,'custom-thumb-320'); // Obtenemos la image "full". En vez de full podemos poner otro que dispongamos en nuestro tema
				$alt = get_post_meta($item, '_wp_attachment_image_alt', true); // Si queremos obtener el alt de la imagen
				$descripcion = get_post_field('post_content', $item); // Si queremos obtener la descripción de la imagen
				echo '<img class="item" src="' . $imagen[0] . '"';
					if (count($alt)) { echo ' alt="' . $alt . '"';}
				echo ' />';};}?>
		</div><!-- .carousel-inner -->
	<?php if($attachID !== '') { ?>
	<!-- Carousel Navegación -->
	<a class="carousel-control left" href="#carousel-post" data-slide="prev">&lsaquo;</a>
	<a class="carousel-control right" href="#carousel-post" data-slide="next">&rsaquo;</a>
	<?php };?>

	<!-- A esto lo eliminamos de un móvil-->
	<?php if(!wp_is_mobile()==true) { ?>
	<?php if($attachID !== '') { ?>
	<div id="zoom-content" class="icomoon">
		<a id="zoom" data-icon="&#xe008;" aria-hidden="true" href="#carousel-fancybox" data-toggle="modal"></a>
	</div>
	</div><!-- fin del carousel para el producto -->
	<!-- Acá va lo que se muestra dentro del Fancybox. Mejor dicho el "modal", según Bootstrap -->
	<div id="carousel-fancybox" class="modal hide fade">
		<div id="carousel-post-fancybox" class="carousel slide"><!-- Imágenes de tamaño full -->
		<div class="carousel-inner">
			<?php $attachID = (get_post_meta( $post->ID, 'custom_imagenrepetible',true));?>
			<?php //comprobando si hay miniaturas
				if(has_post_thumbnail()){the_post_thumbnail('custom-thumb-690',array('class'=>'active item'));} else { ?>
				<img class="item active" src="<?php echo get_stylesheet_directory_uri();?>/img/thumbnail.jpg" alt="<?php _e('Sin imagen', 'edificarinmobiliaria');?>">
				<?php };?>
			<?php
			foreach ($attachID as $item) {
				$imagen = wp_get_attachment_image_src($item,'custom-thumb-690'); // Obtenemos la image "full". En vez de full podemos poner otro que dispongamos en nuestro tema
				$alt = get_post_meta($item, '_wp_attachment_image_alt', true); // Si queremos obtener el alt de la imagen
				$descripcion = get_post_field('post_content', $item); // Si queremos obtener la descripción de la imagen
				echo '<img class="item" src="' . $imagen[0] . '"';
					if (count($alt)) { echo ' alt="' . $alt . '"';}
				echo ' />';};?>
		</div><!-- .carousel-inner -->
	<!-- Carousel Navegación -->
	<a class="carousel-control left" href="#carousel-post-fancybox" data-slide="prev">&lsaquo;</a>
	<a class="carousel-control right" href="#carousel-post-fancybox" data-slide="next">&rsaquo;</a>
	</div>
	<div class="icomoon">
		<a id="zoom-cerrar" data-dismiss="modal" data-icon="&#xe009;" aria-hidden="true" href="#carousel-post-fancybox" title="<?php _e('Cerrar', 'edificarinmobiliaria');?>"></a>
	</div>
	<?php };?>
	<?php };?>
	</div>
	<!--Fin del pseudo Fancybox-->
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
<?php the_content();?>
	<div class="clearfix"></div>
<hr />
<div class="span4 formulario pull-left">
	<?php // el formulario de contacto
	echo do_shortcode('[contact-form-7 id="226" title="Consulte este Producto"]');?>
</div>

<div class="span6 elmapa pull-right">
	<?php echo do_shortcode('[codepeople-post-map]');?>
</div>
<div class="clearfix"></div>
<hr />
<!-- Los Comentarios -->
<div class="comentarios">
<?php comments_template(); ?>
</div><!-- .fin de los comentarios -->

<?php endwhile; else: ?>
<p class="hero-unit"><?php _e('No hay entradas ni productos publicados.', 'edificarinmobiliaria'); ?></p>
<?php endif; ?>
<?php wp_reset_query();?>
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