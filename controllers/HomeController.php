<?php

class HomeController
{
    public function actionIndex()
    {
        $recommendProducts = Products::getRecommendedProducts();

        require_once(ROOT.'/views/home/index.php');

        return true;
    }
}

?>