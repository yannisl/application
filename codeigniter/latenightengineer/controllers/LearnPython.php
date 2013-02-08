<?php

class LearnPython extends Controller {

private $user='yannis';
private $logo='LearnPython';
private $sidemenu='side_menu_python';
private $main_menu='';
private $main_template='';
private $toc='';
private $data=array();

function __construct()
 {
   parent::Controller();
   include_once('../strings/markdown.php');
 }

function init(){
   //todo
   // get all configurations
   // template logic?
   // load template configuration here
}
	
function index(){
    redirect('Learn/tutorials/python/introduction');
}
	 

function tutorials($location='blog',$title="introduction",$page="1")
{
    // only capture the correct template and location name
    // need to abstract
    $this->_common($location,$title,$page,'python_view');
}



function _editsAllowed(){
   return false;
}

function _common($location='python',$title="introduction",$page="1",$view="python_view",$data='')
 {
    $this->_editsAllowed();
    $data['date']='';//standard_date($format, $time);
    // loads model
	$this->load->model('Articlesmodel');
	$this->Articlesmodel->article_name="../".$location."/".$title.'.dat';
	$this->Articlesmodel->article_comments="../".$location."/".$title.'.tlk';
	// we insert into data for template
    $data['content']=$this->Articlesmodel->get_article();
	$data['comments']=$this->Articlesmodel->get_comments();
	$data['content']=$data['content'].$data['comments'];
	$data['location']=$location;
	  
    //loads the parser filters
	$this->load->library('filterclass');
	$this->filterclass->filterAll($data['content']);

    // after parse 
    $data['content']=$this->filterclass->filter_value;
      // get all transclusions
	  $this->filterclass->parseFields($data['content']);
      // we send transcluded vars to template
	  foreach ($this->filterclass->fields as $key=>$value)
	  {
	   $data[$key]=$value;
      // echoPRE($key.'  '.$value);
	  }
      
	  $data['user']=$this->user;
	  $data['title']=$title;//$this->filterclass->parseField('title',$data['content']);
	  $data['logo']='China'; // not used
	  $data['content']=toc(markdown($data['content']));
	  $data['toc']=toc_menu(markdown($data['content']));

      $this->Articlesmodel->path='../'.$location.'/';
	  //gets the menu on the left sidebar
      $data['list']=$this->Articlesmodel->get_articles_list();
	  $data['location']=$location;
      $data['logo']=$this->logo;
      /*TODO MENU AND TEMPLATE BUILD-UP*/

	  $data['menu']='';//$menu;
     // $this->output->set_output($template);
      $time=60*60*24830;
      $this->output->cache(0);
      //let us view what we got by sending data and choosing the view
      //echo 'before view';
      $this->load->view('python/'.$view,$data);
  
}
}

