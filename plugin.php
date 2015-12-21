<?php

/*
Plugin Name:    {TODO:PLUGIN}
Plugin URI:     {TODO:URI}
Description:    {TODO:DESCRIPTION}
Version:        {TODO:VERSION}
Author:         {TODO:AUTHOR}
Author URI:     {TODO:AUTHOR_URI}
License:        GPL2
*/

if( ! defined( 'ABSPATH' ) ) exit;

if( ! class_exists( '{TODO:PLUGIN}' ) ) :

/**
 * {TODO:PLUGIN}
 */
class {TODO:PLUGIN}
{
    private static $instance;

    public static function instance()
    {
        if ( ! isset( self::$instance ) )
        {
            self::$instance = new {TODO:PLUGIN};
            self::$instance->setup_constants();
            self::$instance->includes();
            self::$instance->add_hooks();
            self::$instance->execute();
        }

        return self::$instance;
    }

    function setup_constants()
    {
        if( ! defined( '{TODO:UPPER}_VERSION' ) )
            define( '{TODO:UPPER}_VERSION', '0.1' );

        if( ! defined( '{TODO:UPPER}_DIR' ) )
            define( '{TODO:UPPER}_DIR', plugin_dir_path( __FILE__ ) );

        if( ! defined( '{TODO:UPPER}_URL' ) )
            define( '{TODO:UPPER}_URL', plugin_dir_url( __FILE__ ) );
    }

    function includes()
    {
        include( {TODO:UPPER}_DIR . 'classes/class-content-types.php' );
        include( {TODO:UPPER}_DIR . 'classes/class-shortcodes.php' );
    }

    function add_hooks()
    {
        // Styles
        add_action( 'wp_enqueue_scripts', array( &$this, 'register_styles' ) );
        add_action( 'wp_enqueue_scripts', array( &$this, 'enqueue_styles' ) );

        // Scripts
        add_action( 'wp_enqueue_scripts', array( &$this, 'register_scripts' ) );
        add_action( 'wp_enqueue_scripts', array( &$this, 'enqueue_scripts' ) );
    }

    function execute()
    {
        self::$instance->content_types = new {TODO:PLUGIN}_Content_Types;
        self::$instance->shortcodes    = new {TODO:PLUGIN}_Shortcodes;
    }

    function register_styles()
    {
        wp_register_style( '{TODO:LOWER}', {TODO:UPPER}_URL . 'assets/css/{TODO:LOWER}.css', false, {TODO:UPPER}_VERSION, 'screen' );
    }

    function enqueue_styles()
    {
        wp_enqueue_style( '{TODO:LOWER}' );
    }

    function register_scripts()
    {
        wp_register_script( '{TODO:LOWER}', {TODO:UPPER}_URL . 'assets/js/{TODO:LOWER}.js', null, {TODO:UPPER}_VERSION );
    }

    function enqueue_scripts()
    {
        wp_enqueue_script( '{TODO:LOWER}' );

        self::localize_scripts();
    }

    function localize_scripts()
    {
        wp_localize_script( '{TODO:LOWER}', '{TODO:PLUGIN}', array(
            'home_url'   => get_home_url(),
            'ajax_url'   => admin_url( 'admin-ajax.php' ),
            'wp_version' => get_bloginfo( 'version' )
        ) );
    }
}

endif; // End class_exists check

{TODO:PLUGIN}::instance();