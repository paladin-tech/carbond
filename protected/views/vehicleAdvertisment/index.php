<?php
/* @var $this VehicleAdvertismentController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Vehicle Advertisments',
);

$this->menu=array(
	array('label'=>'Create VehicleAdvertisment', 'url'=>array('create')),
	array('label'=>'Manage VehicleAdvertisment', 'url'=>array('admin')),
);
?>

<h1>Vehicle Advertisments</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
