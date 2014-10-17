<?php
/* @var $this VehicleModelController */
/* @var $dataProvider CActiveDataProvider */

$this->widget('bootstrap.widgets.TbBreadcrumb', array(
	'links' => array(
		'Vehicle Models',
	),
));
?>

<h1>Vehicle Models</h1>

<?php echo TbHtml::linkButton('New Vehicle Model', array('color' => TbHtml::BUTTON_COLOR_PRIMARY, 'size' => TbHtml::BUTTON_SIZE_SMALL, 'url' => Yii::app()->createUrl('vehicleModel/create'))); ?>
<?php $this->widget('bootstrap.widgets.TbGridView', array(
	'dataProvider' => $model->search(),
	'filter'       => $model,
	'type'         => TbHtml::GRID_TYPE_HOVER,
	'template'     => '{summary}{items}{pager}',
	'columns'      => array(
		array(
			'name'        => 'modelid',
			'header'      => '#',
			'htmlOptions' => array('color' => 'width: 60px'),
		),
		array(
			'name'   => 'model_name',
			'header' => 'Model',
			'type'   => 'raw',
			'value'  => 'CHtml::link($data->model_name, Yii::app()->createUrl("vehicleModel/update", array("id" => $data->modelid)))',
		),
		array(
			'name'   => 'makeSearch',
			'header' => 'Make',
			'type'   => 'raw',
			'value'  => '$data->make->make_name',
		),
	),
)); ?>
