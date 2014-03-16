<?php

// To change the wordpress default logo in admin Login...
/**
* Change admin login logo
*/
function change_my_wp_login_image() {
echo "
<style>
    /* For extra styling of logo
    body.login #login h1{
        background:white;
        margin:0px 3px 10px 10px;
        border-radius: 5px;
    }*/
    body.login #login h1 a {
        background: url('".get_bloginfo('template_url')."/assets/images/logo.png') 70px 20px no-repeat transparent;
        width:320px; }
</style>
";
}
add_action("login_head", "change_my_wp_login_image");

/**
* Change admin login header link
*/
function custom_login_url() {
return home_url( '/' );
}
add_filter( 'login_headerurl', 'custom_login_url' );

/**
* Change Admin Login Link Alt Text
*/
function custom_login_title() {
return get_option( 'blogname' );
}
add_filter( 'login_headertitle', 'custom_login_title' );

/*
 * Wrap all the editor content with
 * extra div to apply editor styling
 * only on editor content
 */
add_filter( 'the_content', 'wrap_the_content_with_div' );
function wrap_the_content_with_div($content) {
    if($content){
        $content = "<div class='editor-content'>$content</div>";
    }
    return $content;
}

/*
 * Add active class in the active menu
 */
add_filter( 'nav_menu_css_class', 'additional_active_item_classes', 10, 2 );

function additional_active_item_classes($classes = array(), $menu_item = false){

    if(in_array('current-menu-item', $menu_item->classes)){
        $classes[] = 'active';
    }

    return $classes;
}

/*
 * Allow extra mime types in upload section
 */
add_filter('upload_mimes', 'my_myme_types', 1, 1);

function my_myme_types($mime_types){
    //$mime_types['epub'] = 'application/xhtml+xml'; //Adding avi extension
    //$mime_types['mobi'] = 'application/x-mobipocket-ebook'; //Adding avi extension
    return $mime_types;
}