<?php
/* @var $this CarController */
/* @var $dataProvider CActiveDataProvider */

$yearArray = array();
for($year = date('Y'); $year >= 1950; $year--)
{
	$yearArray[$year] = $year;
}

$this->widget('bootstrap.widgets.TbBreadcrumb', array(
	'links' => array(
		'Cars',
	),
));
?>

<div>
	<div style="float: left;"><a href="<?php echo $this->createUrl('car/index'); ?>">Car</a> :: </div>
	<div style="float: left;"><a href="<?php echo $this->createUrl('motorcycle/index'); ?>">Motorcycle</a> :: </div>
	<div style="float: left;"><a href="<?php echo $this->createUrl('agriculturalMachinery/index'); ?>">Agricultural Machinery</a> :: </div>
	<div style="float: left;"><a href="<?php echo $this->createUrl('industrialMachinery/index'); ?>">Industrial Machinery</a> :: </div>
	<div style="float: left;"><a href="<?php echo $this->createUrl('boat/index'); ?>">Boats</a> :: </div>
	<div style="float: left;"><a href="<?php echo $this->createUrl('truck/index'); ?>">Trucks</a> :: </div>
	<div style="float: left;"><a href="<?php echo $this->createUrl('van/index'); ?>">Vans</a> :: </div>
	<div style="float: left;"><a href="<?php echo $this->createUrl('trailer/index'); ?>">Trailers</a> :: </div>
	<div style="float: left;"><a href="<?php echo $this->createUrl('bus/index'); ?>">Buses</a> :: </div>
	<div style="float: left;"><a href="<?php echo $this->createUrl('camper/index'); ?>">Campers</a></div>
	<div style="clear: both;"></div>
</div>

<?php
echo TbHtml::pageHeader('Cars', 'list view');
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
	echo TbHtml::dropDownList('fuel', '', CHtml::listData(Characteristic::model()->findAllByAttributes(array('vehicle_typeid' => array('0', '1'), 'characteristic_typeid' => '2')), 'characteristicid', 'characteristic_name'), array('empty' => ''));

	echo TbHtml::label('Year From', 'year_from');
	echo TbHtml::dropDownList('year_from', '', $yearArray, array('span' => 1, 'empty' => ''));
	echo TbHtml::label('Year To', 'year_to');
	echo TbHtml::dropDownList('year_to', '', $yearArray, array('span' => 1, 'empty' => ''));

	echo TbHtml::formActions(array(
		TbHtml::submitButton('Search', array('color' => TbHtml::BUTTON_COLOR_PRIMARY)),
	));

	echo TbHtml::endForm();
	?>
</div>
<div style="float: left; width: 80%;">
	<?php
	if(!Yii::app()->user->isGuest)
	{
		echo TbHtml::linkButton('New Car', array(
			'color' => TbHtml::BUTTON_COLOR_PRIMARY,
			'size'  => TbHtml::BUTTON_SIZE_SMALL,
			'url'   => Yii::app()->createUrl('car/create')
		));
	}

	$this->widget('bootstrap.widgets.TbListView', array(
		'dataProvider' => $dataProvider,
		'itemView'     => '_carItem',
	));
	?>
</div>
<div style="clear: both"></div>