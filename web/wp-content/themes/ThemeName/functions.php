<?php
namespace AW\ThemeName;
/**
 *	Base function sheet for Timber-based themes
 */
defined('ABSPATH') or die('No direct access, please');

require_once(__DIR__.'/vendor/autoload.php');
new \Timber\Timber();

require_once('includes/Functions.php');
$fn = new Functions();

\add_action('init', array($fn,'set_up_theme'));
\add_action('widgets_init', array($fn,'register_widgets'));
\add_filter('upload_mimes', array($fn,'enable_svg_upload'));

\add_action('wp_enqueue_scripts', array($fn,'queue_resources'));
\add_filter('timber_context', array($fn,'add_to_context'));
\add_filter('the_content', array($fn,'auto_escape'),0,1);
