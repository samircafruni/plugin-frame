<?php
/**
 * Studio Visual - Totvs Setup Plugin
 *
 * @package totvs-setup-plugin/Classes
 * @since   1.0.0
 * @version 1.0.0
*/

namespace App;

use App\Classes\Core\Core;
use App\Classes\Core\CheckDependencies;

/**
 *
 * Previne que o arquivo não seja acessado diretamente por uma URL
*/
if (!defined('ABSPATH')) exit;

class Setup extends Core
{
	public function __construct()
	{
        if ( new CheckDependencies() ) {

            $this->init();

            /**
             * Inicia as páginas do Admin
             *
             * @param bool Passe "true" para iniciar páginas administrativas diversas
             * @param bool Passe "true" para iniciar página de opções do ACF
             * @see {App\Controllers\Admin}
             *
             * @see {App\Classes\Libs\Acf\Page}
             */
            $this->registerAdminPages(true, true);

            /**
             * Inicia os blocos Gutenberg
             *
             * @param bool Passe "true" para iniciar os blocos no Gutenberg
             */
            $this->registerBlocks(true);
        }
	}
}
