<?php
/**
 * Page for showing the child theme creation form. (In the Theme > Child Theme submenu.)
 *
 * @author terry chay <tychay@php.net>
 */

?>
<div class="wrap">
	<h2><?php esc_html_e( sprintf( __('%s is already a child theme', self::_SLUG), $current_theme->Name ) ); ?></h2>
<?php
if ( $child_needs_repair ) :
?>
	<h3><?php esc_html_e('Child theme needs repair', self::_SLUG) ?></h3>
	<div class="copy"><?php esc_html_e( 'Detected outdated child theme mechanism. Click the button below to attempt a one-click repair.', self::_SLUG ); ?></div>
	<form action="admin-post.php" method="post" id="repair_child_form">
		<input type="hidden" name="action" value="<?php echo $this->_repairChildFormId; ?>" />
		<?php wp_nonce_field($this->_repairChildFormId.'-verify'); ?>
		<p class="submit">
			<input type="submit" class="button button-primary" value="<?php esc_html_e( 'Repair Child Theme', self::_SLUG ); ?>" />
		</p>
	</form>
<?php
endif;
if ( !empty($template_files) ) :
?>
	<h3><?php esc_html_e('Child files',self::_SLUG) ?></h3>
	<div class="copy"><?php esc_html_e( 'If you wish to modify the behavior of a template file, select it and click the "Copy Template" button below.', self::_SLUG ); ?></div>
	<form action="admin-post.php" method="post" id="copy_template_file_form">
		<input type="hidden" name="action" value="<?php echo $this->_copyTemplateFormId; ?>" />
		<?php wp_nonce_field($this->_copyTemplateFormId.'-verify'); ?>
		<table class="form-table">
			<tr>
				<th scope="row"><label for="copy_template_file_name"><?php esc_html_e( 'Template File', self::_SLUG ); ?></label></th>
				<td><select name="filename" id="copy_template_file_name">
<?php
	foreach ($template_files as $filename) :
?>
					<option value="<?php esc_attr_e($filename); ?>"><?php esc_html_e($filename) ?></option>
<?php
	endforeach;
?>
				</select></td>
			</tr>
		</table>
		<p class="submit">
			<input type="submit" class="button button-primary" value="<?php esc_attr_e( 'Copy Template', self::_SLUG ); ?>" />
		</p>
	</form>
<?php
endif;
?>
	<h3><?php esc_html_e('Grandchild theme?',self::_SLUG) ?></h3>
	<div class="copy"><?php esc_html_e( 'WordPress has no formal support for theme grandchildren. No other actions currently supported in One Click Child Theme.', self::_SLUG ); ?></div>
</div>
