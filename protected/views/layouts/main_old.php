<?php /* @var $this Controller */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<meta name="language" content="en"/>

	<!-- blueprint CSS framework -->
<!--	<link rel="stylesheet" type="text/css" href="--><?php //echo Yii::app()->request->baseUrl; ?><!--/css/screen.css" media="screen, projection"/>-->
<!--	<link rel="stylesheet" type="text/css" href="--><?php //echo Yii::app()->request->baseUrl; ?><!--/css/print.css" media="print"/>-->
	<!--[if lt IE 8]>
	<!--<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/ie.css" media="screen, projection"/>-->
	<![endif]-->

<!--	<link rel="stylesheet" type="text/css" href="--><?php //echo Yii::app()->request->baseUrl; ?><!--/../extensions/bootstrap/assets/css/main.css"/>-->
<!--	<link rel="stylesheet" type="text/css" href="--><?php //echo Yii::app()->request->baseUrl; ?><!--/css/form.css"/>-->

	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
	<?php Yii::app()->bootstrap->register(); ?>
</head>

<body>

<div class="container" id="page">

	<div id="header">
		<div id="logo"><?php echo CHtml::encode(Yii::app()->name); ?></div>
	</div>
	<!-- header -->

	<div id="mainmenu">
		<?php $this->widget('bootstrap.widgets.TbNavbar', array(
			'brandLabel' => 'Title',
			'display' => null,
			'items' => array(
				array(
					'class' => 'bootstrap.widgets.TbNav',
					'items' => array(
						array('label' => 'Vehicle Database', 'items' => array(
								array('label' => 'Search', 'url' => array('/vehicleAdvertisment/index', 'vehicleTypeId' => 1)),
								array('label' => 'Search by VIN', 'url' => array('/vehicle/searchByVin')),
							),
						),
						array('label' => 'Vehicle Sale', 'items' => array(
								array('label' => 'Vehicle Owners', 'url' => array('/vehicleAdvertisment/create', 'vehicleTypeId' => 1)),
							),
						),
						array('label' => 'Service Providers', 'url' => array('#')),
						array('label' => 'Supplement Industry', 'url' => array('#')),
						array('label' => 'Tuning', 'url' => array('#')),
						array('label' => 'Finance', 'url' => array('#')),
						array('label' => 'Admin', 'visible' => !Yii::app()->user->isGuest, 'items' => array(
								array('label' => 'Vehicle Types', 'url' => array('/vehicleType/index')),
								array('label' => 'Vehicle Makes', 'url' => array('/vehicleMake/index')),
								array('label' => 'Vehicle Models', 'url' => array('/vehicleModel/index'), 'visible' => !Yii::app()->user->isGuest),
								TbHtml::menuDivider(),
								array('label' => 'Cars', 'url' => array('/car/index'), 'visible' => !Yii::app()->user->isGuest),
								array('label' => 'Motorcycles', 'url' => array('/motorcycle/index'), 'visible' => !Yii::app()->user->isGuest),
								array('label' => 'Boats', 'url' => array('/boat/index'), 'visible' => !Yii::app()->user->isGuest),
								array('label' => 'Buses', 'url' => array('/bus/index'), 'visible' => !Yii::app()->user->isGuest),
								array('label' => 'Trucks', 'url' => array('/truck/index'), 'visible' => !Yii::app()->user->isGuest),
								array('label' => 'Trailers', 'url' => array('/trailer/index'), 'visible' => !Yii::app()->user->isGuest),
								array('label' => 'Campers', 'url' => array('/camper/index'), 'visible' => !Yii::app()->user->isGuest),
								array('label' => 'Vans', 'url' => array('/van/index'), 'visible' => !Yii::app()->user->isGuest),
								array('label' => 'Agricultural Machinery', 'url' => array('/agriculturalMachinery/index'), 'visible' => !Yii::app()->user->isGuest),
								array('label' => 'Industrial Machinery', 'url' => array('/industrialMachinery/index'), 'visible' => !Yii::app()->user->isGuest),
								TbHtml::menuDivider(),
								array('label' => 'Users', 'url' => array('/user/index'), 'visible' => !Yii::app()->user->isGuest),
//								array('label' => 'Vehicles', 'url' => array('/vehicle/index'), 'visible' => !Yii::app()->user->isGuest),
								array('label' => 'Roles', 'url' => array('/role/index'), 'visible' => !Yii::app()->user->isGuest),
								array('label' => 'Advertisement', 'url' => array('/vehicleAdvertisment/index'), 'visible' => !Yii::app()->user->isGuest),
								array('label' => 'Properties', 'url' => array('/vehicleProperty/index'), 'visible' => !Yii::app()->user->isGuest),
							),
						),
						array('label' => 'Login', 'url' => array('/site/login'), 'visible' => Yii::app()->user->isGuest),
						array('label' => 'Logout (' . Yii::app()->user->name . ')', 'url' => array('/site/logout'), 'visible' => !Yii::app()->user->isGuest)
					),
				),
			),
		)); ?>
	</div>
	<!-- mainmenu -->
	<?php if (isset($this->breadcrumbs)): ?>
		<?php $this->widget('zii.widgets.CBreadcrumbs', array(
			'links'=>$this->breadcrumbs,
		)); ?><!-- breadcrumbs -->
	<?php endif ?>

	<?php echo $content; ?>

	<div class="clear"></div>

	<div id="footer">
		Copyright &copy; <?php echo date('Y'); ?> by Car Bond.<br/>
		All Rights Reserved.<br/>
		<?php echo Yii::powered(); ?>
	</div>
	<!-- footer -->

</div>
<!-- page -->

</body>
</html>
