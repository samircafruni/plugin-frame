<?php
/**
 * Author - Plugin Name
 *
 * @package plugin-name/Classes/Core
 * @since   1.0.0
 * @version 1.0.0
 */

namespace App\Classes\Core;

/*
 * Previne que o arquivo não seja acessado diretamente por uma URL
 */
defined('ABSPATH') || exit;

/*
 * Classe gerencia e cria os blocos gutenberg
 */
class Block {

    /**
     * @var string
     */
    private $project;

    /**
     * @var string
     */
    private $slug;
 
    /**
     * @var string
     */
    private $title;
        
    /**
     * @var string
     */
    private $description;
    
    /**
     * @var string
     */
    private $category;

    /**
     * @var string
     */
    private $icon;
    
    /**
     * @var array
     */
    private $keywords;

    /**
     * logs all data from the Gutenberg block and logs
     * 
     * @access public
     * @param string $project
     * @param string $slug
     * @param string $title
     * @param string $description
     * @param string $category
     * @param string $icon
     * @param array $keywords
     */
    public function __construct($project, $slug, $title, $description, $category, $icon, $keywords)
    {
        $this->setProject($project);
        $this->setSlug($slug);
        $this->setTitle($title);
        $this->setDescription($description);
        $this->setCategory($category);
        $this->setIcon($icon);
        $this->setKeywords($keywords);

        add_action('acf/init', [ $this, 'createBlock' ]);
    }

    /**
     * Assemble data to register Gutenberg block
     * 
     * @return void
     */ 
    public function createBlock(): void
    {
        acf_register_block([
            'name'				=> $this->getProject() . '-' . $this->getSlug(),
            'title'				=> __($this->getTitle()),
            'description'		=> __($this->getDescription()),
            'render_template'	=> PLUGIN_NAME_PLUGIN_VIEWS . 'gutenberg/' . $this->getProject() . '/' . $this->getSlug() . '.php',
            'category'			=> $this->getCategory(),    
            'icon'				=> $this->getIcon(),
            'keywords'			=> $this->getKeywords(),
        ]);
    }

     /**
     * Get Gutenberg block project value
     * 
     * @return string
     */ 
    public function getProject(): string
    {
        return $this->project;
    }

    /**
     * Set Gutenberg block project value
     *
     * @param  string $slug
     * @return void
     */
    private function setProject($project): void
    {
        $this->project = $project;
    }

    /**
     * Get Gutenberg block slug value
     * 
     * @return string
     */ 
    public function getSlug(): string
    {
        return $this->slug;
    }

    /**
     * Set Gutenberg block slug value
     *
     * @param  string $slug
     * @return void
     */
    private function setSlug($slug): void
    {
        $this->slug = $slug;
    }
 
    /**
     * Get Gutenberg block title value
     *
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }
         
    /**
     * Set Gutenberg block title value
     *
     * @param  string $title
     * @return void
     */
    private function setTitle($title): void
    {
        $this->title = $title;
    }
         
    /**
     * Get Gutenberg block description value
     *
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * Set Gutenberg block description value
     *
     * @param  string $description
     * @return void
     */
    private function setDescription($description): void
    {
        $this->description = $description;
    }
         
    /**
     * Get Gutenberg block category value
     *
     * @return string
     */
    public function getCategory(): string
    {
        return $this->category;
    }
         
    /**
     * Set Gutenberg block category value
     *
     * @param  string $category
     * @return void
     */
    private function setCategory($category): void
    {
        $this->category = $category;
    }

    /**
     * Get Gutenberg block icon
     *
     * @return string
     */
    public function getIcon(): string
    {
        return $this->icon;
    }

    /**
     * Set Gutenberg block icon
     *
     * @param  string $icon
     * @return void
     */
    private function setIcon($icon): void
    {
        $this->icon = $icon;
    }
         
    /**
     *  Get Gutenberg block keywords value
     *
     * @return array
     */
    public function getKeywords(): array
    {
        return $this->keywords;
    }
         
    /**
     * Set Gutenberg block keywords value
     *
     * @param  array $keywords
     * @return void
     */
    private function setKeywords($keywords): void
    {
        $this->keywords = $keywords;
    }
}