<?php
/* @var $this VehicleController */
/* @var $dataProvider CActiveDataProvider */

$this->widget('bootstrap.widgets.TbBreadcrumb', array(
	'links' => array(
		'Agricultural Machinery',
	),
));

echo TbHtml::pageHeader('Search Vehicles by VIN', 'detail view');
?>

<div style="float: left; width: 20%;">
	<?php
	echo TbHtml::beginFormTb();

	echo TbHtml::label('VIN', 'vin');
	echo TbHtml::textField('vin', '');

	echo TbHtml::formActions(array(
		TbHtml::submitButton('Search', array('color' => TbHtml::BUTTON_COLOR_PRIMARY)),
	));

	echo TbHtml::endForm();
	?>
</div>

<div style="float: left; width: 80%;">
<?php
//$this->widget('bootstrap.widgets.TbDetailView', array(
//	'type'       => array(TbHtml::DETAIL_TYPE_STRIPED),
//	'data'       => $model,
//	'attributes' => array(
//		array(
//			'name' => 'picture',
//			'type' => 'raw',
//			'value'=>  (sizeof($model->photos ) > 0) ? CHtml::image(Yii::app()->request->baseUrl . '/images/vehicle/normal/vehicle-' . $model->vehicleid . '-' . $model->photos[0]->file_name) : '',
//		),
//		array(
//			'name' => 'Make / Model',
//			'type' => 'text',
//			'value' => $model->model->make->make_name . ' - ' . $model->model->model_name,
//		),
//		array(
//			'name' => 'Production Year',
//			'type' => 'text',
//			'value' => $model->production_year,
//		),
//		array(
//			'name' => 'KM',
//			'type' => 'text',
//			'value' => number_format($model->km),
//		),
//	),
//));
//?>
</div>
<div style="clear: both"></div>