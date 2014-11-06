<?php
//require_once (Yii::app()->theme->basePath . '/views/site/_categoryServicingDataSubmenu.php');
?>
<?php
if($searched && !$newModel) {
?>
<script>
	$(document).ready(function() {
		var makeId = '<?php echo $modelVehicle->model->makeid ?>';
		var modelId = '<?php echo $modelVehicle->modelid ?>';
		$('#make').val(makeId);
		$.ajax({
			url: '<?php echo $this->createUrl('car/updateModelDropdown') ?>',
			type: 'POST',
			data: {
				makeId: makeId
			}
		})
		.success(function(html) {
			$('#Vehicle_modelid').html(html);
			$('#Vehicle_modelid').val(modelId);
			$('#fieldsetVehicle input[type=text]').attr('disabled', 'disabled');
			$('#fieldsetVehicle select').attr('disabled', 'disabled');
		});
		$('#Vehicle_vin').change(function() {
			$.ajax({
				url: '<?php echo $this->createUrl('car/updateModelDropdown') ?>',
				type: 'POST',
				data: {
					makeId: $(this).val()
				}
			})
			.success(function(html) {
				$('#Vehicle_modelid').html(html);
			});
		});
	});
</script>
<?php
}
?>
<aside class="col-md-3">
	<?php
	echo TbHtml::beginFormTb();

	echo TbHtml::label('VIN', 'vin');
	echo TbHtml::textField('vin', ($searched) ? '' : '');

	echo TbHtml::formActions(array(
		TbHtml::submitButton('Search', array('color' => TbHtml::BUTTON_COLOR_PRIMARY)),
	));

	echo TbHtml::endForm();
	?>
</aside>

<section class="col-md-9">
	<?php
	$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
		'layout'                 => TbHtml::FORM_LAYOUT_HORIZONTAL,
		'enableAjaxValidation'   => false,
		'htmlOptions'            => array('enctype' => 'multipart/form-data'),
	));
	?>
	<?php
	echo $form->errorSummary($modelVehicle);
	?>
	<fieldset id="fieldsetVehicle">
	<legend>Vehicle Data - <?php echo $vehicleTypeData['vehicleTypeName'] ?></legend>
	<?php
	if(!$searched)
		echo 'Please insert a new vehicle or search for existing using VIN filter.';
	if($searched && $newModel)
		echo 'No vehicle with supplied VIN is found in the database.';

	echo $form->hiddenField($modelVehicle, 'vehicleid');

	// Vehicle data
	echo $form->textFieldControlGroup($modelVehicle, 'vin', array('size' => 45, 'maxlength' => 45));
	echo TbHtml::dropDownListControlGroup('make', '', CHtml::listData(VehicleMake::model()->findAll(), 'makeid', 'make_name'),
		array(
			'ajax'  => array(
				'type'   => 'POST',
				'url'    => $this->createUrl('car/updateModelDropdown'),
				'update' => '#Vehicle_modelid',
				'data'   => array(
					'makeId' => 'js:this.value'
				),
			),
			'label' => 'Make',
			'empty' => '',
		)
	);
	echo $form->dropDownListControlGroup($modelVehicle, 'modelid', array(), array('empty' => ''));
	echo $form->textFieldControlGroup($modelVehicle, 'production_year');
	echo $form->textFieldControlGroup($modelVehicle, 'km');
	echo $form->textFieldControlGroup($modelVehicle, 'engine_ccm');
	echo $form->textFieldControlGroup($modelVehicle, 'engine_power');
	echo $form->dropDownListControlGroup($modelVehicle, 'fuel_typeid', CHtml::listData(Characteristic::model()->findAllByAttributes(array('vehicle_typeid' => array(0, $vehicleTypeId), 'characteristic_typeid' => '2')), 'characteristicid', 'characteristic_name'), array('empty' => ''));
	?>
	</fieldset>
	<?php
	// Servicing data
	require_once (Yii::app()->theme->basePath . '/views/insuranceHouse/_form.php');
	?>

	<fieldset>
		<legend>&nbsp;</legend>
		<?php echo TbHtml::formActions(array(
			TbHtml::submitButton($modelVehicle->isNewRecord ? 'Create' : 'Save', array('color' => TbHtml::BUTTON_COLOR_PRIMARY)),
			TbHtml::linkButton('Cancel', array('url' => Yii::app()->createUrl('car/index'))),
		)); ?>
	</fieldset>

	<?php $this->endWidget(); ?>

	</fieldset>

</section>