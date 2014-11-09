<script>
	$(document).ready(function() {
		$.ajax({
			url: '<?php echo $this->createUrl('site/updateCityDropdown') ?>',
			type: 'POST',
			data: {
				countryId: 33
			}
		})
			.success(function(html) {
				$('#city').html(html);
			});
	});
</script>
<aside class="col-md-3">
	<?php
	echo TbHtml::beginFormTb();
	?>
	<div class="group_info">
		<?php
		echo TbHtml::radioButtonListControlGroup('FinancialType', $selectedRole, array('13' => 'Leasing', '14' => 'Bank', '15' => 'Agency'));
		?>
	</div>
	<div class="collapsible">
		<fieldset>
			<legend>Country</legend>
			<div class="group_info">
				<?php
				echo TbHtml::label('Country', 'country');
				echo TbHtml::dropDownList('country', 33, CHtml::listData(Country::model()->findAll(), 'countryid', 'country_name'),
					array(
						'ajax'  => array(
							'type'   => 'POST',
							'url'    => $this->createUrl('site/updateCityDropdown'),
							'update' => '#city',
							'data'   => array(
								'countryId' => 'js:this.value'
							),
						),
						'label' => 'Country',
						'empty' => '',
					)
				);
				?>
			</div>
		</fieldset>
	</div>

	<div class="collapsible">
		<fieldset>
			<legend>City</legend>
			<div class="group_info">
				<?php
				echo TbHtml::label('City', 'city');
				echo TbHtml::dropDownList('city', '', array(), array('empty' => ''));
				?>
			</div>
		</fieldset>
	</div>
	<?php
	echo TbHtml::formActions(array(
		TbHtml::submitButton('Search', array('color' => TbHtml::BUTTON_COLOR_PRIMARY)),
	));

	echo TbHtml::endForm();
	?>
</aside>
<section class="col-md-9">
	<?php
	$this->widget('bootstrap.widgets.TbListView', array(
		'dataProvider' => $dataProvider,
		'itemView'     => '_supportIndustryItem',
//		'viewData'     => array('vehicleTypeId' => $vehicleTypeId),
	));
	?>
</section>
</div>