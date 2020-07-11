<?php

class AdminOrderController extends AdminBase
{

    public function actionIndex()
    {
        $ordersList = Order::getOrders();

        require_once(ROOT.'/views/admin_orders/index.php');
        return true;
    }

    public function actionUpdate($id)
    {
        $order = Order::getOrderById($id);

        if(isset($_POST['submit'])) {
            $options['user_id'] = $_POST['user_id'];
            $options['user_name'] = $_POST['user_name'];
            $options['user_email'] = $_POST['user_email'];
            $options['status'] = $_POST['status'];

            if(Order::updateOrder($id, $options))   {
                header("Location: /admin/orders");
            }
        }

        require_once(ROOT.'/views/admin_orders/update.php');
        return true;
    }

    public function actionDelete($id)
    {
        if(isset($_POST['submit'])) {
            Order::deleteOrder($id);

            header("Location: /admin/orders");
        }

        require_once(ROOT.'/views/admin_orders/delete.php');
        return true;
    }

    public function actionView($id)
    {
        $order = Order::getOrderById($id);

        $productsQuantity = json_decode($order['products'], true);

        $productsIds = array_keys($productsQuantity);

        $products = Products::getProductsByIds($productsIds);

        require_once(ROOT.'/views/admin_orders/view.php');
        return true;
    }

}

?>