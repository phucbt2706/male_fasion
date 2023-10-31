<?php

function construct() {
    load_model('index');
}

function indexAction(){
    $lists_pro_cart = get_list_cart();
    $data['lists_pro_cart'] = $lists_pro_cart;

    load_view('index', $data);
}
function addAction(){
    $id = $_POST['id'];
    addCart($id);

    $item = get_product_id($id);
    $num_cart = get_num_cart();

    $result =[
        'num_cart'=> $num_cart,
        'meesage'=> 'Thêm sản phẩm '. $item['product_name'] . ' thành công'
    ];
   
    echo json_encode($result);
}

function deleteAction(){
    $id = $_POST['id'];
    delete_cart($id);
    // delete_cart($id);
    $item = get_product_id($id);

    $result =[
        'message'=> "Xóa sản phẩm".$item['product_name']." thành công"
    ];
    
    echo json_encode($result);
}

// function deleteAction(){
//     // $id = (isset($_GET['id']))?$_GET['id']: '';
//     // delete_cart($id);

//     // $lists_pro_cart = get_list_cart();
//     // $data['lists_pro_cart'] = $lists_pro_cart;

//     // load_view('index', $data);
// }

function updateAction(){
    $id =  $_POST['id'];
    $qty =  $_POST['qty'];

    if (isset($_SESSION['cart']) && array_key_exists($id, $_SESSION['cart']['buy'])) {
        $item = get_product_id($id);
        //Update quantity
        $_SESSION['cart']['buy'][$id]['qty'] = $qty;

        //Update sub_total
        $sub_total = $qty * $item['price'];
        $_SESSION['cart']['buy'][$id]['sub_total'] = $sub_total;
    
        //Update cart
        updateCart();

        //Get total
        $total = get_total_cart();
        
        //Json data
        $result = [
            'sub_total' => currency_format($sub_total),
            'total' => currency_format($total)
        ];
        //Push data to ajax:success
        echo json_encode($result);
    }
}