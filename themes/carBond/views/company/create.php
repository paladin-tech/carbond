<script>
	$(document).ready(function() {
		$.ajax({
			url: '<?php echo $this->createUrl('site/updateCityDropdown') ?>',
			type: 'POST',
			data: {
				countryId: 33
			}
		})
		.success(function(html) {
			$('#Company_cityid').html(html);
		});
	});
</script>
<div class="row">

	<?php
	$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
		'layout'                 => TbHtml::FORM_LAYOUT_HORIZONTAL,
		'enableAjaxValidation'   => true,
		'enableClientValidation'   => true,
		'htmlOptions'            => array('enctype' => 'multipart/form-data'),
	));
	?>

	<div class="col-md-4 ">
	<?php
		echo TbHtml::dropDownListControlGroup('companyType', '', array('4' => 'Vehicle Distributor', '5' => 'Official Vehicle Distributor', '6' => 'Official Servicer', '7' => 'Unofficial Servicer', '8' => 'Insurance', '13' => 'Leasing', '14' => 'Bank', '15' => 'Agency'), array('label' => 'Company Type', 'empty' => '',));
		echo $form->textFieldControlGroup($modelCompany, 'company_name', array('size' => 60, 'maxlength' => 100));
		echo $form->textFieldControlGroup($modelCompany, 'address', array('size' => 60, 'maxlength' => 254));
		echo TbHtml::dropDownListControlGroup('country', 33, CHtml::listData(Country::model()->findAll(), 'countryid', 'country_name'),
			array(
				'ajax'  => array(
					'type'   => 'POST',
					'url'    => $this->createUrl('site/updateCityDropdown'),
					'update' => '#Company_cityid',
					'data'   => array(
						'countryId' => 'js:this.value'
					),
				),
				'label' => 'Country',
				'empty' => '',
			)
		);
		echo $form->dropDownListControlGroup($modelCompany, 'cityid', array(), array('empty' => ''));
		echo $form->textFieldControlGroup($modelCompany, 'tax_number', array('size' => 45, 'maxlength' => 45));
		echo $form->textFieldControlGroup($modelCompany, 'registration_number', array('size' => 45, 'maxlength' => 45));
		echo $form->textFieldControlGroup($modelCompany, 'contact_person', array('size' => 60, 'maxlength' => 100));
		echo $form->textFieldControlGroup($modelCompany, 'email', array('size' => 60, 'maxlength' => 320));
		echo $form->textFieldControlGroup($modelCompany, 'phone_number', array('size' => 45, 'maxlength' => 45));
		echo $form->textFieldControlGroup($modelCompany, 'web', array('size' => 45, 'maxlength' => 45));
		echo $form->textFieldControlGroup($modelCompany, 'mobile', array('size' => 45, 'maxlength' => 45));
		echo $form->textAreaControlGroup($modelCompany, 'company_description');

		echo TbHtml::formActions(array(
			TbHtml::submitButton('Save', array('color' => TbHtml::BUTTON_COLOR_PRIMARY)),
			TbHtml::linkButton('Cancel', array('url' => Yii::app()->createUrl('user/index'))),
		)); ?>
	</div>

	<?php $this->endWidget(); ?>

</div>