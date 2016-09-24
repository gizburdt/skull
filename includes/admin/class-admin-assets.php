<?php

if (! defined('ABSPATH')) {
    exit;
}

class Plugin_Name_Admin_Assets
{
    /**
     * Construct.
     */
    public function __construct()
    {
        // Styles
        add_action('admin_enqueue_scripts', array(&$this, 'register_styles'));
        add_action('admin_enqueue_scripts', array(&$this, 'enqueue_styles'));

        // Scripts
        add_action('admin_enqueue_scripts', array(&$this, 'register_scripts'));
        add_action('admin_enqueue_scripts', array(&$this, 'enqueue_scripts'));
    }

    /**
     * Register admin styles.
     *
     * @return void
     */
    public function register_styles()
    {
        wp_register_style('plugin', PLUGIN_URL.'/assets/build/css/admin.css', false, PLUGIN_VERSION, 'screen');
    }

    /**
     * Enqueue admin styles.
     *
     * @return void
     */
    public function enqueue_styles()
    {
        wp_enqueue_style('plugin');
    }

    /**
     * Register admin scripts.
     *
     * @return void
     */
    public function register_scripts()
    {
        wp_register_script('plugin', PLUGIN_URL.'/assets/build/js/admin.js', null, PLUGIN_VERSION);
    }

    /**
     * Enqueue admin scripts.
     *
     * @return void
     */
    public function enqueue_scripts()
    {
        wp_enqueue_script('plugin');

        self::localize_admin_scripts();
    }

    /**
     * Localize admin scripts.
     *
     * @return void
     */
    public function localize_admin_scripts()
    {
        wp_localize_script('plugin', 'Plugin', array(
            'home_url'   => get_home_url(),
            'ajax_url'   => admin_url('admin-ajax.php'),
            'wp_version' => get_bloginfo('version'),
        ));
    }
}
