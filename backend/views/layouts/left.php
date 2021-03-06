<aside class="main-sidebar">

    <section class="sidebar">

        <!-- /.search form -->
        <?= dmstr\widgets\Menu::widget(
            [
                'options' => ['class' => 'sidebar-menu tree', 'data-widget'=> 'tree'],
                'items' => [
                    ['label' => 'Navigation', 'options' => ['class' => 'header']],
                    ['label' => 'Список резюме', 'icon' => 'address-card', 'url' => ['feedback/index']],
                    ['label' => 'Вакансии', 'icon' => 'list-alt', 'url' => ['vacancy/index']],
                    ["label" => "Справочник отделов", "url" => ["otdel/index"], "icon" => "book"],
                    ["label" => "Главная страница", "url" => ["main-page/update?id=1"], "icon" => "cog"],
                    ["label" => "Cтраница 'О компании'", "url" => ["about/update?id=1"], "icon" => "building"],
                    ["label" => "Преимущества", "url" => ["advantages/index"], "icon" => "trophy"],
                    ["label" => "Решения", "url" => ["solutions/index"], "icon" => "building-o"],
                    ["label" => "Согласия на обработку ПД", "url" => ["terms/update?id=1"], "icon" => "wrench"],
                ],
            ]
        ) ?>
    </section>

</aside>
