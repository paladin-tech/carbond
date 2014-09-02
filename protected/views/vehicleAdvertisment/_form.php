<?php
/* @var $this VehicleAdvertismentController */
/* @var $model VehicleAdvertisment */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'vehicle-advertisment-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'vehicle_advertismentid'); ?>
		<?php echo $form->textField($model,'vehicle_advertismentid'); ?>
		<?php echo $form->error($model,'vehicle_advertismentid'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'vehicleid'); ?>
		<?php echo $form->textField($model,'vehicleid'); ?>
		<?php echo $form->error($model,'vehicleid'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'created_date'); ?>
		<?php echo $form->textField($model,'created_date'); ?>
		<?php echo $form->error($model,'created_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'last_change'); ?>
		<?php echo $form->textField($model,'last_change'); ?>
		<?php echo $form->error($model,'last_change'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'valid_to'); ?>
		<?php echo $form->textField($model,'valid_to'); ?>
		<?php echo $form->error($model,'valid_to'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'active'); ?>
		<?php echo $form->textField($model,'active'); ?>
		<?php echo $form->error($model,'active'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->