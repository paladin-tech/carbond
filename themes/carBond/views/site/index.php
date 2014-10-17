<?php
/* @var $this SiteController */

$this->pageTitle = Yii::app()->name;
?>

<?php $this->widget('bootstrap.widgets.TbHeroUnit', array(
	'heading' => 'Welcome to Car Bond',
	'content' => '<p>This is a simple hero unit, a simple jumbotron-style component for calling extra attention to featured content or information.</p>' . TbHtml::button('Learn more', array('color' => TbHtml::BUTTON_COLOR_PRIMARY, 'size' => TbHtml::BUTTON_SIZE_LARGE)),
)); ?>