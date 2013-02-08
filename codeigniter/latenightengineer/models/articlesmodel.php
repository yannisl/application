<?php
class Articlesmodel extends Model {

    var $title   = '';
    var $content = '';
    var $date    = '';
    var $article_name ='';
    var $article_comments='';
    var $country_menu='';
    var $country_path='';//../cape-of-good-hope/cape-of-good-hope.dat';
    var $path;

    function Articlesmodel()
    {
        // Call the Model constructor
        parent::Model();
    }
    
    function get_last_ten_entries()
    {
        $query = $this->db->get('entries', 10);
        return $query->result();
    }

    function insert_entry()
    {
        $this->title   = $_POST['title']; // please read the below note
        $this->content = $_POST['content'];
        $this->date    = time();

        $this->db->insert('entries', $this);
    }

    function update_entry()
    {
        $this->title   = $_POST['title'];
        $this->content = $_POST['content'];
        $this->date    = time();

        $this->db->update('entries', $this, array('id' => $_POST['id']));
    }
    
    function get_article(){
    //get article from folder article_name is the file name
    //if ($this->article_name=''){$this->article_name="home.dat";}
     $text=$this->content=@file_get_contents($this->article_name);
     return $text;
    }
    
    function get_comments(){
    //get article comments
    $text='';
    if (file_exists($this->article_comments)){
    $text=$this->content=@file_get_contents($this->article_comments); }
       return $text;
    
    }

    function get_countrymenu(){
    //get specific country menu if it exists
    //special menus are saved as countryname.menu
    $texta='';
    //if (file_exists($this->country_menu)){
    $texta=$this->country_menu=@file_get_contents($this->country_path);//}
         return $texta;
    }

    function get_articles_list(){
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
    //echo_array($list);break;
     }
    }
     return $list;
  
    }

}





?>