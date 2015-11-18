<?php
use ra\admin\widgets\Analytics;
use yii\helpers\Html;
use app\assets\AppAsset;

/* @var $this \yii\web\View */
/* @var $content string */

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/vnd.microsoft.icon" href="/favicon.ico"/>
    <link rel="icon" type="image/x-icon" href="/favicon.ico"/>
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>

<?php $this->beginBody() ?>

<?= $content ?>

<?= Analytics::widget([
    'ya' => null,
    'ga' => null,
]); ?>

<?php $this->endBody() ?>

</body>
</html>
<?php $this->endPage() ?>
