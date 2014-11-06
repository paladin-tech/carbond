<?php
/* @var $this VehicleController */
/* @var $dataProvider CActiveDataProvider */
?>

<div style="float: left; width: 150px;">
	banners
</div>
<div style="float: left;">
	<div style="float: left;">
		<?php if($model->photos) echo CHtml::image(Yii::app()->request->baseUrl . '/images/vehicle/normal/vehicle-' . $model->photos[0]->photo_id . '.' . $model->photos[0]->file_name, 'alt', array('style' => 'width: 300px')); ?>
	</div>
	<div style="float: left;">
		<p><?php echo ($model->vehicle->model) ? $model->vehicle->model->make->make_name : '' ?></p>
		<p><?php echo ($model->vehicle->model) ? $model->vehicle->model->model_name : '' ?></p>
		<p><?php echo $model->vehicle->production_year ?></p>
		<p><?php echo $model->vehicle->km ?></p>
		<p><?php echo ($model->vehicle->fuelType) ? $model->vehicle->fuelType->characteristic_name : '' ?></p>
		<p><?php echo ($model->vehicle->vehicleOrigin) ? $model->vehicle->vehicleOrigin->characteristic_name : '' ?></p>
	</div>
	<div style="float: left;">
		<p>cena <?php echo number_format($model->price) ?> &euro;</p>
		<?php
		if(!empty($model->advertiser0->company)) { ?>
		<p><?php echo $model->advertiser0->company->company_name ?></p>
		<?php
		}
		?>
		<?php
		if(!empty($model->advertiser0->physicalPerson)) { ?>
			<p><?php echo $model->advertiser0->physicalPerson->first_name ?> <?php echo $model->advertiser0->physicalPerson->last_name ?></p>
		<?php
		}
		?>
	</div>
	<div style="clear: both;"></div>
	<div>
		<div style="float: left;">
			<h4>Dodatne informacije</h4>
			<p>Kubikaža: <?php echo $model->vehicle->engine_ccm ?></p>
			<p>Snaga: <?php echo $model->vehicle->engine_power ?></p>
			<p>Emisiona klasa motora: <?php echo ($model->vehicle->engine_emission_class) ? $model->vehicle->engineEmissionClass->characteristic_name : '' ?></p>
			<p>Pogon: <?php echo (isset($model->vehicle->cars) && isset($model->vehicle->cars->transmissionType)) ? $model->vehicle->cars->transmissionType->characteristic_name : '' ?></p>
			<p>Menjač: <?php echo ($model->vehicle->gearType) ? $model->vehicle->gearType->characteristic_name : '' ?></p>
			<p>Broj vrata: <?php echo ($model->vehicle->cars) ? $model->vehicle->cars->no_of_doors : '' ?></p>
			<p>Broj sedišta: <?php echo ($model->vehicle->cars) ? $model->vehicle->cars->no_of_seats : '' ?></p>
			<p>Strana volana: <?php echo ($model->vehicle->cars) ? $model->vehicle->cars->stearing_wheel_side : '' ?></p>
			<p>Klima: <?php echo (isset($model->vehicle->cars) && isset($model->vehicle->cars->climateControl)) ? $model->vehicle->cars->climateControl->characteristic_name : '' ?></p>
			<p>Boja: <?php echo ($model->vehicle->color0) ? $model->vehicle->color0->characteristic_name : '' ?></p>
			<p>Registrovan do: <?php echo date('d.m.Y.', strtotime($model->vehicle->registration_valid_to)) ?></p>
			<p>Materijal enterijera: <?php echo (isset($model->vehicle->cars) && isset($model->vehicle->cars->enterier0)) ? $model->vehicle->cars->enterier0->characteristic_name : '' ?></p>
		</div>
		<div style="float: left;">
			<h4>Oprema</h4>
		</div>
	</div>
	<div style="clear: both;"></div>
	<div>
		<h4>Servicing Data</h4>
		<?php
		$this->widget('bootstrap.widgets.TbListView', array(
			'dataProvider' => $servicingData,
			'itemView'     => '/servicingData/_servicingDataItem',
		));
		?>
	</div>
	<div style="clear: both"></div>
</div>
<div style="clear: both"></div>