<?php
/* @var $this TruckController */
/* @var $model Truck */

$this->breadcrumbs=array(
	'Trucks'=>array('index'),
	$model->truckid=>array('view','id'=>$model->truckid),
	'Update',
);

$this->menu=array(
	array('label'=>'List Truck', 'url'=>array('index')),
	array('label'=>'Create Truck', 'url'=>array('create')),
	array('label'=>'View Truck', 'url'=>array('view', 'id'=>$model->truckid)),
	array('label'=>'Manage Truck', 'url'=>array('admin')),
);
?>

<h1>Update Truck <?php echo $model->truckid; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>