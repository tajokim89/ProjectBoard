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

    /*
     * board_list
     * @desc    게시판 리스트 추출
     * @param   $n_page: 현재 페이지(number)
     * @return  array(게시판 리스트(id, title, author, hits, created)) / false
     */
    public function board_list($n_page = 1) {
        if(!is_numeric($n_page)) {
            return false;
        }

        $n_target   = ($n_page - 1) * $this->n_limit;
        $str_field = "id, title, author, hits, created";
        $arr_board  = $this->obj_bm->query("SELECT {$str_field} FROM board ORDER BY id DESC LIMIT {$n_target}, {$this->n_limit}");
        return $arr_board;
    }

    /*
     * pagination
     * @desc    페이징 처리
     * @param   $n_page: 현재 페이지(number)
     * @return  array(
     *      total_cnt:      총 갯수(number)
     *      total_page:     총 페이지 수(number)
     *      total_block:    총 페이지 블럭 수(number)
     *      current_block:  현재 페이지 블럭(number)
     *      prev_page:      이전 페이지(number)
     *      next_page:      다음 페이지(number)
     */
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

        return $arr_pagination;
    }

}

?>