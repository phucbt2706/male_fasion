<?php
    function get_product_list() {
        $result = db_fetch_array("SELECT * FROM products");
        return $result;
    }

    function get_product_id($id) {
        $item = db_fetch_row("SELECT * FROM products WHERE product_id = {$id}");
        return $item;
    }
    
    function get_product_by_cate($id) {
        $item = db_fetch_array("SELECT * FROM products WHERE category_id = {$id} LIMIT 0 , 4");
        return $item;
    }

    function get_category_list() {
        $result = db_fetch_array("SELECT * FROM category");
        return $result;
    }

    function get_pagging($num_page,$page){
        $str_html = '<nav aria-label="Page navigation example">
        <ul class="pagination">';
        //Nếu $page >1 thì mới hiển thị button PREVIOUS
        if ($page>1) {
            $page_pre = $page -1;
            $str_html .= '<li class="page-item"><a class="page-link" href="?mod=product&page='.$page_pre.'"><<</a></li>';
        }

        //Show all tất cả số trang hiện có
        for ($i=1; $i <=$num_page; $i++) { 
            //Nếu đang ở số trang hiện tại thì bg blue
            //Thêm class = active để kích hoạt css trong boostrap
            $active = '';
            if ($i == $page ) {
                $active = 'active';
            }
            $str_html .= '<li class="page-item '.$active.'"><a class="page-link" href="?mod=product&page='.$i.'">'.$i.'</a></li>';
        }

        //Nếu $page < $num_page thì mới hiển thị button NEXt
        if ($page<$num_page) {
            $page_next = $page + 1;
            $str_html .= '<li class="page-item"><a class="page-link" href="?mod=product&page='.$page_next.'">>></a></li>';
        }
        $str_html .= '</ul>
        </nav>';
        return $str_html;

    }

    function hang_hoa_select_page($start,$num_rows_in_page){
        $item = db_fetch_array( "SELECT * FROM products LIMIT $start, $num_rows_in_page");
        return $item;
    }

    function num_row(){
        return db_num_rows("SELECT * FROM products");
    }
   
?>