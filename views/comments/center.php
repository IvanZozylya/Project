<?php require_once ROOT . "/views/layouts/header.php"; ?>
<?php foreach ($userComment as $comment) : ?>
<ul>
    <li><?php echo $comment['description'];?> <a href="/item/<?php echo $comment['news_id']?>">Перейти</a></li>
</ul>

<?php endforeach; ?>
<ul>
    <a href="/comments/top"><li><h4>Вернуться</h4></li></a>
</ul>
<div class="col-md-4 col-md-offset-4">
    <?php echo $pagination->get(); ?>
</div>
<?php require_once ROOT . "/views/layouts/footer.php"; ?>
