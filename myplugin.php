<?php
/**
 * Plugin name: Double-E Plugin Framework
 * Description: Starter files for creating a plugin in an OOP fashion.
 * Rename and find & replace MyPlugin, myplugin etc to suit your needs, and update the name and this description.
 *
 * Author:      		Leesa Ward
 * Author URI:  		https://www.leesaward.dev
 * Version:     		2.0.0
 * Requires at least: 	6.3.2
 * Requires PHP: 		8.1.9
 * Text Domain: 		myplugin
 *
 * @package MyPlugin
 */

// Load the plugin files
require_once('class-myplugin.php');

/**
 * Create activation and deactivation hooks and functions, so we can do things
 * when the plugin is activated, deactivated, or uninstalled.
 * These need to be in this plugin root file to work, so to run our plugin's functions from within its
 * classes, we simply call a function (from the plugin class) inside the function that needs to be here.
 * @return void
 */
function activate_myplugin(): void {
	MyPlugin::activate();
}
function deactivate_myplugin(): void {
	MyPlugin::deactivate();
}
function uninstall_myplugin(): void {
	MyPlugin::uninstall();
}
register_activation_hook(__FILE__, 'activate_myplugin');
register_deactivation_hook(__FILE__, 'deactivate_myplugin');
register_uninstall_hook(__FILE__, 'uninstall_myplugin');


// Load and run the rest of the plugin
new MyPlugin();


/**
 * Log actions and filters that are run.
 * For debugging purposes only; comment out when not in use!
 * @wp-hook
 *
 * @return void
 */
function doublee_log_all_actions(): void {
	foreach($GLOBALS['wp_actions'] as $item => $count) {
		error_log(print_r($item, true));
	}
	foreach($GLOBALS['wp_filter'] as $item => $count) {
		error_log(print_r($item, true));
	}
}
//add_action('shutdown', 'doublee_log_all_actions');
