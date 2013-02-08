<?php
include_once('../strings/utilities.php');

class Articles extends Controller {

/*	function index()
	{
          $data['todo_list'] = array('Clean House', 'Call Mom', 'Run Errands');
	  $data['title'] = "My Real Title";
	  $data['heading'] = "My Real Heading";
	  $this->load->view('blogview',$data);	
          $this->load->view('welcome_message');
          
	}*/
	
	function index()
	{
    $data['todo_list'] = array('Clean House', 'Call Mom', 'Run Errands');
	  $data['title'] = "My Real Title";
	  $data['heading'] = "My Real Heading";
	  $this->load->view('template_view');
 	}
	
function article()
	{
    $data['todo_list'] = array('Clean House', 'Call Mom', 'Run Errands');
	  $data['title'] = "My Real Title";
	  $data['heading'] = "My Real Heading";
	  $this->load->view('template_view');
 	}

	
	
function gallery($gallery_name="eugenio-02",$page_num=5,$title='Missing Title')
	{
    //get data based on URL
    //data must give the template we want things shown
    //this is defined by the seecond segement
    // @gallery=gallery template
    // @page   =page template
    // @sitemap=sitemap template
    $this->load->library('pagebuilder');
     
	  $data['title'] = $gallery_name;
	  $data['heading'] = "My Real Heading";
	  $data['gallery']=$gallery_name;
	  $data['page_num']=$page_num;
	  $this->load->view('photographer_gallery',$data);
          
	}







  function Blog($t='wp_options')
    {
      parent::Controller();

        $this->load->scaffolding($t);
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