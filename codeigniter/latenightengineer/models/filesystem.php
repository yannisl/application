<?php

/* Class to manipulate files in directories
 * as data
 * For example a set of text-files
 * or a set of images
 * uses the SPL Librray to iterate
 */
class filesystem extends Model {

    public $ext=array('jpg','png','gif'); // array of allowable extensions
    // for example for images it can
    // be .jpg, .png and the like
    public $root='';                      // root directory to map over

    public  $path='../CodeIgniter/images/icon/assets/';

    function filesystem()
    {
        // Call the Model constructor
        parent::Model();
        $this->init();
    }

    function init($path='../CodeIgniter/images/icon/assets/'){
         $this->path=$path;
    }
    
       
    
    function get($file_name=""){
     $text=$this->content=@file_get_contents($this->name);
     return $text;
    }

    function put($file_name=''){
      $text=$this->content=@file_put_contents($this->name);
      return $text;
    }


    //get all articles from article directory
    //we use an iterator to get all files with extenion .dat
    function get_all($path='',$ext='.dat'){

        $list='';
        
        //echoPRE($path);
        $dir = new RecursiveIteratorIterator(
               new RecursiveDirectoryIterator($path), true);

        foreach ( $dir as $file ) {
           $file_name=$dir->getSubPathName();
           // echoPRE($dir->getPathName());
           // echoPRE($dir->getDepth());
           // echoPRE($dir->getPath());
            // echoPRE($dir->getType());
            if (preg_match('/\.(jpg|jpeg|png|gif)$/isx',$file_name)){
                //$file=preg_replace('/\','/',$file);
               // $file=preg_replace('%\.\.%','',$file);
                $list[]=$file_name;
                $s[]=sprintf('<img src="%s" />','../../'.$path.$file_name);
           }
        }
        //echo_array($s);break;
        
        return $list;
    }

    function menu($menu='menu_gallery'){

    $CI=&get_instance();
    $s=$CI->load->view('admin/'.$menu,TRUE);
    return $s;

    }








}
?>