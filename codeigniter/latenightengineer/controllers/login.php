<?php


class login extends Controller {

/*	function index()
	{
          $data['todo_list'] = array('Clean House', 'Call Mom', 'Run Errands');
	  $data['title'] = "My Real Title";
	  $data['heading'] = "My Real Heading";
	  $this->load->view('blogview',$data);	
          $this->load->view('welcome_message');
          
	}*/
	
	function index($action="login")
	//main login form
	{
	 $valid=FALSE;$valid1=FALSE;
	//loads helper classes
		$this->load->helper(array('form', 'url'));
		//load validation library
		$this->load->library('validation');
			
		//set validation rules	
		$rules['userid']	= "callback_username_check";
		$rules['password']	= "required";
				
	  $this->validation->set_rules($rules);
	
	  if ($this->validation->run() == FALSE)
		{
		  //if not valid data or no _POST do
		  $data['message']="";
		  $valid=FALSE;
		}
		else
		{
		$data['message']='validated';
		$valid=TRUE;
		}
		echo 'Checking validation '.$valid;
	  
	  //set fields for view
	  //$fields['username']	= 'Username';
	  //$fields['password']	= 'Password';
	  //$fields['passconf']	= 'Password Confirmation';
	  //$fields['email']	= 'Email Address';
	  //$fields['image_title']	= 'Image Title';
	  //$fields['image_caption']	= 'Image Caption';
	  //$fields['image_credit']	= 'Image Credit';
    //$this->validation->set_fields($fields);
    
    //Check through database first
    // 
    
	  if (isset($_POST['userid']) && isset ($_POST['password']) && ($this->validation->run() == TRUE)){
	   
	   echo_array ($_POST);
	    //check if in database
	    
	    $query='select * from user  '
	            ."where user_login='".$_POST['userid']."'";
	    $query = $this->db->query($query);
      if ($query->num_rows() > 0)
      {
      foreach ($query->result() as $row)
      {
       //echo $row->user_login;
       //echo $row->user_pass;
       $data['message']='You are now logged in';
       
      }
      $valid1=TRUE;
     }
     }
     else
	   {
	    $data['message']='Not in database Login';
	    $valid1=FALSE;
	   
	   } 
	   
	   echo 'validation test  '.$valid; echo 'database test '.$valid1;
	   if (($valid==TRUE)&&($valid1==TRUE)) {$this->load->view('login_success_view',$data);}
	    else
	    {
	     $this->load->view('login_view',$data);
	    }
	  
	  	  

 	}//function index
 	
	function username_check($str)
	{
		if ($str == 'test')
		{
			$this->validation->set_message('username_check', 'The %s field cannot be the word "test"');
			return FALSE;
		}
		else
		{
			return TRUE;
		}
	}
	
}
?>