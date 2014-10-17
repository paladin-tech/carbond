<?php
/* @var $this BusController */
/* @var $model Bus */

$this->widget('bootstrap.widgets.TbBreadcrumb', array(
	'links' => array(
		'Buses' => array('index'),
		'Create',
	),
));
?>

<?php
echo TbHtml::pageHeader('New Bus', 'create view');
?>

<?php
$this->renderPartial('_form', array(
	'vehicleTypeId'                   => $vehicleTypeId,
	'modelVehicleAdvertisement'       => $modelVehicleAdvertisement,
	'modelPhysicalPerson'             => $modelPhysicalPerson,
	'modelCompany'                    => $modelCompany,
	'modelBus'                        => $modelBus,
	'modelVehicle'                    => $modelVehicle,
	'modelCharacteristicTypeArray'    => $modelCharacteristicTypeArray,
	'modelVehicleCharacteristicArray' => $modelVehicleCharacteristicArray,
	'modelPhotoArray'                 => $modelPhotoArray,
));
?>