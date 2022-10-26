<?php
/**
 * Author - Plugin Name
 *
 * @package plugin-name/Classes/Abstracts
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

class Ajax
{

    public function __construct()
    {
        add_action('wp_ajax_', [$this, '...']);
        add_action('wp_ajax_', [$this, '...']);
    }
}