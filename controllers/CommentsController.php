<?php

class CommentsController
{
    public function actionAdd()
    {
        $newsList1 = News::actionNewsIndex(1);
        $newsList2 = News::actionNewsIndex(2);
        $newsList3 = News::actionNewsIndex(3);
        $newsList4 = News::actionNewsIndex(4);
        $newsList5 = News::actionNewsIndex(5);

        $date = date("Y-m-d H:i:s");
        $userId = User::checkLogged();

        $segment = $_SERVER['HTTP_REFERER'];
        $pop = explode('/', $segment);

        $arr = array_pop($pop);
        $data = $_POST['date'];
        $description = $_POST['description'];
        $news_id = $_POST['news_id'];

        if (isset($_POST['submit'])) {
            if (isset($_POST['description']) && !empty($_POST['description'])) {
                $result = Comments::CommentsAdd($userId, $data, $description, $news_id);
                $user = User::getCom($userId);
                $userPlus = $user['comment'] + 1;
                $userAdd = User::UserAddComment($userId, $userPlus);
                header("Location: /");
            }
        }


        require_once ROOT . '/views/comments/add.php';
        return true;
    }

    public function actionTop()
    {
        $newsList1 = News::actionNewsIndex(1);
        $newsList2 = News::actionNewsIndex(2);
        $newsList3 = News::actionNewsIndex(3);
        $newsList4 = News::actionNewsIndex(4);
        $newsList5 = News::actionNewsIndex(5);

        $userTop = array();
        $id = User::checkLogged();
        $userTop = User::UserComments();

        require_once(ROOT . '/views/comments/top.php');
        return true;
    }

    public function actionCenter($categoryId,$page=1)
    {
        $id = User::checkLogged();
        $newsList1 = News::actionNewsIndex(1);
        $newsList2 = News::actionNewsIndex(2);
        $newsList3 = News::actionNewsIndex(3);
        $newsList4 = News::actionNewsIndex(4);
        $newsList5 = News::actionNewsIndex(5);

        $userComment = Comments::CommentUserCenter($categoryId,$page);

        $total = Comments::countComments($categoryId);
        $pagination = new Pagination($total, $page, News::SHOW_BY_DEFAULT, 'page-');

        require_once ROOT . '/views/comments/center.php';
        return true;
    }

}