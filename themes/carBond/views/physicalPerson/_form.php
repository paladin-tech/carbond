<?php
echo $form->textFieldControlGroup($modelPhysicalPerson, 'first_name', array('readonly' => (isset(Yii::app()->user->id))));
echo $form->textFieldControlGroup($modelPhysicalPerson, 'last_name', array('readonly' => (isset(Yii::app()->user->id))));
echo $form->textFieldControlGroup($modelPhysicalPerson, 'mobile', array('readonly' => (isset(Yii::app()->user->id))));
echo $form->textFieldControlGroup($modelPhysicalPerson, 'email', array('readonly' => (isset(Yii::app()->user->id))));
echo $form->textFieldControlGroup($modelPhysicalPerson, 'city', array('readonly' => (isset(Yii::app()->user->id))));
echo $form->textFieldControlGroup($modelPhysicalPerson, 'country', array('readonly' => (isset(Yii::app()->user->id))));
echo $form->textFieldControlGroup($modelPhysicalPerson, 'district', array('readonly' => (isset(Yii::app()->user->id))));
echo $form->textFieldControlGroup($modelPhysicalPerson, 'zip_code', array('readonly' => (isset(Yii::app()->user->id))));
?>