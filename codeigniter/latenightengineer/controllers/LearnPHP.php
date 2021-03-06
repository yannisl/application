<?php
/*
 LearnPHP controller
*/
include_once('../strings/markdown.php');

class LearnPHP extends Controller {
// controller for learnPHP articles
// works nicely so far on local host
// TODO promote to learn or tutorials
// use directory? as convention anfd generalize?
var $user='yannis'; //god hardcoded-in no chance for stealing?
// we use the portal/channel paradigm
// portal php will be a CMS dedicated for
// php portal elgrego will be dedicated to a CMS for elgrego
// multiuser-multiparadigm
const portal='php';
const portaltitle = 'phpNotes';
const directory='php';
const defaultview='';
const defaultpost='introduction'; //redirect to an article?
                                  //is this a good idea?
const controllername='learnPHP';
const admincontroller= 'adminPHP'; //main back end takes care for post edits etc
const portaldb='';
// all controllers must have this
function __construct()
 {
   parent::Controller();
 }

// index if people play with URL
function index(){
    redirect(self::controllername.'/tutorials/'.self::directory.'/'.self::defaultpost);
}
	 
// main tutorials
// this has been introduced more for SEO
function tutorials($location='blog',$title="introduction",$page="1")
{
    // only capture the correct template and location name
    // need to abstract
    $this->_common($location,$title,$page,'php_view');
}
// common functions for all templates
function _common($location=self::directory,$title="introduction",$page="1",$view="php_view",$data='')
 {
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
	  //$data['logo']='China'; // not used
	  $data['content']=toc(markdown($data['content']));
	  $data['toc']=toc_menu(markdown($data['content']));

      $this->Articlesmodel->path='../'.$location.'/';
	  //gets the menu on the left sidebar
      $data['list']=$this->Articlesmodel->get_articles_list();
	  $data['location']=$location;
   	  $data['menu']='';//$menu;
     // $this->output->set_output($template);
      //$time=60*60*24830;
      //$this->output->cache(0);
      //let us view what we got by sending data and choosing the view
      //TEMPLATE SPECIFIC
      //for each language we have a different learn logo
      //learnPHP, learnjQuery etc.
      //this sends the correct message
      $data['admincontroller']=self::admincontroller; //eg adminPHP, adminLua etc.
      $data['dir']=self::directory;
      //learn
      $data['learn']=self::portaltitle;
      //
      //format is like $this->load->view('folder_name/file_name');
      $this->load->view(self::portal.'/'.$view,$data);
  }
}

