<?php
/*
 LearnPHP controller
*/
include_once('../strings/markdown.php');

class LearnDojo extends Controller {
// controller for learnPHP articles
// works nicely so far on local host
var $user='yannis'; //god hardcoded-in no chance for stealing?
// we use the portal/channel paradigm
// portal php will be a CMS dedicated for
// php portal elgrego will be dedicated to a CMS for elgrego
// multiuser-multiparadigm
const portal='dojo';
const portaltitle = 'dojoNotes';
const directory='tex';
const defaultview='';
const defaultpost='introduction'; //redirect to an article?
                                  //is this a good idea?
const controllername='LearnDojo';
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
    $this->_common($location,$title,$page,self::portal.'_view');
}
// common functions for all templates
function _common($location=self::directory,$title="introduction",$page="1",$view='haskell_view',$data='')
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
   	  $data['menu']='
         <ul id="menu" style="background-image:url(/codeigniter/images/icons/assets/nav_bg.gif);">
            <li class="active">
            <a  href="http://127.0.0.1/CodeIgniter/index.php/Blogs/tutorials/blog/home">Home</a></li>
            <li  style="background-color:rgb(188,29,29);">
            <a style="color:#fff" href="/CodeIgniter/LearnDojo/tutorials/dojo/Introduction">dojo Notes</a></li>
            <li class="active">
            <a href="http://127.0.0.1/CodeIgniter/index.php/Blogs/tutorials/jQuery/Introduction">Notes</a></li>
            <!--  <li class="active" style="background-color:rgb(206,123,0)"><a href="http://127.0.0.1/CodeIgniter/index.php/Blogs/excerpt">Archive</a></li>-->
            <li class="active"><a href="//localhost/CodeIgniter/blogs/gallery/eugenio-018/6">Galleries</a></li>
            <!--    <li class="active"><a href="http://localhost/CodeIgniter/upload/">Upload</a></li>-->
            <li class="active" ><a  href="http://localhost/CodeIgniter/blogs/tutorials/journal/fresh_ideas">journal</a></li>
            <!--   <li class="active"><a href="http://localhost/CodeIgniter/admin/">Admin</a></li>-->
            <!--  <li class="active"><a href="http://www.bjornblomquist.com/contact.html">Contact</a></li>-->
            <li id="login" class="active"><a  href="">Login/Register</a></li>
          </ul>';//$menu;
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
      $this->load->view(self::portal.'/'.self::portal.'_view',$data);
  }
}

