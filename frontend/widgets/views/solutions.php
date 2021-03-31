<?php foreach ($solutions as $solution) :
    if($solution->sort == 0) :
?>
<div class="decisions__item">
    <div class="decisions__info">
        <h3 class="decisions__info-title"><?= $solution->title ?></h3>
        <p class="decisions__info-text"><?= $solution->content ?></p>
    </div>
    <img class="decisions__image" src="<?= $solution->image ?>" alt="<?= $solution->alt ?>">
</div>
<?php else: ?>
<div class="decisions__item">
    <img class="decisions__image" src="<?= $solution->image ?>" alt="<?= $solution->alt ?>">
    <div class="decisions__info">
        <h3 class="decisions__info-title"><?= $solution->title ?></h3>
        <p class="decisions__info-text"><?= $solution->content ?></p>
    </div>
</div>
<?php endif; ?>
<?php endforeach; ?>
