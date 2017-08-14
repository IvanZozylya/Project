<?php require_once ROOT . '/views/layouts/header.php'; ?>
<div class="container">
    <div class="row otstup">
        <div class="col-md-2"></div>
        <div class="col-md-8">
<ul>
    <h4><li><a href="/user/online/1">User Online</a></li></h4>
    <h4><li><a href="/user/online/0">User Offlane</a></li></h4>
</ul>
<h3><?php if ($categoryId == 1)
        echo "Users Online : " . $total;
    elseif ($categoryId == 0) {
        echo "Users Offlane: " . $total;
    } else {
        echo "Эти данные недоступны";
    } ?></h3>
<?php foreach ($userOnline as $online) : ?>
    <ul>
        <li><b><?php echo $online['name']; ?> <?php if ($online['online'] == 1) echo "Online";
                elseif ($categoryId == 0) {
                    echo "Offlane";
                } ?></b></li>
    </ul>
<?php endforeach; ?>
        </div></div></div>
<div class="col-md-4 col-md-offset-4">
    <?php echo $pagination->get(); ?>
</div>

<?php require_once ROOT . '/views/layouts/footer.php'; ?>
