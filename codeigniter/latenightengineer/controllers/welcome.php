<?php

class Welcome extends Controller {

	function Welcome()
	{
		parent::Controller();	
	}
	
	function index()
	{
	  redirect('Blogs/post/Home');
  }
}

/* End of file welcome.php */
/* Location: ./system/application/controllers/welcome.php */