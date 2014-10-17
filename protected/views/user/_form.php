<?php
/* @var $this UserController */
/* @var $model User */
/* @var $form CActiveForm */
?>

<?php $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'layout' => TbHtml::FORM_LAYOUT_HORIZONTAL,
)); ?>

	<fieldset>
		<legend>User Data</legend>
		<?php echo $form->textFieldControlGroup($model, 'username', array('size' => 45, 'maxlength' => 45)); ?>
		<?php echo $form->error($model, 'username'); ?>
		<?php echo $form->passwordFieldControlGroup($model, 'password', array('size' => 60, 'maxlength' => 255)); ?>
		<?php echo $form->error($model, 'password'); ?>
		<?php echo $form->checkBoxControlGroup($model, 'active'); ?>
		<?php echo $form->error($model, 'active'); ?>
	</fieldset>

<?php
if (get_class($modelUserType) == 'Company') {
?>
	<fieldset>
		<legend>Company Data</legend>
		<?php echo $form->textFieldControlGroup($modelUserType, 'company_name', array('size' => 60, 'maxlength' => 100)); ?>
		<?php echo $form->error($modelUserType, 'company_name'); ?>
		<?php echo $form->textFieldControlGroup($modelUserType, 'address', array('size' => 60, 'maxlength' => 254)); ?>
		<?php echo $form->error($modelUserType, 'address'); ?>
		<?php echo $form->textFieldControlGroup($modelUserType, 'city', array('size' => 50, 'maxlength' => 50)); ?>
		<?php echo $form->error($modelUserType, 'city'); ?>
		<?php echo $form->textFieldControlGroup($modelUserType, 'tax_number', array('size' => 45, 'maxlength' => 45)); ?>
		<?php echo $form->error($modelUserType, 'tax_number'); ?>
		<?php echo $form->textFieldControlGroup($modelUserType, 'registration_number', array('size' => 45, 'maxlength' => 45)); ?>
		<?php echo $form->error($modelUserType, 'registration_number'); ?>
		<?php echo $form->textFieldControlGroup($modelUserType, 'contact_person', array('size' => 60, 'maxlength' => 100)); ?>
		<?php echo $form->error($modelUserType, 'contact_person'); ?>
		<?php echo $form->textFieldControlGroup($modelUserType, 'email', array('size' => 60, 'maxlength' => 320)); ?>
		<?php echo $form->error($modelUserType, 'email'); ?>
		<?php echo $form->textFieldControlGroup($modelUserType, 'phone_number', array('size' => 45, 'maxlength' => 45)); ?>
		<?php echo $form->error($modelUserType, 'phone_number'); ?>
	</fieldset>
<?php
} else {
?>
	<fieldset>
		<legend>Physical Person Data</legend>
		<?php echo $form->textFieldControlGroup($modelUserType, 'first_name', array('size' => 50, 'maxlength' => 50)); ?>
		<?php echo $form->error($modelUserType, 'first_name'); ?>
		<?php echo $form->textFieldControlGroup($modelUserType, 'last_name', array('size' => 50, 'maxlength' => 50)); ?>
		<?php echo $form->error($modelUserType, 'last_name'); ?>
		<?php echo $form->textFieldControlGroup($modelUserType, 'mobile', array('size' => 45, 'maxlength' => 45)); ?>
		<?php echo $form->error($modelUserType, 'mobile'); ?>
		<?php echo $form->textFieldControlGroup($modelUserType, 'email', array('size' => 60, 'maxlength' => 255)); ?>
		<?php echo $form->error($modelUserType, 'email'); ?>
		<?php echo $form->textFieldControlGroup($modelUserType, 'city', array('size' => 50, 'maxlength' => 50)); ?>
		<?php echo $form->error($modelUserType, 'city'); ?>
	</fieldset>
<?php
}
?>

<?php echo TbHtml::formActions(array(TbHtml::submitButton($model->isNewRecord ? 'Create' : 'Save', array('color' => TbHtml::BUTTON_COLOR_PRIMARY)), TbHtml::linkButton('Cancel', array('url' => Yii::app()->createUrl('user/index'))),
)); ?>

<?php $this->endWidget(); ?>