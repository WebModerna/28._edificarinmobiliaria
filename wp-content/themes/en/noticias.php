<?php
/* noticias.php
* @package WordPress
* @subpackage edificarinmobiliaria
* @since edificarinmobiliaria 1.0
*/
/*Template Name: Noticias */
?>
<?php get_header();?>
<?php the_breadcrumb();?>
<article>
  <h2 class="alert alert-success"><?php _e('Noticias', 'edificarinmobiliaria');?></h2>
</article>
  <?php // Mostrando el contenido de las noticias y promociones
  $recent = new WP_Query("cat=2"); while($recent->have_posts()) : $recent->the_post();?>
<article class="media">
  <h3><a href="<?php the_permalink();?>"><?php the_title();?></a></h3>
  <div class="muted inline">
    <?php _e('Publicado el ', 'edificarinmobiliaria');?>
    <?php the_time('j/m/Y');?>
    <?php _e(' por ', 'edificarinmobiliaria');?><?php the_author_posts_link()?>. <br />
    <?php _e('Clasificado en: ', 'edificarinmobiliaria');?>
    <span class="inline"><?php the_category(' | ');?></span>
  </div>
  <div class="thumbnail pull-left">
    <a href="<?php the_permalink();?>">
    <?php if (has_post_thumbnail()) {
      the_post_thumbnail('thumbnail', array('class'=>'img-polaroid'));} else { ?>
      <img class="img-polaroid" src="<?php bloginfo('stylesheet_directory');?>/img/thumbnail.jpg" alt="<?php _e('Sin imagen', 'edificarinmobiliaria');?>">
      <?php };?>
    </a>
  </div><!-- .thumbnail pull-left -->
  <?php the_excerpt();?>
  <div class="clearfix"></div>
  <hr />
</article>
<?php endwhile;?>
<?php wp_reset_query(); wp_reset_postdata() ?>

<?php //La paginación 
if (function_exists("pagination")) {pagination();};?>
</section><!-- #pincipal -->
<?php  get_sidebar()?>
<?php get_footer(); ?>