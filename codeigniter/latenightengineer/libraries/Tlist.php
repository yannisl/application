<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
/*
 *  The Tlist class defines a standard
 *  list
 *  it is used by many other components
 *  such as menus etc
 *
        Tlist:
 *         items:                 the list
 *         image_list:            if has images the list of images
 *                                or the persistent store name
 *         position:
 *         attributes:
 *         container:                  div/ul etc
 *
 *         interface wizard
 */

//  define('WEBROOT','../CodeIgniter');
//  define('SERVERROOT','http://localhost/CodeIgniter');
//  define('DATADIR',WEBROOT.'/data/');


class Tlist extends Tcontrol {

    //  All properties modelled similarly to a json
    //  object, helps with interoperability
    //  and with inheritance of properties
    
    public $properties=array(
             'name'=>'Tlist',
             'caption'=>'Fine Photography',
             'taborder'=>'taborder',
             'image_list'=>'name',
             'items'=>array(),
             'image_list'=>array(),
             'container'=>array(
                           'element'=> 'div',
                           'style'=>'style'),
             'wrapper'=>array(
                           'element'=> 'div',
                           'style'=>'"width:280px;float:left;
                            margin-right:15px" class="bordered curvy clearfix shadowed"'
        ),
             'actions'=>array(),
             'css'=>array('style'=>'width:100px'),
             'ajax'=>array('behaviors'=>array('sortable',
                                        'draggable',
                                        'resizable',
                                        'show','hide')),
             // the view object
             // similar to CI
             'view'=>array('name'=>'view_tlist',
                           'data'=>'data',               //place static data here
                           'cache'=>'false'),

             //essentially the source for items
             //in this case we define it to get a list
             //of images from directory
             
             'model'=>array('model'=>'filesystem',        //the model object can be found under models
                             'method'=>'get_all',
                             'vars'=>array()),

             // the controllers object
             'controllers'=>array('create',
                                  'delete',
                                  'save',
                                  'sort'),
             'help'=>'cms/tlist_help.dat',
             'inspector'=>'standard',
             'yalm'=>'true',
             'db'=>'true',
             'limit'=>'5',
             'image_path'=>'../egypt/milen-lesemann/',
             'basedir'=>'http://localhost/egypt/milen-lesemann/',
             //'basedir'=>'http://localhost/egypt/lavazza-2009/'
    );

   

    
    public $names=array();                              // array of names
   // public $image_path='../egypt/axel-bueckert/';        //
   // public $image_path_http='http://localhost/egypt/axel-bueckert/';
    

    function Tlist($control = array())
    {
        // initialize parent class
        parent::TControl();

        //  must get rid of this to make it
        //  independent of CI
        //  then it can be used by othe frameworks as well
        //  or as an independent system
        //  less reliance is better
       
        $CI =& get_instance();
        // $CI=$this->init();
        if (!isset($CI->form)) {
            $CI->load->helper('form');

        }
       // $this->toObject();
       // $this->setImageList();
        log_message('debug', 'Loaded Tlist');
    
    }

    function setImageList(){
        //below works to load an image list
          $CI =& get_instance();
          $CI->load->library('timagelist');
           $z=new timagelist;
           $s=$z->main();
           echo $s;
           break;
    }
    //  changing everything to object
    //  maked life easier in the long run
    //  but more difficult in the short run

    private function toObject(){

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


         

   //creates from data
   // since we have come here after checking we do not checking for open
   //values etc
   function createFromData($name,$properties){

        // users are allowed to send partial
        // information only i.e to send only
        // name and a couple of parameters with the balance to be added
        // afterwards so we just merge the two arrays
        $this->properties['name']=$name;
        $properties=array_merge($this->properties,$properties);

        //save toi Yaml Store

        $this->propertiesToYaml($name,$properties);
       
        return $properties;
    }

    function createFromDefaultData(){
        // we received an empty ()
        // we create everything as default

        //give the component a name
        $name=$this->auto_name();

        //place it in properties
        $this->properties['name']=$name;

        // increment counter
        $this->names[]=$name;

        //get balance of properties
        $properties=$this->properties;

        //save to Yaml Store
        $this->propertiesToYaml($name,$properties);

        return $properties;
    }


   //  Create creates the object the object can then be manipulated as necessary
   //  returns an array with all the properties
   // it is used internally for get()
   // CACHE not necessary to use

    public function create($name=NULL,$properties='',$cache=FALSE){
        //if a name was provides and the yaml file exists
        //we can create the object from the cache

        //model($model_name='filesystem',$method='get_all',$vars='../egypt/axel-bueckert/')
        $v=$properties['items']=$this->model('filesystem','get_all',$this->properties['image_path']);
        $this->properties['image_list']=$v;


        if (($cache==false)&&($this->yamlExists($name))){
            $this->yamlDelete($name);
        }

        if (($this->hasname($name)==true)&&($this->yamlExists($name)==true)){
           $result=$this->yaml_file_to_array(DATADIR.$name.'.yml');
           return $result;
        }

        //if both a name and properties were provided create
        //the object from these properties
        if (($this->hasName($name)==true)&&(is_array($properties)==true)){
            $result=$this->createFromData($name,$properties);
            return $result;
        }

        //if no name and no properties create the object from
        //auto name and default properties
        if (($this->hasName($name)==false)&&(is_array($properties)==false)){
            $result=$this->createDefault();
            return $result;
        }
        
        return $result;                         
    }



 
  private function main($list='',$path='',$options='CACHE'){
     
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

    //prepares to send the data strings to template
    //you can modify and use php in template if you want
    //but parsing is so quick and simple I prefer this method
    /*   $this->load->library('parser');

     $data = array(
            'blog_title' => 'My Blog Title',
            'blog_heading' => 'My Blog Heading'
            );

    $this->parser->parse('blog_template', $data);
    */


    function parse_template($v){
        $CI=$this->load('parser');
        $data['name']='axel';
        $data['caption']=$v['caption'];
        $data['basedir']=$v['basedir'];
        foreach($v['image_list'] as $value){
            $data['images'][]=array('image'=>$value);
        }
         //echo_array($data['images']);
         $s=$CI->parser->parse('admin/tlist',$data,TRUE);
        return $s;
    }



    function render($v){
        if (isset($v['id'])){
            $id=$v['id'];
        }
        else
        {
        $id=$v['name'];

        }
         $s= <<<EOT
<script="text/javascript">
                $(function() {
                $("#$id").sortable({
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
        
        $items=$v['items'];
        $image_list=$v['items'];
        $el=$v['container']['element'];
        $wrapper_style=$v['wrapper']['style'];
        $s.='<div id="'.$id.'"'.'style='.$wrapper_style.'  >';
        $css_in_line=$v['css']['style'];
        $style_string='style="width:250px;margin:0 auto"';
        $base_string="<$el".' class="panel-hover bordered curvy resizable sortable clearfix" %s >
                 %s<span style="font-size;9px;margin:0;padding:0;padding-left:45px;padding-right:7px;display:block">%s</span>'.
              "</$el>";
        $i=0;

        foreach ($items as $key=>$value){

        // $img='<img src="http://localhost/CodeIgniter/images/'.$image_list[$i].'" style="display:block;float:left;margin-top:3px;margin-left:3px;width:30%"/>';
$img='<img  src="http://localhost/egypt/axel-bueckert/'.$image_list[$i].'" style="display:block;margin-top:3px;margin:0 auto;width:98%"/>
<div><span style="width:20px;float:left"><a href="http://localhost/egypt/axel-bueckert/'.$image_list[$i].'"'.' title="View larger image" class="ui-icon ui-icon-zoomin">View larger</a></span>
	<span style="width:20px;float:left"><a href="link/to/trash/script/when/we/have/js/off" title="Delete this image"  class="ui-icon ui-icon-trash">Delete image</a></span>
<span style="width:20px;float:left"><a href="link/to/trash/script/when/we/have/js/off" title="save this image"  class="ui-icon ui-icon-check">save image</a></span>
<span style="width:20px;float:left"><a href="link/to/trash/script/when/we/have/js/off" title="save this image"  class="ui-icon ui-icon-close">save image</a></span>
<span style="width:20px;float:left"><a href="link/to/trash/script/when/we/have/js/off" title="save this image"  class="ui-icon ui-icon-zoomin">zoom in</a></span>


</div>
';

          if (($i>0)&&($i<2)) {$s.= sprintf($base_string,$style_string,$img,$value);
          }
          $i++;
        }
        $s.='<div style="font-size:9px;color:red;text-align:right">'.$this->properties['name'].'</div>';
        $s.='</div>';

       //returns string
       return $s;
        ;}


    // end class Tbutton
}

 