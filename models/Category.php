<?php

class Category
{
    public static function getCategoriesList()
    {
        $db = Db::getDbConnection();

        $categoriesList = array();

        $result = $db->query("SELECT id, name, sort_order, status FROM category ORDER BY sort_order ASC");

        $i = 0;
        while($row = $result->fetch())  {
            $categoriesList[$i]['id'] = $row['id'];
            $categoriesList[$i]['name'] = $row['name'];
            $categoriesList[$i]['sort_order'] = $row['sort_order'];
            $categoriesList[$i]['status'] = $row['status'];
            $i++;
        }

        return $categoriesList;
    }

    public static function getCategoryById($id)
    {
        $db = Db::getDbConnection();

        $category = array();

        $result = $db->query("SELECT * FROM category WHERE id= ".$id);
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $category = $result->fetch();

        return $category;
    }

    public static function createCategory($options)
    {
        $db = Db::getDbConnection();

        $insertOptions = array($options['name'], $options['sort_order'], $options['status']);
        $result = $db->prepare("INSERT INTO category(name, sort_order, status) VALUES(?, ?, ?)");

        return $result->execute($insertOptions);
    }

    public static function updateCategory($id, $options)
    {
        $db = Db::getDbConnection();

        $updateOptions = array($options['name'], $options['sort_order'], $options['status'], $id);
        $result = $db->prepare("UPDATE category SET name = ?, sort_order = ?, status = ? WHERE id = ?");

        return $result->execute($updateOptions);
    }

    public static function deleteCategoryById($id)
    {
        $db = Db::getDbConnection();

        $result = $db->prepare("DELETE FROM category WHERE id=:id");
        $result->bindParam(":id", $id, PDO::PARAM_INT);

        return $result->execute();
    }
    
}

?>