<?php
$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'layout'                 => TbHtml::FORM_LAYOUT_HORIZONTAL,
	'enableAjaxValidation'   => true,
//	'enableClientValidation'   => true,
	'htmlOptions'            => array('enctype' => 'multipart/form-data'),
));
?>
<fieldset>
	<legend>User Data</legend>
	<?php
	echo $form->checkBoxControlGroup($modelUser, 'active');
	if($modelUserType != '')
	{
	echo $form->textFieldControlGroup($modelUserType, 'first_name');
	echo $form->textFieldControlGroup($modelUserType, 'last_name');
	echo $form->textFieldControlGroup($modelUserType, 'mobile');
	echo $form->textFieldControlGroup($modelUserType, 'email', array('readonly' => true));
	echo TbHtml::dropDownListControlGroup('country', (isset($modelUser->party->physicalPerson->city->countryid)) ? $modelUser->party->physicalPerson->city->countryid : '', CHtml::listData(Country::model()->findAll(), 'countryid', 'country_name'),
		array(
			'ajax'  => array(
				'type'   => 'POST',
				'url'    => $this->createUrl('site/updateCityDropdown'),
				'update' => '#PhysicalPerson_cityid',
				'data'   => array(
					'countryId' => 'js:this.value'
				),
			),
			'label' => 'Country',
			'empty' => '',
		)
	);
	echo $form->dropDownListControlGroup($modelUserType, 'cityid', array(), array('empty' => ''));
	echo $form->textFieldControlGroup($modelUserType, 'district');
	echo $form->textFieldControlGroup($modelUserType, 'zip_code');
	}
	?>
</fieldset>
<div class="col-md-4 action-button">
	<?php echo TbHtml::formActions(array(
		TbHtml::submitButton('Save', array('color' => TbHtml::BUTTON_COLOR_PRIMARY)),
		TbHtml::linkButton('Cancel', array('url' => Yii::app()->createUrl('user/index'))),
	)); ?>
</div>
<?php $this->endWidget(); ?></div>
<script>
$(document).ready(function() {
	$.ajax({
		url: '<?php echo $this->createUrl('site/updateCityDropdown') ?>',
		type: 'POST',
		update: '#PhysicalPerson_cityid',
		data: {
			countryId: $('#country').val()
		}
	})
	.success(function(html) {
		$('#PhysicalPerson_cityid').html(html);
		$('#PhysicalPerson_cityid').val('<?php echo $modelUser->party->physicalPerson->cityid ?>');
	});
});
</script>