<?php /* @var $this Controller */ ?>
<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title><?php echo CHtml::encode($this->pageTitle); ?></title>

<?php 
$cs = Yii::app()->clientScript;
$themePath = Yii::app()->theme->baseUrl;

/**
 * StyleSHeets
 */
$cs
    ->registerCssFile($themePath.'/assets/css/bootstrap.css')
    ->registerCssFile($themePath.'/assets/css/bootstrap-theme.css')
	->registerCssFile($themePath.'/assets/css/style.css');
/**
 * JavaScripts
 */
$cs
    ->registerCoreScript('jquery',CClientScript::POS_END)
    ->registerCoreScript('jquery.ui',CClientScript::POS_END)
    ->registerScriptFile($themePath.'/js/bootstrap.min.js',CClientScript::POS_END)
	->registerScriptFile($themePath.'/js/jquery.slimscroll.min.js',CClientScript::POS_END)
	->registerScriptFile($themePath.'/js/config-interface.js',CClientScript::POS_END)
    ->registerScript('tooltip',
        "$('[data-toggle=\"tooltip\"]').tooltip();
        $('[data-toggle=\"popover\"]').tooltip()"
        ,CClientScript::POS_READY);

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
                <div id="banner"><img src="<?php print $themePath.'/assets/images/banner_top.png'; ?>" class="img-responsive" width="100%" height="100%"/></div>
                <?php $this->widget('zii.widgets.CMenu',array(
					'id' => 'menu',
					'items'=>array(
						array('label'=>'Search by VIN', 'url'=>array('/vehicle/searchByVin'), 'itemOptions'=>array('class' => 'first'),),
						array('label'=>'Vehicle Sale', 'url'=>array('/vehicleAdvertisment/create', 'vehicleTypeId' => 1)),
						array('label'=>'Search', 'url'=>array('/vehicleAdvertisment/index', 'vehicleTypeId' => 1)),
						array('label'=>'Login', 'url'=>array('/site/login'), 'itemOptions'=>array('class' => 'last'), 'visible'=>Yii::app()->user->isGuest),
						array('label'=>'Logout ('.Yii::app()->user->name.')', 'itemOptions'=>array('class' => 'last'), 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest)
					),
				)); ?>
                <!--<ul id="menu">
                    <li><a href="#" class="first active">Baza</a></li>
                    <li><a href="#">Prodaja Motornih vozila</a></li>
                    <li><a href="#">Serviseri</a></li>
                    <li><a href="#">Prateca industrija</a></li>
                    <li><a href="#">Tuning</a></li>
                    <li><a href="#" class="last">Financije</a></li>
                </ul>-->
            </div>
            <div class="col-lg-2 col-xs-12">
            	<a href="#" class="tool1"><span><img src="<?php print $themePath.'/assets/images/opsta-zupcanik.png'; ?>"/></span>Opsta pretraga</a>
                <a href="#" class="tool2"><span><img src="<?php print $themePath.'/assets/images/detaljna-zupcanik.png'; ?>"/></span>Detaljna pretraga</a>
                <a href="#" class="tool3">Unesite podatke ...></a>
                <form class="search">
                	<!--<input type="text" value="Trazite pobroju sasije..." class="search-field">-->
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
    <div class="sub-group clearfix">
    	<div class="container">
        	<div class="row"><ul>
            	<li><a class="a">Automobili</a></li>
                <li><a class="b">Motori</a></li>
                <li><a class="c">Transportna vozila</a></li>
                <li><a class="d">Poljoprivridne masine</a></li>
                <li><a class="e">Radine masine</a></li>
                <li><a class="f">Plovila</a></li>
            </ul></div>
        </div>
    </div>
</header>
<div class="container principal">
	<div class="row">
    	<aside class="col-md-3">
        
        <form action="#" method="post" class="niceform">
        
        <p><input type="checkbox" name="option1" value="0" checked="true"/>
        <span>Sortiraj po rastucim cenama</span>
        <br/>
        <input type="checkbox" name="option2"/>
        <span>Sortiraj po opadajucim cenama</span></p>
        
        <div class="grupo">
            <div class="titulo">Marka</div>
            <div class="conteudo">Conteudo 1</div>
        </div>
        <div class="grupo">
            <div class="titulo">Model</div>
            <div class="conteudo">Conteudo 1</div>
        </div>
        <div class="grupo">
            <div class="titulo">Cena</div>
            <div class="conteudo">Conteudo 1</div>
        </div>
        <div class="grupo">
            <div class="titulo">Godina proizv.</div>
            <div class="conteudo">Conteudo 1</div>
        </div>
        <div class="grupo">
            <div class="titulo">Karoserija</div>
            <div class="conteudo">
            	<input type="checkbox" name="option1" value="0" checked="true"/>
                <span>Limuzina</span>
                <hr/>                
                
                <input type="checkbox" name="option2"/>
                <span>Hecbek</span>
                <hr/> 
                <input type="checkbox" name="option3" value="0" checked="true"/>
                <span> Karavan</span>
                <hr/> 
                <input type="checkbox" name="option4"/>
                <span> Kupe</span>
                <hr/>
                <input type="checkbox" name="option5" value="0" checked="true"/>
                <span> Kabriolet/rodster</span>
                <hr/> 
                <input type="checkbox" name="option6" value="0" checked="true"/>
                <span> Monovolumen(MiniVan)</span>
                <hr/> 
                <input type="checkbox" name="option7" value="0" checked="true"/>
                <span> Dizip/SUV</span>
                <hr/> 
                <input type="checkbox" name="option8" value="0" checked="true"/>
                <span> Picap</span>
                <hr/> 
            </div>
        </div>


        </form>
        </aside>
        <section class="col-md-9">        
        	<?php echo $content; ?>       
      	</section>
    </div>
</div>
<footer id="footer" class="clearfix">
	<div class="container">
		<div class="row">
        	<div class="col-sm-4"><ul class="redes-sociais">
            	<li><a href="#" class="facebook">Facebook</a></li>
                <li><a href="#" class="twitter">Twitter</a></li>
                <li><a href="#" class="linkedin">Linkedin</a></li>
                <li><a href="#" class="youtube">Youtube</a></li>
            </ul></div>
            <div class="col-sm-4"><p class="copyright">&copy; Carbond - All Rights Reserved - <?php echo date('Y'); ?><br>T:381 11 26 70 750</p></div>
            <div class="col-sm-4"><a href="#" class="forum ">Forum</a></div>
        </div>
    </div>
</footer>

</body>
</html>
