<fieldset id="servicingDataFieldset">
	<legend>Servicing Data</legend>
	<?php $this->widget('bootstrap.widgets.TbTabs', array(
		'tabs' => array(
			array('label'  => '#1', 'content' =>
				$form->hiddenField($modelServiceArray[0], '[0]servicing_dataid') .
				$form->hiddenField($modelServiceArray[0], '[0]vehicleid') .
				((Yii::app()->user->getState('userRoles')['isAdmin']) ?
					$form->dropDownListControlGroup($modelServiceArray[0], '[0]serviceid', CHtml::listData(Company::model()->findAll(), 'partyid', 'company_name'), array('empty' => '')) :
					$form->hiddenField($modelServiceArray[0], '[0]serviceid', array('value' => Yii::app()->user->id))) .
				((Yii::app()->user->getState('userRoles')['isAdmin']) ?
					$form->textFieldControlGroup($modelServiceArray[0], '[0]service_name', array('size' => 60, 'maxlength' => 254)) :
					$form->hiddenField($modelServiceArray[0], '[0]service_name', array('value' => ''))) .
				((Yii::app()->user->getState('userRoles')['isAdmin']) ?
					$form->dropDownListControlGroup($modelServiceArray[0], '[0]data_provider', CHtml::listData(Company::model()->findAll(), 'partyid', 'company_name'), array('empty' => '')) :
					$form->hiddenField($modelServiceArray[0], '[0]data_provider', array('value' => Yii::app()->user->id))) .
				$form->dropDownListControlGroup($modelServiceArray[0], '[0]service_type', CHtml::listData(ServicingType::model()->findAll(), 'servicing_typeid', 'servicing_type_name'), array('empty' => '')) .
				$form->textFieldControlGroup($modelServiceArray[0], '[0]mileage') .
				$form->textAreaControlGroup($modelServiceArray[0], '[0]description', array('span' => 8, 'rows' => 5)) .
				$form->textFieldControlGroup($modelServiceArray[0], '[0]servicing_date'),
			'active' => true),
			array('label'  => '#2', 'content' =>
				$form->hiddenField($modelServiceArray[1], '[1]servicing_dataid') .
				$form->hiddenField($modelServiceArray[1], '[1]vehicleid') .
				((Yii::app()->user->getState('userRoles')['isAdmin']) ?
					$form->dropDownListControlGroup($modelServiceArray[1], '[1]serviceid', CHtml::listData(Company::model()->findAll(), 'partyid', 'company_name'), array('empty' => '')) :
					$form->hiddenField($modelServiceArray[1], '[1]serviceid', array('value' => Yii::app()->user->id))) .
				((Yii::app()->user->getState('userRoles')['isAdmin']) ?
					$form->textFieldControlGroup($modelServiceArray[1], '[1]service_name', array('size' => 60, 'maxlength' => 254)) :
					$form->hiddenField($modelServiceArray[1], '[1]service_name', array('value' => ''))) .
				((Yii::app()->user->getState('userRoles')['isAdmin']) ?
					$form->dropDownListControlGroup($modelServiceArray[1], '[1]data_provider', CHtml::listData(Company::model()->findAll(), 'partyid', 'company_name'), array('empty' => '')) :
					$form->hiddenField($modelServiceArray[1], '[1]data_provider', array('value' => Yii::app()->user->id))) .
				$form->dropDownListControlGroup($modelServiceArray[1], '[1]service_type', CHtml::listData(ServicingType::model()->findAll(), 'servicing_typeid', 'servicing_type_name'), array('empty' => '')) .
				$form->textFieldControlGroup($modelServiceArray[1], '[1]mileage') .
				$form->textAreaControlGroup($modelServiceArray[1], '[1]description', array('span' => 8, 'rows' => 5)) .
				$form->textFieldControlGroup($modelServiceArray[1], '[1]servicing_date'),
			),
			array('label'  => '#3', 'content' =>
				$form->hiddenField($modelServiceArray[2], '[2]servicing_dataid') .
				$form->hiddenField($modelServiceArray[2], '[2]vehicleid') .
				((Yii::app()->user->getState('userRoles')['isAdmin']) ?
					$form->dropDownListControlGroup($modelServiceArray[2], '[2]serviceid', CHtml::listData(Company::model()->findAll(), 'partyid', 'company_name'), array('empty' => '')) :
					$form->hiddenField($modelServiceArray[2], '[2]serviceid', array('value' => Yii::app()->user->id))) .
				((Yii::app()->user->getState('userRoles')['isAdmin']) ?
					$form->textFieldControlGroup($modelServiceArray[2], '[2]service_name', array('size' => 60, 'maxlength' => 254)) :
					$form->hiddenField($modelServiceArray[2], '[2]service_name', array('value' => ''))) .
				((Yii::app()->user->getState('userRoles')['isAdmin']) ?
					$form->dropDownListControlGroup($modelServiceArray[2], '[2]data_provider', CHtml::listData(Company::model()->findAll(), 'partyid', 'company_name'), array('empty' => '')) :
					$form->hiddenField($modelServiceArray[2], '[2]data_provider', array('value' => Yii::app()->user->id))) .
				$form->dropDownListControlGroup($modelServiceArray[2], '[2]service_type', CHtml::listData(ServicingType::model()->findAll(), 'servicing_typeid', 'servicing_type_name'), array('empty' => '')) .
				$form->textFieldControlGroup($modelServiceArray[2], '[2]mileage') .
				$form->textAreaControlGroup($modelServiceArray[2], '[2]description', array('span' => 8, 'rows' => 5)) .
				$form->textFieldControlGroup($modelServiceArray[2], '[2]servicing_date'),
			),
			array('label'  => '#4', 'content' =>
				$form->hiddenField($modelServiceArray[3], '[3]servicing_dataid') .
				$form->hiddenField($modelServiceArray[3], '[3]vehicleid') .
				((Yii::app()->user->getState('userRoles')['isAdmin']) ?
					$form->dropDownListControlGroup($modelServiceArray[3], '[3]serviceid', CHtml::listData(Company::model()->findAll(), 'partyid', 'company_name'), array('empty' => '')) :
					$form->hiddenField($modelServiceArray[3], '[3]serviceid', array('value' => Yii::app()->user->id))) .
				((Yii::app()->user->getState('userRoles')['isAdmin']) ?
					$form->textFieldControlGroup($modelServiceArray[3], '[3]service_name', array('size' => 60, 'maxlength' => 254)) :
					$form->hiddenField($modelServiceArray[3], '[3]service_name', array('value' => ''))) .
				((Yii::app()->user->getState('userRoles')['isAdmin']) ?
					$form->dropDownListControlGroup($modelServiceArray[3], '[3]data_provider', CHtml::listData(Company::model()->findAll(), 'partyid', 'company_name'), array('empty' => '')) :
					$form->hiddenField($modelServiceArray[3], '[3]data_provider', array('value' => Yii::app()->user->id))) .
				$form->dropDownListControlGroup($modelServiceArray[3], '[3]service_type', CHtml::listData(ServicingType::model()->findAll(), 'servicing_typeid', 'servicing_type_name'), array('empty' => '')) .
				$form->textFieldControlGroup($modelServiceArray[3], '[3]mileage') .
				$form->textAreaControlGroup($modelServiceArray[3], '[3]description', array('span' => 8, 'rows' => 5)) .
				$form->textFieldControlGroup($modelServiceArray[3], '[3]servicing_date'),
			),
			array('label'  => '#5', 'content' =>
				$form->hiddenField($modelServiceArray[4], '[4]servicing_dataid') .
				$form->hiddenField($modelServiceArray[4], '[4]vehicleid') .
				((Yii::app()->user->getState('userRoles')['isAdmin']) ?
					$form->dropDownListControlGroup($modelServiceArray[4], '[4]serviceid', CHtml::listData(Company::model()->findAll(), 'partyid', 'company_name'), array('empty' => '')) :
					$form->hiddenField($modelServiceArray[4], '[4]serviceid', array('value' => Yii::app()->user->id))) .
				((Yii::app()->user->getState('userRoles')['isAdmin']) ?
					$form->textFieldControlGroup($modelServiceArray[4], '[4]service_name', array('size' => 60, 'maxlength' => 254)) :
					$form->hiddenField($modelServiceArray[4], '[4]service_name', array('value' => ''))) .
				((Yii::app()->user->getState('userRoles')['isAdmin']) ?
					$form->dropDownListControlGroup($modelServiceArray[4], '[4]data_provider', CHtml::listData(Company::model()->findAll(), 'partyid', 'company_name'), array('empty' => '')) :
					$form->hiddenField($modelServiceArray[4], '[4]data_provider', array('value' => Yii::app()->user->id))) .
				$form->dropDownListControlGroup($modelServiceArray[4], '[4]service_type', CHtml::listData(ServicingType::model()->findAll(), 'servicing_typeid', 'servicing_type_name'), array('empty' => '')) .
				$form->textFieldControlGroup($modelServiceArray[4], '[4]mileage') .
				$form->textAreaControlGroup($modelServiceArray[4], '[4]description', array('span' => 8, 'rows' => 5)) .
				$form->textFieldControlGroup($modelServiceArray[4], '[4]servicing_date'),
			),
			array('label'  => '#6', 'content' =>
				$form->hiddenField($modelServiceArray[5], '[5]servicing_dataid') .
				$form->hiddenField($modelServiceArray[5], '[5]vehicleid') .
				((Yii::app()->user->getState('userRoles')['isAdmin']) ?
					$form->dropDownListControlGroup($modelServiceArray[5], '[5]serviceid', CHtml::listData(Company::model()->findAll(), 'partyid', 'company_name'), array('empty' => '')) :
					$form->hiddenField($modelServiceArray[5], '[5]serviceid', array('value' => Yii::app()->user->id))) .
				((Yii::app()->user->getState('userRoles')['isAdmin']) ?
					$form->textFieldControlGroup($modelServiceArray[5], '[5]service_name', array('size' => 60, 'maxlength' => 254)) :
					$form->hiddenField($modelServiceArray[5], '[5]service_name', array('value' => ''))) .
				((Yii::app()->user->getState('userRoles')['isAdmin']) ?
					$form->dropDownListControlGroup($modelServiceArray[5], '[5]data_provider', CHtml::listData(Company::model()->findAll(), 'partyid', 'company_name'), array('empty' => '')) :
					$form->hiddenField($modelServiceArray[5], '[5]data_provider', array('value' => Yii::app()->user->id))) .
				$form->dropDownListControlGroup($modelServiceArray[5], '[5]service_type', CHtml::listData(ServicingType::model()->findAll(), 'servicing_typeid', 'servicing_type_name'), array('empty' => '')) .
				$form->textFieldControlGroup($modelServiceArray[5], '[5]mileage') .
				$form->textAreaControlGroup($modelServiceArray[5], '[5]description', array('span' => 8, 'rows' => 5)) .
				$form->textFieldControlGroup($modelServiceArray[5], '[5]servicing_date'),
			),
			array('label'  => '#7', 'content' =>
				$form->hiddenField($modelServiceArray[6], '[6]servicing_dataid') .
				$form->hiddenField($modelServiceArray[6], '[6]vehicleid') .
				((Yii::app()->user->getState('userRoles')['isAdmin']) ?
					$form->dropDownListControlGroup($modelServiceArray[6], '[6]serviceid', CHtml::listData(Company::model()->findAll(), 'partyid', 'company_name'), array('empty' => '')) :
					$form->hiddenField($modelServiceArray[6], '[6]serviceid', array('value' => Yii::app()->user->id))) .
				((Yii::app()->user->getState('userRoles')['isAdmin']) ?
					$form->textFieldControlGroup($modelServiceArray[6], '[6]service_name', array('size' => 60, 'maxlength' => 254)) :
					$form->hiddenField($modelServiceArray[6], '[6]service_name', array('value' => ''))) .
				((Yii::app()->user->getState('userRoles')['isAdmin']) ?
					$form->dropDownListControlGroup($modelServiceArray[6], '[6]data_provider', CHtml::listData(Company::model()->findAll(), 'partyid', 'company_name'), array('empty' => '')) :
					$form->hiddenField($modelServiceArray[6], '[6]data_provider', array('value' => Yii::app()->user->id))) .
				$form->dropDownListControlGroup($modelServiceArray[6], '[6]service_type', CHtml::listData(ServicingType::model()->findAll(), 'servicing_typeid', 'servicing_type_name'), array('empty' => '')) .
				$form->textFieldControlGroup($modelServiceArray[6], '[6]mileage') .
				$form->textAreaControlGroup($modelServiceArray[6], '[6]description', array('span' => 8, 'rows' => 5)) .
				$form->textFieldControlGroup($modelServiceArray[6], '[6]servicing_date'),
			),
			array('label'  => '#8', 'content' =>
				$form->hiddenField($modelServiceArray[7], '[7]servicing_dataid') .
				$form->hiddenField($modelServiceArray[7], '[7]vehicleid') .
				((Yii::app()->user->getState('userRoles')['isAdmin']) ?
					$form->dropDownListControlGroup($modelServiceArray[7], '[7]serviceid', CHtml::listData(Company::model()->findAll(), 'partyid', 'company_name'), array('empty' => '')) :
					$form->hiddenField($modelServiceArray[7], '[7]serviceid', array('value' => Yii::app()->user->id))) .
				((Yii::app()->user->getState('userRoles')['isAdmin']) ?
					$form->textFieldControlGroup($modelServiceArray[7], '[7]service_name', array('size' => 60, 'maxlength' => 254)) :
					$form->hiddenField($modelServiceArray[7], '[7]service_name', array('value' => ''))) .
				((Yii::app()->user->getState('userRoles')['isAdmin']) ?
					$form->dropDownListControlGroup($modelServiceArray[7], '[7]data_provider', CHtml::listData(Company::model()->findAll(), 'partyid', 'company_name'), array('empty' => '')) :
					$form->hiddenField($modelServiceArray[7], '[7]data_provider', array('value' => Yii::app()->user->id))) .
				$form->dropDownListControlGroup($modelServiceArray[7], '[7]service_type', CHtml::listData(ServicingType::model()->findAll(), 'servicing_typeid', 'servicing_type_name'), array('empty' => '')) .
				$form->textFieldControlGroup($modelServiceArray[7], '[7]mileage') .
				$form->textAreaControlGroup($modelServiceArray[7], '[7]description', array('span' => 8, 'rows' => 5)) .
				$form->textFieldControlGroup($modelServiceArray[7], '[7]servicing_date'),
			),
			array('label'  => '#9', 'content' =>
				$form->hiddenField($modelServiceArray[8], '[8]servicing_dataid') .
				$form->hiddenField($modelServiceArray[8], '[8]vehicleid') .
				((Yii::app()->user->getState('userRoles')['isAdmin']) ?
					$form->dropDownListControlGroup($modelServiceArray[8], '[8]serviceid', CHtml::listData(Company::model()->findAll(), 'partyid', 'company_name'), array('empty' => '')) :
					$form->hiddenField($modelServiceArray[8], '[8]serviceid', array('value' => Yii::app()->user->id))) .
				((Yii::app()->user->getState('userRoles')['isAdmin']) ?
					$form->textFieldControlGroup($modelServiceArray[8], '[8]service_name', array('size' => 60, 'maxlength' => 254)) :
					$form->hiddenField($modelServiceArray[8], '[8]service_name', array('value' => ''))) .
				((Yii::app()->user->getState('userRoles')['isAdmin']) ?
					$form->dropDownListControlGroup($modelServiceArray[8], '[8]data_provider', CHtml::listData(Company::model()->findAll(), 'partyid', 'company_name'), array('empty' => '')) :
					$form->hiddenField($modelServiceArray[8], '[8]data_provider', array('value' => Yii::app()->user->id))) .
				$form->dropDownListControlGroup($modelServiceArray[8], '[8]service_type', CHtml::listData(ServicingType::model()->findAll(), 'servicing_typeid', 'servicing_type_name'), array('empty' => '')) .
				$form->textFieldControlGroup($modelServiceArray[8], '[8]mileage') .
				$form->textAreaControlGroup($modelServiceArray[8], '[8]description', array('span' => 8, 'rows' => 5)) .
				$form->textFieldControlGroup($modelServiceArray[8], '[8]servicing_date'),
			),
			array('label'  => '#10', 'content' =>
				$form->hiddenField($modelServiceArray[9], '[9]servicing_dataid') .
				$form->hiddenField($modelServiceArray[9], '[9]vehicleid') .
				((Yii::app()->user->getState('userRoles')['isAdmin']) ?
					$form->dropDownListControlGroup($modelServiceArray[9], '[9]serviceid', CHtml::listData(Company::model()->findAll(), 'partyid', 'company_name'), array('empty' => '')) :
					$form->hiddenField($modelServiceArray[9], '[9]serviceid', array('value' => Yii::app()->user->id))) .
				((Yii::app()->user->getState('userRoles')['isAdmin']) ?
					$form->textFieldControlGroup($modelServiceArray[9], '[9]service_name', array('size' => 60, 'maxlength' => 254)) :
					$form->hiddenField($modelServiceArray[9], '[9]service_name', array('value' => ''))) .
				((Yii::app()->user->getState('userRoles')['isAdmin']) ?
					$form->dropDownListControlGroup($modelServiceArray[9], '[9]data_provider', CHtml::listData(Company::model()->findAll(), 'partyid', 'company_name'), array('empty' => '')) :
					$form->hiddenField($modelServiceArray[9], '[9]data_provider', array('value' => Yii::app()->user->id))) .
				$form->dropDownListControlGroup($modelServiceArray[9], '[9]service_type', CHtml::listData(ServicingType::model()->findAll(), 'servicing_typeid', 'servicing_type_name'), array('empty' => '')) .
				$form->textFieldControlGroup($modelServiceArray[9], '[9]mileage') .
				$form->textAreaControlGroup($modelServiceArray[9], '[9]description', array('span' => 8, 'rows' => 5)) .
				$form->textFieldControlGroup($modelServiceArray[9], '[9]servicing_date'),
			),
		),
	)); ?>
</fieldset>