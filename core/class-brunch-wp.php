<?php

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) exit;

/**
 * HELPER COMMENT START
 * 
 * This is the main class that is responsible for registering
 * the core functions, including the files and setting up all features. 
 * 
 * To add a new class, here's what you need to do: 
 * 1. Add your new class within the following folder: core/includes/classes
 * 2. Create a new variable you want to assign the class to (as e.g. public $helpers)
 * 3. Assign the class within the instance() function ( as e.g. self::$instance->helpers = new Brunch_Wp_Helpers();)
 * 4. Register the class you added to core/includes/classes within the includes() function
 * 
 * HELPER COMMENT END
 */

if ( ! class_exists( 'Brunch_Wp' ) ) :

	/**
	 * Main Brunch_Wp Class.
	 *
	 * @package		BRUNCHWP
	 * @subpackage	Classes/Brunch_Wp
	 * @since		0.0.1
	 * @author		CookUp, Inc.
	 */
	final class Brunch_Wp {

		/**
		 * The real instance
		 *
		 * @access	private
		 * @since	0.0.1
		 * @var		object|Brunch_Wp
		 */
		private static $instance;

		/**
		 * BRUNCHWP helpers object.
		 *
		 * @access	public
		 * @since	0.0.1
		 * @var		object|Brunch_Wp_Helpers
		 */
		public $helpers;

		/**
		 * BRUNCHWP settings object.
		 *
		 * @access	public
		 * @since	0.0.1
		 * @var		object|Brunch_Wp_Settings
		 */
		public $settings;

		/**
		 * Throw error on object clone.
		 *
		 * Cloning instances of the class is forbidden.
		 *
		 * @access	public
		 * @since	0.0.1
		 * @return	void
		 */
		public function __clone() {
			_doing_it_wrong( __FUNCTION__, __( 'You are not allowed to clone this class.', 'brunch-wp' ), '0.0.1' );
		}

		/**
		 * Disable unserializing of the class.
		 *
		 * @access	public
		 * @since	0.0.1
		 * @return	void
		 */
		public function __wakeup() {
			_doing_it_wrong( __FUNCTION__, __( 'You are not allowed to unserialize this class.', 'brunch-wp' ), '0.0.1' );
		}

		/**
		 * Main Brunch_Wp Instance.
		 *
		 * Insures that only one instance of Brunch_Wp exists in memory at any one
		 * time. Also prevents needing to define globals all over the place.
		 *
		 * @access		public
		 * @since		0.0.1
		 * @static
		 * @return		object|Brunch_Wp	The one true Brunch_Wp
		 */
		public static function instance() {
			if ( ! isset( self::$instance ) && ! ( self::$instance instanceof Brunch_Wp ) ) {
				self::$instance					= new Brunch_Wp;
				self::$instance->base_hooks();
				self::$instance->includes();
				self::$instance->helpers		= new Brunch_Wp_Helpers();
				self::$instance->settings		= new Brunch_Wp_Settings();

				//Fire the plugin logic
				new Brunch_Wp_Run();

				/**
				 * Fire a custom action to allow dependencies
				 * after the successful plugin setup
				 */
				do_action( 'BRUNCHWP/plugin_loaded' );
			}

			return self::$instance;
		}

		/**
		 * Include required files.
		 *
		 * @access  private
		 * @since   0.0.1
		 * @return  void
		 */
		private function includes() {
			require_once BRUNCHWP_PLUGIN_DIR . 'core/includes/classes/class-brunch-wp-helpers.php';
			require_once BRUNCHWP_PLUGIN_DIR . 'core/includes/classes/class-brunch-wp-settings.php';

			require_once BRUNCHWP_PLUGIN_DIR . 'core/includes/classes/class-brunch-wp-run.php';
		}

		/**
		 * Add base hooks for the core functionality
		 *
		 * @access  private
		 * @since   0.0.1
		 * @return  void
		 */
		private function base_hooks() {
			add_action( 'plugins_loaded', array( self::$instance, 'load_textdomain' ) );
		}

		/**
		 * Loads the plugin language files.
		 *
		 * @access  public
		 * @since   0.0.1
		 * @return  void
		 */
		public function load_textdomain() {
			load_plugin_textdomain( 'brunch-wp', FALSE, dirname( plugin_basename( BRUNCHWP_PLUGIN_FILE ) ) . '/languages/' );
		}

	}

endif; // End if class_exists check.