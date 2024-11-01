<?php
/**
 * @wordpress-plugin
 * Plugin Name:       WP Auto Updates
 * Plugin URI:        https://wpbrisko.com/wordpress-plugins/
 * Description:       Enable Automatic Updates for WordPress Core Plugins and Themes.
 * Version:           0.6.5
 * Requires at least: 4.6
 * Requires PHP:      5.6
 * Author:            wpbrisko.com
 * Author URI:        https://wpbrisko.com
 * Text Domain:       wp-auto-updates
 * Domain Path:       languages
 * License:           GPLv2
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 *
 *
 * License: GNU General Public License
 * GPLv2 Full license details in license.txt
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program.  If not, see <https://www.gnu.org/licenses/>.
 */

	// deny direct access.
	if ( ! defined( 'WPINC' ) ) {
	    die;
	}

  	// plugin directory.
	define( 'WPAU_VERSION', '0.5.1' );

  	// plugin directory.
    define( 'WPAU_DIR', dirname( __FILE__ ) );

	// plugin url.
	define( 'WPAU_URL', plugins_url( '/', __FILE__ ) );
// -----------------------------------------------------------------------------

	/**
 	 * Load admin page class via composer
	 */
 	require_once 'vendor/autoload.php';

	/**
	 * Setup options on activation
	 *
	 * Turned off updates by defualt.
	 */
  	register_activation_hook( __FILE__, function () {

	    update_option( 'wpeu_enable_auto_updates', array() );
  		}
	);

	/**
	 * Load the admin page.
	 */
  	WPAutoUpdates\Admin\AutoUpdatesAdmin::init();

  	// check for the options.
  	if ( get_option( 'wpeu_enable_auto_updates', false ) ) {

		// Enable the updates.
	    WPAutoUpdates\EnableAutoUpdate::enable_updates();
  	}
