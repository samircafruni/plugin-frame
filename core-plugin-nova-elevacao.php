<?php

/***************************************************************************
 * Plugin Name:  Totvs Setup Plugin
 * Plugin URI:
 * Description: Plugin de setup para sites do sistema Totvs
 * Version:      1.0.0
 * License:      GPLv2
 * Author:       Studio Visual
 * Author URI:   https://studiovisual.com.br
 * Text Domain:  totvs-setup-plugin
 * Requires PHP: 8.1
 *
 * @package totvs-setup-plugin
 **************************************************************************/

/**
 * Previne que o arquivo não seja acessado diretamente por uma URL
*/
defined('ABSPATH') || exit;


/**
 * Inicializa o Composer
*/
if ( ! file_exists(__DIR__ . '/vendor/autoload.php' )) {
    die('Pasta vendor não encontrada, por favor rode o comando "composer install"');
}
require_once __DIR__ . '/vendor/autoload.php';


/**
 * Inicializa as funções do WP usadas no plugin
*/
require_once ( ABSPATH . 'wp-admin/includes/plugin.php' );

/**
 * Inicializa variavel global do arquivo principal do plugin
*/
define ('TOTVS_SETUP_PLUGIN_INDEX', __FILE__ );
define ('TOTVS_SETUP_PLUGIN_BASE_NAME', plugin_basename( __FILE__ ));
define ('TOTVS_SETUP_PLUGIN_URL', plugin_dir_url(__FILE__));
define ('TOTVS_SETUP_PLUGIN_PATH', plugin_dir_path(__FILE__));
define ('TOTVS_SETUP_PLUGIN_ASSETS', TOTVS_SETUP_PLUGIN_PATH . 'resources/assets/');
define ('TOTVS_SETUP_PLUGIN_ASSETS_URL', TOTVS_SETUP_PLUGIN_URL . 'resources/assets/');
define ('TOTVS_SETUP_PLUGIN_DIST_SCRIPTS', TOTVS_SETUP_PLUGIN_URL . 'dist/assets/scripts/');
define ('TOTVS_SETUP_PLUGIN_DIST_STYLES', TOTVS_SETUP_PLUGIN_URL . 'dist/assets/styles/');
define ('TOTVS_SETUP_PLUGIN_LIBS_URL', TOTVS_SETUP_PLUGIN_URL . 'resources/assets/libs/');
define ('TOTVS_SETUP_PLUGIN_FIELDS_URL', TOTVS_SETUP_PLUGIN_URL . 'app/Classes/Libs/Acf/Fields/');
define ('TOTVS_SETUP_PLUGIN_ADMIN_PAGES', TOTVS_SETUP_PLUGIN_PATH . 'app/Controllers/Admin/Pages/' );
define ('TOTVS_SETUP_PLUGIN_ADMIN_VIEWS', TOTVS_SETUP_PLUGIN_PATH . 'resources/views/admin/');
define ('TOTVS_SETUP_PLUGIN_BLOCKS', TOTVS_SETUP_PLUGIN_PATH . 'app/Blocks/' );
define ('TOTVS_SETUP_PLUGIN_BLOCKS_VIEWS', TOTVS_SETUP_PLUGIN_PATH . 'resources/views/blocks/');
define ('TOTVS_SETUP_PLUGIN_BLOCKS_VIEWS_URL', TOTVS_SETUP_PLUGIN_URL . 'resources/views/blocks/');

/**
 * Inicia o Plugin
*/
new App\Setup();
