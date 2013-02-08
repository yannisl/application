<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
 *  class: Tabs
 *
 *  A generic class used for creating tabbed content
 
 *
**/

class Tabs extends Tcontrol {

 public $properties=array(
             'name'=>'tabs_example',
             'caption'=>'Fine Tabs',
             'taborder'=>'taborder',
             'image_list'=>'name',
             'tabs'=>'tabs',
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
             'js'=>'snippet'
    );



    function _construct()
    {
       
        log_message('debug', 'Tabs class initiated');
        

    }

    function init()
    {

        // Globalize $CI super object so we can use CI libaries like validation
        global $CI;

        // Return an instance of this form object
        return $this;
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


        $v=$properties['items']=$this->model();
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

    

// options sortable
// general
//  - sortable
//  - image list
//  - content
//  - ajax
//  - ajax array
//  - theme
//  - persistent store
//  - name of component
//  - class
function tabs_js($options='')
    {

        $sortable='.find(".ui-tabs-nav")'.".sortable({axis:'x'})";
        $mouseover="{event:'mouseover'}";
        $s= <<<TABBER

     <script type="text/javascript">
        $(function() {
              $("#tabs").tabs({selected:1})
         })
     </script>
TABBER;
        $this->properties['js']=$s;
        return $s;
    }


    //function to create alphabetical list

    function create_tab_list()
    {
        $letter = "A";
        return $letter++;
    }

    function tabs_example($v=array('id'=>'tabs',
                           'ul'=>'ul-class'),
        $type='address'){
        $this->example_tabs($v);
        return $s;
    }

    // gets the <li>
    function get_tab_list($v){
        $tab_titles=array('AXEL ','RENCUENCO ','HOW-TO ','WHERE ','HELP ','jQUERY ');
        $no_tabs=7;
        $s='<ul style="font-size:smaller;">';
        $base_string='<li style="margin-bottom:2px;display:inline" )">
        <a href="#tabs-%s" style="background:url(http://localhost/CodeIgniter/images/icon/16/0%s.png) no-repeat 4px 8px;text-indent:8px;height:16px;font-size:9px">%s</a></li>';
        for ($i=1;$i<$no_tabs;$i++){
            $letter=chr((65+$i));
            $s.=line(sprintf($base_string,$i,$i+15,$tab_titles[$i-1]));
        }
        $s.=line('</ul>');
        return $s;
    }


    function parse_template($v){
        $CI=$this->load('parser');
        $data['name']='axel';
       // $data['caption']=$v['caption'];
      /*  foreach($v['image_list'] as $value){
            $data['images'][]=array('image'=>$value);
        }*/
         //echo_array($data['images']);
         $data['snippet']=$this->tabs_js();
         //echoPRE(htmlentities($data['snippet']));
         $CI=&get_instance();
         $CI->load->library('Tlist');
         $v=$CI->tlist->create('maurizio-moro','',TRUE);
         $gallery=$CI->tlist->parse_template($v);

         $v2=$CI->tlist->create('axel-01','',TRUE);
         $gallery2=$CI->tlist->parse_template($v2);

         $v3=$CI->tlist->create('ilan-hamra','',TRUE);
         $gallery3=$CI->tlist->parse_template($v3);

         $v4=$CI->tlist->create('massimo-santoni','',TRUE);
         $gallery4=$CI->tlist->parse_template($v4);

         $v5=$CI->tlist->create('lavazza-2009','',TRUE);
         $gallery5=$CI->tlist->parse_template($v5);

         $v6=$CI->tlist->create('milen','',FALSE);
         $gallery6=$CI->tlist->parse_template($v6);

         $data['tablist']=$this->get_tab_list($v);
         $data['gallery']=$gallery;
         $data['gallery2']=$gallery2;
         $data['gallery3']=$gallery3;
         $data['gallery4']=$gallery4;
         $data['gallery5']=$gallery5;
         $data['gallery6']=$gallery6;
         $s=$CI->parser->parse('admin/tab_view',$data,TRUE);
        return $s;
    }

    //  will move onto create slowly once I understand the
    //  techniques

    function example_tabs($v=array('id'=>'tabs',
                           'ul'=>'ul-class'),
                           $type='address')
   {

        $s=$this->parse_template($v);
        return $s;
    }

    function example_tabs1($v=array('id'=>'tabs',
                           'ul'=>'ul-class'),
        $type='address')
    {

        //add javascript snippet
        $s=$this->tabs_js();
        $s.='<div id="tabs" "style="font-size:smaller;width:50%">';
        $s.='<div class="curvy bordered">Title</div>';
        $s.=$this->get_tab_list($v);
        $s.='
    <div id="tabs-1">
     <p>Proin elit arcu, rutrum commodo, vehicula tempus, commodo a, risus. Curabitur nec arcu. Donec sollicitudin mi sit amet mauris. Nam elementum quam ullamcorper ante. Etiam aliquet massa et lorem. Mauris dapibus lacus auctor risus. Aenean tempor ullamcorper leo. Vivamus sed magna quis ligula eleifend adipiscing. Duis orci. Aliquam sodales tortor vitae ipsum. Aliquam nulla. Duis aliquam molestie erat. Ut et mauris vel pede varius sollicitudin. Sed ut dolor nec orci tincidunt interdum. Phasellus ipsum. Nunc tristique tempus lectus.</p>
    </div>
    <div id="tabs-2">
     <h3>Tab Usability Guidelines</h3>

This design follows all 13 guidelines for tabs:

<p>It uses tabs to alternate between views within the same context (not to navigate to different areas — a common mistake
introduced by Amazon.com which has since abandoned this design).</p>
De finibus bonorum et malorum
<p>




    </div>
 <div id="tabs-3">
<p>It uses tabs to alternate between views within the same context (not to navigate to different areas — a common mistake
introduced by Amazon.com which has since abandoned this design).</p>

<p>
    </div>
   <div id="tabs-4">
<p>It uses tabs to alternate between views within the same context (not to navigate to different areas — a common mistake
introduced by Amazon.com which has since abandoned this design).</p>

<p>
    </div>
   <div id="tabs-5">
    <p>Qatar Foundation</p>
    <p>Duis cursus. Maecenas ligula eros, blandit nec, pharetra at, semper at, magna. Nullam ac lacus. Nulla facilisi. Praesent viverra justo vitae neque. Praesent blandit adipiscing velit. Suspendisse potenti. Donec mattis, pede vel pharetra blandit, magna ligula faucibus eros, id euismod lacus dolor eget odio. Nam scelerisque. Donec non libero sed nulla mattis commodo. Ut sagittis. Donec nisi lectus, feugiat porttitor, tempor ac, tempor vitae, pede. Aenean vehicula velit eu tellus interdum rutrum. Maecenas commodo. Pellentesque nec elit. Fusce in lacus. Vivamus a libero vitae lectus hendrerit hendrerit.</p>

    </div>
<div id="tabs-6">
    <p>Qatar Foundation</p>
    <p>Duis cursus. Maecenas ligula eros, blandit nec, pharetra at, semper at, magna. Nullam ac lacus. Nulla facilisi. Praesent viverra justo vitae neque. Praesent blandit adipiscing velit. Suspendisse potenti. Donec mattis, pede vel pharetra blandit, magna ligula faucibus eros, id euismod lacus dolor eget odio. Nam scelerisque. Donec non libero sed nulla mattis commodo. Ut sagittis. Donec nisi lectus, feugiat porttitor, tempor ac, tempor vitae, pede. Aenean vehicula velit eu tellus interdum rutrum. Maecenas commodo. Pellentesque nec elit. Fusce in lacus. Vivamus a libero vitae lectus hendrerit hendrerit.</p>

    </div>
</div>

';


        return $s;
}



    //  Uses jQuery dialog routines
    //  to show a dialog to a user
    //  types
    //   default - will display just a dialog
    //   modal
    //   modal form
    //   modal confirmation
    //   modal form
    //   more info at UI Integration
    //   ui_user_guide page
    function dialog($v)
    {
        $s= '

<script type="text/javascript">
    $.ui.dialog.defaults.bgiframe = true;
    $(function() {
        $("#dialog").dialog({
            bgiframe: true,
            height: 130,
            modal: false,
           closeOnEscape:true,
        buttons: {
                Ok: function() {
                    $(this).dialog('."'close'".');
                }
            }
        });
    });
    </script>
';

        $s.='
<div class="demo">
<div id="dialog" title="Download complete">

<p>
    <span class="ui-icon ui-icon-circle-check" style="float:left; margin:0 7px 50px 0;"></span>
        Your files have downloaded successfully into the My Downloads folder.
    </p>
</div>
</div>
';

        return $s;
    }

    //adds the accordion snippet javascript
    //needs to be expanded for the full snippet
    function accordion_js($id)
    {

        $s= <<<EOT
    <script type="text/javascript">
    $(function() {
            $("#$id").accordion({
                    autoHeight:$auto,
                    animated: 'bounceslide',
                    collapsible: true,
                    active:4,
                    icons: {
                        header: "ui-icon-circle-arrow-e",
                        headerSelected: "ui-icon-circle-arrow-s",

                    }
                });
        });
</script>
EOT;

        return $s;
    }

    function accordion($v='')
    {
        $id=$v['id'];
        $auto=$v['autoHeight'];
        $s= <<<EOT
<script type="text/javascript">
    $(function() {
        $("#$id").accordion({
            autoHeight:$auto,
            animated: 'bounceslide',
            collapsible: true,
            active:4,
            icons: {
                header: "ui-icon-circle-arrow-e",
                headerSelected: "ui-icon-circle-arrow-s",

            }
        });
    });
</script>


<div id="$id" style="font-size:smaller">
<h3><a href="#">jQuery</a></h3>
    <div>
        <img src="http://localhost/egypt/che-guevara/Scott-2004.jpg" style="width:90%;display:block;margin:0 auto" />
        <p>Mauris mauris ante, blandit et, ultrices a, suscipit eget, quam. Integer ut neque. Vivamus nisi metus, molestie vel, gravida in, condimentum sit amet, nunc. Nam a nibh. Donec suscipit eros. Nam mi. Proin viverra leo ut odio. Curabitur malesuada. Vestibulum a velit eu ante scelerisque vulputate.</p>
    </div>

    <h3><a href="#">CMS</a></h3>
    <div>
        <img src="http://localhost/egypt/rudolf-kartelin/6994503-lg.jpg" style="width:90%;display:block;margin:0 auto" />
        <p>Mauris mauris ante, blandit et, ultrices a, suscipit eget, quam. Integer ut neque. Vivamus nisi metus, molestie vel, gravida in, condimentum sit amet, nunc. Nam a nibh. Donec suscipit eros. Nam mi. Proin viverra leo ut odio. Curabitur malesuada. Vestibulum a velit eu ante scelerisque vulputate.</p>
    </div>



    <h3><a href="#">CodeIgniter</a></h3>
    <div>
        <img src="http://localhost/egypt/rudolf-kartelin/6972699-lg.jpg" style="width:90%;display:block;margin:0 auto" />
        <p>Sed non urna. Donec et ante. Phasellus eu ligula. Vestibulum sit amet purus. Vivamus hendrerit, dolor at aliquet laoreet, mauris turpis porttitor velit, faucibus interdum tellus libero ac justo. Vivamus non quam. In suscipit faucibus urna. </p>
    </div>

    <h3><a href="#">Programming</a></h3>
    <div>

 <img src="http://localhost/egypt/rudolf-kartelin/7193729-lg.jpg" style="width:90%;display:block;margin:0 auto"  />

        <p>Nam enim risus, molestie et, porta ac, aliquam ac, risus. Quisque lobortis. Phasellus pellentesque purus in massa. Aenean in pede. Phasellus ac libero ac tellus pellentesque semper. Sed ac felis. Sed commodo, magna quis lacinia ornare, quam ante aliquam nisi, eu iaculis leo purus venenatis dui. </p>
        <ul>
            <li>List item one</li>
            <li>List item two</li>
            <li>List item three</li>
        </ul>
    </div>
    <h3><a href="#">Code Talk</a></h3>
    <div>
 <img src="http://localhost/egypt/martin-schoeller/angelina_jolie_2004.jpg" style="width:90%;display:block;margin:0 auto"  />


        <p>Cras dictum. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Aenean lacinia mauris vel est. </p><p>Suspendisse eu nisl. Nullam ut libero. Integer dignissim consequat lectus. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. </p>
    </div>
    <h3><a href="#">About</a></h3>
    <div>

 <img src="http://localhost/egypt/milen-lesemann/6395980-lg.jpg" style="width:90%;display:block;margin:0 auto"  />
<p style="smaller;width:70%;float:right"><a href="http://localhost/CodeIgniter/blog/gallery/milen-lesemann/1" style="color:red;text-decorate:underline;">Milen Lesemann</a></p>
<div style="clear:both;height:1px"></div>
<p> {{wi: Kartelin}} Cras dictum. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas.
</p>
<p>Suspendisse eu nisl. Nullam ut libero. Integer dignissim consequat lectus. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. </p>
    </div>
</div>

EOT;

        return $s;


    }



















}