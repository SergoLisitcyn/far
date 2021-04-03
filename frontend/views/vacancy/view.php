<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use \common\models\Otdel;
use \yii\helpers\Url;
/* @var $this yii\web\View */
/* @var $model common\models\Vacancy */

if($model['title']){
    $this->title = $model['title'];
}

$this->params['description'] = $this->registerMetaTag(['name' => 'description', 'content' => $model['description']]);
$this->params['keywords'] = $this->registerMetaTag(['name' => 'keywords', 'content' => $model['keywords']]);
\yii\web\YiiAsset::register($this);
?>
<section class="vacancy">
    <div class="container">
        <div class="vacancy__row">
            <div class="vacancy__top">
                <a href="#response" class="vacancy__link btn to-response">
                    <span class="vacancy__link-text">Откликнутся на вакансию</span>
                </a>
                <div class="accordion-menu">
                    <div class="accordion-menu__dropdownlink">
                        <div class="accordion-menu__dropdownlink-title">Все вакансии</div>
                    </div>
                    <div class="accordion-menu__content"></div>
                </div>
                <div class="vacancy__body">
                    <div class="vacancy__text">
                        <h1 class="vacancy__title"><?= $model->name ?></h1>
                        <?php $otdel = Otdel::find()->where(['id' => $model->parent_id])->one(); ?>
                        <span class="vacanies__info">
									<span class="vacanies__info-text"><?= $otdel->name ?></span>
									<span class="vacanies__info-point">•</span>
									<span class="vacanies__info-text"><?= $model->sfera ?></span>
									<span class="vacanies__info-point">•</span>
									<span class="vacanies__info-text"><?= $model->city ?></span>
									<span class="vacanies__info-point">•</span>
									<span class="vacanies__info-text"><?= $model->experience ?></span>
								</span>
                    </div>
                    <div class="vacancy__share">
                        <div class="vacancy__share-row">
                            <div class="vacancy__share-title">Поделиться вакансией</div>
                            <div class="vacancy__share-links">
                                <script src="https://yastatic.net/share2/share.js"></script>
                                <div class="ya-share2" data-curtain data-size="m" data-services="vkontakte,facebook,odnoklassniki,telegram"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="vacancy__content">
                <div class="vacancy__information">
                    <?= $model->content ?>
                    <a href="#response" class="vacancy__link btn to-response">
                        <span class="vacancy__link-text">Откликнутся на вакансию</span>
                    </a>
                    <div class="vacancy__share vacancy__share-d">
                        <div class="vacancy__share-row">
                            <div class="vacancy__share-title">Поделиться вакансией</div>
                            <div class="vacancy__share-links">
                                <script src="https://yastatic.net/share2/share.js"></script>
                                <div class="ya-share2" data-curtain data-size="m" data-services="vkontakte,facebook,odnoklassniki,telegram"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="vacancy__sidebar">
                    <div class="vacancy__box box">
                        <div class="box__title">Все вакансии</div>
                        <div class="box__content">
                            <ul class="box__list">
                                <?php foreach ($vacancy as $item) : ?>
                                <?php
                                    $otdel = Otdel::find()->where(['id' => $item->parent_id])->one();
                                    if($model->id == $item->id){
                                        $active = 'active';
                                    } else {
                                        $active = '';
                                    }
                                ?>
                                <li class="box__item">
                                    <a href="<?= Url::toRoute(['vacancy/view', 'url' => $item->url]) ?>">
                                        <div class="box__item-title <?= $active ?>"><?= $item->name?></div>
                                    </a>
                                    <div class="box__info">
                                        <span class="box__info-text"><?= $otdel->name?></span>
                                        <span class="box__info-point">•</span>
                                        <span class="box__info-text"><?= $item->sfera?></span>
                                        <span class="box__info-point">•</span>
                                        <span class="box__info-text"><?= $item->city?></span>
                                        <span class="box__info-point">•</span>
                                        <span class="box__info-text"><?= $item->experience?></span>
                                    </div>
                                </li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                    </div>
                    <div class="vacancy__sidebar-address">
                        <div class="vacancy__sidebar-address-title">Наш адрес</div>
                        <div class="vacancy__sidebar-address-text">Москва, 1-й Колобовский переулок, д.6, стр.3
                        </div>
                    </div>
                    <div class="vacancy__sidebar-map">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2244.400980935687!2d37.61273321541187!3d55.76890738055759!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x46b54a41d81e0031%3A0x31441cbfd54a6c2b!2zMS3QuSDQmtC-0LvQvtCx0L7QstGB0LrQuNC5INC_0LXRgC4sIDYg0YHRgtGA0L7QtdC90LjQtSAzLCDQnNC-0YHQutCy0LAsINCg0L7RgdGB0LjRjywgMTI3MDUx!5e0!3m2!1sru!2sua!4v1595364791759!5m2!1sru!2sua" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="response" id="response">
    <div class="container">
        <div class="response__row">
            <h2 class="response__title">Откликнуться на вакансию</h2>
            <h3 class="response__subtitle">Расскажите нам о себе и мы обязательно свяжемся с вами</h3>
            <form class="vacancy__form" action="/vacancy/<?php echo $model['url'] ?>" method="post" enctype="multipart/form-data">
                <div class="vacancy__form-wrap">
                    <div class="vacancy__form-col">
                        <div class="vacancy__form-item">
                            <div class="vacancy__form-label">Ваша фамилия</div>
                            <input type="text" class="vacancy__form-input" name="Feedback[surname]" placeholder="Введите фамилию" required>
                        </div>
                    </div>
                    <div class="vacancy__form-col">
                        <div class="vacancy__form-item">
                            <div class="vacancy__form-label">Ваше имя</div>
                            <input type="text" class="vacancy__form-input" name="Feedback[name]" placeholder="Введите имя" required>
                        </div>
                    </div>
                </div>
                <div class="vacancy__form-wrap">
                    <div class="vacancy__form-col">
                        <div class="vacancy__form-item">
                            <div class="vacancy__form-label">Ваше отчество</div>
                            <input type="text" class="vacancy__form-input" name="Feedback[patronymic]" placeholder="Введите отчество">
                        </div>
                    </div>
                    <div class="vacancy__form-col">
                        <div class="vacancy__form-item">
                            <div class="vacancy__form-label">Моб. телефон</div>
                            <input type="text" class="vacancy__form-input phone" name="Feedback[phone]" required>
                        </div>
                    </div>
                </div>
                <div class="vacancy__dropzone">
                    <div class="vacancy__dropzone-label">
                        <div class="vacancy__dropzone-title">Прикрепить резюме</div>
                    </div>
                    <div class="vacancy__dropzone-body">
                        <div class="vacancy__dropzone-message">
                            <div class="vacancy__dropzone-input">
                                <input type="file" name="Feedback[file]" class="file-upload-input input"
                                       onchange="readURL(this);" accept=".pdf,.docx,.doc">
                            </div>
                            <div class="vacancy__dropzone-message-title">
                                Перетащите файлы сюда или нажмите (pdf, doc)
                            </div>
                        </div>
                        <div class="vacancy__dropzone-upload">
                            <div class="vacancy__dropzone-upload-message">
                                <img class="vacancy__dropzone-upload-image" src="/img/check.svg" alt="Ваше резюме">
                                <div class="vacancy__dropzone-upload-message-text">Ваше резюме загружено</div>
                            </div>
                            <div class="vacancy__dropzone-upload-remove-wrap">
                                <button type="button" onclick="removeUpload()"
                                        class="vacancy__dropzone-upload-remove">Удалить <span
                                            class="vacancy__dropzone-upload-title">Uploaded Image</span></button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="vacancy__dropzone-link">
                    <label for="dropzone-link" class="vacancy__dropzone-link-label label">Или вставьте ссылку на
                        резюме hh.ru</label>
                    <input type="text"  name="Feedback[link]" id="dropzone-link" class="dropzone-link vacancy__dropzone-link-input">
                </div>
                <div class="accept">
                    <input type="checkbox" id="accept__privacy">
                    <label for="accept__privacy">Я согласен <a href="/terms"  target="_blank">условиями обработки и
                            использования</a> моих персональных данных</label>
                </div>
                <button class="vacancy__btn btn btn--dark-blue">Отправить</button>
            </form>
        </div>
    </div>
</section>
