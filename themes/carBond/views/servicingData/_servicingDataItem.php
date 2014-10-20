<div style="border: solid 1px; padding: 10px;">&nbsp;
	<div style="float: left; width: 100px;">
		<?php echo date('d.m.Y.', strtotime($data->servicing_date)) ?>
	</div>
	<div style="float: left; width: 100px;">
		<?php echo number_format($data->mileage) ?>km
	</div>
	<div style="float: left; width: 200px;">&nbsp;
		<?php echo $data->description ?>
	</div>
	<div style="float: left; width: 150px;">
		<?php
		if (isset($data->service) && isset($data->service->company_name)) {
			echo($data->service->company_name);
		} else {
			echo($data->service_name);
		}
		?>
	</div>
	<?php
	if (isset($data->dataProvider) && isset($data->dataProvider->company->company_name)) {
	?>
	<div style="float: left; width: 50px; color: green; font-weight: bold;">&nbsp;
		<?php echo("official service"); ?>
	</div>
	<?php
	} else {
	?>
	<div style="float: left; width: 50px; color:orange;font-weight: bold;">&nbsp;
		<?php echo("private person"); ?>
	</div>
	<?php
	}
	?>
	<div style="clear: both"></div>
</div>