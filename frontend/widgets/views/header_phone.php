<?php if($mainPage->phone) :?>
    <img src="/img/phone.svg" alt="">
    <a href="tel:<?= $mainPage->phone ?>" class="phone__number"><?= $mainPage->phone ?></a>
<?php endif; ?>