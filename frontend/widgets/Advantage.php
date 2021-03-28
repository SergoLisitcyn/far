<?php


namespace frontend\widgets;


use common\models\Advantages;
use yii\bootstrap\Widget;

class Advantage  extends Widget
{

    public function init()
    {
        parent::init();
    }

    public function run()
    {
        $advantages = Advantages::find()->where(['status' => 1])->orderBy(['sort' => SORT_ASC])->all();

        return $this->render('advantages',['advantages' => $advantages]);
    }
}