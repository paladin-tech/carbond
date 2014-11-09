<script>
	$(document).ready(function() {
		$.ajax({
			url: '<?php echo $this->createUrl('site/updateCityDropdown') ?>',
			type: 'POST',
			data: {
				countryId: $('#country').val()
			}
		})
		.success(function(html) {
			$('#Company_cityid').html(html);
			$('#Company_cityid').val('<?php echo $modelCompany->cityid ?>');
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
		echo $form->textFieldControlGroup($modelCompany, 'company_name', array('size' => 60, 'maxlength' => 100));
		echo $form->textFieldControlGroup($modelCompany, 'address', array('size' => 60, 'maxlength' => 254));
		echo TbHtml::dropDownListControlGroup('country', $modelCompany->city->countryid, CHtml::listData(Country::model()->findAll(), 'countryid', 'country_name'),
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
	?>
		<div class="control-group">
			<label class="control-label" for="Company_company_description">Active</label>
			<div class="controls">
			<?php
			$this->widget('yiiwheels.widgets.switch.WhSwitch', array(
				'model' => $modelUser,
				'attribute' => "active",
				'htmlOptions' => array('label' => 'Active'),
			));
	//		echo $form->checkboxControlGroup($modelUser, 'active');

			echo TbHtml::formActions(array(
				TbHtml::submitButton('Save', array('color' => TbHtml::BUTTON_COLOR_PRIMARY)),
				TbHtml::linkButton('Cancel', array('url' => Yii::app()->createUrl('user/index'))),
			)); ?>
			</div>
		</div>
	</div>

	<?php $this->endWidget(); ?>

</div>