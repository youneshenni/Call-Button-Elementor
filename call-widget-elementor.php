<?php

/**
 * Plugin Name: Call Button Widget for Elementor
 * Description: This plugin installs a new widget to Elementor called "Call Widget", it allows you to create a call button that's clickable on mobile devices (It allows them to directly dial the number you have specified in the widget configuration)
 * Plugin URI:  https://github.com/youneshenni/Call-Button-Elementor
 * Version:     1.0.0
 * Author:      Younes Henni
 * Author URI:  https://github.com/youneshenni/
 * Text Domain: call-widget-elementor
 *
 * Elementor tested up to: 3.5.0
 * Elementor Pro tested up to: 3.5.0
 * 
 * Copyright (C) 2022  Younes Henni
 * 
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 * 
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 * 
 * You should have received a copy of the GNU General Public License
 * along with this program.  If not, see <https://www.gnu.org/licenses/>.
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
