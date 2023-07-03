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

?>
		
<div class="fmItem" data-key="<?php echo $loadData['key']; ?>">
	<?php 
		echo $header; 

		foreach ($form->getFieldsets() as $fieldset)
		{ 
			// Skip fieldset is has no fields
			if (!$form->getFieldset($fieldset->name))
			{
				continue;
			}

			$label = $fieldset->name == 'basic' ? 'FIELD_' . $fieldTypeName : 'FIELDSETTINGS_' . $fieldset->name;
		?>
		<h3>
			<span><?php echo JText::_('COM_CONVERTFORMS_' . $label); ?></span>
			<?php if ($fieldset->name == 'basic') { ?>
				<small>(ID: <?php echo $loadData['key']; ?>)</small>

				<ul class="cf-menu">
					<li class="cf-menu-parent">
						<a href="#" class="cf-icon-dots cf-menu-item" data-bs-toggle="dropdown" data-toggle="dropdown"></a>
						<ul class="<?php echo defined('nrJ4') ? 'dropdown-menu' : '' ?>">
							<li>
								<a href="#" class="copyField"><?php echo JText::_('COM_CONVERTFORMS_FIELDS_COPY') ?></a>
							</li>
							<li>
								<a href="#" class="removeField" data-focusnext="true"><?php echo JText::_('COM_CONVERTFORMS_FIELDS_DELETE') ?></a>
							</li>
						</ul>
					</li>
				</ul>
			<?php } ?>
		</h3>

		<div class="fmItemForm">
			<?php echo $form->renderFieldset($fieldset->name); ?>
		</div>
	<?php } ?>
</div>