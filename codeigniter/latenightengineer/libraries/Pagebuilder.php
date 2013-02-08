
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

/**
 * BackendProf
 *
 * An open source development control panel written in PHP
 *
 * @package		BackendProf
 * @author		Dr Y Lazarides
 * @copyright	Copyright (c) 2009, Dr Y Lazarides
 * @license		http://www.gnu.org/licenses/lgpl.html
 * @link		http://www.kaydoo.co.uk/projects/backendpro
 * @filesource
 */

// ------------------------------------------------------------------------

/**
 * Page Class
 *
 * Asset management and optimisation library. Allows the programmer
 * a simple way to load default assets (js/css files) for both the public
 * and admin areas of a site. Also allows passing php variables into
 * javascript variables.
 *
 * @package   	BackendPro
 * @subpackage  Libraries
 */
define('CSSDIR','../CodeIgniter/css');
define('JSDIR','../CodeIgniter/js');
define('CSSBASE','localhost/CodeIgniter/CSS/');
define('WEBSITE','localhost/CodeIgniter/');

class Pagebuilder

{    
                            
var $css=array();
var $javascript=array(); //Javascript array
var $style=array();
var $bredcrumb=array();
var $default_assets=array();
var $variables=array(); //PHP -> JS variable array
var $html_text=array(); //final html output

public $doc_type = array(
    'html4-strict'  => '<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">',
    'html4-trans'  => '<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">',
    'html4-frame'  => '<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Frameset//EN" "http://www.w3.org/TR/html4/frameset.dtd">',
    'xhtml-strict' => '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
     <html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">',
    'xhtml-trans' => '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">',
     'xhtml-frame' => '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Frameset//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-frameset.dtd">',
    'xhtml1.1' => '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">'
);

public $page_elements=array('doctype'=>'construct_doctype',
                            'meta'=>'construct_meta',
                            'javascript'=> 'construct_javascript',
                            'title'=>'construct_title',
                            'body'=>'construct_body',
                            'blocks'=>'construct_blocks' 
                            );

public $properties=array( 'css' => '<link rel="%s" type="text/css" href="%s" %s/>',
                          'style' => '<style type="text/css"%s>%s</style>',
                          'charset' => '<meta http-equiv="Content-Type" content="text/html; charset=%s" />');

public $page_regions=array('head'=>'head',
                           'sidebar'=>'sidebar_left',
                           'footer'=>'footer',
                           'blocks'=>array('block1',
                                           'block2','block3'));

public $default_template_tags=array('title'=>'',
                                    'logo'=>'',
                                    'slogan'=>'',
                                    'content'=>'',
                                    'panel'=>'',
                                    'other'=>'');

// --------------------------------------------------------------------
	
	/**
	 * Constructor
	 *
	 * @access	public
	 * @return	void	
	 */                         

function Pagebuilder()
	{
		// Create CI instance
		$this->CI = &get_instance();

		// Load needed files
		$this->CI->load->config('page');
		
		// Setup default, js_vars & on-fly asset arrays
		$s=$this->default_assets = $this->CI->config->item('default_assets');
		$this->variables = $this->CI->config->item('default_page_variables');
		
		$this->output = "";
		
		log_message('debug', " PageBuilder Class loaded");
		log_message('debug', " Default assets loaded");
		
		$this->init();
	}

function init()
{
   $s=$this->doc_type('xhtml-strict');
   $s.=$this->addTitle('Default Page');
   //get default directory for CSS and get files
   $s.=$this->css=list_files(CSSDIR,'css');
   $s.=$this->addCSS($this->css);
   //$s.=$this->addJavascript(list_files(JSDIR,'.js'));
   
   $s.=$this->add_style('.clearer{clear:both};');
   //echo $s;break;
   log_message('debug', "Backend-Prof : Default head initialized"); 
}

//user function to add before Head
//plugin architecture
function beforeHead(){

}


//user function to add after Head
//plugin architecture
function afterHead(){



}

//method to be used from external sources

function build_head($head){

 //doctype from configure file
 $s=$this->docType($head['doctype']);
 //css from themes,plugins and configure file
 //adds the title
 $s.=self::addTitle($head['title']);
 //add css
 //$s.=self::addCSS($head['css']);
 //from themes plugins and special functions
 //$s.=self::addJavascript($head['javascript']);
 //from site configuration
 //some items like descripton from database
 //and other inputs
 //$s.=self::addMeta($head['meta']);
 //config keywords,copyright,description etc
 //from user and special functions
 //$s.=self::addJavascriptSnippets($head['snippets']);
 //adds user styles from user input on a page
 //or generators
 //$s.=self::addStyle($head['style']);
 $this->html_text[]=$s;
 return $s;
}



/*
* Returns a doctype string.
*
* Possible doctypes:
*   + html4-strict:  HTML4 Strict.
*   + html4-trans:  HTML4 Transitional.
*   + html4-frame:  HTML4 Frameset.
*   + xhtml-strict: XHTML1 Strict.
*   + xhtml-trans: XHTML1 Transitional.
*   + xhtml-frame: XHTML1 Frameset.
*   + xhtml11: XHTML1.1.
*
* @param  string $type Doctype to use.
* @return string Doctype.
*/
function doc_type($type = 'xhtml-strict') 
  {
    if (isset($this->doc_type[$type])) {
         return (line($this->doc_type[$type]));
    }
   return 'xhtml-strict';
   }

//<title>Document title</title>
//<link rel="stylesheet" href="http://www.w3.org/StyleSheets/Core/Modernist" type="text/css">

function addCSS($css_links=array()){
  $s='';
  foreach ($css_links as $value){  
   $s.=line(sprintf('<link rel="%s" href="http://%s%s" type="%s" />','stylesheet',CSSBASE,$value,'text/css'));
  } 
  //place css_links into global variable
  $this->css[]=$s;
  return $s;
}

//adds the title to the page
//if not provided the general site default 
//will be added

function addTitle($page_title){
 $s=sprintf('<title>%s</title>/n',$page_title);
 return $s;
}

//----------------------------------------------


function addJavascript($javascript_links=array('jQuery'=>'reset.css','default'=>'jQuery.js')){
 $s='';
 foreach ($javascript_links as $key=>$value){  
 
   $s.=line(sprintf('<script type="text/javascript" src="%s"></script>',$value)); 
   
  } 
  //place css_links into global variable
  $this->javascript[]=$s;
  return $s;
}

function addMeta($css_link){
  $this->css_links[]=$css_link;
}


//adds on the fly CSS
//useful for minor twiks to CSS
function add_style($style){
 $s=line('<style>');
 $s.=line($style);
 $s.=line('</style>'); 
 return $s;
}


//adds a javascript snippets onto the page
//useful for loading jquery initialization
//routines

function add_javascript_snippets($js=''){
 $s=line('<script type="text/javascript">');
 $s.=line($js);
 $s.=line('</script>'); 
 return $s;
}

//----------------------------------------------


function render_page(){
}


function footer($footer){

}

//this should go to template
function addBody($s){
 $s=(sprintf('<body>%s</body></html>',$s));
 return $s;
}

/**
 * Creates a link to an external resource and handles basic meta tags
 *
 * @param  string  $title The title of the external resource
 * @param  mixed   $url   The address of the external resource or string for content attribute
 * @param  array   $attributes Other attributes for the generated tag. If the type attribute is html, rss, atom, or   icon, the mime-type is returned.
 * @param  boolean $inline If set to false, the generated tag appears in the head tag of the layout.
 * @return string
 * To do add all the junk for rss etc from wordpress
 */
 
function meta($type, $url = null, $attributes = array(), $inline = true) {
  //attribute name=>author content=>yourname       
            $types = array(
             'rss'   => array('type' => 'application/rss+xml', 'rel' => 'alternate', 'title' => $type, 'link' => $url),
                'atom'  => array('type' => 'application/atom+xml', 'title' => $type, 'link' => $url),
                'icon'  => array('type' => 'image/x-icon', 'rel' => 'icon', 'link' => $url),
                'keywords' => array('name' => 'keywords', 'content' => $url),
                 'description' => array('name' => 'description', 'content' => $url),
                 
             );
             switch($type) {
              case ('icon'):
                $s.=__(sprintf('<link rel="Shortcut Icon" href="%s" type="image/x-icon" />',$url));
                break;
              case ('charset'):  
                 $s.=__(sprintf('<meta http-equiv="Content-Type" content="text/html; charset=%s" />',$attributes['charset']));
               break; 
              case ('meta'): 
               if ($type==='meta' && is_array($attributes)){
                $s.=__(sprintf('<meta name="%s" content="%s" />',$attributes['name'],$attributes['content']));
               }
               break;
               
               
             }
             
 return $s;            

}


#end class
}


?>













