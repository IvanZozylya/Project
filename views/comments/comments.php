<h2>Комментарии</h2>
<?php if(!User::isGuest()) : ?>
<div>->><a href="/comments/add">Добавить комментарий</a><<-</div>
<?php endif; ?>

<div>
    <h4>Читающих новость сейчас : <span id="number_vists">13</span></h4>
    <h4><span>  Всего прочитавших : <?php echo $count; ?></span></h4>
</div>


<script src="https://code.jquery.com/jquery-3.1.0.js"></script>
<script>
    var options ={
        rateMax: 5,
        rateMin: 1
    }

    function getNextRate() {
        var num = Math.floor(Math.random() * (options.rateMax - options.rateMin + 1)) + options.rateMin;
        $('#number_vists').text(num);

        setTimeout(getNextRate, 3000);
    }

    getNextRate();
</script>


<?php foreach ($comments as $comment) : ?>

    <div><pre><?php echo $comment['description']; ?>
        Date: <?php echo $comment['date']; ?>

        <?php foreach ($user as $userName) : ?>
            <?php if ($comment['current_user_id'] == $userName['id'])
                echo "<pre> User: ".$userName['name']."</pre>"; ?>
        <?php endforeach; ?>
        </pre></div>
    <hr>

<?php endforeach; ?>

<div class="col-md-4 col-md-offset-4">
    <?php echo $pagination->get(); ?>
</div>
