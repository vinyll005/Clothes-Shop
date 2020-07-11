<?php

class Cart
{

    public static function addProduct($id)
    {
        $id = intval($id);

        $productsInCart = array();

        if(isset($_SESSION['productsInCart']))  {
            $productsInCart = $_SESSION['productsInCart'];
        }

        if(array_key_exists($id, $productsInCart))  {
            $productsInCart[$id] ++;
        }   else    {
            $productsInCart[$id] = 1;
        }

        $_SESSION['productsInCart'] = $productsInCart;

        return self::countItems();
    }

    public static function decreaseProduct($id)
    {
        $id = intval($id);

        $productsInCart = array();

        if(isset($_SESSION['productsInCart']))  {
            $productsInCart = $_SESSION['productsInCart'];
        }

        if(array_key_exists($id, $productsInCart) && $productsInCart[$id] > 1)  {
            $productsInCart[$id] = $productsInCart[$id] - 1;
        }   else    {
            $productsInCart[$id] = 1;
        }

        $_SESSION['productsInCart'] = $productsInCart;

        return self::countItems();
    }

    public static function getProductPriceById($id)
    {
        $id = intval($id);
        $db = Db::getDbConnection();

        $result = $db->query("SELECT price FROM products WHERE status = '1' AND id = $id");
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $row = $result->fetch();

        return $row['price'];
    }

    public static function updateProductPrice($id)
    {
        $id = intval($id);
        $productPrice = self::getProductPriceById($id);
        $productAmount = $_SESSION['productsInCart'][$id];
        
        return $productAmount * $productPrice;
    }

    public static function countItems()
    {
        if(isset($_SESSION['productsInCart']))  {
            $count = 0;
            foreach($_SESSION['productsInCart'] as $productId => $productAmount)    {
                $count += $productAmount;
            }
            return $count;
        }   else    {
            return 0;
        }
    }

    public static function cleanCart()
    {
        unset($_SESSION['productsInCart']);
        $referer = $_SERVER['HTTP_REFERER'];
        header("Location: $referer");
    }

    public static function deleteProduct($id)
    {
        unset($_SESSION['productsInCart'][$id]);
        $referer = $_SERVER['HTTP_REFERER'];
        header("Location: $referer");
        
    }

    public static function getProducts()
    {
        if(isset($_SESSION['productsInCart']))  {
            return $_SESSION['productsInCart'];
        }
        return false;
    }

    public static function getTotalPrice($products)
    {
        $productsInCart = self::getProducts();

        $total = 0;

        if($productsInCart) {
            foreach($products as $item) {
                $total += $item['price'] * $productsInCart[$item['id']];
            }
        }
        return $total;
    }

    public static function completeBuying($products)
    {
        $db = DB::getDbConnection();
        
        $products = json_encode($products);

            $data = array($_SESSION['userId'] ,$_SESSION['userName'], $_SESSION['userEmail'], $products);
            $result = $db->prepare("INSERT INTO orders(user_id, user_name, user_email, products) VALUES (?, ?, ?, ?)");
            $result->execute($data);
        
        unset($_SESSION['productsInCart']);
    }

}

?>