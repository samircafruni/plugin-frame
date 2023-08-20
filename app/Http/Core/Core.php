<?php
/**
 * Studio Visual - Totvs Setup Plugin
 *
 * @package totvs-setup-plugin/Classes
 * @since   1.0.0
 * @version 1.0.0
*/

namespace App\Classes\Core;

use App\Classes\Libs\Acf\Page\Options;

/**
 *
 * Previne que o arquivo não seja acessado diretamente por uma URL
*/
if (!defined('ABSPATH')) exit;

class Core
{
	public function __construct($devMode = false)
	{
		add_action('plugins_loaded', [ $this, 'init' ]); // Carrega o plugin após os demais terem sido carregados
	}

	/**
	 * @return void
	 */
	public function init()
	{
        $this->registerAssets();
        $this->registerAjax();
        $this->registerAdminPages();
	}

	/**
	 * @return void
	 */
	private function registerAssets(): void
	{
		new Assets();
	}

	/**
	 * @return void
	 */
	private function registerAjax(): void
	{
		new Ajax();
	}

	/**
	 * @param bool $StartAdminPages
	 * @param bool $StartPageOptions
	 *
	 * @return void
	 */
	protected function registerAdminPages(
		bool $StartAdminPages = false,
		bool $StartPageOptions = false
	): void
	{
        if ( ! function_exists('acf_add_local_field_group') ) {
            deactivate_plugins(plugin_basename(TOTVS_SETUP_PLUGIN_INDEX));
            if (isset($_GET['activate'])) {
                unset($_GET['activate']);
            }
            return;
        }

		if ( $StartAdminPages ) {
			$pages = glob(TOTVS_SETUP_PLUGIN_ADMIN_PAGES . '*.*');
			foreach ( $pages as $page ) {
				$class_name = 'App\Controllers\Admin\\' . basename( $page, '.php');
				new $class_name;
			}
		}

		if ( $StartPageOptions ) {
			new Options();
		}
	}

	/**
	 * @param $options
	 * @return void
	 */
	protected function registerBlocks( $registerBlocks = false ): void
	{
        if ( ! function_exists('acf_add_local_field_group') ) {
            deactivate_plugins(plugin_basename(TOTVS_SETUP_PLUGIN_INDEX));
            if (isset($_GET['activate'])) {
                unset($_GET['activate']);
            }
            return;
        }

        if ( $registerBlocks ) {
			$blocks = glob(TOTVS_SETUP_PLUGIN_BLOCKS . '*.*');
			foreach ( $blocks as $block ) {
				$class_name   = basename( $block, '.php');
				$block_name   = 'App\Blocks\\' . $class_name;
				if ( class_exists( $block_name ) ) {
					new $block_name;
				}
			}
		}
	}
}
