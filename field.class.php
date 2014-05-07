<?php

class profile_field_regexp extends profile_field_base {

    /**
     * Overwrite the base class to display the data for this field
     */
    function display_data() {
        /// Default formatting
        $data = parent::display_data();

        /// Are we creating a link?
        if (!empty($this->field->param4) and !empty($data)) {

            /// Define the target
            if (! empty($this->field->param5)) {
                $target = 'target="'.$this->field->param5.'"';
            } else {
                $target = '';
            }

            /// Create the link
            $data = '<a href="'.str_replace('$$', urlencode($data), $this->field->param4).'" '.$target.'>'.htmlspecialchars($data).'</a>';
        }

        return $data;
    }

    function edit_field_add($mform) {
        $size = $this->field->param1;
        $maxlength = $this->field->param2;
        $fieldtype = ($this->field->param3 == 1 ? 'password' : 'text');
        $regexp= $this->field->param6;

        /// Create the form field
        $mform->addElement($fieldtype, $this->inputname, format_string($this->field->name), 'maxlength="'.$maxlength.'" size="'.$size.'" ', $regexp);
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
                $regexp= $this->field->param3;
                if (!preg_match($regexp, $value))
                        $errors[$this->inputname] = get_string('err_regexp','profilefield_regexp');
        }
        return $errors;
    }
}

