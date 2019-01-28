<?php
/* footer.php
* @package WordPress
* @subpackage edificarinmobiliaria
* @since edificarinmobiliaria 1.0
*/
?>
</div><!-- .row-fluid -->
<footer id="footer">
	<nav id="footer_nav">
		<?php
    $default=array(
 	 'container'=>false,
   'depth'=>1,
   'menu'=>'footer_nav',
   'theme_location'=>'footer_nav',
   'items_wrap'=>'<ul>%3$s</ul>'
    );wp_nav_menu($default);?>
		</nav>
		<p class="text-center" id="copyright">&copy; <?php _e('EDIFICAR | Servicios Inmobiliarios', 'edificarinmobiliaria');?>, <?=date('Y');?> | <i class="icon-envelope"></i> info@edificarinmobiliaria.com</p>
    <p><sub><?php _e('Desarrollado por ', 'edificarinmobiliaria');?><a href="http://www.webmoderna.com.ar" target="_blank">WebModerna</a></sub></p>
	</footer><!-- #footer -->
</div><!-- #contenedor-sitio-web -->
<script type="text/javascript" src="<?php echo get_stylesheet_directory_uri();?>/js/scripts.js">
</script>
<?php wp_footer();?>
</body>
</html>