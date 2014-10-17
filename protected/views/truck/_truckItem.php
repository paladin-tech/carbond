<div style="border: solid 1px;">&nbsp;
	<div style="float: left; width: 200px;">&nbsp;
		<img src="">
	</div>
	<div style="float: left;">
		<div>
			<?php echo $data->vehicle->model->make->make_name . ' ' . $data->vehicle->model->model_name ?>
		</div>
		<div>
			<div style="float: left;  width: 200px;">
				<?php echo $data->vehicle->production_year ?>. godište
			</div>
			<div style="float: left;  width: 200px;">
				<?php echo $data->vehicle->km ?> km
			</div>
			<div style="float: left;  width: 200px;">
				<a href="<?php echo $this->createUrl('truck/view', array('id' => $data->truckid)) ?>">Details</a>
			</div>
		</div>
	</div>
	<div style="clear: both"></div>
</div>