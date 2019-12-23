<?php
use yii\helpers\Html;
use app\assets\AppAsset;
use yii\bootstrap\Nav;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>TrainTicket</title>
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.3/jquery.min.js"></script>
    <script type="text/javascript">
    $(document).ready(function()
    {
        $(window).scroll(function()
        {
            if ($(this).scrollTop() > 100)
            {
                $('.scrollup').fadeIn();
            }
            else
            {
                $('.scrollup').fadeOut();
            }
        });
         
        $('.scrollup').click(function()
        {
            $("html, body").animate({ scrollTop: 0 }, 300);

            return false;
        });
    });
    </script>
    <?php $this->head() ?>
</head>
<body>
    <?php $this->beginBody() ?>
    <div class="wrapper">
        <div class="header-area">
            <div class="container">
                <div class="row">
                    <div class="col-md-3">
                        <div class="logo">
                            <h1><?= Html::img('/images/logo.png', ['width' => '200px', 'alt' => 'logo']) ?></h1>
                        </div>
                    </div>

                    <?php
                    echo Nav::widget([
                        'options' => ['class' => 'mainmenu'],
                        'items' => [
                            ['label' => 'Главная', 'url' => ['/site/index']],
                            ['label' => 'Расписание', 'url' => ['/site/timetable']],
                            ['label' => 'Поезда', 'url' => ['/site/trains_info']],
                            ['label' => 'Регистрация', 'url' => ['/site/registration']],
                            !Yii::$app->session['status'] ? (
                                ['label' => 'Авторизация', 'url' => ['/site/authorization']]
                            ) : (
                                ['label' => 'Личный кабинет', 'url' => ['/site/cabinet?id='.Yii::$app->session['id']]]
                            )
                        ],
                    ]);
                    ?>
                </div>
            </div>
        </div>
        <h1>TrainTicket</h3>
        <div class="container">
            <?= $content ?>
            <footer>
                <p>asdfasdfasdf</p>
            </footer>
        </div>
    </div>
    <a href="#" class="scrollup">Наверх</a>
    <?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
