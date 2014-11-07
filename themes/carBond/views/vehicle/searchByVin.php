<?php
/* @var $this VehicleController */
/* @var $dataProvider CActiveDataProvider */
$cs = Yii::app()->clientScript;
$basePath = Yii::app()->baseUrl;
$themePath = Yii::app()->theme->baseUrl;

/**
 * StyleSHeets
 */
$cs
    ->registerCssFile($basePath.'/js/slideshow/styles/css3.css');
/**
 * JavaScripts
 */
$cs
	->registerScriptFile($basePath . '/js/slideshow/lib/jquery.jcarousel.min.js', CClientScript::POS_END)
	->registerScriptFile($basePath . '/js/slideshow/lib/jquery.pikachoose.min.js', CClientScript::POS_END)
	->registerScriptFile($basePath . '/js/slideshow/lib/jquery.touchwipe.min.js', CClientScript::POS_END)
	->registerScript('tooltip',
		"$('[data-toggle=\"tooltip\"]').tooltip();
		$('[data-toggle=\"popover\"]').tooltip()"
		, CClientScript::POS_READY)
	->registerScript('teste',
		"$(\"#pikame\").PikaChoose();"
		, CClientScript::POS_READY)
	->registerScript('slide1',
		"$(\"#slide-left\").PikaChoose();"
		, CClientScript::POS_READY);
?>
<?php
if($searchAllowed) {
?>
<div class="row">
	<div class="col-md-12 bottom_bar search-vin">
		<span class="vin"><strong>VIN: </strong><?php echo (isset($model) && $model != 'notSet') ? $model->vin : ''; ?></span>
		<?php
		echo TbHtml::beginFormTb();

		echo TbHtml::label('VIN', 'vin');
		echo TbHtml::textField('vin', '');

		echo TbHtml::formActions(array(
			TbHtml::submitButton('Search', array('color' => TbHtml::BUTTON_COLOR_PRIMARY)),
		));

		echo TbHtml::endForm();
		?>
	</div>

    <?php
    if(isset($model) && $model != 'notSet') {
    ?>
    <div class="col-sm-4 ">
          <ul id="slide-left" >
               <li><a href="#"><img src="<?php  print $basePath.'/js/slideshow/1.jpg'; ?> " /></a></li>
               <li><a href="#"><img src="<?php  print $basePath.'/js/slideshow/3.jpg'; ?>"/></a></li>
               <li><a href="#"><img src="<?php  print $basePath.'/js/slideshow/3.jpg'; ?>"/></a></li>
               <li><a href="#"><img src="<?php  print $basePath.'/js/slideshow/1.jpg'; ?> " /></a></li>
          </ul>
          <div class="clearfix"></div>
    </div>
    <div class="col-sm-8">
	<div class="row">
    </div>
    <div class="col-md-6">
        <ul id="pikame" >
            <li><a href="#"><img src="<?php  print $basePath.'/js/slideshow/1.jpg'; ?> " /></a></li>
            <li><a href="#"><img src="<?php  print $basePath.'/js/slideshow/3.jpg'; ?>"/></a></li>
            <li><a href="#"><img src="<?php  print $basePath.'/js/slideshow/3.jpg'; ?>"/></a></li>
            <li><a href="#"><img src="<?php  print $basePath.'/js/slideshow/1.jpg'; ?> " /></a></li>
        </ul>
    </div>
    <div class="col-sm-12 col-md-6">
        <?php
        $this->widget('bootstrap.widgets.TbDetailView', array(
            'type'       => array(TbHtml::DETAIL_TYPE_STRIPED),
            'data'       => $model,
            'attributes' => array(
                array(
                    'name' => 'vin',
                ),
                array(
                    'name' => 'Make / Model',
                    'type' => 'text',
                    'value' => $model->model->make->make_name . ' - ' . $model->model->model_name,
                ),
                array(
                    'name' => 'Production Year',
                    'type' => 'text',
                    'value' => $model->production_year,
                ),
                array(
                    'name' => 'KM',
                    'type' => 'text',
                    'value' => number_format($model->km),
                ),
                array(
                    'name' => 'engine_ccm',
                ),
                array(
                    'name' => 'engine_power',
                ),
                array(
                    'name' => 'production_year',
                ),
                array(
                    'name' => 'first_registration',
                ),
                array(
                    'name' => 'variant',
                ),
                array(
                    'name' => 'registered',
                    'value' => ($model->registered) ? 'Yes' : 'No',
                ),
                array(
                    'name' => 'registration_valid_to',
                    'value' => date('d.m.Y.', strtotime($model->registration_valid_to)),
                ),
                array(
                    'name' => 'vehicle_origin',
                    'value' => ($model->vehicleOrigin) ? $model->vehicleOrigin->characteristic_name : '',
                ),
                array(
                    'name' => 'gear_type',
                    'value' => ($model->gearType) ? $model->gearType->characteristic_name : '',
                ),
                array(
                    'name' => 'damages',
                    'value' => ($model->damages) ? 'Yes' : 'No',
                ),
                array(
                    'name' => 'Fuel Type',
                    'type' => 'text',
                    'value' => ($model->fuelType) ? $model->fuelType->characteristic_name : '',
                ),
                array(
                    'name' => 'Engine Emission Type',
                    'type' => 'text',
                    'value' => ($model->engine_emission_class) ? $model->engineEmissionClass->characteristic_name : '',
                ),
                array(
                    'name' => 'Color',
                    'type' => 'text',
                    'value' => ($model->color) ? $model->color0->characteristic_name : '',
                ),
            ),
        ));
        ?>
    </div>
	<h4>Servicing Data</h4>
	<div class="veicle-data-wrap">
	<?php
		$this->widget('bootstrap.widgets.TbListView', array(
			'dataProvider' => $servicingData,
			'itemView'     => '/servicingData/_servicingDataItem',
		));
	?>
	</div>
	<?php
	} elseif (!isset($model)) {
		echo 'No vehicles with supplied VIN are found in the database.';
	} else {
	}
	?>
	</div>
</div>
<div style="clear: both"></div>
<?php
} else {
?>
<h4><?php echo $searchNotAllowedMessage ?></h4>
<?php
}
?>