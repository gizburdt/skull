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
        add_action('init', function () {
            $this->registerPostTypes();
            $this->registerTaxonomies();
        });
    }

    /**
     * Add post types.
     *
     * @return void
     */
    public function registerPostTypes()
    {
        //
    }

    /**
     * Add taxonomies.
     *
     * @return [type] [description]
     */
    public function registerTaxonomies()
    {
        //
    }
}
