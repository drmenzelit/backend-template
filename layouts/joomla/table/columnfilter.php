<?php
/**
 * @package     Joomla.Site
 * @subpackage  Layout
 *
 * @copyright   Copyright (C) 2005 - 2018 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('JPATH_BASE') or die;

/** @var Table $table */
$columns = $displayData['columns'];
$id = $displayData['id'];
$name = $displayData['name'];
$user = JFactory::getUser();
$document = JFactory::getDocument();
$selected = $user->getParam('joomla.table.' . $name);
if (is_null($selected))
{
	$selected = array_column($columns, 'name');
}

$css = [];
foreach ($columns as $i => $column)
{
	if (!in_array($column['name'], $selected))
	{
		$css[] = '#' . $id . ' tr > *:nth-child(' . ($i + 1) . ')';
	}
}

$document->addStyleDeclaration(implode(',', $css) . '{width:0; display: none !important;}');
?>
<div class="dropdown pull-right">
	<a class="dropdown-toggle" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
		<span class="fa fa-filter" title="Filter"></span>
	</a>
	<div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">

			<div class="form-group">
				<?php foreach ($columns as $column) : ?>
				<?php if (!isset($column['title'])) continue; ?>
				<div class="form-check">
					<input type="checkbox" class="form-check-input" id="dropdownCheck" <?php echo in_array($column['name'], $selected) ? 'checked ' : '';?><?php echo isset($column['protected']) ? 'disabled' : ''; ?>>
					<label class="form-check-label" for="dropdownCheck">
						<?php echo $column['title']; ?>
					</label>
				</div>
				<?php endforeach; ?>
			</div>

	</div>
</div>
