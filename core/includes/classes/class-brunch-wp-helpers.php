<?php

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) exit;

/**
 * Class Brunch_Wp_Helpers
 *
 * This class contains repetitive functions that
 * are used globally within the plugin.
 *
 * @package		BRUNCHWP
 * @subpackage	Classes/Brunch_Wp_Helpers
 * @author		CookUp, Inc.
 * @since		0.0.1
 */
class Brunch_Wp_Helpers{

	/**
	 * ######################
	 * ###
	 * #### CALLABLE FUNCTIONS
	 * ###
	 * ######################
	 */

	/**
	 * HELPER COMMENT START
	 *
	 * Within this class, you can define common functions that you are 
	 * going to use throughout the whole plugin. 
	 * 
	 * Down below you will find a demo function called output_text()
	 * To access this function from any other class, you can call it as followed:
	 * 
	 * BRUNCHWP()->helpers->output_text( 'my text' );
	 * 
	 */
	 
	/**
	 * Output some text
	 *
	 * @param	string	$text	The text to output
	 * @since	0.0.1
	 *
	 * @return	void
	 */
	 public function output_text( $text = '' ){
		 echo esc_html($text);
	 }

	 /**
	  * HELPER COMMENT END
	  */

}
