 <?php
  $post = $wp_query->post;
  if (in_category('27'))
   include(TEMPLATEPATH.'/single_noticias.php');
  else
   include(TEMPLATEPATH.'/single_default.php');
?> 