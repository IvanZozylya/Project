<?php

class User
{
    const SHOW_BY_DEFAULT = 5;

    public static function register($name, $email, $password)
    {
        $db = Db::getConnection();

        $sql = "INSERT INTO user (name,email,password)"
            . "VALUES (:name,:email,:password)";

        $result = $db->prepare($sql);
        $result->bindParam(':name', $name, PDO::PARAM_STR);
        $result->bindParam(':email', $email, PDO::PARAM_STR);
        $result->bindParam(':password', $password, PDO::PARAM_STR);

        return $result->execute();

    }

    public static function checkName($name)
    {
        if (strlen($name) >= 2) {
            return true;
        }
        return false;

    }

    public static function checkPassword($password)
    {
        if (strlen($password) >= 6) {
            return true;
        }
        return false;

    }

    public static function checkEmail($email)
    {
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return true;
        }
        return false;

    }

    public static function checkEmailExists($email)
    {
        $db = Db::getConnection();
        $sql = "SELECT COUNT(*) FROM user WHERE email = :email";

        $result = $db->prepare($sql);
        $result->bindParam(':email', $email, PDO::PARAM_STR);
        $result->execute();

        if ($result->fetchColumn()) {
            return true;
        }
        return false;

    }

    public static function checkUserData($email, $password)
    {
        $db = Db::getConnection();

        $sql = 'SELECT * FROM user WHERE email = :email AND password = :password';

        $result = $db->prepare($sql);
        $result->bindParam(':email', $email, PDO::PARAM_INT);
        $result->bindParam(':password', $password, PDO::PARAM_INT);
        $result->execute();

        $user = $result->fetch();
        if ($user) {
            return $user['id'];
        }

        return false;
    }

    public static function auth($userId)
    {
        $_SESSION['user'] = $userId;
    }

    public static function checkLogged()
    {
        // Если сессия есть, вернем идентификатор пользователя
        if (isset($_SESSION['user'])) {
            return $_SESSION['user'];
        }

        header("Location: /user/login");
    }

    public static function getUserById($id)
    {
        if ($id) {
            $db = Db::getConnection();
            $sql = 'SELECT * FROM user WHERE id = :id';

            $result = $db->prepare($sql);
            $result->bindParam(':id', $id, PDO::PARAM_INT);

            // Указываем, что хотим получить данные в виде массива
            $result->setFetchMode(PDO::FETCH_ASSOC);
            $result->execute();


            return $result->fetch();
        }
    }

    public static function isGuest()
    {
        if (isset($_SESSION['user'])) {
            return false;
        }
        return true;
    }

    public static function edit($id, $name, $password)
    {
        $db = Db::getConnection();

        $sql = "UPDATE user 
            SET name = :name, password = :password 
            WHERE id = :id";

        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        $result->bindParam(':name', $name, PDO::PARAM_STR);
        $result->bindParam(':password', $password, PDO::PARAM_STR);
        return $result->execute();
    }

    public static function UserComments()
    {
        $db = Db::getConnection();
        $result = $db->query("SELECT id,name,comment FROM user ORDER BY comment DESC LIMIT 5");
        $userComments = array();
        $i = 0;
        while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
            $userComments[$i]['id'] = $row['id'];
            $userComments[$i]['name'] = $row['name'];
            $userComments[$i]['comment'] = $row['comment'];
            $i++;
        }
        return $userComments;

    }

    public static function getCom($user_id)
    {
        $db = Db::getConnection();
        $result = $db->query("SELECT comment FROM user WHERE id=" . $user_id);
        return $row = $result->fetch(PDO::FETCH_ASSOC);

    }

    public static function UserAddComment($id, $userPlus)
    {
        $db = Db::getConnection();
        $result = $db->query("UPDATE user SET comment ={$userPlus} WHERE id=" . $id);

    }

    public static function getOnline($user_id)
    {
        $db = Db::getConnection();
        $result = $db->query("SELECT online FROM user WHERE id=" . $user_id);
        return $row = $result->fetch(PDO::FETCH_ASSOC);

    }

    public static function UserAddOnline($id, $userPlus)
    {
        $db = Db::getConnection();
        $result = $db->query("UPDATE user SET online ={$userPlus} WHERE id=" . $id);

    }

    public static function getOnlineUserAll($categoryId )
    {
        $db = Db::getConnection();

        $result = $db->query('SELECT count(online) AS count FROM user '
            . 'WHERE  online ="' . $categoryId . '"');
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $row = $result->fetch();

        return $row['count'];
    }

    public static function getUserListByOnline($categoryId, $page = 1)
    {
        $page = intval($page);
        $offset = ($page - 1) * self::SHOW_BY_DEFAULT;

        $db = Db::getConnection();
        $users = array();
        $result = $db->query("SELECT `name`, `online` FROM `user` WHERE `online` = {$categoryId} ORDER BY `id` DESC "
            . "LIMIT " . self::SHOW_BY_DEFAULT
            . ' OFFSET ' . $offset);

        $i = 0;
        while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
            $users[$i]['name'] = $row['name'];
            $users[$i]['online'] = $row['online'];
            $i++;
        }

        return $users;
    }


}