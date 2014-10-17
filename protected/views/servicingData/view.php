<?php
/* @var $this ServicingDataController */
/* @var $model ServicingData */

$this->breadcrumbs=array(
	'Servicing Datas'=>array('index'),
	$model->servicing_dataid,
);

$this->menu=array(
	array('label'=>'List ServicingData', 'url'=>array('index')),
	array('label'=>'Create ServicingData', 'url'=>array('create')),
	array('label'=>'Update ServicingData', 'url'=>array('update', 'id'=>$model->servicing_dataid)),
	array('label'=>'Delete ServicingData', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->servicing_dataid),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage ServicingData', 'url'=>array('admin')),
);
?>

<h1>View ServicingData #<?php echo $model->servicing_dataid; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'servicing_dataid',
		'vehicleid',
		'serviceid',
		'service_name',
		'description',
		'data_provider',
		'servicing_date',
		'service_type',
		'mileage',
	),
)); ?>
