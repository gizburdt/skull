<?php

if (! defined('ABSPATH')) {
    exit;
}

class PluginNameAdmin
{
    /**
     * Construct.
     *
     * @return void
     */
    public function __construct()
    {
        $this->includes();

        $this->execute();
    }

    /**
     * Include files.
     *
     * @return void
     */
    public function includes()
    {
        include PLUGIN_DIR.'/includes/admin/assets.php';
    }

    /**
     * Execute all classes.
     *
     * @return void
     */
    public function execute()
    {
        // Assets
        new PluginNameAdminAssets();
    }
}
