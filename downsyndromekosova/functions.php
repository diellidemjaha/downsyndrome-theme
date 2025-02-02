<?php
require_once get_stylesheet_directory() . '/custom-walker.php';
function my_custom_theme_enqueue_styles() {

    wp_enqueue_style('style', get_stylesheet_uri());


}
add_action('wp_enqueue_scripts', 'my_custom_theme_enqueue_styles');

function my_custom_theme_register_menus() {
    register_nav_menu('primary', __('Primary Menu', 'my-custom-theme'));
}
add_action('after_setup_theme', 'my_custom_theme_register_menus');

function my_custom_theme_setup() {
}
add_action('after_setup_theme', 'my_custom_theme_setup');

function my_custom_theme_add_featured_image_support() {
    add_theme_support('post-thumbnails');
}
add_action('after_setup_theme', 'my_custom_theme_add_featured_image_support');

function enqueue_bootstrap() {
    wp_enqueue_style('bootstrap-css', 'https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css');
    wp_enqueue_script('bootstrap-js', 'https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js', array('jquery'), '', true);
}
add_action('wp_enqueue_scripts', 'enqueue_bootstrap');

function custom_excerpt_length($length) {
    return 12; 
}
add_filter('excerpt_length', 'custom_excerpt_length');


function custom_image_gallery_post_type() {
    $labels = array(
        'name'               => 'Slider Gallery',
        'singular_name'      => 'Image',
        'menu_name'          => 'Slider Gallery',
        'add_new'            => 'Add New',
        'add_new_item'       => 'Add New Slide',
        'edit_item'          => 'Edit Image',
        'new_item'           => 'New Image',
        'view_item'          => 'View Image',
        'search_items'       => 'Search Images',
        'not_found'          => 'No images found',
        'not_found_in_trash' => 'No images found in Trash',
    );
    
    $args = array(
        'labels'              => $labels,
        'public'              => true,
        'menu_position'       => 5,
        'menu_icon'           => 'dashicons-format-image',
        'supports'            => array('title', 'thumbnail' , 'editor'),
        'rewrite'             => array('slug' => 'slider_gallery'),
    );
    
    register_post_type('slider_gallery', $args);
}
add_action('init', 'custom_image_gallery_post_type');

add_theme_support('post-thumbnails');

function modify_homepage_query($query) {
    if ($query->is_home() && $query->is_main_query()) {
        $query->set('post_type', array('post', 'slider_gallery'));
    }
}
add_action('pre_get_posts', 'modify_homepage_query');

function custom_text_content_post_type() {
    
    $labels = array(
        'name'               => 'Quote Content',
        'singular_name'      => 'Quote Content',
        'menu_name'          => 'Quote Content',
        'add_new'            => 'Add New',
        'add_new_item'       => 'Add New Text Content',
        'edit_item'          => 'Edit Text Content',
        'new_item'           => 'New Text Content',
        'view_item'          => 'View Text Content',
        'search_items'       => 'Search Text Content',
        'not_found'          => 'No text content found',
        'not_found_in_trash' => 'No text content found in Trash',
    );

    $args = array(
        'labels'              => $labels,
        'public'              => true,
        'menu_position'       => 6,
        'menu_icon'           => 'dashicons-text',
        'supports'            => array('title', 'editor'), 
        'rewrite'             => array('slug' => 'text-content'),
    );

    register_post_type('text_content', $args);
}
add_action('init', 'custom_text_content_post_type');

function add_custom_thumbnail_field_support() {
    add_post_type_support('page', 'custom-fields');
}
add_action('init', 'add_custom_thumbnail_field_support');

function create_staff_post_type() {
    register_post_type('staff_member', array(
        'labels' => array(
            'name' => 'Staff Members',
            'singular_name' => 'Staff Member',
        ),
        'public' => true,
        'supports' => array('thumbnail', 'editor'), 
        'show_in_menu' => true, 
        'menu_position' => 5, 
    ));
}
add_action('init', 'create_staff_post_type');

function create_hulumtimet_post_type() {
    register_post_type('pdf_document', array(
        'labels' => array(
            'name' => 'Hulumtimet',
            'singular_name' => 'Hulumtimi',
        ),
        'public' => true,
        'menu_icon' => 'dashicons-media-default',
        'supports' => array('title', 'editor', 'thumbnail'),
        'rewrite' => array('slug' => 'hulumtimet-document'),
    ));
}
add_action('init', 'create_hulumtimet_post_type');

function create_raportet_post_type() {
    register_post_type('pdf_document2', array(
        'labels' => array(
            'name' => 'Raportet',
            'singular_name' => 'Raporti',
        ),
        'public' => true,
        'menu_icon' => 'dashicons-media-default',
        'supports' => array('title', 'editor', 'thumbnail'),
        'rewrite' => array('slug' => 'raportet-document'),
    ));
}
add_action('init', 'create_raportet_post_type');

function create_materialet_post_type() {
    register_post_type('pdf_document3', array(
        'labels' => array(
            'name' => 'Materialet',
            'singular_name' => 'Materiali',
        ),
        'public' => true,
        'menu_icon' => 'dashicons-media-default',
        'supports' => array('title', 'editor', 'thumbnail'),
        'rewrite' => array('slug' => 'materialet-document'),
    ));
}
add_action('init', 'create_materialet_post_type');

function create_ligjet_post_type() {
    register_post_type('pdf_document4', array(
        'labels' => array(
            'name' => 'Ligjet',
            'singular_name' => 'Ligji',
        ),
        'public' => true,
        'menu_icon' => 'dashicons-media-default',
        'supports' => array('title', 'editor', 'thumbnail'),
        'rewrite' => array('slug' => 'materialet-document'),
    ));
}
add_action('init', 'create_ligjet_post_type');
