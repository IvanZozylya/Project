<?php

class ItemController
{
    public function actionShowItem($categoryId,$page = 1)
    {

        $newsList1 = News::actionNewsIndex(1);
        $newsList2 = News::actionNewsIndex(2);
        $newsList3 = News::actionNewsIndex(3);
        $newsList4 = News::actionNewsIndex(4);
        $newsList5 = News::actionNewsIndex(5);


        $getItem = News::getItemNewsById($categoryId);

        $comments = Comments::getItemList($categoryId,$page);
        $user = Comments::getUser();

        $total = Comments::getTotalItemInCategory($categoryId);


        $pagination = new Pagination($total, $page, News::SHOW_BY_DEFAULT, 'page-');
        $count = count($_SESSION['user']);

       require_once ROOT.'/views/news/getItem.php';
        return true;

    }

}