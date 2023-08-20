<?php
/*
 * Studio Visual - TOTVS Fluig
 *
 *  @package totvs-fluig/Traits
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
	public function AcfFallbackNotice(): void
	{
		echo '<div class="error"><p>' . sprintf( '<b>Totvs Setup Plugin</b> depende do %s para funcionar!',
				'<a href="http://wordpress.org/extend/plugins/advanced-custom-fields/">' . 'Advanced Custom Fields PRO' . '</a>' ) . '</p></div>';
	}

}
