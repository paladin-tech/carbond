<?php
/* @var $this BoatController */
/* @var $model Boat */

$this->widget('bootstrap.widgets.TbBreadcrumb', array(
	'links' => array(
		'Boats' => array('index'),
		$model->model->make->make_name,
	),
));
?>

<?php echo TbHtml::pageHeader($model->model->make->make_name, 'detail view'); ?>

<?php $this->widget('bootstrap.widgets.TbDetailView', array(
	'type'       => array(TbHtml::DETAIL_TYPE_STRIPED),
	'data'       => $model,
	'attributes' => array(
		array(
			'name' => 'picture',
			'type' => 'raw',
			'value'=>  CHtml::image(Yii::app()->request->baseUrl . '/images/vehicle/normal/vehicle-' . $model->vehicleid . '-' . $model->photos[0]->file_name),
		),
		array(
			'name' => 'Make / Model',
			'type' => 'text',
			'value' => $model->model->make->make_name . ' - ' . $model->model->model_name,
		),
		array(
			'name' => 'Production Year',
			'type' => 'text',
			'value' => $model->production_year,
		),
		array(
			'name' => 'KM',
			'type' => 'text',
			'value' => number_format($model->km),
		),
	),
)); ?>
