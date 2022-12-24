<?php
/**
 * Author - Plugin Name
 *  
 * @package plugin-name/Classes/Libs/Acf/ProjectX
 * @since   1.0.0
 * @version 1.0.0
 */

namespace App\Classes\Libs\Acf\ProjectX;

/**
 * Previne que o arquivo não seja acessado diretamente por uma URL
 */
if (! defined('ABSPATH')) {
    exit;
}

use StoutLogic\AcfBuilder\FieldsBuilder;

/**
 * Gerencia as páginas administrativas do plugin
 */
class RegisterAcfHeader
{
	public function __construct()
	{
        add_action('acf/init', [$this, 'registerFields']);
	}

	/**
	 * Create ACF fields with ACF Builder
	 *
	 * @return 
	 */
	public function createFields()
	{
        $options = new FieldsBuilder('header');
        $options
            ->addGroup('header', [
                'label' => 'Bloco Header',
            ])
                ->addAccordion('accordion_data', [
                    'label' => 'Conteúdo',
                    'instructions' => 'Dados do bloco',
                ])
                    ->addImage('logo', [
                        'label' => 'Logo',
                        'instructions' => 'Adicione aqui seu logo. Recomendamos fortemente o formato .PNG',
                        'required' => 1,
                        'return_format' => 'array',
                        'preview_size' => 'thumbnail',
                        'library' => 'all',
                        'wrapper' => [
                            'width' => '50',
                        ],
                    ])
                ->addAccordion('accordion_data_end')->endpoint()
                    
                ->addAccordion('accordion_config', [
                    'label' => 'Configuração',
                    'instructions' => 'Configurações extras do bloco',
                ])
                    ->addText('anchor', [
                        'label'    => 'Ancora',
                        'instructions' => 'Crie um identificador para esse bloco. Normalmente ultilizado para criar ancoras.',
                    ])
                ->addAccordion('accordion_config_end')->endpoint()
            ->setLocation('block', '==', 'acf/project-x-header');

        return $options;
	}

    /**
	 * Register ACF fields
	 *
	 * @return void
	 */
    public function registerFields(): void
    {
        $options = $this->createFields();
        acf_add_local_field_group($options->build());
    }
}