<?php
/* @var $this TrailerController */
/* @var $model Trailer */

$this->breadcrumbs=array(
	'Trailers'=>array('index'),
	$model->trailerid,
);

$this->menu=array(
	array('label'=>'List Trailer', 'url'=>array('index')),
	array('label'=>'Create Trailer', 'url'=>array('create')),
	array('label'=>'Update Trailer', 'url'=>array('update', 'id'=>$model->trailerid)),
	array('label'=>'Delete Trailer', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->trailerid),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Trailer', 'url'=>array('admin')),
);
?>

<h1>View Trailer #<?php echo $model->trailerid; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'trailerid',
		'vehicleid',
		'height',
		'no_of_axis',
		'max_load',
		'max_weight',
	),
)); ?>
