<?php
include_once('../strings/utilities.php');
include_once('../strings/markdown.php');
class Examples extends Controller {
//controller for articles rather than galleries
//it can also send images etc
//missing is how to get the data
//this is for to-morrow

function ex($op="r",$file="books")
// @r=read
// @w=write
// @s=sort
// @m=modify
// @a=add
	{
   $this->load->library('parsecsv');
	  $data['content']='';
	  //checks the uri
	  
	  $segment=$this->uri->segment(3){
	  }
	  
	  
	  //loads the parser filters
	  //change wiki links and place into content
	  # general usage
	  $s='';
	  $this->parsecsv->sort_by = 'rating';
	  if (file_exists('../CodeIgniter/data/'.$file.'.csv') || file_exists('../CodeIgniter/data/'.$file.'.txt')){
	    $this->parsecsv->auto('../CodeIgniter/data/'.$file.'.csv');
	    //echo_array($csv);
	    foreach ($this->parsecsv->titles as $value){
		  $s.=' '.ucfirst($value).' |';
		 }
		 $s.='<br />';
	   foreach ($this->parsecsv->data as $key=>$row){
	  
	    foreach ($row as $value){
		  $s.= $value.', ';}
		   $s.='<br />';
	   }
	   $s.='<br />';
	  $data['content']=$s;
	  }
	  else 
	  {$data['content']='ERROR FILE DOES NOT EXIST';}
	   //let us view what we got by sending data and choosing the view
	  $this->load->view('article_view',$data);
 	}

	
function index()
	{
    $data['todo_list'] = array('Clean House', 'Call Mom', 'Run Errands');
	  $data['title'] = "Home";
	  $data['heading'] = "My Real Heading";
	  $this->load->model('Articlesmodel');
	  
	  $this->Articlesmodel->article_name="../blog/$title".'.dat';
	  
	  $data['content']=$this->Articlesmodel->get_article();
	  
	  //loads the parser filters
	  $this->load->library('filterclass');
	  //change wiki links and place into content
	  $data['content']=$this->filterclass->phpLink($data['content']);
	  $data['feature']=$this->filterclass->feature($data['content']);
	  $data['keywords']=$this->filterclass->parseField('keywords',$data['content']);
	  
	  //let us get the list of articles in the directory

	  $this->Articlesmodel->path='../blog/';
	  $data['list']=$this->Articlesmodel->get_articles_list();


	  //let us view what we got by sending data and choosing the view
	  $this->load->view('article_view',$data);
	  
	 
 	}
	
function post($title="Che_Guevara",$page="1")
	{
	  //gets data from file to start with rather than database
	  //this will have to be extended
    //$data['content']=markdown(file_get_contents("../articles/$title".'.dat'));
	  //This is the main routine for blog posts
	  
	  
	  //for other directories actually it is similar
	  $this->benchmark->mark('code_start');


	  $this->load->model('Articlesmodel');
	  
	  $this->Articlesmodel->article_name="../blog/".$title.'.dat';
	  
	  $data['content']=$this->Articlesmodel->get_article();
	  
	  //loads the parser filters
	  //This part loads all the available filters
	  $this->load->library('filterclass');
	  //change wiki links and place into content
	  $data['content']=$this->filterclass->wikitize($data['content']);
	  $data['content']=$this->filterclass->wikisquare($data['content']);
	  $data['content']=$this->filterclass->phpLink($data['content']);
	  $data['content']=$this->filterclass->google($data['content']);
	  $data['content']=$this->filterclass->nutshell($data['content']);
	  $data['content']=$this->filterclass->warning($data['content']);
	  $data['content']=$this->filterclass->sandbox($data['content']);
	  $data['content']=$this->filterclass->flagicon($data['content']);
	  
	  //filter for tags
	  //filterAll is required to complete this
	  $data['feature']=$this->filterclass->feature($data['content']);
	  $data['keywords']=$this->filterclass->parseField('keywords',$data['content']);
	  $data['title']=$this->filterclass->parseField('title',$data['content']);
	  $data['feature_image']=$this->filterclass->parseField('feature-image',$data['content']);
	  //let us get the list of articles in the directory

	  $this->Articlesmodel->path='../blog/';
	  $data['list']=$this->Articlesmodel->get_articles_list();
	  $time=60*60*24830;
    $this->output->cache(0);

	  //let us view what we got by sending data and choosing the view
	    $this->load->view('article_view',$data);
 	}

function galleries($title="Che_Guevara",$page="1")
	{
	  //gets all the files in folders galleries
	  //displays them	  
	  
	  $this->load->model('Articlesmodel');
	  //load diretory to get all the images in a directory
	  $this->load->helper('directory');
	  $map = directory_map('../CodeIgniter/images', TRUE);
	  //echo_array($map);
	  $data['map']=$map;
	  
	  $this->Articlesmodel->article_name="../blog/$title".'.dat';
	  $data['content']=$this->Articlesmodel->get_article();
	  //loads the parser filters
	  $this->load->library('filterclass');
	  //change wiki links and place into content
	  $data['content']=$this->filterclass->wikitize($data['content']);
	  $data['feature']=$this->filterclass->feature($data['content']);
	  $data['keywords']=$this->filterclass->parseField('keywords',$data['content']);
	  $data['title']=$this->filterclass->parseField('title',$data['content']);
	  $data['feature_image']=$this->filterclass->parseField('feature-image',$data['content']);
	  //let us get the list of articles in the directory

	  $this->Articlesmodel->path='../blog/';
	  $data['list']=$this->Articlesmodel->get_articles_list();


	  //let us view what we got by sending data and choosing the view
	    $this->load->view('directory_view',$data);
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