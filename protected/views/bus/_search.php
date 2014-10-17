<?php
/* @var $this BusController */
/* @var $model Bus */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'busid'); ?>
		<?php echo $form->textField($model,'busid'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'no_of_seats'); ?>
		<?php echo $form->textField($model,'no_of_seats'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'no_of_doors'); ?>
		<?php echo $form->textField($model,'no_of_doors'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'vehicleid'); ?>
		<?php echo $form->textField($model,'vehicleid'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->