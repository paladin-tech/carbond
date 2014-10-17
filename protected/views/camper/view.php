<?php
/* @var $this CamperController */
/* @var $model Camper */

$this->breadcrumbs=array(
	'Campers'=>array('index'),
	$model->camperid,
);

$this->menu=array(
	array('label'=>'List Camper', 'url'=>array('index')),
	array('label'=>'Create Camper', 'url'=>array('create')),
	array('label'=>'Update Camper', 'url'=>array('update', 'id'=>$model->camperid)),
	array('label'=>'Delete Camper', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->camperid),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Camper', 'url'=>array('admin')),
);
?>

<h1>View Camper #<?php echo $model->camperid; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'camperid',
		'vehicleid',
		'max_weight',
		'no_of_doors',
		'no_of_axis',
	),
)); ?>
