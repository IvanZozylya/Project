<?php

return array(


    'item/([0-9]+)/page-([0-9]+)'=>'item/showItem/$1/$2',
    'news/([0-9]+)/page-([0-9]+)'=>'news/index/$1/$2',
    'user/online/([0-9]+)/page-([0-9]+)'=>'user/online/$1/$2',
    'news/([0-9]+)'=>'news/index/$1',
    'item/([0-9]+)'=>'item/showItem/$1',
    'comments/user/([0-9])+/page-([0-9]+)'=>'comments/center/$1/$2',
    'comments/user/([0-9])+'=>'comments/center/$1',



    'news/top3'=>'news/top3',
    'comments/add'=>'comments/add',
    'comments/top'=>'comments/top',
    'user/register'=>'user/register',
    'user/online'=>'user/online',
    'user/login'=>'user/login',
    'user/logout'=>'user/logout',
    'cabinet/edit'=>'cabinet/edit',
    'cabinet'=>'cabinet/index',

    '' => 'site/index', // actionIndex в SiteController
    
);
