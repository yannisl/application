<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
 *  Generic Text input class
 *  Provides automated ways for
 *  Text inputs
 *  Managing javascript
 *
 *
**/

class Dropdown extends Tcontrol {

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
        log_message('debug', 'Tdropdown class initiated');
        echo 'a test';

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

    /// creates a toolbar button
    /// if it has a name
    ///

    function toolbar_button($v='',$columns='input-three-column',$style='')
    {
    $s = '
        <div class="curvy bordered clearfix " style="height:130px;" >
                <label for="s1" class="shadow curvy" style="width:50px;background:url(http://localhost/CodeIgniter/images/download.gif) no-repeat">.</label>
                <label for="s1" class="shadow curvy" style="width:50px;background:url(http://localhost/CodeIgniter/images/notice.png) no-repeat"> &nbsp; </label>
                <label for="s1" class="shadow curvy" style="width:80px;background:url(http://localhost/CodeIgniter/images/sandbox.png) no-repeat 10px 3px;"> &nbsp; </label>
                <label for="s1" class="shadow curvy" style="width:90px;height:80px;background:url(http://localhost/CodeIgniter/images/tools.png) no-repeat 10px 3px;" > &nbsp; </label>
        <label for="s1" class="shadow curvy" style="width:90px;height:80px;background:url(http://localhost/CodeIgniter/images/settings.png) no-repeat 10px 3px;" > &nbsp; </label>

</div>
    <div class="shadow curvy" style="width:250px;height:35px;background:url(http://localhost/CodeIgniter/images/edit.png) no-repeat;" ><a href:"#"> &nbsp;</a> </div>
 <div class="shadow curvy" style="width:38px;height:38px;float:left;background:#eeeeec url(http://localhost/CodeIgniter/images/icons/av_beginning.png) no-repeat;" ><a href:"#"> &nbsp;</a> </div>
 <div class="shadow curvy" style="width:38px;height:38px;float:left;background:url(http://localhost/CodeIgniter/images/icons/av_pause.png) no-repeat;" ><a href:"#"> &nbsp;</a> </div>
 <div class="shadow curvy" style="width:38px;height:38px;float:left;background:url(http://localhost/CodeIgniter/images/icons/av_play.png) no-repeat;" ><a href:"#"> &nbsp;</a> </div>
 <div class="shadow curvy" style="width:38px;height:38px;float:left;background:url(http://localhost/CodeIgniter/images/icons/av_end.png) no-repeat;" ><a href:"#"> &nbsp;</a> </div>
 <div class="shadow curvy" style="width:38px;height:38px;float:left;background:url(http://localhost/CodeIgniter/images/icons/database.png) no-repeat;" ><a href:"#"> &nbsp;</a> </div>

    ';
        return $s;
    }



    // gets standard controls such as
    // country list, month list, currency list etc
    // from default directory for controls data

    function get_standard($name)
    {
        return $s='I AM A COUNTRY'.$name;


    }

    //   creates a form text input
    //   uses parent class functions
    //   attributes_to_string
    //   wrapper i.e to wrap element in html <div> or <td>
    //   used for checkbox, radio, text, password

    function text_input($v,$columns='input-three-column',$style='')
    {

        $s='';
        $attribute=$this->attributes_to_string($v);
        $s='<div style="border:1px solid #fff; width:98%" >';
        if (isset($v['before'])) {$s.=$v['before'];}
        $s.=sprintf('<input %s />'."\n",$attribute);
        if (isset($v['after'])) {$s.=$v['after'];}
        $s.="</div>";

        return $s;
    }

    //  standard select box from
    //  array the array can be an array of arrays so that
    //  it can show options
    //  standard classes are used
    //  for CSS and id

    function db_select($array){
        $array='';
        $s='';

        return $s='';
    }


    //  slices an array into one or more
    //  arrays
    function get_columns($list,$columns)
    {
        $length=count($list);
        $chunks=round($length/$columns,0);
        $start=0;
        for ($i=0;$i<$columns;$i++){
            $output[] = array_slice($list,$start,$chunks );
            $start=$chunks+$start;
        }
     /*  echo_array($list);
       echo_array($output);
       break; */
        return $output;
    }

    // Widget that sends a
    // list with checkboxes
    // datatype format
    // $list
    //   array key=>value
    function check_box_list($list,$columns=1)
    {
        $s='';

        if ($columns>1){
            $width=round(90/($columns+0.1),0);
            $array=$this->get_columns($list,$columns);
            foreach ($array as $list){
                $s.='<div style="width:'.$width.'%;float:left;border:1px solid #fff;padding:2px">';
                foreach ($list as $id=>$value){
                    $v['id']=$id;
                    $v['value']=$value;
                    $v['type']='checkbox';
                    $v['name']='month';
                    $v['style']='display:inline';
                    $v['after']='<span style="width:70%;font-size:smaller;display:inline-block">'.$value.'</span>';
                    unset($v['checked']);
                    $s.=$this->text_input($v);
                }
                $s.='</div>';   
              
            }
        }

        else
        {
        $s='<div style="width:40%;float:left;border:1px solid #fff;padding:2px">';
        foreach ($list as $id=>$value){
            $v['id']=$id;
            $v['value']=$value;
            $v['type']='checkbox';
            $v['style']='display:inline';
            $v['after']='<span style="width:70%;font-size:smaller;display:inline-block">'.$value.'</span>';
            unset($v['checked']);
            $s.=$this->text_input($v);
        }
        $s.='</div>';
        }
        return $s;
    }



    //jQuery UI library
    //Datepicker

    function datepicker($v){

        //check first if an id has been received through
        //the array
        if (isset($v['id'])){
            $id=$v['id'];
        }

        $s=<<<EOD

<script type="text/javascript">
    $(function() {
        $("#$id").datepicker(
           {showOn: 'button', buttonImage: '/CodeIgniter/images/calendar.gif', buttonImageOnly: true,
          // numberOfMonths: 3,
           showButtonPanel: true,
           changeMonth: true,
           changeYear: true,
           showAnim: 'fold'
            });
    });
 </script>


EOD;
        $s.=line($this->text_input($v));
        //$s.='<input type="text"  id="datepicker">';
        return $s;
    }


    function textarea($v){

        $attribute=$this->attributes_to_string($v);
        $s="<div>\n";
        if (isset($v['before'])) {$s.=$v['before'];}
        $s.=sprintf('<textarea %s >'."\n",$attribute);
        $s.='<div class="expandable" >Whats on your mind?</div><br />';
        if (isset($v['text'])) {$s.=$v['text'];}
        if (isset($v['img'])) {$s.=''.$v['img'].'';}
        $s.='</textarea>';
        if (isset($v['after'])) {$s.=$v['after'];}
        $s.="</div>\n";

        return $s;
    }

    function button($v){
        //prepares a button
        //properties 'name'=>'name="%s" ',
        $attribute='';
        //echo_array($v);
        foreach ($v as $key=>$value){
            //echo $key .', ';
            if (array_key_exists(trim($key),$this->html_attributes)){
                $attribute .=sprintf($this->html_attributes[$key],$value);
            }
        }
        $s="<div>\n";
        if (isset($v['before'])) {$s.=$v['before'];}
        $s.=sprintf('<input %s />'."\n",$attribute);
        if (isset($v['after'])) {$s.=$v['after'];}
        $s.="</div>\n";
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






















}