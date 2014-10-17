<div class="sub-group clearfix">

	<div class="container">

		<div class="row">

			<ul>

				<li><a href="<?php echo $this->createUrl('vehicleAdvertisment/create', array('vehicleTypeId' => '1')); ?>" class="a <?php if(isset($_GET['vehicleTypeId']) && $_GET['vehicleTypeId'] ==1 ){ print 'active';} ?>">Automobili</a></li>

				<li><a href="<?php echo $this->createUrl('vehicleAdvertisment/create', array('vehicleTypeId' => '2')); ?>" class="b <?php if(isset($_GET['vehicleTypeId']) && $_GET['vehicleTypeId'] ==2 ){ print 'active';} ?>">Motori</a></li>

				<li><a href="<?php echo $this->createUrl('vehicleAdvertisment/create', array('vehicleTypeId' => '3')); ?>" class="d <?php if(isset($_GET['vehicleTypeId']) && $_GET['vehicleTypeId'] ==3 ){ print 'active';} ?>">Poljoprivredne mašine</a></li>

				<li><a href="<?php echo $this->createUrl('vehicleAdvertisment/create', array('vehicleTypeId' => '4')); ?>" class="e <?php if(isset($_GET['vehicleTypeId']) && $_GET['vehicleTypeId'] ==4 ){ print 'active';} ?>">Industrijske mašine</a></li>

				<li><a href="<?php echo $this->createUrl('vehicleAdvertisment/create', array('vehicleTypeId' => '5')); ?>" class="f <?php if(isset($_GET['vehicleTypeId']) && $_GET['vehicleTypeId'] ==5 ){ print 'active';} ?>">Plovila</a></li>

				<li><a href="<?php echo $this->createUrl('vehicleAdvertisment/create', array('vehicleTypeId' => '6')); ?>" class="c <?php if(isset($_GET['vehicleTypeId']) && $_GET['vehicleTypeId'] ==6 ){ print 'active';} ?>">Kamioni</a></li>

				<li><a href="<?php echo $this->createUrl('vehicleAdvertisment/create', array('vehicleTypeId' => '7')); ?>" class="">Kombi vozila</a></li>

				<li><a href="<?php echo $this->createUrl('vehicleAdvertisment/create', array('vehicleTypeId' => '8')); ?>" class="">Trejleri</a></li>

				<li><a href="<?php echo $this->createUrl('vehicleAdvertisment/create', array('vehicleTypeId' => '9')); ?>" class="">Autobusi</a></li>

				<li><a href="<?php echo $this->createUrl('vehicleAdvertisment/create', array('vehicleTypeId' => '10')); ?>" class="">Kamperi</a></li>

			</ul>

		</div>

	</div>

</div>