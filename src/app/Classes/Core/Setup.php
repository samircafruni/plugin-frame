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
use App\Controllers\Gutenberg\ProjectX;
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
     * @var bool
     */
    public $devMode;

    /**
     * Por padrão, o modo de desenvolvimento está desabilitado.
     * No final do arquivo principal quando esta classe é
     * instanciada defina true para habilitá-lo.
     *
     * @param bool $devMode
     */
    public function __construct($devMode = false)
    {
        // Inicia o modo debug
        $this->devMode = $devMode;

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
        // Registra os assets do plugin
        $this->registerAssets();

        // Registra as requisições Ajax do plugin
        $this->registerAjax();

        // Registra a página de opções do plugin
        $this->registerPages();

        // Se não for passado o parâmetro "false"
        // inicia as libs auxiliáres do plugin
        $this->registerLibs(false);
        
        // Verifica se a classe "Debug" esta ativa.
        $this->enableDebug();
    }

    /**
     * Retorna as requisições Ajax do plugin
     *
     * @return void
     */
    public function registerAjax(): void
    {
        new Ajax();
    }

    /**
     * Retorna os assets do plugin
     *
     * @return void
     */
    public function registerAssets(): void
    {
        new Assets();
    }

    /**
     * Retorna a página de opções do plugin
     *
     * @return void
     */
    private function registerPages(): void
    {
        new Page();
    }

    /**
     * Retorna o bloco Gutenberg do plugin
     *
     * @return void
     */
    private function registerGutenberg(): void
    {
        new ProjectX();
    }

    /**
     * inicia as libs auxiliáres do plugin
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
    private function enableDebug(): void
    {
        if ($this->devMode) {
            new Debug();
        }
    }

}
