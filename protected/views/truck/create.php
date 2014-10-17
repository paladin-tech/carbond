<?php
/* @var $this TruckController */
/* @var $model Truck */

$this->widget('bootstrap.widgets.TbBreadcrumb', array(
	'links' => array(
		'Trucks' => array('index'),
		'Create',
	),
));
?>

<?php
echo TbHtml::pageHeader('New Truck', 'create view');
?>

<?php
$this->renderPartial('_form', array(
	'vehicleTypeId'                   => $vehicleTypeId,
	'modelVehicleAdvertisement'       => $modelVehicleAdvertisement,
	'modelPhysicalPerson'             => $modelPhysicalPerson,
	'modelCompany'                    => $modelCompany,
	'modelTruck'                      => $modelTruck,
	'modelVehicle'                    => $modelVehicle,
	'modelCharacteristicTypeArray'    => $modelCharacteristicTypeArray,
	'modelVehicleCharacteristicArray' => $modelVehicleCharacteristicArray)
);
?>