<?php
/* @var $this VehiclePropertyController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Vehicle Properties',
);

$this->menu=array(
	array('label'=>'Create VehicleProperty', 'url'=>array('create')),
	array('label'=>'Manage VehicleProperty', 'url'=>array('admin')),
);
?>

<h1>Vehicle Properties</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
