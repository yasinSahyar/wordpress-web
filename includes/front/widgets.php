<?php

function techco_widgets () {
    register_sidebar(array(
        'name'      => __('TechCo-Sidebar', 'techco'),
        'id' => 'techco_sidebar_id',
        'description' => __('A Sidebar for the TechCo theme', 'techco'),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget' => "</div>",
        'before_title' => '<h4 class="widgettitle">',
        'after_title' => "</h4>"
    ));
}
