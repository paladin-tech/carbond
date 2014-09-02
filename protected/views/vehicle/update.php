<?php
/* @var $this VehicleController */
/* @var $model Vehicle */

$this->breadcrumbs=array(
	'Vehicles'=>array('index'),
	$model->vehicleid=>array('view','id'=>$model->vehicleid),
	'Update',
);

$this->menu=array(
	array('label'=>'List Vehicle', 'url'=>array('index')),
	array('label'=>'Create Vehicle', 'url'=>array('create')),
	array('label'=>'View Vehicle', 'url'=>array('view', 'id'=>$model->vehicleid)),
	array('label'=>'Manage Vehicle', 'url'=>array('admin')),
);
?>

<h1>Update Vehicle <?php echo $model->vehicleid; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>