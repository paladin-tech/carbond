<aside class="col-md-3">
	<div class="group_info">
	<?php
	echo TbHtml::radioButtonListControlGroup('VehicleType', 'radioButtons', array(
		'1' => 'Cars',
		'9' => 'Buses',
		'6' => 'Trucks',
		'10' => 'Campers',
		'2' => 'Motorcycles',
		'5' => 'Boats',
		'3' => 'Agricultural Machines',
		'8' => 'Trailers',
		'4' => 'Industrial Machines',
	));
	?>
	</div>
</aside>
<section class="col-md-9">
	<?php
	$this->widget('bootstrap.widgets.TbListView', array(
		'dataProvider' => $dataProvider,
		'itemView'     => '/servicer/_makeItem',
		'viewData'     => array('vehicleTypeId' => $vehicleTypeId),
	));
	?>
</section>
</div>
<script>
	$(document).ready(function() {
		$('#VehicleType input').val(['<?php echo $vehicleTypeId ?>']);
		$('#VehicleType').change(function() {
			window.location.href = '<?php echo $this->createUrl('servicer/brands') ?>&vehicleTypeId=' + $('#VehicleType input:checked').val();
		});
	});
</script>