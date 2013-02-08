<?php

class Email extends Controller {

function Email(){

// load controller parent

parent::Controller();

// load 'url' helper

$this->load->helper('url');

// load 'form' helper

$this->load->helper('form');

// load 'validation' class

$this->load->library('validation');

// load 'email' class

$this->load->library('email');

}

function index(){

// set validation rules

$rules['firstname']="required|min_length[6]|max_length[15]";

$rules['lastname']="required|min_length[6]|max_length[15]";

$rules['email']="required|valid_email";

$this->validation->set_rules($rules);

// set values to repopulate fields

$fields['firstname']='First Name';

$fields['lastname']= 'Last Name';

$fields['email']='Email Address';

$this->validation->set_fields($fields);

// check if user form has been submitted properly

if ($this->validation->run()==FALSE){

// redisplay user form and repopulate fields

$this->load->view('email_form_view');

}

// display confirmation web page and send email

else{

// set email class settings

$this->email->from($_POST['email'],$_POST['firstname']. ' '.$_POST['lastname']);

$this->email->to('you@domain.com');

$this->email->cc('migirlfriend@domain.com');

$this->email->bcc('myothergirlfriend@domain.com');

$this->email->subject($_POST['subject']);

$this->email->message($_POST['message']);

$data['title']='Sending email...';

$data['header']='Sending email now...';

$data['message']=$this->email->send()?'Message was sent successfully!':'Error sending email!';

$this->load->view('email_view.php',$data);

}

}

}
?>