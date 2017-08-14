<?php include_once(ROOT . '/views/layouts/header.php') ?>
<div class="container">
    <div class="row otstup">
        <div class="col-md-2"></div>
        <div class="col-md-8">
            <h1>Роздел
                Новостей <?php if ($_SERVER['REQUEST_URI'] == "/news/6" || $_SERVER['REQUEST_URI'] == "/news/6/page-2" || $_SERVER['REQUEST_URI'] == "/news/6/page-1") echo "Аналитики" ?></h1>
            <?php foreach ($sportList as $sportNews): ?>
                <a href="/item/<?php echo $sportNews['id']; ?>"><p><?php echo $sportNews['title'] ?></p></a>
            <?php endforeach; ?>
            <div class="col-md-4 col-md-offset-4">
                <?php echo $pagination->get(); ?>
            </div>


            <?php include_once(ROOT . '/views/layouts/footer.php'); ?>
