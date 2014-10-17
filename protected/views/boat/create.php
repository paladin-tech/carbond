<?php
/* @var $this BoatController */
/* @var $model Boat */

$this->widget('bootstrap.widgets.TbBreadcrumb', array(
	'links' => array(
		'Boats' => array('index'),
		'Create',
	),
));
?>

<?php
echo TbHtml::pageHeader('New Boat', 'create view');
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
	'modelPhotoArray'                 => $modelPhotoArray,
	'modelService'                    => $modelService,
));
?>