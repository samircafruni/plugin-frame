<?php

/**
 * Studio Visual - Totvs Setup Plugin
 *
 * @package totvs-setup-plugin/Classes
 * @since   1.0.0
 * @version 1.0.0
 */

namespace App\Http\Blocks;

use App\Classes\Core\Gutenberg;
use App\Classes\Core\Helpers;
use StoutLogic\AcfBuilder\FieldsBuilder;
use function App\Blocks\acf_add_local_field_group;

/**
 *
 * Previne que o arquivo não seja acessado diretamente por uma URL
 */
if (!defined('ABSPATH')) exit;

class Button
{

    /**
     * The block name.
     *
     * @var string
     */
    public $name = 'Botão';

    /**
     * The block slug.
     *
     * @var string
     */
    public $slug = 'button';

    /**
     * The block description.
     *
     * @var string
     */
    public $description = 'Bloco com todos os estilos de botão';

    /**
     * The block category.
     *
     * @var string
     */
    public $category = 'Totvs Treinamentos';

    /**
     * The block icon.
     * https://developer.wordpress.org/resource/dashicons/
     *
     * @var string|array
     */
    public $icon = 'button';

    /**
     * The block keywords.
     *
     * @var array
     */
    public $keywords = ['totvs', 'button', 'link',];

    /**
     * The block post type allow list.
     *
     * @var array
     */
    public $post_types = [];

    /**
     * The parent block type allow list.
     *
     * @var array
     */
    public $parent = [];

    /**
     * The default block mode.
     *
     * @var string
     */
    public $mode = 'auto';

    /**
     * The default block alignment.
     *
     * @var string
     */
    public $align = '';

    /**
     * The default block text alignment.
     *
     * @var string
     */
    public $align_text = '';

    /**
     * The default block content alignment.
     *
     * @var string
     */
    public $align_content = '';

    /**
     * The supported block features.
     *
     * @var array
     */
    public $supports = [
        'align'         => true,
        'align_text'    => true,
        'align_content' => true,
        'full_height'   => true,
        'anchor'        => true,
        'mode'          => true,
        'multiple'      => true,
        'jsx'           => true,
    ];

    /**
     * The block styles.
     *
     * @var array
     */
    public $styles = [];

    /**
     * The block preview example data.
     *
     * @var array
     */
    public $example = [];

    /**
     * @param string $name
     */
    public function __construct()
    {
        $this->registerBlock();
        $this->registerFields();
    }

    /**
     * Assets to be enqueued when rendering the block.
     *
     * @return void
     */
    public function enqueue()
    {
    }

    /**
     * The block field group.
     * https://github.com/Log1x/acf-builder-cheatsheet
     *
     * @return array
     */
    public function registerFields()
    {
        $fields = new FieldsBuilder('button');

        $fields->addText('btn_label', [
            'label' => 'Button Text'
        ])

        ->setLocation( 'block', '==', 'acf/button' );

        acf_add_local_field_group( $fields->build() );
    }

    /**
     * @return void
     */
    public function registerBlock(): void
    {
        new Gutenberg([
            'title'       => $this->name,
            'slug'        => $this->slug,
            'category'    => $this->category,
            'project'     => Helpers::getPluginData('TextDomain'),
            'post_type'   => $this->post_types,
            'description' => $this->description,
            'icon'        => $this->icon,
            'keywords'    => $this->keywords,
            'mode'        => $this->mode,
            'supports'    => $this->supports,
            'style'       => $this->styles,
            'exemple'     => $this->example,
            'styles'      => $this->styles
        ]);
    }
}
