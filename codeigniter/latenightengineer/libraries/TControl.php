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
define('DEFAULTPATH','../CodeIgniter/data/components');
define('YAML','yml');
//for image list
define('WEBROOT','../CodeIgniter');
define('SERVERROOT','http://localhost/CodeIgniter');
define('DATADIR',WEBROOT.'/data/');
define('TEMPLETSDIR','admin/');

class TControl extends Object{

// Common functions to all controls
// has
// Type - visual or other
// properties: attributes;
// get_attributes
// render
// persistent
// from file etc..
//
//
// new TControl 
// or extends TControl is better
// active=enable or disable - sets attribute, if not exist provide 
// 
//   

    // array that holds all scripts 
    // so that they can be rendered and manipulated
    public $js=array('js_file'=>'js_file_name',
                     'js_script'=>'js_script',
                     'js_onload'=>'onload',
                    );

   // array that holds any special css files
   // for the control
   // or <style></style>
   public $css=array('css_file'=>'css_file_name',
                     'css_script'=>'css_script',
                     );



    public $tooltip;
    public $draggable;
    public $resizable;
    public $enabled;
    public $etc;  
    public $Control = array();
    public $is_html_control=TRUE;
    public $other_attributes=array(
              'before'=>'before',
              'after'=>'after',
              'auto_tab'=>'auto_tab'
    );
    public $top;
    public $left;
    public $default_value;
    public $db_field;
    public $has_validation;
    public $validation_rules;
    public $db_field_map;
    public $parent;
    public $html_attributes=array('accesskey'=>'accesskey="%s" ',
                           'name'=>'name="%s" ',
                           'names'=>'name="%s" ',
                           'id'=>'id="%s" ', 
                           'class'=>'class="%s" ', 
                           'value'=>'value="%s" ',
                           'checked'=>'checked="%s" ',
                           'disabled'=>'"disabled" ',
                           'readonly'=>'readonly="readonly" ',
                           'maxlength',
                           'alt'=>'alt="%s" ',
                           'usemap',
                           'ismap',
                           'accesskey',
                           'onselect',
                           'accept', 
                           'submit',
                           'reset',
                           'file',
                           'hidden',
                           'image',
                           'value'=>'value="%s" ',
                           'label',
                           'size'=>'size="%s" ',
                           'style'=>'style="%s" ',
                           'title'=>'title="%s" ',
                           'onclick'=>'onclick="%s;" ',
                           'onfocus'=>'onfocus="%s;" ',
                           'onblur'=>'onblur="%s;" ',
                           'onkeypress'=>'onkeypress="%s;" ',
                           'onkeyup'=>'onkeyup="%s;" ',
                           'onchange'=>'onchange="%s;" ',
                           'ondblclick'=>'ondblclick="%s;" ',
                           'ondblclick'=>'ondblclick="%s;" ',
                           'src'=>'src="%s" ',
                           'tabindex'=>'tabindex="%s" ',
                           'button'=>'<button %s>%s </button>',
                           'rows'=>'rows="%s" ',
                           'cols'=>'cols="%s" ',
                           'textarea'=>'<%s  %s>%s </%s>',
                           'select'=>'<%s  %s>%s </%s>',
                           'type'=>'type="%s" ',
                       ); 
     
      
     
    function TControl($control = array(), $formId = '')
    {

        // Instantiate the CI libraries so we can work with them
        $CI =& get_instance();
        
         log_message('debug', 'Loaded TControl');
     }


    function init()
    {

        // Globalize $CI super object so we can use CI libaries like validation
        global $CI;

        // Return an instance of this form object
        return $this;
    }
    //the model will just return the items of
    //the file
    //this is a generic model routine,
    // as long as it returns an array of properties it is ok!

    function model($model_name='filesystem',$method='get_all',$vars='../egypt/axel-bueckert/'){
        $CI=&get_instance();
        $CI->load->model($model_name);
        $v=$CI->{$model_name}->{$method}($vars);
        return $v;
    }

    /**
     * Return true if form validated, false if it did not.
     *
     * @return Boolean
     */

    function load($s='',$method='library'){
        //global $CI;
        $CI=& get_instance();
        $CI->load->{$method}($s);
        //echo_array($CI);break;
        return  $CI;
    }

    //  sets a name automatically
    //  name is $name is class name
    //  needs to be checked
    private function auto_name($name){

        $prefix=$this->toString($name);
        // get current count
        $counter=count($this->names);
        // create name
        $name=$prefix.'_'.$counter;

        return $name;
    }

    private  function hasTemplate(){
      if (!$this->properties['template']==NULL){

          //echo 'it has a template';
          return true;
      }
      else
      {
          //echo 'no template';
        return false;
      }
    }

    //checks if name exists
    function hasName($name){
        if ($name==NULL){
            return false;
        }
        else
        return true;
    }

    function yamlExists($name){
        if (file_exists(DATADIR.$name.'.yml')){
            return true;
        }
        return false;
    }

    function yamlDelete($name)
    {
        if (file_exists(DATADIR.$name.'.yml'))
        {
            unlink(DATADIR.$name.'.yml');
        }
    }



    function propertiesToYaml($name,$properties){

        $this->properties['name']=$name;
        $yaml=$this->to_Yaml($properties);
        $result=$this->save_to_yaml($yaml,DATADIR.$name.'.yml');
        return $result;
    }


   function save_to_Yaml($data,$file_name){

        $CI=&get_instance();
        $CI->load->helper('file');
        $CI->load->library('spyc');
                        
      
        if ( ! write_file($file_name, $data))
        {
            return false;
        }
        else
        {
           // echo 'File written!';
        }

    }

    function read_from_Yaml($file_name){
        $CI=&get_instance();
        $CI->load->helper('file');
        $CI->load->library('spyc');
        $data=read_file($file_name);
        //echo $data; echo 'IN READ';
        //break;
       if ( !$data)
        {
            return false;
        }
        else
        {
            //$array=$this->yaml_file_to_array($data);
            //echo 'File read!';
        }
        // echo_array($data);break;
       return $data;
    }

    function to_YAML($v){

        $CI =& get_instance();
        $CI->load->library('spyc');
        $array = $CI->spyc->YAMLDump($v);
        return $array;
    }
    // table_fields
    /*[id] => Array
                (
                    [name] => id
                    [type] => int(11)
                    [null] => NO
                    [key] => PRI
                    [default] =>
                    [extra] => auto_increment
     * This is the Field Spec
     */

    function yaml_file_to_array($file_name){
        $CI =& get_instance();
        $CI->load->library('spyc');
        if (file_exists($file_name)){
            $array = $CI->spyc->YAMLLoad($file_name);
            return $array;

        }
        else
        {
            return false;

        }

    }


   function attributes_to_string($v)
   {
       $attribute='';
      
        foreach ($v as $key=>$value){
            //echo $key .', ';
        if (array_key_exists(trim($key),$this->html_attributes))
            {
                $attribute .=sprintf($this->html_attributes[$key],$value);
            }
        }
       return $attribute;
   }

   //renders the final html
   //and returns or can update global object
   function view($template_name='puff_container',$data='',$result=false){
        $CI =& get_instance();
        $z=$CI->load->view(TEMPLETSDIR.$template_name,$data,TRUE);
        return $z;
    }
   
   
}