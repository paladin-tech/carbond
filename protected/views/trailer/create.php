<?php
/* @var $this TrailerController */
/* @var $model Trailer */

$this->widget('bootstrap.widgets.TbBreadcrumb', array(
	'links' => array(
		'Trailers' => array('index'),
		'Create',
	),
));
?>

<?php
echo TbHtml::pageHeader('New Trailer', 'create view');
?>

<?php
$this->renderPartial('_form', array(
	'vehicleTypeId'                   => $vehicleTypeId,
	'modelVehicleAdvertisement'       => $modelVehicleAdvertisement,
	'modelPhysicalPerson'             => $modelPhysicalPerson,
	'modelCompany'                    => $modelCompany,
	'modelTrailer'                    => $modelTrailer,
	'modelVehicle'                    => $modelVehicle,
	'modelCharacteristicTypeArray'    => $modelCharacteristicTypeArray,
	'modelVehicleCharacteristicArray' => $modelVehicleCharacteristicArray)
);
?>