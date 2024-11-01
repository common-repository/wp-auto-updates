<?php
namespace WPAutoUpdates\Admin;

use WPAutoUpdates\WPAdminPage\AdminPage;

final class AutoUpdatesAdmin extends AdminPage {

	/**
	 * Admin menu
	 * Main top level admin menus
	 *
	 * @return array
	 */
	private static function admin_menu() {
	    $menu = array();
	    $menu['mcolor']       = '#a2bbce'; // #CA4A1F
	    $menu['page_title']   = 'Enable Auto Updates';
	    $menu['menu_title']   = 'Auto Updates';
	    $menu['capability']   = 'manage_options';
	    $menu['menu_slug']    = 'enable-wp-auto-updates';
	    $menu['function']     = 'enable_auto_updates_callback';
	    $menu['icon_url']     = 'dashicons-download';
	    $menu['position']     = null;
	    $menu['prefix']       = 'wpau';
	    $menu['plugin_path']  = plugin_dir_path( __FILE__ );
	    return $menu;
	}

	/**
	 * Submenu
	 *
	 * @return [type] [description]
	 */
	private static function submenu() {
	    $menu = array();
	    $menu[] = 'Update Settings';
	    return $menu;
	}

	/**
	 * Init
	 *
	 * @return [type] [description]
	 */
  	public static function init() {
    	return new AutoUpdatesAdmin( self::admin_menu() );
	}
}
