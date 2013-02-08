<?php
# Main Controller
#
#
# includes yaml for forms
#
# version 10.01

include_once('../strings/markdown.php');

define('PREFIX' ,'../egypt/');

class Generators extends Controller {
//controller for articles rather than galleries
//it can also send images etc
//missing is how to get the data
//this is for to-morrow
var $CI;
	var $current_table;
	var $base_url = '';
	var $lang = array();
  var $current_images;
  var $current_gallery;

function Generators($t='gallery')
    {
      parent::Controller();
      $this->load->scaffolding('gallery');
   }

function auto($table='gallery',$action='',$item='3'){

  $this->load->library('scaffold');
  //$this->scaffold->__construct('gallery');
  //$this->scaffold->prepare();
  if ($action=='view'){$this->scaffold->view();}
  if ($action=='edit'){$this->scaffold->edit();}
  if ($item=='3' && $action=='add') {$this->scaffold->add();}
}




function __get_galleries_map($directory){

  $this->load->helper('directory');
  $map=directory_map($directory);
  foreach($map as $key=>$value){
  if (is_array($value)){
    $k[]=$key;
   } 
  }
 return($k);
}


function __get_gallery_images($path='../egypt/michael-magin'){
//send sexy should return sexy
  $k='';
  $this->load->helper('directory');
  $map=directory_map($path);
  if (is_array($map)) {
    foreach($map as $key=>$value){
      $k[]=$value;
    } 
      return($k);
    }
  else
  {
  return $k=array('');
  }
  
}

function RemoveExtension($strName) 
{ 

     $ext = @strrchr($strName, '.'); 

     if($ext !== false) 
     { 
         $strName = @substr($strName, 0, -strlen($ext)); 
     } 
     return $strName; 
} 

//check if image exists 
function is_image($filename){
  if(is_array($filename)){return false;}
  $valid=array('.jpg','.jpe','.png','.JPG','.JPE','.PNG');
  $ext = strrchr(low($filename), '.');
  //echo $filename.' '.$ext;
  if (in_array($ext,$valid)){return true;}
}


function __array_to_links($gallery_path='sm/', $images='',$attributes=''){
//receives gallery name
//creates master link for 'code' menu
  if (!is_array($images)){return $s='';}
  $this->load->helper('inflector');
  $s='<h3> GALLERY '.up(humanize($gallery_path)).'</h3>';
  $s.='<ul>';
  foreach ($images as $key=>$value){
  $text=$this->RemoveExtension($value);
    //$value='this_is_a_test.jpg';
    $full_path='http://localhost/egypt/'.$gallery_path.'/'.$value;
    if ($this->is_image($value)){
    $s.='<li><a href="http://localhost/egypt/'.$gallery_path.'/'.$value.'"'." >".$text."</a></li>\n";}
    }
  $s.='</ul>';
return $s;
}


public function mdl_update_gallery($gallery='athena-01',$data=''){
//updates a gallery based on default values
//only titles are inserted
//all images are also updated in database based on
//default values
//updates gallery table with default values
//default values need to come from default settings settings
   $this->load->helper('inflector');
   $data = array('gallery_title' => $gallery,
   'gallery_author'=>'Dr Yannis Lazarides',
   'gallery_artist'=>humanize($gallery),
   'gallery_description'=>'gallery of '.$gallery,
   );
   $this->db->where('gallery_title',$gallery);
   if ($this->db->Update('gallery',$data)){
   echo ".. $gallery  ..updated";
   ;}
 }




public function mdl_create_gallery($gallery='athena-01',$images=array('1','2','3')){
//updates a gallery based on default values
//only titles are inserted
//all images are also updated in database based on
//default values
   $data = array('gallery_title' => $gallery,
     
   
   
   );
   $str = $this->db->insert_string('gallery', $data);
   echo $images;
   foreach($images as $key=>$value){
     //$s="insert into `photo_ikons`.`gallery` (`gallery_id`, `gallery_title`, `gallery_author`, `gallery_artist`, `gallery_description`, `path`) VALUES (NULL, '".$value."', '$value', 'Queen of Town', NULL, '')";
    $s="UPDATE photo_ikons SET gallery_author='unknown' WHERE gallery_title='Athena-01' "; 
     
   $query=$this->db->query($s);}
   echo $this->db->count_all('gallery');
 }

public function image($directory="../egypt/"){
//function lists all the galleries given a directory
//works assuming two levels only
//no more levels allowed
  
  //get all galleries from directory structure
  $map=$this->__get_galleries_map($directory);
 //echo_array($map);
 
 //foreach($map as $key=>$value){
 //$image_map=$this->__get_gallery_images($directory.$map[$key]);
 //echo_array($image_map);
 //$s=$this->__array_to_links($map[$key], $image_map,$attributes='');
  //e($s);
 //}
  
 for ($i=0;$i<count($map);$i++){
 $this->mdl_update_gallery($map[$i],'');
 }
 
 echo $map[13];
 
 break; 
  
 //  from array insert into table if not exists
   $data = array('gallery_title' => 'test');
   $str = $this->db->insert_string('gallery', $data);
   if (isset($k)){
     foreach($k as $key=>$value){
     $s="INSERT INTO `photo_ikons`.`gallery` (`gallery_id`, `gallery_title`, `gallery_author`, `gallery_artist`, `gallery_description`, `path`) VALUES (NULL, '".$value."', '$value', 'Queen of Town', NULL, '')";
     $query=$this->db->query($s);}
     echo $this->db->count_all('gallery');
// Produces an integer, like 25
  }

  return $map;

}

/**
* given a directory parses the directory
* gets all the images
* puts images in database
* with default values
* this way both worlds and camps are satisfied
* 
*/

public function to_table($directory='miles-aldridge',
  $table_name='images',$images_array=array('','')
  )

{
  $this->current_table='images';
  
  $msg='.. Unsuccessful to insert';
  //get all images
  $images_array=$this->__get_gallery_images(PREFIX.$directory);
  $this->current_images=$images_array;
  $this->current_gallery=$directory;
  echo_array($images_array);
  //if image insert in table
  if (is_array($images_array)) {
    foreach($images_array as $key=>$image){
      if ($this->is_image($image)){
        //insert into database
        $this->load->helper('inflector');
        $data = array(
        'img_filename'=>$image,
        'img_title' => 'Image Title',
        'img_caption'=>'Enter Image Caption here',
        'img_credit'=>'Dr Yannis Lazarides',
        'gallery_name'=>$directory,
        'img_description'=>'description',
        'img_copyright'=> 'copyright',
        'img_timestamp'=>'timestamp',
        'img_user'=>'user',
        'img_rating'=>100,
        'img_category'=>'nudes',
        'img_viewed'=>1000,
        'img_karma'=>8,
          );
        $query = $this->db->get_where($table_name, array('img_filename' =>$image ,
                                                      'gallery_name'=>$directory));

        if (!$query->result()){
         //if image does not exist to avoid duplicates      
          $str = $this->db->insert_string($table_name, $data); 
          $this->db->query($str);
          echoPRE($str); 
          $msg='Successful insert'; 
         } 
         else
         {
          $msg='.. duplicate not inserted';
         } 
      }
     }//foreach
  }
 e($msg);
 //shows edit view
 $this->add();
}


function add()
	{	
		$data = array(
		        'title'=>'add Image',
		        'base_uri'=>'BASEPATH',
		        'scaff_view_all'=>'View All',
		        'scaff_view_records'=>'View Records',
		        'scaff_create_record'=>'Create Record',
						'fields' => $this->db->field_data($this->current_table),
						'images'=>$this->current_images,
						'action'=>'add',
						'gallery'=>$this->current_gallery,
						);
		$this->load->helper('form');			
	
		$this->load->view('add', $data);
	}





public function tabsJS($animation,$file_prefix){
$animation='"'.$animation.'"';
$file_prefix="'".$file_prefix."'";

$s='<script type="text/javascript">';
$s.='var tabberOptions = {';

$s.="'onClick': function(argsObj) {";

$s.=' var t = argsObj.tabber; /* Tabber object */';
$s.=' var i = argsObj.index; /* Which tab was clicked (0..n) */';
$s.=' var div = this.tabs[i].div; /* The tab content div */';
$s.='/* Display a loading message */';
$s.= "div.innerHTML ='<img src=".$animation.' />'."';";

$s.='/* Fetch some html depending on which tab was clicked */';
  
$s.="  var url = $file_prefix + i + '.php';";
$s.="  var pars = 'foo=bar&foo2=bar2'; /* just for example */";
$s.="  var myAjax = new Ajax.Updater(div, url, {method:'get',parameters:pars});";
$s.='},';
$s.="'onLoad': function(argsObj) {";
$s.=' /* Load the first tab */';
$s.=' argsObj.index =0;';
$s.='    this.onClick(argsObj);';
$s.='  },';
$s.='}';
$s.='</script>';
$s.='<!-- Include the tabber code -->';
$s.='<script type="text/javascript" src="http://strings/tabber/tabber.js"></script>';
//echo $s;
// $this->html_text[]=$s;
 return $s;
}



function __tabs($v){
/*
 Parses a tab instruction

*/
  $s='<div class="tabber" id="mytabber1" >';
  //outer array
  foreach ($v as $key=>$val1){ 
   if(is_array($val1)){  
     //to skip type   
      //echo $val; 
       $s.='<div class="tabbertab" style="padding:5px">'."\n";
	     $s.='  <h2>'.$val1['name'].'</h2>'."\n";
	     $s.=' <div style="width:50%;">'.$val1['content'].'</div>'."\n";
       $s.='</div>';
   }
  }
  
  $s.='</div>';
  //$this->html_text[]=$s;
  $file_prefix='ex';
  $img='load-graphic';
  //loads javascript
  $s.=$this->tabsJS($img,$file_prefix);
  //echo $s;
  return $s;
  //$this->load->view('tabber_view');
}

   function __datasource($v){
    echo_array($v);
     if (array_key_exists('table',$v)){
       $this->load->dbforge();
       /*$fields = array(
                        'blog_id' => array(
                                                 'type' => 'INT',
                                                 'constraint' => 5,
                                                 'unsigned' => TRUE,
                                                 'auto_increment' => TRUE
                                          ),
                        'blog_title' => array(
                                                 'type' => 'VARCHAR',
                                                 'constraint' => '100',
                                          ),
                        'blog_author' => array(
                                                 'type' =>'VARCHAR',
                                                 'constraint' => '100',
                                                 'default' => 'King of Town',
                                          ),
                        'blog_description' => array(
                                                 'type' => 'TEXT',
                                                 'null' => TRUE,
                                          ),
                );
       */         
       $fields=$v['fields'];
       $this->dbforge->add_field($fields); 
       $this->dbforge->add_key('ID',TRUE);
       $this->dbforge->create_table($v['table'],TRUE);
       echo('..table created..');
      }
      $fields = $this->db->list_fields($v['table']);

foreach ($fields as $field)
{
   echo $field;
}
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
     
     foreach ($v as $key=>$value){
     //echo $key .', ';
     if (array_key_exists(trim($key),$this->parsecontrols->properties)){
       $attribute .=sprintf($this->parsecontrols->properties[$key],$value);
      }
     }
     $s="<div>\n";
     if (isset($v['before'])) {$s.=$v['before'];}
     $s.=sprintf('<input %s />'."\n",$attribute);
     if (isset($v['after'])) {$s.=$v['after'];}
     $s.="</div>\n";
     return $s;   
	   }
    
    function __button($v){
    //prepares a button
     //properties 'name'=>'name="%s" ',
     $attribute='';
     //echo_array($v);
     foreach ($v as $key=>$value){
     //echo $key .', ';
     if (array_key_exists(trim($key),$this->parsecontrols->properties)){
       $attribute .=sprintf($this->parsecontrols->properties[$key],$value);
      }
     }
     $s="<div>\n";
     if (isset($v['before'])) {$s.=$v['before'];}
     $s.=sprintf('<input %s />'."\n",$attribute);
     if (isset($v['after'])) {$s.=$v['after'];}
     $s.="</div>\n";
     return $s;   
	   }
	   
	   function __button2($v){
    //prepares a button
     //properties 'name'=>'name="%s" ',
     $attribute='';
     //echo_array($v);
     foreach ($v as $key=>$value){
     //echo $key .', ';
     if (array_key_exists(trim($key),$this->parsecontrols->properties)){
       $attribute .=sprintf($this->parsecontrols->properties[$key],$value);
      }
     }
     $s="<div>\n";
     if (isset($v['before'])) {$s.=$v['before'];}
     $s.=sprintf('<button %s />'."\n",$attribute);
     if (isset($v['text'])) {$s.=$v['text'];}
     if (isset($v['img'])) {$s.=''.$v['img'].'';}
     $s.='</button>';
     if (isset($v['after'])) {$s.=$v['after'];}
     $s.="</div>\n";
     return $s;   
	   }
	   
	    function __textarea($v){
    //prepares a button
     //properties 'name'=>'name="%s" ',
     $attribute='';
     //echo_array($v);
     foreach ($v as $key=>$value){
     //echo $key .', ';
     if (array_key_exists(trim($key),$this->parsecontrols->properties)){
       $attribute .=sprintf($this->parsecontrols->properties[$key],$value);
      }
     }
     $s="<div>\n";
     if (isset($v['before'])) {$s.=$v['before'];}
     $s.=sprintf('<textarea %s >'."\n",$attribute);
     if (isset($v['text'])) {$s.=$v['text'];}
     if (isset($v['img'])) {$s.=''.$v['img'].'';}
     $s.='</textarea>';
     if (isset($v['after'])) {$s.=$v['after'];}
     $s.="</div>\n";
     return $s;   
	   }
	   
	   function __getAttributes($val){
	    $attribute='';
	     foreach ($val as $k1=>$v1){
         if (array_key_exists(trim($k1),$this->parsecontrols->properties)){
                $attribute .=sprintf($this->parsecontrols->properties[$k1],$v1);
         }
       }
      return $attribute; 
	   }
	   
     function __select($v){
      //selct attributes from yaml file
     //prepares a select
      
      //prepare the attributes for the select
     
      $attribute='';
      foreach ($v as $key=>$value){
        if (array_key_exists(trim($key),$this->parsecontrols->properties)){
        $attribute .=sprintf($this->parsecontrols->properties[$key],$value);
      }
      }
      $s='<div style="width:45%;border:1px solid #ff0000;float:left">';
      $s.='<p>'.$v['caption'].'</p>';
      $s.='<select '.$attribute.'" style="width:80%"'.'">"';
      //echo $attribute; 
      //load file
      $array = $this->spyc->YAMLLoad('../CodeIgniter/data/country.yaml');
      //echo_array($array);
      $option_string='';
      //This would be better recursive but I was feeling
      //sleepy!
      foreach($array as $key=>$value){
       //check for optgroup first
       $option_string.=sprintf('<optgroup label="%s">'."\n",$key);
       if (is_array($value)){
        foreach($value as $k=>$val){
          //check if the option has properties
          //if is array it is assumed to have properties
          if (is_array($val)){$theVal=$k;
             $attribute= $this->__getAttributes($val);
             $option_string.=sprintf('<option label="%s" %s >%s',$k, $attribute, $theVal);
             $option_string.=sprintf('</option>'."\n");
          }
          else
          {$theVal=$val;
          $option_string.=sprintf('<option label="%s">%s',$k,$theVal);
          $option_string.=sprintf('</option>'."\n");
          } 
          
        }
       $option_string.=sprintf('</optgroup>'."\n"); 
       }
      }
       //echoPRE(htmlentities($option_string));
      $s.=$option_string;
      $s.='</select>';
      $s.='</div>';
      $s.='<div style="clear:both"></div>';
 return $s;
 


     
}
     
        
	    
function yaml($title='registration'){
 /*loads a yaml file
 this is not actually the place. It should be loaded in model
 but is here for convenience
 $title is the full path to yaml file but no extension
 */
 
 //load the Parsecontrols library
 $this->load->library('parsecontrols');
 //load YAML parser
 $this->load->library('spyc');
 //load all the yaml info into an array variable
 $array = $this->spyc->YAMLLoad('../CodeIgniter/data/'.$title.'.yaml');
 //echo '<pre><a href="../CodeIgniter/data/'.$title.'">spyc.yaml</a> loaded into PHP:<br/>';
 //first check what type of component it is!
 $s='';
 
  //parse outer for name, buttons and text
foreach ($array as $outer_key=>$outer_value){
   
    foreach ($array['form'] as $key=>$value){
     
      //if is array it goes deeper
      
      if (is_array($value)){
       foreach($array['form'][$key] as $k=>$v){
        //v is an array
        //checks type
         
        //only one level so slightly different from fields
        //so we call it only on dts      
        if ( $key =='datasource' && $v=='dts'){
         //calls the datasource for the table. If table does not exist it will
         //created automatically
         //need to be set after fields are parsed;
          
          $msg=$this->__datasource($value);
        }
        
        if (isset($v['type']) && $v['type'] =='text'){
         //pr($v['type']);
         //echo_array($array['form'][$key][$k]);
         $s.=$this->__input($v);
         }
         
        if (isset($v['type']) && $v['type'] =='checkbox'){
         $s.=$this->__input($v);
         }

        if (isset($v['type']) && $v['type'] =='radio'){
         //pr($v['type']);
         //echo_array($array['form'][$key][$k]);
          $s.=$this->__input($v);
         }
        if (isset($v['type']) && ($v['type'] =='submit'||$v['type'] =='reset')){
         //pr($v['type']);
         //echo_array($array['form'][$key][$k]);
          $s.=$this->__button($v);
        }
         if (isset($v['type']) && $v['type'] =='button'){
         //pr($v['type']);
         //echo_array($array['form'][$key][$k]);
          $s.=$this->__button2($v);
         }
        if (isset($v['type']) && $v['type'] =='textarea'){
         //pr($v['type']);
         //echo_array($array['form'][$key][$k]);
          $s.=$this->__textarea($v);
         }
         if (isset($v['type']) && $v['type'] =='select'){
         //pr($v['type']);
         //echo_array($array['form'][$key][$k]);
          $s.=$this->__select($v);
         }
         if (isset($v['type']) && $v['type'] =='tabs'){
          //tabbed controls
          $s.=$this->__tabs($v);
         }
      }
    }
     
     
    }
    
    
    $this->parsecontrols->html_text[]="The final form <br />";
    $this->parsecontrols->html_text[]=$s;
    //$this->parsecontrols->render();
    $data['title']='View of Yaml File '.$title.' as a PHP array';
    $data['feature']='Yaml and more yaml!'; 
    $data['content']=$array;
    //place into $data all the form details
    //at this point we should use tidy maybe as fragment
    $data['form']=$s;
    //print_r($array);
    //echo '</pre>';
    $this->load->view('yaml_view',$data);
   
}	
}	
	
	
	
function index()
	{
    redirect('generators/yaml/registration');
	 
 	}
 	


  

 
function tables(){
       
       $tables = $this->db->list_tables();

        foreach ($tables as $key=>$value)
        {
         echo($value);
        }
     }
}
?>