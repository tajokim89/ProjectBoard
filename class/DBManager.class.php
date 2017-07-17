<?php
require_once CLASS_PATH.'Common.class.php';
require_once CONFIG_PATH.'db.config.php';
$Common = new Common();

class DBManager {
    var $str_database;
    var $str_user;
    var $str_password;
    var $conn;

    function __construct($db_type = 'master') {
        global $arr_db_config;
        $arr_db_info = $arr_db_config[$db_type];
        $this->str_database = $arr_db_info['db'];
        $this->str_user     = $arr_db_info['user'];
        $this->str_password = $arr_db_info['pwd'];
    }

    function __destruct (){
        mysqli_close($this->conn);
    }

    public function connect() {
        $this->conn = mysqli_connect('localhost', $this->str_user, $this->str_password, $this->str_database);
        if(mysqli_connect_error()){
            die('Connection Error ('.mysqli_connect_errno().')'.mysqli_connect_error());
        }
    }

    public function close() {
        mysqli_close($this->conn);
    }

    public function query($str_query, $b_row = true, $str_type = 'array') {
        $rst_query = mysqli_query($this->conn, $str_query);
        if($rst_query === false) {
            return false;
        }
        $result = null;

        switch($str_type) {
            case 'object':
                while($row = mysqli_fetch_object($rst_query)) {
                    $result[] = $row;
                }
            break;

            case 'array':
            default:
               while($row = mysqli_fetch_assoc($rst_query)) {
                    $result[] = $row;
                }

           break;
        }

        if($b_row === true && count($result) == 1) {
            $result = $result[0];
        }
        return $result;
    }

    public function get_count($str_table, $str_where = '') {
        $str_query = "SELECT COUNT(*) as count FROM {$str_table}";
        if(!empty($str_where)) {
            $str_query .= " WHERE {$str_where}";
        }

        $arr_result = $this->query($str_query);
        return $arr_result['count'];


    }


}

?>