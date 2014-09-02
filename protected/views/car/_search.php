<?php
/* @var $this CarController */
/* @var $model Car */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'carid'); ?>
		<?php echo $form->textField($model,'carid'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'vehicleid'); ?>
		<?php echo $form->textField($model,'vehicleid'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'carossery_type'); ?>
		<?php echo $form->textField($model,'carossery_type'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'no_of_doors'); ?>
		<?php echo $form->textField($model,'no_of_doors'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'no_of_seats'); ?>
		<?php echo $form->textField($model,'no_of_seats'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'stearing_wheel_side'); ?>
		<?php echo $form->textField($model,'stearing_wheel_side'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'enterier'); ?>
		<?php echo $form->textField($model,'enterier'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'enterier_color'); ?>
		<?php echo $form->textField($model,'enterier_color'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->