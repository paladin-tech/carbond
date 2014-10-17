<?php
/* @var $this CamperController */
/* @var $model Camper */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'camperid'); ?>
		<?php echo $form->textField($model,'camperid'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'vehicleid'); ?>
		<?php echo $form->textField($model,'vehicleid'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'max_weight'); ?>
		<?php echo $form->textField($model,'max_weight',array('size'=>7,'maxlength'=>7)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'no_of_doors'); ?>
		<?php echo $form->textField($model,'no_of_doors'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'no_of_axis'); ?>
		<?php echo $form->textField($model,'no_of_axis'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->