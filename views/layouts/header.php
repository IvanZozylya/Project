<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Новости</title>

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
          integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link href="/template/css/dopstyle.css" rel="stylesheet" media="screen">
    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css"
          integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
</head>
<body>

<nav class="navbar navbar-default" role="navigation">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse"
                    data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Навигация</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="/">Главная</a>
        </div>


        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">

                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Спорт<b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li><a href="/news/1">Список всех новостей</a></li>
                        <li class="divider"></li>
                        <?php foreach ($newsList1 as $news): ?>
                            <li><a href="/item/<?php echo $news['id'];?>"><?php echo $news['title'] ?></a></li>
                        <?php endforeach; ?>
                    </ul>
                </li>

                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Наука<b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li><a href="/news/2">Список всех новостей</a></li>
                        <li class="divider"></li>
                        <?php foreach ($newsList2 as $news): ?>
                            <li><a href="/item/<?php echo $news['id'];?>"><?php echo $news['title'] ?></a></li>
                        <?php endforeach; ?>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Шоу-бизнес<b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li><a href="/news/3">Список всех новостей</a></li>
                        <li class="divider"></li>
                        <?php foreach ($newsList3 as $news): ?>
                            <li><a href="/item/<?php echo $news['id'];?>"><?php echo $news['title'] ?></a></li>
                        <?php endforeach; ?>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Технологии<b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li><a href="/news/4">Список всех новостей</a></li>
                        <li class="divider"></li>
                        <?php foreach ($newsList4 as $news): ?>
                            <li><a href="/item/<?php echo $news['id'];?>"><?php echo $news['title'] ?></a></li>
                        <?php endforeach; ?>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Фоторепортаж<b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li><a href="/news/5">Список всех новостей</a></li>
                        <li class="divider"></li>
                        <?php foreach ($newsList5 as $news): ?>
                            <li><a href="/item/<?php echo $news['id'];?>"><?php echo $news['title'] ?></a></li>
                        <?php endforeach; ?>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Остальное<b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li><a href="/news/6">Аналитика</a></li>
                        <li><a href="/comments/top">Топ 5 комментаторов</a></li>
                        <li><a href="/user/online/1">Онлайн</a></li>
                        <li><a href="/news/top3">Топ 3 активные темы</a></li>
                    </ul>
                </li>


            </ul>
            <form class="navbar-form navbar-left" role="search">
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Поиск">
                </div>
                <button type="submit" class="btn btn-default">Отправить</button>
            </form>
            <ul class="nav navbar-nav navbar-right">
                <?php if(User::isGuest()) :?>
                <li><a href="/user/register/">Регистрация</a></li>
                <li><a href="/user/login/">Вход</a></li>
                <?php else : ?>
                <li><a href="/user/logout/">Выход</a></li>
                <li><a href="/cabinet">Кабинет</a></li>
                <?php endif; ?>
            </ul>

        </div>
    </div>
</nav>
