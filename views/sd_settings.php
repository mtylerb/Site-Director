<?php
	/**
	 * Variabls are:
	 * $settings -> Array(id, browser_id, browser_def, browser_name, template_name);
	 * $assignments -> Array(id, page_id, parent_id, layout_id, browser_id);
	 */
?>

<div id="sd_settings" class="page">
	<div id="div-sd-settings" title="<?php echo __('Site Director Settings'); ?>">
		<table cellpadding="0" cellspacing="0" border="0">
		<?php //foreach (/* SD LAYOUTS LOOP HERE */): ?>
			<tr>
				<td class="label"><label for="page_layout_id"><?php //echo /* SD TEMPLATE NAME HERE */ ?></label></td>
				<td class="field">
					<select id="page_layout_id" name="sd[mob_layout_id]">
						<option value="0">&#8212; <?php echo __('inherit'); ?> &#8212;</option>
					<?php //foreach ($layouts as $layout): ?>
						<option value="<?php// echo $layout->id; ?>"<?php //echo $layout->id == /* SELECT SWITCH HERE */ ? ' selected="selected"': ''; ?>><?php //echo $layout->name; ?></option>
					<?php// endforeach; ?>
					</select>
				</td>
			</tr>
		<?php //endforeach; ?>
	  </table>
	</div>
</div>