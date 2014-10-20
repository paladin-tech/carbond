<?php
/* @var $this VehicleAdvertismentController */
/* @var $dataProvider CActiveDataProvider */

require_once (Yii::app()->theme->basePath . '/views/site/_categoryCreateSubmenu.php');

$this->widget('bootstrap.widgets.TbBreadcrumb', array(
	'links' => array(
		'Create Advertisment - ' . $vehicleTypeName,
	),
));
?>

<?php
echo TbHtml::pageHeader('Vehicle Advertisment - ' . $vehicleTypeName, 'create');
?>

<script>
$(document).ready(function () {

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
echo (isset(Yii::app()->user->id)) ?
	CHtml::errorSummary(array($model, $modelVehicle, $modelPhysicalPerson, $modelVehicleAdvertisement)) :
	CHtml::errorSummary(array($model, $modelVehicle, $modelVehicleAdvertisement));
?>
</div>
<div class="col-md-4">
<?php
if(!isset(Yii::app()->user->id)) {
?>
<div class="collapsible"><fieldset>
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
		// Physical Person data
		require_once (Yii::app()->theme->basePath . '/views/physicalPerson/_form.php');
		?>
	</div>
	<div id="company" style="display: none">
		<?php
		// Company data
		require_once (Yii::app()->theme->basePath . '/views/company/_form.php');
		?>
	</div>
    </div>
</fieldset></div>

<?php } ?>
    <div class="accordion">
    <?php
    // Vehicle Advertisement data
    require_once (Yii::app()->theme->basePath . '/views/vehicleAdvertisment/_form.php');
    ?>
    </div>
</div>



<div class="col-md-4">
    <div class="accordion">
    <?php
    // Vehicle data
    require_once (Yii::app()->theme->basePath . '/views/vehicle/_form.php');
    
    if($model != '')
        require_once (Yii::app()->theme->basePath . '/views/' . $vehicleType . '/_form.php');
    ?>
    </div>
</div>
<div class="col-md-4 ">
<div class="collapsible"><?php
// Photos
require_once (Yii::app()->basePath . '/views/photo/_form.php');
?></div>
</div>
<div class="col-md-4">
<div class="accordion">
<?php
// Servicing data
require_once (Yii::app()->basePath . '/views/servicingData/_form.php');

?>
</div>
</div>
<div class="col-md-4 action-button">
<?php echo TbHtml::formActions(array(
	TbHtml::submitButton($modelVehicle->isNewRecord ? 'Create' : 'Save', array('color' => TbHtml::BUTTON_COLOR_PRIMARY)),
	TbHtml::linkButton('Cancel', array('url' => Yii::app()->createUrl('vehicleAdvertisment/index', array('vehicleTypeId' => '1')))),
)); ?>
</div>
<?php $this->endWidget(); ?></div>