<?php
namespace App\Controllers;

class Products extends BaseController{
    public function index(){
        $data=['items'=>'Our Items'];
        return view('products/itemlist',$data);
    }
}