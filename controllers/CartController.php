<?php

class CartController
{

    public function actionIndex()
    {
        $userId = User::checkLogged();
        $recommendProducts = Products::getRecommendedProducts();

        $productsInCart = Cart::getProducts();
        
        if($productsInCart) {
            $productsIds = array_keys($productsInCart);
            $products = Products::getProductsByIds($productsIds);
            $totalPrice = Cart::getTotalPrice($products);
        }
        
        require_once(ROOT.'/views/cart/index.php');

        return true;
    }

    public function actionCheckout()
    {
        $userId = User::checkLogged();
        $recommendProducts = Products::getRecommendedProducts();

        $productsInCart = Cart::getProducts();
    
        if($productsInCart) {
            $productsIds = array_keys($productsInCart);
            $products = Products::getProductsByIds($productsIds);
            $totalPrice = Cart::getTotalPrice($products);
        }
        
        require_once(ROOT.'/views/cart/checkout.php');

        return true;
    }

    public function actionComplete()
    {
        $userId = User::checkLogged();
        $recommendProducts = Products::getRecommendedProducts();

        $products = Cart::getProducts();
        if(!empty($products))    {
            Cart::completeBuying($products);
            require_once(ROOT.'/views/cart/complete.php');
        }   else    {
            header("Location: /");
        }


        return true;
    } 

    public function actionAdd($id)
    {

        echo Cart::addProduct($id);

        return true;
    }

    public function actionDecrease($id)
    {

        echo Cart::decreaseProduct($id);

        return true;
    }

    public function actionClean()
    {
        Cart::cleanCart();

        return true;
    }

    public function actionUpdate($id)
    {
       echo "$".Cart::updateProductPrice($id);

        return true;
    }

    public function actionDelete($id)
    {
        Cart::deleteProduct($id);

        return true;
    }

}

?>