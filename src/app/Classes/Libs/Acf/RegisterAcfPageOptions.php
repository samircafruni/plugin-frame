<?php
/**
 * Author - Plugin Name
 *  
 * @package plugin-name/Classes/Libs/Acf
 * @since   1.0.0
 * @version 1.0.0
 */

namespace App\Classes\Libs\Acf;

/**
 * Gerencia as páginas administrativas do plugin
 */
class RegisterAcfPageOptions
{
	public function __construct()
	{
		$this->registerPageOptions();
	}

	/**
	 * Registra a página de opções de plugin
	 *
	 * @return void
	 */
	public function registerPageOptions(): void
	{
		if (function_exists('acf_add_options_page')) {
			acf_add_options_page([
				'page_title' => '...',
				'menu_title' => '...',
				'menu_slug' => 'plugin-name-settings',
				'capability' => 'edit_posts',
				'redirect' => false
			]);
		}
	}
}