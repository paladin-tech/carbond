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
	echo $form->textFieldControlGroup($modelVehicle, 'production_year');
	echo $form->textFieldControlGroup($modelVehicle, 'first_registration');
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
	echo $form->textFieldControlGroup($modelVehicle, 'registration_valid_to');
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