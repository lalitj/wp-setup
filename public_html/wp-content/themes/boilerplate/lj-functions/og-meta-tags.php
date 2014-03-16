<?php
function og_meta_tags(){
    //if(is_single()) {
        global $post;
        $short_content = substr(strip_tags($post->post_content),0,180);
        ?>
        <meta property="og:title" content="<?php the_title(); ?>" />
        <meta property="og:type" content="website" />
        <meta property="og:url" content="<?php the_permalink(); ?>/" />
        <meta property="og:description" content="<?php echo $short_content; ?>" />
        <?php $image_url = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full'); ?>
        <meta property="og:image" content="<?php echo $image_url[0]; ?>" />
        <?php
        wp_reset_query();
    //}
}


add_action('wp_head', 'og_meta_tags');