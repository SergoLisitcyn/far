<div class="advantages__items">
    <?php foreach ($advantages as $advantage) : ?>
    <div class="advantages__item item">
        <img src="<?= $advantage->image ?>" alt="<?= $advantage->alt ?>" class="item__image">
        <p class="item__text"><?= $advantage->content ?></p>
    </div>
    <?php endforeach; ?>
</div>
