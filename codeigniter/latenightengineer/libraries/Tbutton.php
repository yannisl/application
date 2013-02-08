<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
/*
 *  The Tbutton class defines a standard
 *  push button
 *  it can have two states
 *
        Tbutton:
 *         state:on/off/hover
 *          size:
 *          position:
 *          image:
 *          text:
 *          taborder
 *          OnClick: Button1Click
 *          Height:
 *          Width:
 *          style:
 *          persistent file
 *          ImageListitem
 *          interface wizard
 */

//  define('WEBROOT','../CodeIgniter');
//  define('SERVERROOT','http://localhost/CodeIgniter');
//  define('DATADIR',WEBROOT.'/data/');




class TButton extends Tcontrol {
    // Each list can contain an enabled and disabled
    public $properties=array(
             'name'=>'name',
             'text'=>'text',
             'taborder'=>'taborder',
             'image'=>array('rss.gif',
                            'active',
                            'pressed'),
             'state'=>0,                            // state 0 normal 1 active 2 visited etc
             'container'=>'div',
             'actions'=>array(),
             'css'=>array()
    );

    public $image_path='/images/icon/assets/';
    public $names=array();                              // array of names


    function TButton($control = array(), $formId = '')
    {
        // initialize parent class
        parent::TControl();

        // Instantiate the CI libraries so we can work with them
        $CI =& get_instance();
        // $CI=$this->init();
        if (!isset($CI->form)) {
            $CI->load->helper('form');
        }

        log_message('debug', 'Loaded TButton');



    }


    public function get($name=''){
        $result=$this->yaml_file_to_array(DATADIR.'image_list_01.yml');
        //echo_array($result);
    }

    //must check cache
    public function create($name='',$properties='',$cache='FALSE'){

        //if yaml file exist load and go
        if ($result=$this->yaml_file_to_array(DATADIR.$name.'.yml')){
            //echo_array($result);
            return $result;
        }
        if (($name=='')){
            $name=$this->auto_name();
            $this->properties['name']=$name;
            $this->names[]=$name;
            // adds to button list so
            // we can increase standad name
            // list
        }
        else
        {
            $this->properties['name']=$name;

        }
        // if no properties get default properties

        if (empty($properties)){

            $button=$this->properties;
        }
        else
        {
            // if new properties were sent merge the array

            $button=array_merge($properties,$this->properties);
        }

        $yaml=$this->to_Yaml($button);
        $this->save_to_yaml($yaml,DATADIR.$name.'.yml');


        return $yaml;                          // return the button array
    }

    //  sets a name automatically
    private function auto_name(){

        // the name starts from the class name Tbutton1 etc
        // toString inherits method from Tcontrol
        // which inherits from Object
        
        $prefix=toString($this);
        // get current count
        $counter=count($this->names);
        // create name
        $name=$prefix.'_'.$counter;
        
        return $name;
    }

    // sets all properties in property array
    // this needs to be moved up the ladder
    // in Tcontrol
    // if a property is not provided
    // a default value is set
    // needs to be deveoped further
    private function set_properties($properties=array()){

        if ((!isset($properties)) || (!is_array($properties))){
            $properties=$this->$properties;
            return $properties;
        }
        else
        {
            $this->$properties=$properties;                     //set object properties
        }

    }

    // sets a property in property array
    // this needs to be moved up the ladder
    // in Tcontrol
    //

    function set_property(){
    }

    function get_property(){
    }

  
    function example($image_name=''){
        //$image_name='rss.gif';

        $s='<div style="width:98%;clear:both" class="bordered curvy clearfix sortable panel-hover">
        <img class="move" style="display:block;float:right"   src="'.SERVERROOT.$this->image_path.$image_name.'" />
   <img class="move" style="display:block;float:right"   src="'.SERVERROOT.$this->image_path.$image_name.'" />
        </div>';


       return $s;
        ;}


    // end class Tbutton
}