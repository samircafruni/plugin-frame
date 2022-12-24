<?php

/***************************************************************************
 * Plugin Name:  Plugin Name
 * Plugin URI:   https://github.com/...
 * Description:  Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
 * Version:      1.0.0
 * License:      GPLv2 or later
 * Author:       ...
 * Author URI:   https://github.com/...
 * Text Domain:  plugin-name
 * Domain Path: /languages
 * Requires at least: 5.7
 * Requires PHP: 7.4
 *
 * @package plugin-name
 **************************************************************************/


/*
|--------------------------------------------------------------------------
| Previne que o arquivo não seja acessado diretamente por uma URL
|--------------------------------------------------------------------------
|
|
*/

defined ( 'ABSPATH' ) || exit;


/*
|--------------------------------------------------------------------------
| Inicializa o Composer
|--------------------------------------------------------------------------
|
|
*/

require_once __DIR__ . '/vendor/autoload.php';


/*
|--------------------------------------------------------------------------
| Inicializa as funções do WP usadas no plugin
|--------------------------------------------------------------------------
|
|
*/

require_once ( ABSPATH . 'wp-admin/includes/plugin.php' );


/*
|--------------------------------------------------------------------------
| Inicializa as rotas do plugin
|--------------------------------------------------------------------------
|
|
*/

// Define a URL do arquivo principal do plugin
define ('PLUGIN_NAME_PLUGIN_INDEX', __FILE__ );

// Define o nome base do plugin
define ('PLUGIN_NAME_PLUGIN_BASE_NAME', plugin_basename( __FILE__ ));

// Define a URL do plugin
define ('PLUGIN_NAME_PLUGIN_URL', plugin_dir_url(__FILE__));

// Define o PATH do plugin
define ('PLUGIN_NAME_PLUGIN_URI', plugin_dir_path( __FILE__ ));

// Define a URL dos scripts do plugin
define ('PLUGIN_NAME_PLUGIN_LIBS', PLUGIN_NAME_PLUGIN_URL . 'dist/resources/assets/libs/');

// Define a URL dos scripts do plugin
define ('PLUGIN_NAME_PLUGIN_SCRIPTS', PLUGIN_NAME_PLUGIN_URL . 'dist/resources/assets/scripts/');

// Define a URL dos styles do plugin
define ('PLUGIN_NAME_PLUGIN_STYLES', PLUGIN_NAME_PLUGIN_URL . 'dist/resources/assets/styles/');

// Define o PATH de views do plugin
define ('PLUGIN_NAME_PLUGIN_VIEWS', PLUGIN_NAME_PLUGIN_URI . 'dist/resources/views/');


/*
|--------------------------------------------------------------------------
| Inicializa o Plugin
|--------------------------------------------------------------------------
|
|
*/

new \App\Classes\Core\Setup();



