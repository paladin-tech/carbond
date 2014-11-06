<?php
// Car data
echo $form->dropDownListControlGroup($model, 'carossery_type', CHtml::listData(Characteristic::model()->findAllByAttributes(array('vehicle_typeid' => array(0, $vehicleTypeId), 'characteristic_typeid' => '15')), 'characteristicid', 'characteristic_name'), array('empty' => ''));
echo $form->dropDownListControlGroup($model, 'no_of_doors', array('1', '2', '3', '4', '5', '6'));
echo $form->dropDownListControlGroup($model, 'no_of_seats', array('1', '2', '3', '4', '5', '6', '7', '8'));
echo $form->textFieldControlGroup($model, 'stearing_wheel_side');
echo $form->dropDownListControlGroup($model, 'enterier', CHtml::listData(Characteristic::model()->findAllByAttributes(array('vehicle_typeid' => array(0, $vehicleTypeId), 'characteristic_typeid' => '8')), 'characteristicid', 'characteristic_name'), array('empty' => ''));
echo $form->dropDownListControlGroup($model, 'transmission_type', CHtml::listData(Characteristic::model()->findAllByAttributes(array('vehicle_typeid' => array(0, $vehicleTypeId), 'characteristic_typeid' => '4')), 'characteristicid', 'characteristic_name'), array('empty' => ''));
echo $form->dropDownListControlGroup($model, 'enterier_color', CHtml::listData(Characteristic::model()->findAllByAttributes(array('vehicle_typeid' => array(0, $vehicleTypeId), 'characteristic_typeid' => '9')), 'characteristicid', 'characteristic_name'), array('empty' => ''));
echo $form->dropDownListControlGroup($model, 'climate_control', CHtml::listData(Characteristic::model()->findAllByAttributes(array('vehicle_typeid' => array(0, $vehicleTypeId), 'characteristic_typeid' => '6')), 'characteristicid', 'characteristic_name'), array('empty' => ''));
?>