<?php
/* @var $this ServicingDataController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Servicing Datas',
);

$this->menu=array(
	array('label'=>'Create ServicingData', 'url'=>array('create')),
	array('label'=>'Manage ServicingData', 'url'=>array('admin')),
);
?>

<h1>Servicing Datas</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
