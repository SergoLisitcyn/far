<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\MainPageSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Main Pages';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="main-page-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Main Page', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'header_title',
            'header_subtitle',
            'header_desc:ntext',
            'name_company',
            //'site',
            //'address',
            //'phone',
            //'email_contact:email',
            //'email_footer:email',
            //'advantages',
            //'title',
            //'description',
            //'keywords',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
