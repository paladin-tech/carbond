<?php
/* @var $this VehicleAdvertismentController */
/* @var $dataProvider CActiveDataProvider */

require_once (Yii::app()->theme->basePath . '/views/site/_categoryCreateSubmenu.php');
?>

<script>
$(document).ready(function () {

	$.ajax({
		url: '<?php echo $this->createUrl('site/updateCityDropdown') ?>',
		type: 'POST',
		data: {
			countryId: 33
		}
	})
	.success(function(html) {
		$('#PhysicalPerson_cityid').html(html);
		$('#Company_cityid').html(html);
	});

	$('input[name=optionsPhysicalCompany]').change(function () {
		if ($(this).val() == 'physical') {
			$('#physicalPerson').show();
			$('#company').hide();
		} else {
			$('#physicalPerson').hide();
			$('#company').show();
		}
	});

	$('#Vehicle_vin').change(function() {
		$.ajax({
			url: '<?php echo $this->createUrl('vehicle/checkVin') ?>',
			type: 'POST',
			dataType: 'json',
			data: {
				vin: $(this).val()
			}
		})
		.success(function(data) {
//			var data = JSON.parse(data);
			console.log(data.activeAds);
			if(data.formatValid)
			{
				if(data.activeAds) {
					alert('There are already active advertisements for this vehicle!');
				} else {
					if(data.vinCheck) {
						alert('Vehicle is already in the database.');
					}
					$('#make').val(data.makeId);
					$.ajax({
						url: '<?php echo $this->createUrl('car/updateModelDropdown') ?>',
						type: 'POST',
						data: {
							makeId: data.makeId
						}
					})
					.success(function(html) {
						$('#Vehicle_modelid').html(html);
						$('#Vehicle_modelid').val(data.modelId);
					});
				}
			} else {
				alert('Invalid VIN format.');
			}
		});
	});

	$('#Vehicle_production_year').change(function() {
		$('#Vehicle_first_registration').val($(this).val() + '-01-01');
	});

	$('div.control-group.error div.controls').show();
	$('div.group_info').show();

});
</script>

<div class="row"><?php
$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'layout'                 => TbHtml::FORM_LAYOUT_HORIZONTAL,
	'enableAjaxValidation'   => true,
//	'enableClientValidation'   => true,
	'htmlOptions'            => array('enctype' => 'multipart/form-data'),
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
	<?php
	if($vehicleTypeId == 6) {
		echo TbHtml::radioButtonListControlGroup(
			'VehicleType',
			7,
			array(
				'7' => 'Van',
				'8' => 'Trailer',
				'9' => 'Bus',
				'10' => 'Camper',
			)
		);
	}
	?>
<?php
if(!isset(Yii::app()->user->id)) {
?>
<div class="collapsible">
	<fieldset>
	<legend>Owner Data</legend>
	<div class="group_info">
	    <div>
			<?php
			echo TbHtml::radioButtonList('optionsPhysicalCompany', 'physical', array(
				'physical' => 'Physical Person',
				'company'  => 'Company',
			));
			?>
		</div>
		<div id="physicalPerson">
			<?php
			echo $form->textFieldControlGroup($modelPhysicalPerson, 'first_name', array('readonly' => (isset(Yii::app()->user->id))));
			echo $form->textFieldControlGroup($modelPhysicalPerson, 'last_name', array('readonly' => (isset(Yii::app()->user->id))));
			echo $form->textFieldControlGroup($modelPhysicalPerson, 'mobile', array('readonly' => (isset(Yii::app()->user->id))));
			echo $form->textFieldControlGroup($modelPhysicalPerson, 'email', array('readonly' => (isset(Yii::app()->user->id))));
			echo TbHtml::dropDownListControlGroup('country', 33, CHtml::listData(Country::model()->findAll(), 'countryid', 'country_name'),
				array(
					'ajax'  => array(
						'type'   => 'POST',
						'url'    => $this->createUrl('site/updateCityDropdown'),
						'update' => '#PhysicalPerson_cityid',
						'data'   => array(
							'countryId' => 'js:this.value'
						),
					),
					'label' => 'Country',
					'empty' => '',
				)
			);
			echo $form->dropDownListControlGroup($modelPhysicalPerson, 'cityid', array(), array('empty' => ''));
			echo $form->textFieldControlGroup($modelPhysicalPerson, 'district', array('readonly' => (isset(Yii::app()->user->id))));
			echo $form->textFieldControlGroup($modelPhysicalPerson, 'zip_code', array('readonly' => (isset(Yii::app()->user->id))));
			?>
		</div>
		<div id="company" style="display: none">
			<?php
			echo $form->textFieldControlGroup($modelCompany, 'company_name', array('size' => 60, 'maxlength' => 100));
			echo $form->textFieldControlGroup($modelCompany, 'address', array('size' => 60, 'maxlength' => 254));
			echo TbHtml::dropDownListControlGroup('country', 33, CHtml::listData(Country::model()->findAll(), 'countryid', 'country_name'),
				array(
					'ajax'  => array(
						'type'   => 'POST',
						'url'    => $this->createUrl('site/updateCityDropdown'),
						'update' => '#Company_cityid',
						'data'   => array(
							'countryId' => 'js:this.value'
						),
					),
					'label' => 'Country',
					'empty' => '',
				)
			);
			echo $form->dropDownListControlGroup($modelCompany, 'cityid', array(), array('empty' => ''));
			echo $form->textFieldControlGroup($modelCompany, 'tax_number', array('size' => 45, 'maxlength' => 45));
			echo $form->textFieldControlGroup($modelCompany, 'registration_number', array('size' => 45, 'maxlength' => 45));
			echo $form->textFieldControlGroup($modelCompany, 'contact_person', array('size' => 60, 'maxlength' => 100));
			echo $form->textFieldControlGroup($modelCompany, 'email', array('size' => 60, 'maxlength' => 320));
			echo $form->textFieldControlGroup($modelCompany, 'phone_number', array('size' => 45, 'maxlength' => 45));
			?>
		</div>
    </div>
	</fieldset>
</div>

<?php } ?>
    <div class="accordion">
	    <?php
	    echo $form->textAreaControlGroup($modelVehicleAdvertisement, 'description', array('span' => 8, 'rows' => 5));
	    echo $form->textFieldControlGroup($modelVehicleAdvertisement, 'price');
	    echo $form->radioButtonListControlGroup($modelVehicleAdvertisement, 'new_vehicle', array(
		    '0' => 'No',
		    '1' => 'Yes',
	    ));
	    ?>
    </div>
</div>

<div class="col-md-4">
    <div class="accordion">
	    <?php
	    echo $form->textFieldControlGroup($modelVehicle, 'vin', array('size' => 45, 'maxlength' => 45));
	    echo $form->textFieldControlGroup($modelVehicle, 'engine_number', array('size' => 45, 'maxlength' => 45));
	    echo TbHtml::dropDownListControlGroup('make', '', CHtml::listData(VehicleMake::model()->with(array('vehicleTypes' => array('condition' => 'vehicleTypes.vehicle_typeid = ' . $vehicleTypeId)))->findAll(), 'makeid', 'make_name'),
		    array(
			    'ajax'  => array(
				    'type'   => 'POST',
				    'url'    => $this->createUrl('car/updateModelDropdown'),
				    'update' => '#Vehicle_modelid',
				    'data'   => array(
					    'makeId' => 'js:this.value'
				    ),
			    ),
			    'label' => 'Make',
			    'empty' => '',
		    )
	    );
	    echo $form->dropDownListControlGroup($modelVehicle, 'modelid', array(), array('empty' => ''));
	    echo $form->dropDownListControlGroup($modelVehicle, 'production_year', Helper::getYearsArray(), array('span' => 1, 'empty' => ''));
	    //	echo $form->textFieldControlGroup($modelVehicle, 'first_registration');
	    ?>
	    <div class="control-group">
		    <?php
		    echo $form->labelEx($modelVehicle, 'first_registration', array('class' => 'control-label'));
		    ?>
		    <div class="controls">
			    <?php
			    $this->widget('zii.widgets.jui.CJuiDatePicker', array(
				    // 'name'=>'birthdate',
				    'id' => 'Vehicle_first_registration',
				    'name'    => 'Vehicle[first_registration]', // the name of the field
				    'value'   => $modelVehicle->first_registration, // pre-fill the value
				    // additional javascript options for the date picker plugin
				    'options' => array(
					    'showAnim'   => 'fold',
					    'dateFormat' => 'yy-mm-dd', // optional Date formatting
					    'debug'      => true,
				    )
			    ));
			    ?>
		    </div>
	    </div>
	    <?php
	    echo $form->textFieldControlGroup($modelVehicle, 'variant');
	    echo $form->textFieldControlGroup($modelVehicle, 'km');
	    echo $form->textFieldControlGroup($modelVehicle, 'engine_ccm');
	    echo $form->textFieldControlGroup($modelVehicle, 'engine_power');
	    echo $form->dropDownListControlGroup($modelVehicle, 'fuel_typeid', CHtml::listData(Characteristic::model()->findAllByAttributes(array('vehicle_typeid' => array(0, $vehicleTypeId), 'characteristic_typeid' => '2')), 'characteristicid', 'characteristic_name'), array('empty' => ''));
	    echo $form->dropDownListControlGroup($modelVehicle, 'engine_emission_class', CHtml::listData(Characteristic::model()->findAllByAttributes(array('vehicle_typeid' => array(0, $vehicleTypeId), 'characteristic_typeid' => '3')), 'characteristicid', 'characteristic_name'), array('empty' => ''));
	    echo $form->dropDownListControlGroup($modelVehicle, 'gear_type', CHtml::listData(Characteristic::model()->findAllByAttributes(array('vehicle_typeid' => array(0, $vehicleTypeId), 'characteristic_typeid' => '7')), 'characteristicid', 'characteristic_name'), array('empty' => ''));
	    echo $form->dropDownListControlGroup($modelVehicle, 'color', CHtml::listData(Characteristic::model()->findAllByAttributes(array('vehicle_typeid' => array(0, $vehicleTypeId), 'characteristic_typeid' => '5')), 'characteristicid', 'characteristic_name'), array('empty' => ''));
	    echo $form->radioButtonListControlGroup($modelVehicle, 'registered', array(
		    '0' => 'No',
		    '1' => 'Yes',
	    ));
	    ?>
	    <div class="control-group">
		    <?php
		    echo $form->labelEx($modelVehicle, 'registration_valid_to', array('class' => 'control-label'));
		    ?>
		    <div class="controls">
			    <?php
			    $this->widget('zii.widgets.jui.CJuiDatePicker', array(
				    'name'    => 'registration_valid_to', // the name of the field
				    'value'   => $modelVehicle->registration_valid_to, // pre-fill the value
				    'options' => array(
					    'showAnim'   => 'fold',
					    'dateFormat' => 'yy-mm-dd', // optional Date formatting
					    'debug'      => true,
				    )
			    ));
			    ?>
		    </div>
	    </div>
	    <?php
	    echo $form->dropDownListControlGroup($modelVehicle, 'vehicle_origin', CHtml::listData(Characteristic::model()->findAllByAttributes(array('vehicle_typeid' => array(0, $vehicleTypeId), 'characteristic_typeid' => '10')), 'characteristicid', 'characteristic_name'), array('empty' => ''));
	    echo $form->dropDownListControlGroup($modelVehicle, 'damages', CHtml::listData(Characteristic::model()->findAllByAttributes(array('vehicle_typeid' => array(0, $vehicleTypeId), 'characteristic_typeid' => '11')), 'characteristicid', 'characteristic_name'), array('empty' => ''));

	    foreach ($modelCharacteristicTypeArray as $i => $characteristicType) {
		    $vehicleCharacteristic = $modelVehicleCharacteristicArray[$i];
		    if($characteristicType->multiple_select == 1)
		    {
		    ?>
	    <div class="control-group">
		    <?php
		    echo $form->labelEx($characteristicType, $characteristicType->characteristic_type_name, array('class' => 'control-label'));
		    ?>
<!--		    <div class="controls">-->
		    <?php
			    $this->widget('yiiwheels.widgets.multiselect.WhMultiSelect', array(
				    'model' => $vehicleCharacteristic,
				    'attribute' => "[$i]characteristicid",
				    'data' => CHtml::listData($characteristicType->characteristics, 'characteristicid', 'characteristic_name'),
				    'htmlOptions' => array('label' => $characteristicType->characteristic_type_name),
			    ));
		    ?>
<!--		    </div>-->
	    </div>
		    <?php
		    } else {
			    echo $form->dropDownListControlGroup(
				    $vehicleCharacteristic,
				    "[$i]characteristicid",
				    CHtml::listData($characteristicType->characteristics, 'characteristicid', 'characteristic_name'),
				    array('label' => $characteristicType->characteristic_type_name, 'empty' => '')
			    );
		    }
	    }
	    ?>
    <?php
    if($model != '')
        require_once (Yii::app()->theme->basePath . '/views/' . $vehicleType . '/_form.php');
    ?>
    </div>
</div>
<div class="col-md-4 ">
	<div class="collapsible">
		<?php
	// Photos
	require_once (Yii::app()->basePath . '/views/photo/_form.php');
	?>
	</div>
</div>
<div class="col-md-4">
<?php
// Servicing data
require_once (Yii::app()->theme->basePath . '/views/servicingData/_form.php');

?>
</div>
<div class="col-md-4 action-button">
<?php echo TbHtml::formActions(array(
	TbHtml::submitButton($modelVehicle->isNewRecord ? 'Create Advertisement' : 'Save', array('color' => TbHtml::BUTTON_COLOR_PRIMARY)),
	TbHtml::linkButton('Cancel', array('url' => Yii::app()->createUrl('vehicleAdvertisment/index', array('vehicleTypeId' => '1')))),
)); ?>
</div>
<?php $this->endWidget(); ?></div>