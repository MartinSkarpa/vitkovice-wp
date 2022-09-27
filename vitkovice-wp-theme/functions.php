<?php
    define("_ROOT_DIR", "/vitkovice-wp-theme");
    define("_ROOT_URL", "/vitkovice");

    function vitkovice_resources() {
        wp_enqueue_style("bootstrap.min", get_stylesheet_directory_uri()."/css/bootstrap/bootstrap.min.css");
        wp_enqueue_style("bootstrap-icons", get_stylesheet_directory_uri()."/font/bootstrap-icons.css");
        wp_enqueue_style("style", get_stylesheet_uri());
    }

    function remove_parent_styles() {
        wp_dequeue_style("twenty-twenty-one-style");
        wp_deregister_style("twenty-twenty-one-style");
    }

    function vitkivice_post_excerpt_length($length) {
        return $length + 20;
    }

    function get_id_by_slug($page_slug) {
        $page = get_page_by_path($page_slug);
        return $page ? $page->ID : null;
    }

    add_filter("excerpt_length", "vitkivice_post_excerpt_length", 999);
    add_action("wp_enqueue_scripts", "remove_parent_styles", 20);
    add_action("wp_enqueue_scripts", "vitkovice_resources");
    add_theme_support("post-thumbnails");
?>