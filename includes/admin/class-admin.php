<?php

if (! defined('ABSPATH')) {
    exit;
}

class Plugin_Name_Admin
{
    /**
     * Construct.
     *
     * @return void
     */
    public function __construct()
    {
        $this->execute();
    }

    /**
     * Execute all classes.
     *
     * @return void
     */
    public function execute()
    {
        // Assets
        new Plugin_Name_Admin_Assets();
    }
}
