<?php
/* @var $this CarController */
/* @var $model Car */

$this->widget('bootstrap.widgets.TbBreadcrumb', array(
	'links' => array(
		'Cars' => array('index'),
		'Create',
	),
));
?>

<?php
echo TbHtml::pageHeader('New Car', 'create view');
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