<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
/**
 Generic TImagelist
  used internally to manage image lists
 *  for toolbars
 *  forms and other components
 *  
 * 
 * 
 * 
 * 
 */



class TImagelist extends Tcontrol {

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
// Each list can contain an enabled and disabled

    public $properties=array('name'=>'name',
                             'datasource'=>'filesystem',
                             'path'=>'../egypt/sexy/',
                             'items'=>array(),
                             'template'=>'image_list',
                             );
    public $file_names_raw=array();
    public $images=array('name'=>array(
                'image_name'=>'image_name',
                ),
                'sprites'=>'name',
                'image'=>'image_name',
            );
    public $image;
    public $image_store=array();  //
    public $image_lists=array();  //    array of arrays of all image lists
                                
    public $db_enabled=array();   //
    public $Control = array();    //
    public $image_path='../CodeIgniter/images/icon/toolbar/';        //
    public $image_path_http='http://localhost/CodeIgniter/images/icon/toolbar/';
     

    function TImagelist($control = array(), $formId = '')
    {
        // initialize parent class
        parent::TControl();
        
        // Instantiate the CI libraries so we can work with them
        $CI =& get_instance();
              
        $CI->load->helper('file');
      
      
        log_message('debug', 'Loaded TImagelist');
      
        
        
     }

    function get_all(){
        $CI=&get_instance();
        $CI->load->model('filesystem');
        $v=$CI->filesystem->get_all($this->image_path);
        return $v;
    }

    function init()
    {

        // Globalize $CI super object so we can use CI libaries like validation
        global $CI;
            $CI =& get_instance();
        // Return an instance of this form object
        return $this;
    }

  // main function calls all routines
  // to set a new List
  // or to read an existing one from the cache
  // Available options
  // FROMPATH from directory
  // FROMSTORE if not exists it will create
  // CACHE     will cache after create
  // empty or AUTO will create a default one form directory
  // if no directory is provided then good luck will return
  // empty!
  // paths are giving me problems
  
  function main($list='',$path='',$options='CACHE'){
     // $list='169,170,180,190';
      if (((isset($list))&&(!empty($list)))){
        $list=explode(',',$list);
        //echo_array($list);break;
      }
      else
      {
      $file_names=$this->get_all($this->image_path);
      $list=$this->file_names_raw=$file_names;

      //echo 'TEST '.echo_array($list);break;
      }
      $new=$this->set_image_default_properties($list);
           
      //dumps array to yaml
      $new=$this->to_yaml($new);

      //saves array to yaml
      $result=$this->save_to_yaml($new,DATADIR.'image_list_01.yml');

      //reads from yamldefine('CONTROLSDIR','../CodeIgniter/data/components/');
      $result=$this->yaml_file_to_array(DATADIR.'image_list_01.yml');
      //echo_array($result);
      $s=$this->example($result);
      //break;
      return $s;
  }

/* Puts defaults in a way into an array
 * [023.png] => Array
        (
            [name] => 023.png
            [alias] => 023.png
            [title] => An Image
            [alt] => An Image
 *
 *
 *
*/


  function set_image_default_properties($list=''){
      foreach ($list as $name){
          
          //$image_src=$this->html_image($name,$path);
          $new[$name]=array('name'=>$name,
                      'alias'=>$name,
                      'title'=>'Image'.$name,        //although not necessary for list
                      'alt'=>'An Image'.$name,
           );  // necessary for usability in random components etc
      }
      return $new;
  }

 
   function html_image($image_name='',$path=''){
     $path=$this->image_path_http;
     $s='<img style="display:block;width:98%;margin:0 auto;overflow:hidden"   src="'.$path.$image_name.'" />';
     return $s;
   }

 function image_list_example($v){
      $s= <<<EOT
<script="text/javascript">
                $(function() {
                $("#sortable").sortable({
                placeholder: 'ui-state-highlight',
                sortable:({items: 'div'}),
                helper: 'clone',
                forceHelperSize:true,
                forcePlaceholderSize:true
                });
                $("#sortable").disableSelection();
                });
 </script>
EOT;


      $s.='<div id="sortable" class="clearfix" style="border:1px solid #eeeeec;padding-bottom:300px;padding-left:10px">';
       foreach($v as $key=>$value){
           if (is_array($value)){
               $s.='<div  class="clearfix" style="width:40px;float:left;overflow:hidden;
                     ">';
               //$s.=line($this->html_image($value['name']));
             //  $s.=line('<p style="text-align:center;font-size:11px;float:none;width:98%;display:block;margin:0 auto">'.$value['name']."</p>");
               $s.='</div>';
           }

       }
        $s.='</div>';
     return $s;


  }

  //just a silly example for testing
  function example($v){
       $s='';
       foreach($v as $key=>$value){
           if (is_array($value)){
              $s.= '<div id="sortable" class="curvy sortable draggable" style="width:50px;float:left;
                     border:1px solid #eeeeec";overflow:hidden>';
              $s.='<div  class="sortable" style="width:98%;float:left;
                     overflow:hidden;z-index:2000">';
               $s.=line($this->html_image($value['name']));
              // $s.=line('<p style="text-align:center;font-size:11px;float:none;width:98%;display:block;margin:0 auto">'.$value['name']."</p>");
               $s.='</div>';
               $s.='</div>';
           }
      
       }
       $data['content']=$s;
       $s=$this->view('icons_view',$data,TRUE);
     return $s;
    
    
  }

   
}