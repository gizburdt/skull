<?php

/*
Plugin Name:    {TODO:NAME}
Plugin URI:     {TODO:URI}
Description:    {TODO:DESCRIPTION}
Version:        {TODO:VERSION}
Author:         {TODO:AUTHOR}
Author URI:     {TODO:AUTHOR_URI}
License:        GPLv2
*/

if (!defined('ABSPATH')) {
    exit;
}

if (!class_exists('Plugin')) :

class Plugin
{
    private static $instance;

    public static function instance()
    {
        if (!isset(self::$instance)) {
            self::$instance = new self();
            self::$instance->setup_constants();
            self::$instance->includes();
            self::$instance->add_hooks();
            self::$instance->execute();
        }

        return self::$instance;
    }

    public function setup_constants()
    {
        if (!defined('PLUGIN_VERSION')) {
            define('PLUGIN_VERSION', '0.1');
        }

        if (!defined('PLUGIN_DIR')) {
            define('PLUGIN_DIR', plugin_dir_path(__FILE__));
        }

        if (!defined('PLUGIN_URL')) {
            define('PLUGIN_URL', plugin_dir_url(__FILE__));
        }
    }

    public function includes()
    {
        include PLUGIN_DIR.'classes/class-content-types.php';
        include PLUGIN_DIR.'classes/class-shortcodes.php';
    }

    public function add_hooks()
    {
        // Styles
        add_action('wp_enqueue_scripts', array(&$this, 'register_styles'));
        add_action('wp_enqueue_scripts', array(&$this, 'enqueue_styles'));

        // Scripts
        add_action('wp_enqueue_scripts', array(&$this, 'register_scripts'));
        add_action('wp_enqueue_scripts', array(&$this, 'enqueue_scripts'));
    }

    public function execute()
    {
        self::$instance->content_types = new Plugin_Content_Types();
        self::$instance->shortcodes = new Plugin_Shortcodes();
    }

    public function register_styles()
    {
        wp_register_style('plugin', PLUGIN_URL.'assets/css/plugin.css', false, PLUGIN_VERSION, 'screen');
    }

    public function enqueue_styles()
    {
        wp_enqueue_style('plugin');
    }

    public function register_scripts()
    {
        wp_register_script('plugin', PLUGIN_URL.'assets/js/plugin.js', null, PLUGIN_VERSION);
    }

    public function enqueue_scripts()
    {
        wp_enqueue_script('plugin');

        self::localize_scripts();
    }

    public function localize_scripts()
    {
        wp_localize_script('plugin', 'Plugin', array(
            'home_url'   => get_home_url(),
            'ajax_url'   => admin_url('admin-ajax.php'),
            'wp_version' => get_bloginfo('version'),
        ));
    }
}

endif; // End class_exists check

Plugin::instance();
