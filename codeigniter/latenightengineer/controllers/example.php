<?php
/**
 * @category accentCms
 * @name example.php
 * @version 1.0
 * @author Joost van Veen
 * @copyright Copyright (c) Accent Webdesign (http://www.accentwebdesign.nl)
 * @created: Sun Nov 30 18:13:17 GMT 2008 18:13:17
 */

class Example extends Controller {

    public $data = array(); //Holds all data that will be passed to the view

    function __construct() {

        parent::Controller();

    }

    function index() {
        echo '<h1>Welcome</h1>This is the example controller';
    }

    /**
     * Set an example form, validation an results.
     * This example demonstrates use of the custom Autoform library.
     */
    function form()
    {

        // Set an array containing the form elements
        $formElements = $this->_setForm();

        // Load the custom Autoform library
        $this->load->library('autoform');

        // Define a form object
        $autoform = $this->autoform->initiate($formElements, 'testForm');

        // Validate the form
        if ($autoform->validationRun()) {

            // Validation was succesful. Fetch the form data for processing.
            // The form data are returned as a key => value pair Array.
            // This array consists of all the form elements for which attribute
            // 'ignore' was not set or has no value.
            $form = $this->autoform->getResults();

            // echo '<pre>' . print_r($autoform->getResults(), true) . '</pre>';

        }
        else {

            // Validation was not succesful. Fetch the form elements.
            // The form elements are are returned as an array containing the
            // following keys for every element:
            // - Label
            // - Form input (e.g. <input type="text" value="iniValue" class="inputClass" maxlebgth="15" />)
            // - Prepend
            // - Error message (the message returned by CI form_validation class)
            // - Append
            //
            // This array can be passed to the view to display the form and its
            // apporpriate values, labels ande error messages.
            $data['form'] = $autoform;

            // Load the form view and pass $data
            $this->load->view('autoform_view', $data);
        }

        // TODO remove debug print
        echo $autoform->getDebugReport();

    }

    function _setForm()
    {

        // Define array to return.
        $formElements = array();

        /*
        $element['attributes'] (required, Array)
        $element['type'] (required, String - this is the name of the form helper
        function for this element, e.g.
        form_input)
        $element['validation'] = (optional, String)
        $element['value'] (optional, Mixed - this can hold a default value,
        or a value from the database)
        $element['ignore'] (optional, Boolean, default is false)
        $element['prepend'] (optional, String)
        $element['append'] (optional, String)
        $element['label'] (optional, String)
        */

        $formElements[] = array(
        'attributes' => array('name' => 'hidden_field'),
        'type' => 'form_hidden',
        'value' => 'bar'
        );

        // Add form_input
        $formElements[] = array(
        'attributes' => array('name' => 'username', 'maxlength' => '16'),
        'type' => 'form_input',
        'validation' => 'trim|required|md5|xss_clean',
        'label' => 'Username *',
        'value' => 'foo'
        );

        // Add form_password
        $formElements[] = array(
        'attributes' => array('name' => 'password', 'maxlength' => '16'),
        'type' => 'form_password',
        'validation' => 'trim|xss_clean',
        'label' => 'Password',
        'value' => ''
        );

        // Add form_textarea
        $formElements[] = array(
        'attributes' => array('name' => 'comments'),
        'type' => 'form_textarea',
        'validation' => 'trim|xss_clean',
        'label' => 'Comments',
        'value' => ''
        );

        // Add form_dropdown
        // index 'options' is required
        $formElements[] = array(
        'attributes' => array('name' => 'flavour', 'onchange' => "alert(this.value);"),
        'options' => array('0' => '- Choose -', 'BN' => 'Banana', 'ST' => 'Strawberry', 'CR' => 'Cranberries'),
        'type' => 'form_dropdown',
        'validation' => 'trim|xss_clean',
        'label' => 'Flavour',
        'value' => 'BN'
        );

        // Add form_checkbox
        // index 'valueIfChecked' is required
        $formElements[] = array(
        'attributes' => array('name' => 'newsletter'),
        'type' => 'form_checkbox',
        'validation' => 'trim',
        'label' => 'Newsletter',
        'valueIfChecked' => 'subscribe',
        'value' => 'subscribe'
        );

        // Add form_checkbox
        // index 'valueIfChecked' is required
        $formElements[] = array(
        'attributes' => array('name' => 'available[1]'),
        'type' => 'form_checkbox',
        'label' => 'Available',
        'valueIfChecked' => 'mornings',
        'append' => ' mornings',
        'value' => ''
        );
        // Add form_checkbox
        // index 'valueIfChecked' is required
        $formElements[] = array(
        'attributes' => array('name' => 'available[2]'),
        'type' => 'form_checkbox',
        'label' => '&nbsp;',
        'valueIfChecked' => 'afternoons',
        'append' => ' afternoons',
        'value' => ''
        );

        // Add form_radio
        // index 'valueIfChecked' is required
        $formElements[] = array(
        'attributes' => array('name' => 'gender'),
        'type' => 'form_radio',
        'validation' => 'trim',
        'label' => 'Male',
        'valueIfChecked' => 'm',
        'value' => 'm'
        );

        // Add form_radio
        // index 'valueIfChecked' is required
        $formElements[] = array(
        'attributes' => array('name' => 'gender'),
        'type' => 'form_radio',
        'validation' => 'trim',
        'label' => 'Female',
        'valueIfChecked' => 'f',
        'value' => 'f'
        );

        // Add form_upload
        $formElements[] = array(
        'attributes' => array('name' => 'upload'),
        'type' => 'form_upload',
        'label' => 'Upload',
        'ignore' => true,
        'value' => ''
        );

        // Add form_captcha
    /*    $formElements[] = array(
        'attributes' => array('name' => 'captcha', 'maxlength' => '5', 'size' => '7', 'class' => 'input_captcha'),
        'type' => 'form_captcha',
        'label' => 'Captcha',
        'validation' => 'trim|required|captcha|xssclean',
        'ignore' => true,
        'value' => ''
        );*/

        // Add form_submit
        $formElements[] = array(
        'attributes' => array('name' => 'submit'),
        'type' => 'form_submit',
        'ignore' => true,
        'value' => 'Log in!'
        );

        // Add form_reset
        $formElements[] = array(
        'attributes' => array('name' => 'reset'),
        'type' => 'form_reset',
        'ignore' => true,
        'value' => 'Reset form'
        );

        // Add form_button
        $formElements[] = array(
        'attributes' => array('name' => 'button', 'onclick' => "alert('Clicked!');return false;"),
        'type' => 'form_button',
        'ignore' => true,
        'value' => 'Click Me!'
        );

        // Return array of formelemetns
        return $formElements;
    }

}