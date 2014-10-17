<?php
/* @var $this TrailerController */
/* @var $model Trailer */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'trailerid'); ?>
		<?php echo $form->textField($model,'trailerid'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'vehicleid'); ?>
		<?php echo $form->textField($model,'vehicleid'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'height'); ?>
		<?php echo $form->textField($model,'height',array('size'=>7,'maxlength'=>7)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'no_of_axis'); ?>
		<?php echo $form->textField($model,'no_of_axis'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'max_load'); ?>
		<?php echo $form->textField($model,'max_load',array('size'=>7,'maxlength'=>7)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'max_weight'); ?>
		<?php echo $form->textField($model,'max_weight',array('size'=>7,'maxlength'=>7)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->