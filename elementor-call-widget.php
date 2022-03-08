<?php

/**
 * Plugin Name: Elementor Call Button Widget
 * Description: Auto embed any embbedable content from external URLs into Elementor.
 * Plugin URI:  -
 * Version:     1.0.0
 * Author:      Younes Henni
 * Author URI:  https://github.com/youneshenni/
 * Text Domain: elementor-call-widget
 *
 * Elementor tested up to: 3.5.0
 * Elementor Pro tested up to: 3.5.0
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

/**
 * Register Call Widget.
 *
 * Include widget file and register widget class.
 *
 * @since 1.0.0
 * @param \Elementor\Widgets_Manager $widgets_manager Elementor widgets manager.
 * @return void
 */
function register_call_widget($widgets_manager)
{

    require_once(__DIR__ . '/widgets/call-widget.php');

    $widgets_manager->register(new \Elementor_Call_Widget());
}
add_action('elementor/widgets/register', 'register_call_widget');
