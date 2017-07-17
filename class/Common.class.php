<?php
class Common {
     /*
     * check_required
     * @desc    필수 데이터 체크
     * @param   $arr_check: 체크 할 데이터들(array), $arr_required: 체크할 데이터의 key값(array)
     * @return  array(result: 성공 여부(bool), data: 빈 데이터의 key값(array))
     */
    public function check_required($arr_check, $arr_required) {
        $arr_return = array(
            'result'    => false,
            'data'      => '',
        );
        if(empty($arr_check) || empty($arr_required)){
            return $arr_return;
        }

        $b_check        = true;
        $arr_no_data    = array();

        foreach($arr_required as $str_required) {
            if(empty($arr_check[$str_required])) {
                $b_check        = false;
                $arr_no_data[]  = $str_required;
            }
        }

        $arr_return = array(
            'result'    => $b_check,
            'data'      => $arr_no_data,
        );

        return $arr_return;
    }
}
?>