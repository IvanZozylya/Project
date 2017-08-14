<?php require_once ROOT."/views/layouts/header.php"?>
    <div class="container">
    <div class="row otstup">
    <div class="col-md-2"></div>
    <div class="col-md-8">
<h2>Топ 5 комментаторов</h2><br>
    <?php foreach ($userTop as $top) : ?>
    <ul>
        <li>Name: <a href="/comments/user/<?php echo $top['id'];?>"><b><?php echo $top['name']?></b></a>, Comments:<b> <?php echo $top['comment']?></b></li>
    </ul>
    <?php endforeach; ?>
    </div></div></div>
<?php require_once ROOT."/views/layouts/footer.php"?>