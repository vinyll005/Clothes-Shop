<?php

class Products
{

    const AMOUNT_PRODUCTS_BY_DEFAULT = 6;

    public static function getProductsList()
    {
        $db = Db::getDbConnection();

        $result = $db->query("SELECT * FROM products ORDER BY id ASC");
        $productsList = array();
        $i = 0;
        while($row = $result->fetch())  {
            $productsList[$i]['id'] = $row['id'];
            $productsList[$i]['name'] = $row['name'];
            $productsList[$i]['price'] = $row['price'];
            $productsList[$i]['code'] = $row['code'];
            $i++;
        }
        return $productsList;
    }

    public static function getLatestProducts($page, $count = self::AMOUNT_PRODUCTS_BY_DEFAULT)
    {
        $count = intval($count);
        $offset = ($page - 1) * self::AMOUNT_PRODUCTS_BY_DEFAULT;
        $db = Db::getDbConnection();

        $productsList = array();

        $result = $db->query("SELECT id, name, price, brand, is_new FROM products 
                            WHERE status = '1'
                            ORDER BY id DESC
                            LIMIT ".$count.
                            " OFFSET ".$offset);
        
        $i = 0;
        while($row = $result->fetch())  {
            $productsList[$i]['id'] = $row['id'];
            $productsList[$i]['name'] = $row['name'];
            $productsList[$i]['price'] = $row['price'];
            $productsList[$i]['is_new'] = $row['is_new'];
            $productsList[$i]['brand'] = $row['brand'];
            $i++;
        }

        return $productsList;
    }

    public static function getProductByCategory($category, $page, $count = self::AMOUNT_PRODUCTS_BY_DEFAULT)
    {
        $count = intval($count);
        $offset = ($page - 1) * self::AMOUNT_PRODUCTS_BY_DEFAULT;
        $db = DB::getDbConnection();

        $productsList = array();

        $result = $db->query("SELECT id, name, price, brand, is_new FROM products
                            WHERE status = '1' AND category_id = $category
                            ORDER BY id DESC
                            LIMIT ".$count.
                            " OFFSET ".$offset);

        $i = 0;
        while($row = $result->fetch())  {
            $productsList[$i]['id'] = $row['id'];
            $productsList[$i]['name'] = $row['name'];
            $productsList[$i]['price'] = $row['price'];
            $productsList[$i]['is_new'] = $row['is_new'];
            $productsList[$i]['brand'] = $row['brand'];
            $i++;
        }

        return $productsList;
    }

    public static function getProductById($id)
    {
        $db = Db::getDbConnection();

        $product = array();

        $result = $db->query("SELECT * FROM products WHERE id = ".$id);
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $product = $result->fetch();

        return $product;
    }

    public static function deleteProductById($id)
    {
        $db = Db::getDbConnection();

        $result = $db->prepare("DELETE FROM products WHERE id =:id");
        $result->bindParam(":id", $id, PDO::PARAM_INT);

        return $result->execute();

    }

    public static function getTotalProducts()
    {
        $db = Db::getDbConnection();

        $result = $db->query("SELECT count(id) AS count FROM products WHERE status = '1'");
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $count = $result->fetch();

        return $count['count'];
    }

    public static function getTotalProductsByCategory($category)
    {
        $db = Db::getDbConnection();

        $result = $db->query("SELECT count(id) AS count FROM products WHERE status = '1' AND category_id = $category");
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $count = $result->fetch();

        return $count['count'];
    }

    public static function getProductsByIds($idsArray)
    {
        $db = Db::getDbConnection();
        $products = array();

        $idsString = implode(',', $idsArray);

        $result = $db->query("SELECT * FROM products WHERE status = '1' AND id IN ($idsString)");
        $result->setFetchMode(PDO::FETCH_ASSOC);

        $i = 0;
        while($row = $result->fetch())  {
            $products[$i]['id'] = $row['id'];
            $products[$i]['name'] = $row['name'];
            $products[$i]['price'] = $row['price'];
            $products[$i]['code'] = $row['code'];
            $i++;
        }
        
        return $products;
    }

    public static function getRecommendedProducts()
    {
        $db = DB::getDbConnection();

        $productsList = array();

        $result = $db->query("SELECT id, name, price, brand, is_new FROM products
                            WHERE status = '1' AND is_recommended = '1'
                            ORDER BY id DESC");

        $i = 0;
        while($row = $result->fetch())  {
            $productsList[$i]['id'] = $row['id'];
            $productsList[$i]['name'] = $row['name'];
            $productsList[$i]['price'] = $row['price'];
            $productsList[$i]['is_new'] = $row['is_new'];
            $productsList[$i]['brand'] = $row['brand'];
            $i++;
        }

        return $productsList;
    }

    public static function getCategoriesListAdmin()
    {
        $db = Db::getDbConnection();

        $result = $db->query("SELECT id, name FROM category ORDER BY id ASC");

        $categoryList = array();
        $i=0;
        while($row = $result->fetch())  {
            $categoryList[$i]['id'] = $row['id'];
            $categoryList[$i]['name'] = $row['name'];
            $i++;
        }
        return $categoryList;
    }

    public static function createProduct($options)
    {
        $db = Db::getDbConnection();

        $sql = 'INSERT INTO products '
                . '(name, code, price, category_id, brand, availability,'
                . 'description, is_new, is_recommended, status)'
                . 'VALUES '
                . '(:name, :code, :price, :category_id, :brand, :availability,'
                . ':description, :is_new, :is_recommended, :status)';

        $result = $db->prepare($sql);
        $result->bindParam(':name', $options['name'], PDO::PARAM_STR);
        $result->bindParam(':code', $options['code'], PDO::PARAM_STR);
        $result->bindParam(':price', $options['price'], PDO::PARAM_STR);
        $result->bindParam(':category_id', $options['category_id'], PDO::PARAM_INT);
        $result->bindParam(':brand', $options['brand'], PDO::PARAM_STR);
        $result->bindParam(':availability', $options['availability'], PDO::PARAM_INT);
        $result->bindParam(':description', $options['description'], PDO::PARAM_STR);
        $result->bindParam(':is_new', $options['is_new'], PDO::PARAM_INT);
        $result->bindParam(':is_recommended', $options['is_recommended'], PDO::PARAM_INT);
        $result->bindParam(':status', $options['status'], PDO::PARAM_INT);

        if ($result->execute()) {
            return $db->lastInsertId();
        }

        return false;
    }

    public static function updateProductById($id, $options)
    {
        $db = Db::getDbConnection();

        $sql = "UPDATE products
            SET 
                name = :name, 
                code = :code, 
                price = :price, 
                category_id = :category_id, 
                brand = :brand, 
                availability = :availability, 
                description = :description, 
                is_new = :is_new, 
                is_recommended = :is_recommended, 
                status = :status
            WHERE id = :id";

        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        $result->bindParam(':name', $options['name'], PDO::PARAM_STR);
        $result->bindParam(':code', $options['code'], PDO::PARAM_STR);
        $result->bindParam(':price', $options['price'], PDO::PARAM_STR);
        $result->bindParam(':category_id', $options['category_id'], PDO::PARAM_INT);
        $result->bindParam(':brand', $options['brand'], PDO::PARAM_STR);
        $result->bindParam(':availability', $options['availability'], PDO::PARAM_INT);
        $result->bindParam(':description', $options['description'], PDO::PARAM_STR);
        $result->bindParam(':is_new', $options['is_new'], PDO::PARAM_INT);
        $result->bindParam(':is_recommended', $options['is_recommended'], PDO::PARAM_INT);
        $result->bindParam(':status', $options['status'], PDO::PARAM_INT);
        return $result->execute();
    }

    public static function getImage($id)
    {
        $path = '/template/images/products/';

        $productImage = $path . $id . '.jpg';

        if(file_exists($_SERVER['DOCUMENT_ROOT'].$productImage))    {
            return $productImage;
        }
        return false;
    }

}

?>