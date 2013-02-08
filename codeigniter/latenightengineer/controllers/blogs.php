<?php
# Main Controller
#
# version 10.01

include_once('markdown.php');

class Blogs extends Controller {
//controller for articles rather than galleries
//it can also send images etc
//missing is how to get the data
//this is for to-morrow

var $user='guest';
public $info_box;
private $edit_allowed;

function Blogs()
    {
      parent::Controller();
      $this->edit_allowed = true;
     // $session=$this->session;
     // echo $this->user=$this->session->userdata('DX_username');
   }

	
function code(){
 $this->load->view('code','');
 $this->load->view('article_view',$data);
}	
    
    function __valid($v='',$name=''){
      if (isset($v[$name])){$var=$v[$name];
      }else{$var='';}
      return $var;
    }
    
    function __input($v){
    //prepares a checkbox
     //properties 'name'=>'name="%s" ',
     $attribute='';
     //echo_array($v);
     foreach ($v as $key=>$value){
     //echo $key .', ';
     if (array_key_exists(trim($key),$this->parsecontrols->properties)){
       $attribute .=sprintf($this->parsecontrols->properties[$key],$value);
      }
     }
     $s='';
     if (isset($v['head'])) {$s.=$v['head'];}
     $s.=sprintf('<input %s />'."\n".'<br />',$attribute);
     return $s;   
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
 	
function preprocess($title="Numbers_regex"){
 //pre-process text
//for other directories actually it is similar
	  $this->benchmark->mark('code_start');
	  $this->load->model('Articlesmodel');
	  $this->Articlesmodel->article_name="../blog/".$title.'.dat';
	  $data['content']=$this->Articlesmodel->get_article();
	  //loads the parser filters
	  //This part loads all the available filters
	  $this->load->library('filterclass');
	  $this->filterclass->filterALL($data[$content]);
	  $data['feature']=$this->filterclass->feature($data['content']);
	  $data['keywords']=$this->filterclass->parseField('keywords',$data['content']);
	  $data['title']=$title;//$this->filterclass->parseField('title',$data['content']);
	  $data['feature_image']=$this->filterclass->parseField('feature-image',$data['content']);
	  //let us get the list of articles in the directory
	  $this->Articlesmodel->path='../blog/';
	  //gets the menu on the left sidebar
	  $data['list']=$this->Articlesmodel->get_articles_list();
	  $time=60*60*24830;
      //$this->output->cache(0);
	  //let us view what we got by sending data and choosing the view
	  $this->load->view('article_view',$data);
} 	
 

 
function test($title=''){
//snoopps and echos
//act as proxy
  $url='http://guidesigner.net/';
  $this->load->library('snoopy');
  $this->snoopy->host=$url;
  $this->snoopy->fetch($url,'wiki');
  $content=$this->snoopy->results;
 echo $content;
} 


function __snoop($title,$go){
//initializes snoopy and fetches results
//go=wiki|cuil|powerset
  if ($go == 'wiki'){
    $uri='http://en.wikipedia.org/wiki/';
  
  }
  else
  {
  $uri=$go;
  }
  $url=$uri.$title;
  $this->load->library('snoopy');
  $this->snoopy->host=$url;
 
   $s["__utmz"]="225628120.1236878310.3.3.utmccn=(organic)|utmcsr=google|utmctr=spinks+auctions+stamps|utmcmd=organic";
   $s["__utma"]="225628120.2143952515.1236444222.1236701137.1236878310.3";//ok
   $s["utmccn"]="(organic)|utmcsr=google|utmctr=spinks+auctions+stamps|utmcmd=organic";
   $s["__utmc"]="225628120";
   $s["Spink"]="tokenID=1381939";
   $s["ASPSESSIONIDAQASTSQS"]="EKINHPDAHDCIAEPPILDAMDEO";

  //$this->snoopy->cookies=$s;
  $this->snoopy->fetch($url);
  $content=$this->snoopy->results;
  return $content;
} 



/*function __wiki_toc(&$content){
//removes table of contents
//don't like the & must remove
  $m=preg_match('/'.'<table\s*id=\"toc\"\s*class=\"toc\"\s*summary=\"Contents\"\s*>(.*?)<\/table> '.'/isx',$content,$values);
  //echo_array($values[0]);
 
  
  if ($m>0){$menu=$values[0];
  $content=preg_replace('/'.'<table\s*id=\"toc\"\s*class=\"toc\"\s*summary=\"Contents\"\s*>(.*?)<\/table> '.'/isx','',$content);
   }
   else {
   $menu='';
  }
 return $menu;
}*/

function ftp_download(){
$this->load->library('ftp');

$config['hostname'] = 'erecontracting.com';
$config['username'] = 'yannisl';
$config['password'] = 'PUREFAJO13';
$config['debug'] = TRUE;

if ($this->ftp->connect($config)){


$this->ftp->upload('../CodeIgniter/data/country.yaml','/public_html/latenightengineer/');
$list = $this->ftp->list_files('/public_html/erecontracting/wp-includes/');

echo_array($list);
  //print_r($this->ftp);
$this->ftp->close();}
}



function __wiki_main_articles(&$content){
  //pick-up the categories and bring to top
  //remove from current position  
  
  $test=preg_match_all('/'.'<i>Main\s*article\:(.*?)<\/i>'.'/isx',$content,$values);
   
  if ($test){//echo_array($values[0]);
    $main_articles='Related: ';
    foreach($values[1] as $key=>$value){
      $main_articles.=$value.', ';    
    }
    //echo $main_articles;
    //replace in order to move them
    $content=preg_replace('/'.'<i>Main\s*article\:.*?<\/i>'.'/isx','',$content);
  return $main_articles;}
  else
  {return $main_articles='';} 
}

function __wiki_cats(&$content){
  //pick-up the categories and bring to top
  //remove from current position  
  $test=preg_match_all('/'.'<div\s*id="mw-normal-catlinks"\s*>(.*?)<\/div> '.'/isx',$content,$values);
  $content=preg_replace('/'.'<div\s*id="mw-normal-catlinks"\s*>(.*?)<\/div> '.'/isx','',$content);
 //echo $values[1][0];
  if (isset($test)&&isset($values[1][0])){$cats=$values[1][0];}else{$cats['category']='';}
  return $cats;
}

/*
function spink($title="CodeIgniter"){
//under construction fetches an auction listing.
//need to parse
$content=$this->__snoop($title,'http://stampauctionnetwork.com/zi/zi412.cfm?');
$content=preg_replace('/41/','http://stampauctionnetwork.com/zi/41',$content);
 echo $content;
break;

} */

 function go_ajax($title="CodeIgniter",$blog="wiki"){
  $this->load->model('filesystem');
  $data=$this->filesystem->menu($title);
  //$content=$data['content'];
  echo $data;
 }

//  main controller for
//  fetching data from the web
//  I have placed anything that fetches
//  data into Models
//  This way they can also be called from components

function go($title="CodeIgniter",$blog="cms"){

   $this->load->model('goweb');
   $data=$this->goweb->go($title);
   $content=$data['content'];
   //echo $content;
   $wiki=$this->load->view('admin/middle',$data,true);
  // $this->load->model('Articlesmodel');
  //  $this->Articlesmodel->path='../'.$blog.'/';
  //  $data['list']=$this->Articlesmodel->get_articles_list();
                $this->load->library('Tcontrol');
                $this->load->library('tpanel');
                $class="tpanel";
                $s=$this->tpanel->get('date',$data);
                $s.=$this->tpanel->get('navigation_menu',$data);

                $s.=$this->tpanel->get('masthead2',$data);
                $s.=$this->tpanel->get('ajax_menu',$data);
                 $s.=$this->tpanel->get('three_column',$data);
                 $s.=$this->tpanel->get('spacer',$data);
                $s.=$this->tpanel->get('navigation_buttons',$data);
                $s.=$wiki;
               // $s.=$this->timagelist->main();
               // $s.=$this->{$class}->get('home_text',$data);
                $s.=$this->{$class}->get('spacer-bottom',$data);
                 $data['content']=$s;
                 $view='admin/admin_simple_view';
               $template=$this->load->view($view,$data,true);
            $this->load->library('filterclass');
            $template=$this->filterclass->filterAll($template);

            //configure tidy
            $config=array(
              'indent'=>true,
              'indent-spaces'=>2,
              'output-xhtml'=>true,
               'wrap'=>68,
               'force-output'=>true
            );

            //clean with tidy
          //  $template = tidy_parse_string($template, $config);
          //  tidy_clean_repair($template);


           $this->output->set_output($template);

  //$this->load->view($view,$data);
}




//  main controller for
//  fetching data from the web
//  I have placed anything that fetches
//  data into Models
//  This way they can also be called from components
 	


function snoop($title="CodeIgniter"){
   
  //loads snoopy
  //let us be nice to wikipedia!
  //this is just Wikipedia content re-formatted
  // 
  $content=$this->__snoop($title,'wiki');
  $content=$this->__post_processor($content);
  $data['menu']=$this->__wiki_toc($content);
  $data['category']=$this->__wiki_cats($content);
  $data['related']=$this->__wiki_main_articles($content);
  $data['feature']=$this->__wiki_info_box($content);
  $data['content']=$content;
  $data['title'] = $title;
  $this->load->model('Articlesmodel');
  $this->Articlesmodel->path='../blog/';
  $data['list']=$this->Articlesmodel->get_articles_list();
  //$data['feature']= ". . . It is extremely important that the development
  //of intelligent machines be pursued, for the human mind is not only limited in its storage and processing capacity but it also has known bugs: It is easily misled, stubborn, and even blind to the truth, especially when pushed to its limits.";
   //removes redundant items from Wikipedia
   $this->load->library('extracttext');
   //$test.=$this->extracttext->extract($content,'External links', 'edit');
   //echo 'test'.$test;
  $this->output->cache(0);
  $config = array(
           'indent'         => true,
           'output-xhtml'   => true,
           'wrap'           => 200);
  $data['content']=tidy_repair_string($content,$config,'utf8');//$tidy->parseString($html, $config, 'utf8');
  $this->load->view('wiki_view',$data);
} 



	
function post($location='blog',$title="a_sample_title", $page="1")
	{
	  # We set all paths based on global settings
      #
      $this->benchmark->mark('code_start');
      $document_root= $this->config->item('document_root');// C:/wamp/www/ returns with a slash
      $main_data_folder = $this->config->item('main_data_folder'); // 'countries' ;
	  $this->load->model('Articlesmodel');
	  $this->Articlesmodel->article_name="../".$location."/".$title.'.dat';
	  $data['content']= markdown($this->Articlesmodel->get_article());
      echo $data['content'];break;
	  //loads the parser filters
	  $this->load->library('filterclass');
	  $this->filterclass->filterAll($data['content']);
	  $data['content']=$this->filterclass->filter_value;
	  $this->filterclass->parseFields($data['content']);
	  foreach ($this->filterclass->fields as $key=>$value)
	  {
	   $data[$key]=$value;
	  }
	  $data['title']=$title;//$this->filterclass->parseField('title',$data['content']);
	  
	  //need to structure it in order to get the markdown into html
	 
	  //$data['content']=toc(markdown($data['content']));
	  //$data['toc']='';//toc_menu(markdown($data['content']));

      //$data['content']=htmlentities($data['content']);
	  $this->Articlesmodel->path='../'.$location.'/';
	  //gets the menu on the left sidebar
	  $data['list']=$this->Articlesmodel->get_articles_list();
	  //$time=60*60*24830;
    //$this->output->cache(0);
	  //let us view what we got by sending data and choosing the view
      $this->load->view('article_view',$data);
      

 	}

// example function returning json for ajax demo
// to modify to use with progress module
// need to work out some more details
// 
function ajax_json($location='blog',$title="Che_Guevara",$page="1"){
    //  $this->load->view('article_view',$data);
    header("Content-type: text/plain");
    //echo_array($_POST);
    echo json_encode(array("html"=>'
                    <div class="bordered" style="width:35%;float:left;margin-right:7px;padding:3px" class="clearfix example-pre">
                    <img id="img_01" src="http://localhost/CodeIgniter/images/angela.jpg"
                               style="display:block;margin:0 auto;width:200px" />
                    <p> This is something from the server, Hello World.It
                        can also be something very long.</p>
                    </div>',
                    "color"=>"blue",
                    "bgColor"=>"yellow",
                    "border"=>"1px solid #bebebe"));

/*$logFile = 'logFile';
$res = json_decode(stripslashes($_POST['data']), true);
error_log("result: ".$_POST['data'].", res=".json_encode($res), 3, $logFile);
error_log(", sales1_lastname: ".$res['sales'][1]['lastname'], 3, $logFile);
error_log("\n", 3, $logFile);

//header("Content-type: text/plain");
echo json_encode($res); */

}

function ajax_question($location='blog',$title="Che_Guevara",$page="1"){
   //  $this->load->view('article_view',$data);
    header("Content-type: text/plain");
    //echo_array($_POST);
    $z =array ( '{
    "question" : "What is the value of PI ?",
    questionId:"4713",
    correctAnswer:3,
    answerExplanation:"PI = 3.141316",
    answers:{
        "3":"3.141316",
        "1":"3.141613",
        "2":"3.134561",
        "4":"3.131314",
           },
    level : 1
   }', '{
    "question" : "What is the value of e ?",
    questionId:"4713",
    correctAnswer:3,
    answerExplanation:"PI = 3.141316",
    answers:{
        "3":"3.141316",
        "1":"3.141613",
        "2":"3.134561",
        "4":"3.131314",
           },
    level : 1
   }',
   '{
    "question" : "What is the Capital of China ?",
    questionId:"4713",
    correctAnswer:3,
    answerExplanation:"The capital is Beijing",
    answers:{
        "3":"Peking",
        "1":"Taipei",
        "2":"Taiwan",
        "4":"Shanghai",
           },
    level : 2
   }',
 '{
    "question" : "What is the Capital of Qatar?",
    questionId:"4713",
    correctAnswer:4,
    answerExplanation:"The capital of Qatar is Doha",
    answers:{
        "3":"Abu-Dhabi",
        "1":"Oman",
        "2":"Dubai",
        "4":"Doha",
           },
    level : 2
   }',

   '{
    "question" : "What is the Capital of Qatar?",
    questionId:"4713",
    correctAnswer:4,
    answerExplanation:"The capital of Qatar is Doha",
    answers:{
        "3":"Abu-Dhabi",
        "1":"Oman",
        "2":"Dubai",
        "4":"Doha",
           },
    level : 2
   }'

);


$response = $z[rand(0,3)];
$length= count($z);
if ($this->uri->segment(3)<$length){
$response = $z[$this->uri->segment(3)];} else{
   $response = $z[rand(0,3)];
}
echo $response;


}



function ajax_post($location='blog',$title="Che_Guevara",$page="1")
	{
	  
   $s='TEST';
    $z='<img src="http://localhost/CodeIgniter/images/edsger_dijkstra8.jpg" style="width:200px" />';
   if ($this->uri->segment(3)=='0'){$z='<img src="http://localhost/CodeIgniter/images/angela.jpg" style="width:200x" />';}
   if ($this->uri->segment(3)=='1'){$z='<img src="http://localhost/CodeIgniter/images/Eating_after_midnight_by_vivavanstory.jpg" style="width:200px" />';}
   if ($this->uri->segment(3)=='2'){$z='<img src="http://localhost/CodeIgniter/images/kitchen_help_by_vivavanstory.jpg" style="width:200px" />';}
   if ($this->uri->segment(3)=='3'){$z='<img src="http://localhost/CodeIgniter/images/Red_Cross_by_ulorinvex.jpg" style="width:200px" />';}
   // use this for thumb examples
   if ($this->uri->segment(3)=='4'){$z='<img src="http://localhost/CodeIgniter/images/Saint_by_miss_mosh.jpg" style="width:95px;height:130px" />';}
   if ($this->uri->segment(3)=='7'){$z='<img src="http://localhost/CodeIgniter/images/china/beauty_02.jpg" />';}

   if ($this->uri->segment(3)=='5'){$z=eval('echo "test" ;');}
   if ($this->uri->segment(5)=='1'){ $z='<img src="http://localhost/CodeIgniter/images/bazaar_smaller.jpg" style="width:100%" />';}
   
    echo $z;
   
 }

// used for ajax_gallery tests
function ajax_gallery($location='blog',$title="Che_Guevara",$page="1")
	{
   $n=$this->uri->segment(3);
   $z='<img src="http://localhost/CodeIgniter/images/china/beauty_'.$n.'.jpg" />';
   echo $z;
 }

function ajax_json2($location='blog',$title="Che_Guevara",$page="1")
{
   header("Content-type: text/plain");
   $z = '{ "title": "My JSON Data",
        "content": "Whats mine is yours."}';
   echo $z;
 }

function exhibit($location='blog',$title="Che_Guevara",$type='',$page_number="9")
//automatically displays an exhibition in frames and the like
//exhibit/location
//need to build a model to grab the data from directory and file
//or database
	{
	   //default exhibit values at the main config files
	   //the CMS will just show a default value
	   //
	   $this->config->load('exhibit');
	   $exhibit_title=$this->config->item('exhibit_title');
	   $data['exhibit_title']=$exhibit_title;
	   $data['exhibit_owner']=$this->config->item('exhibit_owner');
	   $data['exhibit_country']=$this->config->item('exhibit_country');
	   $data['exhibit_awards']=$this->config->item('exhibit_awards');
	   $data['exhibit_source']=$this->config->item('exhibit_source');
	   $data['exhibit_tags']=$this->config->item('exhibit_tags');
	   $data['exhibit_number_frames']=$this->config->item('exhibit_number_frames');
	   $data['exhibit_number_frames']=$this->config->item('exhibit_items_per_frame');
	   $data['location']=$location;
	   $data['title']=$exhibit_title;
	   $data['keywords']='';
	   $data['next']='test';
	   $data['prev']='';
	   $this->load->helper('file');
	   //Let's get the data from the file
	    include_once('../egypt/australia-rates/exhibit-notes.php');
	   	$data['content']=file_get_contents('../egypt/australia-rates/exhibit-menu.dat');
    
	   if ($type=='main'){
	     $data['content']=file_get_contents('../egypt/australia-rates/exhibit-menu.dat');
	   
	     foreach ($image as $key=>$value)
	    {
	      $data['images'][]='<img src="'.'http://localhost/egypt/australia-rates/'.$value.'" style="width:24%;float:left"/>';
	    }
	    }
	    elseif($type=='frame')
	    {
	    
	    //can show all frames in a series of images
	    //if images are in alphabetical order this will be in order
	    //or arithmetical
	    
	    //echo_array($image);break;
	    }
	    
	    
	  switch ($type) {
    case "page":
        //grab the content from the file ;
        $data['content']=file_get_contents('../egypt/australia-rates/exhibit-menu.dat');
        foreach ($image as $key=>$value)
	      {
	      //this should go into template
	      $data['images'][]='<img src="'.'http://localhost/egypt/'.$location.'/'.$value.'" />';
	      }
	      //send only the image required
	      $data['content']=$data['images'][$page_number];
	      echo($data['images'][$page_number]);
	      echo $page_number;
	      break;
    case "frame":
        $z=get_filenames('../egypt/australia-rates/');
	      include('../egypt/australia-rates/exhibit-notes.php');
        echo "i equals 1";
        break;
    case "main":
        $data['content']=file_get_contents('../egypt/australia-rates/exhibit-menu.dat');
        foreach ($image as $key=>$value)
	        {
	      $data['images'][]='<img src="'.'http://localhost/egypt/australia-rates/'.$value.'" style="width:24%;float:left"/>';
	      }
        echo "i equals 2";
        break;
    default:
       echo "type";
    }
	  $this->load->view('exhibit_view',$data);
 	}

function NDIA($location='blog',$title="introduction",$page="1")
	{
    $this->_common($location,$title,$page,'NDIA_view');
 	}

function tutorials($location='blog',$title="introduction",$page="1")
	{

    ## the tutorials folder settings
    $document_root= $this->config->item('document_root');// C:/wamp/www/ returns with a slash
    $main_data_folder = $this->config->item('tutorials_data_folder'); // 'tutorials' ;

    # We define three main paths, one for the .dat files and another for
    # the .tex files
    # and .pdf files

  //  $data_src = $document_root.$main_data_folder.'/'.$location.'/'.$file_name.'.dat' ; //c;wamp/www/countries
  //  $tex_data_src = $document_root.$main_data_folder.'/'.$location.'/tex/'.$file_name.'.tex' ; //c;wamp/www/countries
  //  $pdf_src = $document_root.$main_data_folder.'/'.$location.'/tex/'.$file_name.'.pdf';
    //$main_data_folder = "countries";
    $this->_common($location,$title, $main_data_folder,'jQuery_view', "1" );//jQuery_view
 	}


/*  This is the main controller for the stamps portal
 *  as a matter of fact works with all portals
 *  countries/nameofcountry/tittle/pagenumber
 *
 */

function stamps($portal="countries", $location='AJMAN', $title="introduction",$page="1")
	{
         //echoPRE($portal.' '.$location);break;
         $this->_common($location,$title, $portal, 'stamps_view');
 	}





/* Reads the ini file if it exists at the
 * local folder
 * and returns a data array with all settings
 */
function _readini($portal, $location){
    ## check to see if there is .ini file
    ## and read defaults from there. Updated for portals
    ##
    ##
    $src = "c://wamp/www/".$portal.'/'.$location.'/'.$location.".ini";
    //echo $src;break;
    $src_default = "c://wamp/www/tex-templates/settings.ini";
    if (file_exists($src)) {
       $ini_array = parse_ini_file($src, true);
     } else {
       // echo $src;break;
       $ini_contents = file_get_contents($src_default);
       file_put_contents('C:/wamp/www/'.$portal.'/'.$location.'/'.$location.'.ini',$ini_contents);
       $ini_array = parse_ini_file($src_default, true);

    }
    return $ini_array;
}


// common functions for all templates
//
function _common($location='blog',$title="introduction", $portal = "countries", $view="stamps_view",$page="1")
 {
    //echoPRE($location, $main_data_folder);

    // start benchmark
    $this->benchmark->mark('code_start');
    //loads the parser filters
	$this->load->library('filterclass');
    // loads model
	$this->load->model('Articlesmodel');
    $this->load->helper('date');
    $format = 'DATE_ISO8601';
    $time = time();
    $data['date']=standard_date($format, $time);
    
    # we read the .ini file if it exists
    # there are normally two levels
    # the portal level and the document level
    # ini files can contain many different settings
    # we keep all TeX related information here.
    $ini_array = $this->_readini($portal, $location);

    ## set scripts
    if(isset($ini_array['mathjax']['mathjaxon']) && ($ini_array['mathjax']['mathjaxon']) ){
        if(isset($ini_array ['mathjax']['url'])){
            $data['mathjaxurl'] = '"'.$ini_array ['mathjax']['url'].'"' ;
        } else{
            $data['mathjaxurl'] = '\'\'';
        }
    } else
    {
        $data['mathjaxurl']='';
    }

    ## set scripts
     if(isset($ini_array ['pdf']['pdftitle'])){
            $data['pdftitle'] = '"'.$ini_array ['pdf']['pdftitle'].'"' ;
        } else{
            $data['pdftitle'] = '';
        }
   //let us view what we got by sending data and choosing the view
   //echoPRE($ini_array['web']['web_name']);break;
   $data['web_name'] = $ini_array['web']['web_name'];
   // shows the second navigation button
   $data['nav_button2'] ='show().';
   //$data['nav_button2'] ='';


   
	$this->Articlesmodel->article_name="../".$portal."/".$location."/".$title.'.dat';
	$this->Articlesmodel->article_comments="../".$portal."/".$location."/".$title.'.tlk';


    // set path for menu
    $this->Articlesmodel->country_path="../".$portal."/".$location."/".$location.".menu";
    // next we load any specific country or topic menu
 
	// we insert into data for template
    $data['content']=$this->Articlesmodel->get_article();

    
    $content = $data['content'];
	$data['comments']=$this->Articlesmodel->get_comments();
	$data['content']=$data['content'].$data['comments'];
   

    
	$data['location']=$location;
    $data['portal']= $portal;
   	

    // after parse
    $data['content']= $this->filterclass->filterAll($data['content']);

    
    $data['content']=markdown($this->filterclass->filter_value);

    //echo $data['content'];break;
      // get all transclusions and do own filtering
      $this->filterclass->parseFields($data['content']);
      // we send transcluded vars to template
	  foreach ($this->filterclass->fields as $key=>$value)
	  {
	   $data[$key]=$value;
      // echoPRE($key.'  '.$value);
	  }


      //break;
      //
      //
      //
      //
      //
	  //session data
	  //$data['credit_source']='TESTING SOURCE';
	  $data['user']=$this->user;
	  $data['title']=$title;//$this->filterclass->parseField('title',$data['content']);
	  $data['logo']='China';

      ## calculate statistics
      $data['content']=toc(markdown($data['content']));
      //$statistics = statistics($data['content']);
     // $data['content'] = $data['content']."\n\n".$statistics;
      //echo $data['content'];break;

	  //$data['content']=toc(markdown($data['content']));

     

      //echo $data['content'];break;


	  $data['toc']='';
      
      // $data['toc']=toc_menu(markdown($data['content']));
     
      $this->Articlesmodel->path='../'.$portal.'/'.$location.'/';
	  //gets the menu on the left sidebar

      //echo $main_data_folder;break;

      $data['list']=$this->Articlesmodel->get_articles_list();
	  $data['location']=$location;

 
    ## Check for extended markdown
    ## write to file with the postable content etc
    ## first test everything with a fixed file
    /**
    $f=$title;
    $country=$location;

    ## we create two empty files to work with or clear them
    ## should be at save rather??
        $res=file_put_contents('C:/wamp/www/countries/'.$country.'/tex/'.$title.'.tex','');
    $res=file_put_contents('C:/wamp/www/countries/'.$country.'/tex/'.$title.'.html','');

    ## We now build the pandoc string, better to have everything in a
    ## batch file in the end.
    ## we read the raw data file -> markdown -> latex -> html
    $pandoc_input_file='C:/wamp/www/countries/'.$country.'/'.$title.'.dat';
    $pandoc_output_file='C:/wamp/www/countries/'.$country.'/tex/'.$title.'.tex';
  ## Also need to add our own filters
       // $this->filterclass->filterAll($data['content']);
       // $res=file_put_contents('C:/wamp/www/countries/'.$country.'/tex/'.$title.'.tex',$data['content']);
        ## get file ready for texing to pdf and save on file.
        //pandoc -f markdown -t latex hello.txt
        $t='pandoc -f markdown '.$pandoc_input_file.' -t latex -o'.$pandoc_output_file.' 2>1';
        $z=shell_exec($t);
        //echoPRE($z);
        //break;

        ## to html
        
        $pandoc_input_file='C:/wamp/www/countries/'.$country.'/tex/'.$title.'.tex';
        $pandoc_output_file='C:/wamp/www/countries/'.$country.'/tex/'.$title.'.html';
        $t='pandoc -f latex '.$pandoc_input_file.' -t html -o' .$pandoc_output_file.' 2>1 ';

        $z = shell_exec($t);
        //echoPRE($z);
        
        $data['content']=file_get_contents('C:/wamp/www/countries/'.$country.'/tex/'.$title.'.html');
        //echoPRE($data['content']);
        //break;
      //$this->output->set_output($template);
      
  
   $time=60*60*24830;
   $this->output->cache(0);
     * 
     */
   
   if ($this->edit_allowed){
       $data['countrymenu'] = $this->Articlesmodel->get_countrymenu();}
   else{$data['countrymenu'] = '';}
   $this->load->view('stamps/'.$view,$data);

}


function galleries($title="Che_Guevara",$page="1"){
   
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

//utility to check if a filename is an
// image
function is_image($filename){
  if(is_array($filename)){return false;}
  $valid=array('.jpg','.jpe','.png','.JPG','.JPE','.PNG');
  $ext = strrchr(low($filename), '.');
  //echo $filename.' '.$ext;
  if (in_array($ext,$valid)){return true;}
}
	
function gallery($gallery_name="eugenio-02",$page_num=1,$title='Missing Title')
	{
        
      // first we get all the images from the image directory
      // mock options at this stage or auto discovery
      // also get images directly from directory
      // should come from db
      define('GALLERYPATH1','../egypt/');
      //
      $this->load->model('Articlesmodel');
	  //load diretory to get all the images in a directory
	  $this->load->helper('directory');
      // we map the directory as give by $gallery_name
      $path='../egypt/'.$gallery_name;
      //need TODO only valid IMAGES based on OPTIONS
	  $image_names = directory_map($path, TRUE);
	  //map into an array
      // we can at this point place the images into img tags
      // or we can leave that for the view so the designer
      // can place classes and id's as desired
      // we opt for the latter
      // THIS ONLY SENDS THE IMAGE FILE
      // better send full path?
      // send full path
      // since the databse stores titles etc better send full html

       foreach($image_names as $value){
          // we check if image is valid
          if($this->is_image($value)){
          $file_names[]=$value;
          // set title and alt
          $img_title='title="'."$gallery_name".'" ';
          $s1='<img '. $img_title.' class="image-large" src=" ';
          $s2=" />";
          // class image-large
          // cheat for thumbs in the meantime
          $s3='<img '.$img_title.' class="image-small" src=" ';
          $map[]=$s1.'http://localhost/egypt/'.$gallery_name.'/'.$value.'"'.$s2;
          $map_small[]=$s3.'http://localhost/egypt/'.$gallery_name.'/'.$value.'"'.$s2;
          // we also send a shuffled array in case
          // we need it for some random image display
          // we try to minimize PHP in template
          // hopefully to none
        };
       };
       // we do it outside loop since $file_name area not known at this stage
       foreach ($map as $value){
        $r=rand(0,count($map)-1);
        $imgs_random[]=$s3.'http://localhost/egypt/'.$gallery_name.'/'.$file_names[$r].'"'.$s2;
       };


       // Pagination
       // Load pagination class
       $this->load->library('pagination');
       $config['base_url'] = '/codeigniter/Blogs/gallery/'.$gallery_name.'/';
       $config['uri_segment'] = 4;
       $config['total_rows'] = count($map);
       $config['per_page'] = '1';
       $config['$cur_page'] =-1 ;
       $config['first_link'] = 'First';
       $config['num_links'] = 10;
              $this->pagination->initialize($config);
       $pagination= $this->pagination->create_links();

       $data['imgs']=$map;
       $data['imgs_small']=$map_small;
      // the images are related one to one with page_num
      // send full data to server
	  $data['title'] = $gallery_name;
	  $data['heading'] = "My Real Heading";
	  $data['gallery']=$gallery_name;
	  $data['page']=$page_num;
      $data['path']=$path;
      $data['imgs_random']=$imgs_random;
      $data['pagination']=$pagination;
      $data['image_names']=$file_names;
      // cache
      $this->output->cache(0);
      
      // load view
	  $this->load->view('photography_gallery',$data);
	}


}
?>