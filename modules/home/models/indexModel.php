<?php
    function get_product_list() {
        $result = db_fetch_array("SELECT * FROM product");
        return $result;
    }

    function get_product_id($id) {
        $item = db_fetch_row("SELECT * FROM product WHERE product_id = {$id}");
        return $item;
    }
