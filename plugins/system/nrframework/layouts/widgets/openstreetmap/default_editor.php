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

defined('_JEXEC') or die;

extract($displayData);

$options = isset($options) ? $options : $displayData;

if ($load_css_vars)
{
	JFactory::getDocument()->addStyleDeclaration('
		.nrf-widget.openstreetmap.' . $id . ' {
			--width: ' . $options['width'] . ';
			--height: ' . $options['height'] . ';
		}
	');
}
?>
<div class="nrf-widget openstreetmap nr-lazyload-item nr-address-component<?php echo $options['css_class']; ?>">
	<div class="inner">
		<div class="osm_map_item" data-options="<?php echo htmlspecialchars(json_encode($options)); ?>"></div>
		<?php if ($options['showMarkerTooltip']): ?>
			<div class="marker-tooltip" style="display:none;"><div class="tooltip-body"><?php echo nl2br($options['markerTooltipValue']); ?></div><div class="arrow"></div></div>
		<?php endif; ?>
		<div class="field-settings">
			<?php if ($options['showCoordsInput']): ?>
				<div class="control-group stack map-coordinates-setting">
					<label class="control-label" for="<?php echo $options['id']; ?>_coords_input"><?php echo JText::_('NR_OSM_COORDINATES_LABEL'); ?></label>
					<div class="controls coords-wrapper">
						<input type="text" id="<?php echo $options['id']; ?>_coords_input" name="<?php echo $options['name']; ?>[coordinates]" value="<?php echo $options['value']; ?>" class="address-input nr_address_coords form-control"<?php echo ($options['readonly'] || $options['disabled']) ? ' readonly' : ''; ?> />
						<a href="#" class="map_reset_btn<?php echo ($options['readonly'] || $options['disabled']) ? ' disabled' : ''; ?>" title="<?php echo JText::_('NR_OSM_CLEAR_BUTTON_TITLE'); ?>"><?php echo JText::_('NR_CLEAR'); ?></a>
					</div>
				</div>
			<?php else: ?>
				<input type="hidden" name="<?php echo $options['name']; ?>[coordinates]" class="nr_address_coords" value="<?php echo $options['value']; ?>"<?php echo ($options['readonly'] || $options['disabled']) ? ' readonly' : ''; ?> />
			<?php endif; ?>
			
			<?php if ($options['showMarkerTooltipInput']): ?>
				<div class="control-group stack">
					<label class="control-label" for="<?php echo $options['id']; ?>_tooltip_label"><?php echo JText::_('NR_OSM_TOOLTIP_LABEL'); ?></label>
					<div class="controls">
						<textarea id="<?php echo $options['id']; ?>_tooltip_label"
							class="address-input form-control"
							rows="3"
							name="<?php echo $options['name']; ?>[tooltip]"
							<?php if ($options['readonly'] || $options['disabled']): ?>
								readonly
							<?php endif; ?>
							placeholder="<?php echo JText::_('NR_OSM_TOOLTIP_LABEL_HINT'); ?>"><?php echo $options['markerTooltipValue']; ?></textarea>
					</div>
				</div>
			<?php endif; ?>
		</div>
	</div>
</div>