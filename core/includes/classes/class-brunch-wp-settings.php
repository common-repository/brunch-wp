<?php

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) exit;

/**
 * HELPER COMMENT START
 * 
 * This class contains all of the plugin related settings.
 * Everything that is relevant data and used multiple times throughout 
 * the plugin.
 * 
 * To define the actual values, we recommend adding them as shown above
 * within the __construct() function as a class-wide variable. 
 * This variable is then used by the callable functions down below. 
 * These callable functions can be called everywhere within the plugin 
 * as followed using the get_plugin_name() as an example: 
 * 
 * BRUNCHWP->settings->get_plugin_name();
 * 
 * HELPER COMMENT END
 */

/**
 * Class Brunch_Wp_Settings
 *
 * This class contains all of the plugin settings.
 * Here you can configure the whole plugin data.
 *
 * @package		BRUNCHWP
 * @subpackage	Classes/Brunch_Wp_Settings
 * @author		CookUp, Inc.
 * @since		0.0.1
 */
class Brunch_Wp_Settings{

	/**
	 * The plugin name
	 *
	 * @var		string
	 * @since   0.0.1
	 */
	private $plugin_name;

	/**
	 * Our Brunch_Wp_Settings constructor 
	 * to run the plugin logic.
	 *
	 * @since 0.0.1
	 */
	function __construct(){

		$this->plugin_name = BRUNCHWP_NAME;
	}

	/**
	 * ######################
	 * ###
	 * #### CALLABLE FUNCTIONS
	 * ###
	 * ######################
	 */

	/**
	 * Return the plugin name
	 *
	 * @access	public
	 * @since	0.0.1
	 * @return	string The plugin name
	 */
	public function get_plugin_name(){
		return apply_filters( 'BRUNCHWP/settings/get_plugin_name', $this->plugin_name );
	}
}
