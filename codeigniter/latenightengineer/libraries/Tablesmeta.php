<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
 *  Interesting class
 *  for mapping form input fields
 *  to tables
 *  for automatic form generation
 *  also handles validation
 *  so that we cannot screw up the DB
**/
define('CONTROLSDIR','../CodeIgniter/data/components/');
define('CONTROLSSUFFIX','_meta.yml');
class Tablesmeta {

    var $raw_field_spec='';             //raw field_spec as per Mysql
    var $meta_field_spec='';            //with meta data for forms etc

    var $meta_array='';                       //    holds data for all tables in
    
    var $table_name='';

    var $fields_help='';                      //    holds help for fields
    
    
    //hard-coded options can
    //all be changed programmatically
    var $map=array('string'=>array(),          //   all varchars default to input type="text"
                   'text'=>array(
                               'input'=>'textarea_input',
                               'cols'=>'80'
                                ),
                   'longtext'=>array(
                               'input'=>'textarea_input',
                               'cols'=>'80'
                                ),             //   text - > textarea
                   'blob'=>array('input'=>'textarea_input',
                                'cols'=>'80'
                                ),
                   'tinyblob'=>array('input'=>'textarea_input',
                                'cols'=>'80'
                                ),                                 //   blob - > text area
                   'boolean'=>array(
                               'input'=>'boolean_input',
                               'true' => 'Y|T|1',
                               'false' => 'N|F|0'),
                   'tinyint'=>array(
                                'input'=>'int_input',
                                'size'=>4,
                                'max_length'=>'',
                                'min_value'=>-127,
                                'max_value'=>+255,
                                'length'=>'required|min_length[%s]|max_length[%s]',
                                ),
                   'int'=>array(
                               'input'=>'int_input',
                               'size'=>6,
                               'max_length'=>'32000',
                               'min_value' =>0,
                               'max_value' =>65535,
                               'length'=>'required|min_length[%s]|max_length[%s]',
                                ),
                   'smallint'=>array(
                                'input'=>'int_input',
                                'size'=>4,
                                'max_length'=>'',
                                'min_value'=>-32767,
                                'max_value'=>+65535,
                                'length'=>'required|min_length[%s]|max_length[%s]',
                                ),
                   'mediumint'=>array(
                                'input'=>'int_input',
                                'size'=>4,
                                'max_length'=>'',
                                'min_value'=>-32767,
                                'max_value'=>+65535,
                                'length'=>'required|min_length[%s]|max_length[%s]',
                                ),
                   'bigint'=>array(
                                'input'=>'int_input',
                                'size'=>4,
                                'max_length'=>'',
                                'min_value'=>-32767,
                                'max_value'=>+65535,
                                'length'=>'required|min_length[%s]|max_length[%s]',
                                ),
                    'year'=>array(
                               'input'=>'datepicker',
                               'size'=>6,
                               'max_length'=>'32000',
                               'min_value' =>0,
                               'max_value' =>65535,
                               'length'=>'required|min_length[%s]|max_length[%s]',
                                ),
                                   //   special - > text input with integer mask
                     'date'=>array(
                               'input'=>'datepicker',
                               'size'=>6,
                               'max_length'=>'32000',
                               'min_value' =>0,
                               'max_value' =>65535,
                               'length'=>'required|min_length[%s]|max_length[%s]',
                                ),
                   'real'=>array(
                               'input'=>'text_input',
                               'size'=>6,
                               'max_length'=>'32000',
                               'min_value' =>0,
                               'max_value' =>65535,
                               'length'=>'required|min_length[%s]|max_length[%s]',
                                ),
                    'decimal'=>array(
                               'input'=>'text_input',
                               'size'=>6,
                               'max_length'=>'32000',
                               'min_value' =>0,
                               'max_value' =>65535,
                               'length'=>'required|min_length[%s]|max_length[%s]',
                                ),                                //   defaults to decimal two places
                   'timestamp'=>array(
                               'input'=>'datepicker',
                               'size'=>6,
                               'max_length'=>'32000',
                               'min_value' =>0,
                               'max_value' =>65535,
                               'length'=>'required|min_length[%s]|max_length[%s]',
                                ),     //   datepicker control, defaults to input text
                   'byte'=>'byte',                 //   type byte
                   'char'=>array(
                                'input'=>'text_input',
                                'size'=>'40'
                                ),             //   input type text
                 
                   'datetime'=>array(
                               'input'=>'datepicker',
                               'size'=>6,
                               'max_length'=>'32000',
                               'min_value' =>0,
                               'max_value' =>65535,
                               'length'=>'required|min_length[%s]|max_length[%s]',
                                ),
                   'varchar'=>array(
                                'input'=>'text_input',
                                'size'=>'80'
                                ) ,
                   'string'=>array(
                                'input'=>'text_input',
                                'size'=>'80'
                                ),
                   'char'=>array(
                                'input'=>'text_input',
                                'size'=>'40'
                                ),
                   'set'=> array(
                                'input'=>'option_input',
                                'size'=>'80'
                                )
    );

    //common fieldnames
    // the system will attempt to add
    // validation rules automatically
    // for these
    var $common_fieldnames=array(
                  'email',
                  'pswd',
                  'password',
                  'country',
                  'phone',
                  'zip',
                  'comment');

    // holds a set of validation rules
    // as CI validation rules

    var $rules=array('required',
                     'matches',
                     'min_length'=>'required|min_length[%s]',
                     'max_length'=>'max_length[%s] ;',
                     'length'=>'required|min_length[%s]|max_length[%s]',
                     'exact_length'=>'exact_length[%s]',
                     'alpha'=>'required|alpha',
                     'alpha_numeric',
                     'alpha_dash'=>'required|alpha_dash',
                     'numeric',
                     'int'=>'required|integer',
                     'is_natural',
                     'is_natural_no_zero',
                     'valid_email',
                     'valid_emails',
                     'valid_ip',
                     'valid_base64'

    );



    // member variables
    var $checkPrimaryKey;           // yes/no switch
    var $dbname;                    // database name
    var $child_relations = array();     // child relationship specifications (optional)
    var $errors = array();          // array of errors
    var $expanded;                  // list of tree nodes which have been expanded
    var $fieldarray;                // array of row/field data
    var $fieldspec = array();       // field specifications (see class constructor)
    var $inner_table;                   // used in an outer-link-inner relationship
    var $is_link_table = FALSE;         // used in method sqlAssemble (many-link-many relationship)
    var $lastpage;                  // last available page number in current query
    var $lookup_data = array();     // array of lookup data (for dropdowns, radio groups)
    var $message;                   // array of messages
    var $numrows;                   // number of rows retrieved
    var $outer_table;                   // used in an outer-link-inner relationship
    var $pageno;                    // requested page number
    var $parent_relations = array();    // parent relationship specifications (optional)
    var $primary_key = array();         // column(s) which form the primary key
    var $rows_per_page;             // page size for multi-row forms
    var $skip_validation;           // yes/no switch
    var $tablename;                 // table name (internal)
    var $unique_keys = array();         // unique key specifications (optional)
    var $updatearray;               // array that will be passed to the database for updating
    var $xref_item;                 // used in getData() in many-to-many relationships
    var $xsl_params = array();          // optional parameters to be pased to XSL transformation

    // this defines the default database engine (may be changed in sub-classes)
    var $dbms_engine = 'mysql';

    // the following are used to construct an SQL query
    var $where;                     // passed from parent form
    var $sql_select;
    var $sql_from;
    var $sql_where;                 // additional selection criteria
    var $sql_groupby;
    var $sql_having;
    var $sql_orderby;
    var $sql_orderby_seq;           // 'asc' or 'desc'
    var $default_orderby;           // default, may be overridden by $sql_orderby
    var $sql_search;                // optional search criteria from a search screen
    var $sql_search_table;          // tablename qualifier for optional search criteria



    function _construct()
    {

        // Instantiate the CI libraries so we can work with them
        $CI =& get_instance();

        $CI->load_helper('form');
        $CI->load->model('generic/generic');
        $CI->load->helper('inflector');
        $CI->load->library('spyc');
        // Load validation library if necessary.
        // This will also automatically load the CI form helper.
        if (!isset($CI->form_validation)) {
            $CI->load->library('form_validation');
        }
        //   $this->ci =& get_instance();
        //  parent::_construct;
        log_message('debug', 'Tablesmeta initiated');
        init();

        $this->tablename       = 'default';
        $this->dbname          = 'default';
        // call this method to get original field specifications
        // (note that they may be modified at runtime)
        $this->fieldspec = $this->getFieldSpec_original();
    }


    function init()
    {

        // Globalize $CI super object so we can use CI libaries like validation

    }

    // this is the main function
    // it populates the table meta array
    // with default data

    function main($dbname,$table_name){
        // get the field data specific for MySQl
        // CI has problems here
        // cannot give for example the auto_increment
        // or the default value

        //$fields=$this->table_fields($dbname,$table_name);
        // call the meta data for the table
        // automatically set date to be datepicker etc
       // $table_meta_data=$this->default_meta($fields->name);
       // $this->table_meta=$table_meta_data;
       // save to Yaml
       // $this->save_to_Yaml($table_meta_data,$table_name.'_meta.yml');
        $table_meta_data=$this->read_from_Yaml($table_name.CONTROLSSUFFIX);
        if (!$table_meta_data)
        {
          $fields=$this->table_fields($dbname,$table_name);
          $table_meta_data=$this->default_meta($fields->name);
          $this->save_to_Yaml($table_meta_data,$table_name.CONTROLSSUFFIX);
          return($table_meta_data);
        }
        else
        {
          
          return($table_meta_data);
        }
    }

    //  ------------------------------------------------------------

    function save_to_Yaml($data,$file_name){

        $CI=&get_instance();
        $CI->load->helper('file');
        $CI->load->library('spyc');
        $data = $CI->spyc->YAMLDump($data);
       // echo_array($data);
        
        if ( ! write_file(CONTROLSDIR.$file_name, $data))
        {
            return false;
        }
        else
        {
           // echo 'File written!';
        }

    }

    function read_from_Yaml($file_name){
        $CI=&get_instance();
        $CI->load->helper('file');
        $CI->load->library('spyc');
        //$data=read_file('./CodeIgniter/data/'.'table_meta_01.yml');
       
       if ( ! $data=read_file(CONTROLSDIR.$file_name))
        {
            return false;
        }
        else
        {
            $table_meta=$this->yaml_file_to_array($data);
            //echo 'File read!';
        }
        // echo_array($data);break;
       return $table_meta;
    }

    function to_YAML($v){

        $CI =& get_instance();
        $CI->load->library('spyc');
        $array = $CI->spyc->YAMLDump($v);
        return $array;
    }
    // table_fields
    /*[id] => Array
                (
                    [name] => id
                    [type] => int(11)
                    [null] => NO
                    [key] => PRI
                    [default] =>
                    [extra] => auto_increment
     * This is the Field Spec
     */

     function yaml_file_to_array($file_name){
         $CI =& get_instance();
         $CI->load->library('spyc');
         $array = $CI->spyc->YAMLLoad('../CodeIgniter/data/components'.$file_name);
         //echo_array($array);break;
         return $array;
     }
    function table_fields($dbname='photo_ikons',$table_name='ci_sessions')
    {
        $CI =& get_instance();
        $CI->load->model('generic/generic');
        $CI->generic->init($dbname,$table_name);
        $CI->load->helper('inflector');

        // the field spec contains
        // arrays with the field spec as returned
        // by the DB
        $field_spec=$CI->generic->__list_fields_data($dbname,$table_name);
        //echo_array($field_spec);exit;
        // set the variable
        $this->set_raw_field_spec($field_spec);
        return $field_spec;
    }
    //-------------------------------------------------

    function set_raw_field_spec($fieldspec){
        $this->raw_field_spec=$fieldspec;
    }

    function get_raw_field_spec(){
        return $this->raw_field_spec;
    }

    // utility function to check if a field
    // is a key
    // input is an array
    /*[id] => Array
                (
                    [name] => id
                    [type] => int(11)
                    [null] => NO
                    [key] => PRI
                    [default] =>
                    [extra] => auto_increment
    */
    function is_key($field_spec_array)
    {
        $primary_key=false;
        //echo_array($field_spec_array);
        if (array_key_exists('key',$field_spec_array))
        {

            if ($field_spec_array['key']=='PRI'){
                $primary_key=array('name'=>$field_spec_array['name'],
                                   'auto_increment'=>NULL
                );
            }
            else
            {
                $primary_key=false;
            }
            if ((isset($primary_key))&& ($field_spec_array['extra']=='auto_increment'))
            {
                $auto_increment=true;
                $primary_key['auto_increment']=true;
            }
            else
            {
                $auto_increment=false;
                return false;
            }

        }
        return $primary_key;
    }

    //internal called by standard mapping
  function merge_with_map($obj,$key='')
  {
        $map=$this->map;
        //$key=$obj['type'];
        $obj=array_merge($obj,$map[$key]);
        return $obj;
  }



    //---------------------------------------------------------

    // maps standard field_spec keys into
    // array
    // all values are from table spec
    /*
     [name] => id
                    [type] => int(11)
                    [null] => NO
                    [key] => PRI
                    [default] =>
                    [extra] => auto_increment
     *
     */
    function standard_mapping($obj)
    {
      
       $map=$this->map;

       // check if type exists i.e, datetime
       if (((array_key_exists($obj['type'],$map))
               &&(is_array($map[$obj['type']]))))
        {
          $obj=$this->merge_with_map($obj,$obj['type']);
         // echo $obj['type'];
        }
        //if not found has bracket int(80)
        else
        {
        $find=preg_match('/(char|set|int|varchar|blob|timestamp|text|tinyint|smallint|mediumint|bigint|year|decimal)\((.*)\)/isx',
            $obj['type'],$values);
        
        //if property is found
        if ($find>0){
                //if in map put into $obj
                //$z=$this->map[$values[1]];
                // echo_array($obj['type']);
                $obj['type']=$values[1];
                $obj['max_length']=$values[2];

                if(is_array($this->map[$values[1]])) {

               // echo_array($obj);
                $obj=$this->merge_with_map($obj,$values[1]);
               // echo_array($obj);
                }
            }
        }

        //  by this time we have all
        //  of the array values set
        //  add a couple for presentation
        //  and custom rules

        $t[$obj['name']]=array(
                    'name'=>$obj,
                    //'input'=>$obj['input'],
                    'human_name'=>humanize($obj['name']),
                    'before'=>'',
                    'after'=>'',
                    'rules' =>array(),
                   //  attributes for forms
                    'attributes' => array(
                        'name'        => $obj['name'],
                        'id'          => $obj['name'],
                        'class'       => 'stdINPUT',
                        'value'       => $obj['name'],
                        'title'       => $obj['name'].','.$obj['name'].','.$obj['extra'],
                        'alt'         => $obj['name'],
                        'style'       => '',
                        'hidden'      =>false

             ),
        );
        //echo_array($t);
        //exit;
        return $t;
    }



    // field mapping is held in an array of
    // field  field_friendly_name   field_input   field_validation_rules  field_display_rules_css?
    // user   user screen name      text          char(40)                class="varchar"
    // if a user file exists in yaml this will
    // read it and amend it
    // at any time every table has a
    // data dictionary defined in yaml
    // this data dictionary also holds more information for display etc
   /*    [numcode] => Array
        (
            [type] => int_input
            [input] => text_input
            [key] => Array()       OR false
            [name] => numcode
            [max_length] => 80
            [human_name] => Numcode
            [attributes] => Array
                (
                    [name] => numcode
    *               [class]=> class
                    [id] => numcode
                    [value] =>
                    [maxlength] => 80
                    [title] => numcode,int_input, , 6 PREG
                )

        )
    */

    function default_meta($fields){

        $out='';

        foreach ($fields as $obj){
            //echo_array($obj);
            $out=$this->standard_mapping($obj);
            //echo_array($z);exit;
            // first check to see if there is a key
            $key=$this->is_key($obj);
            if (isset($key)){
                $value=$key;
            }
            else
            {
                $value=NULL;
            }

            $out[$obj['name']]['key']=$key;
            //$out[$obj['name']]['input']='text_input';
            //up the field count
            $t[]=$out;

        }

        //set var
        $this->set_meta_field_spec($t);

        //echo_array($out);//exit;
        //echo_array($t);//exit;
        return $t;
    }


    function set_meta_field_spec($t){

        $this->meta_field_spec=$t;

    }

    function default_templates(){

        //   short name
        $t=$this->table_name;

        //   map default templates

        $templates[$t.'_default_edit']=$t.'_edit_view';
        $templates[$t.'_default_browse']=$t.'_browse_view';
        $templates[$t.'_default_delete']=$t.'_delete_view';

        return $templates;
    }

    //serializes the array and stores in file
    // filename=tablename_schema_serialized
    function serialize($array){
        serialize($array);
        //file_put_contents();
    }
    function deserialize($array){
        //gets from file if exists
    }

    function getFieldSpec_original ()
    // set and return the original specifications for this database table
    // (before being possibly amended at runtime)
    // based on Tony's
    {
        // create an array of field names, each with its own array of properties
        $fieldspec['fieldname'] = array('keyword' => 'value');

        // example specifications are as follows:
        $fieldspec['field1'] = array('type' => 'string');
        $fieldspec['field2'] = array('type' => 'date');
        $fieldspec['field3'] = array('type' => 'time');
        $fieldspec['field4'] = array('type' => 'datetime');
        $fieldspec['field5'] = array('type' => 'enum');
        $fieldspec['field6'] = array('type' => 'boolean',
                                     'true' => 'Y|T|1',
                                     'false' => 'N|F|0');
        $fieldspec['field7'] = array('type' => 'int1|tinyint|int2|smallint|int3|mediumint|int4|integer|int8|bigint|int');
        $fieldspec['field5'] = array('type' => 'numeric|decimal',
                                     'precision' => 10,
                                     'scale' => 2); // optional, default is 0
        // the following settings are optional for all fields:
        // 'size' => 12            - sets size of HTML control
        // 'required' = 'y'        - will cause an empty field to be rejected
        // 'pkey' => 'y'           - indicates a primary key field
        // 'noedit' => 'y'         - make the field non-editable
        // 'nodisplay' => 'y'      - do not display the field

        // the following settings are optional for string fields:
        // 'uppercase' => 'y'           - will upshift a text field
        // 'lowercase' => 'y'           - will downshift a text field
        // 'password' => 'y'            - sets HTML type to 'password'
        // 'hash' => 'md5|sha1|custom'  - defines type of encryption (optional)
        // 'subtype' => 'filename'      - must be a valid filename

        // the following settings are optional for numeric fields:
        // 'unsigned' => 'y'       - will reject negative values
        // 'minvalue' => 10        - defines a minimum acceptable value
        // 'maxvalue' => 99        - defines a maximum acceptable value
        // 'zerofill' => 'y'       - causes leading spaces to be replaced with zeroes

        // the following settings are optional for date fields:
        // 'infinityisnull' => 'y' - shows blank to the user, but sets database value to '9999-12-31'

        // the following will specify which HTML control to use (default is 'text'):
        // 'control' => 'dropdown'       - will create a dropdown list
        // 'control' => 'radiogroup'     - will create a radiogroup
        // 'optionlist' => '<listname>'  - required for dropdowns and radiogroups
        // 'align' => 'h|v'              - alignment for radiogroups: horizotal or vertical (default is horizontal)
        // 'control' => 'multiline'      - creates a multiline text box
        // 'cols' => 50                  - defines number of columns for a multiline text box
        // 'rows' => 5                   - defines number of rows for a multiline text box
        // 'control' => 'popup'          - a picklist from another screen, not a dropdown
        // 'foreignfield' => '<name>'    - field to be displayed from foreign table
        // 'popupname' => '<name>'       - name of screen to call
        // 'control' => 'filepicker'     - a picklist of file names
        // 'filepicker' => '<name>'      - name of screen to call
        // 'image' => 'y'                - identifies this field as an image
        // 'imagewidth' => 16            - image width
        // 'imageheight' => 16           - image height

        // primary key details (a single array of filed names
        $primary_key                            = array('fieldname1');

        // unique/candidate key details (optional)
        // each unique key may contain one or more fields
        $unique_keys[]                          = array('fieldname1', 'fieldname2');

        // array of optional child relationships (where this table is the parent)
        // 'type' indicates tyhe type of delete constraint (where 'cascade' is the same as 'delete')
        $child_relations[]                      = array('child' => 'tablename',
                                                        'type' => 'nullify/cascade/delete/restricted',
                                                        'fields' => array('parent_id' => 'child_id'));

        // array of optional parent relationships (where this table is the child)
        $parent_relations[]                     = array('parent' => 'tablename',
                                                        'parent_field' => 'fieldname',
                                                        'fields' => array('child_id' => 'parent_id'));

        // copy into member variables
        $this->primary_key      = $primary_key;
        $this->unique_keys      = $unique_keys;
        $this->child_relations  = $child_relations;
        $this->parent_relations = $parent_relations;

        return $fieldspec;

    } // getFieldSpec_original

    //-------------------


}

// end of class