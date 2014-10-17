<?php
/* @var $this CamperController */
/* @var $model Camper */

$this->widget('bootstrap.widgets.TbBreadcrumb', array(
	'links' => array(
		'Campers' => array('index'),
		'Create',
	),
));
?>

<?php
echo TbHtml::pageHeader('New Camper', 'create view');
?>

<?php
$this->renderPartial('_form', array(
	'vehicleTypeId'                   => $vehicleTypeId,
	'modelVehicleAdvertisement'       => $modelVehicleAdvertisement,
	'modelPhysicalPerson'             => $modelPhysicalPerson,
	'modelCompany'                    => $modelCompany,
	'model'                           => $model,
	'modelVehicle'                    => $modelVehicle,
	'modelCharacteristicTypeArray'    => $modelCharacteristicTypeArray,
	'modelVehicleCharacteristicArray' => $modelVehicleCharacteristicArray,
	'modelService'                    => $modelService,
));
?>