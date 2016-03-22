<?php

if (! defined('ABSPATH')) {
    exit;
}

class Plugin_Name_Content_Types
{
    /**
     * Construct.
     */
    public function __construct()
    {
        add_action('init', array(&$this, 'register_post_types'));
        add_action('init', array(&$this, 'register_taxonomies'));
    }


    /**
     * Add post types.
     *
     * @return void
     */
    public function register_post_types()
    {
    }

    /**
     * Add taxonomies.
     *
     * @return [type] [description]
     */
    public function register_taxonomies()
    {
    }
}
