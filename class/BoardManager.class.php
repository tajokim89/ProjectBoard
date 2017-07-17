<?php
require_once CLASS_PATH.'DBManager.class.php';
class BoardManager {
    var $obj_bm;
    var $n_limit        = 10;
    var $n_page_scale   = 5;

    function __construct(){
        $this->obj_bm = new DBManager();
        $this->obj_bm->connect();
    }

    public function board_list($n_page = 1) {
        if(!is_numeric($n_page)) {
            return false;
        }

        $n_target   = ($n_page - 1) * $this->n_limit;
        $arr_board  = $this->obj_bm->query("SELECT * FROM board ORDER BY id DESC LIMIT {$n_target}, {$this->n_limit}");
        return $arr_board;
    }

    public function pagination($n_page = 1) {
        if(!is_numeric($n_page)) {
            return false;
        }

        $n_total_cnt    = $this->obj_bm->get_count('board');
        $n_total_page   = ceil($n_total_cnt / $this->n_limit);

        $n_total_block      = ceil($n_total_page / $this->n_page_scale);
        $n_current_block    = ceil($n_page / $this->n_page_scale);
        $n_prev_page        = (($n_current_block - 1) * $this->n_page_scale) + 1;
        $n_next_page        = $n_prev_page + $this->n_page_scale - 1;
        if($n_next_page > $n_total_page) {
            $n_next_page = $n_total_page;
        }

        $arr_pagination = array(
            'total_cnt'     => $n_total_cnt,
            'total_page'    => $n_total_page,
            'total_block'   => $n_total_block,
            'current_block' => $n_current_block,
            'prev_page'     => $n_prev_page,
            'next_page'     => $n_next_page,
        );

        print_r($arr_pagination);

        return $arr_pagination;
    }

}

?>