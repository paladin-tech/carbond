<?php
echo $form->textFieldControlGroup($modelCompany, 'company_name', array('size' => 60, 'maxlength' => 100));
echo $form->textFieldControlGroup($modelCompany, 'address', array('size' => 60, 'maxlength' => 254));
echo $form->textFieldControlGroup($modelCompany, 'city', array('size' => 50, 'maxlength' => 50));
echo $form->textFieldControlGroup($modelCompany, 'tax_number', array('size' => 45, 'maxlength' => 45));
echo $form->textFieldControlGroup($modelCompany, 'registration_number', array('size' => 45, 'maxlength' => 45));
echo $form->textFieldControlGroup($modelCompany, 'contact_person', array('size' => 60, 'maxlength' => 100));
echo $form->textFieldControlGroup($modelCompany, 'email', array('size' => 60, 'maxlength' => 320));
echo $form->textFieldControlGroup($modelCompany, 'phone_number', array('size' => 45, 'maxlength' => 45));
?>