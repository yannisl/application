<?php
class Forgemodel extends Model {
  //http://www.codeignitor.com/user_guide/database/forge.html
  //khoikhoi
  //More elegant
    var $title   = '';
    var $content = '';
    var $date    = '';
    var $article_name ='';
    var $path;
    
    //db
    var $fields; //(fields for new table);
    var $table_name; //new table names;

   


    function Forgemodel()
    {
        // Call the Model constructor
        parent::Model();
    }
    
    function createDB('db_name'){
     //create a new db for new installs
     //uses the forge class
     $this->load->dbforge();
     //create new database
     if ($this->dbforge->create_database('photo_ikons'))
     {
        echo 'Database created!';
     }
    }
    
    function dropDB('db_name'){
     //create a new db for new installs
     //uses the forge class
     $this->load->dbforge();
     //create new database
     //javascript alert!!!!!!!!!!
     //others
     //multi-user db's
     //
     if ($this->dbforge->drop_database('photo_ikons'))
     {
        echo 'Database created!';
     }
    }
    
    function createTable(){
     $fields = array(
         'blog_id' => array(
                            'type' => 'INT',
                            'constraint' => 5,
                            'unsigned' => TRUE,
                            'auto_increment' => TRUE
                                          ),
         'blog_title' => array(
                             'type' => 'VARCHAR',
                             'constraint' => '100',
                                ),
          'blog_author' => array(
                              'type' =>'VARCHAR',
                              'constraint' => '100',
                              'default' => 'King of Town',
                                 ),
           'blog_description' => array(
                                'type' => 'TEXT',
                                'null' => TRUE,
                                ),
            );
    
        //add the fields
        
        $this->dbforge->add_field($fields);
        //add indices
        $this->dbforge->add_key('blog_id', TRUE);
         // gives PRIMARY KEY `blog_id` (`blog_id`)

        $this->dbforge->create_table('table_name', TRUE);
          // gives CREATE TABLE IF NOT EXISTS table_name
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