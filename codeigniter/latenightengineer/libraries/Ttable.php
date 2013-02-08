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


class Ttable extends Tcontrol {

    //  All properties modelled similarly to a json
    //  object, helps with interoperability
    //  and with inheritance of properties
    public $tmpl = array ( 'row_alt_start'  => '<tr style="background-color:#eee">' ,
                'heading_cell_start'   => '<td style="background-color:#222;color:#fff">',
    );
    public $tmpl_normal = array ( 'row_alt_start'  => '<tr style="background-color:inherit">' ,
                'heading_cell_start'   => '<td style="background-color:#bbb;color:#fff">',
    );
    public $properties=array(
             'name'=>'Ttable',
             'caption'=>'Default Table Name',
             'taborder'=>'taborder',
             'image_list'=>'name',
             'items'=>array(),                            // table data
                                                          // including meta data
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
             
             'model'=>array('model'=>'utilities',        //the model object can be found under models
                            'method'=>'list_db',
                            'vars'=>array('url')),

             'uri'=>'true',
             // the controllers object
             'controllers'=>array('show',
                                  '',
                                  '',
                                  ''),
             'help'=>'cms/ttable_help.dat',
             'inspector'=>'standard',
             'yalm'=>'true',
             'db'=>'true',
             'limit'=>'5',
             'image_path'=>'../egypt/milen-lesemann/',
             'basedir'=>'http://localhost/egypt/milen-lesemann/',
             //'basedir'=>'http://localhost/egypt/lavazza-2009/'
    );

   public $sprites=array('carat-n'=>'ui-carat-1-n'

   );

    
    public $names=array();                              // array of names
   // public $image_path='../egypt/axel-bueckert/';        //
   // public $image_path_http='http://localhost/egypt/axel-bueckert/';
    

    function Ttable($control = array())
    {
        // initialize parent class
        parent::TControl();

        log_message('debug', 'Loaded Ttable');
    
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

        //  model($model_name='filesystem',$method='get_all',$vars='../egypt/axel-bueckert/')
        //  model is defined in Tcontrol

        $v=$properties['items']=$this->model('filesystem','get_all',$this->properties['image_path']);
        $this->properties['image_list']=$v;

        // Delete cache file if cache=false
        if (($cache==false)&&($this->yamlExists($name))){
            $this->yamlDelete($name);
        }

        // Get properties from Yaml file if it exists
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



 
// this prints a table based on CI helper class
// however this need to be moved onto template
// It will be better, just to send rows and
// columns and leave all templating to the template

 private function print_table($data){

        $CI=&get_instance();
        $CI->table->set_heading('edit','drop','database','tables','back-up','repair','optimize');
        $CI->table->set_template($this->tmpl);

        foreach ($data as $key=>$value)
        {
            $link_edit=sprintf('<a href="/CodeIgniter/admin/dbutil/edit-db/%s"><img src="http://localhost/egypt/CMS/b_edit.png" title="%s" /></a>',$value,$value);
            $link_drop=sprintf('<a href="/CodeIgniter/admin/dbutil/drop-db/%s"><img src="http://localhost/egypt/CMS/b_drop.png" title="%s" /><a>',$value,$value);
            $link_optimize=sprintf('<a href="/CodeIgniter/admin/dbutil/optimize-db/'.$value.' title="optimize">tables</a>',$value);
            $CI->table->add_row($link_edit,$link_drop,
            $value,'<a href="/CodeIgniter/admin/dbutil/list-tables/'.$value.'">tables</a>','back-up','repair',$link_optimize);
        }
        return $CI->table->generate();
       // return $s;
    }

  private function panel_view($data){
    $s='';
    foreach ($data as $key=>$value)
        {
          $s.='<div style="width:177px;height:110px;float:left;background:#fff;margin-right:1px" class="bordered curvy sortable">
               <p class="curvy" style="font-size:11px" ><strong>Database</strong>: '.$value.'
              </p>
              
<div style="margin-top:50px">
<img src="http://localhost/CodeIgniter/images/trash.png" title="delete database" style="width:24px;margin-right:5px" />
<img src="http://localhost/CodeIgniter/images/pencil.png" title="optimize database" style="margin-right:5px" />
<img src="http://localhost/CodeIgniter/images/repair.png" title="repair database" style="width:24px;margin-right:5px" />
<img src="http://localhost/CodeIgniter/images/back-up.png" title="back-up your database" style="width:24px;margin-right:5px" />


<img src="http://localhost/CodeIgniter/images/help.png" title="%s" style="width:24px;margin-right:5px" />

<a href="/CodeIgniter/admin/dbutil/list-tables/'.$value.'">

<img src="http://localhost/egypt/CMS/b_browse.png" title="browse tables" style="width:24px"/>
  </a>'.'
</span>
</div>
              </div>';
        }
    return $s;
  }

private function record_view($data){
    $s='';$s1='';
    //echo_array($data);break;
    $i=0;
    foreach ($data[0] as $key=>$value)
     // echo_array($value);break;
       for($i=0;$i<2;$i++ ){
           $s1.='test';
        }
        {
          $s.='<div style="width:180px;height:110px;float:left;background:#fff" class="bordered curvy sortable">
               <p class="curvy" style="font-size:11px" >Database: '.($s1).'
              </p>
               <img src="http://localhost/CodeIgniter/images/db.png" style="display:block;float:right;width:40px"/>
               <div style="clear:both"> 

<img src="http://localhost/egypt/CMS/b_drop.png" title="%s" />
<img src="http://localhost/egypt/CMS/b_edit.png" title="%s" />
<a href="/CodeIgniter/admin/dbutil/list-tables/'.$value.'">
<img src="http://localhost/egypt/CMS/b_browse.png" title="browse tables" />
  </a>'.'
</span>
</div>
              </div>';
        }
    return $s;
  }



    function parse_template($d='',$choice='1'){
        $CI=$this->load('parser');
        //$CI=$this->load('uri');
        $class=$CI->uri->segment(3);
        $method=$CI->uri->segment(4);
        //load model
        $database_list=$this->load('generic/'.$class,'model');
        $database_list=$CI->{$class}->{$method}();

        if ($choice=='1') {$z=$this->panel_view($database_list);
           
        }
        else
        $z=$this->print_table($database_list);
        $data['table']=$z;
      

        $data['name']='axel';
        $data['caption']='caption';
        
        /*foreach($v['image_list'] as $value){
            $data['images'][]=array('image'=>$value);
        }
         //echo_array($data['images']);*/

        // send to parser
         $s=$CI->parser->parse('admin/ttable_view',$data,TRUE);
         
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

 