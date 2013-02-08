<?php


class Install extends Controller {

/*	function index()
	{
          $data['todo_list'] = array('Clean House', 'Call Mom', 'Run Errands');
	  $data['title'] = "My Real Title";
	  $data['heading'] = "My Real Heading";
	  $this->load->view('blogview',$data);	
          $this->load->view('welcome_message');
          
	}*/
	
	function Install($t='gallery')
    {
      parent::Controller();

        $this->load->scaffolding('gallery');
   }
	
	
	function newdb(){
	 //creates a new db
	 //if database not exists do something otherwise add to message
	  $this->load->model('usersmodel');
	  $this->usersmodel->createDB('PI');
	  $this->load->view('template_view');
	}
	
	function newtable($table){
	 //creates a new db
	  $this->load->model('usersmodel');
	  $this->usersmodel->table($table);
	  $this->load->view('template_view');
	}
	
	
	function platform(){
	  $this->load->model('usersmodel');
	  $this->usersmodel->platform();
	}
	
	
	function index()
	{
    $data['todo_list'] = array('Clean House', 'Call Mom', 'Run Errands');
	  $data['title'] = "My Real Title";
	  $data['heading'] = "My Real Heading";
	  $this->load->view('template_view');
 	}
	


	
	
   

 
  function tables(){
       
       $tables = $this->db->list_tables();

        foreach ($tables as $table)
        {
         echo_array($table);
        }
     }
}
?>