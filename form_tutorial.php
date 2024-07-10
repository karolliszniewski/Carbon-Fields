<?php

/**
 * Plugin Name: Create form2
 * Version: 1.0
 */

if (!defined('ABSPATH')) {
    die('no');
}



if (!class_exists('CreateForm')) {

    class CreateForm
    {
        public function __construct()
        {
            define('MY_PLUGIN_PATH', plugin_dir_path(__FILE__));
            require_once(MY_PLUGIN_PATH . '/vendor/autoload.php');
            add_action('plugins_loaded', array($this, 'initialize'));
        }
        public function initialize()
        {
            include_once MY_PLUGIN_PATH . 'inc/utilities.php';
            include_once MY_PLUGIN_PATH . 'inc/options-page.php';
            include_once MY_PLUGIN_PATH . 'inc/contact-form.php';
        }
    }


    new CreateForm();
}
