<?php
/* @var $this TruckController */
/* @var $dataProvider CActiveDataProvider */

$yearArray = array();
for($year = date('Y'); $year >= 1950; $year--)
{
	$yearArray[$year] = $year;
}

require_once (Yii::app()->theme->basePath . '/views/site/_categorySearchSubmenu.php');

echo TbHtml::pageHeader($vehicleTypeName, 'list view');
?>
<aside class="col-md-3">
	<form action="#" method="post" class="niceform">
		<p><input type="checkbox" name="option1" value="0" checked="true"/>
			<span>Sortiraj po rastucim cenama</span>
			<br/>
			<input type="checkbox" name="option2"/>
			<span>Sortiraj po opadajucim cenama</span></p>		
		
	</form>
	<?php
	echo TbHtml::beginFormTb();
	
	echo '
	<div class="collapsible">
	<fieldset>
	<legend>Make</legend>
	<div class="group_info">';
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
	echo '</div></fieldset></div>';
	echo '
	<div class="collapsible">
	<fieldset>
	<legend>Model</legend>
	<div class="group_info">';
	echo TbHtml::label('Model', 'model');
	echo TbHtml::dropDownList('model', '', array(), array('empty' => ''));
	echo '</div></fieldset></div>';
	
	echo '
	<div class="collapsible">
	<fieldset>
	<legend>Fuel</legend>
	<div class="group_info">';
	echo TbHtml::label('Fuel', 'fuel');
	echo TbHtml::dropDownList('fuel', '', CHtml::listData(Characteristic::model()->findAllByAttributes(array('vehicle_typeid' => array('0', '2'), 'characteristic_typeid' => '2')), 'characteristicid', 'characteristic_name'), array('empty' => ''));
	echo '</div></fieldset></div>';
	
	echo '
	<div class="collapsible">
	<fieldset>
	<legend>Date</legend>
	<div class="group_info">';
	echo TbHtml::label('Year From', 'yearFrom');
	echo TbHtml::dropDownList('yearFrom', '', $yearArray, array('span' => 1, 'empty' => ''));
	echo '<br style="clear:both" />'.TbHtml::label('Year To', 'yearTo');
	echo TbHtml::dropDownList('yearTo', '', $yearArray, array('span' => 1, 'empty' => ''));
	echo '</div></fieldset></div>';
	echo TbHtml::formActions(array(
		TbHtml::submitButton('Search', array('color' => TbHtml::BUTTON_COLOR_PRIMARY)),
	));

	echo TbHtml::endForm();
	?>
	</aside>
	<section class="col-md-9">
		<?php
		$this->widget('bootstrap.widgets.TbListView', array(
			'dataProvider' => $dataProvider,
			'itemView'     => '/' . $vehicleTypeNameCamel . '/_' . $vehicleTypeNameCamel . 'Item',
		));
		?>
	</section>
</div>