<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
/**
 Generic TControl Class
 All controls inherit from this base class
 Controls can be
 
  input elements
  drop downs
  special widgets
  links
  navigators
 */
define('THEMESPATH','../CodeIgniter/');

// class defines the themes engine for the CMS
// themes reside in the themes directory
// unless configured differently
class Themes extends Object{

    // array that holds all scripts 
    // so that they can be rendered and manipulated
    public $themes=array('js_file'=>'js_file_name',
                          'js_script'=>'js_script',
                          'js_onload'=>'onload',
                    );
 
    function __construct()
    {
        // Instantiate the CI libraries so we can work with them
        $CI =& get_instance();
        
         log_message('debug', 'Loaded TControl');
     }

    // autodiscovers themes that reside
    // in the CMS
    // returns array of names of themes
    // etc

    function _autodiscover(){
        
    }
  
    //loads a themes parameters
    function loadTheme(){
    }

    // parses a themes template
    // for more information on the theme
    // {{author:Yannis }}
    // {{version: something}}
    // {{colors:yes}}
    // {{other: other}}
    // {{parent: other themes}}
    
    function parseTheme(){

    }
    function beforeView(){

    }

    function render(){

    }

}



