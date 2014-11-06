<?php
// Boat data
echo $form->dropDownListControlGroup($model, 'body_material', CHtml::listData(Characteristic::model()->findAllByAttributes(array('vehicle_typeid' => $vehicleTypeId, 'characteristic_typeid' => '1')), 'characteristicid', 'characteristic_name'), array('empty' => ''));
echo $form->textFieldControlGroup($model, 'number_of_engines');
echo $form->textFieldControlGroup($model, 'length');
echo $form->textFieldControlGroup($model, 'width');
echo $form->textFieldControlGroup($model, 'height');
?>