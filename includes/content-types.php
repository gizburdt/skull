<?php

if (! defined('ABSPATH')) {
    exit;
}

class PluginNameContentTypes
{
    /**
     * Construct.
     */
    public function __construct()
    {
        add_action('init', array(&$this, 'registerPostTypes'));
        add_action('init', array(&$this, 'registerTaxonomies'));
    }

    /**
     * Add post types.
     *
     * @return void
     */
    public function registerPostTypes()
    {
    }

    /**
     * Add taxonomies.
     *
     * @return [type] [description]
     */
    public function registerTaxonomies()
    {
    }
}
