<?php
/* @var $this VehicleController */
/* @var $dataProvider CActiveDataProvider */

$yearArray = array();
for($year = date('Y'); $year >= 1950; $year--)
{
	$yearArray[$year] = $year;
}

$this->widget('bootstrap.widgets.TbBreadcrumb', array(
	'links' => array(
		'Vehicle Details',
	),
));

echo TbHtml::pageHeader('Advertisement', 'detail view');
?>

<!--<div style="float: left; width: 20%;">-->
<!--	--><?php
//	echo TbHtml::beginFormTb();
//
//	echo TbHtml::label('Make', 'make');
//	echo TbHtml::dropDownList('make', '', CHtml::listData(VehicleMake::model()->findAll(), 'makeid', 'make_name'),
//		array(
//			'ajax'  => array(
//				'type'   => 'POST',
//				'url'    => $this->createUrl('car/updateModelDropdown'),
//				'update' => '#model',
//				'data'   => array(
//					'makeId' => 'js:this.value'
//				),
//			),
//			'label' => 'Make',
//			'empty' => '',
//		)
//	);
//
//	echo TbHtml::label('Model', 'model');
//	echo TbHtml::dropDownList('model', '', array(), array('empty' => ''));
//
//	echo TbHtml::label('Fuel', 'fuel');
//	echo TbHtml::dropDownList('fuel', '', CHtml::listData(Characteristic::model()->findAllByAttributes(array('vehicle_typeid' => array('0', '2'), 'characteristic_typeid' => '2')), 'characteristicid', 'characteristic_name'), array('empty' => ''));
//
//	echo TbHtml::label('Year From', 'yearFrom');
//	echo TbHtml::dropDownList('yearFrom', '', $yearArray, array('span' => 1, 'empty' => ''));
//	echo TbHtml::label('Year To', 'yearTo');
//	echo TbHtml::dropDownList('yearTo', '', $yearArray, array('span' => 1, 'empty' => ''));
//
//	echo TbHtml::formActions(array(
//		TbHtml::submitButton('Search', array('color' => TbHtml::BUTTON_COLOR_PRIMARY)),
//	));
//
//	echo TbHtml::endForm();
//	?>
<!--</div>-->

<!--<div style="float: left; width: 80%;">-->
<div>
	<?php
	$this->widget('bootstrap.widgets.TbDetailView', array(
		'type'       => array(TbHtml::DETAIL_TYPE_STRIPED),
		'data'       => $model,
		'attributes' => array(
			array(
				'type' => 'raw',
				'value' => html_entity_decode(CHtml::image(Yii::app()->request->baseUrl . '/images/vehicle/normal/vehicle-' . $model->vehicle_advertismentid . '.jpg', 'alt')),
			),
			array(
				'name' => 'vin',
				'value' => $model->vehicle->vin,
			),
			array(
				'name' => 'Make / Model',
				'type' => 'text',
				'value' => $model->vehicle->model->make->make_name . ' - ' . $model->vehicle->model->model_name,
			),
			array(
				'name' => 'Production Year',
				'type' => 'text',
				'value' => $model->vehicle->production_year,
			),
			array(
				'name' => 'KM',
				'type' => 'text',
				'value' => number_format($model->vehicle->km),
			),
			array(
				'name' => 'engine_ccm',
				'value' => $model->vehicle->engine_ccm,
			),
			array(
				'name' => 'engine_power',
				'value' => $model->vehicle->engine_power,
			),
			array(
				'name' => 'first_registration',
				'value' => $model->vehicle->first_registration,
			),
			array(
				'name' => 'variant',
				'value' => $model->vehicle->variant,
			),
			array(
				'name' => 'registered',
				'value' => ($model->vehicle->registered) ? 'Yes' : 'No',
			),
			array(
				'name' => 'registration_valid_to',
				'value' => date('d.m.Y.', strtotime($model->vehicle->registration_valid_to)),
			),
			array(
				'name' => 'vehicle_origin',
				'value' => ($model->vehicle->vehicleOrigin) ? $model->vehicle->vehicleOrigin->characteristic_name : '',
			),
			array(
				'name' => 'gear_type',
				'value' => ($model->vehicle->gearType) ? $model->vehicle->gearType->characteristic_name : '',
			),
			array(
				'name' => 'damages',
				'value' => ($model->vehicle->damages) ? 'Yes' : 'No',
			),
			array(
				'name' => 'Fuel Type',
				'type' => 'text',
				'value' => $model->vehicle->fuelType->characteristic_name,
			),
			array(
				'name' => 'Engine Emission Type',
				'type' => 'text',
				'value' => ($model->vehicle->engine_emission_class) ? $model->vehicle->engineEmissionClass->characteristic_name : '',
			),
			array(
				'name' => 'Color',
				'type' => 'text',
				'value' => ($model->vehicle->color) ? $model->vehicle->color0->characteristic_name : '',
			),
		),
	));
	?>
	<h4>Servicing Data</h4>
	<?php
	$this->widget('bootstrap.widgets.TbListView', array(
		'dataProvider' => $servicingData,
		'itemView'     => '/servicingData/_servicingDataItem',
	));
	?>

</div>
<div style="clear: both"></div>