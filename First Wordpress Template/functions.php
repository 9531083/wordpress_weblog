<?php
//
define("THEME_URI", get_template_directory_uri());
define("SITE_URL", get_site_url());

//thumbnail pictures
add_theme_support("post-thumbnails");

//add styles with wordpress built-in funcs
function dire_add_theme_scripts()
{
    //laod css
    wp_enqueue_style("main-style", THEME_URI . "/assets/styles/styles.css");
    wp_enqueue_style("bootstrap-style", THEME_URI . "/assets/styles/bootstrap.rtl.min.css");

    //load js
    wp_enqueue_script("header-js", THEME_URI . "/assets/scripts/all.min.js", array("jquery"), 1.0);
    wp_enqueue_script("header-js", THEME_URI . "/assets/scripts/bootstrap.bundle.min.js", array("jquery"), 1.0, true);
}

add_action("wp_enqueue_scripts", "dire_add_theme_scripts");


//add menus and nav
add_theme_support("menus");

function dire_register_nav_menus()
{
    register_nav_menu('main-menu', 'منوی هدر');
    // register_nav_menus(
    //     array('main-menu'=> 'منوی هدر',
    //     'footer-menu'=> 'منوی فوتر')
    // );
}

add_action('init', 'dire_register_nav_menus');

/// add custum class to menu items






///widgets and sidebars
function dire_register_sidebar()
{
    $setting = array(
        'id' => 'primary',
        'name' => 'first-sidebar'
    );
    register_sidebar($setting);
}
add_action('widgets_init', 'dire_register_sidebar');
