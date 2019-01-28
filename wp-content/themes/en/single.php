 <?php
  $post = $wp_query->post;
  if (in_category('2'))
   include(TEMPLATEPATH.'/single_noticias.php');
  else
   include(TEMPLATEPATH.'/single_default.php');
?> 