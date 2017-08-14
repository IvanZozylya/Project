<?php

class Category
{
    public static function getCategory()
    {
        $db = Db::getConnection();
        $result = $db->query("SELECT `id`,`name` FROM category ");
        $categoryList = array();
        $i = 0;
        while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
            $categoryList[$i]['id'] = $row['id'];
            $categoryList[$i]['name'] = $row['name'];
            $i++;
        }
        return $categoryList;
    }

}