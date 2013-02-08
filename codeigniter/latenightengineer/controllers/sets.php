
<?php

//class to control forms for capturing stamps and sets
//in catalogue

class Sets extends Controller {

 
 var $country='';
 var $table_name='sets';
 var $fields_data='';
 var $database_name='';
 var $db_data='';
 var $a='';
 var $convention=array();
 var $POST;
 var $is_POST;
 var $primary='';

 /* Construct the class and load some
    helpers and classes
    check if there is post info
    Since this is a generic routine
    you can just rename and everything will
    work for another table based on the
    incoming url and the options
 
 
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
    //Better way to capture fields?
    $query = $this->db->query("SELECT * FROM sets");
    $fields = $query->field_data();
    //echo_array($fields);
    foreach ($fields as $field){
     if ($field->primary_key){
      //echo $field->name;
      //echo $field->type;
      $this->primary=$field->name;
     }
     //echo $this->primary;   
   
    }
     //break;
    $this->fields_data = $this->db->field_data($this->table_name);
    self::_get_post_data();
    
        
  }
  
  //must go into common for models and databases
  //can also go into codeigniter helpers
  //can also sanitise for XSS before placing here
  //for security
       
  function _get_post_data(){
   //echo 'IN TEST ';
   if (isset($_POST) && !empty($_POST)) 
    {
      foreach ($this->fields_data as $field){
       $this->POST[$field->name]=$_POST[$field->name];
      } 
      $this->is_POST=true;
      //echo 'IN CONSTRUCT';
      //echo_array($this->POST);
    } 
    else
    {
      $this->this_POST=false;
    
    }
   
   
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
	function add($set_country='Albania',$set_id=0)
	{
    //short names
     //table defaults
     if (!$this->is_POST)
     {
	     $data=$this->_table_defaults();
	     $set=$data;
	     //$data['set_country']=$set_country;
	     $data['title']='';
       $data['set_id']='AUTO';
       $data['visibility']='show';
       $data['form_visibility']='style="visibility:visible"';
		   $data['message']='<p style="color:blue;text-align:center">Add New Record</p>';
		 	 $this->load->view('admin/admin_stamp_catalogue_view',$data);
	   } 
	   else
	   {
      $data=$this->POST;
      $set=$data;
      $data['set_id']=$this->db->insert_id();
      $data['set_country']=up($set_country);
      //echo 'THERE IS POST';
      //echo_array($this->POST);
      //echo_array($data);
      
     }
     
	 	             
		  //$this->model_sets->fields_to_update=$set;
		  //$this->model_sets->where=$set_id;
		  $set['set_id']='';
		  $this->model_sets->fields_to_update=$set;
		  //if (!$this->_save($set_id , 'Zanzir' , 'test')){
		  //unset($set['set_id']);
		 
		  //echo_array($set);
		  
		  $this->model_sets->insert_entry();
		  $data['set_id']=$this->db->insert_id();
		   
	     $data['title']='Stamps Data Base';
	     $data['success']=" ";
     
		  //tell the user that we came this far and there were no problems
		  //its a long way baby!
		  $data['visibility']='show';
		  $data['form_visibility']='style="visibility:hidden"';
		  $data['message']='<span style="color:#dd0000">The Form has been successfully submitted</span>';
		 	$this->load->view('admin/admin_stamp_catalogue_view',$data);
	}



/*
  function for browsing

*/
  function browse()
  {
   //standard default for browse
    redirect("./admin/dbutil/browse/photo_ikons/sets");
  }	

  function read(){
    redirect("./admin/dbutil/show-record/photo_ikons/sets/admin_db_view");
  
  }
	
	function delete($id='145'){
	 if ($this->db->delete('sets', array('set_id' => $id))){
	 
	  echo ('record deleted');
	    redirect("./admin/dbutil/browse/photo_ikons/sets");
	 ;}
	  
	}

 function country(){
   $data['title']='Country Catalogues';
   $data['visibility']='visible';
   $data['message']='choose country';
   $data['form_visibility']='visible';
   $this->load->view('admin/admin_country_form',$data);
 }
	
}
?>

