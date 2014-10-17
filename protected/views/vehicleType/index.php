<?php
/* @var $this VehicleTypeController */
/* @var $dataProvider CActiveDataProvider */

$this->widget('bootstrap.widgets.TbBreadcrumb', array(
	'links' => array(
		'Vehicle Types',
	),
));
?>

<h1>Vehicle Types</h1>

<?php echo TbHtml::linkButton('New Vehicle Type', array('color' => TbHtml::BUTTON_COLOR_PRIMARY, 'size' => TbHtml::BUTTON_SIZE_SMALL, 'url' =>  Yii::app()->createUrl('vehicleType/create'))); ?>
<?php $this->widget('bootstrap.widgets.TbGridView', array(
	'dataProvider' => $model->search(),
	'filter'       => $model,
	'type'         => TbHtml::GRID_TYPE_HOVER,
	'template'     => '{summary}{items}{pager}',
	'columns'      => array(
		array(
			'name'        => 'vehicle_typeid',
			'header'      => '#',
			'htmlOptions' => array('color' => 'width: 60px'),
		),
		array(
			'name'   => 'vehicle_type',
			'header' => 'Vehicle Type',
			'type'   => 'raw',
			'value'  => 'CHtml::link($data->vehicle_type, Yii::app()->createUrl("vehicleType/update", array("id" => $data->vehicle_typeid)))',
		),
	),
)); ?>