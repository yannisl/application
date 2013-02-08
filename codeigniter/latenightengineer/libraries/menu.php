<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
/**
 *  Logic for menus
 *  when a node is created if it is to be accessed
 *  from a menu
 *  this is added on the form
 *  form is to be shown on main edit form
 *  for convenience
 *  other helper screens should come
 *  via an admin/menus
 *  menus/add/etc
 *  therefore menus should both have
 *  controllers models etc
 *  plus a library
 *  here we collect common routines for libarary
 *  menus can be saved in a db or cached ie saved in
 *  an html file
 */
define('THEMESPATH','../CodeIgniter/');
$s='';
// class defines the themes engine for the CMS
// themes reside in the themes directory
// unless configured differently
class Menu extends Object{

    // menu struct
    // items defined as /level1/level2/level3/level4/
    // each level has title endering etc information
    // provides infinite possibilities
    // think ogf it as /ul/ul/li
    //                 /ul/li
    // pretty much like expath can sort properly afterwards

    // holds data for testing
    // should move to test menu
    public $s='';
    private $testArray=array
    (
    '/etc/php5' => '/etc/php5',
    '/etc/php5/cli' => '/etc/php5/cli',
    '/etc/php5/cli/conf.d' => '/etc/php5/cli/conf.d',
    '/jquery' => '',
    '/jquery/plugins/flip'=>'flip',
    '/jquery/plugins/cycle'=>'cycle',
    '/jquery/plugins/Module and Packages'=>array(array('title'=>'cycle','link'=>'test'),array('title'=>'second'))
    );


    function __construct()
    {
        // Instantiate the CI libraries so we can work with them
        $CI =& get_instance();
        log_message('debug', 'Loaded Menu');
    }

 /**
 * Explode any single-dimensional array into a full blown tree structure,
 * based on the delimiters found in it's keys.
 *
 * @author    Kevin van Zonneveld
 * @author    Lachlan Donald
 * @author    Takkie
 * @copyright 2008 Kevin van Zonneveld (http://kevin.vanzonneveld.net)
 * @license   http://www.opensource.org/licenses/bsd-license.php New BSD Licence
 * @version   SVN: Release: $Id: explodeTree.inc.php 89 2008-09-05 20:52:48Z kevin $
 * @link      http://kevin.vanzonneveld.net/
 *
 * @param array   $array
 * @param string  $delimiter
 * @param boolean $baseval
 *
 * @return array
 *
 * @example $tree = explodeTree($a, "/",FALSE);
 *
 */
    function explodeTree($array, $delimiter = '_', $baseval = false)
    {
        if(!is_array($array)) return false;
        $splitRE   = '/' . preg_quote($delimiter, '/') . '/';
        $returnArr = array();
        foreach ($array as $key => $val) {
            // Get parent parts and the current leaf
            $parts    = preg_split($splitRE, $key, -1, PREG_SPLIT_NO_EMPTY);
            $leafPart = array_pop($parts);
            // Build parent structure
            // Might be slow for really deep and large structures
            $parentArr = &$returnArr;
            foreach ($parts as $part) {
                if (!isset($parentArr[$part])) {
                    $parentArr[$part] = array();
                } elseif (!is_array($parentArr[$part])) {
                    if ($baseval) {
                        $parentArr[$part] = array('__base_val' => $parentArr[$part]);
                    } else {
                        $parentArr[$part] = array();
                    }
                }
                $parentArr = &$parentArr[$part];
            }

            // Add the final part to the structure
            if (empty($parentArr[$leafPart])) {
                $parentArr[$leafPart] = $val;
            } elseif ($baseval && is_array($parentArr[$leafPart])) {
                $parentArr[$leafPart]['__base_val'] = $val;
            }
        }
        return $returnArr;
    }

/*
 *  reads from file a structure
 *  @param string $location the directory to the menu.dat
 *  @return string $menulist
 *
 */


    function listArrayRecursive($array_name, $ident = 0, $mark=""){
        static $s;
         if (is_array($array_name)){
            $s=$s.'<ul>
                   ';
            foreach ($array_name as $k => $v){
                if (is_array($v)){
                    for ($i=0; $i < $ident; $i++){ $s=$s.$mark; }
                    $s=$s.'<li>'.$k .'</li>
';
                    $this->listArrayRecursive($v, $ident + 1, $mark);
                   // $s=$s.'AFTERM';
                }else{
                    for ($i=0; $i < $ident; $i++){$s=$s.$mark; }
                    $s=$s.'<li>'.$k . "</li>" . $v . "
                     ";
                 }
             
            }
           $s=$s.'</ul>
           ';
        }else{
            $s=$s."Error = " . $array_name;
        }
        return $s;
    }

/*
 *  reads from file a structure
 *  @param string $location the directory to the menu.dat
 *  @return string $menulist
 *
 */

    function toHTML($array_name, $ident = 0, $mark=""){
        static $s1;
          if (is_array($array_name)){
            $s1=$s1.'<ul class="level_'.$ident.'">
                     ';
               foreach ($array_name as $k => $v){
                if (is_array($v)){
                    for ($i=0; $i < $ident; $i++){ $s1=$s1.$mark; }
                    $s1=$s1.'<li class="level_'.$ident.'_'.$ident.'">'.$k .'</li>'. " " . "
                       ";
                    $this->toHTML($v, $ident + 1, $mark);
                   // $s=$s.'AFTERM';
                }else{
                    for ($i=0; $i < $ident; $i++){$s1=$s1.$mark; }
                    $s1=$s1.'<li class="level_'.$ident.'_'.$ident.' ">'.$k . "</li>
                              " . $v ."";
                 }
            }
           $s1=$s1.'</ul>
                    ';
        }else{
            $s1=$s1."Error = " . $array_name;
        }
        return $s1;
    }

    // @param string $location - the folder
    // @param fname $fname - the filename
    // left as is as the whole PATH system need to be
    // re-assessed and placed in some config
    // search must start from file directory
    // if not found to global etc
    // need some hierarchy
    // return array
    public function getRaw($location='data',$fname="menu.dat"){
        $CI =& get_instance();
        $base=$CI->config->item('base_url');
        $menuList =file($base.$location.'/'.$fname);
        foreach($menuList as $key){
            // we trim to remove empty lines
            $key=trim($key);
            if (!empty($key)) $m[$key]='';//$key;
        }
        return $m;
    }


    // discover menus entered
    // manually
    // via other paths
    function _autodiscover(){
        if (file_exists('test')){return true;}
        else{return false;}
    }

    function createMenu(){

    }

    function deleteMenu(){

    }

    function createMenuItem(){

    }

    function insertMenuItem(){

    }



    function loadMenu(){
    }


    function parseMenu(){

    }

    function addMenuItem(){

    }
    function beforeView(){

    }

    function render(){

    }

}


