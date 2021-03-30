<?php
namespace frontend\widgets;

use common\models\About;
use common\models\MainPage;
use \yii\bootstrap\Widget;
class Main  extends Widget
{
    public $type;

    public function init()
    {
        parent::init();
    }

    public function run()
    {
        $mainPage = MainPage::findOne(1);
        $about = About::findOne(1);
        return $this->render($this->type,[
            'mainPage' => $mainPage,
            'about' => $about,
        ]);
    }
}