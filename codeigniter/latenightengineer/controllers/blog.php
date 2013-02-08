<?php


class Blog extends Controller {

function Blog($t='gallery')
    {
      parent::Controller();

        $this->load->scaffolding($t);
   }
//TODO MAIN GALLERY FOR INDEX
function index()
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
    //$this->session;
     //$session = $this->session->all_userdata();
     //$this->session->set_userdata('login_status', 'TRUE');
     //if ($this->session->userdata('login_status')){echo 'Logged in';}else{echo 'pls log-in';}
	
    
      $this->load->library('pagebuilder');
	  $data['title'] = $gallery_name;
	  $data['heading'] = "My Real Heading";
	  $data['gallery']=$gallery_name;
	  $data['page_num']=$page_num;
	  $this->load->view('photographer_gallery',$data);
        
	}
   
}
?>