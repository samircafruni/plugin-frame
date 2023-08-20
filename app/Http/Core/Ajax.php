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

class Ajax
{
    public function __construct()
    {
        add_action('wp_ajax_exemple', [$this, 'exemple']);
        add_action('wp_ajax_nopriv_exemple', [$this, 'exemple']);
    }

    public function exemple() {
		//
    }
}
