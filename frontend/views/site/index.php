<?php

/* @var $this yii\web\View */
use \frontend\widgets\Main;
use \frontend\widgets\Advantage;
use \frontend\widgets\Solution;
use \common\models\Otdel;
use \yii\helpers\Url;
if($mainPage['title']){
    $this->title = $mainPage['title'];
}

$this->params['description'] = $this->registerMetaTag(['name' => 'description', 'content' => $mainPage['description']]);
$this->params['keywords'] = $this->registerMetaTag(['name' => 'keywords', 'content' => $mainPage['keywords']]);
?>
<section class="advantages">
    <div class="container">
        <h2 class="advantages__title title title--white">Наши преимущества</h2>
        <div class="advantages__slider slider">
            <?= Advantage::widget(); ?>
            <div class="slider__arrow"></div>
        </div>
    </div>
</section>

<section class="decisions" id="decisions">
    <div class="container">
        <h2 class="decisions__title title">Решения</h2>
        <?= Solution::widget(); ?>
    </div>
</section>

<section class="vacancies" id="vacancies">
    <div class="container">
        <div class="vacancies__row">
            <h2 class="vacancies__title title title--white">Вакансии</h2>
            <ul class="vacancies__list">
                <?php foreach ($vacancy as $item) :  ?>
                <?php $otdel = Otdel::find()->where(['id' => $item->parent_id])->one(); ?>
                <li class="vacancies__item">
                    <a href="<?= Url::toRoute(['vacancy/view', 'url' => $item->url]) ?>" class="vacancies__link">
                        <h3 class="vacancies__link-title"><?php echo $item->name ?></h3>
                        <span class="vacancies__info">
									<span class="vacancies__info-text"><?php echo $otdel->name ?></span>
									<span class="vacancies__info-point">•</span>
									<span class="vacancies__info-text"><?php echo  $item->sfera ?></span>
									<span class="vacancies__info-point">•</span>
									<span class="vacancies__info-text"><?php echo  $item->city ?></span>
									<span class="vacancies__info-point">•</span>
									<span class="vacancies__info-text"><?php echo  $item->experience ?></span>
								</span>
                    </a>
                </li>
                <?php endforeach; ?>
            </ul>
            <div class="vacancies__message">
                <p class="vacancies__message-text">Если вы хотите у нас работать, но не нашли подходящей вакансии, вы можете направить ваше резюме в Отдел по работе с персоналом на почту <a class="vacancies__message-email" href="mailto:hr@fairtech.ru">hr@fairtech.ru</a> или заполнить форму обратной связи</p>

                <p class="vacancies__message-text">Ваше резюме будет добавлено в нашу базу данных. Ответственный за подбор персонала специалист свяжется с вами в случае возникновения подходящей вакансии.</p>
            </div>
        </div>
    </div>
</section>

<section class="response">
    <div class="container">
        <div class="response__row">
            <h2 class="response__title">Откликнуться на вакансию</h2>
            <h3 class="response__subtitle">Расскажите нам о себе и мы обязательно свяжемся с вами</h3>
            <form class="vacancy__form" action="/" method="post" enctype="multipart/form-data">
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

<section class="contacts" id="contacts">
    <div class="container">
        <div class="contacts__row">
            <div class="contacts__box">
                <h2 class="contacts__title title">Контакты</h2>
                <?= Main::widget(['type' => 'contact']) ?>
            </div>
            <div class="contacts__map">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2244.4016758768034!2d37.61291560562487!3d55.768895309925846!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x46b54a41d81e0031%3A0x31441cbfd54a6c2b!2zMS3QuSDQmtC-0LvQvtCx0L7QstGB0LrQuNC5INC_0LXRgC4sIDYg0YHRgtGA0L7QtdC90LjQtSAzLCDQnNC-0YHQutCy0LAsIDEyNzA1MQ!5e0!3m2!1sru!2sru!4v1616511329803!5m2!1sru!2sru" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
            </div>
        </div>
    </div>
</section>
