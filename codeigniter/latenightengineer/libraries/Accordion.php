<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
 *  Generic Text input class
 *  Provides automated ways for
 *  Text inputs
 *  Managing javascript
 *
 *
**/

class Accordion extends Tcontrol {



    function _construct()
    {

        // Instantiate the CI libraries so we can work with them
        // $CI =& get_instance();

        // $CI->load_helper('form');
        // Load validation library if necessary.
        // This will also automatically load the CI form helper.
        // if (!isset($CI->form_validation)) {
        //   $CI->load->library('form_validation');
        // }
        //   $this->ci =& get_instance();
        //parent::_construct;
        log_message('debug', 'Accordion class initiated');
        

    }


    function init()
    {

        // Globalize $CI super object so we can use CI libaries like validation
        global $CI;

        // Return an instance of this form object
        return $this;
    }

    // gets values of drop down list from file

    function get_list_from_file($filename='test')
    {
        $list=file_get_contents($filename);
        return $list;
    }

//Wrapping any content within an element
function wrap_element($content,$element,$attributes)
{
  $attributes_string=$this->attributes_to_string($attributes);
  $s=line(sprintf('<%s   style="font-size:smaller" %s> %s ',$element,$attributes_string, $content));
  $s.="</$element>";
  return $s;
}

//adds the accordion snippet javascript
//needs to be expanded for the full snippet
function accordion_js($v)
{
    //if no id is provided, provide a
    //default one based on automatic numbering
    if (!isset($v['id'])|| ($v['id']==NULL)){
        $id='accordion';
    }
    else
    {
        $id=$v['id'];
    }


 if (!array_key_exists('active',$v))
  {
      $active='0';
  }
  else
  {
    $active=$v['active'];
  }

//echo $active;break;
if (!array_key_exists('autoHeight',$v))
  {
      $auto='false';
  }
  else
  {
    $auto=$v['autoHeight'];
  }

$s= <<<EOT
    <script type="text/javascript">
    $(function() {
            $("#$id").accordion({
                    autoHeight:$auto,
                    animated: 'bounceslide',
                    collapsible: true,
                    active: $active,
                    icons: {
                        header: "ui-icon-circle-arrow-e",
                        headerSelected: "ui-icon-circle-arrow-s"

                    }
                });
        });
</script>
EOT;

return $s;
}
//--------------------------------------------

// function add_tabs
// create tab links
// in order for the accordion to function
// the tab element is set to h3
// a link is provided as the selector
// 'element'=>'h3'
// 'tab_title
// content in 'div'

function add_tabs($v)
{

//initialize string variable

$s='';

//echo_array($v['tab_titles']);

$base_string=line('<h3><a href="#">%s</a></h3> %s');
 $i=0;
 $limit=count($v['tab_titles']);
 for ($i=0;$i<$limit;$i++)
 {
  $content=$this->sample_content();
  $s.=sprintf($base_string,$v['tab_titles'][$i],$content[$i]);
 }
   //echo htmlentities($s);break;
 return $s;
}




//main function
function get_accordion($v=array('id'=>'accordion',
                            'autoHeight'=>'false',
                            'active'=>'0',
                            'class'=>'myaccordion',
                            'tab_titles'=>array(
                                    'CodeIgniter',
                                    'Programming',
                                    'Test',
                                    'Sexy',
                                    'More',
                                    'Che Again')))
{
 $id=$v['id'];
 $auto=$v['autoHeight'];
 
 //get the snippet first
 $js=$this->accordion_js($v);
 
 //add the tabs
 $attributes=$v;
 $s=$this->add_tabs($v);

 //wrap into a div element
 $s=$js.$this->wrap_element($s,'div',$attributes);

return $s;

}


function sample_content(){

     $s[0]=
   '<div>
<h4>Che Ignites the Crowds</h4>		
        <img src="http://localhost/egypt/che-guevara/Scott-2004.jpg" style="width:90%;display:block;margin:0 auto" />

<p>Mauris mauris ante, blandit et, ultrices a,
suscipit eget, quam. Integer ut neque. Vivamus nisi metus,
molestie vel, gravida in, condimentum sit amet, nunc.
Nam a nibh. Donec suscipit eros. Nam mi. Proin viverra leo ut odio. Curabitur malesuada. Vestibulum a velit eu ante scelerisque vulputate.</p>
	</div>';
    $s[1]=
    '<div>
        <img src="http://localhost/egypt/rudolf-kartelin/6994503-lg.jpg" style="width:90%;display:block;margin:0 auto" />
		<p>The content can be anything, even a full blog post. Include by transclusion if you want</p>
	</div>';
    $s[2]='
    <div>
        <img src="http://localhost/egypt/rudolf-kartelin/6972699-lg.jpg" style="width:90%;display:block;margin:0 auto" />
		<p>Sed non urna. Donec et ante. Phasellus eu ligula. Vestibulum sit amet purus. Vivamus hendrerit, dolor at aliquet laoreet, mauris turpis porttitor velit, faucibus interdum tellus libero ac justo. Vivamus non quam. In suscipit faucibus urna. </p>
	</div>
    ';

    $s[3]='<div>

 <img src="http://localhost/egypt/rudolf-kartelin/7193729-lg.jpg" style="width:90%;display:block;margin:0 auto"  />

		<p>Nam enim risus, molestie et, porta ac, aliquam ac, risus. Quisque lobortis. Phasellus pellentesque purus in massa. Aenean in pede. Phasellus ac libero ac tellus pellentesque semper. Sed ac felis. Sed commodo, magna quis lacinia ornare, quam ante aliquam nisi, eu iaculis leo purus venenatis dui. </p>
		<ul>
			<li>List item one</li>
			<li>List item two</li>
			<li>List item three</li>
		</ul>
	</div>';

    $s[4]='
 <div>
 <img src="http://localhost/egypt/martin-schoeller/angelina_jolie_2004.jpg" style="width:90%;display:block;margin:0 auto"  />


        <p>Cras dictum. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Aenean lacinia mauris vel est. </p><p>Suspendisse eu nisl. Nullam ut libero. Integer dignissim consequat lectus. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. </p>
    </div>
';
    $s[5]='
<div>

 <img src="http://localhost/egypt/milen-lesemann/6395980-lg.jpg" style="width:90%;display:block;margin:0 auto"  />
<p style="smaller;width:70%;float:right"><a href="http://localhost/CodeIgniter/blog/gallery/milen-lesemann/1" style="color:red;text-decorate:underline;">Milen Lesemann</a></p>
<div style="clear:both;height:1px"></div>
<p> {{wi: Kartelin}} Cras dictum. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas.
</p>
<p>Suspendisse eu nisl. Nullam ut libero. Integer dignissim consequat lectus. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. </p>
    </div>
';
 $s[6]=
   '<div>
<h4>Che Again</h4>
        <img src="http://localhost/egypt/che-guevara/Scott-2002.jpg" style="width:90%;display:block;margin:0 auto" />

<p>Mauris mauris ante, blandit et, ultrices a,
suscipit eget, quam. Integer ut neque. Vivamus nisi metus,
molestie vel, gravida in, condimentum sit amet, nunc.
Nam a nibh. Donec suscipit eros. Nam mi. Proin viverra leo ut odio. Curabitur malesuada. Vestibulum a velit eu ante scelerisque vulputate.</p>
	</div>';

  $s[7]=
   '<div>
<h4>Che Again</h4>
        <img src="http://localhost/egypt/martin-schoeller/zinedine_zidane_2006.jpg" style="width:90%;display:block;margin:0 auto" />

<p>Mauris mauris ante, blandit et, ultrices a,
suscipit eget, quam. Integer ut neque. Vivamus nisi metus,
molestie vel, gravida in, condimentum sit amet, nunc.
Nam a nibh. Donec suscipit eros. Nam mi. Proin viverra leo ut odio. Curabitur malesuada. Vestibulum a velit eu ante scelerisque vulputate.</p>
	</div>';


 return $s;
}
















}