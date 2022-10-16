<?php

use app\assets\AppAsset;
use app\widgets\Alert;
use yii\bootstrap5\Breadcrumbs;
use yii\bootstrap5\Html;
use yii\bootstrap5\Nav;
use yii\bootstrap5\NavBar;
use yii\web\View;
use cetver\LanguageSelector\items\DropDownLanguageItem;

/** @var View $this */
/** @var string $content */

AppAsset::register($this);

$this->registerCsrfMetaTags();
$this->registerMetaTag(['charset' => Yii::$app->charset], 'charset');
$this->registerMetaTag(['name' => 'viewport', 'content' => 'width=device-width, initial-scale=1, shrink-to-fit=no']);
$this->registerMetaTag(['name' => 'description', 'content' => $this->params['meta_description'] ?? '']);
$this->registerMetaTag(['name' => 'keywords', 'content' => $this->params['meta_keywords'] ?? '']);
$this->registerLinkTag(['rel' => 'icon', 'type' => 'image/x-icon', 'href' => 'images/favicon/favicon.ico']);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>" class="h-100">
<head>
    <script src="https://kit.fontawesome.com/54e614519d.js" crossorigin="anonymous"></script>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body class="d-flex flex-column h-100">
<?php $this->beginBody() ?>

<header id="header">
    <?php
    $url = Yii::$app->urlManager->baseUrl.'/images/flags/';
    $languageItem = new DropDownLanguageItem([
        'languages' => [
            'cs' => '<img src="'. $url . '1.png'.'"> Čeština',
            'sk' => '<img src="'. $url . '2.png'.'"> Slovenština',
            'en' => '<img src="'. $url . '3.png'.'"> English',
        ],
        'options' => ['encode' => false],
    ]);
    NavBar::begin([
        'brandLabel' => Yii::$app->name,
        'brandUrl' => Yii::$app->homeUrl,
        'options' => ['class' => 'navbar-expand-md navbar-light bg-light fixed-top italicFont']
    ]);
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right ms-auto'],
        'items' => [
            ['label' => Yii::t('app', 'Home'), 'url' => ['/site/index']],
            ['label' => Yii::t('app', 'Shop'), 'url' => ['/site/shop']],
            ['label' => Yii::t('app', 'About'), 'url' => ['/site/about']],
            ['label' => Yii::t('app', 'Contact'), 'url' => ['/site/contact']],
            Yii::$app->user->isGuest
                ? ['label' => Yii::t('app', 'Login'), 'url' => ['/site/login']]
                : '<li class="nav-item me-auto">'
                    . Html::beginForm(['/site/logout'])
                    . Html::submitButton(
                        Yii::t('app', 'Logout'),
                        ['class' => 'nav-link btn btn-link logout']
                    )
                    . Html::endForm()
                    . '</li>',
        ]
    ]);
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right ml-auto languageSelectorStyle'],
        'items' => [
            $languageItem->toArray()
        ]
    ]);
    NavBar::end();
    ?>
</header>

<main id="main" class="flex-shrink-0" role="main">
    <div class="container">
        <?php if (!empty($this->params['breadcrumbs'])): ?>
            <?= Breadcrumbs::widget(['links' => $this->params['breadcrumbs']]) ?>
        <?php endif ?>
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
</main>

<footer id="footer" class="mt-auto py-3 bg-light">
    <div class="container">
        <div class="row text-muted">
            <div class="col-md-6 text-center text-md-start">&copy; <?= Yii::t('app', 'Created by Luboš Kučera ').date('Y') ?></div>
            <div class="col-md-6 text-center text-md-end"><?= Yii::powered() ?></div>
        </div>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
