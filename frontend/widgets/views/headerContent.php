<div class="header__content">
    <div class="header__info">
        <h1 class="header__title"><?= $mainPage->header_title ?></h1>
        <h2 class="header__subtitle"><?= $mainPage->header_subtitle ?> </h2>
        <div class="header__descr"><?= $mainPage->header_desc ?></div>
        <?php if ($about->status == 1) :?>
        <a href="about" class="header__button btn">Подробнее</a>
        <?php endif; ?>
    </div>
    <div class="header__image">
        <img src="/img/header-image.png" alt="">
    </div>
</div>
