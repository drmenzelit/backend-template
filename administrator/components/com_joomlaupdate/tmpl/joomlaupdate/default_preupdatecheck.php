<?php
/**
 * @package     Joomla.Administrator
 * @subpackage  com_joomlaupdate
 *
 * @copyright   Copyright (C) 2005 - 2019 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

use Joomla\CMS\Language\Text;

/** @var \Joomla\Component\Joomlaupdate\Administrator\View\Joomlaupdate\Html $this */
?>

<h2>
	<?php echo Text::sprintf('COM_JOOMLAUPDATE_VIEW_DEFAULT_COMPATIBILITY_CHECK', '&#x200E;' . $this->updateInfo['latest']); ?>
</h2>

<div class="row-fluid">
	<fieldset class="span6">
		<legend>
			<?php echo Text::_('COM_JOOMLAUPDATE_VIEW_DEFAULT_PREUPDATE_CHECK'); ?>
		</legend>
		<table class="table">
			<tbody>
			<?php foreach ($this->phpOptions as $option) : ?>
				<tr>
					<td>
						<?php echo $option->label; ?>
					</td>
					<td>
							<span class="badge badge-<?php echo $option->state ? 'success' : 'danger'; ?>">
								<?php echo Text::_($option->state ? 'JYES' : 'JNO'); ?>
								<?php if ($option->notice) : ?>
									<span class="icon-info icon-white hasTooltip" title="<?php echo $option->notice; ?>"></span>
								<?php endif; ?>
							</span>
					</td>
				</tr>
			<?php endforeach; ?>
			</tbody>
		</table>
	</fieldset>

	<fieldset class="span6">
		<legend>
			<?php echo Text::_('COM_JOOMLAUPDATE_VIEW_DEFAULT_RECOMMENDED_SETTINGS'); ?>
		</legend>
		<p>
			<?php echo Text::_('COM_JOOMLAUPDATE_VIEW_DEFAULT_RECOMMENDED_SETTINGS_DESC'); ?>
		</p>

		<table class="table">
			<thead>
			<tr>
				<td>
					<?php echo Text::_('COM_JOOMLAUPDATE_VIEW_DEFAULT_DIRECTIVE'); ?>
				</td>
				<td>
					<?php echo Text::_('COM_JOOMLAUPDATE_VIEW_DEFAULT_RECOMMENDED'); ?>
				</td>
				<td>
					<?php echo Text::_('COM_JOOMLAUPDATE_VIEW_DEFAULT_ACTUAL'); ?>
				</td>
			</tr>
			</thead>
			<tbody>
			<?php foreach ($this->phpSettings as $setting) : ?>
				<tr>
					<td>
						<?php echo $setting->label; ?>
					</td>
					<td>
						<?php echo Text::_($setting->recommended ? 'JON' : 'JOFF'); ?>
					</td>
					<td>
							<span class="badge badge-<?php echo ($setting->state === $setting->recommended) ? 'success' : 'warning'; ?>">
								<?php echo Text::_($setting->state ? 'JON' : 'JOFF'); ?>
							</span>
					</td>
				</tr>
			<?php endforeach; ?>
			</tbody>
		</table>
	</fieldset>
</div>

<div class="row-fluid">
	<fieldset class="span6">
		<legend>
			<?php echo Text::_('COM_JOOMLAUPDATE_VIEW_DEFAULT_EXTENSIONS'); ?>
		</legend>

		<table class="table">
			<thead>
			<tr>
				<td>
					<?php echo Text::_('COM_JOOMLAUPDATE_VIEW_DEFAULT_EXTENSION_NAME'); ?>
				</td>
				<td>
					<?php echo Text::_('COM_JOOMLAUPDATE_VIEW_DEFAULT_EXTENSION_COMPATIBLE'); ?>
				</td>
				<td>
					<?php echo Text::_('COM_JOOMLAUPDATE_VIEW_DEFAULT_EXTENSION_INSTALLED_VERSION'); ?>
				</td>
			</tr>
			</thead>
			<tbody>
			<?php foreach ($this->nonCoreExtensions as $extension) : ?>
				<tr>
					<td>
						<?php echo Text::_($extension->name); ?>
					</td>
					<td class="extension-check"
					    data-extension-id="<?php echo $extension->extension_id; ?>"
					    data-extension-current-version="<?php echo $extension->version; ?>" dir="ltr">
						<img src="../media/system/images/mootree_loader.gif" />
					</td>
					<td>
						<?php echo '&#x200E;' . $extension->version; ?>
					</td>
				</tr>
			<?php endforeach; ?>
			</tbody>
		</table>
	</fieldset>
</div>

<p><?php echo Text::_('COM_JOOMLAUPDATE_VIEW_DEFAULT_DESCRIPTION_BREAK'); ?></p>
<p><?php echo Text::_('COM_JOOMLAUPDATE_VIEW_DEFAULT_DESCRIPTION_MISSING_TAG'); ?></p>
<p><?php echo Text::_('COM_JOOMLAUPDATE_VIEW_DEFAULT_DESCRIPTION_UPDATE_REQUIRED'); ?></p>
