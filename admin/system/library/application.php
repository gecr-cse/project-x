<?php
error_reporting(E_ALL);
header("Cache-Control: private, must-revalidate, max-age=0");
header("Pragma: no-cache");
header("Expires: Fri, 4 Jun 2010 12:00:00 GMT");
// Related class file included here.
include_once "includes.php";
$objApp = new Application();
$common=new Common();
session_start();
//$secure_login=new secureLogin();
$role=new Role();

/*
$login_status=$secure_login->check_login();

if(!$login_status){

}else{
    $privileges=$role->getRolePerms($_SESSION['ADMIN_USER_ROLE']);
}
*/
//$msg=new Messages();
class Application {
    /* CONSTRUCTOR FUNCTION */

    function __construct() {

        $this->setHeaderVales();
        // Get the Database Connection Values
        $arrDBParams = @CONFIG::dbValues();
        // CREATE OBJECT FOR DB CONNECTION
        $this->db=new DbConnection();
        $this->dbConnect=$this->db->dbConnect($arrDBParams['HOST'], $arrDBParams['USERNAME'],$arrDBParams['PASSWORD'],$arrDBParams['DATABASE']);


       // $this->acl();
    }

    /*
      This function is used to set Initial header.
     */

    function setHeaderVales() {
        header("Cache-control: no-cache");
        ob_start();
        date_default_timezone_set('Asia/Calcutta');
        // We need to set the ini Confiuration settings Here
        ini_set("session.gc_maxlifetime", "14400");
    }

    function acl() {

        $currentPage = $_SERVER["SCRIPT_NAME"];
        $url = ADMIN_BASE_URL . 'index.php';
        if (empty($_SESSION['ADMIN_USER_SESSION']) && empty($_SESSION['ADMIN_USER_SESSION'])) {
            if ($currentPage != '/cg-current/index.php') {
                header('location:' . $url);
            }
        }
    }

    function executeQuery($sql) {
        $response = array();
        $result = mysqli_query($this->dbConnect,$sql);
        if ($result) {
            while ($row = mysqli_fetch_assoc($result)) {
                array_push($response, $row);
            }
        }else{
            $response=0;
        }
        //echo mysqli_error($this->dbConnect);
        return $response;
    }

    function updateQuery($sql,$lastInsert=false) {
        $response =0;
        $result = mysqli_query($this->dbConnect,$sql);
        if ($result) {
            if($lastInsert==true){
                $response=mysqli_insert_id($this->dbConnect);
            }else{
                $response=1;
            }
        }else{
            $response=0;
        }
        return $response;
    }

    function prepareInsert($table,$data){
        $sql="INSERT INTO `$table` ";
        $keys="";
        $values="";
        foreach($data as $key=>$value){
            if(is_array($value)){
                $values.='(';
                foreach($value as $k=>$v){
                    $keys.="`".$k."`,";
                }
                break;
            }else{
                $keys.="`".$key."`,";
            }
        }
        $keys=rtrim($keys,",");
        $single_record="";
        $multi_values="";
        foreach($data as $key=>$value){
            if(is_array($value)){
                $multi_values.='(';
                $multi="";
                foreach($value as $k=>$v){
                    $multi.="'".addslashes($v)."',";
                }

                $multi_values.=rtrim($multi,",").'),';
            }else{
                $single_record.="'".addslashes($value)."',";
            }
        }
        if($multi_values!=""){
            $values=rtrim($multi_values,",")."";
        }else{
            $values="(".rtrim($single_record,",").")";
        }

        return $sql."(".$keys.") VALUES ".$values.";";
    }

    function prepareTable($table){
        $tables="";
        if(is_array($table)){
            foreach($table as $table_list){
                $tables.="`".$table_list."`,";
            }
        }else{
            $tables.="`".$table."`";
        }
        return $tables;
    }

    /* THIS FUNCTION CHECKS IT IS A TABLE OR A VALUE
       IF IT IS TABLE WILL RETURN TABLE STRUCTURE
    */
    function checkTable($type,$value){
        $newValue="";

        if($type=="value"){
            if(strpos($value,'`')!==false){
                $newValue=$value;
            }else{
                $newValue='"'.$value.'"';
            }
        }else if($type=="from"){
            // ` need to do for standards
            if(is_array($value)){
                foreach($value as $table_list){
                    $newValue.="".$table_list.",";
                }
            }else{
                $newValue.="".$value."";
            }
        }

        return $newValue;
    }
    function prepareSearch($table,$where=array(),$select=array(),$order=array(),$page=0,$limit=0){
        $condition="";
        $selection="";
        $order_by_sql="";
        $page_sql="";
        $limit_sql="";
        $tables=$this->checkTable("from",$table);
        $tables=rtrim($tables,",");
        if(count($select)==0){
            $selection="*";
        }else{
            foreach($select as $sel)
                $selection.=$sel.",";
            $selection=rtrim($selection,",");
        }
        if(count($where)==0){
            $condition="";
        }else{
            $condition.="WHERE ";
            $operator="AND";
            foreach($where as $key=>$value){
                $condition_check=explode(" ",$key);
                if (strpos($value,' OR') !== false) {
                    $operator_check=explode(" OR",$value);
                    if(count($operator_check)>1){$value=$operator_check[0];$operator='OR';}
                }

                if(count($condition_check)==1)
                    $condition.=' '.$key.' LIKE "'.$value.'" '.$operator;
                else{
                    $condition.=' '.$condition_check[0].' '.$condition_check[1].' '.$this->checkTable("value",$value).' '.$operator;
                }
            }
            $condition=rtrim($condition,"AND");
            $condition=rtrim($condition,"OR");
        }

        if(count($order)==0){
            $order_by_sql="";
        }else{
            $order_by_sql=' ORDER BY ';
            foreach($order as $ordKey=>$ord){
                $order_by_sql.='`'.$ord.'`,';
            }
            
            $order_by_sql=rtrim($order_by_sql,',')." ".$ordKey;
        }

        if($limit==0){
            $limit_sql="";
        }else{
            $page=$page*$limit;
            $limit_sql=" LIMIT ".$page.", ".$limit;
        }
        $sql="SELECT $selection FROM ".$tables." $condition $order_by_sql $limit_sql";
        
        return $sql;
    }


    function prepareUpdate($table,$data,$where=array()){
        $sql="UPDATE `$table` SET ";
        $i=0;
        $update_query="";
        $update_where='';
        foreach($data as $key=>$value){
            $update_query.='`'.$key.'`="'.$value.'" ,';
        }
        // NEED TO MAKE THIS UNIVERSAL
        foreach($where as $key=>$value){
            $update_where.='WHERE `'.$key.'` = "'.$value.'"';
        }


        return $sql.rtrim($update_query,",").$update_where;
    }
}

// Initialise the Application Object

?>