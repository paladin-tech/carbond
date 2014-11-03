<div style="border: solid 1px;">&nbsp;
	<div style="float: left; width: 200px;">&nbsp;
		<?php if(!empty($data->photos)) { ?>
		<img src="<?php echo Yii::app()->request->baseUrl; ?>/images/vehicle/thumb/vehicleThumb-<?php echo $data->photos[0]->photo_id ?>.<?php echo $data->photos[0]->file_name ?>">
		<?php } ?>
	</div>
	<div style="float: left;">
		<div>
			<?php echo $data->vehicle->model->make->make_name ?>
		</div>
		<div>
			<div style="float: left;  width: 200px; white-space: nowrap;">
				<?php echo $data->vehicle->model->model_name ?><br>
				<?php echo $data->vehicle->production_year ?> year
			</div>
			<div style="float: left;  width: 200px; white-space: nowrap;">
				<?php echo number_format($data->vehicle->km) ?> km<br>
				<?php echo ($data->vehicle->cars) ? $data->vehicle->cars->carosseryType->characteristic_name : '' ?><br>
				<?php echo ($data->vehicle->fuelType) ? $data->vehicle->fuelType->characteristic_name : '' ?>
			</div>
			<div style="float: left;  width: 200px; white-space: nowrap;">
				<?php echo number_format($data->price) ?>&euro;
			</div>
			<div style="float: left;  width: 200px;">
				<a href="<?php echo $this->createUrl('vehicleAdvertisment/view', array('id' => $data->vehicle_advertismentid)) ?>">Details</a>
			</div>
		</div>
	</div>
	<div style="clear: both"></div>
</div>