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
<?php //Yii::app()->bootstrap->register(); ?>
<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
	<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
	<script>
		$(document).ready(function() {
			$('#vin').click(function() {
				$(this).val('');
			});
		});
	</script>
</head>

<body class="<?php echo Yii::app()->controller->getId() . ' ' . Yii::app()->controller->action->id; ?>">
<header>
	<div class="container-fluid">
		<div class="row ">
            <div class="col-lg-2"><h1 id="logotipo"><a href="<?php echo $this->createUrl('/site/index') ?>"><?php echo CHtml::encode(Yii::app()->name); ?></a></h1></div>
            <div class="col-lg-8 col-xs-12 ">
                <div class="fixed-layout-header"><div id="banner"><img src="<?php echo Yii::app()->baseUrl ?>/images/banner_top.png" class="img-responsive" width="100%" height="100%"/></div>
	                <div id="mainMbMenu">
		                <?php $this->widget('application.extensions.mbmenu.MbMenu', array(
			                'items' => array(
				                array('label' => 'Vehicle Database',
				                      'items' => array(
					                      array('label' => 'Search by VIN', 'url' => array('/vehicle/searchByVin')),
					                      array('label' => 'General Search', 'url' => array('/vehicleAdvertisment/index', 'vehicleTypeId' => 1, 'searchType'=>'general')),
					                      array('label' => 'Detailed Search', 'url' => array('/vehicleAdvertisment/detailedSearch', 'vehicleTypeId' => 1)),
					                      array('label' => 'Vehicle Sale', 'url' => array('/vehicleAdvertisment/create', 'vehicleTypeId' => 1)),
				                      )
				                ),
				                array('label' => 'Vehicle Sales',
				                      'items' => array(
					                      array('label' => 'Used Car Dealers‎', 'url' => array('/company/usedCarDealers')),
					                      array('label' => 'New Car Distributors', 'url' => array('/company/newCarDistributors')),
					                      array('label' => 'Used Car Owners',
					                            'items' => array(
						                            array('label' => 'Persons', 'url' => array('/vehicleAdvertisment/index', 'vehicleTypeId' => 1,'advertiser'=>'person', 'new_vehicle'=>0)),
						                            array('label' => 'Companies', 'url' => array('/vehicleAdvertisment/index', 'vehicleTypeId' => 1,'advertiser'=>'company', 'new_vehicle'=>0)),
					                            ),
					                      ),
				                      ),
				                ),
				                array('label' => 'Servicers',
				                      'items' => array(
					                      array('label' => 'Authorised Servicers',
					                            'items' => array(
						                            array('label' => 'Search by Brand', 'url' => array('/servicer/brands', 'official' => 1)),
						                            array('label' => 'Search by Servicers', 'url' => array('/servicer/companies', 'official' => 1)),
					                            ),
					                      ),
					                      array('label' => 'Other Servicers',
					                            'items' => array(
						                            array('label' => 'Search by Brand', 'url' => array('/servicer/brands', 'official' => 0)),
						                            array('label' => 'Search by Servicers', 'url' => array('/servicer/companies', 'official' => 0)),
					                            ),
					                      ),
                                          array('label' => 'Support Servicers', 'url' => array('/servicer/support'))
				                      ),
				                ),
				                array('label' => 'Support Industry',
				                      'items' => array(
					                      array('label' => 'Audio', 'url' => array('/supportIndustry/index','service_typeid'=>2)),
					                      array('label' => 'Alarm', 'url' => array('/supportIndustry/index','service_typeid'=>1)),
					                      array('label' => 'Air Conditioning', 'url' => array('/supportIndustry/index','service_typeid'=>11)),
					                      array('label' => 'Spare Parts', 'url' => array('/supportIndustry/index','service_typeid'=>8)),
					                      array('label' => 'LPG Service', 'url' => array('/supportIndustry/index','service_typeid'=>3)),
				                      ),
				                ),
				                array('label' => 'Tuning',
				                      'items' => array(
					                      array('label' => 'Car Tuning', 'url' => array('/tuning/index','vehicleTypeId' => 1)),
					                      array('label' => 'Motorcycles Tuning', 'url' => array('/tuning/index','vehicleTypeId' => 2)),
				                      ),
				                ),
				                array('label' => 'Finances',
				                      'items' => array(
					                      array('label' => 'Finances', 'url' => array('/financial/index')),
					                      array('label' => 'Finances', 'url' => array('/financial/index')),
					                      array('label' => 'Finances', 'url' => array('/financial/index')),
					                      array('label' => 'Finances', 'url' => array('/financial/index')),
				                      ),
				                ),
                                array('label' => 'Servicing Data', 'url' => array('/servicer/addServicingData', 'vehicleTypeId' => 1), 'visible' => (!Yii::app()->user->isGuest && Yii::app()->user->getState('userRoles')['isOfficialService'])),
                                array('label' => 'Users', 'url' => array('/user/index'), 'visible' => (!Yii::app()->user->isGuest && Yii::app()->user->getState('userRoles')['isAdmin'])),
                                array('label' => 'Damage Data', 'url' => array('/insuranceHouse/addDamageData', 'vehicleTypeId' => 1), 'visible' => (!Yii::app()->user->isGuest && Yii::app()->user->getState('userRoles')['isInsuranceHouse'])),
			                ),
		                )); ?>
	                </div>
                </div>
            </div>
            <div class="col-lg-2 col-xs-12">
            	<!--<a href="#" class="tool1"><span><img src="<?php //print $basePath.'/images/opsta-zupcanik.png'; ?>"/></span>Opsta pretraga</a>
                <a href="#" class="tool2"><span><img src="<?php //print $basePath.'/images/detaljna-zupcanik.png'; ?>"/></span>Detaljna pretraga</a>
                <a href="#" class="tool3">Unesite podatke ...></a>-->
	            <?php
	            $model = new LoginForm();
	            $this->beginWidget('zii.widgets.jui.CJuiDialog', array(
		            'id'      => 'loginForm',
		            'options' => array(
			            'title'     => 'Login',
			            'width'     => 400,
			            'height'    => 300,
			            'autoOpen'  => false,
			            'resizable' => false,
			            'modal'     => true,
			            'overlay'   => array(
				            'backgroundColor' => '#000',
				            'opacity'         => '0.5'
			            ),
//			            'buttons'   => array(
//				            'OK'     => 'js:function(){alert("Login");}',
//				            'Cancel' => 'js:function(){$(this).dialog("close");}',
//			            ),
		            ),
	            ));

	            $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
		            'layout'                 => TbHtml::FORM_LAYOUT_HORIZONTAL,
		            'action'                 => Yii::app()->createUrl('site/login'),
		            'id'                     => 'login-form',
		            'enableClientValidation' => true,
		            'enableAjaxValidation' => true,
		            'clientOptions'          => array(
			            'validateOnSubmit' => true,
		            ),
	            ));

	            echo $form->textFieldControlGroup($model, 'username');
	            echo $form->passwordFieldControlGroup($model, 'password');

	            echo TbHtml::formActions(array(
		            TbHtml::submitButton('Login', array('color' => TbHtml::BUTTON_COLOR_PRIMARY)),
		            TbHtml::linkButton('Cancel', array('url' => Yii::app()->createUrl('site/index'))),
		            TbHtml::linkButton('Forgot Password?', array('url' => Yii::app()->createUrl('site/forgotPassword'))),
	            ));

	            $this->endWidget();
	            $this->endWidget('zii.widgets.jui.CJuiDialog');

	            $modelPhysicalPerson = new PhysicalPerson();
	            $modelUser = new User();
	            $this->beginWidget('zii.widgets.jui.CJuiDialog', array(
		            'id'      => 'registrationForm',
		            'options' => array(
			            'title'     => 'Register',
			            'width'     => 400,
			            'height'    => 300,
			            'autoOpen'  => false,
			            'resizable' => false,
			            'modal'     => true,
			            'overlay'   => array(
				            'backgroundColor' => '#000',
				            'opacity'         => '0.5'
			            ),
//			            'buttons'   => array(
//				            'OK'     => 'js:function(){alert("Login");}',
//				            'Cancel' => 'js:function(){$(this).dialog("close");}',
//			            ),
		            ),
	            ));

	            $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
		            'layout'                 => TbHtml::FORM_LAYOUT_HORIZONTAL,
		            'action'                 => Yii::app()->createUrl('site/register'),
		            'id'                     => 'register-form',
		            'enableClientValidation' => true,
		            'enableAjaxValidation' => true,
		            'clientOptions'          => array(
			            'validateOnSubmit' => true,
		            ),
	            ));

	            echo $form->textFieldControlGroup($modelPhysicalPerson, 'first_name');
	            echo $form->textFieldControlGroup($modelPhysicalPerson, 'last_name');
	            echo $form->textFieldControlGroup($modelPhysicalPerson, 'cityid');
	            echo $form->textFieldControlGroup($modelPhysicalPerson, 'zip_code');
	            echo $form->textFieldControlGroup($modelUser, 'username');
	            echo $form->passwordFieldControlGroup($modelUser, 'password');

	            echo TbHtml::formActions(array(
		            TbHtml::submitButton('Register', array('color' => TbHtml::BUTTON_COLOR_PRIMARY)),
		            TbHtml::linkButton('Cancel', array('url' => Yii::app()->createUrl('site/index'))),
	            ));

	            $this->endWidget();
	            $this->endWidget('zii.widgets.jui.CJuiDialog');
	            ?>
                <a href="#" class="language-swap">Srp</a>
	            <?php if(Yii::app()->user->isGuest) { ?>
	            <a href="#" onclick="$('#loginForm').dialog('open'); return false;">Login</a>
	            <?php } else { ?>
	            <a href="<?php echo $this->createUrl('/site/logout') ?>">Logout</a>
	            <?php } ?>
                <a href="#" onclick="$('#registrationForm').dialog('open'); return false;">Registracija</a>
	            <?php
	            echo TbHtml::beginFormTb('', $this->createUrl('/vehicle/searchByVin'), 'POST', array('class' => 'search'));
				?>
	            <div class="input-group">
		            <?php
		            echo TbHtml::textField('vin', 'Search using VIN...', array('class' => 'form-control query'));
		            ?>
	                <span class="input-group-btn glyphicons search">
	                    <button type="submit" class="btn btn-default busca" name="yt0"></button>
	                </span>
		            <div id="result-autocomplete"></div>
	            </div>
	            <?php
	            echo TbHtml::endForm();
	            ?>
            </div>
        </div>
    </div>
</header>
	<!--<div class="faixa-branca clearfix">
	</div>-->
	<div class="container-fluid principal">
		<div class="row">
	        <section class="col-md-12">
            	<div class="row">
                	<div class="col-md-2"></div>
                    	<div class="col-md-8">
	            		<div class="fixed-layout-content"><?php echo $content; ?></div>
                        </div>
                	<div class="col-md-2"></div>
                </div>
	        </section>
	    </div>
	</div>
</div>
<footer id="footer" class="clearfix">
	<div class="container-fluid">
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
