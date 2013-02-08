<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
/*
 *  Tpanel class defines standard
 *  container panels
 *  They can hold other components such as form
 *  or they can act as blocks
 *  of html
 *
 *  DB Enabled draw their content from a
 *  datasource
 *  CACHE
 *      Properties - so that they can be modified at a later time
 *      HTML       - if stationary call not to waste time
 *                     you can also use the MERGE library
 *                     to permanently merging it into other containers
 */

//  define('WEBROOT','../CodeIgniter');
//  define('SERVERROOT','http://localhost/CodeIgniter');
//  define('DATADIR',WEBROOT.'/data/');
//  define('TEMPLETSDIR','');

class Tcontainer extends Tcontrol {
    // Each list can contain an enabled and disabled
    public $properties=array(
             'name'=>'name',
             'caption'=>'caption',
             'taborder'=>'taborder',
             'template'=>'template',
             'content'=>array('source'=>'cms',
                              'title'=>'title',
                              'example'=>'2'),
             'image_list'=>'name',
             'items'=>array('Tlist',           //names of other components
                       'TImagelist',
                       'Tbutton',
                       'TComponent'),                             // state 0 normal 1 active 2 visited etc
             'container'=>array(
                           'element'=> 'div',
                           'style'=>'style'),
             'wrapper'=>array(
                           'element'=> 'div',
                           'style'=>'"width:38%;float:left;
                        margin-right:15px" class="bordered curvy clearfix shadowed"'
        ),
             'actions'=>array(),
             'events'=>array(),                     //for javascript
             'css'=>array('style'=>'style'),
             'parent'=>'self'

    );



    public $css=array('css_file'=>'file_name',
                      'css_snippet'=>'snippet'
    );

    public $image_path='/images/icon/assets/';

    public $all_properties=array();

    public $names=array();                              // array of names



    function Tcontainer($control = array())
    {
        // initialize parent class
        parent::TControl();
        // $this->toObject();
        // $this->setImageList();
        log_message('debug', 'Loaded Tpanel');
        $this->init();
    }

    //keep some values from URI
    function init(){
        $CI=&get_instance();
        if (!$CI->uri->segment(4)==NULL){
            $this->properties['content']['source']= $CI->uri->segment(4);
            $this->properties['content']['example']=$CI->uri->segment(6);
        }
    }


    //  changing everything to object
    //  maked life easier in the long run
    //  but more difficult in the short run

    function toObject(){

        $combine=array($this->css,$this->properties);
        $z=new ArrayObject($combine);
        $it = new RecursiveIteratorIterator( new RecursiveArrayIterator($z));
        foreach ($it as $key=>$val){
            echoPRE($key.'=>'.$it->current());
        }
        print_r($it);
        return $z;
        break;

    }
    public function get($name=''){
        $result=$this->yaml_file_to_array(DATADIR.'image_list_01.yml');
        //echo_array($result);
    }


    //  Create creates the object the object can then be manipulated as necessary
    //  It can create an array or an object from iterator
    public function create($name='',$properties='',$cache=FALSE){

        //if yaml file exist load and go
        if (($cache==TRUE))
        {
            if(!empty($name)){
                $result=$this->yaml_file_to_array(DATADIR.$name.'.yml');
                // echoPRE('FROM CACHE ');
                // echo_array($result);
                // echo_array($this->to_Yaml($result));
                return $result;}
        }
        // if there is no name would not find in
        // cache and hence reach here get an auto_name
        if (($name=='')){
            $name=$this->auto_name();
            $this->properties['name']=$name;
            // increment counter
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
        // must go through a set
        // maybe
        if (empty($properties)){

            $list=$this->properties;
        }
        else
        {
            // if new properties were sent merge the array
            //  echoPRE('MERGING');
            // echo_array($properties);
            $list=array_merge($this->properties,$properties);

        }
        //echo_array($list);
        $yaml=$this->to_Yaml($list);
        //echo_array($yaml);

        $this->save_to_yaml($yaml,DATADIR.$name.'.yml');
        $result=$this->yaml_file_to_array(DATADIR.$name.'.yml');
        // echo_array($result);
        return $result;                          // return the button array
    }

    //  sets a name automatically
    //  name is tlist_1 etc
    private function auto_name(){

        // the name starts from the class name Tbutton1 etc
        // toString inherits method from Tcontrol
        // which inherits from Object

        $prefix=$this->toString($this);
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

    function set_property($properties=''){
        // set inherited from Object
        $this->_set(array('text'=>'testing',
                          'test'=>'Testing'));
        $vars = get_object_vars($this);
        //echo_array($vars);break;
    }

    function get_property(){
    }

    

    function example($case=1){
        $case=$this->properties['content']['example'];

        if ($case<1){$case=2;}
        $class='tpanel';
        $this->load('tpanel');
        $CI=$this->load('tabs');
        $data['feature']='feature';
        //common components
       $s='';
       
       
       
       if ($case==2){
       
        //$s.=$CI->{$class}->get('step_1');
        $s=$CI->{$class}->get('date',$data);
        $s.=$CI->{$class}->get('navigation_menu',$data);
        $s.=$CI->{$class}->get('spacer',$data);
     

        $s.=$CI->{$class}->get('navigation_buttons',$data);
        $s.=$CI->{$class}->get('step_2_text');
        $s.=$CI->{$class}->get('spacer-bottom',$data);
       
        //$s.=$CI->{$class}->get('cuneiform');
        //$s.=$CI->tpanel->get('three_column');
        //$s.=$CI->tpanel->get('wizard_three_column');
        //$s.=$CI->tpanel->get('puff_container');
        //$s.=$CI->tpanel->get('rss_container');
        //$s.=$CI->tpanel->get('puff_container');
        //$s.=$CI->tpanel->get('angelina');
        //$s.=$CI->tpanel->get('lorem');
        }
        
        $data['feature']='feature';
       // $s=$CI->{$class}->get('post_excerpt',$data);
       if ($case==1){
       $s='<div style="width:100%" class="clearfix">';
        //$s.=$CI->{$class}->get('date',$data);
        // $s.=$CI->{$class}->get('navigation_menu',$data);
        $s=$CI->{$class}->get('date',$data);
         $s.=$CI->{$class}->get('navigation_menu',$data);
        
        $s.=$CI->{$class}->get('masthead',$data);
        $s.=$CI->{$class}->get('spacer',$data);
         $s.=$CI->{$class}->get('navigation_buttons',$data);
       
       
        
        $s.=$CI->{$class}->get('home_text',$data);
         $s.=$CI->{$class}->get('spacer-bottom',$data);
          //$s.=$CI->{$class}->get('middle',$data);
    /*   $s.=$CI->{$class}->get('galleries_promo',$data);
       $s.=$CI->{$class}->get('gallery_promo',$data);
       $s.=$CI->{$class}->get('editors_promo',$data);
       $s.=$CI->{$class}->get('pod_promo',$data);
       $s.=$CI->{$class}->get('pod_promo',$data);*/
      $s.='</div>';

      }
       //$s3=$CI->{$class}->get('sidebar_right',$data);
       
        //echo_array($s); exit;
       // $s=$CI->tpanel->example_puff();
       // $s.=$CI->tabs->example_tabs();
       // $s.=$CI->tabs->example_tabs();

       if (($case==3)){
        //$s.=$CI->{$class}->get('step_1');
        $s=$CI->{$class}->get('date',$data);
        $s.=$CI->{$class}->get('navigation_menu',$data);
        $s.=$CI->{$class}->get('spacer',$data);
        $s.=$CI->{$class}->get('navigation_buttons',$data);
        $s.=$CI->{$class}->get('post_text');
        
        $s.=$CI->{$class}->get('spacer-bottom',$data);
        //$s.=$CI->{$class}->get('cuneiform');
        //
        //$s.=$CI->tpanel->get('wizard_three_column');
        //$s.=$CI->tpanel->get('puff_container');
        //$s.=$CI->tpanel->get('rss_container');
        //$s.=$CI->tpanel->get('puff_container');
        //$s.=$CI->tpanel->get('angelina');
        //$s.=$CI->tpanel->get('lorem');
       }
   if (($case==5)){
        //$s.=$CI->{$class}->get('step_1');
        $s=$CI->{$class}->get('date',$data);
        $s.=$CI->{$class}->get('navigation_menu',$data);
        $s.=$CI->{$class}->get('spacer',$data);
        $s.=$CI->{$class}->get('navigation_buttons',$data);
        //$s.=$CI->{$class}->get('post_text');
       // $s.=$CI->tpanel->get('three_column');
        $s.=$CI->{$class}->get('galleries_promo',$data);
        $s.=$CI->{$class}->get('spacer-bottom',$data);
        //$s.=$CI->{$class}->get('cuneiform');
        //
        //$s.=$CI->tpanel->get('wizard_three_column');
        //$s.=$CI->tpanel->get('puff_container');
        //$s.=$CI->tpanel->get('rss_container');
        //$s.=$CI->tpanel->get('puff_container');
        //$s.=$CI->tpanel->get('angelina');
        //$s.=$CI->tpanel->get('lorem');
       }
       
    
     if (($case==6)){
        //$s.=$CI->{$class}->get('step_1');
        $s=$CI->{$class}->get('date',$data);
        $s.=$CI->{$class}->get('navigation_menu',$data);
        $s.=$CI->{$class}->get('masthead',$data);
        $s.=$CI->{$class}->get('spacer',$data);
        $s.=$CI->{$class}->get('navigation_buttons',$data);
        //$s.=$CI->{$class}->get('post_text');
       // $s.=$CI->tpanel->get('three_column');
        $s.=$CI->{$class}->get('galleries_promo',$data);
        $s.=$CI->{$class}->get('spacer-bottom',$data);
        //$s.=$CI->{$class}->get('cuneiform');
        //
        //$s.=$CI->tpanel->get('wizard_three_column');
        //$s.=$CI->tpanel->get('puff_container');
        //$s.=$CI->tpanel->get('rss_container');
        //$s.=$CI->tpanel->get('puff_container');
        //$s.=$CI->tpanel->get('angelina');
        //$s.=$CI->tpanel->get('lorem');
           return $s;
       }
        
  if (($case==4)){
        //$s.=$CI->{$class}->get('step_1');
        $s=$CI->{$class}->get('date',$data);
        $s.=$CI->{$class}->get('navigation_menu',$data);
        $s.=$CI->{$class}->get('spacer',$data);
        $s.=$CI->{$class}->get('navigation_buttons',$data);
        //$s.=$CI->{$class}->get('post_text');
        $s.=$CI->tpanel->get('three_column');
        $s.=$CI->{$class}->get('spacer-bottom',$data);
        //$s.=$CI->{$class}->get('cuneiform');
        //
        //$s.=$CI->tpanel->get('wizard_three_column');
        //$s.=$CI->tpanel->get('puff_container');
        //$s.=$CI->tpanel->get('rss_container');
        //$s.=$CI->tpanel->get('puff_container');
        //$s.=$CI->tpanel->get('angelina');
        //$s.=$CI->tpanel->get('lorem');
       }
        return $s;
    }
    
    // end class container
}

