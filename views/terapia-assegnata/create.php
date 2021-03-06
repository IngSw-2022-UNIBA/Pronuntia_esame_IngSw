<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\TerapiaAssegnata */
/* @var $bambino app\models\TerapiaAssegnata */

$this->title = 'Create Terapia Assegnata';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="terapia-assegnata-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'bambino' => $bambino,
    ]) ?>

</div>
