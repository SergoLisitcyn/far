<aside class="main-sidebar">

    <section class="sidebar">

        <!-- /.search form -->
        <?= dmstr\widgets\Menu::widget(
            [
                'options' => ['class' => 'sidebar-menu tree', 'data-widget'=> 'tree'],
                'items' => [
                    ['label' => 'Navigation', 'options' => ['class' => 'header']],
                    ['label' => 'Список резюме', 'icon' => 'book', 'url' => ['feedback/index']],
                    ['label' => 'Вакансии', 'icon' => 'book', 'url' => ['vacancy/index']],
                    ["label" => "Справочник отделов", "url" => ["otdel/index"], "icon" => "book"],
                    ["label" => "Главная страница", "url" => ["main-page/index"], "icon" => "book"],
                    ["label" => "Преимущества", "url" => ["advantages/index"], "icon" => "book"],
                    ["label" => "Решения", "url" => ["solutions/index"], "icon" => "book"],
                ],
            ]
        ) ?>
    </section>

</aside>
