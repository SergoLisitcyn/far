<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Advantages */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Преимущества', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="advantages-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Обновить', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Удалить', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Вы точно хотите удалить?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
//            'id',
            'content:ntext',
            [
                'label' => 'Изображение',
                'format' => 'raw',
                'value' => function ($model) {
                    if($model->image){
                        return Html::img($model->image,['style' => 'height: 60px;']);
                    } else {
                        return '';
                    }

                },
            ],
            [
                'label' => 'Статус',
                'value' => function ($model) {
                    $result = '';
                    if($model->status == 1){
                        $result .= 'Активен';
                    } else {
                        $result .= 'Неактивен';
                    }

                    return $result;
                },
            ],
            'sort',
        ],
    ]) ?>

</div>
