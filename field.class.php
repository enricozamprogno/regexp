<?php

class profile_field_regexp extends profile_field_base {

    /**
     * Overwrite the base class to display the data for this field
    function display_data() {
        /// Default formatting
        $data = parent::display_data();

        return $data;
    }
*/

    function edit_field_add($mform) {
        $size = $this->field->param1;
        $maxlength = $this->field->param2;
        $regexp= $this->field->param3;

        /// Create the form field
	$mform->addElement('text', $this->inputname, format_string($this->field->name.' '.$regexp), 'maxlength="'.$size.'" size="'.$maxlenght.'" ');
        $mform->setType($this->inputname, PARAM_TEXT);
    }

    function edit_validate_field($usernew) {
        $errors = array();
        $errors = parent::edit_validate_field($usernew);
        
        if (count($errors)==0) {
                // Get input value.
                if (isset($usernew->{$this->inputname})) {
                        if (is_array($usernew->{$this->inputname}) && isset($usernew->{$this->inputname}['text'])) {
                                $value = $usernew->{$this->inputname}['text'];
                        } else {
                                $value = $usernew->{$this->inputname};
                        }
                } else {
                        $value = '';
                }
        }
	if ($value != ''){
		$regexp= $this->field->param3;
		$errmess= $this->field->param4;
		$matches=array();
		$status=preg_match($regexp, $value, $matches);
		if ($status != 1 || ($status == 1 && $matches[0]!=$value)){
			if ($errmess !=''){
				$errors[$this->inputname] = $errmess;
			} else {
				$errors[$this->inputname] = get_string('err_regexp','profilefield_regexp');
			}
		}
	}
        return $errors;
    }
}

