<?php

class Order
{

    public static function getOrders()
    {
        $db = Db::getDbConnection();

        $ordersList = array();

        $result = $db->query("SELECT * FROM orders ORDER BY id ASC");

        $i = 0;
        while($row = $result->fetch())  {
            $ordersList[$i]['id'] = $row['id'];
            $ordersList[$i]['date'] = $row['date'];
            $ordersList[$i]['user_id'] = $row['user_id'];
            $ordersList[$i]['status'] = $row['status'];

            $i++;
        }
        return $ordersList;
    }

    public static function updateOrder($id, $options)
    {
        $db = Db::getDbConnection();
        $newData = array($options['user_id'], $options['user_name'], $options['user_email'], $options['status'], $id);

        $result = $db->prepare("UPDATE orders SET user_id=?, user_name=?, user_email=?, status=? WHERE id=?");

        return $result->execute($newData);
    }

    public static function deleteOrder($id)
    {
        $db = Db::getDbConnection();

        $result = $db->prepare("DELETE FROM orders WHERE id=:id");
        $result->bindParam(":id", $id, PDO::PARAM_INT);

        return $result->execute();
    }

    public static function getOrderById($id)
    {
        $db = Db::getDbConnection();

        $order = array();

        $result = $db->prepare("SELECT * FROM orders WHERE id=:id");
        $result->bindParam(":id", $id, PDO::PARAM_INT);
        $result->execute();
        $order = $result->fetch();

        return $order;
    }

}

?>