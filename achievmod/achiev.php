<?php
/**
 * Plugin Name: Achievmod
 */

define('ACHIEV_DOMAIN', 'achiev');
define('ACHIEV_FILE', __FILE__);
define('ACHIEV_PLUGIN_BASENAME', plugin_basename(ACHIEV_FILE));
define('ACHIEV_CORE_DIR', WP_PLUGIN_DIR . '/achiev');
define('ACHIEV_PLUGIN_URL', plugin_dir_url(ACHIEV_FILE));
define('ACHIEV_DEFAULT_POINT_LABEL', 'point');

require_once('include/class-achiev.php');
require_once('include/class-achiev-database.php');
require_once('include/class-achiev-shortcodes.php');
require_once('include/class-achiev-admin.php');
require_once('include/class-achiev-wordpress.php');

class Achiev_Plugin {
	private static $notices = array();
	public static function init() {
		
		register_activation_hook(ACHIEV_FILE, array(Achiev_Plugin, 'activate'));
		register_deactivation_hook(ACHIEV_FILE, array(Achiev_Plugin, 'deactivate'));
		register_uninstall_hook(ACHIEV_FILE, array(Achiev_Plugin, 'uninstall'));

		add_action('init', array(Achiev_Plugin, 'wp_init'));
	}
	
	public static function wp_init() {
		
		add_action('wp_enqueue_scripts', array(Achiev_Plugin, 'achiev_enqueue_scripts'));
		add_action('admin_enqueue_scripts', array(Achiev_Plugin, 'achiev_admin_enqueue_scripts'));
		
		Achiev_Admin::init();
	}
	
	public static function achiev_admin_enqueue_scripts() {
		wp_register_style('achiev-admin-css', ACHIEV_PLUGIN_URL . 'css/achiev.css');
		wp_enqueue_style('achiev-admin-css');
	}
	public static function achiev_enqueue_scripts() {
		wp_register_style('achiev-css', ACHIEV_PLUGIN_URL . 'css/achiev.css');
		wp_enqueue_style ('achiev-css');
	}
	

	public static function activate() {
		global $wpdb;

		$charset_collate = '';
		if (!empty( $wpdb->charset)) 
			$charset_collate = "DEFAULT CHARACTER SET $wpdb->charset";
		if (!empty($wpdb->collate))
			$charset_collate .= " COLLATE $wpdb->collate";
		$table = "wp_point_users";
		if ($wpdb->get_var("SHOW TABLES LIKE '$table'") != $table) 
		{
			$queries[] = "CREATE TABLE $table (
						  user_id BIGINT(20) UNSIGNED NOT NULL,
						  achiev INT(11) DEFAULT 0,
						  PRIMARY KEY   (user_id)
						  ) $charset_collate;";
		}
	}

	public static function uninstall() {
	 	global $wpdb;
		$wpdb->query('DROP TABLE IF EXISTS wp_point_users ');
	}
}
Achiev_Plugin::init();

