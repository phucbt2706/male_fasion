<?php
    function addCart($id){
        $items = get_product_id($id);
        extract($items);

        $qty = 1;
        if (isset($_SESSION['cart']) && array_key_exists($id, $_SESSION['cart']['buy']) ) {
            $qty = $_SESSION['cart']['buy'][$id]['qty'] + 1;
        }

        $_SESSION['cart']['buy'][$id] = [
            'product_id' => $id,
            'product_name' => $product_name,
            'price' => $price,
            'images' => $images,
            'qty' => $qty,
            'sub_total' => $price * $qty
        ];
        updateCart();
    }

    function updateCart(){
        if (!empty($_SESSION['cart']['buy'])) {
            $num_order = 0;
            $total = 0;
            foreach ($_SESSION['cart']['buy'] as $item) {
                $num_order += $item['qty'];
                $total += $item['sub_total'];
            }
        
            $_SESSION['cart']['infor']=[
                'num_order' =>  $num_order,
                'total' =>   $total
            ];
        }
       
    }

    function get_total_cart(){
        if (isset($_SESSION['cart'])) {
            return $_SESSION['cart']['infor']['total'];
        }
    }

    function get_list_cart(){
        if (isset($_SESSION['cart']['buy'])) {
            return $_SESSION['cart']['buy'];
        }
    }
    
    function delete_cart($id){
        if (!empty($_SESSION['cart']['buy'][$id])) {
            unset($_SESSION['cart']['buy'][$id]);
        }

    }

    function updateQty($qty){
        if (isset($_POST['btn_update_qty'])) {
            foreach ($qty as $id => $new_qty) {
                $_SESSION['cart']['buy'][$id]['qty'] = $new_qty;
                $_SESSION['cart']['buy'][$id]['sub_total'] = $new_qty *  $_SESSION['cart']['buy'][$id]['price'];
            }  
            updateCart();   
        }   
    }

    function get_product_id($id) {
        $item = db_fetch_row("SELECT * FROM products WHERE product_id = {$id}");
        return $item;
    }

    function get_num_cart(){
        if (!empty($_SESSION["cart"]["buy"])) {
            $num_cart = count($_SESSION["cart"]["buy"]);
        }
        return $num_cart;
    }

    
?>