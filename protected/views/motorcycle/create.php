<?php
/* @var $this TruckController */
/* @var $model Truck */

$this->widget('bootstrap.widgets.TbBreadcrumb', array(
	'links' => array(
		'Motorcycles' => array('index'),
		'Create',
	),
));
?>

<?php
echo TbHtml::pageHeader('New Motorcycle', 'create view');
?>

<?php
$this->renderPartial('_form', array(
	'vehicleTypeId'                   => $vehicleTypeId,
	'modelVehicleAdvertisement'       => $modelVehicleAdvertisement,
	'modelPhysicalPerson'             => $modelPhysicalPerson,
	'modelCompany'                    => $modelCompany,
	'modelVehicle'                    => $modelVehicle,
	'modelCharacteristicTypeArray'    => $modelCharacteristicTypeArray,
	'modelVehicleCharacteristicArray' => $modelVehicleCharacteristicArray,
	'modelPhotoArray'                 => $modelPhotoArray,
	'modelService'                    => $modelService,
));
?>