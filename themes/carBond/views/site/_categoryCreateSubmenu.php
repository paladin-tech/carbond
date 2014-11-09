<div class="sub-group clearfix">
	<div class="container">
		<div class="row">
			<ul>
				<li><a href="<?php echo $this->createUrl('vehicleAdvertisment/create', array('vehicleTypeId' => '1')); ?>" class="a <?php if(isset($_GET['vehicleTypeId']) && $_GET['vehicleTypeId'] ==1 ){ print 'active';} ?>">Cars</a></li>
				<li><a href="<?php echo $this->createUrl('vehicleAdvertisment/create', array('vehicleTypeId' => '2')); ?>" class="b <?php if(isset($_GET['vehicleTypeId']) && $_GET['vehicleTypeId'] ==2 ){ print 'active';} ?>">Motorcycles</a></li>
                <li><a href="<?php echo $this->createUrl('vehicleAdvertisment/create', array('vehicleTypeId' => '6')); ?>" class="c <?php if(isset($_GET['vehicleTypeId']) && $_GET['vehicleTypeId'] ==6 ){ print 'active';} ?>">Trucks</a></li>
				<li><a href="<?php echo $this->createUrl('vehicleAdvertisment/create', array('vehicleTypeId' => '3')); ?>" class="d <?php if(isset($_GET['vehicleTypeId']) && $_GET['vehicleTypeId'] ==3 ){ print 'active';} ?>">Agricultural machinery</a></li>
				<li><a href="<?php echo $this->createUrl('vehicleAdvertisment/create', array('vehicleTypeId' => '4')); ?>" class="e <?php if(isset($_GET['vehicleTypeId']) && $_GET['vehicleTypeId'] ==4 ){ print 'active';} ?>">Industriial machinery</a></li>
				<li><a href="<?php echo $this->createUrl('vehicleAdvertisment/create', array('vehicleTypeId' => '5')); ?>" class="f <?php if(isset($_GET['vehicleTypeId']) && $_GET['vehicleTypeId'] ==5 ){ print 'active';} ?>">Boats</a></li>
			</ul>
		</div>
	</div>
</div>