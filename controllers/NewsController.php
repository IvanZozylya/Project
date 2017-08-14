<?php

class NewsController
{
    public static $name;


    public function actionIndex($categoryId, $page = 1)
    {

        $newsList1 = News::actionNewsIndex(1);
        $newsList2 = News::actionNewsIndex(2);
        $newsList3 = News::actionNewsIndex(3);
        $newsList4 = News::actionNewsIndex(4);
        $newsList5 = News::actionNewsIndex(5);
        $newsList6 = News::actionNewsIndex(6);

        //Мои наработки


        $sportList = array();
        $sportList = News::getNewsListByCategory($categoryId, $page);

        $total = News::getTotalNewsInCategory($categoryId);

        $pagination = new Pagination($total, $page, News::SHOW_BY_DEFAULT, 'page-');

        require_once(ROOT . '/views/news/view.php');
        return true;
    }

    public function actionTop3()
    {
        //Получить количество записей(счетчик) за последные сутки нужной новости
        //$sql = "SELECT COUNT(*) FROM `comments` WHERE date < '2017-08-13 04:21:30' AND `news_id` = 28";

        //Топ 3 активные темы за сутки(ищем по дате)
//        $days = date("d");
//        $daysIn = intval($days) - 1;
//        var_dump($daysIn);
//        $day = date("Y-m-d H:i:s");
//        $pattern = "([0-9]+)-([0-9]+)-([0-9]+) ([0-9]+):([0-9]+):([0-9]+)";
//        $path = "$1-$2-$daysIn $4:$5:$6";
//        $intvas = preg_replace("~$pattern~", $path, $day);
//
        $newsList1 = News::actionNewsIndex(1);
        $newsList2 = News::actionNewsIndex(2);
        $newsList3 = News::actionNewsIndex(3);
        $newsList4 = News::actionNewsIndex(4);
        $newsList5 = News::actionNewsIndex(5);

        $top3News = array();
        $top3News = News::Top3News();
        require_once ROOT . '/views/news/top3.php';
        return true;
    }

}