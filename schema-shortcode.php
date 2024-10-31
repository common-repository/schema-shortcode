<?php
/**
 * Plugin Name: Schema Shortcode
 * Plugin URI: http://websitetools.url.ph/files/my-plugins/shortcode-schema-button.zip
 * Description: Create a shortcode for inputting schema tags.
 * Version: 1.0
 * Author: Jeric Izon
 * Author URI: https://profiles.wordpress.org/jeric_izon/
 * License: GPLv2 or later
 * License URI: http://www.gnu.org/licenses/gpl-2.0.html
 *
 * Copyright (C) 2014 Jeric Izon
 * 
 * This program is free software; you can redistribute it and/or
 * modify it under the terms of the GNU General Public License
 * as published by the Free Software Foundation; either version 2
 * of the License, or any later version.
 * 
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 * 
 * You should have received a copy of the GNU General Public License
 * along with this program; if not, write to the Free Software
 * Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301, USA.
 */

add_action( 'admin_head', 'add_schema' );

function schema_style() {
    wp_enqueue_style( 'style-name', get_bloginfo('url') . '/wp-content/plugins/shortcode-schema-button/styles.css');
}
add_action( 'wp_enqueue_scripts', 'schema_style' );

function itemscope( $atts ) {
  extract(shortcode_atts(
    array(
      'name' => '',
    ), $atts));
  $return = '<div itemscope itemtype="http://schema.org/'. $name . '">';
  return $return;
}
add_shortcode( 'itemscope', 'itemscope' );

function scope_close( $atts ) {
  extract(shortcode_atts(
    array(
      'name' => '',
    ), $atts));
  $return = '</div>';
  return $return;
}
add_shortcode( 'scope_close', 'scope_close' );

function itemprop( $atts ) {
  extract(shortcode_atts(
    array(
      'name' => '',
      'text' => '',
    ), $atts));
  $return = '<div class="itemprop-style" itemprop="' . $name . '">' . $text;
  return $return;
}
add_shortcode( 'itemprop', 'itemprop' );

function itemprop_close( $atts ) {
  extract(shortcode_atts(
    array(
      'name' => '',
    ), $atts));
  $return = '</div>';
  return $return;
}
add_shortcode( 'itemprop_close', 'itemprop_close' );

function add_schema_plugin( $plugin_array ) {
    $plugin_array['add_schema'] = plugins_url( '/plugin.js', __FILE__ );
    return $plugin_array;
}
function add_schema() {
    add_filter( 'mce_external_plugins', 'add_schema_plugin' );
    add_filter( 'mce_buttons', 'add_schema_button' );
}

function add_schema_button( $buttons ) {
    array_push( $buttons, 'add_schema_button_key' );
    return $buttons;
}