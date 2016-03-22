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
        if (!defined('{PLUGIN:UPPER}_VERSION')) {
            define('{PLUGIN:UPPER}_VERSION', '0.1');
        }

        if (!defined('{PLUGIN:UPPER}_DIR')) {
            define('{PLUGIN:UPPER}_DIR', plugin_dir_path(__FILE__));
        }

        if (!defined('{PLUGIN:UPPER}_URL')) {
            define('{PLUGIN:UPPER}_URL', plugin_dir_url(__FILE__));
        }
    }

    public function includes()
    {
        include {PLUGIN:UPPER}_DIR.'classes/class-content-types.php';
        include {PLUGIN:UPPER}_DIR.'classes/class-shortcodes.php';
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
        wp_register_style('{PLUGIN:LOWER}', {PLUGIN:UPPER}_URL.'assets/css/{PLUGIN:LOWER}.css', false, {PLUGIN:UPPER}_VERSION, 'screen');
    }

    public function enqueue_styles()
    {
        wp_enqueue_style('{PLUGIN:LOWER}');
    }

    public function register_scripts()
    {
        wp_register_script('{PLUGIN:LOWER}', {PLUGIN:UPPER}_URL.'assets/js/{PLUGIN:LOWER}.js', null, {PLUGIN:UPPER}_VERSION);
    }

    public function enqueue_scripts()
    {
        wp_enqueue_script('{PLUGIN:LOWER}');

        self::localize_scripts();
    }

    public function localize_scripts()
    {
        wp_localize_script('{PLUGIN:LOWER}', 'Plugin', array(
            'home_url'   => get_home_url(),
            'ajax_url'   => admin_url('admin-ajax.php'),
            'wp_version' => get_bloginfo('version'),
        ));
    }
}

endif; // End class_exists check

Plugin::instance();
