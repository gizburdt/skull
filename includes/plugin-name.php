<?php

if (! defined('ABSPATH')) {
    exit;
}

class PluginName
{
    /**
     * Run the plugin.
     *
     * @return void
     */
    public function run()
    {
        $this->setupConstants();
        $this->includes();
        $this->loadTextdomain();
        $this->execute();
    }

    /**
     * Setup constants.
     *
     * @return void
     */
    public function setupConstants()
    {
        if (! defined('PLUGIN_VERSION')) {
            define('PLUGIN_VERSION', '0.1');
        }

        if (! defined('PLUGIN_DIR')) {
            define('PLUGIN_DIR', dirname(plugin_dir_path(__FILE__)));
        }

        if (! defined('PLUGIN_URL')) {
            define('PLUGIN_URL', dirname(plugin_dir_url(__FILE__)));
        }
    }

    /**
     * Includes all files.
     *
     * @return void
     */
    public function includes()
    {
        // Public
        include PLUGIN_DIR.'/includes/assets.php';
        include PLUGIN_DIR.'/includes/content-types.php';
        include PLUGIN_DIR.'/includes/shortcodes.php';

        // Admin
        include PLUGIN_DIR.'/includes/admin/admin.php';
    }

    /**
     * Load plugin textdomain.
     *
     * @return void
     */
    public function loadTextdomain()
    {
        load_plugin_textdomain(
            'plugin-name', false, dirname(dirname(plugin_basename(__FILE__))).'/languages/'
        );
    }

    /**
     * Execute all classes.
     *
     * @return void
     */
    public function execute()
    {
        // Assets
        new PluginNameAssets();

        // Content types
        new PluginNameContentTypes();

        // Shortcodes
        new PluginNameShortcodes();

        // Admin
        new PluginNameAdmin();
    }

    /**
     * Include view file.
     *
     * @param string $view
     * @param array  $variables
     * @since 3.0
     */
    public static function view($view, $variables = [])
    {
        extract($variables);

        ob_start();

        include PLUGIN_DIR.'/resources/views/'.$view.'.php';

        return ob_get_clean();
    }
}
