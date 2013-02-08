<?php
# Main Controller
#
#
# includes yaml for forms
#
# version 10.01

include_once('../strings/markdown.php');

class go extends Model {
//controller for articles rather than galleries
//it can also send images etc
//missing is how to get the data
//this is for to-morrow

var $user='guest';

public $info_box;

function go()
    {
      parent::Controller();
      
		
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
   // $this->output->cache(0);
	  //let us view what we got by sending data and choosing the view
	    $this->load->view('article_view',$data);
} 	
 
function powerset($title="Che"){

 $this->load->library('document','http://powerset.com/explore/go/'.$title);
 $this->document->getElementByClass(tidy_get_body($this->document->tidy),'bullets',$result1);
  foreach($result1 as $key=>$val){
   $fragment = tidy_repair_string($val->value);
   //echo ($fragment);
  }
  
  $fragment=preg_replace('/[\-]/','_',$fragment);
  $fragment=preg_replace('/explore\/go/','CodeIgniter/Blogs/snoop',$fragment);
  $data['content']='';
  $data['title'] = $title;
  $data['category']=$fragment;
  $data['list']='';
  $data['menu']='';
  $this->load->view('wiki_view',$data);
  
  
} 
 
function test($title){
//snoopps and echos
//act as proxy
  $url='http://www.arakinobuyoshi.com/index.html';
  $this->load->library('snoopy');
  $this->snoopy->host=$url;
  $this->snoopy->fetch($url);
  $content=$this->snoopy->results;
 echo $content;
} 


 
function altavista($title="Che"){
  $url='http://www.picsearch.com/search.cgi?q='.$title;
  $this->load->library('snoopy');
  $this->snoopy->host=$url;
  $this->snoopy->fetch($url);
  $content=$this->snoopy->results;
  //echo htmlentities($content);
  //break;
  $this->load->library('document');
  //echo $content;
  $this->document->raw_text=$content;
  $this->document->parse($content);
  //$this->document->getElementByClass(tidy_get_body($this->document->tidy),'rbottom',$result1);
  //echo htmlentities($this->document->raw_text);
  foreach($this->document->fragment as $key=>$val){
   $fragment = tidy_repair_string($val->value);
   //echo ($fragment);
  }
  
  $fragment=preg_replace('/[\-]/','_',$fragment);
  $fragment=preg_replace('/explore\/go/','CodeIgniter/Blogs/snoop',$fragment);
  $data['content']='';
  $data['title'] = $title;
  $data['category']=$fragment;
  $data['list']='';
  $data['menu']='';
  $this->load->view('wiki_view',$data);
  
  
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



function __wiki_toc(&$content){
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
}

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

function __post_processor($content){
//post process wikipedia articles to remove and 
//reformat
//changed edit\s to avoid eating up editor needs re-chek
  $content=str_replace('/wiki/','/CodeIgniter/Blogs/go/',$content);
  $content=preg_replace('/'.'citation\s*needed'.'/isx','',$content);
  $content=preg_replace('/'.'edit'.'/ix','',($content));
  $content=preg_replace('/'.'\['.'/isx','',($content));
  $content=preg_replace('/'.'\]'.'/isx','',($content));
  //remove jump to navigation
   $content=preg_replace('/'.'(<div\s*id="jump-to-nav"\s*>.*?<\/div>)'.'/isx','',$content);
  $content=preg_replace('/'.'(46ex)'.'/isx','30ex',$content);
  $content=preg_replace('/'.'(300px)'.'/isx','250px',$content);
  
  //dealing with some info box issues
  $content=preg_replace('/'.'(font-size:\s*95%)'.'/','font-size: 70%',$content);
  $content=preg_replace('/'.'(width:\s*18em)'.'/isx','width: 14em;margin-left:7px;',$content);
  
   //remove column1 menu
   $content=preg_replace('/'.'<div\s*id=\"column-one\"\s*>(.*?)<\/div> '.'/isx','',$content);
   $content=preg_replace('/'.'<h5>(Personal|Navigation)\s* (Tools)*\s*<\/h5>'.'/isx','',$content);
   $content=preg_replace('/'.'<div\s*class=\"pBody\"\s*>.*?<\/*.*>'.'/isx','A</div>',$content);
   $content=preg_replace('/'.'<div\s*id=\"mw-hidden-catlinks\"\s*.*>(.*?)<\/div> '.'/isx','A</div>',$content);
   //<table class="metadata plainlinks ambox ambox-notice" style="">
  //meta boxes
   $content=preg_replace('/'.'<table\s*class=\"(metadata|plainlinks).*?"\s*>(.*?)<\/table> '.'/isx','',$content);
   $content=preg_replace('/From Wikipedia, the free encyclopedia/','',$content);
 return $content;
} 

function __wiki_info_box(&$content){
   //checks to see if there is an info box
   $success=preg_match_all('/'.'<table\s*class=\"infobox"\s[^>]*
  [[:alnum:]\%\#\;\:\/\\\\\"\s\?\@\~\=\[\]\(\)\*\$\&\,\.\.><\-\_\'\!\?\,\|\}\{\+\n\r]+<\/table>'.'/isx',$content,$values);
  if($success){$this->info_box=$values[0];
    //remove contents from location
    $content=preg_replace('/'.'<table\s*class=\"infobox"\s[^>]*
     [[:alnum:]\%\#\;\:\/\\\\\"\s\?\@\~\=\[\]\(\)\*\$\&\,\.\.><\-\_\'\!\?\,\|\}\{\+]+'.'/uisx','',$content);
     
     //$content=preg_replace('/'.'<table'.'/isx','',$content);
   return $values[0];
  }
  
  

   //echo_array($values[0]);
  
}

function spink($title="CodeIgniter"){
//under construction fetches an auction listing.
//need to parse
$content=$this->__snoop($title,'http://stampauctionnetwork.com/zi/zi412.cfm?');
$content=preg_replace('/41/','http://stampauctionnetwork.com/zi/41',$content);
 echo $content;
break;

} 
 
 
 	
function go($title="CodeIgniter",$blog="blog"){
  //main routine for fetching from wikipedia
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
  //need to decide what menu to display
  //either none or need to display what was there earlier
  $this->load->model('Articlesmodel');
  $this->Articlesmodel->path='../'.$blog.'/';
  $data['list']=$this->Articlesmodel->get_articles_list();
  
  //not used!
  $this->load->library('extracttext');
   //$test.=$this->extracttext->extract($content,'External links', 'edit');
   //echo 'test'.$test;
  //$this->output->cache(1);
  $config = array(
           'indent'         => true,
           'indent-spaces'   =>2,
           'output-xhtml'   => true,
           'wrap'           => 200);
  $data['content']=tidy_repair_string($content,$config,'utf8');//$tidy->parseString($html, $config, 'utf8');
  $this->load->view('wiki_view',$data);
} 	

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
  //$data['feature']= ". . . It is extremely important that the development of intelligent machines be pursued, for the human mind is not only limited in its storage and processing capacity but it also has known bugs: It is easily misled, stubborn, and even blind to the truth, especially when pushed to its limits.";
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


function cuil($title="Makarios+III"){
  //loads snoopy
  //let us be nice to wikipedia!
  
  $pattern='/\s*\_/';
  $title=preg_replace($pattern,'+',$title);
  $url='http://www.cuil.com/search?q='.$title;
  $this->load->library('snoopy');
  $this->snoopy->host=$url;
  $this->snoopy->fetch($url);
  $content=$this->snoopy->results;

  //print_r($content);
  //break;
  //works
  
 //$test=preg_match_all('/'.'<div\s*id=\"[[:alnum:]\_]*"\s*class=\"result\"\s*>([[:^alnum:]*[:alnum:]*\+\,\;\!\@\`\|\$\&\;\~\_\%\?\=\n\r\<\s\'\"\>\=\:\/\\\\\{\}\.\#\-\{\}\]\[])*'.'<\/table><\/div>/isx',$content,$values);
 
 //echo_array($values);
 
   //echo_array($values);break;
   //show only results
   /*
   $s='';  
   $i=0;
   foreach($values as $key=>$value){
    $i=$i+1;
    if ($i<3){$s.=$value[0]."\n";}
   }
  */
  
   //$content=($s);
   $data['menu']='';
   $data['category']='';
  
   $config = array(
           'indent'         => true,
           'output-xhtml'   => true,
           'wrap'           => 200);
     $tidy = tidy_parse_string($content);
  $body = tidy_get_body($tidy);      
   $data['content']=$body;
   /*        
  $data['content']=tidy_repair_string($content,$config,'utf8');
  $data['content']=tidy_get_body($data['content']);*/
  $data['title'] = $title;
  $this->load->model('Articlesmodel');
  $this->Articlesmodel->path='../blog/';
	  $data['list']=$this->Articlesmodel->get_articles_list();
	  $this->load->library('filterclass');
   $data['feature']= ". . . It is extremely important that the development of intelligent machines be pursued, for the human mind is not only limited in its storage and processing capacity but it also has known bugs: It is easily misled, stubborn, and even blind to the truth, especially when pushed to its limits.";
   //$this->load->library('extracttext');
   //$test.=$this->extracttext->extract($content,'External links', 'edit');
   //echo 'test'.$test;
  $this->output->cache(0);
  
  $this->load->view('cuil_view',$data);
} 	


function google($title="Makarios+III"){
  //loads snoopy
  //let us be nice to wikipedia!
  
  $pattern='/\s*\_/';
  $title=preg_replace($pattern,'+',$title);
  $url='http://www.google.com/search?hl=en&q='.$title.'&btnG=Google+Search';
  $this->load->library('snoopy');
  $this->snoopy->host=$url;
  $this->snoopy->fetch($url);
  $content=$this->snoopy->results;

    $data['menu']='';
   $data['category']='';
  
   $config = array(
           'indent'         => true,
           'output-xhtml'   => true,
           'wrap'           => 200);
   $tidy = tidy_parse_string($content);
   $body = tidy_get_body($tidy);
   $data['content']=$body;
   /*        
  $data['content']=tidy_repair_string($content,$config,'utf8');
  $data['content']=tidy_get_body($data['content']);*/
  $data['title'] = $title;
  $this->load->model('Articlesmodel');
  $this->Articlesmodel->path='../blog/';
	  $data['list']=$this->Articlesmodel->get_articles_list();
	  $this->load->library('filterclass');
   $data['feature']= ". . . It is extremely important that the development of intelligent machines be pursued, for the human mind is not only limited in its storage and processing capacity but it also has known bugs: It is easily misled, stubborn, and even blind to the truth, especially when pushed to its limits.";
   //$this->load->library('extracttext');
   //$test.=$this->extracttext->extract($content,'External links', 'edit');
   //echo 'test'.$test;
  $this->output->cache(0);
  
  $this->load->view('cuil_view',$data);
} 


	
function archive($title="Che_Guevara",$page="1")
//curently will only print the excerpt part of a post or article
//ie a summary
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
	  $data['content']=$this->filterclass->filterAll($data['content']);
	  
	  //colormark(words,string);
	  
	 
	  
	  //filter for tags
	  //filterAll is required to complete this
	  $data['feature']=$this->filterclass->feature($data['content']);
	  $data['keywords']=$this->filterclass->parseField('keywords',$data['content']);
	  $data['title']=$title;//$this->filterclass->parseField('title',$data['content']);
	  
	    $data['feature_image']=$this->filterclass->parseField('feature-image',$data['content']);
	  //let us get the list of articles in the directory

	  $this->Articlesmodel->path='../blog/';
	  //gets the menu on the left sidebar
	  $data['list']=$this->Articlesmodel->get_articles_list();
	  $time=60*60*24830;
    $this->output->cache(0.5);
    //gets all the posts 
    //ie posts/all
    $temp='';
    for ($i=0;$i<count($data['list'])-1;$i++){
     $data['content']=file_get_contents('../'.$data['list'][$i]);
     $temp.=truncate($data['content'], $length = 3000, $ending = '... <a href="../post'.$data['list'][$i].'"> read more</a>', $exact = false, $considerHtml = true);
     $temp.='<hr />';
    } 
    $data['content']=$temp;
 
	  //let us view what we got by sending data and choosing the view
	  //echo_array($data['list']);
	    $this->load->view('archive_view',$data);
 	}	
	
	
	
function post($location='blog',$title="Che_Guevara",$page="1")
	{
	  //gets data from file to start with rather than database
	  //this will have to be extended
    //$data['content']=markdown(file_get_contents("../articles/$title".'.dat'));
	  //This is the main routine for blog posts
	  //for other directories actually it is similar
	  // Blogs/post/directory/article/title
	  
     //$this->session;
     //$session = $this->session->all_userdata();
      //if ($this->session->userdata('login_status')){echo 'Logged in';}
     //echo_array($session);break;
    // echo $session_id;break;
	  $this->benchmark->mark('code_start');
	  $this->load->model('Articlesmodel');
	  $this->Articlesmodel->article_name="../".$location."/".$title.'.dat';
	  $data['content']=$this->Articlesmodel->get_article();
	  
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
	 
	  $data['content']=toc(markdown($data['content']));
	   $data['toc']=toc_menu(markdown($data['content']));
	  $this->Articlesmodel->path='../'.$location.'/';
	  //gets the menu on the left sidebar
	  $data['list']=$this->Articlesmodel->get_articles_list();
	  //$time=60*60*24830;
    //$this->output->cache(0);
	  //let us view what we got by sending data and choosing the view
    $this->load->view('article_view',$data);
 	}


function ajax_post($location='blog',$title="Che_Guevara",$page="1")
	{
	  //gets data from file to start with rather than database
	  //this will have to be extended
    //$data['content']=markdown(file_get_contents("../articles/$title".'.dat'));
	  //This is the main routine for blog posts
	  //for other directories actually it is similar
	  // Blogs/post/directory/article/title

     //$this->session;
     //$session = $this->session->all_userdata();
      //if ($this->session->userdata('login_status')){echo 'Logged in';}
     //echo_array($session);break;
    // echo $session_id;break;
    $s=$this->load->view('article_view',$data,true);
    echo $s;
    return 'this is a test';
	  $this->benchmark->mark('code_start');
	  $this->load->model('Articlesmodel');
	  $this->Articlesmodel->article_name="../".$location."/".$title.'.dat';
	  $data['content']=$this->Articlesmodel->get_article();

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

	  $data['content']=toc(markdown($data['content']));
	   $data['toc']=toc_menu(markdown($data['content']));
	  $this->Articlesmodel->path='../'.$location.'/';
	  //gets the menu on the left sidebar
	  $data['list']=$this->Articlesmodel->get_articles_list();
	  //$time=60*60*24830;
    //$this->output->cache(0);
	  //let us view what we got by sending data and choosing the view

    return $data;
    //$s=$this->load->view('article_view',$data,true);
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


function stamps($location='blog',$title="introduction",$page="1")
	{
	  
    $this->_common($location,$title,$page,'cyprus_view');
 	}



function NDIA($location='blog',$title="introduction",$page="1")
	{
	 
    
    $this->_common($location,$title,$page,'NDIA_view');
 	}




function _common($location='blog',$title="introduction",$page="1",$view="cyprus_view",$data='')
 {
    
    
    $this->benchmark->mark('code_start');
    $this->load->helper('date');
    $format = 'DATE_ISO8601';
    $time = time();
    $data['date']=standard_date($format, $time);
   
   
	  $this->load->model('Articlesmodel');
	  $this->Articlesmodel->article_name="../".$location."/".$title.'.dat';
	  $this->Articlesmodel->article_comments="../".$location."/".$title.'.tlk';
	  $data['content']=$this->Articlesmodel->get_article();
	  $data['comments']=$this->Articlesmodel->get_comments();
	  $data['content']=$data['content'].$data['comments'];
	  $data['location']=$location;
	  
    //loads the parser filters
	  $this->load->library('filterclass');
	  $this->filterclass->filterAll($data['content']);
	  $data['content']=$this->filterclass->filter_value;
		  $this->filterclass->parseFields($data['content']);
	  foreach ($this->filterclass->fields as $key=>$value)
	  {
	   $data[$key]=$value;
	  }
	  //session data
	  
	  $data['user']=$this->user;
	  $data['title']=$title;//$this->filterclass->parseField('title',$data['content']);
	  $data['logo']='China';
	  $data['content']=toc(markdown($data['content']));
	  $data['toc']=toc_menu(markdown($data['content']));
	  $this->Articlesmodel->path='../'.$location.'/';
	  //gets the menu on the left sidebar
	  $data['list']=$this->Articlesmodel->get_articles_list();
	  $data['location']=$location;
	  $menu=@file_get_contents('../'.$location.'/'.'menu.dat');
	  if ($menu){$data['list']='';$menu=markdown($menu);}
	  $data['menu']=$menu;
	  $time=60*60*24830;
    //$this->output->cache(0);
	  //let us view what we got by sending data and choosing the view
	  
    $this->load->view('stamps/'.$view,$data);
    
}



function china($location='blog',$title="Che_Guevara",$page="1")
	{
	  //gets data from file to start with rather than database
	  //this will have to be extended
    //$data['content']=markdown(file_get_contents("../articles/$title".'.dat'));
	  //This is the main routine for blog posts
	  //for other directories actually it is similar
	  // Blogs/post/directory/article/title
	  
    $this->_common($location,$title,$page);
	  
 	}





function galleries($title="Che_Guevara",$page="1"){
      $this->session;
     $session = $this->session->all_userdata();
     //$this->session->set_userdata('login_status', 'TRUE');
     if ($this->session->userdata('login_status')){echo 'Logged in';}else{echo 'pls log-in';}
	break;
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
     
	  $data['title'] = $gallery_name;
	  $data['heading'] = "My Real Heading";
	  $data['gallery']=$gallery_name;
	  $data['page_num']=$page_num;
	  $this->load->view('photographer_gallery',$data);
	}



}
?>