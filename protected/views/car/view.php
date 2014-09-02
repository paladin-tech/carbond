<?php
/* @var $this CarController */
/* @var $model Car */

$this->breadcrumbs=array(
	'Cars'=>array('index'),
	$model->carid,
);

$this->menu=array(
	array('label'=>'List Car', 'url'=>array('index')),
	array('label'=>'Create Car', 'url'=>array('create')),
	array('label'=>'Update Car', 'url'=>array('update', 'id'=>$model->carid)),
	array('label'=>'Delete Car', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->carid),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Car', 'url'=>array('admin')),
);
?>

<h1>View Car #<?php echo $model->carid; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'carid',
		'vehicleid',
		'carossery_type',
		'no_of_doors',
		'no_of_seats',
		'stearing_wheel_side',
		'enterier',
		'enterier_color',
	),
)); ?>
