<?php

if (! defined('ABSPATH')) {
    exit;
}

class Plugin_Name_Shortcodes
{
    /**
     * Construct.
     */
    public function __construct()
    {
        // add_shortcode('shortcode', array(&$this, 'shortcode'));
    }

    /**
     * Shortcode.
     *
     * @param  array  $atts
     * @param  string $content
     * @return string
     */
    public function shortcode($atts, $content = null)
    {
    }
}
