<?php

class AdminProductController extends AdminBase
{

    public function actionIndex()
    {

        $productsList = Products::getProductsList();

        require_once(ROOT.'/views/admin_product/index.php');

        return true;
    }

    public function actionCreate()
    {

        $categoriesList = Products::getCategoriesListAdmin();

        if (isset($_POST['submit'])) {
            $options['name'] = $_POST['name'];
            $options['code'] = $_POST['code'];
            $options['price'] = $_POST['price'];
            $options['category_id'] = $_POST['category_id'];
            $options['brand'] = $_POST['brand'];
            $options['availability'] = $_POST['availability'];
            $options['description'] = $_POST['description'];
            $options['is_new'] = $_POST['is_new'];
            $options['is_recommended'] = $_POST['is_recommended'];
            $options['status'] = $_POST['status'];


            $id = Products::createProduct($options);

            if($id) {
                if(is_uploaded_file($_FILES["image"]["tmp_name"]))  {
                    move_uploaded_file($_FILES["image"]["tmp_name"], $_SERVER['DOCUMENT_ROOT']."/template/images/products/{$id}.jpg");
                }
            }
            
            header("Location: /admin/products");
        }

        require_once(ROOT.'/views/admin_product/create.php');

        return true;
    }

    public function actionUpdate($id)
    {
        $categoriesList = Products::getCategoriesListAdmin();
        $product = Products::getProductById($id);

        if (isset($_POST['submit'])) {
            $options['name'] = $_POST['name'];
            $options['code'] = $_POST['code'];
            $options['price'] = $_POST['price'];
            $options['category_id'] = $_POST['category_id'];
            $options['brand'] = $_POST['brand'];
            $options['availability'] = $_POST['availability'];
            $options['description'] = $_POST['description'];
            $options['is_new'] = $_POST['is_new'];
            $options['is_recommended'] = $_POST['is_recommended'];
            $options['status'] = $_POST['status'];

            if(Products::updateProductById($id, $options))  {
                if(is_uploaded_file($_FILES["image"]["tmp_name"]))  {
                    move_uploaded_file($_FILES["image"]["tmp_name"], $_SERVER['DOCUMENT_ROOT']."/template/images/products/{$id}.jpg");
                }
            }
            header("Location: /admin/products");
        }

        require_once(ROOT.'/views/admin_product/update.php');

        return true;
    }

    public function actionDelete($id)
    {
        if(isset($_POST['submit'])) {

            Products::deleteProductById($id);

            header("Location: /admin/products");
        }

        require_once(ROOT.'/views/admin_product/delete.php');

        return true;
    }
}

?>