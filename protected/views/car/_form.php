<?php
/* @var $this CarController */
/* @var $model Car */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'car-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'carid'); ?>
		<?php echo $form->textField($model,'carid'); ?>
		<?php echo $form->error($model,'carid'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'vehicleid'); ?>
		<?php echo $form->textField($model,'vehicleid'); ?>
		<?php echo $form->error($model,'vehicleid'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'carossery_type'); ?>
		<?php echo $form->textField($model,'carossery_type'); ?>
		<?php echo $form->error($model,'carossery_type'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'no_of_doors'); ?>
		<?php echo $form->textField($model,'no_of_doors'); ?>
		<?php echo $form->error($model,'no_of_doors'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'no_of_seats'); ?>
		<?php echo $form->textField($model,'no_of_seats'); ?>
		<?php echo $form->error($model,'no_of_seats'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'stearing_wheel_side'); ?>
		<?php echo $form->textField($model,'stearing_wheel_side'); ?>
		<?php echo $form->error($model,'stearing_wheel_side'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'enterier'); ?>
		<?php echo $form->textField($model,'enterier'); ?>
		<?php echo $form->error($model,'enterier'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'enterier_color'); ?>
		<?php echo $form->textField($model,'enterier_color'); ?>
		<?php echo $form->error($model,'enterier_color'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->