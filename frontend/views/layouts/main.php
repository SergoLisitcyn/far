<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use common\widgets\Alert;
use \frontend\widgets\Main;
AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta property="og:image" content="path/to/image.jpg">
    <link rel="icon" href="/img/favicon/faviconM.ico">
<!--    <link rel="apple-touch-icon" sizes="180x180" href="/img/favicon/apple-touch-icon-180x180.png">-->
    <meta name="theme-color" content="#000">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<?php
$route = Yii::$app->controller->route;

if($route == 'vacancy/view'){
    $bodyId = 'vacancyPage';
} elseif ($route == 'site/about' || $route == 'site/terms'){
    $bodyId = 'decisionsPage';
} else {
    $bodyId = 'isHome';
}
?>
<body id="<?= $bodyId ?>">
<?php $this->beginBody() ?>

<div class="wrap">
    <header class="header" id="company">
        <div class="container">
            <?php if( Yii::$app->session->hasFlash('success') ): ?>
                <div class="alert alert-success alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <?php echo Yii::$app->session->getFlash('success'); ?>
                </div>
            <?php endif;?>
            <div class="header__top">
                <a href="/">
                    <img class="header__logo" src="/img/logo.svg" alt="logo">
                </a>
                <div class="header__menu menu">
                    <div class="menu__icon icon-menu">
                        <span></span>
                        <span></span>
                        <span></span>
                    </div>
                    <div class="menu__body">
                        <nav class="menu__nav">
                            <ul class="menu__list">
                                <?= Main::widget(['type' => 'linkCompany']) ?>
                                <li class="menu__item"><a href="/#decisions " class="menu__link to-decisions">Решения</a></li>
                                <li class="menu__item"><a href="/#vacancies" class="menu__link to-vacancies">Вакансии</a></li>
                                <li class="menu__item"><a href="/#contacts" class="menu__link to-contacts">Контакты</a></li>
                            </ul>
                        </nav>
                    </div>
                </div>
                <div class="header__phone">
                    <div class="phone">
                        <?= Main::widget(['type' => 'header_phone']) ?>
                    </div>
                </div>
            </div>

            <?php if(Yii::$app->controller->route == 'site/index') {
               echo Main::widget(['type' => 'headerContent']);
            }
            ?>
        </div>
    </header>

    <main>
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= $content ?>
    </main>
</div>

<footer class="footer">
    <div class="container">
        <div class="footer__row">
            <img src="/img/logo-white.svg" alt="" class="footer__logo">
            <div class="footer__box">
                <div class="footer__info">
                    <div class="footer__addr footer__contacts">Контакты</div>
                    <?= Main::widget(['type' => 'footer']) ?>
                </div>
                <div class="footer__menu">
                    <div class="footer__col">
                        <a href="#company" class="footer__link to-company">О компании</a>
                        <a href="decisions" class="footer__link to-decisions">Решения</a>
                    </div>
                    <div class="footer__col">
                        <a href="#vacancies" class="footer__link to-vacancies">Вакансии</a>
                        <a href="#contacts" class="footer__link to-contacts">Контакты</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer__copyright">© Fairtech.ru  Все права защищены.</div>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
