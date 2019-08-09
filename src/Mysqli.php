<?php
namespace Nasirgolflan\Database;


class Mysqli {
    
    public $active_group = 'local';
    public $hostname = 'localhost';
    public $username = 'root';
    public $password = '';
    public $database = 'default';
    public $dbprefix = '';
    protected $link;
    protected $db;

    public static function test(){
        return "static function";
    }
    
    function __construct($config=null){
        if($config){
            
            $active_group=isset($config['active_group']) ? $config['active_group'] : $this->active_group;
            $hostname=isset($config['hostname']) ? $config['hostname'] : $this->hostname;
            $username=isset($config['username']) ? $config['username'] : $this->username;
            $password=isset($config['password']) ? $config['password'] : $this->password;
            $database=isset($config['database']) ? $config['database'] : $this->database;
            $dbprefix=isset($config['dbprefix']) ? $config['dbprefix'] : $this->dbprefix;

            $this->db[$active_group]=[
                'dsn'   => '',
                'hostname' => $hostname,
                'username' => $username,		
                'password' => $password,			
                'database' => $database,
                'dbprefix' => $dbprefix,
            ];
        
        }
       
    
    $this->link = mysqli_connect($this->db[$this->active_group]['hostname'], $this->db[$this->active_group]['username'], $this->db[$this->active_group]['password'],$this->db[$this->active_group]['database']);
    }
    
	function query($query){
        $result=mysqli_query($this->link,$query);
        return ($result) ? $result : 0;
    }
    
    function result($result){ 
        $res=array();
        while ($row = $result->fetch_assoc()) {
            $res[]=$row;
        }
        return $res;
    }
	
    function con(){
        if (!$this->link) {
            die('Could not connect: ' . mysqli_error());
            }
            echo 'Connected successfully';
    }
	
	
	function update($t,$w,$data){ 
        $q2='';foreach($data as $k=>$v){ $q2.=$k.'= "'.$v.'" ';}$q2=rtrim($q2," ,");
        $query= "UPDATE $t SET $q2 WHERE $t.$w";
        $this->query($query);
        return true;
	}
    
    /**
     * Delete Quiery
     * Input:
     */
    function delete($table,$del,$andor='and'){
        $q2='';foreach($del as $k=>$v){ $q2.=$k.'= "'.$v.'" '.$andor.' ';}$q2=rtrim($q2," $andor");
        $query="DELETE FROM `$table` WHERE $q2";
        $this->query($query);
        return true;
    }
    /**
     * 
     */
function install(){
   
    $q[]="CREATE TABLE IF NOT EXISTS `blacklist` (`id` int(11) NOT NULL AUTO_INCREMENT,`email` varchar(70) NOT NULL,
        PRIMARY KEY (`id`)) ENGINE=InnoDB DEFAULT CHARSET=latin1";
    $q[]="create VIEW IF NOT EXISTS `fresh_list` AS SELECT `contact`.`id` AS `id`, `contact`.`name` AS `name`, `contact`.`email` AS `email`, `contact`.`phone` AS `phone`, `contact`.`country` AS `country` FROM `contact` WHERE ( ( NOT( `contact`.`email` IN( SELECT `log`.`email` FROM `log` ) ) ) AND( NOT( `contact`.`email` IN( SELECT `blacklist`.`email` FROM `blacklist` ) ) ) )";
    foreach($q as $v){
        $this->query($v);
    }
}

/**
 * Uncomplite Future update soon
 */
function find_insert($table_name,$key,$val){
		$query="INSERT INTO `$table_name` (`name`) 
SELECT 'id' 
FROM $table_name
WHERE NOT EXISTS (SELECT id FROM `$table_name` WHERE `$key`='$val') 
LIMIT 1;
select id from $table_name where `name`='$val'";
}

/***
 * INPUT Tablename with array[insert data]
 */
function insert($table_name,$data){
    $keys='';
    $values='';
    foreach($data as $k=>$v){
        $keys.='`'.$k.'`,';
        $values.="'".$v."',";
    }
    $keys=rtrim($keys,',');
    $values=rtrim($values,',');
        $query= "INSERT INTO `{$table_name}` ({$keys}) VALUES ({$values})";
        $this->query($query);
}
    function __destruct(){
        mysqli_close($this->link);
    }
}


//print_r($obj->migration());
//$obj->update('city','id=7',['name'=>'Noida']);
//$obj->insert('city',['name'=>'rajsthan','state_id'=>1]);
//$obj->delete('city',['name'=>'rajsthan','state_id'=>1],'and/or/');
