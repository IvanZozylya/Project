<?php

class UserController
{
    public function actionRegister()
    {
        $newsList1 = News::actionNewsIndex(1);
        $newsList2 = News::actionNewsIndex(2);
        $newsList3 = News::actionNewsIndex(3);
        $newsList4 = News::actionNewsIndex(4);
        $newsList5 = News::actionNewsIndex(5);

        $name = '';
        $email = '';
        $password = '';
        $result = false;

        if (isset($_POST['submit'])) {
            $name = $_POST['name'];
            $email = $_POST['email'];
            $password = $_POST['password'];
        }
        $errors = false;

        if (!User::checkName($name)) {
            $errors[] = "Имя не должно быть короче двух символов";
        }


        if (!User::checkEmail($email)) {
            $errors[] = "Неправильный email";
        }


        if (!User::checkPassword($password)) {
            $errors[] = "Пароль не должен быть короче шести символов";
        }

        if (User::checkEmailExists($email)) {
            $errors[] = "Такой email уже используеться!";
        }

        if ($errors == false) {
            $result = User::register($name,$email,$password);
        }


        require_once(ROOT . '/views/user/register.php');

        return true;
    }

    public function actionLogin()
    {
        $newsList1 = News::actionNewsIndex(1);
        $newsList2 = News::actionNewsIndex(2);
        $newsList3 = News::actionNewsIndex(3);
        $newsList4 = News::actionNewsIndex(4);
        $newsList5 = News::actionNewsIndex(5);

        $email = '';
        $password = '';

        if (isset($_POST['submit'])) {
            $email = $_POST['email'];
            $password = $_POST['password'];

            $errors = false;

            // Валидация полей
            if (!User::checkEmail($email)) {
                $errors[] = 'Неправильный email';
            }
            if (!User::checkPassword($password)) {
                $errors[] = 'Пароль не должен быть короче 6-ти символов';
            }

            // Проверяем существует ли пользователь
            $userId = User::checkUserData($email, $password);

            if ($userId == false) {
                // Если данные неправильные - показываем ошибку
                $errors[] = 'Неправильные данные для входа на сайт';
            } else {
                // Если данные правильные, запоминаем пользователя (сессия)
                User::auth($userId);
                $userOnline = User::getOnline($userId);
                $userPlus = $userOnline['online'] + 1;
                $userAdd = User::UserAddOnline($userId, $userPlus);
                // Перенаправляем пользователя в закрытую часть - кабинет
                header("Location: /cabinet/");
            }

        }

        require_once(ROOT . '/views/user/login.php');

        return true;
    }

    /**
     * Удаляем данные о пользователе из сессии
     */
    public function actionLogout()
    {
        session_start();
        $userId = $_SESSION['user'];
        $userOnline = User::getOnline($userId);
        $userPlus = $userOnline['online'] - 1;
        $userAdd = User::UserAddOnline($userId, $userPlus);
        unset($_SESSION["user"]);
        header("Location: /");
    }

    public function actionOnline($categoryId=1,$page=1)
    {
        $newsList1 = News::actionNewsIndex(1);
        $newsList2 = News::actionNewsIndex(2);
        $newsList3 = News::actionNewsIndex(3);
        $newsList4 = News::actionNewsIndex(4);
        $newsList5 = News::actionNewsIndex(5);

        $userId = User::checkLogged();
        $userOnline = array();

        $userOnline = User::getUserListByOnline($categoryId,$page);

        $total = User::getOnlineUserAll($categoryId);

        $pagination = new Pagination($total, $page, News::SHOW_BY_DEFAULT, 'page-');


        require_once ROOT.'/views/user/online.php';
        return true;
    }

}