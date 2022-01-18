<?php
/* Assets Functions */
function load_stylesheets()
{

    /* Main Style */
    wp_register_style('main', get_template_directory_uri() . '/css/main.css', array(), false, 'all');
    wp_enqueue_style('main');
    /* END Main Style */

    /* Slick Style */
    wp_register_style('slick', get_template_directory_uri() . '/css/slick.min.css', array(), false, 'all');
    wp_enqueue_style('slick');
    /* END Slick Style */

    /* Bootstrap Style */
    wp_register_style('bootstrap', get_template_directory_uri() . '/css/bootstrap.min.css', array(), false, 'all');
    wp_enqueue_style('bootstrap');
    /* END Bootstrap Style */

    /* Font Awesome Style */
    wp_register_style('font-awesome', get_template_directory_uri() . '/css/font-awesome.min.css', array(), false, 'all');
    wp_enqueue_style('font-awesome');
    /* END Font Awesome Style */

    /* Google Font Noto Style */
    wp_register_style('noto', 'https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@400;500;700;900&display=swap', array(), false, 'all');
    wp_enqueue_style('noto');
    /* END Google Font Noto Style */

    /* Google Font Dancing Style */
    wp_register_style('dancing', 'https://fonts.googleapis.com/css2?family=Dancing+Script:wght@700&display=swap', array(), false, 'all');
    wp_enqueue_style('dancing');
    /* END Google Font Dancing Style */

    /* JQuery Script */
    wp_register_script('jquery-theme', get_template_directory_uri() . '/js/jquery-3.2.1.min.js', array(), false, 'true');
    wp_enqueue_script('jquery-theme');
    /* END JQuery Script */

    /* Bootstrap Script */
    wp_register_script('bootstrap', get_template_directory_uri() . '/js/bootstrap.min.js', array(), false, 'true');
    wp_enqueue_script('bootstrap');
    /* END Bootstrap Script */

    /* Slick Script */
    wp_register_script('slick', get_template_directory_uri() . '/js/slick.min.js', array(), false, 'true');
    wp_enqueue_script('slick');
    /* END Slick Script */

    /* Main Script */
    wp_register_script('main', get_template_directory_uri() . '/js/main.js', array(), false, 'true');
    wp_enqueue_script('main');
    /* END Main Script */

}

add_action('wp_enqueue_scripts', 'load_stylesheets');
/* Assets Functions */


/* Menu Functions */
function register_my_menus()
{
    register_nav_menus(
        array(
            'header' => __('Header Menu', 'fusion'),
            'footer' => __('Footer Menu', 'fusion')
        )
    );
}

add_action('init', 'register_my_menus');

/**
 * Register Custom Navigation Walker
 */
function register_navwalker()
{
    require_once get_template_directory() . '/classes/class-wp-bootstrap-navwalker.php';
}

add_action('after_setup_theme', 'register_navwalker');


add_theme_support('menus');
/* END Menu Functions */

add_theme_support('post-thumbnails');
add_image_size('small', 300, 300, false);
add_image_size('large', 600, 600, false);


/* Widgets Functions */
function themename_widgets_init()
{
    register_sidebar(array(
        'name' => __('Page Sidebar', 'fusion'),
        'id' => 'page-sidebar',
        'before_widget' => '<div class="sidebar">',
        'after_widget' => '</div>',
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>'
    ));

    register_sidebar([
        'name' => __('Post Sidebar', 'fusion'),
        'id' => 'post-sidebar',
        'before_widget' => '<div class="sidebar">',
        'after_widget' => '</div>',
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>'
    ]);
}

add_action('widgets_init', 'themename_widgets_init');

/* END Widgets Functions */

/* Classes  */

require_once get_parent_theme_file_path('/classes/recent-post.php');
require_once get_parent_theme_file_path('/classes/categories.php');
require_once get_parent_theme_file_path('/classes/about-me.php');
require_once get_parent_theme_file_path('/classes/tags.php');
require_once get_parent_theme_file_path('/classes/social-icons.php');

/* END Classes  */


/* Functions  */
require_once get_parent_theme_file_path('/helper-functions/comments.php');
/* END Functions  */

add_filter('get_image_tag_class', 'wpse302130_add_image_class');

/**
 * Comment form hidden fields
 */
function comment_form_hidden_fields()
{
    comment_id_fields();

    if (current_user_can('unfiltered_html')) {
        wp_nonce_field('unfiltered-html-comment_' . get_the_ID(), '_wp_unfiltered_html_comment', false);
    }
}

?>