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
        add_action('wp_enqueue_scripts', function () {
            $this->enqueue();
            $this->localize();
        }, 100);
    }

    /**
     * Enqueue.
     *
     * @return void
     */
    public function enqueue()
    {
        $version = PLUGIN_VERSION;

        wp_enqueue_style('plugin-name/public.css', PLUGIN_URL.'/public/css/public.css', false, $version, 'screen');
        wp_enqueue_script('plugin-name/public.js', PLUGIN_URL.'/public/js/public.js', false, $version, 'screen');
    }

    /**
     * Localize.
     *
     * @return void
     */
    public function localize()
    {
        wp_localize_script('plugin-name/public.js', 'Plugin', [
            'home_url'   => get_home_url(),
            'ajax_url'   => admin_url('admin-ajax.php'),
            'wp_version' => get_bloginfo('version'),
        ]);
    }
}
