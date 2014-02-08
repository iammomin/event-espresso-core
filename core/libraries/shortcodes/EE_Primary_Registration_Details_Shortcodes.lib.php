<?php

if (!defined('EVENT_ESPRESSO_VERSION') )
	exit('NO direct script access allowed');

/**
 * Event Espresso
 *
 * Event Registration and Management Plugin for WordPress
 *
 * @ package			Event Espresso
 * @ author				Seth Shoultes
 * @ copyright		(c) 2008-2011 Event Espresso  All Rights Reserved.
 * @ license			http://eventespresso.com/support/terms-conditions/   * see Plugin Licensing *
 * @ link				http://www.eventespresso.com
 * @ version		 	4.0
 *
 * ------------------------------------------------------------------------
 *
 * EE_Primary_Registration_Details_Shortcodes
 * 
 * this is a child class for the EE_Shortcodes library.  The EE_Primary_Registration_Details_Shortcodes lists all shortcodes related to primary registration specific info. This only parses for Primary Registrants.
 *
 * NOTE: if a method doesn't have any phpdoc commenting the details can be found in the comments in EE_Shortcodes parent class.
 * 
 * @package		Event Espresso
 * @subpackage	libraries/shortcodes/EE_Primary_Registration_Details_Shortcodes.lib.php
 * @author		Darren Ethier
 *
 * ------------------------------------------------------------------------
 */
class EE_Primary_Registration_Details_Shortcodes extends EE_Shortcodes {

	public function __construct() {
		parent::__construct();
	}


	protected function _init_props() {
		$this->label = __('Primary_Registration Details Shortcodes', 'event_espresso');
		$this->description = __('All shortcodes specific primary registrant data', 'event_espresso');
		$this->_shortcodes = array(
			'[PRIMARY_REGISTRANT_FNAME]' => __('Parses to the first name of the primary registration for the transaction.', 'event_espresso'),
			'[PRIMARY_REGISTRANT_LNAME]' => __('Parses to the last name of the primary registration for the transaction.', 'event_espresso'),
			'[PRIMARY_REGISTRANT_EMAIL]' => __('Parses to the email address of the primary registration for the transaction.', 'event_espresso'),
			'[PRIMARY_REGISTRANT_REGISTRATION_CODE]' => __('Parses to the registration code of the primary registrant for the transaction.', 'event_espresso'),
			);
	}



	protected function _parser( $shortcode ) {

		//make sure we end up with a copy of the EE_Messages_Addressee object
		$primary_registration = $this->_data instanceof EE_Messages_Addressee ? $this->_data : NULL;
		$primary_registration = ! $primary_registration instanceof EE_Messages_Addressee && isset( $this->_data['data'] ) && $this->_data['data'] instanceof EE_Messages_Addressee ? $this->_data['data'] : $primary_registration;
		$primary_registration = ! $primary_registration instanceof EE_Messages_Addressee && !empty( $this->_extra_dataa['data'] ) && $this->_extra_data['data'] instanceof EE_Messages_Addressee ? $this->_extra_data['data'] : $primary_registration;

		if ( ! $primary_registration instanceof EE_Messages_Addressee )
			return '';

		$attendee = $primary_registration->primary_att_obj;
		if ( ! $attendee instanceof EE_Attendee )
			return '';

		switch ( $shortcode ) {
			case '[PRIMARY_REGISTRANT_FNAME]' :
				return $attendee->fname();
				break;

			case '[PRIMARY_REGISTRANT_LNAME]' :
				return $attendee->lname();
				break;

			case '[PRIMARY_REGISTRANT_EMAIL]' :
				return $attendee->email();
				break;

			case '[PRIMARY_REGISTRANT_REGISTRATION_CODE]' :
				if ( ! $primary_registration->primary_reg_obj instanceof EE_Registration )
					return '';
				return $primary_registration->primary_reg_obj->reg_code();
				break;

			default : 
				return '';
				break;
		}

		return '';
	}

	
} // end EE_Registration_Shortcodes class