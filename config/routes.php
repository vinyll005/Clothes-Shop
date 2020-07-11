<?php
return array(
    // Work with products
    'products/category/([0-9]+)/page-([0-9]+)' => 'product/category/$1/$2',
    'products/page-([0-9]+)' => 'product/list/$1',
    'products/category/([0-9]+)' => 'product/category/$1',
    'products/([0-9]+)' => 'product/view/$1',
    'products' => 'product/list',
    // Work with user
    'register' => 'user/register',
    'logout' => 'user/logout',
    'login' => 'user/login',
    //Work as admin with products
    'admin/products' => 'adminProduct/index',
    'admin/products/create' => 'adminProduct/create',
    'admin/products/update/([0-9]+)' => 'adminProduct/update/$1',
    'admin/products/delete/([0-9]+)' => 'adminProduct/delete/$1',
    //Work as admin with categories
    'admin/category' => 'adminCategory/index',
    'admin/category/create' => 'adminCategory/create',
    'admin/category/update/([0-9]+)' => 'adminCategory/update/$1',
    'admin/category/delete/([0-9]+)' => 'adminCategory/delete/$1',
    //Work as admin with orders
    'admin/orders' => 'adminOrder/index',
    'admin/orders/update/([0-9]+)' => 'adminOrder/update/$1',
    'admin/orders/view/([0-9]+)' => 'adminOrder/view/$1',
    'admin/orders/delete/([0-9]+)' => 'adminOrder/delete/$1',
    // Work as admin
    'admin' => 'admin/index',
    // Work with cart
    'cart/add/([0-9]+)' => 'cart/add/$1',
    'cart/decrease/([0-9]+)' => 'cart/decrease/$1',
    'cart/update/([0-9]+)' => 'cart/update/$1',
    'cart/clean' => 'cart/clean',
    'cart/checkout' => 'cart/checkout',
    'cart/complete' => 'cart/complete',
    'cart/delete/([0-9]+)' => 'cart/delete/$1',
    'cart' => 'cart/index',
    // Home page
    '' => 'home/index'
);
?>