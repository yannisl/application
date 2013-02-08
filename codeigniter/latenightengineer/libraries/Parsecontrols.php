<?php
 
class Parsecontrols extends Object{

//these are the types of controls defined internally. Plugins have a method to add overide or delete controls from
//the forms and pages.

public $controls=array('');


public $properties=array('accesskey'=>'accesskey="%s" ',
                           'name'=>'name="%s" ',
                           'names'=>'name="%s" ',
                           'id'=>'id="%s" ', 
                           'class'=>'class="%s" ', 
                           'value'=>'value="%s" ',
                           'checked'=>'"%s" ',
                           'disabled',
                           'readonly',
                           'maxlength',
                           'src',
                           'alt',
                           'usemap',
                           'ismap',
                           'accesskey',
                           'onselect',
                           'accept', 
                           'text',
                           'checkbox','radio','submit','reset','file','hidden','image','button','value','label',
                           'size'=>'size="%s" ',
                           'style'=>'style="%s" ',
                           'title'=>'title="%s" ',
                           'onclick'=>'onclick="%s;" ',
                           'onfocus'=>'onfocus="%s;" ',
                           'onblur'=>'onblur="%s;" ',
                           'onkeypress'=>'onkeypress="%s;" ',
                           'onkeyup'=>'onkeyup="%s;" ',
                           'onchange'=>'onchange="%s;" ',
                           'ondblclick'=>'ondblclick="%s;" ',
                           'ondblclick'=>'ondblclick="%s;" ',
                           'src'=>'src="%s" ',
                           'tabindex'=>'tabindex="%s" ',
                           'button'=>'<button %s>%s </button>',
                           'rows'=>'rows="%s" ',
                           'cols'=>'cols="%s" ',
                           'textarea'=>'<%s  %s>%s </%s>',
                           'select'=>'<%s  %s>%s </%s>',
                           'type'=>'type="%s" ',
                       );


  public $forms;
  public $number_forms;
  public $action;
  public $elements;
  public $encoding;
  public $enctype;
  public $length;
  public $method;
  public $name;
  public $id;
  public $target;
  public $text;   //the text defining the form
  public $show_form = true;
  public $error_msg = NULL;
  public $html_text;
  public $custom;
  public $array; //values of form as an array - using Yaml!

     //textblock values


/*
type        %InputType;    TEXT      -- what kind of widget is needed --
  name        CDATA          #IMPLIED  -- submit as part of form --
  value    CDATA          #IMPLIED  -- Specify for radio buttons and checkboxes --
  checked     (checked)      #IMPLIED  -- for radio buttons and check boxes --
  disabled    (disabled)     #IMPLIED  -- unavailable in this context --
  readonly    (readonly)     #IMPLIED  -- for text and passwd --
  size        CDATA          #IMPLIED  -- specific to each type of field --
  maxlength   NUMBER         #IMPLIED  -- max chars for text fields --
  src         %URI;          #IMPLIED  -- for fields with images --
  alt         CDATA          #IMPLIED  -- short description --
  usemap      %URI;          #IMPLIED  -- use client-side image map --
  ismap       (ismap)        #IMPLIED  -- use server-side image map --
  tabindex    NUMBER         #IMPLIED  -- position in tabbing order --
  accesskey   %Character;    #IMPLIED  -- accessibility key character --
  onfocus     %Script;       #IMPLIED  -- the element got the focus --
  onblur      %Script;       #IMPLIED  -- the element lost the focus --
  onselect    %Script;       #IMPLIED  -- some text was selected --
  onchange    %Script;       #IMPLIED  -- the element value was changed --
  accept      %ContentTypes; #IMPLIED  -- list of MIME types for file upload --
  text|password|checkbox|radio|submit|reset|file|hidden|image|button
  >
*/
function __construct(){
  //$this->custom=new Custom($this);
  //$this->html=new HtmlHelper($this);
  
}

public function textInCurlyBrackets($str,$text){
//finds the text in between curly brackets
//allows for almost any character to allow
//for caption strings etc.

 $pattern='/\s*'.$str.'\s*\{([[:alnum:]\s\*\:\$\"\(\)\[\]\|\#\%\&\;\n\r\.\-_\,\d\=\'\!\?\>\<\/]+\s*\n*\r*)\}/isx';
  preg_match_all($pattern,$text,$val); //full text of form
  $curly=$val[1][0];
  //$this->html_text[]=$curly;
  return $curly;
 
}

public function getForms($text){
//returns an array with all the forms
//in the text string
$pattern='/form[\.]([[:alnum:]\-]+)\s*\{/';
  preg_match_all($pattern,$text,$values);
  $number_forms=count($values[1]);
   for ($i=0;$i<$number_forms;$i++){
   $forms['name'][$i]=$values[1][$i]; //form name
  }
  $this->number_forms=$number_forms;
return $forms['name'];
}


public function parseForm($text){
 
//parse the text and get the forms
  $forms['name']=self::getForms($text);
  //place in object
  $this->$forms=$forms;
  $number_forms=count($forms['name']);

for ($i=0;$i<$number_forms;$i++){
  $s=$forms['name'][$i];
  $pattern='/form.'.$s.'\{([[:alpha:]\s\:\;\n\r\.\-_\,\d]+\s*\n*\r*)\}/isx';
  preg_match_all($pattern,$text,$val); //full text of form
  $forms['text'][$i]=$val[1][0];
  //echo_array($forms[1]);
  $forms['method'][$i]=self::getAttribute('method',$forms['text'][$i]);
  $forms['action'][$i]=self::getAttribute('action',$forms['text'][$i]);
  $forms['enctype'][$i]=self::getAttribute('enctype',$forms['text'][$i]);
  //get a list of all the control
  $forms['controls'][$i]=self::getValues('controls',$forms['text'][$i]);
  $m=$this->method=$forms['method'];
}

 $i=0;
 for ($i=0;$i<$number_forms;$i++){
  for ($j=0;$j<count($forms['controls'][$i]);$j++){
    //echo 'checking for control text ....'.$forms['controls'][$i][$j].'<br />';
    $t[$j]=self::textInCurlyBrackets($forms['controls'][$i][$j],$text);//$forms['controls'][$i][0]
    //echo 'returned ... '.$t[$j].'<br />';
    }
  $forms['controlstext'][$i]=$t;
  }
//now we have all the controls and the control
//text in the array
//this now needs to be parsed
//html then echo   
   //echo 'FORMS ARRAY <br />';
   //echo_array($forms);
 for ($i=0;$i<$number_forms;$i++){  
   self::parseControls($forms['controlstext'][$i]); 
   //echo_array($forms['controlstext'][$i]);
   } 
 //echo_array($this->elements);
}

private function checkControlType($text){
 //checks to find out the type of control
 $s=self::getAttribute('type',$text);
 $this->elements[]=$s;
 return $s;

}



public function parseControls($t){
//this function parses all the controls from
//an input array $t - holds all the text for the controls
//of a form
//echo 'IN PARSE CONTROLS <br />';
//echo_array($t);

 for ($i=0;$i<count($t);$i++){
   $type=self::checkControlType($t[$i]);
   if ($type=='checkbox') {self::parseCheckBox($t[$i]);
   }
   //if ($type=='select')     {$select=self::parseSelect($t[$i]);
     //    self::selectToHTML($select);
   //}
   //if ($type=='text')       {$select=self::parseTextInput($t[$i]);}
   if ($type=='select')     {$s=self::parseTextArea($t[$i],'select','select');$this->out($s);}
   
   if ($type=='password')   {$s=self::parseTextArea($t[$i],'input','password');$this->out($s);}
   if ($type=='text'||$type=='multi') {$s=self::parseTextArea($t[$i],'input','text');$this->out($s);}
   if ($type=='file')       {$s=self::parseTextArea($t[$i],'input','file');$this->out($s);}
   if ($type=='textarea')   {$s=self::parseTextArea($t[$i],'textarea','textarea');$this->out($s);}
   if ($type=='radio')      {$select=self::parseRadio($t[$i]);}
   if (($type=='submit')||($type=='button') || ($type=='reset') ) {$s=self::parseControl($t[$i],'input',$type);$this->out($s);}
   if ($type=='img') {$s=self::parseControl($t[$i],'input','image');$this->out($s);}
   //if ($type=='submit')     {$select=self::parseSubmit($t[$i]);}
   if ($type=='html')       {$select=self::parseHTML($t[$i]);}
   if ($type=='markdown')   {$select=self::parseMarkdown($t[$i]);}
   if ($type=='multi-image'){$select=self::parseMultipleImage($t[$i]);}
   if ($type=='table')      {$select=self::parseTable($t[$i]);}
   
   if ($type=='tabs')      {$select=self::parseTabs($t[$i]);}
   if ($type=='accordion') {$select=self::parseAccordion($t[$i]);}
   //testing plugin architecture
   if ($type=='month')      {$select=self::parseCustom('month',$t[$i]);
   //$test='code';
   //else {
   //     $z=code($t[$i]);
   //      echo 'function exists '.$type;
    }
 }
}

public function parseMultipleImage($text){;
//parses a multuple image container
$images=self::getValues('images',$text);
$columns=self::getAttribute('columns',$text);
$width=self::getWidth($columns);
$num=count($images);
echo $width;
echo <<<EOT
<div style="clear:both"></div>
<div class="imageContainer" style="width:80%;margin:0 auto;border:1px solid #bebebe;padding:0;text-align:center">
<h4>Image Container</h4>
EOT;
for ($i=0;$i<$num;$i++){
echo <<<EOT
  <img src="$images[$i]" style="width:$width%;margin:0;padding:0;background:#000000;" />
EOT;
;}
echo <<<EOT
   <div style="clear:both"></div>
   <p>This is some paragraph text</p>
</div>
<div style="clear:both"></div>
EOT;
//echo_array($images);
}


public function parseHtml($text){
//justs echos text - removes the type;
//
$s=preg_replace('/(type:html;|type:markdown;)/isx','',$text);
$s=preg_replace('/\;\}*$/isx','',$s);
$value=self::getAttribute('value',$text);

if ($value=='file'){
     $text1=file_get_contents($value);
     $s=preg_replace('//sx',$text1,$text);}     
if ($debug){echo $s;}
//$z='<textarea style="width:78%">'.$s.'</textarea>';
$this->html_text[]=$s;
 return $s;
}

public function parseMarkdown($text){
//justs echos text - removes the type;
//
$s=preg_replace('/(type:markdown;)/isx','',$text);
$s=preg_replace('/\;\}*$/isx','',$s);
$value=self::getAttribute('value',$text);
if ($value=='file'){
     $text1=file_get_contents($value);
     $s=preg_replace('//sx',$text1,$text);}     
if ($debug){echo $s;}
$this->html_text[]=markdown($s);
 
}

public function submitToHTML($name,$value,$class,$style){

  echo '<input name="'.$name.'" type="submit" value="'.$value.'" style="display:block;border:1px solid 
  
  #ff0000;clear:both"> ';
;}

public function parseSubmit($text){
//echo 'IN SUBMIT';
//echo $text;
$value=self::getAttribute('value',$text);
$name=self::getAttribute('name',$text);
self::submitToHTML($name,$value,$class,$style);
$this->html_text[]=$this->html->submit($caption = 'Submit', $htmlAttributes = array(), $return = false);
}


public function parseTextInput($text){
 //parse a text input string
 //
 // change to parse all attributes - attribute and action to return 
 // back 
 // name->insertintohtml
 // 
  $names=self::getValues('names',$text);
  $values=self::getValues('values',$text);
  $number=count($names);
  $labels=self::getValues('labels',$text);
  $status=self::getAttribute('status',$text);
  $labelsTop=self::getAttribute('label-top',$text);
  $image=self::getValues('image',$text);
  
  $rules=self::getRules($text);
  $s1='<label>'.$labelsTop.'</label>';
  $s1.='<div style="width:100%;background:#FAFAFA">';
  $this->html_text[]=$s1;
  //echo $s1;
  for ($i=0;$i<$number;$i++){
    $this->elements[]='text';
    $default=self::getDefaults($names[$i],$values[$i]);
    $s="";
    $s.='<div style="padding:2px;margin:1px;">'."\n";
    $s.='<label style="float:left;width:50%;font-size:12px;font-weight:bold;font-family:georgia,arial;margin:3px">'.$labels[$i]. " </label>\n";
    $s.='<INPUT name="'.$names[$i].'" id="'.$names[$i].'" ';
    $s.=' type="text" ';
    $s.=' value="'.$default.'"'.$status.' ';
    $s.= '  style="float:left;width:30%;margin:3px;"'." > \n";
  //echo $s;
  $this->html_text[]=$s;
  if (isset($image[$i])){
    $s4='<a href=""><img src="'.$image[$i].'" /></a>';
    $this->html_text[]=$s4;
  }
  $s2='<div style="clear:both"></div>';
  $s2.='</div>';
  $this->html_text[]=$s2;
    //echo $s2;
  } 
  $s3='</div>';
  $this->html_text[]=$s3;
  //echo $s3; 
    
return $input; 

}

function parseCustom($text){
//Plugin architecture for calling any user parse function
//this will call the user function
  $names=self::getValues('name',$text);
  $value=self::getValues('value',$text);
  $selected_value=self::getValues('default',$text);
  //this calls the user array
  $z=$this->html->monthOptionTag('select', $value = null, $selected = 3, $selectAttr = null, $optionAttr = null, $showEmpty = false); 
  //echo $z;
}


public function getDefaults($name,$default){
//gets default values for post
//needs to be completed for all controls
//
$s=$name;
if (isset($_POST[$s]))
    {$w=$_POST[$s];}else {$w=$default ;}
    $default=$w;
return $default;
}

public function DBgetDefaults($name,$default){
;}





public function getWidth($columns){
//calculates widths for multicolumn layouts
//width is set to 98 not to break the layout
if ($columns>1){$width=98/$columns;}else{$width=98;}
return $width;
}


public function parseCheckbox($text){
  //parse a checkbox string
  //to make life easy
  //checked:$name[1],$name[2] etc...
  $checkbox=self::getAttribute('name',$text);
  $class=self::getAttribute('class',$text);
  //$checkbox='illness';
  $values=self::getValues('values',$text);
  $number=count($values);
  $labels_checkbox=self::getValues('labels',$text);
  $labelsTop=self::getAttribute('label-top',$text);
  $checked=self::getValues('checked',$text);
  $columns=self::getAttribute('columns',$text);
  $width=self::getWidth($columns);
  echo '<p>'.$labelsTop.'</p>';
  $this->html_text[]=self::closedEntity('p',$labelsTop,'');
  $s1='<ul class="checkboxlist" style="width:'.$width.'%;border:1px solid #bebebe;float:left;display:block">'; 
  $this->html_text[]='<ul>';//$s1;
  echo $s1;
  for ($i=0;$i<$number;$i++){
  if ($checked[$i]==$values[$i]){$check[$i]='checked ';} else {$check[$i]=' ';}
    if (isset($_POST[$checkbox])){
    $check[$i]='';
    for ($j=0;$j<count($_POST[$checkbox]);$j++){
       if ($_POST[$checkbox][$j]==$values[$i]){$check[$i]='checked';}
       ;}
    ;}
    $var=$values[$i];
    $s=' ';
    $s.='<li><INPUT name="'.$checkbox.'[]'.'" ';
    $s.=' type="checkbox" ';
    $s.=' value="'.$values[$i].'" '.$check[$i].' ';
    $s.=' class="'.$class.'" ';
    $s.= ' style="display:block;width:5%;border:1px solid red;float:left;margin:1px" ><span style="display:block;border:1px solid #bebebe;float:left;width:90%;margin:1px" />'.$labels_checkbox[$i].'</span></li> ';
    $s.='<div style="clear:both"></div>';
  echo $s;
   $this->html_text[]=$s; 
   } 
    echo '</ul>';
   $this->html_text[]='</ul>';
return $checkbox;
}

private function clearer(){
//returns clearing div
//you can other addToHTML array
//or echo clearer();
  $s='<div class="clearer"></div>';
  
 return $s;
}


public function entity($entity,$s,$attribute){
if ($s==0){
  $s1="<".$entity.">\n";
 } 
 else{
  $s1="</".$entity.">\n";
  }
 
 return $s1; 
}  

public function closedEntity($entity,$text,$attribute){
//Adds an enclosed entity to the HTML lines
//When file is completed a link is produced, filed zipped and downloaded
   $s="<$entity"." $attribute >\n";
   $s.=$text."\n";
   $s.="</$entity>\n";
 return $s;
;}


public function parseRadio($text){
  //parse a checkbox string
  $radio_name=self::getAttribute('name',$text);
  $values_checkbox=self::getValues('values',$text);
  $labels_checkbox=self::getValues('labels',$text);
  $labelsTop=self::getAttribute('label-top',$text);
  $checked=self::getAttribute('checked',$text);
  $class=self::getAttribute('class',$text);
  $onClick=self::getValues('onClick',$text);
  //echo_array($onClick);
  //$s1="\n".'<ul style="width:20%;border:1px solid #bebebe;float:left">'."\n"; 
  $s1.='<div class="fancy-radio bGrey fleft percent33 p5" >';
  $s1.="$labelsTop\n";
  $this->html_text[]=$s1;
  if ($debug){ echo $s1;}
  
  $number=count($values_checkbox);
  for ($i=0;$i<$number;$i++){
    $chkstr=''; 
    if (($_POST[$radio_name]==$values_checkbox[$i])) {$chkstr='checked';}else{
     if (($checked==$values_checkbox[$i])&&(!isset($_POST[$radio_name]))){$chkstr='checked';} else{$chkstr='';}
    }
    $s2="";
    $s2.='<div style="display:block;width:17px;border:1px solid red;float:left">';
    $s2.='<INPUT style="display:block;float:left;" name="'.$radio_name.'" ';
    $s2.=' type="radio" ';
    $s2.=' value="'.$values_checkbox[$i].'"'.$chkstr.' ';
    $z='onclick="'.$onClick[$i].'();'.'"';
    $s2.= ' id="test2" '.$z.' /></div><p class="'.$class.'" >'.$labels_checkbox[$i]."</p>\n";
    $s2.='<div style="clearer"></div>';
    //$s2.=$s1.$s;
    if ($debug) {echo $s2;}
    $this->html_text[]=$s2;
    }
    $s3='</div>';
    //$s3="</ul>\n";
    if ($debug) {echo $s3;}
    $this->html_text[]=$s3;
return $checkbox;
}

private function wikiLink($query){
//creates link for wiki
 $query=strtolower(trim($query));
 $query=ucwords($query);
 $query=str_replace(' ','_',$query);
 $s='http://en.wikipedia.org/wiki/'.$query;
 return $s;
}

private function getCSVData($file,$z){
//opens a file
//reads line by line
//places all values in a two dimensional array
//returns a serialized comma list to
//keep format for forms
$handle = fopen($file,"r");
 //set flag for groups 
 $flag=0;$i=0;$row=0;
 while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
    $selected='';
    $num = count($data);
    $row++;
      for ($j=0;$j<$num;$j++){
       $d[$row][$j]=$data[$j];$s1.=$data[$j].', ';} 
    $i=$i+1;}   
fclose($handle);
//echo_array($d);

if ($z==0) {return($s1);}else {return $d;}
}


public function parseTable($text){
# parses tabular data
# for structure see .frm example-table.frm
# developed by Y Lazarides
# date: June 2008

 $head=self::getValues('thead',$text);
 $values=self::getValues('values',$text);
 $types=self::getValues('types',$text);
 $cells=self::getValues('cells',$text);
 $caption=self::getAttribute('caption',$text);
 $tfoot=self::getValues('tfoot',$text);
 $number_rows=self::getAttribute('rows',$text);
 
 $file=self::getAttribute('file',$text);
 if (!isset($number_rows)){$number_rows=count($values);}
 //$data=self::getValues('data',$text);
 $number_cells=count($values);

  #get CSV data if it exists
  if (isset($file)){
    $data=$this->getCSVData($file,0);
    //echo($data);
    $data=split(',',$data);}
  else {
   $data=self::getValues('data',$text);
  }


#table
$s1='<div class="adorn" style="background:#ffffff";>';
$s1.='<table>';
$s1.="<caption>$caption</caption>";
$s1.="<thead>";
# Head
$s1.="<tr>";
  for ($i=0;$i<$number_cells;$i++){
  $s1.="<th>$head[$i]</th>";}
$s1.="</tr>";
$s1.="</thead>";
#tfoot
$s1.='<tfoot style="color:#333333">';
$s1.='<tr>';
for ($i=0;$i<count($tfoot);$i++){
 $s1.="<th>$tfoot[$i]</th>";}    
$s1.='</tr>';
$s1.='</tfoot>';
$s1.='<tbody>';
#the rows
$count=0;$count2=0; //counter for data
for ($j=0;$j<$number_rows;$j++){
$s1.="<tr>";
  for ($i=0;$i<$number_cells;$i++){
   #action based on type
   if ($types[$i]=='text'){
     $s1.='<td><input type="text" value="'.trim($data[$count2]).'" /></td>';
     $count2=$count2+1;
     $count=$count+1;
     ;}
     elseif($types[$i]=="label"){$s1.='<td class="label">'.trim($data[$count2]).'</td>';$count=$count+1;
     $count2=$count2+1;
     }
     elseif($types[$i]=="auto"){$s1.='<td class="auto">'.$j.'</td>';$count=$count+1;}
     elseif($types[$i]=="img"){
       $wiki_link=$this->wikiLink($data[$count2-3]); 
       $s1.='<td class="img"><a href ="'.$wiki_link.'"><img src="information.png"></a></td>';$count=$count+1;
     }
      else{
  $s1.="<td>$types[$i]</td>";$count=$count+1;}
  ;
  }
$s1.="</tr>";
}



#table end
$s1.="</tbody>";
$s1.="</table>";
$s1.='<div class="clearer"></div>';
$s1.="</div>";
#put into array
$this->html_text[]=$s1;  


;}


private function getValues($str,$text){

 $pattern='/'.$str.':(.+)[\;]/';
 $pattern='/'.$str.':([[:alnum:]\%\#\/\,\!\?\)\(\.\s\[\]\n\r\d\-\_\*\>\<\:]+)[\;]/isx';
 preg_match_all($pattern,$text,$values);
 $labelsString=$values[1][0];
 $labels_checkbox=split(',',$labelsString);
 return $labels_checkbox;
}


private function getAttribute($attribute,$text){
//gets an attribute from a pair such as name:test;
 $pattern='/'.$attribute.':([\d\.\s\_\-\?\!\,[:alpha:]]+)\s*[\;}]/isx';
 preg_match_all($pattern,$text,$values);
 return $values[1][0];
}



private function getRules($text){
//if rules exist gets the rules for validation
//rules are of the form rules[] all in an array
//they can exist both at the fieldset level 
//or the component level
//or the form level
//echo $text;
$pattern='/rules\[*\d*\]*:([\d\.\s\_\-\?\!\|\,\'[:alpha:]]+)\s*[\;}]/';
 preg_match_all($pattern,$text,$values);
 //echo_array($values);

}

public function readSelectOptions($select,$file){
 $row=1;
$handle = fopen($file, "r");
 //set flag for option group
 
 $flag=0;
 while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
    $selected='';
    $num = count($data);
    $row++;
       if ($num>2){$selected='selected';$data[0]=$data[1];$data[1]=$data[2];}else{$selected='';}
       if (strtolower($data[0])==='optgroup') {
         if( $flag=1 ){echo '</optgroup>';}
         $s1.='<optgroup label="'.$data[1].'">';$flag=1;
         }
       else{
         $s1.='<option '. $selected .' value="'.$data[0].'" >'.$data[1].'</option>';}
 }
fclose($handle);

return $s1;
} 

public function selectToHTML($select){
//creates the HTML for a selct key
 //$s1='<div style="border:1px solid #ff0000;float:left">';
 $s1.='<p>'.$select['caption'].'</p>';
 $s1.='<select '.$select['multiple'].' name="'.$select['name'].'[] "size="'.$select['size'].'" style="width:300px;" >"';
 //echo $s1; //echoes the select
 $s1.=self::readSelectOptions($select,$select['file']);
 $s1.='</select>';
 //$this->html_text[]=$s1; //adds to text varaiable
 return $s1;
}

public function parseAll($text){
 preg_match_all('/([[:alnum:]]+)\:\s*([[:alnum:]\<\>\/\d\#\s\:\(\)\,\.\'\"\&\=\"\-\_]+)\s*\r*\n*[\;]/',$text,$prop);
   for($i=0;$i<count($prop[1]);$i++){
    $values[$prop[1][$i]]=$prop[2][$i];
   }

return $values;
}

public function parseArray($array){
 //parses the attributes of an array
 //check what type it is
 //if input add to html text etc..
 
}


public function attributesText($values){
 foreach ($values as $key=>$value){
    if (isset($this->properties[$key])){
        $s1.= sprintf($this->properties[$key],$value,$src);
    }
   }
 return $s1;
}

private function out($s){
$this->html_text[]=$s;

}

public function parseControl($text,$entity='input',$type='text',$content='') {
//parses the text for a control
//$text : the text to be parse
//$entity : the entity type radio, etc
//$type   : the type of control 
   $attributes=self::parseAll($text);
   //echo_array($attributes);
   $s1=self::attributesText($attributes);
   $s=sprintf('<%s type="%s"  %s  />',$entity,$type,$s1);
   return ($s);
}

public function renderControl($s1,$entity='',$type='',$content='test',$return=true){
//renders a control
//works ok for text areas so far

 $pattern=$this->properties[$entity];
 //echo 'pattern'.$pattern;
 if ($entity=='textarea'){$s=sprintf($pattern,$entity,$s1,$content,$entity);}
 elseif ($entity=='select'){$s='';}
 else
    {$s=sprintf('<%s type="%s"  %s  />',$entity,$type,$s1);}
    //echo htmlentities($s);
  if (!$return) echo $s;
return $s;
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
$s.='<script type="text/javascript" src="tabber.js"></script>';
//echo $s;
// $this->html_text[]=$s;
 return $s;
}



public function parseTabs($text){
/*
 Parses a tab instruction

*/

$attributes=self::parseAll($text);
//echo_array($attributes);
foreach ($attributes as $key=>$val){
     $keys[$key]=split(',',$val);
  }
 
 //echo_array($keys);
  $number=count($keys['name']);
  foreach($keys as $key=>$value){
   for ($i=0;$i<$number;$i++){
     $controls[$i][$key]=$value[$i];
     //handles repetitive attributes gets value from [0]
     if ($controls[$i][$key]==''){$controls[$i][$key]=$controls[0][$key];}
  }   
  } 
  //echo 'CONTROLS';
  //echo_array($controls);

  $i=0;
  $s='<div class="tabber" id="mytabber1" >';
  for ($i=0;$i<count($controls);$i++){         //needs correction
   $s.='<div class="tabbertab" style="padding:5px">';
	 $s.='<h2>'.$controls[$i]['name'].'</h2>';
	 $s.='<div style="width:98%;">'.$controls[$i]['content'].'</div>';
   $s.='</div>';
    
  }
  $s.='</div>';
  $this->html_text[]=$s;
  $file_prefix=$attributes['fileprefix'];
  $img=$attributes['loadgraphic'];
  //loads javascript
  $this->html_text[]=self::tabsJS($img,$file_prefix);
  

}



	
public function parseTextArea($text,$entity='input',$type='text',$content=''){
//parses the most common controls
//input, passsword,textarea,select etc
//needs to be renamed afterwards
//
  $content='';
  $attributes=self::parseAll($text);
  
  //echo_array($attributes);
 
  
  foreach ($attributes as $key=>$val){
     $keys[$key]=split(',',$val);
  }
 
  //echo_array($keys);
  $number=count($keys['name']);
  
  //put in the form control[property,property,property]
  //ie normalize as if single control
  //must cater for errors if "" use first 
  //this is easier to display and add to form
  //also to cater for auto variables
  foreach($keys as $key=>$value){
   for ($i=0;$i<$number;$i++){
     $controls[$i][$key]=$value[$i];
     //handles repetitive attributes gets value from [0]
     if ($controls[$i][$key]==''){$controls[$i][$key]=$controls[0][$key];}
  }   
  } 
  //echo 'CONTROLS';
  //echo_array($controls);
  
  //$entity="textarea";
  //if ($entity=='') $type='text';
  
  if ($keys[$key]){$this->html_text[]='<div id="'.$attributes['wrapid'].'" class="wrap adorn">'."\n";}
  //add header if it exists
  $this->html_text[]=$attributes['header'];
  for ($i=0;$i<$number;$i++){
     $s1=self::attributesText($controls[$i]);
     $s0='<div id="inner2">'."\n";
     //heart of checking must make it into case
     if ($attributes['type']=='multi'){
       if ($controls[$i]['types']=='select'){$entity='select';$type='select';}
        elseif ($controls[$i]['types']=='textarea'){$entity='textarea';$type='textarea';}
        else{
        $entity='input';$type='text';}
      ;}
     
   //check for multi
     if ($entity=='select'){$s=self::selectToHTML($controls[$i]);} else {$s=self::renderControl($s1,$entity,$type,$content);}
     if (!empty($keys['label'])){$s3='<label style="float:left;width:13em;clear:both">'."\n".$controls[$i]['label'].'</label>'."\n";}
     if (!empty($keys['after'])){$s4='<label  style="float:left;width:auto;">'.$controls[$i]['after'].'</label>';}
     $s5='<div class="clearer"></div></div>';
     $this->html_text[]=$s0.$s3.$s.$s4.$s5;
  }
  //add footer if it exists
 $this->html_text[]=$attributes['footer'];
 if ($keys[$key]){$this->html_text[]='</div><!--wrap-->'."\n";}
 
}

public function parseAccordion($text){
//parses mark-up for accordion based on JQuery
//Apple style widget
//Options are spelt out in accordion.frm
$attributes=self::parseAll($text);
//echo_array($attributes);
foreach ($attributes as $key=>$val){
     $keys[$key]=split(',',$val);
  }
 
 //echo_array($keys);
 

  $number=count($keys['name']);
  foreach($keys as $key=>$value){
   for ($i=0;$i<$number;$i++){
     $controls[$i][$key]=$value[$i];
     //handles repetitive attributes gets value from [0]
     if ($controls[$i][$key]==''){$controls[$i][$key]=$controls[0][$key];}
  }   
  } 
  //echo 'CONTROLS';
  //echo_array($controls);
  $i=0;
  $s='<div style="width:300px;background-color:#FFFFFF;padding:0;margin:0">';
  $s.='<ul id="example2" style="padding:0;margin:0">';
  for ($i=0;$i<count($controls);$i++){         //needs correction
   $s.=sprintf('<li><a href="#">%s</a><ul><li>%s</li></ul></li>',$controls[$i]['name'],$controls[$i]['values']);
    
  }
  $s.='</ul>';
  $s.='</div>';
  $this->html_text[]=$s;
   
  //loads javascript
  //$this->html_text[]=self::tabsJS($img,$file_prefix);



}

public function parseDataSource(){
/*
parses a data source control
datasource{type:datasource;
                  db:mySQL;
           database:wordpress;
               host:localhost;
               user:root;
               pasw:local;
               connect:auto;
               persistent:true;
               table:;
}
*/
echo 'test';
}

public function parseDBInput(){
/*
parses an INPUT Control with DB abilities

surname{type:DBText;
        datasource:datasource1;
             name:test;
             label:label1;
             value:
             field:DBText;
             wrapID:DBText;
             validation:maxchar,12;
             onError:test(); 
             OnloadSQL:
             OnExitSQL:
             OnChangeSQL:
             Ajax:true;
        
}
   actions - produces the html
           - retrieves the deafult value and shows it
           - if there is post info shows it
           - performs validation if required while typing
           - on error outputs a message
           
 Each Table in the Database is represented by an Object
 Each Model represents the business logic         
*/
;}


public function scaffolding(){
/*
creates scaffolding
*/



;}


function render(){
foreach  ($this->html_text as $key=>$value){
//This is the main routine that echoes everything back on the screen;
//should also write it in a file with .php extension as
//well as put everything nicely in a zip file
   e($value);
  }
}
}



?>
 
 






