<?php

//this is the controller parses text and puts them in relevant arrays
//etc.
//picks data from text file or DB
//see view for display

 if ( ! function_exists('url_title'))
{
	function url_title($str, $separator = 'dash')
	{
		if ($separator == 'dash')
		{
			$search		= '_';
			$replace	= '-';
		}
		else
		{
			$search		= '-';
			$replace	= '_';
		}
		
		$trans = array(
						$search								=> $replace,
						"\s+"								=> $replace,
						"[^a-z0-9".$replace."]"				=> '',
						$replace."+"						=> $replace,
						$replace."$"						=> '',
						"^".$replace						=> ''
					   );

		$str = strip_tags(strtolower($str));
	
		foreach ($trans as $key => $val)
		{
			$str = preg_replace("#".$key."#", $val, $str);
		}
	
		return trim(stripslashes($str));
	}
}
 
 
class Parser{
//template replacement
public function wikitize($text){
//replaces text between {{}} with wiki links
//echo 'IN WIKI'.$text;
//needs work for more
  $pattern="/\{\{wi:\s*([[:alnum:]]+)\}\}/";
  preg_match_all($pattern,$text,$values);
  $pattern="/\{\{wi:\s*([[:alnum:]\/\)\(\,\.\-\&\s\'\"]+)\}\}/";
  $z=preg_replace($pattern,'<a href="http://en.wikipedia.org/wiki/$1">$1</a> ',$text);
 return $z;
}


function replaceStamp($text){
//replaces {{st: }} with an image of the stamp
$pattern="/\{\{st:\s*([[:alnum:]\-]+)\}\}/";
preg_match_all($pattern,$text,$values);
$pattern="/\{\{st:\s*([[:alnum:]\/\)\(\,\.\-\&\s\'\"]+)\}\}/";
$z=preg_replace($pattern,'<img src="$1.jpg">$1</a> ',$text);
return $z;
}

function replaceFilter($text){
//replaces {{siegel: }} with an image of the stamp
$pattern="/\{\{siegel:\s*([[:alnum:]\-]+)\}\}/";
preg_match_all($pattern,$text,$values);
$pattern="/\{\{siegel:\s*([[:alnum:]\$\/\)\(\,\.\-\&\s\'\"]+)\}\}/";
$z=preg_replace($pattern,'Sold by Robert A. Siegel Auction Galleries, Inc. $1',$text);
return $z;
}


function replaceLink($text){
//{{li: anchor|http}}
//replaces link with anchor and reference


}

function parse($text){
//$pattern="/(\s*\d+\s*\|)+\|(\<.*\>)\|\s*\n/isx";
//$pattern="/\n(\s*\d+\s*)\|+(\s*\d*.*?)\|(\s*.\s*)\|(\s*.*|\d\.\s*\|)/isx";
//this is for egyptian parse stamp
$pattern="/(Scott-\d*.*\.jpg\s*)\|/";
preg_match_all($pattern,$text,$array);
//echo_array($array);
//echo 'test';
 $z=($array[1]);
return $array[1];
}

function parseText($text){
$pattern="/text:(.*)$/isx";
preg_match_all($pattern,$text,$array);
$z=$array[1][0];
$z=self::wikitize($z);
$z=self::replaceStamp($z);
$z=self::replaceFilter($z);
//echo markdown($z);
return $z;
}

function post($text){
$pattern="/post:(.*)[\;]/isx";
preg_match_all($pattern,$text,$array);
$z=$array[1][0];
$z=self::wikitize($z);
$z=self::replaceStamp($z);
$z=self::replaceFilter($z);
//echo markdown($z);
return $z;
}

function parseTitle($text){
 $pattern="/title:(.*\s*)\;\n/x";
 preg_match_all($pattern,$text,$array);
 $z=$array[1][0];
 return $z;
}

function title($text){
$pattern="/title:(.*\s*)\;\n/x";
preg_match_all($pattern,$text,$array);
return $array[1][0];
}

function parseByline($text){
$pattern="/byline:(.*\s*)\;\n/x";
preg_match_all($pattern,$text,$array);
return $array[1][0];
}

function byline($text){
$pattern="/byline:(.*\s*)\;\n/x";
preg_match_all($pattern,$text,$array);
return $array[1][0];
}

function parseFeature($text){
$pattern="/feature\:(.+)\;\n/x";
preg_match_all($pattern,$text,$array);
return ($array[1][0]);

}

function parseFeatureText($text){
$pattern="/caption:(.*\s*)\;\n/x";
preg_match_all($pattern,$text,$array);
 $z=$array[1][0];
 $z=self::wikitize($z);
$z=self::replaceStamp($z);
$z=self::replaceFilter($z);
//echo markdown($z);
return $z;
}
function featureText($text){
$pattern="/caption:(.*\s*)\;\n/x";
preg_match_all($pattern,$text,$array);
 $z=$array[1][0];
 $z=self::wikitize($z);
$z=self::replaceStamp($z);
$z=self::replaceFilter($z);
//echo markdown($z);
return $z;
}
function caption($text){
$z=self::parseField('caption',$text);
return caption;
}

function parseField($field,$text){
//parses any specific field
//this is a general routine
$pattern="/$field:(.*\s*)\;\n/x";
preg_match_all($pattern,$text,$array);
 return $array[1][0];
}

function parseCountry($text){
//returns the value for country
$country=self::parseField('country',$text);
return $country;
}

function period($text){
//returns the value for country
$period=self::parseField('period',$text);
return $period;
}


function feature($text){
//returns the value for country
$period=self::parseField('feature',$text);
return $period;
}

function estimate($text){
//returns the value for country
$value=self::parseField('estimate',$text);
return $value;
}

function soldfor($text){
//returns the value for country
$value=parseField('soldfor',$text);
return $value;
}

function soldyear($text){
//returns the value for country
$value=self::parseField('soldyear',$text);
return $value;
}

function credit($text){
//returns the value for country
 $value=self::parseField('credit',$text);
return $value;
}

function tags($text){
//parses tags and puts them in a link
$value=parseField('tags',$text);
echo '<a>'.$value.'</a>';
}

function anchor($text){
//parses tags and puts them in a link
$value=parseField('anchor',$text);
return $value;
}


function uri($text){
//parses tags and puts them in a link
$value=parseField('uri',$text);
$z='<a href="'.$value.'">'.anchor($text).'</a>';
return $z;
}

function author($text){
//parses tags and puts them in a link
$value=self::parseField('author',$text);
return $value;
}

function template($text){
//parses tags and puts them in a link
if ((self::parseField('template',$text)!='')){$value=self::parseField('template',$text);
return $value;}else{$value='template-set';}
}


function wikiLink($query){
//creates link for wiki
 $query=strtolower(trim($query));
 $query=ucwords($query);
 $query=str_replace(' ','_',$query);
 $s='http://en.wikipedia.org/wiki/'.$query;
 return $s;
}

function addUnderscore($text){
$text=trim($text); 
$text=str_replace(' ','_',$text);
return $text;
}

function makeMenu($arr){
//obtains all the links specified in the posts
//ie all posts
echo '<ul>';
 foreach ($arr as $key=>$value){
  echo '<li>'.uri($value).'</li>';
 }
echo '</ul>'; 
}



function set($text){
//returns the range for the set of stamps
//range is specified as follows
//set:121-131
//or set: Scott 121-131
//or set: SG 121-128 etc
$value=self::parseField('set',$text);
return $value;
}

function front($text){
//returns the range for the set of stamps
//range is specified as follows
//set:121-131
//or set: Scott 121-131
//or set: SG 121-128 etc
$value=self::parseField('front',$text);
return $value;
}

function featureImage($text){
//returns the range for the set of stamps
//range is specified as follows
//set:121-131
//or set: Scott 121-131
//or set: SG 121-128 etc
$value=self::parseField('feature-image',$text);
return $value;
}


function frontText($text){
$pattern="/front-text:(.*\s*)\;\n/x";
preg_match_all($pattern,$text,$array);
 $z=$array[1][0];
 $z=self::wikitize($z);
return markdown($z);
}


function frontImage($text){
$pattern="/front-image:(.*\s*)\;\n/x";
preg_match_all($pattern,$text,$array);
 $z=$array[1][0];
 //$z=self::wikitize($z);
return $z;
}
function file($text){
$pattern="/file:(.*\s*)\;\n/x";
preg_match_all($pattern,$text,$array);
 $z=$array[1][0];
 $z=file_get_contents($z);
 $z=self::wikitize($z);
 return markdown($z);
}

function photographerPhoto($text){
$pattern="/photographer-photo:(.*\s*)\;\n/x";
preg_match_all($pattern,$text,$array);
 $z=$array[1][0];
 
 return $z;
}

function gallery($text){
$pattern="/gallery:(.*\s*)\;\n/x";
preg_match_all($pattern,$text,$array);
 $z=$array[1][0];
 
 return $z;
}



function photographerName($text){
//returns the range for the set of stamps
//range is specified as follows
//set:121-131
//or set: Scott 121-131
//or set: SG 121-128 etc
$value=self::parseField('photographer-name',$text);
return $value;
}

function makeStampMenu($arr,$array_name='img',$category='set='){
//obtains all the links specified in the posts
//ie all posts
echo $array_name;
echo '<div style="clear:both"></div>';
echo '<ul>';
 foreach ($arr as $key=>$value){
  $title=self::title($value);
  $title=url_title($title, $separator = 'dash');
  //echo 'title '.$title;
  echo '<li><a style="font-size:larger" href="usa-template13.php?post='.$key.'&'.$category.self::set($value).'&template='.self::template($value).'&title='.$title.'&gallery='.self::gallery($value).'">'.self::title($value).'</a></li>';
 }
echo '</ul>'; 
}

function makeGalleryMenu($arr,$array_name='img',$category='set=',$return='ul'){
//Creates a menu based on the array we send
//parses the data for key category etc and creates the array
//essentially
//post=
//set=range of pictures to display 
//gallery=filepath for images if diiferent from GALLERYPATH
//title=title of post (only have it here for clean urls
echo $array_name;
echo '<div style="clear:both"></div>';
echo '<ul>';
 foreach ($arr as $key=>$value){
  $title=self::title($value);
  $title=url_title($title, $separator = 'dash');
  //echo 'title '.$title;
  echo '<li><a style="font-size:larger" href="usa-template13.php?post='.$key.'&'.$category.self::set($value).'&template='.self::template($value).'&title='.$title.'&gallery='.self::gallery($value).'">'.self::title($value).'</a></li>';
 }
echo '</ul>'; 
}


function featureArray($arr,$array_name='img'){
//obtains all post with category 'front'
//ie all posts destined for front page
//echo $array_name;
//needs work to make it more general
//this is for the future

echo '<div style="clear:both"></div>';
echo '<ul>';
 foreach ($arr as $key=>$value){
   $z=self::main($value);                 //gets all properties
  //$front=self::front($value);
  //$title=self::title($value);
  //$f_text=self::frontText($value);
  //$front_image=self::frontImage($value);
  //$feature_image=self::featureImage($value);
  if (isset($z['front'])||$front!=''){
  //$title=url_title($title, $separator = 'dash');
  
  foreach ($z as $k=>$v){
    $feature_array[$k][$key]=$v;}
  
  //$feature_array['front-text'][]=$f_text;
   //$feature_array['key'][]=$key;
   
  //$feature_array['feature-image'][]=$feature_image;
  //$feature_array['front'][]=$front;
  //$feature_array['front-image'][]=$front_image;
  $link='<a style="font-size:larger" href="usa-template13.php?post='.$key.'&set='.self::set($value).'&template='.self::template($value).'&title='.$title.'">'.self::title($value).'</a>';
  $feature_array['link'][]=$link;
  //echo '<li><a style="font-size:larger" href="usa-template13.php?post='.$key.'&set='.self::set($value).'&template='.self::template($value).'&title='.$title.'">'.self::title($value).'</a></li>';
  }
 }
echo '</ul>'; 
 //echo_array($feature_array);break;
return $feature_array;
}



function breadcrumbs(){
//navigate the catalogues
}

function nextPost($id){
 echo '<a href="cyprus-template13.php?post='.($id+1).'" >[next]</a>';
}

function previousPost($id){
 echo '<a href="cyprus-template13.php?post='.($id-1).'" >[previous]</a>';
}


function findAllProperties($file='photos.dat.php'){
//open a data file and find all properties i.e
//set:  value: etc, these rpresent the fields
// we need to push these as necessary
// returns array
//this is an important routine as it can enable fields to go into
//databse if necessary and FULL USER FLEXIBILITY
//returns an array for all the properties

$text=file_get_contents($file);
$pattern='/[\n]([[:alpha:]\-]+)\:/';
$z=preg_match_all($pattern,$text,$values);
 //echo_array(array_unique($values[1]));
return  array_unique($values[1]);
}

function findProperties($text){
//open a data file and find all properties i.e
//set:  value: etc, these rpresent the fields
// we need to push these as necessary
// returns array
//this is an important routine as it can enable fields to go into
//databse if necessary and FULL USER FLEXIBILITY
//returns an array for all the properties


$pattern='/[\n]([[:alpha:]\-]+)\:/';
$z=preg_match_all($pattern,$text,$values);
 //echo_array(array_unique($values[1]));
return  array_unique($values[1]);
}

function generalFilter($text,$properties){
//recieves all properties available in text and parses the
//text. Can be used for a full text or partial
//it then indexes the file
// array['post'][prop,prop,prop,prop]; 
//find all properties
//$properties=self::findProperties($text);
  //echo_array($properties);
//$title=call_user_func_array(array(&$this, 'title'),$text);

 foreach ($properties as $key=>$value){
  if (method_exists($this,$value)) {
  $caption=call_user_func_array(array(&$this,$value),$text);
  
  }
  else
  {
  //if not build in function just parse the field
  $caption=self::parseField($value,$text);
  }
  //echo $value.':  '.$caption.'<br />';
  $z[$value]=$caption;
 }
 //ultimate test to see if they go in array ok
 //echo_array($z);
 //echo 'title ='.$title;
 //echo 'caption ='.$caption;
 return $z;

}

function main($text,$file="usa.php"){

//gets the array for all properties
//$all_text=file_get_contents($file);
$properties=self::findProperties($text);
//filter all text and parse
$z=self::generalFilter($text,$properties);
//echo_array($z);
return $z;
}


}


?>


