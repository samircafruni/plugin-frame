<?php
/**
 * Author - Plugin Name
 *
 * @package plugin-name/Classes/Core
 * @since   1.0.0
 * @version 1.0.0
 */

namespace App\Classes\Core;

/*
 * Previne que o arquivo não seja acessado diretamente por uma URL
 */
defined('ABSPATH') || exit;

/*
 * Classe gerencia os assets do plugin
 */
class Assets
{
    public function __construct(bool $registerAssets = true, bool $registerAdminAssets = true)
    {
        if ($registerAssets) {
            add_action('wp_enqueue_scripts', [$this, 'registerAssets'], 99);
        }

        if ($registerAdminAssets) {
            add_action('admin_enqueue_scripts', [$this, 'registerAdminAssets'], 99);
        }
    }

    /**
     * Registra os assets
     *
     * @return void
     */
    public function registerAssets(): void
    {
        wp_enqueue_style('plugin-name', PLUGIN_NAME_PLUGIN_STYLES. 'main.css', false, true);

        wp_enqueue_script('plugin-name', PLUGIN_NAME_PLUGIN_SCRIPTS . 'main.js', ['jquery'], null, true);
    }

    /**
     * Registra os assets no admin
     *
     * @return void
     */
    public function registerAdminAssets(): void
    {
        if (get_current_screen()->id === 'toplevel_page_plugin_name_main_page') {

            wp_enqueue_style('plugin-name-admin', PLUGIN_NAME_PLUGIN_STYLES. 'admin.css', false, true);

            wp_enqueue_script('plugin-name-admin', PLUGIN_NAME_PLUGIN_SCRIPTS . 'admin.js', ['jquery'], null, true);

            // Inicializa a rota das requisições Ajax
            wp_localize_script('plugin-name-admin', 'api', ['ajax_url' => admin_url('admin-ajax.php')]);
        }
    }
}
