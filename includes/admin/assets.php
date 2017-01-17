<?php

if (! defined('ABSPATH')) {
    exit;
}

class PluginNameAdminAssets
{
    /**
     * Construct.
     */
    public function __construct()
    {
        // Styles
        add_action('admin_enqueue_scripts', array(&$this, 'registerStyles'));
        add_action('admin_enqueue_scripts', array(&$this, 'enqueueStyles'));

        // Scripts
        add_action('admin_enqueue_scripts', array(&$this, 'registerScripts'));
        add_action('admin_enqueue_scripts', array(&$this, 'enqueueScripts'));
    }

    /**
     * Register admin styles.
     *
     * @return void
     */
    public function registerStyles()
    {
        wp_register_style('plugin-admin', PLUGIN_URL.'/assets/admin/css/admin.css', false, PLUGIN_VERSION, 'screen');
    }

    /**
     * Enqueue admin styles.
     *
     * @return void
     */
    public function enqueueStyles()
    {
        wp_enqueue_style('plugin-admin');
    }

    /**
     * Register admin scripts.
     *
     * @return void
     */
    public function registerScripts()
    {
        wp_register_script('plugin-admin', PLUGIN_URL.'/assets/admin/js/admin.js', null, PLUGIN_VERSION);
    }

    /**
     * Enqueue admin scripts.
     *
     * @return void
     */
    public function enqueueScripts()
    {
        wp_enqueue_script('plugin-admin');

        // Localize
        self::localizeAdminScripts();
    }

    /**
     * Localize admin scripts.
     *
     * @return void
     */
    public function localizeAdminScripts()
    {
        wp_localize_script('plugin-admin', 'Plugin', array(
            'home_url'   => get_home_url(),
            'ajax_url'   => admin_url('admin-ajax.php'),
            'wp_version' => get_bloginfo('version'),
        ));
    }
}
