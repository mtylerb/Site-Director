<div id="sd_settings" class="page">
	<div id="div-sd-settings" title="<?php echo __('Site Director Settings'); ?>">
	  <table cellpadding="0" cellspacing="0" border="0">
		<tr>
		  <td class="label"><label for="page_layout_id"><?php echo __('Mobile Layout'); ?></label></td>
		  <td class="field">
			  <select id="page_layout_id" name="page[mob_layout_id]">
				<option value="0">&#8212; <?php echo __('inherit'); ?> &#8212;</option>
			  <?php /*foreach ($layouts as $layout): ?>
				<option value="<?php echo $layout->id; ?>"<?php echo $layout->id == $page->layout_id ? ' selected="selected"': ''; ?>><?php echo $layout->name; ?></option>
			  <?php endforeach; */?>
			</select>
		  </td>
		</tr>
		<tr>
		  <td class="label"><label for="page_layout_id"><?php echo __('iDevice Layout'); ?></label></td>
		  <td class="field">
			  <select id="page_layout_id" name="page[mob_layout_id]">
				<option value="0">&#8212; <?php echo __('inherit'); ?> &#8212;</option>
			  <?php /*foreach ($layouts as $layout): ?>
				<option value="<?php echo $layout->id; ?>"<?php echo $layout->id == $page->layout_id ? ' selected="selected"': ''; ?>><?php echo $layout->name; ?></option>
			  <?php endforeach; */?>
			</select>
		  </td>
		</tr>
	  <tr>
		  <td class="label"><label for="page_layout_id"><?php echo __('Other Layout'); ?></label></td>
		  <td class="field">
			  <select id="page_layout_id" name="page[mob_layout_id]">
				<option value="0">&#8212; <?php echo __('inherit'); ?> &#8212;</option>
			  <?php /*foreach ($layouts as $layout): ?>
				<option value="<?php echo $layout->id; ?>"<?php echo $layout->id == $page->layout_id ? ' selected="selected"': ''; ?>><?php echo $layout->name; ?></option>
			  <?php endforeach; */?>
			</select>
		  </td>
		</tr>
	  </table>
	</div>
</div>