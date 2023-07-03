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

defined('_JEXEC') or die('Restricted access');

extract($displayData);

if (!$class->getSiteKey() || !$class->getSecretKey())
{
	echo JText::_('COM_CONVERTFORMS_FIELD_RECAPTCHA') . ': ' . JText::_('COM_CONVERTFORMS_FIELD_RECAPTCHA_KEYS_NOTE');
	return;
}

$payload = [
	'site_key' => $class->getSiteKey(),
	'badge' => $field->badge
];

$layout = new \JLayoutFile('recaptcha/v2_invisible', __DIR__);
echo $layout->render($payload);