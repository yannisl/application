
<?php

//class to control forms for capturing stamps and sets
//in catalogue

class Catalogue extends Controller {

 
 var $country='';
 var $table_name='sets';
 var $fields_data='';
 var $database_name='';
 var $db_data='';
 var $a='';
 var $convention=array();
 var $POST;
 var $is_POST;

 /* Construct the class and load some
    helpers and classes
    check if there is post info
 */
 
 
 function __construct()
  {
    parent::Controller();
      //loads helper classes
    $this->load->helper(array('form', 'url','html'));
    //load validation library
    $this->load->library('validation');
    // redirect('catalogue/greece/');
    $this->load->model('model_sets');
    //snoop what fields are in and what types
    //default is not being returned
    $this->fields_data = $this->db->field_data($this->table_name);
    self::_get_post_data();
    
        
  }
       
  function _get_post_data(){
   echo 'IN TEST ';
   if (isset($_POST) && !empty($_POST)) 
    {
      foreach ($this->fields_data as $field){
       $this->POST[$field->name]=$_POST[$field->name];
      } 
      $this->is_POST=true;
      echo 'IN CONSTRUCT';
      echo_array($this->POST);
    } 
    else
    {
      $this->this_POST=false;
    
    }
   
   
  }
 
       
  function main(){
  //creates a new catalogue
  //edits an existing
  //deletes a catalogue
  $data='';
  $table_name='';
  $this->load->view('admin/admin_catalogue_main_view',$data);
    
  }

	
 function _table_defaults(){
	
	 foreach ($this->fields_data as $field)
    {
        $data[$field->name]='';
   
    } 
		return $data;
	}
	
	
	/*
	Main function for sets database
	*/
	function sets($set_country='Albania',$set_id=0)
	{
    //short names
     
		  
     //table defaults
     if (!$this->is_POST)
     {
	     $data=$this->_table_defaults();
	     $set=$data;
	     $data['set_country']=$set_country;
       $data['set_id']='AUTO';
	   } 
	   else
	   {
      $data=$this->POST;
      $set=$data;
      $data['set_id']=$this->db->insert_id();
      $data['set_country']=$set_country;
      echo 'THERE IS POST';
      echo_array($this->POST);
      echo_array($data);
      
     }
     
	   
	   
 	
		
		
		 	
		  //update database and go
		  	 
		  
		  
    /*  foreach ($this->fields_data as $field)
      {
               
        //must not be primary otherwise database complaints
        // field name must exist as a field in post
       if ((!($field->primary_key) && (isset($data[$field->name]))))
       {
        $set[$field->name]=$data[$field->name];
        
       }
      }
		  */
		  
		             
		  //$this->model_sets->fields_to_update=$set;
		  //$this->model_sets->where=$set_id;
		  $set['set_id']='';
		  $this->model_sets->fields_to_update=$set;
		  //if (!$this->_save($set_id , 'Zanzir' , 'test')){
		  //unset($set['set_id']);
		 
		  echo_array($set);
		  
		  $this->model_sets->insert_entry();
		  //echo $this->db->insert_id();
		  
		  // Reads the last auto to echo to template
		  
		  
		  //} 
		  
		   $data['set_id']=$this->db->insert_id();
		   
	     $data['title']='Stamps Data Base';
	     $data['success']=" ";
     
		  //tell the user that we came this far and there were no problems
		  //its a long way baby!
		  $data['success']='<span style="color:#dd0000">The Form has been successfully submitted</span>';
		 	$this->load->view('admin/admin_stamp_catalogue_view',$data);
		
	}
	
	
		
	
}
?>

