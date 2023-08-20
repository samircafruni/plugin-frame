<?php
/**
 * Studio Visual - Totvs Setup Plugin
 *
 * @package totvs-setup-plugin/Classes
 * @since   1.0.0
 * @version 1.0.0
 */

namespace App\Http\Controllers\Admin;

/**
 *
 * Previne que o arquivo não seja acessado diretamente por uma URL
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Registra páginas no admin do Wordpress
 */
class MainPage {

	public function __construct() {
		add_action( 'admin_menu', [ $this, 'registerPageAdmin' ] );
	}

	/**
	 * Registra a página
	 *
	 * @return void
	 */
	public function registerPageAdmin(): void
	{
		if ( ! function_exists( 'add_menu_page' ) ) {
			return;
		}

		add_menu_page(
			'Menu Title',
			'Menu Title',
			'edit_posts',
			'main-page',
			[$this, 'view'],
			'dashicons-wordpress',
			6
		);
	}

	/**
	 * Retorna a view da página
	 *
	 * @return void
	 */
	public function view(): void
	{
		if ( ! file_exists( TOTVS_SETUP_PLUGIN_ADMIN_VIEWS . 'main-page.php' ) ) {
			die('Não existe uma view para este callback.');
		}
		require_once( TOTVS_SETUP_PLUGIN_ADMIN_VIEWS . 'main-page.php' );
	}
}
