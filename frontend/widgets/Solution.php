<?php


namespace frontend\widgets;


use common\models\Solutions;
use yii\bootstrap\Widget;

class Solution  extends Widget
{

    public function init()
    {
        parent::init();
    }

    public function run()
    {
        $solutions = Solutions::find()->where(['status' => 1])->all();

        return $this->render('solutions',['solutions' => $solutions]);
    }
}
{

}