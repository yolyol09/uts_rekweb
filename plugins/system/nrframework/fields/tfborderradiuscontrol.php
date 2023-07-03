<?php

/**
 * @package         Convert Forms
 * @version         4.1.0 Free
 * 
 * @author          Tassos Marinos <info@tassos.gr>
 * @link            http://www.tassos.gr
 * @copyright       Copyright © 2021 Tassos Marinos All Rights Reserved
 * @license         GNU GPLv3 <http://www.gnu.org/licenses/gpl.html> or later
*/

defined('_JEXEC') or die('Restricted access');

require_once 'tfdimensioncontrol.php';

class JFormFieldTFBorderRadiusControl extends JFormFieldTFDimensionControl
{
    /**
     * Set the dimensions.
     * 
     * @var  array
     */
    protected $dimensions = [
        'top_left' => 'NR_TOP_LEFT',
        'top_right' => 'NR_TOP_RIGHT',
        'bottom_right' => 'NR_BOTTOM_RIGHT',
        'bottom_left' => 'NR_BOTTOM_LEFT'
    ];
}