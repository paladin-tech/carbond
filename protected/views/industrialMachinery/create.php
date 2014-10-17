<?php
/* @var $this TruckController */
/* @var $model Truck */

$this->widget('bootstrap.widgets.TbBreadcrumb', array(
	'links' => array(
		'Industrial Machinery' => array('index'),
		'Create',
	),
));
?>

<?php
echo TbHtml::pageHeader('New Industrial Machinery', 'create view');
?>

<?php
$this->renderPartial('_form', array(
	'vehicleTypeId'                   => $vehicleTypeId,
	'modelVehicleAdvertisement'       => $modelVehicleAdvertisement,
	'modelPhysicalPerson'             => $modelPhysicalPerson,
	'modelCompany'                    => $modelCompany,
	'modelVehicle'                    => $modelVehicle,
	'modelCharacteristicTypeArray'    => $modelCharacteristicTypeArray,
	'modelVehicleCharacteristicArray' => $modelVehicleCharacteristicArray)
);
?>