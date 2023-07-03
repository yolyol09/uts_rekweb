<?php

/**
 * @author          Tassos Marinos <info@tassos.gr>
 * @link            http://www.tassos.gr
 * @copyright       Copyright © 2021 Tassos Marinos All Rights Reserved
 * @license         GNU GPLv3 <http://www.gnu.org/licenses/gpl.html> or later
 */

namespace NRFramework\Helpers\Widgets;

defined('_JEXEC') or die;

class MapAddress
{
	/**
	 * Returns the default address details layout.
	 * 
	 * @param   array  $address
	 * @param   array  $showAddressDetails
	 * 
	 * @return  string
	 */
	public static function getDefaultAddressDetailsLayout($address = [], $showAddressDetails = [])
	{
		if (empty($address) || empty($showAddressDetails))
		{
			return;
		}
		
		$html = '';

		$template = '<div class="nrf-mapaddress-field-address-detail-item"><strong>%s</strong>: %s</div>';

		foreach ($showAddressDetails as $key)
		{
			$value = isset($address[$key]) ? $address[$key] : '';

			if (empty($value))
			{
				continue;
			}
			
			$html .= sprintf($template, \JText::_('NR_' . strtoupper($key)), $value);
		}

		return $html;
	}
}