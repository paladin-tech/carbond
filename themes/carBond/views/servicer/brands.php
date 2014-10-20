<?php
echo TbHtml::pageHeader('Servicers - Brands', 'list view');
?>
<aside class="col-md-3">
	<?php
	echo TbHtml::beginFormTb();
	?>
	<fieldset>
		<legend>Vehicle Type</legend>
		<div class="group_info">
		<?php
		echo TbHtml::radioButtonListControlGroup('VehicleType', 'radioButtons', array(
			'Cars',
			'Buses',
			'Trucks',
			'Campers',
			'Motorcycles',
			'Boats',
			'Agricultural Machines',
			'Trailers',
			'Industrial Machines',
		));
		?>
		</div>
	</fieldset>
	<?php
	echo TbHtml::endForm();
	?>
</aside>
<section class="col-md-9">
	<?php
	$this->widget('bootstrap.widgets.TbListView', array(
		'dataProvider' => $dataProvider,
		'itemView'     => '/servicer/_makeItem',
	));
	?>
</section>
</div>