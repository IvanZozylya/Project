<?php

class SiteController
{
    public function actionIndex()
    {
        $categoryList = array();
        $categoryList = Category::getCategory();

        $newsList1 = News::actionNewsIndex(1);
        $newsList2 = News::actionNewsIndex(2);
        $newsList3 = News::actionNewsIndex(3);
        $newsList4 = News::actionNewsIndex(4);
        $newsList5 = News::actionNewsIndex(5);


        require_once(ROOT . '/views/site/index.php');
        return true;
    }

}