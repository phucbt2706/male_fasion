<?php

function construct() {
    //require models index
    load_model('index');
}

function indexAction() {
    load_view('index');
}

function blog_detailAction() {
    load_view('blog_detail');
}

function blogAction() {
    load_view('blog');
}

function contactAction() {
    load_view('contacts');
}
