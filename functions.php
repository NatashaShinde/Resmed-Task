<?php
add_action('wp_enqueue_scripts', 'slider_demo_assets');
function slider_demo_assets() {
    wp_enqueue_style('slider-demo-style', get_stylesheet_uri());
    wp_enqueue_style('slider-component-css', get_template_directory_uri() . '/assets/css/slider.css');
    wp_enqueue_script('slider-component-js', get_template_directory_uri() . '/assets/js/slider.js', array('jquery'), null, true);
}
