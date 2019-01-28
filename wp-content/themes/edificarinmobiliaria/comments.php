<?php
    if (!empty($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
        die (__('Por favor, no cargues esta página directamente. Gracias :-D', 'edificarinmobiliaria'));
    if ( post_password_required() ) { ?>
        <?php _e('Esta publicación está protegida con contraseña. Ingresá la password para ver los comentarios.', 'edificarinmobiliaria');?>
    <?php
        return;
    }
?>
<?php if ( have_comments() ) : ?>
    <h2 id="comments"><?php comments_number(__('No hay respuestas', 'edificarinmobiliaria'), __('Una Respuesta', 'edificarinmobiliaria'), __('% Respuestas', 'edificarinmobiliaria'));?></h2>
    <div class="navigation">
        <div class="next-posts"><?php previous_comments_link() ?></div>
        <div class="prev-posts"><?php next_comments_link() ?></div>
    </div>
    <ol class="commentlist">
        <?php wp_list_comments(); ?>
    </ol>
    <div class="navigation">
        <div class="next-posts"><?php previous_comments_link() ?></div>
        <div class="prev-posts"><?php next_comments_link() ?></div>
    </div>
<?php else : // this is displayed if there are no comments so far ?>
    <?php if ( comments_open() ) : // Si los comentarios están abiertos...bien...pero no hay comentariosa ahora. ?>
    <?php else : // comments are closed ?>
        <p><?php __('Los comentarios están cerrados', 'edificarinmobiliaria');?></p>
    <?php endif; ?>
<?php endif; ?>
<?php if ( comments_open() ) : ?>
<div id="respond">
    <h2><?php comment_form_title( __('Dejar un Comentario', 'edificarinmobiliaria'), __('Dejar un Comentario a %s', 'edificarinmobiliaria')); ?></h2>
    <div class="cancel-comment-reply">
        <?php cancel_comment_reply_link(); ?>
    </div>
    <?php if ( get_option('comment_registration') && !is_user_logged_in() ) : ?>
        <p><?php _e('Debes estar', 'edificarinmobiliaria');?> <a href="<?php echo wp_login_url( get_permalink() ); ?>"><?php _e('logueado', 'edificarinmobiliaria');?></a> <?php _e('para publicar un comentario', 'edificarinmobiliaria');?>.</p>
    <?php else : ?>
    <form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform">
    <?php if ( is_user_logged_in() ) : ?>
            <p><?php _e('Logueado como', 'edificarinmobiliaria');?> <a href="<?php echo get_option('siteurl'); ?>/wp-admin/profile.php"><?php echo $user_identity; ?></a>. <a href="<?php echo wp_logout_url(get_permalink()); ?>" title="Log out of this account"><small><?php _e('Desloguearse »', 'edificarinmobiliaria');?></small></a></p>
        <?php else : ?>
            <div>
                <label for="author"><?php _e('Apellido y Nombre', 'edificarinmobiliaria');?> <small><?php if ($req) echo _e('(Requerido)', 'edificarinmobiliaria'); ?></small></label>
                <input type="text" name="author" id="author" value="<?php echo esc_attr($comment_author); ?>" size="22" tabindex="1" <?php if ($req) echo "aria-required='true'"; ?> />
            </div>
            <div>
                <label for="email"><?php _e('E-Mail. No será publicado', 'edificarinmobiliaria');?> <small><?php if ($req) echo _e('(Requerido)', 'edificarinmobiliaria'); ?></small></label>
                <input type="text" name="email" id="email" value="<?php echo esc_attr($comment_author_email); ?>" size="22" tabindex="2" <?php if ($req) echo "aria-required='true'"; ?> />
            </div>
        <?php endif; ?>
        <!--<p>You can use these tags: <code><?php// echo allowed_tags(); ?></code></p>-->
        <div>
            <label for="comment"><?php _e('Comentario', 'edificarinmobiliaria');?></label>
            <textarea name="comment" id="comment" cols="58" rows="10" tabindex="4"></textarea>
        </div>
        <div>
            <input class="btn btn-info btn-large" name="submit" type="submit" id="submit" tabindex="5" value="<?php _e('Enviar Comentario', 'edificarinmobiliaria');?>" />
            <?php comment_id_fields(); ?>
        </div>
        <?php do_action('comment_form', $post->ID); ?>
    </form>
    <?php endif; // If registration required and not logged in ?>
</div>
<?php endif;?>