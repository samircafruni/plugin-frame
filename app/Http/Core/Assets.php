<?php
/**
 * Studio Visual - Totvs Setup Plugin
 *
 * @package totvs-setup-plugin/Classes
 * @since   1.0.0
 * @version 1.0.0
*/

namespace App\Classes\Core;

use borderplateuse;

/**
 *
 * Previne que o arquivo não seja acessado diretamente por uma URL
*/
if (!defined('ABSPATH')) exit;

class Assets
{
    public function __construct()
    {
        add_action('wp_enqueue_scripts', [$this, 'registerAssets'], 99);

        $helpers = new Helpers();

        if($helpers->is_edit_page()) {
            add_action('admin_enqueue_scripts', [$this, 'registerAdminAssets'], 99);
        }
    }

    public function registerAssets(): void
    {
        wp_enqueue_style('totvs-setup-plugin-css', TOTVS_SETUP_PLUGIN_DIST_STYLES. 'index.css', false, true);
        wp_enqueue_script('totvs-setup-plugin-js', TOTVS_SETUP_PLUGIN_DIST_SCRIPTS . 'index.js', ['jquery'], null, true);
    }

    public function registerAdminAssets(): void
    {
        wp_enqueue_style('totvs-setup-plugin-admin-css', TOTVS_SETUP_PLUGIN_DIST_STYLES. 'admin.css', false, true);
        wp_enqueue_script('totvs-setup-plugin-admin-js', TOTVS_SETUP_PLUGIN_DIST_SCRIPTS . 'admin.js', ['jquery'], null, true);
    }
}
