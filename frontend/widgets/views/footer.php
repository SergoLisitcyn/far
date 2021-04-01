<?php if($mainPage->email_footer) :?>
<div class="footer__addr footer__mail">email: <a href="mailto:<?= $mainPage->email_footer ?>"><?= $mainPage->email_footer ?></a></div>
<?php endif; ?>
<?php if($mainPage->phone) :?>
<div class="footer__addr footer__phone">phone: <a href="tel:<?= $mainPage->phone ?>"><?= $mainPage->phone ?></a></div>
<?php endif; ?>