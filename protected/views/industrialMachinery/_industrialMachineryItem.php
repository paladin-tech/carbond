<div style="border: solid 1px;">&nbsp;
	<div style="float: left; width: 200px;">&nbsp;
		<img src="">
	</div>
	<div style="float: left;">
		<div>
			<?php echo $data->model->make->make_name . ' ' . $data->model->model_name ?>
		</div>
		<div>
			<div style="float: left;  width: 200px;">
				<?php echo $data->production_year ?>. godište
			</div>
			<div style="float: left;  width: 200px;">
				<?php echo $data->km ?> km
			</div>
			<div style="float: left;  width: 200px;">
				<a href="<?php echo $this->createUrl('industrialMachinery/view', array('id' => $data->vehicleid)) ?>">Details</a>
			</div>
		</div>
	</div>
	<div style="clear: both"></div>
</div>