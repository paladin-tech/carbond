<?php
/* @var $this ServicingDataController */
/* @var $model ServicingData */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'servicing_dataid'); ?>
		<?php echo $form->textField($model,'servicing_dataid'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'vehicleid'); ?>
		<?php echo $form->textField($model,'vehicleid'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'serviceid'); ?>
		<?php echo $form->textField($model,'serviceid'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'service_name'); ?>
		<?php echo $form->textField($model,'service_name',array('size'=>60,'maxlength'=>254)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'description'); ?>
		<?php echo $form->textArea($model,'description',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'data_provider'); ?>
		<?php echo $form->textField($model,'data_provider'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'servicing_date'); ?>
		<?php echo $form->textField($model,'servicing_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'service_type'); ?>
		<?php echo $form->textField($model,'service_type'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'mileage'); ?>
		<?php echo $form->textField($model,'mileage'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->