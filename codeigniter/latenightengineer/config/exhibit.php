<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*
|--------------------------------------------------------------------------
Describes the Data needed to display an exhibit in frames and others
By placing it in a file it saves development of a database, edit delete etc

All images need to be placed in one directory
In the directory itself we place the configuration file
This can aslo be a yaml file, which is better, it can hide the details from the user
|--------------------------------------------------------------------------
|
| 
|
*/
$config['exhibit_title']	         = "Australian Rates";
$config['exhibit_owner']           = "Dr. Y Lazarides";
$config['exhibit_country']         = "Australia";
$config['exhibit_number_frames']   =  7;
$config['exhibit_items_per_frame'] = 12;
$config['exhibit_awards']          = "Silver at Expo 96"; 
$config['exhibit_source']          = "ex Gaertner Auction";         
$config['exhibit_tags']            = "test1, test2, test3";
?>