<?php
/* @var $this TrailerController */
/* @var $model Trailer */
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
	})
</script>

<?php
$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'layout'                 => TbHtml::FORM_LAYOUT_HORIZONTAL,
	'enableAjaxValidation'   => true,
	'enableClientValidation' => true
));
?>

<fieldset>
	<legend>Trailer Data</legend>
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
	<?php
	// Advertisement data
	echo $form->textAreaControlGroup($modelVehicleAdvertisement, 'description', array('span' => 8, 'rows' => 5));

	// Vehicle data
	require_once (Yii::app()->basePath . '/views/vehicle/_form.php');

	// Trailer data
	echo $form->textFieldControlGroup($model, 'height', array('size' => 7, 'maxlength' => 7));
	echo $form->textFieldControlGroup($model, 'no_of_axis');
	echo $form->textFieldControlGroup($model, 'max_load', array('size' => 7, 'maxlength' => 7));
	echo $form->textFieldControlGroup($model, 'max_weight', array('size' => 7, 'maxlength' => 7));
	?>
</fieldset>

<fieldset>
	<?php
	foreach ($modelCharacteristicTypeArray as $i => $characteristicType) {
		$vehicleCharacteristic = $modelVehicleCharacteristicArray[$i];
		echo $form->dropDownListControlGroup(
			$vehicleCharacteristic,
			"[$i]characteristicid",
			CHtml::listData($characteristicType->characteristics, 'characteristicid', 'characteristic_name'),
			array('label' => $characteristicType->characteristic_type_name, 'empty' => '')
		);
	}
	?>
</fieldset>

<?php echo TbHtml::formActions(array(
	TbHtml::submitButton($modelVehicle->isNewRecord ? 'Create' : 'Save', array('color' => TbHtml::BUTTON_COLOR_PRIMARY)),
	TbHtml::linkButton('Cancel', array('url' => Yii::app()->createUrl('truck/index'))),
)); ?>

<?php $this->endWidget(); ?>