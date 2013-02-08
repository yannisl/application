<?php
class Usersmodel extends Model {
  //http://www.codeignitor.com/user_guide/database/forge.html
  //khoikhoi
  //More elegant
    var $title   = '';
      
   
    var $fields; //(fields for new table);
    var $table_name; //new table names;

  
    function platform(){
    
    echo $this->db->platform();}

    function Usersmodel()
    {
        // Call the Model constructor
        parent::Model();
    }
    
    
    function createDB($db="PI"){
     //create a new db for new installs
     //uses the forge class
      $this->load->dbforge();
     //create new database
     if ($this->dbforge->create_database($db))
     {
        $s='Database created!';
        return $s;
     }
    }
    
    

//add fields

    function table($table,$fields=""){
    //creates a table 
     $this->load->dbforge();
     $fields = array(
                        'gallery_id' => array(
                                                 'type' => 'INT',
                                                 'constraint' => 5,
                                                 'unsigned' => TRUE,
                                                 'auto_increment' => TRUE
                                          ),
                        'gallery_title' => array(
                                                 'type' => 'VARCHAR',
                                                 'constraint' => '100',
                                          ),
                        'gallery_author' => array(
                                                 'type' =>'VARCHAR',
                                                 'constraint' => '100',
                                                 'default' => 'King of Town',
                                          ),
                         'gallery_artist' => array(
                                                 'type' =>'VARCHAR',
                                                 'constraint' => '100',
                                                 'default' => 'King of Town',
                                          ),                
                                          
                                          
                        'gallery_description' => array(
                                                 'type' => 'TEXT',
                                                 'null' => TRUE,
                                          ),
                                          
                );
              
     $this->dbforge->add_field($fields);
     $this->dbforge->add_key('gallery_id', TRUE);
     // gives PRIMARY KEY `blog_id` (`blog_id`)
    //add keys
    //$this->dbforge->add_key('ID', TRUE);
   // gives PRIMARY KEY `blog_id` (`blog_id`)

    //$this->dbforge->add_key('user_login_key');
    //$this->dbforge->add_key('user_nicename');
    // gives PRIMARY KEY `blog_id_site_id` (`blog_id`, `site_id`) 
     $this->dbforge->create_table($table);
   }              
}
?>