<?php

if (! defined('ABSPATH')) {
    exit;
}

class Plugin_Content_Types
{
    public function __construct()
    {
        // Init
        add_action('init', array(&$this, 'register_post_types'));
        add_action('init', array(&$this, 'register_taxonomies'));
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
