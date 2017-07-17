<?php
require_once './config/path.config.php';
require_once CLASS_PATH.'BoardManager.class.php';
$obj_bm = new BoardManager();

$n_page             = !empty($_GET['page']) ? intval($_GET['page']) : 1;
$arr_board          = $obj_bm->board_list($n_page);
$str_browser_title  = '게시판';
$arr_pagination     = $obj_bm->pagination($n_page);
include_once VIEW_PATH.'/boards/list.php';
?>