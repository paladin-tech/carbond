<?php
/* @var $this VehicleModelController */
/* @var $model VehicleModel */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'modelid'); ?>
		<?php echo $form->textField($model,'modelid'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'model_name'); ?>
		<?php echo $form->textField($model,'model_name',array('size'=>45,'maxlength'=>45)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'makeid'); ?>
		<?php echo $form->textField($model,'makeid'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->