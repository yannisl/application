<?php
/*
 * Learn Lua Controller
 * Similar to other Controllers
 * Need to cut down on duplication
*/
include_once('../strings/markdown.php');

class LearnLua extends Controller {
//controller for articles rather than galleries
//it can also send images etc
//missing is how to get the data

var $user='yannis';

function __construct()
 {
   parent::Controller();
 }
	
function index(){
    redirect('LearnLua/tutorials/lua/introduction');
}
	 

function tutorials($location='blog',$title="introduction",$page="1")
{
    // only capture the correct template and location name
    // need to abstract
    $this->_common($location,$title,$page,'lua_view');
}

function _common($location='blog',$title="introduction",$page="1",$view="cyprus_view",$data='')
 {
    $data['date']='';//standard_date($format, $time);
   // loads model, loads all articles from directory
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
  	  $data['menu']='';//$menu;
     // $this->output->set_output($template);
      $time=60*60*24830;
      //$this->output->cache(0);
      //let us view what we got by sending data and choosing the view
      //echo 'before view';
      $this->load->view('lua/'.$view,$data);
  
}
}

