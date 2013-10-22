<?php
if (!defined('EVENT_ESPRESSO_VERSION') )
	exit('NO direct script access allowed');

/**
 * Event Espresso
 *
 * Event Registration and Management Plugin for Wordpress
 *
 * @package		Event Espresso
 * @author		Seth Shoultes
 * @copyright	(c)2009-2012 Event Espresso All Rights Reserved.
 * @license		http://eventespresso.com/support/terms-conditions/  ** see Plugin Licensing **
 * @link		http://www.eventespresso.com
 * @version		4.0
 *
 * ------------------------------------------------------------------------
 *
 * Countries_Help_Tour
 *
 * This is the help tour object for the Registration Overview page
 *
 *
 * @package		Countries_Help_Tour
 * @subpackage	includes/core/admin/general_settings/help_tours/Countries_Help_Tour.class.php
 * @author		Darren Ethier
 *
 * ------------------------------------------------------------------------
 */
class Countries_Help_Tour extends EE_Help_Tour {

	protected function _set_tour_properties() {
		$this->_label = __('Countries Tour', 'event_espresso');
		$this->_slug = 'countries-joyride';
	}


	protected function _set_tour_stops() {
		$this->_stops = array(
			10 => array(
				'content' => $this->_start(),
				),
			20 => array(
				'id' => 'country',
				'content' => $this->_country_selector_stop(),
				'options' => array(
					'tipLocation' => 'right',
					'tipAdjustmentY' => -50,
					'tipAdjustmentX' => 15
					)
				),
			30 => array(
				'id' => 'country-details-dv',
				'content' => $this->_country_details_stop(),
				'options' => array(
					'tipLocation' => 'top',
					'tipAdjustmentY' => -80,
					'tipAdjustmentX' => 0
					)
				),
			40 => array(
				'id' => 'country-states-settings-dv',
				'content' => $this->_country_states_settings_stop(),
				'options' => array(
					'tipLocation' => 'top',
					'tipAdjustmentY' => -20,
					'tipAdjustmentX' => 0
					)
				)
			);
	}


	protected function _start() {
		$content = '<h3>' . __('Welcome to the Countries Settings page!', 'event_espresso') . '</h3>';
		$content .= '<p>' . __('An introduction ...', 'event_espresso') . '</p>';
		return $content;
	}

	

	protected function _country_selector_stop() {
		return '<p>' . __('about setting', 'event_espresso') . '</p>';
	}


	protected function _country_details_stop() {
		return '<p>' . __('about setting', 'event_espresso') . '</p>';
	}


	protected function _country_states_settings_stop() {
		return '<p>' . __('about setting', 'event_espresso') . '</p>';
	}
}