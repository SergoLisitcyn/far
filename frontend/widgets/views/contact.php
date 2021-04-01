<div class="contacts__name"><?= $mainPage->name_company ?> </div>
<a class="contacts__link" href="<?= $mainPage->site ?>"><?= $mainPage->site ?></a>
<div class="contacts__info">
    <div class="contacts__addr contacts__location"><?= $mainPage->address ?></div>
    <?php if($mainPage->phone) :?>
    <div class="contacts__addr contacts__phone">тел.: <a href="tel:<?= $mainPage->phone ?>"><?= $mainPage->phone ?></a></div>
    <?php endif; ?>
    <?php if($mainPage->email_contact) :?>
    <div class="contacts__addr contacts__mail">email: <a href="mailto:<?= $mainPage->email_contact ?>"><?= $mainPage->email_contact ?></a></div>
    <?php endif; ?>
</div>
