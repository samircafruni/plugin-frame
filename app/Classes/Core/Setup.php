<?php
/**
 * Author - Plugin Name
 *
 * @package plugin-name/Classes/Core
 * @since   1.0.0
 * @version 1.0.0
 */

namespace App\Classes\Core;

/**
 * Previne que o arquivo não seja acessado diretamente por uma URL
 */
if (!defined('ABSPATH')) {
    exit;
}

use App\Classes\Tests\Debug;
use App\Controllers\Web\Admin\Page;
use App\Classes\Libs\Acf\{
    RegisterAcfFields, 
    RegisterAcfPageOptions
};

/**
 * Classe inicia o plugin
 */
class Setup
{
    /**
     * Por padrão, o modo de desenvolvimento está desabilitado.
     * No final do arquivo principal quando esta classe é
     * instanciada defina true para habilitá-lo.
     *
     * @param bool $devMode
     */
    public function __construct($devMode = true)
    {
        // Carrega o plugin após os demais terem sido carregados
        add_action('plugins_loaded', [$this, 'handler']);
    }

    /**
     * Esta propriedade manipula o core do plugins.
     *
     * @return void
     */
    public function handler()
    {
        // Se não for passado o parâmetro "false"
        // Registra os assets do plugin
        $this->registerAssets(false);

        // Se não for passado o parâmetro "false"
        // Registra as requisições Ajax do plugin
        $this->registerAjax(false);

        // Se não for passado o parâmetro "false"
        // Registra a página de opções do plugin
        $this->registerPages(false);

        // Se não for passado o parâmetro "false"
        // inicia as libs auxiliares do plugin
        $this->registerLibs(false);

        // Se não for passado o parâmetro "false"
        // Habilita o modo "Debug"
        $this->enableDebug(false);
    }

    /**
     * Retorna as requisições Ajax do plugin
     *
     * @return void
     */
    public function registerAjax(bool $parm = true): void
    {
        if ($parm) {
            new Ajax();
        }
    }

    /**
     * Retorna os assets do plugin
     *
     * @return void
     */
    public function registerAssets(bool $parm = true): void
    {
        if ($parm) {
            new Assets(false, false);
        }
    }

    /**
     * Retorna a página de opções do plugin
     *
     * @return void
     */
    private function registerPages(bool $parm = true): void
    {
        if ($parm) {
            new Page();
        }
    }

    /**
     * inicia as libs auxiliares do plugin
     * 
     * @return void
     */
    private function registerLibs(bool $parm = true): void
	{
        if ($parm) {
            new RegisterAcfFields();
		    new RegisterAcfPageOptions();
        }
	}

    /**
     * Habilita a classe de debug
     *
     * @return void
     */
    private function enableDebug(bool $parm = true): void
    {
        if ($parm) {
            new Debug();
        }
    }

}
