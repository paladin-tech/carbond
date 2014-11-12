<?php
/* @var $this VehicleAdvertismentController */
/* @var $dataProvider CActiveDataProvider */

require_once (Yii::app()->theme->basePath . '/views/site/_categoryCreateSubmenu.php');
?>

<script>
$(document).ready(function () {

});
</script>

<div class="row"><?php
$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'layout'                 => TbHtml::FORM_LAYOUT_HORIZONTAL,
	'enableAjaxValidation'   => true,
));
?>
<div>
<?php
// Validate PhysicalPerson / Company models only if there is no logged-in User
//echo (isset(Yii::app()->user->id)) ?
//	CHtml::errorSummary(array($modelPhysicalPerson, $modelVehicle, $modelVehicleAdvertisement)) :
//	CHtml::errorSummary(array($modelVehicle, $modelVehicleAdvertisement));
?>
</div>
<div class="col-md-4">
    <div class="accordion">
	    <?php
	    echo TbHtml::dropDownListControlGroup('make', '', CHtml::listData(VehicleMake::model()->with(array('vehicleTypes' => array('condition' => 'vehicleTypes.vehicle_typeid = ' . $vehicleTypeId)))->findAll(), 'makeid', 'make_name'),
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
	    echo TbHtml::dropDownListControlGroup('model', '', array(), array('label' => 'Model', 'empty' => ''));
	    echo TbHtml::textFieldControlGroup('priceFrom', '', array('span' => 1, 'label' => 'Price From'));
	    echo TbHtml::textFieldControlGroup('priceTo', '', array('span' => 1, 'label' => 'Price To'));
	    echo TbHtml::dropDownListControlGroup('productionYearFrom', '', Helper::getYearsArray(), array('span' => 1, 'label' => 'Production Year From', 'empty' => ''));
	    echo TbHtml::dropDownListControlGroup('productionYearTo', '', Helper::getYearsArray(), array('span' => 1, 'label' => 'Production Year To', 'empty' => ''));
	    echo TbHtml::textFieldControlGroup('kmFrom', '', array('span' => 1, 'label' => 'km From', 'empty' => ''));
	    echo TbHtml::textFieldControlGroup('kmTo', '', array('span' => 1, 'label' => 'km To', 'empty' => ''));
	    echo TbHtml::textFieldControlGroup('engineCcmFrom', '', array('span' => 1, 'label' => 'Engine ccm From', 'empty' => ''));
	    echo TbHtml::textFieldControlGroup('engineCcmTo', '', array('span' => 1, 'label' => 'Engine ccm To', 'empty' => ''));
	    echo TbHtml::textFieldControlGroup('enginePowerFrom', '', array('span' => 1, 'label' => 'Engine Power From', 'empty' => ''));
	    echo TbHtml::textFieldControlGroup('enginePowerTo', '', array('span' => 1, 'label' => 'Engine Power To', 'empty' => ''));
	    ?>
    </div>
</div>

<div class="col-md-4">
    <div class="accordion">
	    <?php
	    echo TbHtml::dropDownListControlGroup('fuel', '', CHtml::listData(Characteristic::model()->findAllByAttributes(array('vehicle_typeid' => array(0, $vehicleTypeId), 'characteristic_typeid' => '2')), 'characteristicid', 'characteristic_name'), array('label' => 'Fuel Type', 'empty' => ''));
	    echo TbHtml::dropDownListControlGroup('engineEmissionClass', '', CHtml::listData(Characteristic::model()->findAllByAttributes(array('vehicle_typeid' => array(0, $vehicleTypeId), 'characteristic_typeid' => '3')), 'characteristicid', 'characteristic_name'), array('label' => 'Emission Class', 'empty' => ''));
	    echo TbHtml::dropDownListControlGroup('gearType', '', CHtml::listData(Characteristic::model()->findAllByAttributes(array('vehicle_typeid' => array(0, $vehicleTypeId), 'characteristic_typeid' => '7')), 'characteristicid', 'characteristic_name'), array('label' => 'Gear Type', 'empty' => ''));
	    echo TbHtml::dropDownListControlGroup('color', '', CHtml::listData(Characteristic::model()->findAllByAttributes(array('vehicle_typeid' => array(0, $vehicleTypeId), 'characteristic_typeid' => '5')), 'characteristicid', 'characteristic_name'), array('label' => 'Color', 'empty' => ''));
	    ?>
    </div>
</div>
<div class="col-md-4 action-button">
<?php echo TbHtml::formActions(array(
	TbHtml::submitButton('Search Advertisement', array('color' => TbHtml::BUTTON_COLOR_PRIMARY)),
	TbHtml::linkButton('Cancel', array('url' => Yii::app()->createUrl('vehicleAdvertisment/index', array('vehicleTypeId' => '1')))),
)); ?>
</div>
<?php $this->endWidget(); ?></div>

<section class="col-md-9">
	<?php
	$this->widget('bootstrap.widgets.TbListView', array(
		'dataProvider' => $dataProvider,
		'itemView'     => '/' . $vehicleTypeNameCamel . '/_' . $vehicleTypeNameCamel . 'Item',
	));
	?>
</section>