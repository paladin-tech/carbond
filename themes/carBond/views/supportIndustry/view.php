<div style="float: left; width: 250px;">
	<img src="<?php echo Yii::app()->request->baseUrl; ?>/images/supportIndustry/thumb/car-mechanic.jpg" style="width: 250px;">
	<?php echo $model->company_name ?><br>
	<?php echo $model->address ?><br>
	<?php echo $model->city->city_name ?><br>
	<?php echo $model->city->country->country_name ?><br>
	T: <?php echo $model->phone_number ?><br>
	M: <?php echo $model->mobile ?><br>
	W: <?php echo $model->web ?><br>
	E: <?php echo $model->email ?>
</div>
<div style="float: left;">
	<?php echo $model->company_name ?><br>
	<p><?php echo $model->company_description ?></p>
	<?php
	foreach($servicerMakeList as $serviceMake) { ?>
		<div style="float: left">
			<img src="<?php echo Yii::app()->request->baseUrl; ?>/images/make/thumb/makeThumb-<?php echo $serviceMake ?>.jpg" style="width: 50px;">
		</div>
	<?php
	}
	?>
	<?php
	foreach($serviceAdvertisementData as $item) { ?>
		<div>
			<?php echo $item->service_title ?><br>
			<?php echo $item->service_description ?>
		</div>
	<?php
	}
	?>
</div>