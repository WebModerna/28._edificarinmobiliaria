<?php
/* page.php
* @package WordPress
* @subpackage edificarinmobiliaria
* @since edificarinmobiliaria 1.0
*/ ?>
<?php get_header();?>
<!-- El loop de WordPress -->
<?php if (have_posts()) : while (have_posts()) : the_post();
get_page($page_id); $page_data = get_page($page_id);?>
<article>
	<?php the_breadcrumb();?>
	<h2 class="alert alert-success"><?php the_title();?></h2>
	<figure class="noticias">
		<?php //comprobando si hay miniaturas
		if(has_post_thumbnail()){the_post_thumbnail('custom-thumb-690',array('class'=>'img-rounded'));} else { ?>
		<img class="img-rounded" src="<?php echo get_stylesheet_directory_uri();?>/img/thumbnail.jpg" alt="<?php _e('Sin imagen', 'edificarinmobiliaria');?>">
		<?php };?>
	</figure>
	<?php the_content();?>
	<?php endwhile;?>
	<?php endif;?>
</article>
</section>
<?php get_sidebar();?>
<?php get_footer();?>