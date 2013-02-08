<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
/**
 * @category accentCms
 * @name autoform.php
 * @version 1.0
 * @author Joost van Veen
 * @copyright Copyright (c) Accent Webdesign (http://www.accentwebdesign.nl)
 * @created: Sun Nov 30 18:19:59 GMT 2008 18:19:59
 * AUTO FORMS FROM A DIFFERENT ANGLE
 */

class Formsauto {

    /**
     * $results: a key=>value pair Array. This array consists of all the form
     * elements for which attribute 'ignore' was not set or has no value.
     *
     * @var Array
     */
    public $results = array();

    /**
     * Array containing the following keys for every element:
     * - Label
     * - Form input (e.g. <input type="text" value="iniValue" class="inputClass" maxlebgth="15" />)
     * - Prepend
     * - Error message (the message returned by CI form_validation class)
     * - Append
     *
     * This array can be passed to the view to display the form and its
     * apporpriate values, labels ande error messages.
     *
     * @var Array
     */
    public $form = array();

    /**
     * An Array of form elements that is passed to this library by the
     * controller. It holds all the form elements of which the form consists.
     *
     * @var Array
     */
    public $formElements = array();

    /**
     * String that will hold validation_errors(); from CI's form_validation.
     *
     * @var unknown_type
     */
    public $validationErrors = '';

    /**
     * Boolean value, set to true if a form validated succesfully
     *
     * @var Boolean
     */
    private $_validated = false;

    /**
     * Constructor function
     *
     * @return Autoform
     */
    function Formsauto($formElements = array(), $formId = '')
    {

        // Instantiate the CI libraries so we can work with them
        $CI =& get_instance();

        if (!isset($CI->session)) {
            $CI->load->library('session');
        }

        // Load validation library if necessary.
        // This will also automatically load the CI form helper.
        if (!isset($CI->form_validation)) {
            $CI->load->library('form_validation');
        }

        /**
         * If an array $formElements was passed laoding when this library,
         * initiate a form object and return it.
         */
        if (count($formElements) > 0) {
            $this->initiate($formElements, $formId);
        }
    }

    //  Renders forms where the contents are known
    //  This is really simple
    //  Expects an attribute array
    //  with $name, $id etc and $content

    function render($attributes)
    {
        $s=form_open($attributes['action']);
        $s.=$attributes['content'];
        $s.=form_submit('mysubmit', 'Submit Post!');
        $s.=form_close();
        return $s;
    }

    function initiate($formElements, $formId)
    {

        // Globalize $CI super object so we can use CI libaries like validation
        global $CI;

        $this->formElements = $formElements;

        // Add the formId to Array $this->formElements as form_hidden
        array_unshift($this->formElements, array('attributes' => array('name' => 'frmId'), 'type' => 'form_hidden', 'ignore' => true, 'value' => $formId));

        // Set validation rules and user friendly names for this form
        $this->_setValidationRules();

        // Validate and store the post values if the form was posted
        if ($CI->input->post($this->formElements[0]['attributes']['name'])) {

            // Does this form validate?
            if ($CI->form_validation->run() == TRUE) {

                // Set 'validated' to true
                $this->_validated = true;

                // Construct an array of fields that need to be processes and their values
                foreach ($this->formElements as $element) {

                    // Store values that do not need to be ignored in a key=>value array.
                    if (!isset($element['ignore']) || $element['ignore'] == FALSE) {
                        $this->results[$element['attributes']['name']] = $this->_getCurrentValue($element);
                    }

                    foreach ($this->formElements as $key => $element) {
                        $this->formElements[$key]['value'] = $this->_getCurrentValue($element);
                    }

                }
            }
            else {

                // Set CI form_validation validation errors. This error contains
                // all validation errors for this form and can be shown in the
                // view, above the form. In addition, an individual error for
                // each form element is set in $element['error']
                $this->validationErrors = validation_errors();

                foreach ($this->formElements as $key => $element) {
                    $this->formElements[$key]['value'] = $this->_getCurrentValue($element);
                }

            }
        }

        // Store the complete form in $this->form
        $this->form = $this->_constructForm();

        // Return an instance of this form object
        return $this;
    }

    /**
     * Return true if form validated, false if it did not.
     *
     * @return Boolean
     */
    function validationRun()
    {

        return $this->_validated;
    }

    /**
     * Return a key=>value pair array of results that were NOT set to be ignored.
     *
     * @return Array
     */
    function getResults()
    {

        return $this->results;
    }

    /**
     * Return an array with form elements, their values, HTML for input, errors, etc.
     *
     * @return Array
     */
    function getForm()
    {

        return $this->form;
    }

    function getValidationErrors()
    {

        return $this->validationErrors;
    }

    /**
     * Return debug messages
     *
     * @return String
     */
    function getDebugReport()
    {
        $return = '';

        $return .= '<fieldset><legend>Form metadata</legend>';
        $return .= 'validated => ' . $this->_validated . '<br />';
        $return .= 'validation_errors => ' . $this->validationErrors . '<br />';
        $return .= '</fieldset><br />';

        $return .= '<fieldset><legend>Results</legend>';
        foreach ($this->results as $key => $value) {
            $return .= $key . ' => ' . $value . '<br />';
        }
        $return .= '</fieldset><br />';

        $return .= '<fieldset><legend>Formelents hidden</legend>';
        foreach ($this->form['hidden'] as $value) {
            $return .= htmlentities($value['input']) . '<br />';
        }
        $return .= '</fieldset><br />';

        $return .= '<fieldset><legend>Formelents visible</legend>';
        foreach ($this->form['visible'] as $value) {
            $return .= htmlentities($value['input']) . '<br />';
        }
        $return .= '</fieldset><br />';

        $return .= '<fieldset><legend>Uploaded files</legend>';
        foreach ($_FILES as $file) {
            $return .= '<pre>' . print_r($file, true) . '</pre>';
        }
        $return .= '</fieldset><br />';

        return $return;
    }

    /**
     * Set validation rules for this form.
     */
    function _setValidationRules()
    {

        // Globalize $CI super object so we can use CI libaries like validation
        global $CI;

        // Set validation for every form element
        foreach ($this->formElements as $element) {

            // Define user friendly name
            if (isset($element['label'])) {
                $friendlyName = $element['label'];
            }
            else {
                $friendlyName = $element['attributes']['name'];
            }

            // Define validation
            if (isset($element['validation'])) {
                $validation = $element['validation'];
            }
            else { // No validation was set, set to a default validation.
                $validation = 'trim';
            }

            $CI->form_validation->set_rules($element['attributes']['name'], $friendlyName, $validation);
        }
    }

    /**
     * Construct an array with form elements for display in the view. Typical setup for each element:
     * $element['input']
     * $element['label']
     * $element[''prepend]
     * $element['error']
     * $element['append']
     *
     * @return Array
     */
    function _constructForm()
    {

        // Globalize $CI super object so we can use CI libaries like validation
        global $CI;

        $form = array('hidden' => array(), 'visible' => array());

        $iHidden = 0;
        $iVisible = 0;
        foreach ($this->formElements as $element) {

            // Determine if this element goes in 'hidden' or 'visible'
            if ($element['type'] == 'form_hidden') {
                $flag = 'hidden';
                $array = $flag;
                $i = $iHidden;
            }
            else {
                $flag = 'visible';
                $array = $flag;
                $i = $iVisible;
            }

            // Set id
            $form[$array][$i]['id'] = $element['attributes']['name'];

            // Set id attribute if name is not like name[]
            $element['attributes']['id'] = $element['attributes']['name'];

            // Define input
            // Set private function name
            $method = '_' . $element['type'];
            // Set input, calling private function
            $form[$array][$i]['input'] = $this->$method($element);

            // Define label
            if (isset($element['label'])) {
                $label = $element['label'];
            }
            else {
                $label = '';
            }
            $form[$array][$i]['label'] = $label;

            // Define error
            $form[$array][$i]['error'] = form_error($element['attributes']['name']);

            // Define prepend
            if (isset($element['prepend'])) {
                $prepend = $element['prepend'];
            }
            else {
                $prepend = '';
            }
            $form[$array][$i]['prepend'] = $prepend;

            // Define append
            if (isset($element['append'])) {
                $append = $element['append'];
            }
            else {
                $append = '';
            }
            $form[$array][$i]['append'] = $append;

            // Increase $iHidden or $iVisible, which ever is set
            if ($flag == 'hidden') {
                $iHidden++;
            }
            else {
                $iVisible++;
            }
        }

        return $form;

    }

    function _form_hidden($element)
    {
        return $element['type']($element['attributes']['name'], $element['value']);
    }

    function _form_input($element)
    {
        $element['attributes']['value'] = $element['value'];
        return $element['type']($element['attributes']);
    }

    function _form_password($element)
    {
        $element['attributes']['value'] = $element['value'];
        return $element['type']($element['attributes']);
    }

    function _form_textarea($element)
    {
        $element['attributes']['value'] = $element['value'];
        return $element['type']($element['attributes']);
    }

    function _form_upload($element)
    {
        $element['attributes']['value'] = $element['value'];
        return $element['type']($element['attributes']);
    }

    function _form_dropdown($element)
    {

        // Remove name from attributes and store it
        $name = $element['attributes']['name'];
        unset($element['attributes']['name']);

        // Turn attributes into string to store in fourth parameter
        $extra = '';
        foreach ($element['attributes'] as $key => $value) {
            $extra .= ' ' . $key . '="' . $value . '"';
        }
        $extra = substr($extra, 1);

        if (!isset($element['options'])) {
            $element['options'] = array();
        }
        // All inputs arewritten in one giant chunk of html anyway, so we
        // might just as well strip all linebreaks in dropdown
        return str_replace("\n", '', $element['type']($name, $element['options'], $element['value'], $extra));
    }

    function _form_checkbox($element)
    {

        $element['attributes']['value'] = $element['valueIfChecked'];

        $element['attributes']['checked'] = ($element['valueIfChecked'] == $element['value']) ? TRUE : FALSE;
        return $element['type']($element['attributes']);
    }

    function _form_radio($element)
    {
        $element['attributes']['value'] = $element['valueIfChecked'];

        $element['attributes']['checked'] = ($element['valueIfChecked'] == $element['value']) ? TRUE : FALSE;
        return $element['type']($element['attributes']);
    }

    function _form_submit($element)
    {
        $element['attributes']['value'] = $element['value'];
        return $element['type']($element['attributes']);
    }

    function _form_reset($element)
    {
        $element['attributes']['value'] = $element['value'];
        return $element['type']($element['attributes']);
    }

    function _form_button($element)
    {
        $element['attributes']['value'] = $element['value'];
        $element['attributes']['content'] = $element['value'];
        return $element['type']($element['attributes']);
    }

    /**
     * Create a random string
     * create a captcha image using this string
     * store the captcha string in CI session
     * Store a captcha image in files/gfx/captcha
     * return an image tag with this image as src, and an input field
     *
     * Captcha validation is done in libraries/MY_validation
     *
     * @param Array $element
     * @return String
     */
    function _form_captcha($element)
    {

        // Global CI so we can use CI session class
        global $CI;

        $return = '';

        // Create and store captcha image
        $cap = $this->_setCaptcha(5);

        // Set up return string
        $return .= form_input($element['attributes']);
        $return .= '&nbsp;';
        $return .= $cap['image'];
        //$cap['image'] | $cap['word'];

        // Store captcha string in session.
        $newdata = array('captcha_word'  => $cap['word']);
        $CI->session->set_userdata($newdata);

        return $return;
    }

    /**
     * // Return the correct values for a form element.
     * Typically, this would be teh intiatl value if there was no post, or the
     * post value if tehre was a post. post values are taken from form_validation
     * library where possible, otherwise from $CI->inpt->post, XSS filtering ON
     *
     * @param Array $element
     * @return Mixed
     */
    function _getCurrentValue($element)
    {
        // Globalize $CI super object so we can use CI libaries like validation
        global $CI;

        $value = '';

        if(preg_match('/(.*)\[(.*)\]/', $element['attributes']['name'], $matches)) {

            // This result is an array, like fieldname[foo]
            // Fetch the input Array for this field
            $tmpInput = $CI->input->post($matches[1], TRUE);

            // Store the value for this g=field => key in $value
            if (isset($tmpInput[$matches[2]])) {
                $value =  $tmpInput[$matches[2]];
            }

        }
        else {
            if ($element['type'] == 'form_submit' || $element['type'] == 'form_reset' || $element['type'] == 'form_button') {
                // Do not get value from post, the value is constant
                $value = $element['value'];
            }
            else {
                // get value from input. From CI 1.7.0, this $CI->input->post
                // value is sanitized by any fucntions set in form_validation
                $value = $CI->input->post($element['attributes']['name'], TRUE);
            }
        }



        return $value;
    }

    /**
     * Stel een captcha in
     *
     * @param Integer $numChars - het anatal characters in de captcha afbeelding
     * @return unknown
     */
    function _setCaptcha ($numChars) {

        global $CI;

        if (!function_exists('create_captcha')) {
            $CI->load->plugin('captcha');
        }
        $data = array(
        'word'		 => strtoupper($this->_createWord(5)),
        'img_path'	 => './files/gfx/captcha/',
        'img_url'	 => $CI->config->item('base_url') . 'files/gfx/captcha/',
        'font_path'	 => BASEPATH . 'fonts/ariblk.ttf',
        'img_width'	 => '150',
        'img_height' => 30,
        'expiration' => 7200
        );

        $cap = create_captcha($data);
        return $cap;
        //echo $cap['image'];
        //echo $cap['word'];

    }

    /**
     * Maak een random string van een bepaald aantal characters, ten behoeve van captcha
     *
     * @param Integer $var_MaxLength
     * @return String - het woord
     */
    function _createWord ($str_length = "8") {

        // start with blank password
        $var_Password = "";

        // characters to pick from
        $var_Possible = "2345678Abcdfghjkmnpqrstvwxyz";

        $i = 0;
        while( ($i < $str_length) && (strlen($var_Possible) > 0) )
        { //: Not yet reached required length for password
            $i++;

            // get rand character from possibles
            $var_Character = substr($var_Possible, mt_rand(0, strlen($var_Possible)-1), 1);

            // delete selected char from possible choices
            $var_Possible = preg_replace("/$var_Character/", "", $var_Possible);

            $var_Password .= $var_Character;

        } // end not yet reached required length

        return $var_Password; // all done

    }
}