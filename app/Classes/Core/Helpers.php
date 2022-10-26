<?php
/**
 * Author - Plugin Name
 *
 *  @package plugin-name/Classes/Core
 *  @since   1.0.0
 *  @version 1.0.0
 */

namespace App\Classes\Core;

/*
 * Previne que o arquivo não seja acessado diretamente por uma URL
 */
defined ( 'ABSPATH' ) || exit;

/*
 * Gerencia os métodos auxiliares do plugin.
 */
class Helpers
{
    /**
     * Debug and Die.
     *
     * @param mixed $val
     * @return void
     */
    public static function dd($val): void
    {
        var_dump($val);
        die();
    }

	/**
	 * Este método retorna o valor de um campo ACF, ou se vazio,
	 * um retorno pré-definido.
	 *
	 * @param string $field_name
	 * @param string $content_default
	 * @param mixed $page
	 */
	public static function gf(string $field_name, $page = 'option', string $content_default = '')
	{
		if (! function_exists('get_field')) {
			return '';
		}

		$value = get_field($field_name, $page) ?? get_field($field_name, $page);

		return $value && '' !== $value ? $value : $content_default;
	}

	/**
	 * Este método printa o valor de um campo ACF, ou se vazio,
	 * um retorno pré-definido.
	 *
	 * @param string $field_name
	 * @param string $content_default
	 * @param mixed $page
	 * @return string
	 */
	public static function tf(string $field_name, $page = 'option', string $content_default = ''): string
	{
		if (! function_exists('the_field')) {
			return '';
		}

		$value = get_field($field_name, $page) ?? get_field($field_name, $page);
		
		if ( (! is_array($value)) && (! is_object($value)) ) {
			return $value && '' !== $value ? $value : $content_default;
		} else {
			return 'O campo chamado é um array ou um objeto e não pode ser impresso.';
		}
	}
}
