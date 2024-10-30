<?php
/**
 * Brunch WP
 *
 * @package       BRUNCHWP
 * @author        CookUp, Inc.
 * @license       gplv2
 * @version       0.0.5
 *
 * @wordpress-plugin
 * Plugin Name:   Brunch WP
 * Plugin URI:    https://brunch.so
 * Description:   A tiny plugin to add Brunch app links to your recipes.
 * Version:       0.0.5
 * Author:        CookUp, Inc.
 * Text Domain:   brunch-wp
 * Domain Path:   /languages
 * License:       GPLv2
 * License URI:   https://www.gnu.org/licenses/gpl-2.0.html
 *
 * You should have received a copy of the GNU General Public License
 * along with Brunch WP. If not, see <https://www.gnu.org/licenses/gpl-2.0.html/>.
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) exit;

/**
 * HELPER COMMENT START
 * 
 * This file contains the main information about the plugin.
 * It is used to register all components necessary to run the plugin.
 * 
 * The comment above contains all information about the plugin 
 * that are used by WordPress to differenciate the plugin and register it properly.
 * It also contains further PHPDocs parameter for a better documentation
 * 
 * The function BRUNCHWP() is the main function that you will be able to 
 * use throughout your plugin to extend the logic. Further information
 * about that is available within the sub classes.
 * 
 * HELPER COMMENT END
 */

// Plugin name
define( 'BRUNCHWP_NAME',			'Brunch WP' );

// Plugin version
define( 'BRUNCHWP_VERSION',		'0.0.1' );

// Plugin Root File
define( 'BRUNCHWP_PLUGIN_FILE',	__FILE__ );

// Plugin base
define( 'BRUNCHWP_PLUGIN_BASE',	plugin_basename( BRUNCHWP_PLUGIN_FILE ) );

// Plugin Folder Path
define( 'BRUNCHWP_PLUGIN_DIR',	plugin_dir_path( BRUNCHWP_PLUGIN_FILE ) );

// Plugin Folder URL
define( 'BRUNCHWP_PLUGIN_URL',	plugin_dir_url( BRUNCHWP_PLUGIN_FILE ) );

/**
 * Load the main class for the core functionality
 */
require_once BRUNCHWP_PLUGIN_DIR . 'core/class-brunch-wp.php';

/**
 * The main function to load the only instance
 * of our master class.
 *
 * @author  CookUp, Inc.
 * @since   0.0.1
 * @return  object|Brunch_Wp
 */
function BRUNCHWP() {
	return Brunch_Wp::instance();
}

BRUNCHWP();
