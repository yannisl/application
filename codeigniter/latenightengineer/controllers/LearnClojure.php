<?php
/*
 * Controller for LearnClojure
*/
// include the markdown php
// need to bring it to the library
//
include_once('../strings/markdown.php');

class LearnClojure extends Controller {

var $user='yannis';

function __construct()
 {
   parent::Controller();
 }

// Redirect to introduction on index
// LearnClojure/ will redirect here
function index(){
    redirect('LearnClojure/tutorials/Clojure/Introduction');
}
	 
// this calls the tutorials common function
// who does the heavy work
// it is only here for SEO
function tutorials($location='blog',$title="introduction",$page="1")
{
    // only capture the correct template and location name
    // need to abstract
    $this->_common($location,$title,$page,'clojure_view');
}

function _common($location='blog',$title="introduction",$page="1",$view="clojure_view",$data='')
 {
   
    $data['date']='';//standard_date($format, $time);
     
   // loads model
   // the model iterates through the directory given by location
   // and loads the file
   // and menus
	$this->load->model('Articlesmodel');
	$this->Articlesmodel->article_name="../".$location."/".$title.'.dat';
	$this->Articlesmodel->article_comments="../".$location."/".$title.'.tlk';
	// we insert into data for template
    $data['content']=$this->Articlesmodel->get_article();
	$data['comments']=$this->Articlesmodel->get_comments();
  // add comments at bottom if any
	$data['content']=$data['content'].$data['comments'];
	$data['location']=$location;
  // these filters extend markdown
  // provide wiki type syntax
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
	  $data['content']=toc(markdown($data['content']));
	  $data['toc']=toc_menu(markdown($data['content']));

      $this->Articlesmodel->path='../'.$location.'/';
	  //gets the menu on the left sidebar
      $data['list']=$this->Articlesmodel->get_articles_list();
	  $data['location']=$location;
      
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
      //$time=60*60*24830;
      $this->output->cache(0);
      //let us view what we got by sending data and choosing the view
      //echo 'before view';
      $this->load->view('clojure/'.$view,$data);
  
}
}

