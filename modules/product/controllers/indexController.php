<?php
function construct() {
    load_model('index');
}

function indexAction() {
    $lists_cate = get_category_list();
    $data['lists_cate'] = $lists_cate;

    //Lấy tổng bảng ghi
    $total_row = num_row();
    //Số sản phẩm trên 1 trang
    $num_rows_in_page = 9;
    //Tổng số trang ở paging
    $num_page = ceil($total_row / $num_rows_in_page);

    $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
    //Chỉ số bắt đầu mỗi trang
    $start = ($page - 1) * $num_rows_in_page;
    
    $infor_product = hang_hoa_select_page($start,$num_rows_in_page);

    $data['infor_product'] = $infor_product;
    $data['num_page'] = $num_page;
    $data['page'] = $page;

    load_view('index', $data);
}

function detailAction() {
    $id = (int)$_GET['product_id'];
    $item = get_product_id($id);

    $lists_product_cate = get_product_by_cate($item['category_id']);
    $data['item'] = $item;
    $data['lists_product_cate'] = $lists_product_cate;
    
    load_view('detail',$data);
}


