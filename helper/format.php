<?php
function currency_format($number, $suffix = 'đ'){
    return number_format($number).$suffix;
}

function redirect($url){
    header('Location: '.$url);
}