<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
if($about->title){
    $this->title = $about->title;
}

$this->params['description'] = $this->registerMetaTag(['name' => 'description', 'content' => $about->description]);
$this->params['keywords'] = $this->registerMetaTag(['name' => 'keywords', 'content' => $about->keywords]);
?>
<section class="decisions">
    <div class="container">
        <h2 class="decisions__title title">О компании</h2>
        <?= $about->content ?>
    </div>
</section>

