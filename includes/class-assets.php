<?php

if (! defined('ABSPATH')) {
    exit;
}

class Plugin_Name_Assets
{
    /**
     * Construct.
     */
    public function __construct()
    {
        // Styles
        add_action('wp_enqueue_style', array(&$this, 'register_styles'));
        add_action('wp_enqueue_style', array(&$this, 'enqueue_styles'));

        // Scripts
        add_action('wp_enqueue_scripts', array(&$this, 'register_scripts'));
        add_action('wp_enqueue_scripts', array(&$this, 'enqueue_scripts'));
    }

    /**
     * Register public styles.
     *
     * @return void
     */
    public function register_styles()
    {
        wp_register_style('plugin-public', PLUGIN_URL.'/assets/public/css/public.css', false, PLUGIN_VERSION, 'screen');
    }

    /**
     * Enqueue public styles.
     *
     * @return void
     */
    public function enqueue_styles()
    {
        wp_enqueue_style('plugin-public');
    }

    /**
     * Register public scripts.
     *
     * @return void
     */
    public function register_scripts()
    {
        wp_register_script('plugin-public', PLUGIN_URL.'/assets/public/js/public.js', null, PLUGIN_VERSION);
    }

    /**
     * Enqueue public scripts.
     *
     * @return void
     */
    public function enqueue_scripts()
    {
        wp_enqueue_script('plugin-public');

        self::localize_public_scripts();
    }

    /**
     * Localize public scripts.
     *
     * @return void
     */
    public function localize_public_scripts()
    {
        wp_localize_script('plugin-public', 'Plugin', array(
            'home_url'   => get_home_url(),
            'ajax_url'   => admin_url('admin-ajax.php'),
            'wp_version' => get_bloginfo('version'),
        ));
    }
}
