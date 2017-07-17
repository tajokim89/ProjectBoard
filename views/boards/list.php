<?php
require_once VIEW_PATH.'layouts/inc_header.php';
?>
    <center><h2>게시판</h2></center>

    <table class="table table-hover table-bordered">
        <thead>
            <tr>
                <th>글번호</th>
                <th>제목</th>
                <th>글쓴이</th>
                <th>조회수</th>
                <th>날짜</th>
            </tr>
        </thead>
        <tbody>
        <?php
            foreach($arr_board as $arr_info) {
        ?>
            <tr>
                <td><?=$arr_info['id']?></td>
                <td><a href="./view.php?page=<?=$n_page?>&id=<?=$arr_info['id']?>"><?=$arr_info['title']?></a></td>
                <td><?=$arr_info['author']?></td>
                <td><?=$arr_info['hits']?></td>
                <td><?=$arr_info['created']?></td>
            </tr>
        <?php
            }
        ?>
        </tbody>
    </table>

    <div class="row">
        <div class="col-sm-6">
            <a class="btn btn-primary" href="/write.php">글쓰기</a>
        </div>
        <div class="col-sm-6">
            <a class="btn btn-primary pull-right" href="/index.php">목록</a>
        </div>
    </div>
    <div class="row" style="text-align: center;">
        <ul class="pagination">
            <?php if($n_page != 1) { ?>
            <li><a href="./board.php?page=1"><<</a></li>
            <?php } //endif($n_page) ?>

            <?php if($arr_pagination['prev_page'] - 1 != 0) { ?>
            <li><a href="./board.php?page=<?=$arr_pagination['prev_page'] - 1?>"><</a></li>
            <?php } // endif($arr_pagination['prev_page']) ?>

            <?php for($n_paging = $arr_pagination['prev_page']; $n_paging <= $arr_pagination['next_page']; $n_paging++) { ?>
            <li <?=($n_page == $n_paging) ? 'class="active"' : ''?>><a href="./board.php?page=<?=$n_paging?>"><?=$n_paging?></a>
            <?php } // endfor($n_paging) ?>

            <?php if($arr_pagination['current_block'] < $arr_pagination['total_block'] ) { ?>
            <li><a href="./board.php?page=<?=$arr_pagination['next_page'] + 1?>">></a></li>
            <?php } // endif($arr_pagination['current_block']) ?>

            <?php if($n_page != $arr_pagination['total_page']) { ?>
            <li><a href="./board.php?page=<?=$arr_pagination['total_page']?>">>></a></li>
            <?php } //endif($n_page) ?>
        </ul>
    </div>
<?php
require_once VIEW_PATH.'layouts/inc_footer.php';
?>