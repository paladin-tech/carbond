<?php /* @var $this Controller */ ?>
<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title><?php echo CHtml::encode($this->pageTitle); ?></title>
<?php
$cs = Yii::app()->clientScript;
$basePath = Yii::app()->baseUrl;
$themePath = Yii::app()->theme->baseUrl;

/**
 * StyleSHeets
 */
$cs
    ->registerCssFile($basePath.'/css/bootstrap.css')
    ->registerCssFile($basePath.'/css/bootstrap-theme.css')
	->registerCssFile($basePath.'/css/style.css');
/**
 * JavaScripts
 */
$cs
	->registerCoreScript('jquery', CClientScript::POS_END)
	->registerCoreScript('jquery.ui', CClientScript::POS_END)
	->registerScriptFile($basePath . '/js/bootstrap.min.js', CClientScript::POS_END)
	->registerScriptFile($basePath . '/js/jquery.slimscroll.min.js', CClientScript::POS_END)
	->registerScriptFile($basePath . '/js/config-interface.js', CClientScript::POS_END)
	->registerScript('tooltip',
		"$('[data-toggle=\"tooltip\"]').tooltip();
		$('[data-toggle=\"popover\"]').tooltip()"
		, CClientScript::POS_READY);
?>
<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
	<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>
<header>
	<div class="container">
		<div class="row">
            <div class="col-lg-2"><h1 id="logotipo"><a href="#"><?php echo CHtml::encode(Yii::app()->name); ?></a></h1></div>
            <div class="col-lg-8 col-xs-12">
                <div id="banner"><img src="<?php print $basePath.'/images/banner_top.png'; ?>" class="img-responsive" width="100%" height="100%"/></div>
                <?php $this->widget('zii.widgets.CMenu', array(
		            'id'    => 'menu',
		            'items' => array(
			            array('label' => 'Search by VIN', 'url' => array('/vehicle/searchByVin'), 'itemOptions' => array('class' => 'first'),),
			            array('label' => 'Vehicle Sale', 'url' => array('/vehicleAdvertisment/create', 'vehicleTypeId' => 1)),
			            array('label' => 'Search', 'url' => array('/vehicleAdvertisment/index', 'vehicleTypeId' => 1)),
			            array('label' => 'Servicing Data', 'url' => array('/servicer/addServicingData', 'vehicleTypeId' => 1), 'visible' => (!Yii::app()->user->isGuest && Yii::app()->user->getState('userRoles')['isOfficialService'])),
			            array('label' => 'Login', 'url' => array('/site/login'), 'itemOptions' => array('class' => 'last'), 'visible' => Yii::app()->user->isGuest),
			            array('label' => 'Logout', 'itemOptions' => array('class' => 'last'), 'url' => array('/site/logout'), 'visible' => !Yii::app()->user->isGuest)
		            ),
	            )); ?>
            </div>
            <div class="col-lg-2 col-xs-12">
            	<a href="#" class="tool1"><span><img src="<?php print $basePath.'/images/opsta-zupcanik.png'; ?>"/></span>Opsta pretraga</a>
                <a href="#" class="tool2"><span><img src="<?php print $basePath.'/images/detaljna-zupcanik.png'; ?>"/></span>Detaljna pretraga</a>
                <a href="#" class="tool3">Unesite podatke ...></a>
                <form class="search">
                    <div class="input-group">
                    	<input type="text" autocomplete="off" placeholder="Trazite pobroju sasije..." class="form-control query" name="q" id="query">
                        <span class="input-group-btn glyphicons search">
                            <button type="submit" class="btn btn-default busca"></button>
                        </span>
                        <div id="result-autocomplete"></div>
                     </div>
                </form>
            </div>
        </div>
    </div>

</header>
<div class="wrap" id="teste">
	<div class="faixa-branca clearfix">
	</div>
	<div class="container principal">
		<div class="row">
	        <section class="col-md-12">
	            <?php echo $content; ?>
	        </section>
	    </div>
	</div>
</div>
<footer id="footer" class="clearfix">
	<div class="container">
		<div class="row">
			<div class="col-sm-4">
				<ul class="redes-sociais">
					<li><a href="#" class="facebook">Facebook</a></li>
					<li><a href="#" class="twitter">Twitter</a></li>
					<li><a href="#" class="linkedin">Linkedin</a></li>
					<li><a href="#" class="youtube">Youtube</a></li>
				</ul>
			</div>
			<div class="col-sm-4"><p class="copyright">&copy; Carbond - All Rights Reserved - <?php echo date('Y'); ?><br>T:381 11 26 70 750</p></div>
            <div class="col-sm-4"><a href="#" class="forum ">Forum</a></div>
        </div>
    </div>
</footer>

</body>

</html>