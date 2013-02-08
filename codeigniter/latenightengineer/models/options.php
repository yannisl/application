<?php
class Options extends Model {

    var $title   = '';
    var $content = '';
    var $date    = '';
    var $article_name ='';
    var $path;
    var $blog_info='';
    var $tag_Line='';
    var $view_all='';

    function Options()
    {
        // Call the Model constructor
        parent::Model();
        
        
    }
    
    function get_option( $setting ) {
     //this function just fetches one option
     //to update
	   	// expected_slashed ($setting)
	   	echo $setting;
		  $query = $this->db->query( "SELECT option_value FROM options2 
		    WHERE option_name = '$setting' LIMIT 1" );
			foreach ($query->result() as $row)
      {
      $z[$setting]=$row->option_value;
      echo_array($query);
      }
			return $z;
		}
	
	
     
    function all()
    {
      //must select all from table
      
      $query = $this->db->query("SELECT * FROM options2 order by option_name");
      
      foreach ($query->result() as $row)
      {
      $z[$row->option_name]=$row->option_value;
      
      
      //echo $row->autoload;
      }
      //echo_array($z);
      //put all values in array 
      $this->view_all=$z;
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
     $text=$this->content=file_get_contents($this->article_name);
     return $text;
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
    $file=preg_replace('%\s%','',$file);
    $list[]=$file;
    //echo $file.'<br />';
    }
    
    }

     return $list;
     
     
    }

}
?>