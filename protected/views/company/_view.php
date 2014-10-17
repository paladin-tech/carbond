<?php
/* @var $this CompanyController */
/* @var $data Company */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('partyid')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->partyid), array('view', 'id'=>$data->partyid)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('company_name')); ?>:</b>
	<?php echo CHtml::encode($data->company_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('address')); ?>:</b>
	<?php echo CHtml::encode($data->address); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('city')); ?>:</b>
	<?php echo CHtml::encode($data->city); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tax_number')); ?>:</b>
	<?php echo CHtml::encode($data->tax_number); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('registration_number')); ?>:</b>
	<?php echo CHtml::encode($data->registration_number); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('contact_person')); ?>:</b>
	<?php echo CHtml::encode($data->contact_person); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('email')); ?>:</b>
	<?php echo CHtml::encode($data->email); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('phone_number')); ?>:</b>
	<?php echo CHtml::encode($data->phone_number); ?>
	<br />

	*/ ?>

</div>