<?php
/* @var $this VehicleMakeController */
/* @var $dataProvider CActiveDataProvider */

$this->widget('bootstrap.widgets.TbBreadcrumb', array(
	'links' => array(
		'Vehicle Types',
	),
));
?>

<h1>Vehicle Makes</h1>

<?php echo TbHtml::linkButton('New Vehicle Make', array('color' => TbHtml::BUTTON_COLOR_PRIMARY, 'size' => TbHtml::BUTTON_SIZE_SMALL, 'url' =>  Yii::app()->createUrl('vehicleMake/create'))); ?>
<?php $this->widget('bootstrap.widgets.TbGridView', array(
	'dataProvider' => $model->search(),
	'filter'       => $model,
	'type'         => TbHtml::GRID_TYPE_HOVER,
	'template'     => '{summary}{items}{pager}',
	'columns'      => array(
		array(
			'name'        => 'makeid',
			'header'      => '#',
			'htmlOptions' => array('color' => 'width: 60px'),
		),
		array(
			'name'   => 'make_name',
			'header' => 'Vehicle Make Name',
			'type'   => 'raw',
			'value'  => 'CHtml::link($data->make_name, Yii::app()->createUrl("vehicleMake/update", array("id" => $data->makeid)))',
		),
	),
)); ?>