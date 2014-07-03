<?php

class profile_define_regexp extends profile_define_base {

    function define_form_specific($form) {
        /// Default data
        $form->addElement('text', 'defaultdata', get_string('profiledefaultdata', 'admin'), 'size="50"');
        $form->setType('defaultdata', PARAM_TEXT);

        /// Param 1 for text type is the size of the field
        $form->addElement('text', 'param1', get_string('profilefieldsize', 'admin'), 'size="7"');
        $form->setDefault('param1', 30);
        $form->setType('param1', PARAM_INT);

        /// Param 2 for text type is the maxlength of the field
        $form->addElement('text', 'param2', get_string('profilefieldmaxlength', 'admin'), 'size="6"');
        $form->setDefault('param2', 2048);
        $form->setType('param2', PARAM_INT);

        /// Param 3 Regular Expression
	$form->addElement('text', 'param3', get_string('profilefieldregexp', 'profilefield_regexp'), 'size="50"');
        $form->setDefault('param3', '*');
        $form->setType('param3', PARAM_TEXT);

        /// Param 4 Regular Expression
	$form->addElement('text', 'param4', get_string('profilefieldregexperrormessage', 'profilefield_regexp'), 'size="80"');
        $form->setDefault('param4', 'regexperrormessage');
        $form->setType('param4', PARAM_TEXT);
    }

}
