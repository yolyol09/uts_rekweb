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
extract($displayData);

if (empty($images))
{
	return;
}

use NRFramework\Functions;

$value = !empty($value) ? $value : $images[0];
$total_images = count($images);
$images_per_column = ceil($total_images / $columns);
$image_index = 0;
?>
<div class="nr-images-selector <?php echo $class; ?>" style="--max-width: <?php echo $width;?>; --item-height: <?php echo isset($height) && !empty($height) ? $height : 'auto'; ?>;">
	<?php
	if ($required)
	{
		?><input type="hidden" required class="required" id="<?php echo $id; ?>"/><?php
	}

	for ($i = 0; $i < $columns; $i++)
	{
		?><div class="nr-images-selector-row"><?php

		for ($j = 0; $j < $images_per_column; $j++)
		{
			if ($image_index >= $total_images)
			{
				continue;
			}

			$img = $images[$image_index];

			$image_index++;
			
			$id = "nr-images-selector-" . md5(uniqid() . $img);

			$atts = '';

			$isPro = false;
			$class = '';

			if ($pro_items)
			{
				foreach ($pro_items as $item)
				{
					if (!Functions::endsWith($img, $item))
					{
						continue;
					}

					$isPro = true;
					$class = 'is-pro';
					$atts = 'data-pro-only="' . JText::_('NR_THIS_STYLE') . '"';
				}
			}
			
			$item_value = $key_type === 'filename' ? pathinfo($img, PATHINFO_FILENAME) : $img;

			$isChecked = $value == $item_value ? ' checked="checked"' : '';
			?>
			<div class="nr-images-selector-item image<?php echo $class ? ' ' . $class : ''; ?>"<?php echo $atts; ?>>
				<?php if ($isPro): ?>
					<div class="is-pro-overlay"><span><i class="icon-lock"></i><i class="icon-unlock"></i></div>
				<?php endif; ?>
				<input type="radio" id="<?php echo $id; ?>" value="<?php echo !$isPro ? $item_value : ''; ?>" name="<?php echo !$isPro ? $name : ''; ?>"<?php echo $isChecked; ?> />
				<label for="<?php echo $id; ?>">
					<svg class="checkmark" width="20" height="20" viewBox="0 0 20 18" fill="none" xmlns="http://www.w3.org/2000/svg">
						<path d="M8.6 14.6L15.65 7.55L14.25 6.15L8.6 11.8L5.75 8.95L4.35 10.35L8.6 14.6ZM10 20C8.61667 20 7.31667 19.7375 6.1 19.2125C4.88333 18.6875 3.825 17.975 2.925 17.075C2.025 16.175 1.3125 15.1167 0.7875 13.9C0.2625 12.6833 0 11.3833 0 10C0 8.61667 0.2625 7.31667 0.7875 6.1C1.3125 4.88333 2.025 3.825 2.925 2.925C3.825 2.025 4.88333 1.3125 6.1 0.7875C7.31667 0.2625 8.61667 0 10 0C11.3833 0 12.6833 0.2625 13.9 0.7875C15.1167 1.3125 16.175 2.025 17.075 2.925C17.975 3.825 18.6875 4.88333 19.2125 6.1C19.7375 7.31667 20 8.61667 20 10C20 11.3833 19.7375 12.6833 19.2125 13.9C18.6875 15.1167 17.975 16.175 17.075 17.075C16.175 17.975 15.1167 18.6875 13.9 19.2125C12.6833 19.7375 11.3833 20 10 20Z" fill="currentColor"/>
					</svg>
					<img src="<?php echo JURI::root() . $img; ?>" alt="<?php echo $img; ?>" />
				</label>
			</div>
			<?php
		}

		?></div><?php
	}
	?>
</div>