<?php foreach ($solutions as $solution) : ?>
<div class="decisions__item">
    <div class="decisions__info">
        <h3 class="decisions__info-title"><?= $solution->title ?></h3>
        <p class="decisions__info-text"><?= $solution->content ?></p>
    </div>
    <img class="decisions__image" src="<?= $solution->image ?>" alt="">
</div>
<?php endforeach; ?>
