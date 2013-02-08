<?php
class Model_sets extends Model {

    var $title   = '';
    var $content = '';
    var $date    = '';
    var $article_name ='';
    var $path;
    var $blog_info='';
    var $tag_Line='';
    var $view_all='';
    var $fields_to_update='';
    var $where='';
    var $result='false'; //result of operations

    function Model_sets()
    {
        // Call the Model constructor
        parent::Model();
        
        
    }
    
    function _save($set_id = NULL, $set_country = NULL, $set_description = NULL, $table_name='sets') {
	/* should work with auto increments only
	   need to check carefully
	   not very trustworthy
	*/
  $this->db->start_cache();
  $this->db->from('sets');
  $this->db->stop_cache();
  // The SKU is our unique ID, if it doesn't exist - we're screwed
  if ($set_id !== NULL) {
    // In this example, label and price are optional and can be inserted as NULL
    $record = array('set_id'=>$set_id, 'set_country'=>$set_country, 'set_description'=>$set_description);
    // Check if a record exists for this SKU
    $this->db->where('set_id',$set_id);
    if ($this->db->count_all_results() == 0) {
      // the check can be chained for less typing
      // $this->db->where('set_id',$set_id)->count_all_results()
      // A record does not exist, insert one.
      $query = $this->db->insert($table_name, $record);
    } else {
      // A record does exist, update it.
      $query = $this->db->update($table_name, $record, array('set_id'=>$set_id));
    }
    $this->db->flush_cache();
    // Check to see if the query actually performed correctly
    if ($this->db->affected_rows() > 0) {
      return TRUE;
    }
    return FALSE;
  }
  return FALSE;
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
      
      $this->db->insert('sets', $this->fields_to_update);
    }

    function update_entry()
    {
        
        $this->db->where('set_ID', $this->where);
        $this->result=$this->db->update('sets', $this->fields_to_update); 
        
        
        
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