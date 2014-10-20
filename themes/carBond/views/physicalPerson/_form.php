<?php
echo $form->textFieldControlGroup($modelPhysicalPerson, 'first_name', array('readonly' => (isset(Yii::app()->user->id))));
echo $form->textFieldControlGroup($modelPhysicalPerson, 'last_name', array('readonly' => (isset(Yii::app()->user->id))));
echo $form->textFieldControlGroup($modelPhysicalPerson, 'mobile', array('readonly' => (isset(Yii::app()->user->id))));
echo $form->textFieldControlGroup($modelPhysicalPerson, 'email', array('readonly' => (isset(Yii::app()->user->id))));
echo TbHtml::dropDownListControlGroup('country', '', CHtml::listData(Country::model()->findAll(), 'countryid', 'country_name'),
	array(
		'ajax'  => array(
			'type'   => 'POST',
			'url'    => $this->createUrl('site/updateCityDropdown'),
			'update' => '#PhysicalPerson_city',
			'data'   => array(
				'countryId' => 'js:this.value'
			),
		),
		'label' => 'Country',
		'empty' => '',
	)
);
echo $form->dropDownListControlGroup($modelPhysicalPerson, 'city', array(), array('empty' => ''));
echo $form->textFieldControlGroup($modelPhysicalPerson, 'district', array('readonly' => (isset(Yii::app()->user->id))));
echo $form->textFieldControlGroup($modelPhysicalPerson, 'zip_code', array('readonly' => (isset(Yii::app()->user->id))));
?>