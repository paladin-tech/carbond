<?php
/* @var $this VehicleController */
/* @var $model Vehicle */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'vehicle-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'vin'); ?>
		<?php echo $form->textField($model,'vin',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'vin'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'engine_number'); ?>
		<?php echo $form->textField($model,'engine_number',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'engine_number'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'vehicle_typeid'); ?>
		<?php echo $form->textField($model,'vehicle_typeid'); ?>
		<?php echo $form->error($model,'vehicle_typeid'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'modelid'); ?>
		<?php echo $form->textField($model,'modelid'); ?>
		<?php echo $form->error($model,'modelid'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'production_year'); ?>
		<?php echo $form->textField($model,'production_year'); ?>
		<?php echo $form->error($model,'production_year'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'first_registration'); ?>
		<?php echo $form->textField($model,'first_registration'); ?>
		<?php echo $form->error($model,'first_registration'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'variant'); ?>
		<?php echo $form->textField($model,'variant',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'variant'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'km'); ?>
		<?php echo $form->textField($model,'km'); ?>
		<?php echo $form->error($model,'km'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'engine_ccm'); ?>
		<?php echo $form->textField($model,'engine_ccm'); ?>
		<?php echo $form->error($model,'engine_ccm'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'engine_power'); ?>
		<?php echo $form->textField($model,'engine_power'); ?>
		<?php echo $form->error($model,'engine_power'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'fuel_typeid'); ?>
		<?php echo $form->textField($model,'fuel_typeid'); ?>
		<?php echo $form->error($model,'fuel_typeid'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'engine_emission_class'); ?>
		<?php echo $form->textField($model,'engine_emission_class'); ?>
		<?php echo $form->error($model,'engine_emission_class'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'gear_type'); ?>
		<?php echo $form->textField($model,'gear_type'); ?>
		<?php echo $form->error($model,'gear_type'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'transmission_type'); ?>
		<?php echo $form->textField($model,'transmission_type'); ?>
		<?php echo $form->error($model,'transmission_type'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'color'); ?>
		<?php echo $form->textField($model,'color'); ?>
		<?php echo $form->error($model,'color'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'registered'); ?>
		<?php echo $form->textField($model,'registered'); ?>
		<?php echo $form->error($model,'registered'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'registration_valid_to'); ?>
		<?php echo $form->textField($model,'registration_valid_to'); ?>
		<?php echo $form->error($model,'registration_valid_to'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'vehicle_origin'); ?>
		<?php echo $form->textField($model,'vehicle_origin'); ?>
		<?php echo $form->error($model,'vehicle_origin'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'damages'); ?>
		<?php echo $form->textField($model,'damages'); ?>
		<?php echo $form->error($model,'damages'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->