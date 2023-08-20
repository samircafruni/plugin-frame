<?php
/**
 * Studio Visual - Totvs Setup Plugin
 *
 * @package totvs-setup-plugin/Classes
 * @since   1.0.0
 * @version 1.0.0
*/

namespace App\Classes\Core;

/**
 *
 * Previne que o arquivo não seja acessado diretamente por uma URL
*/
if (!defined('ABSPATH')) exit;

/**
 * Registra os blocos no core do Wordpress
 */
class Gutenberg
{
    private $project;

    private $slug;

    private $title;

    private $description;

    private $category;

    private $icon;

    private $keywords;

    private $supports;

    private $exemple;

    private $styles;

    private $enqueue;


    public function __construct( array $params )
    {
        $this->project      = $params['project'];
        $this->slug         = $params['slug'];
        $this->title        = $params['title'];
        $this->description  = $params['description'];
        $this->category     = $params['category'];
        $this->icon         = $params['icon'];
        $this->keywords     = $params['keywords'];
        $this->post_type    = $params['post_type'];
		$this->supports     = $params['supports'];
		$this->mode         = $params['mode'];
		$this->exemple      = $params['exemple'];
		$this->styles       = $params['styles'];
		$this->enqueue      = isset( $params['enqueue'] ) ? $params['enqueue'] : '';

	    /**
	     * Starts the block register.
	     */
        add_action('acf/init', [ $this, 'configGutenbergBlock' ]);

	    /**
	     * Starts the block category register.
	     */
	    add_filter( 'block_categories_all', [ $this, 'registerBlockCategory' ]);
    }

	/**
	 * Registra uma categoria personalizada
	 *
	 * @return array
	 */
	public function registerBlockCategory(): array
	{
		$categories[] = [
			'slug'  => $this->category,
			'title' => str_replace('-', ' ', $this->category )
		];

		return $categories;
	}

	/**
     * Registers the block category.
     *
	 * @return void
	 */
    public function configGutenbergBlock(): void
    {
	    acf_register_block_type([
            'name'				=> $this->slug,
            'title'				=> __( $this->title ),
            'description'		=> __( $this->description ),
            'render_template'	=> TOTVS_SETUP_PLUGIN_BLOCKS_VIEWS . $this->slug . '/' . $this->slug .'.php',
            'category'			=> $this->category,
            'icon'				=> $this->icon,
            'keywords'			=> $this->keywords,
		    'post_types'        => $this->post_type,
            'mode'              => $this->mode,
		    'supports'          => $this->supports,
		    'exemple'           => $this->exemple,
            'styles'            => $this->styles,
            'enqueue_assets'    => function() {

                $script_uri = TOTVS_SETUP_PLUGIN_ASSETS  . 'scripts/blocks/' . $this->slug . '.js';

                /*
                 * Registers the plugin styles
                 */
//                if ( file_exists( $script_uri ) ) {
//                    wp_enqueue_style( 'block-' . $this->slug, TOTVS_SETUP_PLUGIN_ASSETS_URL  . 'scripts/blocks/' . $this->slug . '.js', ['jquery'], '', true );
//                }

                /*
                 * Registers the plugin scripts
                 */
                if ( file_exists( $script_uri ) ) {
                    wp_enqueue_script( 'block-' . $this->slug, TOTVS_SETUP_PLUGIN_ASSETS_URL  . 'scripts/blocks/' . $this->slug . '.js', ['jquery'], '', true );
                }

                /**
                 * Registers the plugin externals assets.
                 */
                if ( is_array( $this->enqueue ) ) {
                    foreach ( $this->enqueue as $type => $asset ) {
                        if ( $type == 'style' && is_array( $asset ) ) {
                            foreach ( $asset as $item ) {
                                wp_enqueue_style( $item[0], $item[1], $item[2], $item[3] );
                            }
                        }
                        if ( $type == 'script' && is_array( $asset ) ) {
                            foreach ( $asset as $item ) {
                                wp_enqueue_script( $item[0], $item[1], $item[2], $item[3], $item[4] );
                            }
                        }
                    }
                }

            },
        ]);
    }
}
