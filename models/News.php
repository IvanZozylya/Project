<?php


class News
{
    const SHOW_BY_DEFAULT = 5;

    public static function actionNewsIndex($id)
    {
        $id = intval($id);
        $db = Db::getConnection();
        $result = $db->query("SELECT `id`,`title`,`date`,`category_id` FROM news WHERE `category_id` = {$id} ORDER BY `date` DESC LIMIT 5");
        $i = 0;
        $newsList = array();
        while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
            $newsList[$i]['id'] = $row['id'];
            $newsList[$i]['title'] = $row['title'];
            $newsList[$i]['date'] = $row['date'];
            $newsList[$i]['category_id'] = $row['category_id'];
            $i++;
        }
        return $newsList;

    }

    public static function getNewsListByCategory($categoryId = false, $page = 1)
    {
        if ($categoryId) {

            $page = intval($page);
            $offset = ($page - 1) * self::SHOW_BY_DEFAULT;

            $db = Db::getConnection();
            $news = array();
            $result = $db->query("SELECT `id`, `title` FROM news "
                . "WHERE `category_id` = '$categoryId' "
                . "ORDER BY date DESC "
                . "LIMIT " . self::SHOW_BY_DEFAULT
                . ' OFFSET ' . $offset);

            $i = 0;
            while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                $news[$i]['id'] = $row['id'];
                $news[$i]['title'] = $row['title'];
                $i++;
            }

            return $news;
        }
    }

    public static function getTotalNewsInCategory($categoryId)
    {
        $db = Db::getConnection();

        $result = $db->query('SELECT count(id) AS count FROM news '
            . 'WHERE  category_id ="' . $categoryId . '"');
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $row = $result->fetch();

        return $row['count'];
    }

    public static function getItemNewsById($id)
    {
        $id = intval($id);
        $db = Db::getConnection();
        $result = $db->query("SELECT * FROM news WHERE `id` = " . $id);
        return $row = $result->fetch(PDO::FETCH_ASSOC);

    }

    public static function Top3News()
    {
        $db = Db::getConnection();
        $result = $db->query("SELECT * FROM `news` "
            . "ORDER BY `news`.`comment` DESC LIMIT 3");
        $i = 0;
        $top3News = array();
        while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
            $top3News[$i]['id'] = $row['id'];
            $top3News[$i]['title'] = $row['title'];
            $top3News[$i]['comment'] = $row['comment'];
            $i++;
        }
        return $top3News;
    }
}