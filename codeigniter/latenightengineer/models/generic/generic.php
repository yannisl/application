<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/** The Model for generic function
 *  A bit more than the standard dbase function
 */

class Generic extends Model 
{

    var $dbname='';        //the dbname
    var $table_name='';    //the table name
    var $index='';         //index
    var $fields='';        //fields
    var $record_number=''; //record numbers
    var $message='';       //messages for errors etc


    private $tmpl = array ( 'row_alt_start'  => '<tr style="background-color:#eee">' ,
                'heading_cell_start'   => '<td style="background-color:#222;color:#fff">',
    );
    private $tmpl_normal = array ( 'row_alt_start'  => '<tr style="background-color:inherit">' ,
                'heading_cell_start'   => '<td style="background-color:#bbb;color:#fff">',
    );

    function Generic()
    {
        parent::Model();
        // Other stuff
        //$this->_prefix = $this->config->item('DX_table_prefix');
        //$this->_database=$dbname;
        //$this->_table = $table_name;
    }

    function init($dbname,$table_name)
    {
        $this->dbname=$dbname;
        $this->table_name=$table_name;
        $this->__connect($dbname,$table_name);
    }

    function __connect($db_name='WORDPRESS',$table_name='wp_postmeta',$result=''){
        $config['hostname'] = "localhost";
        $config['username'] = "root";
        $config['password'] = "";
        $config['database'] = $db_name;
        $config['dbdriver'] = "mysql";
        $config['dbprefix'] = "";
        $config['pconnect'] = TRUE;
        $config['db_debug'] = TRUE;
        $config['cache_on'] = FALSE;
        $config['cachedir'] = "";
        $config['char_set'] = "utf8";
        $config['dbcollat'] = "utf8_general_ci";
        $DB=$this->load->database($config,TRUE);
        return $DB;
    }

    //  Get the field flags and pace them
    //  in an array uses mysql query as CI
    //  does not return autocincrement field

    function __list_fields_data($dbname,$table_name){
        $DB1=$this->__connect($dbname,$table_name);
       // $fields = $DB1->list_fields($table_name);
        $fields_data = $DB1->field_data($table_name);

        // use sql in order to fetch AUTOINC information
        // as well
        
        $sql = "describe $table_name";
        $result = mysql_query($sql);

        // still looking to find out a way to
        // find if key is foreign

        while($data = mysql_fetch_array($result))
        {
            
            $d->name[$data['Field']]=array('name'=>$data['Field'],
                           'type'=>$data['Type'],
                           'null'=>$data['Null'],
                           'key'=>$data['Key'],
                           'default'=>$data['Default'],
                           'extra'=>$data['Extra']
            );

        }
        
        return($d);
    }

    function _get_primary($fields)
    {

        foreach ($fields->name as $key=>$field){

            if ((isset($field['key']) && ($field['key']=='PRI' )))
            {
                $index=$field['name'];
                return $index;
            }

        }

        return $index;
    }



    function __table_browse($headings,$data)

    {

        $img=array('<input type="checkbox" />',
 '<img src="http://localhost/egypt/CMS/b_edit.png" title="edit" />',
 '<img src="http://localhost/egypt/CMS/b_drop.png" title="delete" />'
        );

        $z=array_values($headings);
        $z=array_merge($img,$z);
        $this->table->set_heading($z);

        $this->table->set_template($this->tmpl);


        $i=0;
        foreach ($data->result() as $row)
        {
            $values='';
            $j=0;
            foreach ($row as $key=>$value){

                if ($j<1){
                    $checkbox_link=sprintf('<a href="http://localhost/CodeIgniter/admin/dbutil/show_record/%s/%s/%s/%s">',
                        $this->dbname,$this->table_name,$key,$value);

                    $delete_link=sprintf('%s/%s/%s/%s',
                        $this->dbname,$this->table_name,$key,$value);

                    $img2=array('<input type="checkbox" />',$checkbox_link
                        .'<img src="http://localhost/egypt/CMS/b_edit.png" title="edit row '.$value.'" /></a>',
 '<a href="http://localhost/CodeIgniter/admin/dbutil/delete_record/'.$delete_link.'"><img src="http://localhost/egypt/CMS/b_drop.png" title="delete" /></a>'
                    );}
                //echo_array($value);

                $values[]=$value;
                $j=$j+1;
            }
            // $values=array_merge($img,$values);
            $this->table->add_row(array_merge($img2,$values));
            $i=$i+1;
        }
        //echo $values;break;
        return $this->table->generate();

    }

    function get_all($dbname,$table_name)
    {
        //$this->__connect($dbname,$table_name);
        $DB3=$this->__connect($dbname,$table_name);
        $query=$DB3->get($table_name);
        //headings for table
        $fields = $DB3->list_fields($table_name);
        //we need to iterate to get all results from all rows
        //important leave in in order to get the rows otherwise it does not make it!
        foreach($query->result() as $row){

        }
        ;
        $table_get_all=$this->__table_browse($fields,$query);
        return $table_get_all;
        //return $query;
    }
    function get_all_array($dbname,$table_name)
    {
        //$this->__connect($dbname,$table_name);
        $DB3=$this->__connect($dbname,$table_name);
        $query=$DB3->get($table_name);
        //headings for table
        $fields = $DB3->list_fields($table_name);
        //we need to iterate to get all results from all rows
        //important leave in in order to get the rows otherwise it does not make it!
        $i=0;$j=0;
        foreach($query->result() as $row){

            foreach($row as $key=>$value){
                $r[$i][$j]=$value;$j++;}
            $i++;
        }

        echo_array($r);break; //echo_array($query);

        return $r;
        //return $query;
    }


    function get_record_by_id($table)
    {
        $this->db->where('id', $table);
        return $this->db->get($this->_table);
    }


    //inserts a record into the db
    //ie create a record is insert a record

    function insert_record()
    {
        $dbname=$this->dbname;
        $DB1=$this->__connect($dbname,$this->table_name);
        $fields_data=$this->__list_fields_data($dbname,$this->table_name);
        // echo_array($fields_data);
        $index=$this->_get_primary($fields_data);
        //echo $index;
        //echo_array($_POST);


        //since we are coming from a form there
        //are $_POST values
        foreach ($fields_data->name as $key=>$value)
        {
            $data[$value['name']]=$_POST[$value['name']];
        }

        //needs checking if a FOREIGN FIELD
        //insert into database
        $this->db->insert($this->table_name, $data);

        $keys=(array_keys($data));
        $values=(array_values($data));

        //prepare some data for the form controls
        //in this case the Tdataset control

        $i=0;
        $num_fields=count($keys);
        for ($i=0;$i<$num_fields;$i++){
            $this->table->add_row($keys[$i],$values[$i]);
        }
        $this->table->set_heading('field','Value');
        $this->table->set_caption('Insert');
        $this->table->set_template($this->tmpl);
        $s=$this->table->generate();
        $s.='<a href="http://localhost/CodeIgniter/admin/dbutil/browse/'.$dbname.'/'.$this->table_name.'">Click to Edit More</a>';
        return $s;
    }


    //deletes a record
    function delete_record($index='',$record_number='')
    {
        $index=$this->uri->segment(6);
        $record_number=$this->uri->segment(7);
        $DB1=$this->__connect($this->dbname,$this->table_name);
        $fields=$this->__list_fields_data($this->dbname,$this->table_name);
        //echo_array($fields);
        $this->db->where($index, $record_number);
        $this->db->delete($this->table_name);
        //$s='<a href="http://localhost/CodeIgniter/admin/dbutil/browse/'.$dbname.'/'.$table_name.'">Click to Delete More</a>';
        $this->message='in delete model';
        return 'in delete model';
    }


}

?>