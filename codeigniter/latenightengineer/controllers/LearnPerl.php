<?php
/*
 * Learn just for Python
 * Similar to other Controllers
 * Need to cut down on duplication
*/
include_once('../strings/markdown.php');

class LearnPerl extends Controller {
//controller for articles rather than galleries
//it can also send images etc
//missing is how to get the data
//this is for to-morrow

var $user='yannis';

function __construct()
 {
   parent::Controller();
 }

	
function index(){
    redirect('Learn/tutorials/python/tuples');
}
	 

function tutorials($location='blog',$title="introduction",$page="1")
{
    // only capture the correct template and location name
    // need to abstract
    $this->_common($location,$title,$page,'perl_view');
}


//

function _common($location='blog',$title="introduction",$page="1",$view="cyprus_view",$data='')
 {
    // start benchmark
  //  $this->benchmark->mark('code_start');
 /*   $this->load->helper('date');
    $format = 'DATE_ISO8601';
    $time = time();*/
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
      //break;
	  //session data
	  //$data['credit_source']='TESTING SOURCE';
	  $data['user']=$this->user;
	  $data['title']=$title;//$this->filterclass->parseField('title',$data['content']);
	  $data['logo']='China'; // not used
	  $data['content']=toc(markdown($data['content']));
	  $data['toc']=toc_menu(markdown($data['content']));

      $this->Articlesmodel->path='../'.$location.'/';
	  //gets the menu on the left sidebar
      $data['list']=$this->Articlesmodel->get_articles_list();
	  $data['location']=$location;
      // TODO
      // in directory
      // if there is this will supplant
      // the automatic menu
      // if necessary
      //TODO
 /*
	  $menu=@file_get_contents('../'.$location.'/'.'menu.dat');
	  if ($menu){$data['list']='';
      $menu=markdown($menu);}
  *
  */
      //  $em=array('');
      //$data['list']=$em;
	  $data['menu']='';//$menu;
     // $this->output->set_output($template);
      $time=60*60*24830;
      $this->output->cache(0);
      //let us view what we got by sending data and choosing the view
      echo 'before view';
      $this->load->view('perl/'.$view,$data);
  
}
}

