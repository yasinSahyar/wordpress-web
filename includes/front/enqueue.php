<?php

function techco_enqueue() {
    wp_register_style('techco_bootstrap', get_template_directory_uri() . '/assets/css/bootstrap.min.css');
    wp_register_style('techco_style', get_template_directory_uri() . '/assets/css/techco.css');
    wp_register_style('techco_fontawesome', 'https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css');

    wp_enqueue_style('techco_bootstrap');
    wp_enqueue_style('techco_style');
    wp_enqueue_style('techco_fontawesome');

    wp_register_script('techco_bootstrap', 'http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js', array(), false, true);
    wp_register_script('techco_smoothscroll', get_template_directory_uri() . '/assets/js/smoothscroll.js', array(), false, true);

    wp_enqueue_script('jquery');
    wp_enqueue_script('techco_bootstrap');
    wp_enqueue_script('techco_smoothscroll');

}
