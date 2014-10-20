<fieldset id="servicingDataFieldset">
	<legend>Damage Data</legend>
	<?php $this->widget('bootstrap.widgets.TbTabs', array(
		'tabs' => array(
			array('label'  => '#1', 'content' =>
				$form->hiddenField($modelDamageArray[0], '[0]damage_dataid') .
				$form->hiddenField($modelDamageArray[0], '[0]vehicleid') .
				$form->dropDownListControlGroup($modelDamageArray[0], '[0]insuranceid', CHtml::listData(Company::model()->findAll(), 'partyid', 'company_name'), array('empty' => '')) .
				$form->textFieldControlGroup($modelDamageArray[0], '[0]insurance_name', array('size' => 60, 'maxlength' => 254)) .
				$form->textAreaControlGroup($modelDamageArray[0], '[0]description', array('span' => 8, 'rows' => 5)) .
				$form->dropDownListControlGroup($modelDamageArray[0], '[0]data_provider', CHtml::listData(Company::model()->findAll(), 'partyid', 'company_name'), array('empty' => '')) .
				$form->textFieldControlGroup($modelDamageArray[0], '[0]damage_date') .
				$form->dropDownListControlGroup($modelDamageArray[0], '[0]damage_type', CHtml::listData(DamageType::model()->findAll(), 'damage_typeid', 'damage_type_name'), array('empty' => '')) .
				$form->textFieldControlGroup($modelDamageArray[0], '[0]mileage'),
			'active' => true),
			array('label'  => '#2', 'content' =>
				$form->hiddenField($modelDamageArray[1], '[1]damage_dataid') .
				$form->hiddenField($modelDamageArray[1], '[1]vehicleid') .
				$form->dropDownListControlGroup($modelDamageArray[1], '[1]insuranceid', CHtml::listData(Company::model()->findAll(), 'partyid', 'company_name'), array('empty' => '')) .
				$form->textFieldControlGroup($modelDamageArray[1], '[1]insurance_name', array('size' => 60, 'maxlength' => 254)) .
				$form->textAreaControlGroup($modelDamageArray[1], '[1]description', array('span' => 8, 'rows' => 5)) .
				$form->dropDownListControlGroup($modelDamageArray[1], '[1]data_provider', CHtml::listData(Company::model()->findAll(), 'partyid', 'company_name'), array('empty' => '')) .
				$form->textFieldControlGroup($modelDamageArray[1], '[1]damage_date') .
				$form->dropDownListControlGroup($modelDamageArray[1], '[1]damage_type', CHtml::listData(DamageType::model()->findAll(), 'damage_typeid', 'damage_type_name'), array('empty' => '')) .
				$form->textFieldControlGroup($modelDamageArray[1], '[1]mileage'),
			),
			array('label'  => '#3', 'content' =>
				$form->hiddenField($modelDamageArray[2], '[2]damage_dataid') .
				$form->hiddenField($modelDamageArray[2], '[2]vehicleid') .
				$form->dropDownListControlGroup($modelDamageArray[2], '[2]insuranceid', CHtml::listData(Company::model()->findAll(), 'partyid', 'company_name'), array('empty' => '')) .
				$form->textFieldControlGroup($modelDamageArray[2], '[2]insurance_name', array('size' => 60, 'maxlength' => 254)) .
				$form->textAreaControlGroup($modelDamageArray[2], '[2]description', array('span' => 8, 'rows' => 5)) .
				$form->dropDownListControlGroup($modelDamageArray[2], '[2]data_provider', CHtml::listData(Company::model()->findAll(), 'partyid', 'company_name'), array('empty' => '')) .
				$form->textFieldControlGroup($modelDamageArray[2], '[2]damage_date') .
				$form->dropDownListControlGroup($modelDamageArray[2], '[2]damage_type', CHtml::listData(DamageType::model()->findAll(), 'damage_typeid', 'damage_type_name'), array('empty' => '')) .
				$form->textFieldControlGroup($modelDamageArray[2], '[2]mileage'),
			),
			array('label'  => '#4', 'content' =>
				$form->hiddenField($modelDamageArray[3], '[3]damage_dataid') .
				$form->hiddenField($modelDamageArray[3], '[3]vehicleid') .
				$form->dropDownListControlGroup($modelDamageArray[3], '[3]insuranceid', CHtml::listData(Company::model()->findAll(), 'partyid', 'company_name'), array('empty' => '')) .
				$form->textFieldControlGroup($modelDamageArray[3], '[3]insurance_name', array('size' => 60, 'maxlength' => 254)) .
				$form->textAreaControlGroup($modelDamageArray[3], '[3]description', array('span' => 8, 'rows' => 5)) .
				$form->dropDownListControlGroup($modelDamageArray[3], '[3]data_provider', CHtml::listData(Company::model()->findAll(), 'partyid', 'company_name'), array('empty' => '')) .
				$form->textFieldControlGroup($modelDamageArray[3], '[3]damage_date') .
				$form->dropDownListControlGroup($modelDamageArray[3], '[3]damage_type', CHtml::listData(DamageType::model()->findAll(), 'damage_typeid', 'damage_type_name'), array('empty' => '')) .
				$form->textFieldControlGroup($modelDamageArray[3], '[3]mileage'),
			),
			array('label'  => '#5', 'content' =>
				$form->hiddenField($modelDamageArray[4], '[4]damage_dataid') .
				$form->hiddenField($modelDamageArray[4], '[4]vehicleid') .
				$form->dropDownListControlGroup($modelDamageArray[4], '[4]insuranceid', CHtml::listData(Company::model()->findAll(), 'partyid', 'company_name'), array('empty' => '')) .
				$form->textFieldControlGroup($modelDamageArray[4], '[4]insurance_name', array('size' => 60, 'maxlength' => 254)) .
				$form->textAreaControlGroup($modelDamageArray[4], '[4]description', array('span' => 8, 'rows' => 5)) .
				$form->dropDownListControlGroup($modelDamageArray[4], '[4]data_provider', CHtml::listData(Company::model()->findAll(), 'partyid', 'company_name'), array('empty' => '')) .
				$form->textFieldControlGroup($modelDamageArray[4], '[4]damage_date') .
				$form->dropDownListControlGroup($modelDamageArray[4], '[4]damage_type', CHtml::listData(DamageType::model()->findAll(), 'damage_typeid', 'damage_type_name'), array('empty' => '')) .
				$form->textFieldControlGroup($modelDamageArray[4], '[4]mileage'),
			),
			array('label'  => '#6', 'content' =>
				$form->hiddenField($modelDamageArray[5], '[5]damage_dataid') .
				$form->hiddenField($modelDamageArray[5], '[5]vehicleid') .
				$form->dropDownListControlGroup($modelDamageArray[5], '[5]insuranceid', CHtml::listData(Company::model()->findAll(), 'partyid', 'company_name'), array('empty' => '')) .
				$form->textFieldControlGroup($modelDamageArray[5], '[5]insurance_name', array('size' => 60, 'maxlength' => 254)) .
				$form->textAreaControlGroup($modelDamageArray[5], '[5]description', array('span' => 8, 'rows' => 5)) .
				$form->dropDownListControlGroup($modelDamageArray[5], '[5]data_provider', CHtml::listData(Company::model()->findAll(), 'partyid', 'company_name'), array('empty' => '')) .
				$form->textFieldControlGroup($modelDamageArray[5], '[5]damage_date') .
				$form->dropDownListControlGroup($modelDamageArray[5], '[5]damage_type', CHtml::listData(DamageType::model()->findAll(), 'damage_typeid', 'damage_type_name'), array('empty' => '')) .
				$form->textFieldControlGroup($modelDamageArray[5], '[5]mileage'),
			),
			array('label'  => '#7', 'content' =>
				$form->hiddenField($modelDamageArray[6], '[6]damage_dataid') .
				$form->hiddenField($modelDamageArray[6], '[6]vehicleid') .
				$form->dropDownListControlGroup($modelDamageArray[6], '[6]insuranceid', CHtml::listData(Company::model()->findAll(), 'partyid', 'company_name'), array('empty' => '')) .
				$form->textFieldControlGroup($modelDamageArray[6], '[6]insurance_name', array('size' => 60, 'maxlength' => 254)) .
				$form->textAreaControlGroup($modelDamageArray[6], '[6]description', array('span' => 8, 'rows' => 5)) .
				$form->dropDownListControlGroup($modelDamageArray[6], '[6]data_provider', CHtml::listData(Company::model()->findAll(), 'partyid', 'company_name'), array('empty' => '')) .
				$form->textFieldControlGroup($modelDamageArray[6], '[6]damage_date') .
				$form->dropDownListControlGroup($modelDamageArray[6], '[6]damage_type', CHtml::listData(DamageType::model()->findAll(), 'damage_typeid', 'damage_type_name'), array('empty' => '')) .
				$form->textFieldControlGroup($modelDamageArray[6], '[6]mileage'),
			),
			array('label'  => '#8', 'content' =>
				$form->hiddenField($modelDamageArray[7], '[7]damage_dataid') .
				$form->hiddenField($modelDamageArray[7], '[7]vehicleid') .
				$form->dropDownListControlGroup($modelDamageArray[7], '[7]insuranceid', CHtml::listData(Company::model()->findAll(), 'partyid', 'company_name'), array('empty' => '')) .
				$form->textFieldControlGroup($modelDamageArray[7], '[7]insurance_name', array('size' => 60, 'maxlength' => 254)) .
				$form->textAreaControlGroup($modelDamageArray[7], '[7]description', array('span' => 8, 'rows' => 5)) .
				$form->dropDownListControlGroup($modelDamageArray[7], '[7]data_provider', CHtml::listData(Company::model()->findAll(), 'partyid', 'company_name'), array('empty' => '')) .
				$form->textFieldControlGroup($modelDamageArray[7], '[7]damage_date') .
				$form->dropDownListControlGroup($modelDamageArray[7], '[7]damage_type', CHtml::listData(DamageType::model()->findAll(), 'damage_typeid', 'damage_type_name'), array('empty' => '')) .
				$form->textFieldControlGroup($modelDamageArray[7], '[7]mileage'),
			),
			array('label'  => '#9', 'content' =>
				$form->hiddenField($modelDamageArray[8], '[8]damage_dataid') .
				$form->hiddenField($modelDamageArray[8], '[8]vehicleid') .
				$form->dropDownListControlGroup($modelDamageArray[8], '[8]insuranceid', CHtml::listData(Company::model()->findAll(), 'partyid', 'company_name'), array('empty' => '')) .
				$form->textFieldControlGroup($modelDamageArray[8], '[8]insurance_name', array('size' => 60, 'maxlength' => 254)) .
				$form->textAreaControlGroup($modelDamageArray[8], '[8]description', array('span' => 8, 'rows' => 5)) .
				$form->dropDownListControlGroup($modelDamageArray[8], '[8]data_provider', CHtml::listData(Company::model()->findAll(), 'partyid', 'company_name'), array('empty' => '')) .
				$form->textFieldControlGroup($modelDamageArray[8], '[8]damage_date') .
				$form->dropDownListControlGroup($modelDamageArray[8], '[8]damage_type', CHtml::listData(DamageType::model()->findAll(), 'damage_typeid', 'damage_type_name'), array('empty' => '')) .
				$form->textFieldControlGroup($modelDamageArray[8], '[8]mileage'),
			),
			array('label'  => '#10', 'content' =>
				$form->hiddenField($modelDamageArray[9], '[9]damage_dataid') .
				$form->hiddenField($modelDamageArray[9], '[9]vehicleid') .
				$form->dropDownListControlGroup($modelDamageArray[9], '[9]insuranceid', CHtml::listData(Company::model()->findAll(), 'partyid', 'company_name'), array('empty' => '')) .
				$form->textFieldControlGroup($modelDamageArray[9], '[9]insurance_name', array('size' => 60, 'maxlength' => 254)) .
				$form->textAreaControlGroup($modelDamageArray[9], '[9]description', array('span' => 8, 'rows' => 5)) .
				$form->dropDownListControlGroup($modelDamageArray[9], '[9]data_provider', CHtml::listData(Company::model()->findAll(), 'partyid', 'company_name'), array('empty' => '')) .
				$form->textFieldControlGroup($modelDamageArray[9], '[9]damage_date') .
				$form->dropDownListControlGroup($modelDamageArray[9], '[9]damage_type', CHtml::listData(DamageType::model()->findAll(), 'damage_typeid', 'damage_type_name'), array('empty' => '')) .
				$form->textFieldControlGroup($modelDamageArray[9], '[9]mileage'),
			),
		),
	)); ?>
</fieldset>