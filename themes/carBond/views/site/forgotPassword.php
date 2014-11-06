<?php
/* @var $this SiteController */
/* @var $model LoginForm */
/* @var $form CActiveForm  */
?>

<?php
echo TbHtml::pageHeader('Forgot Password', '');
?>

<?php
if(isset($resetPassword)) {
?>
<p>Your password has been reset.</p>
<?php
} else {
?>
<p>Please enter your e-mail address:</p>

<?php
$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'layout' => TbHtml::FORM_LAYOUT_HORIZONTAL,
	'id'=>'reset-password-form',
	'enableClientValidation'=>true,
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
	),
));
?>

<fieldset>
	<legend>Your e-mail address</legend>
	<?php
	echo $form->textFieldControlGroup($model, 'username');
	?>
</fieldset>

<?php echo TbHtml::formActions(array(
	TbHtml::submitButton('Reset Password', array('color' => TbHtml::BUTTON_COLOR_PRIMARY)),
	TbHtml::linkButton('Cancel', array('url' => Yii::app()->createUrl('site/index'))),
)); ?>

<?php $this->endWidget(); ?>

<?php } ?>