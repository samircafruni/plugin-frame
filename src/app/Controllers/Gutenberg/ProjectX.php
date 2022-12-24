<?php
/**
 * Author - Plugin Name
 *
 * @package plugin-name/Classes/Abstracts
 * @since   1.0.0
 * @version 1.0.0
 */

namespace App\Controllers\Gutenberg;

/**
 * Previne que o arquivo não seja acessado diretamente por uma URL
 */
if (!defined('ABSPATH')) {
    exit;
}

use App\Classes\Core\Block;

/**
 * Gerencia os dados dos blocos a serem criados para o projetoX
 */
class ProjectX
{

    public $project;

    public function __construct()
    {
        $this->project = 'project-x';
        $this->setHeader();
    }

    /**
     * Creates Gutenberg header block
     *
     * @return void
     */
    public function setHeader(): void
    {
        new Block(
            $this->project,
            'header',
            'Header Totvs Projeto X',
            'Header desenvolvido para o Projeto X',
            'Layout',
            'menu',
            ['header', 'rodape', 'layout', $this->project]
        );
    }

}