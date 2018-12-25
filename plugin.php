<?php

/**
 * Plugin Name:    {{Plugin Name}}
 * Plugin URI:     {{Plugin Uri}}
 * Description:    {{Plugin Description}}
 * Version:        {{Plugin Version}}
 * Author:         {{Plugin Author}}
 * Author URI:     {{Plugin Author Uri}}
 * License:        MIT
 */
if (! defined('ABSPATH')) {
    exit;
}

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/plugin-name-activator.php.
 */
register_activation_hook(__FILE__, function () {
    require_once plugin_dir_path(__FILE__).'includes/activator.php';

    PluginNameActivator::activate();
});

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/plugin-name-deactivator.php.
 */
register_deactivation_hook(__FILE__, function () {
    require_once plugin_dir_path(__FILE__).'includes/deactivator.php';

    PluginNameDeactivator::deactivate();
});

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path(__FILE__).'includes/plugin-name.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 */
add_action('plugins_loaded', function () {
    (new PluginName())->run();
});
