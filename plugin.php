<?php

/**
 * Plugin Name:    {TODO:NAME}
 * Plugin URI:     {TODO:URI}
 * Description:    {TODO:DESCRIPTION}
 * Version:        {TODO:VERSION}
 * Author:         {TODO:AUTHOR}
 * Author URI:     {TODO:AUTHOR_URI}
 * License:        GPLv2.
 */

if (! defined('ABSPATH')) {
    exit;
}

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-plugin-name-activator.php.
 */
function activate_plugin_name()
{
    require_once plugin_dir_path(__FILE__).'includes/class-activator.php';

    Plugin_Name_Activator::activate();
}
register_activation_hook(__FILE__, 'activate_plugin_name');

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-plugin-name-deactivator.php.
 */
function deactivate_plugin_name()
{
    require_once plugin_dir_path(__FILE__).'includes/class-deactivator.php';

    Plugin_Name_Deactivator::deactivate();
}
register_deactivation_hook(__FILE__, 'deactivate_plugin_name');

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path(__FILE__).'includes/class-plugin-name.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 */
function run_plugin_name()
{
    $plugin = new Plugin_Name();

    $plugin->run();
}
add_action('plugins_loaded', 'run_plugin_name');
