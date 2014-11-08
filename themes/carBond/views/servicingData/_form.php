<fieldset id="servicingDataFieldset">
	<legend>Servicing Data</legend>
	<div id="serviceData0" class="accordion serviceData" data-servicenr="0">
	<?php
		echo $form->hiddenField($modelServiceArray[0], '[0]servicing_dataid');
		echo $form->hiddenField($modelServiceArray[0], '[0]vehicleid');
		echo $form->dropDownListControlGroup($modelServiceArray[0], '[0]serviceid', CHtml::listData(Company::model()->findAll(), 'partyid', 'company_name'), array('empty' => ''));
		echo $form->textFieldControlGroup($modelServiceArray[0], '[0]service_name', array('size' => 60, 'maxlength' => 254));
		echo $form->dropDownListControlGroup($modelServiceArray[0], '[0]service_type', CHtml::listData(ServicingType::model()->findAll(), 'servicing_typeid', 'servicing_type_name'), array('empty' => ''));
		echo $form->textFieldControlGroup($modelServiceArray[0], '[0]mileage');
		echo $form->textAreaControlGroup($modelServiceArray[0], '[0]description', array('span' => 8, 'rows' => 5));
		echo $form->textFieldControlGroup($modelServiceArray[0], '[0]servicing_date');
	?>
	</div>
	<div id="serviceData1" class="accordion serviceData" data-servicenr="1" style="display: none;">
	<?php
		echo $form->hiddenField($modelServiceArray[1], '[1]servicing_dataid');
		echo $form->hiddenField($modelServiceArray[1], '[1]vehicleid');
		echo $form->dropDownListControlGroup($modelServiceArray[1], '[1]serviceid', CHtml::listData(Company::model()->findAll(), 'partyid', 'company_name'), array('empty' => ''));
		echo $form->textFieldControlGroup($modelServiceArray[1], '[1]service_name', array('size' => 60, 'maxlength' => 254));
		echo $form->dropDownListControlGroup($modelServiceArray[1], '[1]service_type', CHtml::listData(ServicingType::model()->findAll(), 'servicing_typeid', 'servicing_type_name'), array('empty' => ''));
		echo $form->textFieldControlGroup($modelServiceArray[1], '[1]mileage');
		echo $form->textAreaControlGroup($modelServiceArray[1], '[1]description', array('span' => 8, 'rows' => 5));
		echo $form->textFieldControlGroup($modelServiceArray[1], '[1]servicing_date');
	?>
	</div>
	<div id="serviceData2" class="accordion serviceData" data-servicenr="2" style="display: none;">
	<?php
		echo $form->hiddenField($modelServiceArray[2], '[2]servicing_dataid');
		echo $form->hiddenField($modelServiceArray[2], '[2]vehicleid');
		echo $form->dropDownListControlGroup($modelServiceArray[2], '[2]serviceid', CHtml::listData(Company::model()->findAll(), 'partyid', 'company_name'), array('empty' => ''));
		echo $form->textFieldControlGroup($modelServiceArray[2], '[2]service_name', array('size' => 60, 'maxlength' => 254));
		echo $form->dropDownListControlGroup($modelServiceArray[2], '[2]service_type', CHtml::listData(ServicingType::model()->findAll(), 'servicing_typeid', 'servicing_type_name'), array('empty' => ''));
		echo $form->textFieldControlGroup($modelServiceArray[2], '[2]mileage');
		echo $form->textAreaControlGroup($modelServiceArray[2], '[2]description', array('span' => 8, 'rows' => 5));
		echo $form->textFieldControlGroup($modelServiceArray[2], '[2]servicing_date');
	?>
	</div>
	<div id="serviceData3" class="accordion serviceData" data-servicenr="3" style="display: none;">
	<?php
		echo $form->hiddenField($modelServiceArray[3], '[3]servicing_dataid');
		echo $form->hiddenField($modelServiceArray[3], '[3]vehicleid');
		echo $form->dropDownListControlGroup($modelServiceArray[3], '[3]serviceid', CHtml::listData(Company::model()->findAll(), 'partyid', 'company_name'), array('empty' => ''));
		echo $form->textFieldControlGroup($modelServiceArray[3], '[3]service_name', array('size' => 60, 'maxlength' => 254));
		echo $form->dropDownListControlGroup($modelServiceArray[3], '[3]service_type', CHtml::listData(ServicingType::model()->findAll(), 'servicing_typeid', 'servicing_type_name'), array('empty' => ''));
		echo $form->textFieldControlGroup($modelServiceArray[3], '[3]mileage');
		echo $form->textAreaControlGroup($modelServiceArray[3], '[3]description', array('span' => 8, 'rows' => 5));
		echo $form->textFieldControlGroup($modelServiceArray[3], '[3]servicing_date');
	?>
	</div>
	<div id="serviceData4" class="accordion serviceData" data-servicenr="4" style="display: none;">
	<?php
		echo $form->hiddenField($modelServiceArray[4], '[4]servicing_dataid');
		echo $form->hiddenField($modelServiceArray[4], '[4]vehicleid');
		echo $form->dropDownListControlGroup($modelServiceArray[4], '[4]serviceid', CHtml::listData(Company::model()->findAll(), 'partyid', 'company_name'), array('empty' => ''));
		echo $form->textFieldControlGroup($modelServiceArray[4], '[4]service_name', array('size' => 60, 'maxlength' => 254));
		echo $form->dropDownListControlGroup($modelServiceArray[4], '[4]service_type', CHtml::listData(ServicingType::model()->findAll(), 'servicing_typeid', 'servicing_type_name'), array('empty' => ''));
		echo $form->textFieldControlGroup($modelServiceArray[4], '[4]mileage');
		echo $form->textAreaControlGroup($modelServiceArray[4], '[4]description', array('span' => 8, 'rows' => 5));
		echo $form->textFieldControlGroup($modelServiceArray[4], '[4]servicing_date');
	?>
	</div>
	<div id="serviceData5" class="accordion serviceData" data-servicenr="5" style="display: none;">
	<?php
		echo $form->hiddenField($modelServiceArray[5], '[5]servicing_dataid');
		echo $form->hiddenField($modelServiceArray[5], '[5]vehicleid');
		echo $form->dropDownListControlGroup($modelServiceArray[5], '[5]serviceid', CHtml::listData(Company::model()->findAll(), 'partyid', 'company_name'), array('empty' => ''));
		echo $form->textFieldControlGroup($modelServiceArray[5], '[5]service_name', array('size' => 60, 'maxlength' => 254));
		echo $form->dropDownListControlGroup($modelServiceArray[5], '[5]service_type', CHtml::listData(ServicingType::model()->findAll(), 'servicing_typeid', 'servicing_type_name'), array('empty' => ''));
		echo $form->textFieldControlGroup($modelServiceArray[5], '[5]mileage');
		echo $form->textAreaControlGroup($modelServiceArray[5], '[5]description', array('span' => 8, 'rows' => 5));
		echo $form->textFieldControlGroup($modelServiceArray[5], '[5]servicing_date');
	?>
	</div>
	<div id="serviceData6" class="accordion serviceData" data-servicenr="6" style="display: none;">
	<?php
		echo $form->hiddenField($modelServiceArray[6], '[6]servicing_dataid');
		echo $form->hiddenField($modelServiceArray[6], '[6]vehicleid');
		echo $form->dropDownListControlGroup($modelServiceArray[6], '[6]serviceid', CHtml::listData(Company::model()->findAll(), 'partyid', 'company_name'), array('empty' => ''));
		echo $form->textFieldControlGroup($modelServiceArray[6], '[6]service_name', array('size' => 60, 'maxlength' => 254));
		echo $form->dropDownListControlGroup($modelServiceArray[6], '[6]service_type', CHtml::listData(ServicingType::model()->findAll(), 'servicing_typeid', 'servicing_type_name'), array('empty' => ''));
		echo $form->textFieldControlGroup($modelServiceArray[6], '[6]mileage');
		echo $form->textAreaControlGroup($modelServiceArray[6], '[6]description', array('span' => 8, 'rows' => 5));
		echo $form->textFieldControlGroup($modelServiceArray[6], '[6]servicing_date');
	?>
	</div>
	<div id="serviceData7" class="accordion serviceData" data-servicenr="7" style="display: none;">
	<?php
		echo $form->hiddenField($modelServiceArray[7], '[7]servicing_dataid');
		echo $form->hiddenField($modelServiceArray[7], '[7]vehicleid');
		echo $form->dropDownListControlGroup($modelServiceArray[7], '[7]serviceid', CHtml::listData(Company::model()->findAll(), 'partyid', 'company_name'), array('empty' => ''));
		echo $form->textFieldControlGroup($modelServiceArray[7], '[7]service_name', array('size' => 60, 'maxlength' => 254));
		echo $form->dropDownListControlGroup($modelServiceArray[7], '[7]service_type', CHtml::listData(ServicingType::model()->findAll(), 'servicing_typeid', 'servicing_type_name'), array('empty' => ''));
		echo $form->textFieldControlGroup($modelServiceArray[7], '[7]mileage');
		echo $form->textAreaControlGroup($modelServiceArray[7], '[7]description', array('span' => 8, 'rows' => 5));
		echo $form->textFieldControlGroup($modelServiceArray[7], '[7]servicing_date');
	?>
	</div>
	<div id="serviceData8" class="accordion serviceData" data-servicenr="8" style="display: none;">
	<?php
		echo $form->hiddenField($modelServiceArray[8], '[8]servicing_dataid');
		echo $form->hiddenField($modelServiceArray[8], '[8]vehicleid');
		echo $form->dropDownListControlGroup($modelServiceArray[8], '[8]serviceid', CHtml::listData(Company::model()->findAll(), 'partyid', 'company_name'), array('empty' => ''));
		echo $form->textFieldControlGroup($modelServiceArray[8], '[8]service_name', array('size' => 60, 'maxlength' => 254));
		echo $form->dropDownListControlGroup($modelServiceArray[8], '[8]service_type', CHtml::listData(ServicingType::model()->findAll(), 'servicing_typeid', 'servicing_type_name'), array('empty' => ''));
		echo $form->textFieldControlGroup($modelServiceArray[8], '[8]mileage');
		echo $form->textAreaControlGroup($modelServiceArray[8], '[8]description', array('span' => 8, 'rows' => 5));
		echo $form->textFieldControlGroup($modelServiceArray[8], '[8]servicing_date');
	?>
	</div>
	<div id="serviceData9" class="accordion serviceData" data-servicenr="9" style="display: none;">
	<?php
		echo $form->hiddenField($modelServiceArray[9], '[9]servicing_dataid');
		echo $form->hiddenField($modelServiceArray[9], '[9]vehicleid');
		echo $form->dropDownListControlGroup($modelServiceArray[9], '[9]serviceid', CHtml::listData(Company::model()->findAll(), 'partyid', 'company_name'), array('empty' => ''));
		echo $form->textFieldControlGroup($modelServiceArray[9], '[9]service_name', array('size' => 60, 'maxlength' => 254));
		echo $form->dropDownListControlGroup($modelServiceArray[9], '[9]service_type', CHtml::listData(ServicingType::model()->findAll(), 'servicing_typeid', 'servicing_type_name'), array('empty' => ''));
		echo $form->textFieldControlGroup($modelServiceArray[9], '[9]mileage');
		echo $form->textAreaControlGroup($modelServiceArray[9], '[9]description', array('span' => 8, 'rows' => 5));
		echo $form->textFieldControlGroup($modelServiceArray[9], '[9]servicing_date');
	?>
	</div>
	<div>
	<?php
		echo TbHtml::button('New Service Data', array('id' => 'newServiceData'));
	?>
	</div>
</fieldset>
<script>
	$(document).ready(function() {
		$('#newServiceData').click(function(e) {
			e.stopImmediatePropagation();
			var serviceNr = $('.serviceData:visible').data('servicenr');
			if(($('#ServicingData_' + serviceNr + '_serviceid').val() != '' || $('#ServicingData_' + serviceNr + '_service_name').val() != '') && $('#ServicingData_' + serviceNr + '_service_type').val() != '' && $('#ServicingData_' + serviceNr + '_mileage').val() != '' && $('#ServicingData_' + serviceNr + '_description').val() != '' && $('#ServicingData_' + serviceNr + '_servicing_date').val() != '')
			{
				if(serviceNr == 10)
				{
					alert('You entered maximum number of servicing data.');
				} else {
					if(confirm('Are you sure you completed servicing data and want to add a new one?'))
					{
						$('.serviceData').hide();
						$('#serviceData' + (serviceNr + 1)).show();
					}
				}
			} else {
				alert('Please fill the servicing data.');
			}
		});
	});
</script>