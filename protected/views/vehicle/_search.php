<?php
/* @var $this VehicleController */
/* @var $model Vehicle */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'vehicleid'); ?>
		<?php echo $form->textField($model,'vehicleid'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'vin'); ?>
		<?php echo $form->textField($model,'vin',array('size'=>45,'maxlength'=>45)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'engine_number'); ?>
		<?php echo $form->textField($model,'engine_number',array('size'=>45,'maxlength'=>45)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'vehicle_typeid'); ?>
		<?php echo $form->textField($model,'vehicle_typeid'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'modelid'); ?>
		<?php echo $form->textField($model,'modelid'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'production_year'); ?>
		<?php echo $form->textField($model,'production_year'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'first_registration'); ?>
		<?php echo $form->textField($model,'first_registration'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'variant'); ?>
		<?php echo $form->textField($model,'variant',array('size'=>45,'maxlength'=>45)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'km'); ?>
		<?php echo $form->textField($model,'km'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'engine_ccm'); ?>
		<?php echo $form->textField($model,'engine_ccm'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'engine_power'); ?>
		<?php echo $form->textField($model,'engine_power'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'fuel_typeid'); ?>
		<?php echo $form->textField($model,'fuel_typeid'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'engine_emission_class'); ?>
		<?php echo $form->textField($model,'engine_emission_class'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'gear_type'); ?>
		<?php echo $form->textField($model,'gear_type'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'transmission_type'); ?>
		<?php echo $form->textField($model,'transmission_type'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'color'); ?>
		<?php echo $form->textField($model,'color'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'registered'); ?>
		<?php echo $form->textField($model,'registered'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'registration_valid_to'); ?>
		<?php echo $form->textField($model,'registration_valid_to'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'vehicle_origin'); ?>
		<?php echo $form->textField($model,'vehicle_origin'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'damages'); ?>
		<?php echo $form->textField($model,'damages'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->