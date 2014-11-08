<div class="row">

	<?php
	$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
		'layout'                 => TbHtml::FORM_LAYOUT_HORIZONTAL,
		'enableAjaxValidation'   => true,
	//	'enableClientValidation'   => true,
		'htmlOptions'            => array('enctype' => 'multipart/form-data'),
	));
	?>

	<div class="col-md-4 ">
	<?php
		echo $form->textFieldControlGroup($modelCompany, 'company_name', array('size' => 60, 'maxlength' => 100));
		echo $form->textFieldControlGroup($modelCompany, 'address', array('size' => 60, 'maxlength' => 254));
		echo $form->textFieldControlGroup($modelCompany, 'city', array('size' => 50, 'maxlength' => 50));
		echo $form->textFieldControlGroup($modelCompany, 'tax_number', array('size' => 45, 'maxlength' => 45));
		echo $form->textFieldControlGroup($modelCompany, 'registration_number', array('size' => 45, 'maxlength' => 45));
		echo $form->textFieldControlGroup($modelCompany, 'contact_person', array('size' => 60, 'maxlength' => 100));
		echo $form->textFieldControlGroup($modelCompany, 'email', array('size' => 60, 'maxlength' => 320));
		echo $form->textFieldControlGroup($modelCompany, 'phone_number', array('size' => 45, 'maxlength' => 45));
	?>
	</div>

	<div class="col-md-4 action-button">
		<?php echo TbHtml::formActions(array(
			TbHtml::submitButton('Create Service Provider', array('color' => TbHtml::BUTTON_COLOR_PRIMARY)),
			TbHtml::linkButton('Cancel', array('url' => Yii::app()->createUrl('user/index'))),
		)); ?>
	</div>

	<?php $this->endWidget(); ?>

</div>