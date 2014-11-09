<div class="sub-group clearfix">
	<div class="container">
		<div class="row">
			<ul>
				<li><a href="<?php echo $this->createUrl('vehicleAdvertisment/index', array('vehicleTypeId' => '1')); ?>" class="a <?php if(isset($_GET['vehicleTypeId']) && $_GET['vehicleTypeId'] ==1 ){ print 'active';} ?>">Cars</a></li>
				<li><a href="<?php echo $this->createUrl('vehicleAdvertisment/index', array('vehicleTypeId' => '2')); ?>" class="b <?php if(isset($_GET['vehicleTypeId']) && $_GET['vehicleTypeId'] ==2 ){ print 'active';} ?>">Motorcycles</a></li>
                <li><a href="<?php echo $this->createUrl('vehicleAdvertisment/index', array('vehicleTypeId' => '6')); ?>" class="c <?php if(isset($_GET['vehicleTypeId']) && $_GET['vehicleTypeId'] ==6 ){ print 'active';} ?>">Trucks</a></li>
                <li><a href="<?php echo $this->createUrl('vehicleAdvertisment/index', array('vehicleTypeId' => '3')); ?>" class="d <?php if(isset($_GET['vehicleTypeId']) && $_GET['vehicleTypeId'] ==3 ){ print 'active';} ?>">Agricultural machinery</a></li>
				<li><a href="<?php echo $this->createUrl('vehicleAdvertisment/index', array('vehicleTypeId' => '4')); ?>" class="e <?php if(isset($_GET['vehicleTypeId']) && $_GET['vehicleTypeId'] ==4 ){ print 'active';} ?>">Industriial machinery</a></li>
				<li><a href="<?php echo $this->createUrl('vehicleAdvertisment/index', array('vehicleTypeId' => '5')); ?>" class="f <?php if(isset($_GET['vehicleTypeId']) && $_GET['vehicleTypeId'] ==5 ){ print 'active';} ?>">Boats</a></li>

<!--				<li><a href="--><?php //echo $this->createUrl('vehicleAdvertisment/index', array('vehicleTypeId' => '7')); ?><!--" class="">Kombi vozila</a></li>-->
<!--				<li><a href="--><?php //echo $this->createUrl('vehicleAdvertisment/index', array('vehicleTypeId' => '8')); ?><!--" class="">Trejleri</a></li>-->
<!--				<li><a href="--><?php //echo $this->createUrl('vehicleAdvertisment/index', array('vehicleTypeId' => '9')); ?><!--" class="">Autobusi</a></li>-->
<!--				<li><a href="--><?php //echo $this->createUrl('vehicleAdvertisment/index', array('vehicleTypeId' => '10')); ?><!--" class="">Kamperi</a></li>-->
			</ul>
		</div>
	</div>
</div>