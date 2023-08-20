<?php
/**
 * Studio Visual - Totvs Setup Plugin
 *
 * @package totvs-setup-plugin/Classes
 * @since   1.0.0
 * @version 1.0.0
*/

namespace App\Classes\Core;

/**
 *
 * Previne que o arquivo não seja acessado diretamente por uma URL
*/
if (!defined('ABSPATH')) exit;

class Helpers
{
    public static function gf(string $field_name, $page = 'option', string $content_default = '')
	{
		if (! function_exists('get_field')) {
			return '';
		}

		$value = get_field($field_name, $page) ?? get_field($field_name, $page);

		return $value && '' !== $value ? $value : $content_default;
	}

    public static function tf(string $field_name, $page = 'option', string $content_default = ''): string
	{
		if (! function_exists('the_field')) {
			return '';
		}

		$value = the_field($field_name, $page) ?? the_field($field_name, $page);

		return $value && '' !== $value ? $value : $content_default;
	}

	public static function it_exists($field)
	{
		if(empty( $field ) && strlen( $field ) > 0) return false;

		return $field;
	}

	public function is_edit_page() {
        global $pagenow;

        if ($pagenow === 'post.php') {
            if (isset($_GET['action']) && $_GET['action'] === 'edit') {
                return true;
            }
        }

        return false;
    }

	/**
	 * @param object $class
	 *
	 * @return string
	 */
	public static function getClassName( object $class ): string
	{
		return end(explode('\\', get_class( $class )) );
	}

	public static function getPluginData( string $find )
	{
		$data = get_plugin_data(TOTVS_SETUP_PLUGIN_INDEX);
		return $data[$find];
	}

    public static function getAllMenus()
    {
        $menus = wp_get_nav_menus();
        $selectMenus = [];

        foreach ($menus as $menu) {
            $menu = [
                $menu->slug => $menu->name
            ];
            $selectMenus[] = $menu;
        }

        return $selectMenus;
    }
}
