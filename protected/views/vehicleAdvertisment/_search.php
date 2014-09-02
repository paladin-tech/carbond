<?php
/* @var $this VehicleAdvertismentController */
/* @var $model VehicleAdvertisment */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'vehicle_advertismentid'); ?>
		<?php echo $form->textField($model,'vehicle_advertismentid'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'vehicleid'); ?>
		<?php echo $form->textField($model,'vehicleid'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'created_date'); ?>
		<?php echo $form->textField($model,'created_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'last_change'); ?>
		<?php echo $form->textField($model,'last_change'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'valid_to'); ?>
		<?php echo $form->textField($model,'valid_to'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'active'); ?>
		<?php echo $form->textField($model,'active'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->