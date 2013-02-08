
<?php

class Form extends Controller {
	
	function index()
	{
	  //loads helper classes
		$this->load->helper(array('form', 'url'));
		//load validation library
		$this->load->library('validation');
			
		//set validation rules	
		
		$rules['year']		= "required";
		
		
		
		$this->validation->set_rules($rules);
	
	  //set fields for view
	  $fields['username']	= 'Username';
	  $fields['password']	= 'Password';
	  $fields['passconf']	= 'Password Confirmation';
	  $fields['email']	= 'Email Address';
	  $fields['image_title']	= 'Image Title';
	  $fields['image_caption']	= 'Image Caption';
	  $fields['image_credit']	= 'Image Credit';
    $this->validation->set_fields($fields);
			
		if ($this->validation->run() == FALSE)
		{
		  $fields['success']="";
			$this->load->view('myform',$fields);
		}
		else
		{
		  $fields['success']='<span style="color:#dd0000">The Form has been successfully submitted</span>';
			$this->load->view('myform',$fields);
		}
	}
	
	function stamps()
	{
	  $fields['success']="please submit";
	  //loads helper classes
		$this->load->helper(array('form', 'url'));
		//load validation library
		$this->load->library('validation');
			
		//set validation rules	
		
		$rules['year']		= "required";
		
		
		
		$this->validation->set_rules($rules);
	
	  //set fields for view
	  $fields['username']	= 'Username';
	  $fields['password']	= 'Password';
	  $fields['passconf']	= 'Password Confirmation';
	  $fields['email']	= 'Email Address';
	  $fields['image_title']	= 'Image Title';
	  $fields['image_caption']	= 'Image Caption';
	  $fields['image_credit']	= 'Image Credit';
    $this->validation->set_fields($fields);
			
		if ($this->validation->run() == FALSE)
		{
		  $fields['success']="";
		  $fields['title']='Stamps Data Base';
		  //$template=$this->load->view('admin/head2',$fields,true);
		  //$template.=$this->load->view('admin/admin_stamp_catalogue_view',$fields,true);
  
  
   //$this->load->library('filterclass');
  
   //filter for blocks and other transcluded elements
    
    //$template=$this->filterclass->filterAll($template);
  
    
   //Manually set the output class to template before sending it to view
   //$this->output->set_output($template);
   //echo $template; 
	 //let us view what we got by sending data and choosing the view
	 //no need to send data or anything else since it all lives
	 //in output class now.
	 //$this->load->view($template,$fields);
	  //$this->load->view('admin/head2',$fields);
	  $this->load->view('admin/admin_stamp_catalogue_view',$fields);
		}
		else
		{
		  
		  $fields['success']='<span style="color:#dd0000">The Form has been successfully submitted</span>';
		  //$this->load->view('admin/head2',$fields);
			$this->load->view('admin/admin_stamp_catalogue_view',$fields);
		}
	}
	
	
	
	
	
	
	
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

