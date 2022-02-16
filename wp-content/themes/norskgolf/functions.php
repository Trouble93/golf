<?php
function fields($key)
{
    $field = get_field($key);
    if (empty($field) && isset($field)) {
        return '';
    } else {
        return $field;
    }
}

if (function_exists('acf_add_options_page')) {

    acf_add_options_page([
        'page_title' => 'Theme General Settings',
        'menu_title' => 'Theme Settings',
        'menu_slug'  => 'theme-general-settings',
        'capability' => 'edit_posts',
        'redirect'   => false,
    ]);

    acf_add_options_sub_page([
        'page_title'  => 'Theme Footer Settings',
        'menu_title'  => 'Footer',
        'parent_slug' => 'theme-general-settings',
    ]);
}
function styles_theme_name_scripts()
{

    wp_enqueue_style('style-name', get_stylesheet_uri());
    wp_enqueue_script('script-name', get_template_directory_uri() . '/js/script.js', ['jquery'], time(), true);
    wp_enqueue_style('app-style', get_template_directory_uri() . '/dest/app.css');
    wp_enqueue_script('map-script', 'https://maps.googleapis.com/maps/api/js?key=' . constant('GOOGLE_MAP') . '&callback=initMap', [], time(), true);
}


add_action('wp_enqueue_scripts', 'styles_theme_name_scripts');
function fc_custom_register_acf_blocks()
{
    $acfBlocks = [
        'acf-block-three-columns' => 'Home first block',
        'acf-block-big-post'      => 'Big post block',
        'acf-block-row-posts'     => 'Row posts block',
        'acf-block-category'      =>  'Category block'

    ];

    foreach ($acfBlocks as $name => $title) {
        acf_register_block_type(
            [
                'name'            => $name,
                'title'           => __($title),
                'description'     => __(''),
                'render_callback' => 'theme_acf_blocks_render_callback',
                'category'        => 'common',
                'icon'            => 'slides',
                'keywords'        => ['image', 'title', 'text'],
                'mode'            => 'edit',
            ]
        );

    }
}

add_action('acf/init', 'fc_custom_register_acf_blocks');

/**
 * Enable ACF Blocks render function
 */
if (!function_exists('theme_acf_blocks_render_callback')) {

    function theme_acf_blocks_render_callback($block)
    {


        $slug = str_replace('acf/', '', $block['name']);
        $slug = str_replace('acf-block-', '', $slug);

        if (file_exists(get_theme_file_path("/templates/blocks/acf-block-{$slug}.php"))) {
            include(get_theme_file_path("/templates/blocks/acf-block-{$slug}.php"));
        }

    }
}
function init_menu()
{
    register_nav_menu('init_menu', __('Header Menu'));
    register_nav_menu('init_menu', __('Header Submenu'));
    register_nav_menu('init_menu', __('Footer Menu'));
    register_nav_menu('init_menu', __('Footer Submenu'));
    register_nav_menu('init_menu', __('Home menu'));
}

add_action('init', 'init_menu');


add_theme_support('custom-logo', [
    'height'               => 55,
    'width'                => 242,
    'flex-width'           => false,
    'flex-height'          => false,
    'header-text'          => '',
    'unlink-homepage-logo' => false,
]);
function upload_allow_types($mimes)
{
    $mimes['svg'] = 'image/svg+xml';
    $mimes['webp'] = 'image/webp';
    $mimes['json'] = 'application/application/json';

    return $mimes;
}

add_filter('upload_mimes', 'upload_allow_types');
add_filter('show_admin_bar', '__return_false');

add_theme_support('post-thumbnails');

if (function_exists('acf_add_options_page')) {

    acf_add_options_page([
        'page_title' => 'Theme General Settings',
        'menu_title' => 'Theme Settings',
        'menu_slug'  => 'theme-general-settings',
        'capability' => 'edit_posts',
        'redirect'   => false,
    ]);

    acf_add_options_sub_page([
        'page_title'  => 'Theme Header Settings',
        'menu_title'  => 'Header links',
        'parent_slug' => 'theme-general-settings',
    ]);
}







