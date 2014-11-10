<div>
	<div style="float: left;">
		<a href="<?php echo $this->createUrl('vehicleAdvertisment/distributorOffer', array('distributorId' => $data->partyid, 'vehicleTypeId' => 1)) ?>">Offer
<!--			<img src="--><?php //echo Yii::app()->request->baseUrl; ?><!--/images/make/thumb/makeThumb---><?php //echo $data->makeid ?><!--.jpg" style="width: 250px;">-->
		</a>
	</div>
	<div style="float: left;">
		<?php echo $data->company_name ?><br>
		<?php echo $data->address ?><br>
		<?php echo $data->city->city_name ?><br>
		<?php echo $data->city->country->country_name ?><br>
		T: <?php echo $data->phone_number ?><br>
		M: <?php echo $data->mobile ?><br>
		W: <?php echo $data->web ?><br>
		E: <?php echo $data->email ?>
	</div>
	<div style="clear: both;"></div>
</div>