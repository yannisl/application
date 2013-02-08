<?php

include_once('../strings/markdown.php');
//include_once('../strings/utilities.php');

class Image_lab extends Controller {
	
	function index(){
	
	;}
	
	function _crop(){
	   //echo_array($_POST);
	   if (!empty($_POST['x'])) { $x=$_POST['x'];}else{$x=100;}
	   if (!empty($_POST['y'])) { $y=$_POST['y'];}else{$y=100;}
	   if (!empty($_POST['w'])) { $w=$_POST['w'];}else{$w=100;}
	   if (!empty($_POST['h'])) { $h=$_POST['h'];}else{$h=100;}
	   $data['raw_name']=$_POST['raw_name'];
     $data['file_ext']=$_POST['file_ext'];
     $targ_w =$w; $targ_h = $h;
     $jpeg_quality = 90;
     $src = './uploads/'.trim($_POST['image']);
     $img_r = imagecreatefromjpeg($src);
     $dst_r = ImageCreateTrueColor( $targ_w, $targ_h );
     imagecopyresampled($dst_r,$img_r,0,0,$x,$y,
     $targ_w,$targ_h,$w,$h);
     imagejpeg($dst_r, './uploads/'.'crop_'.trim($_POST['image']), 80);
      //echo_array($data);
	 	 $this->load->view('image_crop_view', $data);
	 	  
	;}
	
	
	
	
	function rc($image_source='9a.jpg'){
	$data="";
	 $this->load->plugin('curvy_corners');
	 $data['original_image']='../CodeIgniter/uploads/'.$image_source;
   $image = imagecreatefromjpeg($data['original_image']);
   $image = imageClipCorners($image,30,30,255,255,255);
   // header("Content-type: image/jpeg");
   //outputs image to directory and saves it
   imagejpeg($image,BASEPATH.'../uploads/curv.jpg',80);
   //Corner rounding function.
    $data['original_image']='http://localhost/CodeIgniter/uploads/'.$image_source;
    $data['content']=file_get_contents('../blog/Round_corners.dat');
    
    $this->load->library('image');
     $hex = '#45F2C3';
     $hls = Image::rgb2hls(Image::hex2rgb($hex));
     $hls[0] = 192;
     $hls[2] = 0.15;
     echo Image::rgb2hex(Image::hls2rgb($hls));

     $data['colors']=(Image::colourRange('#dd0000', '#000000', 20));
         
	  $this->load->view('round-corners', $data);
	
	
	}
}
?>