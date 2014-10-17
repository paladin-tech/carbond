<div style="border: solid 1px;">&nbsp;
	<div style="float: left; width: 200px;">&nbsp;
		<img src="<?php echo Yii::app()->request->baseUrl; ?>/images/vehicle/thumb/vehicleThumb-<?php echo $data->vehicle_advertismentid ?>.jpg">
	</div>
	<div style="float: left;">
		<div>
			<?php echo $data->make_name . ' ' . $data->model_name ?>
		</div>
		<div>
			<div style="float: left;  width: 200px;">
				<?php echo $data->production_year ?> year
			</div>
			<div style="float: left;  width: 200px;">
				<?php echo number_format($data->km) ?> km
			</div>
			<div style="float: left;  width: 200px;">
				<a href="<?php echo $this->createUrl('vehicleAdvertisment/view', array('id' => $data->vehicle_advertismentid)) ?>">Details</a>
			</div>
		</div>
	</div>
	<div style="clear: both"></div>
</div>