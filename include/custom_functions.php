<?php
/*
 * Custom Function File
 *
 * Place your custom function, filter and hooks here. 
 *
 */

function custom_admin_js() {
    $url = get_bloginfo('stylesheet_directory') . '/js/admin-custom.js';
    echo '"<script type="text/javascript" src="'. $url . '"></script>"';
}
add_action('admin_footer', 'custom_admin_js');

