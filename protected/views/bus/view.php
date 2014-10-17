<?php
/* @var $this BusController */
/* @var $model Bus */

$this->breadcrumbs=array(
	'Buses'=>array('index'),
	$model->busid,
);

$this->menu=array(
	array('label'=>'List Bus', 'url'=>array('index')),
	array('label'=>'Create Bus', 'url'=>array('create')),
	array('label'=>'Update Bus', 'url'=>array('update', 'id'=>$model->busid)),
	array('label'=>'Delete Bus', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->busid),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Bus', 'url'=>array('admin')),
);
?>

<h1>View Bus #<?php echo $model->busid; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'busid',
		'no_of_seats',
		'no_of_doors',
		'vehicleid',
	),
)); ?>
