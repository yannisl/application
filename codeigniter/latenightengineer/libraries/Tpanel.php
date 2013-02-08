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


class TPanel extends Tcontrol {
    // Each list can contain an enabled and disabled
    public $properties=array(
             'name'=>'rss_container',                       // All components have names
             'caption'=>'TPanel:%s',
             'taborder'=>'4',
             'template'=>'rss_container',               // Must have a template  or set programmatically
             'content'=>array('source'=>'url',          //the url segments that bring info
                                                        //strictly speaking
                                                        //the model can check this
                                                        //only included here for convenience
                              'model'=>'article'
             ),                                         // If dynamic content
                                                        // the content array defines
                                                        // $data['content]; can be as deep as the datasource
                                                        // and the template
             'image_list'=>'name',
             'items'=>array('Tlist',
                       'TImagelist',
                       'Tbutton',
                       'TComponent'),                             // state 0 normal 1 active 2 visited etc
             'container'=>array(
                           'element'=> 'div',
                           'style'=>'style'),
             'wrapper'=>array(                                   //can actually dispense with this
                           'element'=> 'div',                    //classes and id's can be passed to
                                                                 //template
                                                                 // users will forget about them!
                           'style'=>'"width:38%;float:left;
                            margin-right:15px" class="bordered curvy clearfix shadowed"'
        ),
             'actions'=>array(),
             'events'=>array('sortable'=>true,
                             'draggable'=>true,
                             'resizable'=>true),                     //for javascript
             'css'=>array('style'=>'style'),
             'js'=>array()
          
    );

   

    public $css=array('css_file'=>'file_name',
                      'css_snippet'=>'snippet'
                      );
                      
    public $image_path='/images/icon/assets/';

    public $all_properties=array();

    public $names=array();                              // array of names
    
    

    function Tpanel($control = array())
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
        // $this->toObject();
        // $this->setImageList();
        log_message('debug', 'Loaded Tpanel');
        //initialize some properties
        $this->init();
  
    }

    function init(){
        $CI=&get_instance();
        if (!$CI->uri->segment(4)==NULL){
            $this->properties['content']['source']= $CI->uri->segment(4);
        }
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
 /*   public function get($name=''){
        $result=$this->yaml_file_to_array(DATADIR.'image_list_01.yml');
        //echo_array($result);
    }*/

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
            $this->properties['name']=$name;
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

  private  function hasTemplet(){
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

    function setName($name){
       $this->properties['name']=$name;
    }

    function setTemplate($name){
        $this->properties['template']=$name;
    }

    // GETS VALUES FROM YAML FILE
    function get($v='puff_container'){
        
    //three cases is string only name is sent
     if (is_string($v)){
          $name=$v;
          $this->setName($name);
          $this->setTemplate($name);
          //$z=$this->view($name,'',TRUE);
         //echo 'IS STRING';
      }

      if (is_array($v)){
            if (isset($v['name']))
            {
               $name=$v['name'];
               $this->setName($name);
               //echo 'IS ARRAY';
            }
      }
      
      $data['content']='test';
      //must view with template
      $templet=$this->properties['template'];

      $CI=&get_instance();
      $CI->load->model('Articlesmodel');
      $CI->load->helper('url');
      $title=$CI->uri->segment(5);
      //echo $title;break;
      $location=$CI->uri->segment(4);//$title='Different_than_Friz';
      //echo $location;break;
	  $CI->Articlesmodel->article_name="../".$location."/".$title.'.dat';
	  $s=markdown($CI->Articlesmodel->get_article());
      $s=split('<!--more-->',$s);
      $data['content']=$s[0];
      $data['test']=' Tpanel Component : page_2_text';
      $z=$this->view($templet,$data,TRUE);
      //echo 'HAS TEMPLET';
      //return $z;
      

      //$z=$this->create($name);
      //echo_array($z);
      return $z;
    
    }

  function example_puff($name='puff_container'){
        $data['content']='test';
        $z=$this->view($name,$data,TRUE);
        return $z;
    }




    function example(){

     $s=<<<EOT
<div style="background:url(http://localhost/CodeIgniter/images/icon/assets/homebottom.png) no-repeat;
            width:290px;padding:10px;float:left;height:175px;margin-right:7px" >
<h4>Heading 4</h4>
<p>
<img src="http://localhost/egypt/martin-schoeller/angelina_jolie_2004.jpg" style="width:20%"/>
Lorem ipsum dolor sit amet, consectetur adipiscing elit.
Maecenas varius adipiscing eros, sit amet sollicitudin mi pulvinar vel.
<a href="http://architect.ithemes.com/demo/">credit ithemes.com</a>.

<img src="http://localhost/CodeIgniter/images/icon/assets/next_white.gif" alt="Sir Peter Stothard" />

</p>

</div>


EOT;
    
    return $s;
    }

  function example_sidebar($id="editable",$a="edit",$title='Default Title'){
//sidebar 250x190
     $s=<<<EOT
<script type="text/javascript">
$('a#$a').click(function() {
    $('#$id').toggle()
    return false;
  });
//$("div").css("border","1px solid red");
//$("*", document.body).css("border","1px solid #f60");
</script>
<div style="background:url(http://localhost/CodeIgniter/images/icon/assets/arrow-red-down.jpg) no-repeat 200px 0px;width:98%"><a id='$a' href="#" style="padding-left:30px;display:block;width:98%">Accordion Properties</a></div>

<div id="$id" style="background:url(http://localhost/CodeIgniter/images/icon/assets/sidebar.png) no-repeat;width:255px;float:left;margin-right:10px" >

<h4 style="margin-left:10px;margin-top:10px">$title</h4>
<p style="width:90%;margin-left:10px;margin-right:20px">
<img src="http://localhost/egypt/martin-schoeller/arnold_schwarzenegger_2005.jpg" style="width:25%"/>

This is about the marriage of three technologies
PHP, CodeIgniter, jQuery and MySQL.
Praesent sodales eleifend lectus,
<a href="http://architect.ithemes.com/demo/">credit ithemes.com</a>.
</p>

</div>


EOT;

    return $s;
    }



    function render1($v){
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
        //echoPRE('IN RENDER');
        //echo_array($v);
        $items=$v['items'];
        $image_list=array('database.png','clock.png','tools.png','comment.png','connect.png','info.png');
        $el=$v['container']['element'];
        $wrapper_style=$v['wrapper']['style'];
        $s.='<div id="'.$id.'"'.'style='.$wrapper_style.'  >';
        $css_in_line=$v['css']['style'];
        $style_string='style="'.$css_in_line.'"';
        $base_string="<$el".' class="panel-hover bordered curvy sortable clearfix" %s >
                 %s<span style="padding-left:45px;padding-right:7px;display:block">%s</span>'.
              "</$el>";
        $i=0;
        foreach ($items as $key=>$value){

         $img='<img src="http://localhost/CodeIgniter/images/icon/toolbar/'.$image_list[$i].'" style="display:block;float:left;margin-top:3px;margin-left:3px;"/>';

          $s.= sprintf($base_string,$style_string,$img,$value);
          $i++;
        }
        $s.='</div>';

       //returns string
       return $s;
        ;}


    // end class Tbutton
}

 