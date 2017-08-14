<?php

class Comments
{
    const SHOW_BY_DEFAULT = 5;

    public static function getComments($id, $page = 1)
    {
        $offset = ($page - 1) * 5;
        $db = Db::getConnection();
        $result = $db->query("SELECT * FROM comments WHERE news_id = " . $id);
        $i = 0;
        $comments = array();
        while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
            $comments[$i]['id'] = $row['id'];
            $comments[$i]['date'] = $row['date'];
            $comments[$i]['description'] = $row['description'];
            $comments[$i]['userLike'] = $row['userLike'];
            $comments[$i]['current_user_id'] = $row['current_user_id'];
            $comments[$i]['news_id'] = $row['news_id'];
            $i++;
        }
        return $comments;
    }

    public static function getUser()
    {
        $db = Db::getConnection();
        $result = $db->query("SELECT id,`name` FROM user ");
        $user = array();
        $i = 0;
        while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
            $user[$i]['id'] = $row['id'];
            $user[$i]['name'] = $row['name'];
            $i++;
        }
        return $user;

    }

    public static function getTotalItemInCategory($categoryId)
    {
        $db = Db::getConnection();

        $result = $db->query('SELECT count(id) AS count FROM comments '
            . 'WHERE  news_id ="' . $categoryId . '"');
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $row = $result->fetch();

        return $row['count'];
    }

    public static function getItemList($categoryId = false, $page = 1)
    {
        if ($categoryId) {

            $page = intval($page);
            $offset = ($page - 1) * self::SHOW_BY_DEFAULT;

            $db = Db::getConnection();
            $comments = array();
            $result = $db->query("SELECT * FROM `comments` "
                . "WHERE `news_id` = '$categoryId' "
                . "ORDER BY date DESC "
                . "LIMIT " . self::SHOW_BY_DEFAULT
                . ' OFFSET ' . $offset);

            $i = 0;
            while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                $comments[$i]['id'] = $row['id'];
                $comments[$i]['date'] = $row['date'];
                $comments[$i]['description'] = $row['description'];
                $comments[$i]['userLike'] = $row['userLike'];
                $comments[$i]['current_user_id'] = $row['current_user_id'];
                $comments[$i]['news_id'] = $row['news_id'];
                $i++;
            }

            return $comments;
        }
    }

    public static function CommentsAdd($current_user_id, $date, $description, $news_id)
    {
        $db = Db::getConnection();
        $sql = "INSERT INTO comments (`date`,`description`, `userLike`, `current_user_id`, `news_id`)
                  VALUES (:date,:description,0,:current_user_id,:news_id)";

        $result = $db->prepare($sql);
        $result->bindParam(':date', $date, PDO::PARAM_STR);
        $result->bindParam(':description', $description, PDO::PARAM_STR);
        $result->bindParam(':current_user_id', $current_user_id, PDO::PARAM_STR);
        $result->bindParam(':news_id', $news_id, PDO::PARAM_STR);
        $result->execute();


    }

    public static function CommentUserCenter($categoryId,$page=1)
    {
        $page = intval($page);
        $offset = ($page - 1) * self::SHOW_BY_DEFAULT;

        $db = Db::getConnection();
        $users = array();
        $result = $db->query("SELECT * FROM `comments` WHERE `current_user_id` = {$categoryId} ORDER BY `id` DESC "
            . "LIMIT " . self::SHOW_BY_DEFAULT
            . ' OFFSET ' . $offset);
        $i = 0;
        $userComments = array();
        while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
            $userComments[$i]['id'] = $row['id'];
            $userComments[$i]['date'] = $row['date'];
            $userComments[$i]['description'] = $row['description'];
            $userComments[$i]['news_id'] = $row['news_id'];
            $i++;
        }
        return $userComments;

    }

    public static function countComments($categoryId)
    {
        $db = Db::getConnection();

        $result = $db->query('SELECT count(id) AS count FROM comments '
            . 'WHERE  current_user_id ="' . $categoryId . '"');
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $row = $result->fetch();

        return $row['count'];

    }

}