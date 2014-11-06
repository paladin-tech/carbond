<?php
// Trailer data
echo $form->textFieldControlGroup($model, 'height', array('size' => 7, 'maxlength' => 7));
echo $form->textFieldControlGroup($model, 'no_of_axis');
echo $form->textFieldControlGroup($model, 'max_load', array('size' => 7, 'maxlength' => 7));
echo $form->textFieldControlGroup($model, 'max_weight', array('size' => 7, 'maxlength' => 7));
?>