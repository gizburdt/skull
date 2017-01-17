<?php

if (! defined('ABSPATH')) {
    exit;
}

class PluginNameAssets
{
    /**
     * Construct.
     */
    public function __construct()
    {
        // Styles
        add_action('wp_enqueue_style', array(&$this, 'registerStyles'));
        add_action('wp_enqueue_style', array(&$this, 'enqueueStyles'));

        // Scripts
        add_action('wp_enqueue_scripts', array(&$this, 'registerScripts'));
        add_action('wp_enqueue_scripts', array(&$this, 'enqueueScripts'));
    }

    /**
     * Register public styles.
     *
     * @return void
     */
    public function registerStyles()
    {
        wp_register_style('plugin-public', PLUGIN_URL.'/assets/public/css/public.css', false, PLUGIN_VERSION, 'screen');
    }

    /**
     * Enqueue public styles.
     *
     * @return void
     */
    public function enqueueStyles()
    {
        wp_enqueue_style('plugin-public');
    }

    /**
     * Register public scripts.
     *
     * @return void
     */
    public function registerScripts()
    {
        wp_register_script('plugin-public', PLUGIN_URL.'/assets/public/js/public.js', null, PLUGIN_VERSION);
    }

    /**
     * Enqueue public scripts.
     *
     * @return void
     */
    public function enqueueScripts()
    {
        wp_enqueue_script('plugin-public');

        self::localizePublicScripts();
    }

    /**
     * Localize public scripts.
     *
     * @return void
     */
    public function localizePublicScripts()
    {
        wp_localize_script('plugin-public', 'Plugin', array(
            'home_url'   => get_home_url(),
            'ajax_url'   => admin_url('admin-ajax.php'),
            'wp_version' => get_bloginfo('version'),
        ));
    }
}
