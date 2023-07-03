<?php
/**
 * @package Helix Ultimate Framework
 * @author JoomShaper https://www.joomshaper.com
 * @copyright Copyright (c) 2010 - 2018 JoomShaper
 * @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or Later
*/

defined ('JPATH_BASE') or die();

use Joomla\CMS\Filesystem\File;
use Joomla\CMS\Layout\LayoutHelper;
use Joomla\CMS\Router\Route;
use Joomla\Component\Content\Site\Helper\RouteHelper;
use Joomla\CMS\Uri\Uri;

$params = $displayData->params;
$attribs = json_decode($displayData->attribs);

$template = HelixUltimate\Framework\Platform\Helper::loadTemplateData();
$tplParams = $template->params;

$image_transition       = ( $tplParams->get('image_transition') ) ? ' uk-transition-' . $tplParams->get('image_transition') . ' uk-transition-opaque' : '';
$image_transition_init = $image_transition ? 'uk-inline-clip uk-transition-toggle' : '';

$leading = (isset($displayData->leading) && $displayData->leading) ? 1 : 0;

if($leading)
{
	$blog_list_image = $tplParams->get('leading_blog_list_image', 'large');
}
else
{
	$blog_list_image = $tplParams->get('blog_list_image', 'thumbnail');
}

$intro_image = '';
if(isset($attribs->helix_ultimate_image) && $attribs->helix_ultimate_image != '')
{
	if($blog_list_image == 'default')
	{
		$intro_image = $attribs->helix_ultimate_image;
	}
	else
	{
		$intro_image = $attribs->helix_ultimate_image;
		$basename = basename($intro_image);
		$list_image = JPATH_ROOT . '/' . dirname($intro_image) . '/' . File::stripExt($basename) . '_'. $blog_list_image .'.' . File::getExt($basename);
		if(File::exists($list_image)) {
			$intro_image = Uri::root(true) . '/' . dirname($intro_image) . '/' . File::stripExt($basename) . '_'. $blog_list_image .'.' . File::getExt($basename);
		}
	}
}

?>

<?php if($intro_image) : ?>

	<?php if ($params->get('link_titles') && $params->get('access-view')) : ?>
		<a href="<?php echo Route::_(ContentHelperRoute::getArticleRoute($displayData->slug, $displayData->catid, $displayData->language)); ?>">
		<?php if($image_transition) : ?>
			<div class="<?php echo $image_transition_init; ?>">
		<?php endif; ?>
	<?php endif; ?>		
		<img<?php if ($params->get('link_titles') && $params->get('access-view') && $image_transition) : ?><?php echo ' class="el-image'. $image_transition .'"'; ?><?php endif; ?> src="<?php echo $intro_image; ?>" alt="<?php echo htmlspecialchars($displayData->title, ENT_COMPAT, 'UTF-8'); ?>">	
	<?php if ($params->get('link_titles') && $params->get('access-view')) : ?>
		<?php if($image_transition) : ?>
			</div>
		<?php endif; ?>
		</a>
	<?php endif; ?>

<?php else: ?>

<?php if(JVERSION >= 4) : ?>

<?php 
$images  = json_decode($displayData->images);

if (empty($images->image_intro))
{
	return;
}
$imgclass   = empty($images->float_intro) ? $params->get('float_intro') : $images->float_intro;
$layoutAttr = [
	'src' => $images->image_intro,
	'alt' => empty($images->image_intro_alt) && empty($images->image_intro_alt_empty) ? false : $images->image_intro_alt,
	'class' => (($params->get('link_intro_image') && ($params->get('access-view') || $params->get('show_noauth', '0') == '1')) && $tplParams->get('image_transition')) ? 'el-image'. $image_transition : 'el-image',
];
?>

<?php if ($params->get('link_intro_image') && ($params->get('access-view') || $params->get('show_noauth', '0') == '1')) : ?>
	<a class="<?php echo $this->escape($imgclass); ?>" href="<?php echo Route::_(RouteHelper::getArticleRoute($displayData->slug, $displayData->catid, $displayData->language)); ?>" itemprop="url" title="<?php echo $this->escape($displayData->title); ?>">

		<?php if($image_transition) : ?>
			<div class="<?php echo $image_transition_init; ?>">
		<?php endif; ?>

		<?php echo LayoutHelper::render('joomla.html.image', array_merge($layoutAttr, ['itemprop' => 'thumbnailUrl'])); ?>
		
		<?php if($image_transition) : ?>
			</div>
		<?php endif; ?>

	</a>
<?php else : ?>
	<div class="<?php echo $this->escape($imgclass); ?> item-image">
		<?php echo LayoutHelper::render('joomla.html.image', array_merge($layoutAttr, ['itemprop' => 'thumbnail'])); ?>
	</div>
<?php endif; ?>

<?php else: ?>

<?php $images = json_decode($displayData->images); ?>
<?php if (isset($images->image_intro) && !empty($images->image_intro)) : ?>
	<?php $imgfloat = empty($images->float_intro) ? $params->get('float_intro') : $images->float_intro; ?>
		<?php if ($params->get('link_titles') && $params->get('access-view')) : ?>
			<a href="<?php echo Route::_(ContentHelperRoute::getArticleRoute($displayData->slug, $displayData->catid, $displayData->language)); ?>">
			<?php if($image_transition) : ?>
			<div class="<?php echo $image_transition_init; ?>">
			<?php endif; ?>
			<img
				<?php if ($images->image_intro_caption) : ?>
					<?php echo 'class="caption'. $image_transition .'"' . ' title="' . htmlspecialchars($images->image_intro_caption) . '"'; ?>
				<?php elseif($image_transition): ?>
				<?php echo 'class="el-image'. $image_transition .'"'; ?>
				<?php endif; ?>
				src="<?php echo htmlspecialchars($images->image_intro, ENT_COMPAT, 'UTF-8'); ?>" alt="<?php echo htmlspecialchars($images->image_intro_alt, ENT_COMPAT, 'UTF-8'); ?>" itemprop="thumbnailUrl"/>
				<?php if($image_transition) : ?>
				</div>
				<?php endif; ?>
				</a>
			<?php else : ?><img
				<?php if ($images->image_intro_caption) : ?>
					<?php echo 'class="caption'. $image_transition .'"' . ' title="' . htmlspecialchars($images->image_intro_caption, ENT_COMPAT, 'UTF-8') . '"'; ?>
				<?php elseif($image_transition): ?>
				<?php echo 'class="el-image'. $image_transition .'"'; ?>
				<?php endif; ?>
				src="<?php echo htmlspecialchars($images->image_intro, ENT_COMPAT, 'UTF-8'); ?>" alt="<?php echo htmlspecialchars($images->image_intro_alt, ENT_COMPAT, 'UTF-8'); ?>" itemprop="thumbnailUrl"/>
			<?php endif; ?>
	<?php endif; ?>	

<?php endif; ?>

<?php endif; ?>