<fieldset>
	<legend>Vehicle Data</legend>
	<?php
	echo $form->textFieldControlGroup($modelVehicle, 'vin', array('size' => 45, 'maxlength' => 45));
	echo $form->textFieldControlGroup($modelVehicle, 'engine_number', array('size' => 45, 'maxlength' => 45));
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
	echo $form->dropDownListControlGroup($modelVehicle, 'production_year', Helper::getYearsArray(), array('span' => 1, 'empty' => ''));
//	echo $form->textFieldControlGroup($modelVehicle, 'first_registration');
	?>
	<div class="control-group">
	<?php
	echo $form->labelEx($modelVehicle, 'first_registration', array('class' => 'control-label'));
	?>
		<div class="controls">
		<?php
		$this->widget('zii.widgets.jui.CJuiDatePicker', array(
	// 'name'=>'birthdate',
			'id' => 'Vehicle_first_registration',
			'name'    => 'Vehicle[first_registration]', // the name of the field
			'value'   => $modelVehicle->first_registration, // pre-fill the value
			// additional javascript options for the date picker plugin
			'options' => array(
				'showAnim'   => 'fold',
				'dateFormat' => 'yy-mm-dd', // optional Date formatting
				'debug'      => true,
			)
		));
		?>
		</div>
	</div>
	<?php
	echo $form->textFieldControlGroup($modelVehicle, 'variant');
	echo $form->textFieldControlGroup($modelVehicle, 'km');
	echo $form->textFieldControlGroup($modelVehicle, 'engine_ccm');
	echo $form->textFieldControlGroup($modelVehicle, 'engine_power');
	echo $form->dropDownListControlGroup($modelVehicle, 'fuel_typeid', CHtml::listData(Characteristic::model()->findAllByAttributes(array('vehicle_typeid' => array(0, $vehicleTypeId), 'characteristic_typeid' => '2')), 'characteristicid', 'characteristic_name'), array('empty' => ''));
	echo $form->dropDownListControlGroup($modelVehicle, 'engine_emission_class', CHtml::listData(Characteristic::model()->findAllByAttributes(array('vehicle_typeid' => array(0, $vehicleTypeId), 'characteristic_typeid' => '3')), 'characteristicid', 'characteristic_name'), array('empty' => ''));
	echo $form->dropDownListControlGroup($modelVehicle, 'gear_type', CHtml::listData(Characteristic::model()->findAllByAttributes(array('vehicle_typeid' => array(0, $vehicleTypeId), 'characteristic_typeid' => '7')), 'characteristicid', 'characteristic_name'), array('empty' => ''));
	echo $form->dropDownListControlGroup($modelVehicle, 'color', CHtml::listData(Characteristic::model()->findAllByAttributes(array('vehicle_typeid' => array(0, $vehicleTypeId), 'characteristic_typeid' => '5')), 'characteristicid', 'characteristic_name'), array('empty' => ''));
	echo $form->radioButtonListControlGroup($modelVehicle, 'registered', array(
		'0' => 'No',
		'1' => 'Yes',
	));
	?>
	<div class="control-group">
	<?php
	echo $form->labelEx($modelVehicle, 'registration_valid_to', array('class' => 'control-label'));
	?>
		<div class="controls">
			<?php
			$this->widget('zii.widgets.jui.CJuiDatePicker', array(
				// 'name'=>'birthdate',
				'name'    => 'registration_valid_to', // the name of the field
				'value'   => $modelVehicle->registration_valid_to, // pre-fill the value
				// additional javascript options for the date picker plugin
				'options' => array(
					'showAnim'   => 'fold',
					'dateFormat' => 'yy-mm-dd', // optional Date formatting
					'debug'      => true,
				)
			));
			?>
		</div>
	</div>
	<?php
	echo $form->dropDownListControlGroup($modelVehicle, 'vehicle_origin', CHtml::listData(Characteristic::model()->findAllByAttributes(array('vehicle_typeid' => array(0, $vehicleTypeId), 'characteristic_typeid' => '10')), 'characteristicid', 'characteristic_name'), array('empty' => ''));
	echo $form->dropDownListControlGroup($modelVehicle, 'damages', CHtml::listData(Characteristic::model()->findAllByAttributes(array('vehicle_typeid' => array(0, $vehicleTypeId), 'characteristic_typeid' => '11')), 'characteristicid', 'characteristic_name'), array('empty' => ''));


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
<script>
	$(document).ready(function() {
		$('#Vehicle_production_year').change(function() {
			$('#Vehicle_first_registration').val($(this).val() + '-01-01');
		});
	});
</script>