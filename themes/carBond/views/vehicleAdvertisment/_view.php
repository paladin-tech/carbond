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

	echo TbHtml::label('Make', 'make');
	echo TbHtml::dropDownList('make', '', CHtml::listData(VehicleMake::model()->findAll(), 'makeid', 'make_name'),
		array(
			'ajax'  => array(
				'type'   => 'POST',
				'url'    => $this->createUrl('car/updateModelDropdown'),
				'update' => '#model',
				'data'   => array(
					'makeId' => 'js:this.value'
				),
			),
			'label' => 'Make',
			'empty' => '',
		)
	);

	echo TbHtml::label('Model', 'model');
	echo TbHtml::dropDownList('model', '', array(), array('empty' => ''));

	echo TbHtml::label('Fuel', 'fuel');
	echo TbHtml::dropDownList('fuel', '', CHtml::listData(Characteristic::model()->findAllByAttributes(array('vehicle_typeid' => array('0', '2'), 'characteristic_typeid' => '2')), 'characteristicid', 'characteristic_name'), array('empty' => ''));

	echo TbHtml::label('Year From', 'yearFrom');
	echo TbHtml::dropDownList('yearFrom', '', $yearArray, array('span' => 1, 'empty' => ''));
	echo TbHtml::label('Year To', 'yearTo');
	echo TbHtml::dropDownList('yearTo', '', $yearArray, array('span' => 1, 'empty' => ''));

	echo TbHtml::formActions(array(
		TbHtml::submitButton('Search', array('color' => TbHtml::BUTTON_COLOR_PRIMARY)),
	));

	echo TbHtml::endForm();
	?>
</div>

<div style="float: left; width: 80%;">
	<?php
	$this->widget('bootstrap.widgets.TbDetailView', array(
		'type'       => array(TbHtml::DETAIL_TYPE_STRIPED),
		'data'       => $model,
		'attributes' => array(
			'name' => 'vin',
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
			'name' => 'engine_ccm',
			'name' => 'engine_power',
			array(
				'name' => 'Fuel Type',
				'type' => 'text',
				'value' => $model->fuelType->characteristic_name,
			),
			array(
				'name' => 'Engine Emission Type',
				'type' => 'text',
				'value' => ($model->engine_emission_class) ? $model->engineEmissionClass->characteristic_name : '',
			),
			array(
				'name' => 'Color',
				'type' => 'text',
				'value' => ($model->color) ? $model->color0->characteristic_name : '',
			),

		),
	));
	?>
</div>
<div style="clear: both"></div>