<?php

use app\models\Esercizifatti;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\EsercizifattiSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Esercizifattis';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="esercizifatti-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Esercizifatti', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'idTerapia',
            'idEsercizio',
            'stato',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Esercizifatti $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'idTerapia' => $model->idTerapia, 'idEsercizio' => $model->idEsercizio]);
                 }
            ],
        ],
    ]); ?>


</div>
