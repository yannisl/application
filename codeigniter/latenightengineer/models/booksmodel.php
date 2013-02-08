<?php
class Booksmodel extends Model {

    var $title   = '';
    var $content = '';
    var $date    = '';
    var $book_name ='';
    var $path;
    var $file_information;
    var $file_extension;

    function Booksmodel()
    {
        // Call the Model constructor
        parent::Model();
    }
    
    function is_txt($filename){
     $valid=array('.txt','.TXT');
     $ext = strrchr(low($filename), '.');
     //echo $filename.' '.$ext;
    if (in_array($ext,$valid)){return true;}
    }
    
    
        
    function get_book(){
    //get article from folder article_name is the file name
    //if ($this->article_name=''){$this->article_name="home.dat";}
    
     //load helper for files
     $this->load->helper('file');
      echo $this->book_name;
      
       //first try as it comes
       $try=$this->book_name;
       if (!is_file($this->book_name)){
        $try=$this->book_name.'.htm';
       }
       else 
       {
              $this->file_extension='htm';
       return $text=$this->content=file_get_contents($try);
       }
       if (!is_file($try)){
        $try=$this->book_name.'.html';
       }
       else
       {
       $this->file_extension='html';
       return $text=$this->content=file_get_contents($try);
       
       }     
       
       if (!is_file($this->book_name)){
        $try=$this->book_name.'.txt';
        
       }
       else
       {
       $this->file_extension='txt';
       return $text=$this->content=file_get_contents($try);
       
       }
       
       if (!is_file($try)){
        //$try=$this->book_name.'.text';
        
       }
       else
       {
        $this->file_extension='txt';
       return $text=$this->content=file_get_contents($try);
       
       }
               
        //if it made it this far someone is playing games with the
        //filename
        
        $msg='DON\'T EVEN THINK OF IT!';
        
        $text=$msg.' '.htmlentities($this->book_name);
         return $text;
       
       
       
 } 
       
  
     
     
     
     



    function get_books_list(){
    //get all articles from article directory
    //we use an iterator to get all files with extenion .dat
     $list='';
     $path=$this->path;
     $dir = new RecursiveIteratorIterator(
           new RecursiveDirectoryIterator($path), true);

     foreach ( $dir as $file ) {

    if (preg_match("/\.dat$/isx",$file)){
    $file=str_replace("\\",'/',$file);
    $file=preg_replace('%\.\.%','',$file);
    $list[]=$file;
    //echo_array($list);
    }
    
    }

     return $list;
     
     
    }

}
?>