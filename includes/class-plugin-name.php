<?php

if (! defined('ABSPATH')) {
    exit;
}

class Plugin
{
    /**
     * Run the plugin.
     *
     * @return void
     */
    public function run()
    {
        $this->setup_constants();
        $this->includes();
        $this->load_textdomain();
        $this->execute();
    }

    /**
     * Setup constants.
     *
     * @return void
     */
    public function setup_constants()
    {
        if (! defined('PLUGIN_VERSION')) {
            define('PLUGIN_VERSION', '0.1');
        }

        if (! defined('PLUGIN_DIR')) {
            define('PLUGIN_DIR', plugin_dir_path(__FILE__));
        }

        if (! defined('PLUGIN_URL')) {
            define('PLUGIN_URL', plugin_dir_url(__FILE__));
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
        include PLUGIN_DIR.'includes/class-assets.php';
        include PLUGIN_DIR.'includes/class-content-types.php';
        include PLUGIN_DIR.'includes/class-shortcodes.php';

        // Admin
        include PLUGIN_DIR.'includes/admin/class-admin.php';
    }

    /**
     * Load plugin textdomain.
     *
     * @return void
     */
    public function load_textdomain()
    {
        load_plugin_textdomain(
			'plugin-name',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
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
        new Plugin_Name_Assets();

        // Content types
        new Plugin_Name_Types();

        // Shortcodes
        new Plugin_Name_Shortcodes();

        // Admin
        new Plugin_Name_Admin();
    }
}
