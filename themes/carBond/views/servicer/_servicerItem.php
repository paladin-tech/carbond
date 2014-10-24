<div>
	<div>
		<img src="<?php echo Yii::app()->request->baseUrl; ?>/images/make/thumb/makeThumb-<?php echo $data->makeid ?>.jpg" style="width: 250px;">
	</div>
	<div style="text-align: center;">
		<?php echo $data->company_name ?><br>
		<?php echo $data->address ?><br>
		<?php echo $data->city_Name ?><br>
		<?php echo $data->country_Name ?><br>
		<?php echo $data->phone_number ?><br>
		<?php echo $data->email ?>
	</div>
</div>