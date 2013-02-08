<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
 *  Generic Text input class
 *  Provides automated ways for
 *  Text inputs
 *  Managing javascript
 *
 *
**/

class Sortable extends Tcontrol {



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

//adds the sortable snippet javascript
//needs to be expanded for the full options
function sortable_js($v)
{
    
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

function render_html($v)
{

//initialize string variable

$s='';

//echo_array($v['items']);break;
//$base_string='<div class="ui-state-default sortable %s"><span class="ui-icon ui-icon-arrowthick-2-n-s"></span> %s</div>';
 $base_string='<div class="ui-state-default sortable %s percent30"><img src="http://localhost/egypt/che-guevara/Scott-2007.jpg" height="32px" >Test</span> %s</div>';
 $i=0;
 $limit=count($v['items']);
 for ($i=0;$i<$limit;$i++)

 {
  if ($i==3)
  {
      $active='active';
  } else {$active='';}
  $s.=line(sprintf($base_string,$active,$v['items'][$i]));
 }
 
 $attributes=array('id'=>'sortable');
 $s=$this->wrap_element($s,'div',$attributes);
 //echoPRE(htmlentities($s));break;
 return $s;
}




//main function
function render($v=array('id'=>'accordion',
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

 // short variable names

 $id=$v['id'];
 
 
 //get the snippet first
 $js=$this->sortable_js($v);
 
 //add the html
 $attributes=$v;
 $s=$this->render_html($v);

 //wrap into a div element
 //$s=$js.$this->wrap_element($s,'div',$attributes);

return $js.$s;

}




//some build in sample code for examples
function sample_content(){

$s=<<<EOD
 <div class="demo">

<ul id="sortable">
	<li class="ui-state-default"><span class="ui-icon ui-icon-arrowthick-2-n-s"></span>Item 1</li>
	<li class="ui-state-default"><span class="ui-icon ui-icon-arrowthick-2-n-s"></span>Item 2</li>
	<li class="ui-state-default"><span class="ui-icon ui-icon-arrowthick-2-n-s"></span>Item 3</li>
	<li class="ui-state-default"><span class="ui-icon ui-icon-arrowthick-2-n-s"></span>Item 4</li>
	<li class="ui-state-default"><span class="ui-icon ui-icon-arrowthick-2-n-s"></span>Item 5</li>
	<li class="ui-state-default"><span class="ui-icon ui-icon-arrowthick-2-n-s"></span>Item 6</li>
	<li class="ui-state-default"><span class="ui-icon ui-icon-arrowthick-2-n-s"></span>Item 7</li>
</ul>

</div><!-- End demo -->

EOD;

 return $s;
}
















}