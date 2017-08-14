<?php require_once ROOT . "/views/layouts/header.php" ;?>

<div class="panel">
    <div class="btn btn-primary">Топ 3</div>
    <?php foreach ($top3News as $top3) : ?>
        <ul>
            <li><h3><a href="/item/<?php echo $top3['id'];?>"><?php echo $top3['title']?></a></h3></li><li>Количество комментариев: <b><?php echo $top3['comment'];?></b></li>
        </ul>
    <?php endforeach; ?>
</div>

<?php require_once ROOT . "/views/layouts/footer.php" ;?>