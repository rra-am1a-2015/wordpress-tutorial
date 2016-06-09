<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              http://adruijter.com
 * @since             1.0.0
 * @package           Wp_Table
 *
 * @wordpress-plugin
 * Plugin Name:       WP UserTable
 * Plugin URI:        http://www.wpusertable.nl
 * Description:       Met deze plugin kun je de gebruikerstabel bewerken. Het toevoegen, verwijderen weergeven en veranderen van records ligt nu binnen uw mogelijkheden.
 * Version:           1.0.1
 * Author:            Arjan de Ruijter
 * Author URI:        http://adruijter.com
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       wp-table
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-wp-table-activator.php
 */
function activate_wp_table() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-wp-table-activator.php';
	Wp_Table_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-wp-table-deactivator.php
 */
function deactivate_wp_table() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-wp-table-deactivator.php';
	Wp_Table_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_wp_table' );
register_deactivation_hook( __FILE__, 'deactivate_wp_table' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-wp-table.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_wp_table() {

	$plugin = new Wp_Table();
	$plugin->run();

}
run_wp_table();
