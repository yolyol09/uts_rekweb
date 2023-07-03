<?php

/**
 * @author          Tassos.gr
 * @link            http://www.tassos.gr
 * @copyright       Copyright © 2021 Tassos Marinos All Rights Reserved
 * @license         GNU GPLv3 <http://www.gnu.org/licenses/gpl.html> or later
*/

namespace NRFramework\Conditions\Conditions\Component;

defined('_JEXEC') or die;

class HikashopCartContainsXProducts extends HikashopBase
{
    /**
	 *  Pass check
	 *
	 *  @return  bool
	 */
	public function pass()
	{
		// Get cart products
		if (!$cartProducts = $this->getCartProducts())
		{
			return false;
		}
		
        return $this->passByOperator(count($cartProducts), $this->selection);
    }
}