<?php
/* @var $this VehicleAdvertismentController */
/* @var $dataProvider CActiveDataProvider */

$this->widget('bootstrap.widgets.TbBreadcrumb', array(
	'links' => array(
		'Create Advertisment - ' . $vehicleTypeName,
	),
));
?>
<div>
	<div style="float: left;"><a href="<?php echo $this->createUrl('create', array('vehicleTypeId' => 1)); ?>">Car</a> :: </div>
	<div style="float: left;"><a href="<?php echo $this->createUrl('create', array('vehicleTypeId' => 2)); ?>">Motorcycle</a> :: </div>
	<div style="float: left;"><a href="<?php echo $this->createUrl('create', array('vehicleTypeId' => 3)); ?>">Agricultural Machinery</a> :: </div>
	<div style="float: left;"><a href="<?php echo $this->createUrl('create', array('vehicleTypeId' => 4)); ?>">Industrial Machinery</a> :: </div>
	<div style="float: left;"><a href="<?php echo $this->createUrl('create', array('vehicleTypeId' => 5)); ?>">Boats</a> :: </div>
	<div style="float: left;"><a href="<?php echo $this->createUrl('create', array('vehicleTypeId' => 6)); ?>">Trucks</a> :: </div>
	<div style="float: left;"><a href="<?php echo $this->createUrl('create', array('vehicleTypeId' => 7)); ?>">Vans</a> :: </div>
	<div style="float: left;"><a href="<?php echo $this->createUrl('create', array('vehicleTypeId' => 8)); ?>">Trailers</a> :: </div>
	<div style="float: left;"><a href="<?php echo $this->createUrl('create', array('vehicleTypeId' => 9)); ?>">Buses</a> :: </div>
	<div style="float: left;"><a href="<?php echo $this->createUrl('create', array('vehicleTypeId' => 10)); ?>">Campers</a></div>
	<div style="clear: both;"></div>
</div>

<?php
echo TbHtml::pageHeader('Vehicle Advertisment - ' . $vehicleTypeName, 'create');
?>

<?php
$this->renderPartial('../' . $vehicleType . '/_form', array(
		'vehicleTypeId'                   => $vehicleTypeId,
		'vehicleType'                     => $vehicleType,
		'vehicleTypeName'                 => $vehicleTypeName,
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