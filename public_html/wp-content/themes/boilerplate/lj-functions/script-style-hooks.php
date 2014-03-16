<?php
/**
 * Enqueue scripts and styles for the front end.
 *
 * @since Twenty Fourteen 1.0
 *
 * @return void
 */
function twentyfourteen_scripts()
{
    global $wp_scripts;

    //@TODO media option not added yet screen , projection
    // Load our editor stylesheet.
    wp_enqueue_style('editor-style', get_bloginfo('stylesheet_directory') . '/assets/stylesheets/editor-style.css', array(), null);

    // Load our main stylesheet.
    wp_enqueue_style('main-style', get_bloginfo('stylesheet_directory') . '/assets/stylesheets/screen.css', array(), null, "screen");

    //Load the Internet Explorer specific stylesheet. [if lte IE 8]
    wp_register_style('my-style-ie', get_bloginfo('stylesheet_directory') . '/assets/stylesheets/ie8.css', array(), null);
    $GLOBALS['wp_styles']->add_data('my-style-ie', 'conditional', 'lte IE 8');
    wp_enqueue_style('my-style-ie');

    //Load the Internet Explorer specific stylesheet. [if IE 9]
    wp_register_style('my-style-ie-9', get_bloginfo('stylesheet_directory') . '/assets/stylesheets/ie9.css', array(), null);
    $GLOBALS['wp_styles']->add_data('my-style-ie-9', 'conditional', 'IE 9');
    wp_enqueue_style('my-style-ie-9');


    //Footer Scripts
    wp_enqueue_script( 'jquery',false,array(),null,true);
    wp_enqueue_script( 'boilerplate-plugins', get_template_directory_uri() . '/assets/js/plugins.js',array('jquery'),null,true);
    wp_enqueue_script( 'jquery-validate', get_template_directory_uri() . '/assets/js/libs/jquery.validate.js',array('jquery'),null,true);
    wp_enqueue_script( 'boilerplate-scripts', get_template_directory_uri() . '/assets/js/script.js',array('boilerplate-plugins'),null,true);

    if (is_singular() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }

    if (is_singular() && wp_attachment_is_image()) {
        //wp_enqueue_script('twentyfourteen-keyboard-image-navigation', get_template_directory_uri() . '/js/keyboard-image-navigation.js', array('jquery'), '20130402');
    }

    if(0){//For WP Slider

        if (is_active_sidebar('sidebar-3')) {
            wp_enqueue_script('jquery-masonry');
        }

        if (is_front_page() && 'slider' == get_theme_mod('featured_content_layout')) {
            wp_enqueue_script('twentyfourteen-slider', get_template_directory_uri() . '/js/slider.js', array('jquery'), '20131205', true);
            wp_localize_script('twentyfourteen-slider', 'featuredSliderDefaults', array(
                'prevText' => __('Previous', 'twentyfourteen'),
                'nextText' => __('Next', 'twentyfourteen')
            ));
        }
    }
}
add_action('wp_enqueue_scripts', 'twentyfourteen_scripts');

//Loads HTML5 JavaScript file to add support for HTML5 elements in older IE versions. [if lte IE 9]
add_action('wp_head', function () {
    ?>
    <!--[if lt IE 9]>
    <script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <script>window.html5 || document.write('<script src="<?php bloginfo("template_url"); ?>/assets/js/libs/html5.js"><\/script>')</script>;
    <script src="<?php echo get_template_directory_uri(); ?>/assets/js/html5.js" type="text/javascript"></script>
    <![endif]-->
<?php
});

show_admin_bar( false );