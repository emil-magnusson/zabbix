<script type="text/x-jquery-tmpl" id="tag-row">
	<?= (new CRow([
		(new CTextBox('tags[#{rowNum}][tag]'))
			->setAttribute('placeholder', _('tag'))
			->setWidth(ZBX_TEXTAREA_FILTER_SMALL_WIDTH),
		(new CRadioButtonList('tags[#{rowNum}][operator]', TAG_OPERATOR_LIKE))
			->addValue(_('Like'), TAG_OPERATOR_LIKE)
			->addValue(_('Equal'), TAG_OPERATOR_EQUAL)
			->setModern(true),
		(new CTextBox('tags[#{rowNum}][value]'))
			->setAttribute('placeholder', _('value'))
			->setWidth(ZBX_TEXTAREA_FILTER_SMALL_WIDTH),
		(new CCol(
			(new CButton('tags[#{rowNum}][remove]', _('Remove')))
				->addClass(ZBX_STYLE_BTN_LINK)
				->addClass('element-table-remove')
		))->addClass(ZBX_STYLE_NOWRAP)
	]))
		->addClass('form_row')
		->toString()
	?>
</script>
<script type="text/javascript">
	jQuery(function($) {
		$(function() {
			$('#maintenance_type').change(function() {
				var $maintenance_type = $('input[name=maintenance_type]:checked', $(this)).val();
				if ($maintenance_type == <?= MAINTENANCE_TYPE_NODATA ?>) {
					$('#tags input, #tags button').prop('disabled', true);
					$('#tags input[name$="[tag]"], #tags input[name$="[value]"]').prop('placeholder', '');
				}
				else {
					$('#tags input, #tags button').prop('disabled', false);
					$('#tags input[name$="[tag]"]').prop('placeholder', '<?= _('tag') ?>');
					$('#tags input[name$="[value]"]').prop('placeholder', '<?= _('value') ?>');
				}
			});

			$('#tags').dynamicRows({
				template: '#tag-row'
			});
		});
	});
</script>
