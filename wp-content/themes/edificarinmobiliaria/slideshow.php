<?php
/* slideshow.php
* @package WordPress
* @subpackage edificarinmobiliaria
* @since edificarinmobiliaria 1.0
*/
/*Template Name: SlideShow */
?>
<?php get_header();?>
<!-- El loop de WordPress -->
<?php if (have_posts()) : while (have_posts()) : the_post(); 
get_page($page_id);
$page_data = get_page($page_id);
//echo ” . $page_data->post_title . ”;
//echo apply_filters(‘the_content’, $page_data->post_content);?>
<article class="">
	<?php the_breadcrumb();?>
	<h2 class="alert alert-success"><?php the_title();?></h2>
	<?php the_content();?>
	<?php endwhile;?>
	<?php endif;?>
</article>
</section>
<?php get_sidebar();?>
<?php get_footer();?>