<?php
/*
 * Author - Plugin Name
 *
 *  @package plugin-name/Traits
 *  @since   1.0.0
 *  @version 1.0.0
 */

namespace App\Traits;

/*
 * Gerencia as Notices usadas no plugin
 */
trait Notices {

	/**
	 * Retorna um alerta caso o ACF não seja encontrado.
	 *
	 * @return void.
	 */
	public static function AcfFallbackNotice(): void
	{
		echo '<div class="error"><p>' . sprintf( '<b>Plugin Name</b> depende do %s para funcionar!',
				'<a href="http://wordpress.org/extend/plugins/advanced-custom-fields/">' . 'Advanced Custom Fields PRO' . '</a>' ) . '</p></div>';
	}

}