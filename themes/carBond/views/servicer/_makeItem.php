<div style="cursor: pointer; border: solid 1px; float: left; width: 275px !important; height: 325px !important;" onclick="window.location.href = '<?php echo $this->createUrl('servicer/listByBrand', array('vehicleTypeId' => $vehicleTypeId, 'makeId' => $data->makeid)) ?>'">
	<div>
		<img src="<?php echo Yii::app()->request->baseUrl; ?>/images/make/thumb/makeThumb-<?php echo $data->makeid ?>.jpg" style="width: 250px;">
	</div>
	<div style="text-align: center;">
		<?php echo $data->make_name ?>
	</div>
</div>