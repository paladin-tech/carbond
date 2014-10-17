<?php
/* @var $this CamperController */
/* @var $model Camper */
/* @var $form CActiveForm */
?>

<script>
$(document).ready(function () {
	$('input[name=optionsPhysicalCompany]').change(function () {
		if ($(this).val() == 'physical') {
			$('#physicalPerson').show();
			$('#company').hide();
		} else {
			$('#physicalPerson').hide();
			$('#company').show();
		}
	})
});
</script>

<?php
$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'layout'                 => TbHtml::FORM_LAYOUT_HORIZONTAL,
	'enableAjaxValidation'   => false,
	'action'                 => $this->createUrl('camper/create'),
	'htmlOptions'            => array('enctype' => 'multipart/form-data'),
));
?>

<?php
echo $form->errorSummary(array($modelPhysicalPerson, $modelCompany, $modelVehicleAdvertisement, $modelVehicle));
?>

<fieldset>
	<legend>Owner Data</legend>
	<div>
		<?php
		echo TbHtml::radioButtonList('optionsPhysicalCompany', 'physical', array(
			'physical' => 'Physical Person',
			'company'  => 'Company',
		));
		?>
	</div>
	<div id="physicalPerson">
		<?php
		// Physical Person data
		require_once (Yii::app()->basePath . '/views/physicalPerson/_form.php');
		?>
	</div>
	<div id="company" style="display: none">
		<?php
		// Company data
		require_once (Yii::app()->basePath . '/views/company/_form.php');
		?>
	</div>
</fieldset>

	<?php

	// Vehicle Advertisement data
	require_once (Yii::app()->basePath . '/views/vehicleAdvertisment/_form.php');

	// Vehicle data
	require_once (Yii::app()->basePath . '/views/vehicle/_form.php');

	// Camper data
	echo $form->textFieldControlGroup($model, 'max_weight', array('size' => 7, 'maxlength' => 7));
	echo $form->textFieldControlGroup($model, 'no_of_doors');
	echo $form->textFieldControlGroup($model, 'no_of_axis');

	// Photos
	require_once (Yii::app()->basePath . '/views/photo/_form.php');

	// Servicing data
	require_once (Yii::app()->basePath . '/views/servicingData/_form.php');

	?>
</fieldset>

<?php echo TbHtml::formActions(array(
	TbHtml::submitButton($modelVehicle->isNewRecord ? 'Create' : 'Save', array('color' => TbHtml::BUTTON_COLOR_PRIMARY)),
	TbHtml::linkButton('Cancel', array('url' => Yii::app()->createUrl('camper/index'))),
)); ?>

<?php $this->endWidget(); ?>