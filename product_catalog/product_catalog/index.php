<?php

    require('../model/database.php');
    require('../model/category.php');
    require('../model/category_db.php');
    require('../model/product.php');
    require('../model/product_db.php');

    $action = filter_input(INPUT_POST, 'action');

    if($action == null) {
        $action = filter_input(INPUT_GET, 'action');

        if($action == null) {
            $action = 'list_products';
        }
    }  

    if($action == 'list_products') {

        $category_id = filter_input(INPUT_GET, 'category_id', FILTER_VALIDATE_INT);
        if ($category_id == null || $category_id == false) {
            $category_id = 1;
        }

        $categoryCurrent = CategoryDB::getCategory($category_id);
        $categories = CategoryDB::getCategories();
        $products = ProductDB::getProductsByCategory($category_id);

        include('product_list.php');
    } 
    else if($action == 'view_product') {

        $categories = CategoryDB::getCategories();
        $product_id = filter_input(INPUT_GET, 'product_id', FILTER_VALIDATE_INT);   
        $product = ProductDB::getProduct($product_id);

        include('product_view.php');
    }//end if

?>