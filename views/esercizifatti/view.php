<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Esercizifatti */

$this->title = $model->idTerapia;
$this->params['breadcrumbs'][] = ['label' => 'Esercizifattis', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="esercizifatti-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'idTerapia' => $model->idTerapia, 'idEsercizio' => $model->idEsercizio], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'idTerapia' => $model->idTerapia, 'idEsercizio' => $model->idEsercizio], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'idTerapia',
            'idEsercizio',
            'stato',
        ],
    ]) ?>

</div>
