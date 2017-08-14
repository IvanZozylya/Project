<?php include_once(ROOT . '/views/layouts/header.php') ?>

    <div class="container">
        <div class="row otstup">
            <div class="col-md-2"></div>
            <div class="col-md-8">
                <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                    <!-- Indicators -->
                    <ol class="carousel-indicators">
                        <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                        <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                        <li data-target="#carousel-example-generic" data-slide-to="2"></li>
                    </ol>
                    <!-- Wrapper for slides -->
                    <div class="carousel-inner">
                        <div class="item active">
                            <img src="/template/images/slider/4.jpg" alt="...">
                            <div class="carousel-caption">
                                <h3>Что происходит?</h3>
                                <p>У нас возможно все.</p>
                            </div>
                        </div>

                        <div class="item">
                            <img src="/template/images/slider/2.jpg" alt="...">
                            <div class="carousel-caption">
                                <h3>Осень</h3>
                                <p>Осень — это вторая весна, когда каждый лист — цветок.</p>
                            </div>
                        </div>

                        <div class="item">
                            <img src="/template/images/slider/3.jpg" alt="...">
                            <div class="carousel-caption">
                                <h3>Дождь</h3>
                                <p>Осень опять идут дожди...</p>
                            </div>
                        </div>
                    </div>

                    <!-- Controls -->
                    <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
                        <span class="glyphicon glyphicon-chevron-left"></span>
                    </a>
                    <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
                        <span class="glyphicon glyphicon-chevron-right"></span>
                    </a>


<?php include_once(ROOT . '/views/layouts/footer.php'); ?>