<?php
/* @var $this MakeController */
/* @var $model Make */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'make-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'makeid'); ?>
		<?php echo $form->textField($model,'makeid'); ?>
		<?php echo $form->error($model,'makeid'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'make_name'); ?>
		<?php echo $form->textField($model,'make_name',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'make_name'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->