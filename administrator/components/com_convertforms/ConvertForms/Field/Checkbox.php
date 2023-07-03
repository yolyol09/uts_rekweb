<?php

/**
 * @package         Convert Forms
 * @version         4.1.0 Free
 * 
 * @author          Tassos Marinos <info@tassos.gr>
 * @link            http://www.tassos.gr
 * @copyright       Copyright © 2020 Tassos Marinos All Rights Reserved
 * @license         GNU GPLv3 <http://www.gnu.org/licenses/gpl.html> or later
*/

namespace ConvertForms\Field;

defined('_JEXEC') or die('Restricted access');

class Checkbox extends \ConvertForms\FieldChoice
{
	/**
	 * Indicates whether it accepts multiple values
	 *
	 * @var bool
	 */
	protected $multiple = true;

	/**
	 *  Remove common fields from the form rendering
	 *
	 *  @var  mixed
	 */
	protected $excludeFields = array(
		'placeholder',
		'browserautocomplete',
		'size',
	);
}

?>