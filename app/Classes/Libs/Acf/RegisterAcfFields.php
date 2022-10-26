<?php
/**
 * Author - Plugin Name
 *
 *  @package plugin-name/Classes/Plugins/Acf
 *  @since   1.0.0
 *  @version 1.0.0
 */

namespace App\Classes\Plugins\Acf;

/**
 * Previne que o arquivo não seja acessado diretamente por uma URL
 */
if (! defined('ABSPATH')) {
    exit;
}

use StoutLogic\AcfBuilder\FieldsBuilder;

/**
 * Classe responsável pela gestão dos ACF's
 * 
 * Para criar os campo consulte a documentação oficial da lib:
 * @link https://github.com/StoutLogic/acf-builder/wiki
 */
class RegisterAcfFields
{
    public function __construct()
    {
        add_action('acf/init', [$this, 'registerOptionsFields']);
    }

    /**
     * Registra os ACF's usados no plugin.
     *
     * @return string
     * @throws \StoutLogic\AcfBuilder\FieldNameCollisionException
     */
    public function registerOptionsFields(): string
    {
        $options = new FieldsBuilder('options', [
            'key' => 'plugin_key_settings',
            'title' => '...'
        ]);

        $options
	        ->addTab('plugin_settings', ['label' => '...', 'placement' => 'top'])
	            ->addText('id')

        ->setLocation('options_page', '==', 'too-mit-settings');

	    return acf_add_local_field_group($options->build());
    }
}