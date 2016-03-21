<?php

if (!defined('ABSPATH')) {
    exit;
}

class Skull_Content_Types
{
    public function __construct()
    {
        // Init
        add_action('init', [&$this, 'register_post_types']);
        add_action('init', [&$this, 'register_taxonomies']);
    }

    /**
     * Add post types.
     *
     * @author  {TODO:AUTHOR}
     *
     * @since   0.1
     */
    public function register_post_types()
    {
    }

    /**
     * Add taxonomies.
     *
     * @author  {TODO:AUTHOR}
     *
     * @since   0.1
     */
    public function register_taxonomies()
    {
    }
}
