<?php
/**
 * Studio Visual - Totvs Setup Plugin
 *
 * @package totvs-setup-plugin/Classes
 * @since   1.0.0
 * @version 1.0.0
*/

namespace App\Classes\Libs\Acf\Page;

use StoutLogic\AcfBuilder\FieldsBuilder;

/**
 *
 * Previne que o arquivo não seja acessado diretamente por uma URL
*/
if (!defined('ABSPATH')) exit;

class PageOptions
{
    public function __construct()
	{
		$this->registerPageOptions();
	}

	/**
	 *
	 * Registra a página de opções de plugin
	*/
	public function registerPageOptions(): void
	{
         if (!function_exists('acf_add_options_page')) return;

         acf_add_options_page([
             'page_title' => 'TOTVS Setup Plugin',
             'menu_title' => 'TOTVS Setup Plugin',
             'menu_slug' => 'totvs-setup-plugin',
             'capability' => 'edit_posts',
             'redirect' => false
         ]);

         $this->registerPageOptionsFields();
	}

    /**
	 *
	 * Registra os ACFs
	*/
    public function registerPageOptionsFields(): void
    {
         add_action('acf/init', [$this, 'fields']);
    }

    /**
	 *
	 * Cria os campos
	*/
    public function fields()
    {
         $options = new FieldsBuilder('Modal');
         $options
             ->addText('text', [
                 'label' => 'Texto',
                 'ui' => 1,
                 'ui_on_text' => 'Sim',
                 'ui_off_text' => 'Não',
             ])
             ->setLocation('options_page', '==', 'totvs-modal-input-settings');

	     return acf_add_local_field_group($options->build());
    }
}
