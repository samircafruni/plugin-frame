<?php
/**
 * Author - Plugin Name
 *
 * @package plugin-name/Classes/Abstracts
 * @since   1.0.0
 * @version 1.0.0
 */

namespace App\Controllers\Web\Admin;

/**
 * Previne que o arquivo não seja acessado diretamente por uma URL
 */
if (!defined('ABSPATH')) {
    exit;
}

use App\Classes\Core\Helpers;

/**
 * Gerencia a página de manipulação do plugin no WP Admin
 */
class Page
{

    public $url;

    public function __construct()
    {
        $this->url = 'admin.php?page=plugin-name';
        add_action('admin_menu', [$this, 'setMenuItem'], 11);
    }

    /**
     * Cria o menu da página
     *
     * @return void
     */
    public function setMenuItem(): void
    {
        add_menu_page(
            'Author - Plugin Name',
            'Author - Plugin Name',
            'edit_posts',
            'plugin_name_main_page',
            [$this, 'page'],
            'dashicons-update',
        );
    }


    public function page(): void
    {
        // Chama a views da página
        require_once(PLUGIN_NAME_PLUGIN_VIEWS . 'web/plugin-view.php');
    }

}