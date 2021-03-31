<?php

use yii\helpers\Html;
use yii\helpers\Url;

/**
 * @var $fullName
 * @var $avatar
 */
?>

<li class="dropdown user user-menu">
    <a href="#" class="dropdown-toggle caret-direct" data-toggle="dropdown" style="padding-top: 13px;">
        <i class="fa fa-user-o" style="font-size: 20px;vertical-align: middle"></i>
        <span class="hidden-xs capitalize">Админ</span>
        <span><i class="fa fa-caret-down caret-arrow" style="margin-left: 5px;"></i></span>
    </a>
    <ul class="dropdown-menu">
        <!-- User image -->
        <li class="user-header">
            <p>
                <span class="capitalize bold">Админ</span>
                <small>Зарегистрирован <?php echo date('M Y',Yii::$app->user->identity->created_at);?></small>
            </p>
        </li>
        <!-- Menu Body -->

        <!-- Menu Footer-->
        <li class="user-footer">
            <div class="pull-right">
                <?= Html::a(
                    '<i class="fa fa-sign-out"></i> Выход',
                    ['/site/logout'],
                    ['data-method' => 'post', 'class' => 'mbtn mbtn-gray mbtn-sm']
                ) ?>
            </div>
        </li>
    </ul>
</li>
