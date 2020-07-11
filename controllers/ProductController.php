<?php

class ProductController
{

    public function actionList($page = 1)
    {
        $categoriesList = Category::getCategoriesList();
        $latestProducts = Products::getLatestProducts($page);
        $totalProducts = Products::getTotalProducts();

        $category['name'] = "All";

        $pagination = new Pagination($totalProducts, $page, Products::AMOUNT_PRODUCTS_BY_DEFAULT, 'page-');

        require_once(ROOT.'/views/product/list.php');

        return true;
    }

    public function actionView($id)
    {
        $product = Products::getProductById($id);
        $category = Category::getCategoryById($product['category_id']);
        $recommendProducts = Products::getRecommendedProducts();
        require_once(ROOT.'/views/product/view.php');

        return true;
    }

    public function actionCategory($categoryId, $page = 1)
    {
        $categoriesList = Category::getCategoriesList();
        $latestProducts = Products::getProductByCategory($categoryId, $page);
        $category = Category::getCategoryById($categoryId);
        $totalProductsByCategory = Products::getTotalProductsByCategory($categoryId);

        $pagination = new Pagination($totalProductsByCategory, $page, Products::AMOUNT_PRODUCTS_BY_DEFAULT, 'page-');


        require_once(ROOT.'/views/product/list.php');

        return true;
    }

}

?>