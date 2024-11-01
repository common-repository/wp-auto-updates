<?php

namespace WPAutoUpdates;

if ( ! defined( 'ABSPATH' ) ) exit;

/**
 * Auto update
 */
final class EnableAutoUpdate {

	/**
	 * Lets exclude these
	 */
    public static function updatelist() {

	    $updatetype = array();
	    $updatetype['core'] = 'core';
	    $updatetype['plugins'] = 'plugins';
	    $updatetype['themes'] = 'themes';
      	return $updatetype;
    }

	/**
	 * Check if update is enabled
	 *
	 * @param string $update to update.
	 * @return bool
	 */
    public static function update( $update = 'themes' ) {
	    if ( in_array( $update, get_option( 'wpeu_enable_auto_updates', array() ), true ) ) {
	        return true;
	    } else {
	        return false;
	    }
    }

	/**
	 * Checkbox
	 *
	 * @param  string $checkboxname [description].
	 * @param  string $upotchecked  [description].
	 * @param  string $upt_style    [description].
	 * @return [type]               [description].
	 */
    public static function checkbox( $checkboxname = 'plugins', $upotchecked = '', $upt_style = 'style=" background-color: #F5F5F5;color: #555555; padding: 8px;"' ) {

        $dashicon_style = 'style="padding: 8px; vertical-align: middle;"';
        $checkbox_style = 'style="margin-right: 8px;"';

        switch ( $checkboxname ) {
	        case 'plugins':
	            $dashicon = 'dashicons-admin-plugins';
	            break;
	      	case 'themes':
	            $dashicon = 'dashicons-admin-appearance';
	            break;
	        case 'core':
	            $dashicon = 'dashicons-wordpress-alt';
	            break;
	        default:
	            break;
        }

		/**
         * Build out the checkboxes.
         */
        $chkbox  = '<div ' . $upt_style . ' id="uptype_wrap" >';
        $chkbox .= '<span ' . $dashicon_style . ' class="wp-menu-image wll-small-admin-dashicons ' . $dashicon . '"></span>';
        $chkbox .= '<input ' . $checkbox_style . ' type="checkbox" name="updatetypes[' . $checkboxname . ']" value="' . $checkboxname . '" ' . $upotchecked . '>';
        $chkbox .= '<label for="' . $checkboxname . '">';
        $chkbox .= ( ucwords( 'WordPress ' . $checkboxname ) );
        $chkbox .= '</label>';
        $chkbox .= '</div>';
        return $chkbox;
    }

    /**
     * Enable the updates
     *
     * @link https://wordpress.org/support/article/configuring-automatic-background-updates/
     * @return void
     */
    public static function enable_updates() {

		/**
	     * Automatic updates for All plugins
	     */
	    if ( self::update( 'plugins' ) ) {
	      	add_filter( 'auto_update_plugin', '__return_true' );
	    }

	    /**
	     * Automatic updates for All themes
	     */
	    if ( self::update( 'themes' ) ) {
	        add_filter( 'auto_update_theme', '__return_true' );
	    }

	    /**
	     *  Core Updates
	     */
	    if ( self::update( 'core' ) ) {
	        add_filter( 'auto_update_core', '__return_true' );
	    }
    }
} // class.
