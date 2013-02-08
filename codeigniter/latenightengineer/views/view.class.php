<?php
//include_once('markdown.php');
//include_once('utilities.php');
//include_once('egypt-data.php');
//include_once('cyprus.php');
//include_once('usa.php');
//include_once('girls.dat.php');
include_once('table.php');

/*

These are all the necessary view functions.
You need to modify as necessary for your application

*/

class view{

function feature($z='<img src="Scott-245.jpg"'){
$text='
<div style="width:60.5%;margin:0 auto;margin-bottom:7px;padding-top:5px">
  '.$z.' style="display:block;width:90%;margin:0 auto" />
  <p style="font-style:italic;font-size:12px;text-align:center">Alfred Jones engraved the "Columbus" portrait, which faced the opposite direction from his similar engraving work on the Columbian Exposition half dollar. The two framing figures were engraved by Charles Skinner. 27,350 were printed, of which 21,844 sold.[7] Like all the dollar-value Columbians, copies sell for many times the original face value, even adjusting for inflation, with the finest examples auctioning for tens of thousands of dollars.[5]</p>
</div>';
echo $text;
}


function displayThree($img1='Scott-231.jpg',$img2='Scott-242.jpg',$img3='Scott-243.jpg'){
//echo $img1;

$text='<div style="background:#000;color:#ffffff" class="clearfix">
<div style="width:32.5%;float:left">
  <img src="'.$img1.'" style="display:block;width:98%;margin:0 auto" />
  <p style="font-style:italic;font-size:12px;text-align:center">'. ScottNumber($img1). '</p>
</div>
<div style="width:32.5%;float:left">
  <img src="'.$img2.'" style="display:block;width:98%;margin:0 auto" />
  <p style="font-style:italic;font-size:12px;text-align:center">'. ScottNumber($img2). '</p>
</div>
<div style="width:32.5%;float:left">
  <img src="'.$img3.'" style="display:block;width:98%;margin:0 auto" />
  <p style="font-style:italic;font-size:12px;text-align:center">'. ScottNumber($img3). '</p>
</div>
</div>';
echo $text;
}

function displayThreelarge($img1='Scott-231.jpg',$img2='Scott-242.jpg',$img3='Scott-243.jpg'){
//echo $img1;

$text='<div  class="clearfix">
<div style="width:48.5%;margin:0 auto;">
  <img src="'.$img1.'" style="display:block;width:98%;margin:0 auto" />
  <p style="font-style:italic;font-size:12px;text-align:center">'. ScottNumber($img1). '</p>
</div>
<div style="clear:both"></div>
<div style="width:48.5%;float:left">
  <img src="'.$img2.'" style="display:block;width:98%;margin:0 auto" />
  <p style="font-style:italic;font-size:12px;text-align:center">'. ScottNumber($img2). '</p>
</div>
<div style="width:48.5%;float:left">
  <img src="'.$img3.'" style="display:block;width:98%;margin:0 auto" />
  <p style="font-style:italic;font-size:12px;text-align:center">'. ScottNumber($img3). '</p>
</div>
</div>';
echo $text;
}


function displayTwo($img1='Scott-231.jpg',$img2='Scott-232.jpg'){
$text='<p></p>
<div style="background:#000000;color:#fff" class="clearfix">
<div style="width:16.25%;float:left;height:10px">
  </div>
<div style="width:32.5%;float:left">
  <img src="'.$img1.'" style="display:block;width:90%;margin:0 auto" />
  <p style="font-style:italic;font-size:12px;text-align:center">'. ScottNumber($img1). '</p>
</div>
<div style="width:32.5%;float:left">
  <img src="'.$img2.'" style="display:block;width:90%;margin:0 auto" />
  <p style="font-style:italic;font-size:12px;text-align:center">'. ScottNumber($img2). '</p>
</div>
</div>
<p></p>';
echo $text;
}

function displayTwoLarge($img1='Scott-231.jpg',$img2='Scott-232.jpg'){
$text='<p></p>
<div  class="clearfix">

<div style="width:48.5%;float:left">
  <img src="'.$img1.'" style="display:block;width:90%;margin:0 auto" />
  <p style="font-style:italic;font-size:12px;text-align:center">'. ScottNumber($img1). '</p>
</div>
<div style="width:48.5%;float:left">
  <img src="'.$img2.'" style="display:block;width:90%;margin:0 auto" />
  <p style="font-style:italic;font-size:12px;text-align:center">'. ScottNumber($img2). '</p>
</div>
</div>
<p style="clear:both"></p>';
echo $text;
}


function displayNumber($s){
 $number=count($s);
 for ($i=0;$i<$number;$i=$i+3){
  if ($i<$number-3) {self::displayThree($s[$i],$s[$i+1],$s[$i+2]);}
 }

}

function ScottNumber($text){
$pattern='/(.+)\./isx';
 preg_match_all($pattern,$text,$values);
$number=$values[1][0];
//echo_array($values);break;
return $number;
}

function displayOne($img1='Scott-231.jpg'){
$text='<p></p>
<div  class="clearfix">

<div style="width:48.5%;margin:0 auto">
  <img src="'.$img1.'" style="display:block;width:90%;margin:0 auto" />
  <p style="font-style:italic;font-size:12px;text-align:center">'. ScottNumber($img1). '</p>
</div>
</div>
<p></p>';
echo $text;
}



function displayFour($stamp){
 self::displayTwo($stamp[0],$stamp[1]);
 self::displayTwo($stamp[2],$stamp[3]);
}

function displayFive($stamp){
 self::displayTwoLarge($stamp[0],$stamp[1]);
 self::displayTwoLarge($stamp[2],$stamp[3]);
 self::displayOne($stamp[4]);
}

function displaySix($stamp){
 self::displayThree($stamp[0],$stamp[1],$stamp[2]);
 self::displayThree($stamp[3],$stamp[4],$stamp[5]);
}
function displaySeven($stamp){
 self::displayOne($stamp[0]);
 self::displayThree($stamp[1],$stamp[2],$stamp[3]);
 self::displayTwo($stamp[4],$stamp[5]);
 self::displayOne($stamp[6]);
}

function displayEight($stamp){
 self::displayTwo($stamp[0],$stamp[1]);
 self::displayThree($stamp[2],$stamp[3],$stamp[4]);
 self::displayThree($stamp[5],$stamp[6],$stamp[7]);
}

function displayNine($stamp){
 self::displayThree($stamp[0],$stamp[1],$stamp[2]);
 self::displayThree($stamp[3],$stamp[4],$stamp[5]);
 self::displayThree($stamp[6],$stamp[7],$stamp[8]);
}

function displayTen($stamp){
 self::displayTwo($stamp[0],$stamp[1]);
 self::displayThree($stamp[2],$stamp[3],$stamp[4]);
 self::displayThree($stamp[5],$stamp[6],$stamp[7]);
 self::displayTwo($stamp[8],$stamp[9]);
}

function displayEleven($stamp){
 self::displayTwoLarge($stamp[0],$stamp[1]);
 self::displayThreeLarge($stamp[2],$stamp[3],$stamp[4]);
 self::displayThreeLarge($stamp[5],$stamp[6],$stamp[7]);
 self::displayThreeLarge($stamp[8],$stamp[9],$stamp[10]);
}

function displayTwelve($stamp){
 self::displayTwo($stamp[0],$stamp[1]);
 self::displayThree($stamp[2],$stamp[3],$stamp[4]);
 self::displayThree($stamp[5],$stamp[6],$stamp[7]);
 self::displayTwo($stamp[8],$stamp[9]);
 self::displayTwo($stamp[10],$stamp[11]);
 
} 

function displayThirteen($stamp){
 self::displayTwo($stamp[0],$stamp[1]);
 self::displayThree($stamp[2],$stamp[3],$stamp[4]);
 self::displayThree($stamp[5],$stamp[6],$stamp[7]);
 self::displayThree($stamp[8],$stamp[9],$stamp[10]);
 self::displayTwo($stamp[11],$stamp[12]);
}

function displayFourteen($stamp){
 self::displayTwo($stamp[0],$stamp[1]);
 self::displayTwo($stamp[2],$stamp[3]);
 self::displayThree($stamp[4],$stamp[5],$stamp[6]);
 self::displayThree($stamp[7],$stamp[8],$stamp[9]);
 self::displayTwo($stamp[10],$stamp[11]);
 self::displayTwo($stamp[12],$stamp[13]);

}

function displayFifteen($stamp){
 self::displayTwoLarge($stamp[0],$stamp[1]);
 self::displayTwoLarge($stamp[2],$stamp[3]);
 self::displayTwoLarge($stamp[4],$stamp[5]);
 self::displayTwoLarge($stamp[6],$stamp[7]);
 self::displayTwoLarge($stamp[8],$stamp[9]);
 self::displayTwoLarge($stamp[10],$stamp[11]);
 self::displayTwoLarge($stamp[12],$stamp[13]);
 self::displayOne($stamp[14]);
}


function displaySixteen($stamp){
 self::displayTwo($stamp[0],$stamp[1]);
 self::displayThree($stamp[2],$stamp[3],$stamp[4]);
 self::displayThree($stamp[5],$stamp[6],$stamp[7]);
 self::displayThree($stamp[8],$stamp[9],$stamp[10]);
 self::displayThree($stamp[11],$stamp[12],$stamp[13]);
 self::displayTwo($stamp[14],$stamp[15]);
 
}

function displaySeventeen($stamp){
 self::displayTwo($stamp[0],$stamp[1]);
 self::displayThree($stamp[2],$stamp[3],$stamp[4]);
 self::displayThree($stamp[5],$stamp[6],$stamp[7]);
 self::displayThree($stamp[8],$stamp[9],$stamp[10]);
 self::displayThree($stamp[11],$stamp[12],$stamp[13]);
 self::displayThree($stamp[14],$stamp[15],$stamp[16]);
}

function displayEighteen($stamp){
 self::displayThree($stamp[0],$stamp[1],$stamp[2]);
 self::displayThree($stamp[3],$stamp[4],$stamp[5]);
 self::displayThree($stamp[6],$stamp[7],$stamp[8]);
 self::displayThree($stamp[9],$stamp[10],$stamp[11]);
 self::displayThree($stamp[12],$stamp[13],$stamp[14]);
 self::displayThree($stamp[15],$stamp[16],$stamp[17]);
}


function showSet($s,$title="The Columbians"){
//main display routine
//counts the elements in the set and calls the correct display routine
//we just need to send the starting and end number possibly automatically
$number=count($s);
//echo_array($s);
//echo $number;
//echo_array($s);
echo "<h2 class="."set-title".">$title</h2>";
if ($number==0) self::displayOne($s[0]);
if ($number==1) self::displayOne($s[0]);
if ($number==2) self::displayTwoLarge($s[0],$s[1]);
if ($number==3) self::displayThreeLarge($s[0],$s[1],$s[2]);
if ($number==4) self::displayFour($s);
if ($number==5) self::displayFive($s);
if ($number==6) self::displaySix($s);
if ($number==7) self::displaySeven($s);
if ($number==8) self::displayEight($s);
if ($number==9) self::displayNine($s);
if ($number==10) self::displayTen($s);
if ($number==11) self::displayEleven($s);
if ($number==12) self::displayTwelve($s);
if ($number==13) self::displayThirteen($s);
if ($number==14) self::displayFourteen($s);
if ($number==15) self::displayFifteen($s);
if ($number==16) self::displaySixteen($s);
if ($number==17) self::displaySeventeen($s);
if ($number==18) self::displayEighteen($s);
if ($number>18)  self::displayNumber($s);


}

function showImages($imgStart,$imgEnd,$prefix='Scott-'){
//gets the image numbers to display
   for ($i=$imgStart;$i<$imgEnd+1;$i++){
   $imgScott[$i-$imgStart]=$prefix.$i.'.jpg';
 }
 return $imgScott;
}


function showScott($imgStart,$imgEnd,$prefix='Scott-'){
//specific to images using scott numbers

   for ($i=$imgStart;$i<$imgEnd+1;$i++){
   $imgScott[$i-$imgStart]=$prefix.$i.'.jpg';
 }
 return $imgScott;
}


function showTable($t, $title='Table 1 - The Penasson Issue'){
echo '<h2 style="text-align:center">'.$title.'</h2>';
echo markdown($t);
}

}

?>


