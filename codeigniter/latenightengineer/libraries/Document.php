<?php
 //include_once('utilities.php');


class document{

 public $body;
 public $tidy;
 public $raw_text;
 public $fragment;
 public $result;

// This class emulates javascript DOM routines
// Prototype only
// Uses Tidy for parsing the DOM

function __construct($file=''){
 
}

function parse($text=''){
 //parses the text based on a class
 //save raw text
 if ($text==''){
  $text=$this->raw_text;
  }
 //parse the string create node and save into tidy
 $this->tidy=tidy_parse_string($text);
 //get the body
 //before parse
 //$text=preg_replace('/rbottom\s*tr/','rbottom',$text);
 $this->body = tidy_get_body($this->tidy);
 //cosmetics
 //echo_array($this->body);
 //consider what happens if not there
 $this->getElementByClass($this->body,'');
 //input valid
 //echo $this->body;
  echo $this->result;break;
  $this->fragment=$this->result;
}

function get_body($text=''){

if ($text==''){
  $text=$this->raw_text;
  }
 //parse the string create node and save into tidy
 $this->tidy=tidy_parse_string($text);
 //get the body
 //before parse
 //$text=preg_replace('/rbottom\s*tr/','rbottom',$text);
 $this->body = tidy_get_body($this->tidy);
 }


function dump_nodes($node, $indent) {
    $s='';
    if($node->hasChildren()) {
        foreach($node->child as $child) {
            echo '<pre>';
            echo(str_repeat('-', $indent*2) . ($child->name ? $child->name : $child->value). "\n");
            echo '</pre>';
            //if ($child->name=='h1'||name=='h2'||name=='h3') echoPRE($child->name);
            dump_nodes($child, $indent+1);
        }
        
    }
    
}




function get_nodes($node, $type,&$result)
    {
      if($node != null)
      {
        if($node->id == $type)
          $result[] = $node;
        if($node->child != null)
        {
          foreach($node->child as $child)
          {
            self::get_nodes($child, $type, &$result);
          }
        }
      }
 }


function getElementByID($node, $name, &$result1)
 //get all the nodes
 //
     {
     if($node != null)
      {
        if($node->child != null)
        {
          foreach($node->child as $child)
          {
         
           self::getElementByID($child, $name, &$result1);
           if($child->attribute['id']==$name){
           $result1[] =$child;}       
          }
          
        }
      }
     
    }
 
 function getElementByClass($node, $name)
 //get all the nodes based on class
 //
  {
     //echo $name;break;
     
     if($node != null)
      {
         if($node->child != null)
        {
          foreach($node->child as $child)
          {
         
           self::getElementByClass($child, $name);
            if (isset($child->attribute['class']) && preg_match('/'.$name.'/',$child->attribute['class'],$v)){
              $result[] =$child; }  
           
           //if ( $child->attribute['class']==$name){
           //$this->result[] =$child;}       
          }
          
        }
      }
     
    }
 
 function getElementsByTagName($node,$tag,&$result2){
   if($node != null)
      {
         if($node->child != null)
        {
          foreach($node->child as $child)
          {
          if($child->name==($tag)){
           //echo $child->name.' ';
           $result2[] =$child;
           }  
           self::getElementsByTagName($child, $tag, &$result2);
               
          }
          
        }
      }
 
 
 }
 
    
//end class
}





//echo_array($result1);
/*
$images=$document->getElementsByTagName($body,'img',$result2);
 //
  foreach($result2 as $key=>$val){
   echo_array($val);
 }
*/




?>