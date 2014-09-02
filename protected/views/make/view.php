<?php
/* @var $this MakeController */
/* @var $model Make */

$this->breadcrumbs=array(
	'Makes'=>array('index'),
	$model->makeid,
);

$this->menu=array(
	array('label'=>'List Make', 'url'=>array('index')),
	array('label'=>'Create Make', 'url'=>array('create')),
	array('label'=>'Update Make', 'url'=>array('update', 'id'=>$model->makeid)),
	array('label'=>'Delete Make', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->makeid),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Make', 'url'=>array('admin')),
);
?>

<h1>View Make #<?php echo $model->makeid; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'makeid',
		'make_name',
	),
)); ?>
