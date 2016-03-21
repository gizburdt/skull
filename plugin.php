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

if (!class_exists('Skull')) :

class Skull
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
        if (!defined('SKULL_VERSION')) {
            define('SKULL_VERSION', '0.1');
        }

        if (!defined('SKULL_DIR')) {
            define('SKULL_DIR', plugin_dir_path(__FILE__));
        }

        if (!defined('SKULL_URL')) {
            define('SKULL_URL', plugin_dir_url(__FILE__));
        }
    }

    public function includes()
    {
        include SKULL_DIR.'classes/class-content-types.php';
        include SKULL_DIR.'classes/class-shortcodes.php';
    }

    public function add_hooks()
    {
        // Styles
        add_action('wp_enqueue_scripts', [&$this, 'register_styles']);
        add_action('wp_enqueue_scripts', [&$this, 'enqueue_styles']);

        // Scripts
        add_action('wp_enqueue_scripts', [&$this, 'register_scripts']);
        add_action('wp_enqueue_scripts', [&$this, 'enqueue_scripts']);
    }

    public function execute()
    {
        self::$instance->content_types = new Skull_Content_Types();
        self::$instance->shortcodes = new Skull_Shortcodes();
    }

    public function register_styles()
    {
        wp_register_style('skull', SKULL_URL.'assets/css/skull.css', false, SKULL_VERSION, 'screen');
    }

    public function enqueue_styles()
    {
        wp_enqueue_style('skull');
    }

    public function register_scripts()
    {
        wp_register_script('skull', SKULL_URL.'assets/js/skull.js', null, SKULL_VERSION);
    }

    public function enqueue_scripts()
    {
        wp_enqueue_script('skull');

        self::localize_scripts();
    }

    public function localize_scripts()
    {
        wp_localize_script('skull', 'Skull', [
            'home_url'   => get_home_url(),
            'ajax_url'   => admin_url('admin-ajax.php'),
            'wp_version' => get_bloginfo('version'),
        ]);
    }
}

endif; // End class_exists check

Skull::instance();
