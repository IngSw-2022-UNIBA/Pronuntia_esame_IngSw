<?php

use app\models\TerapiaAssegnata;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\TerapiaAssegnataSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Terapie personali';
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="terapia-assegnata-index">

    <h1><?= Html::encode("Le mie terapie") ?></h1>


    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'data',
            'Diagnosi:ntext',
            [
                'header' => '',
                'content' => function($model){
                    return Html::a('Esercizi', ['/esercizi/esercizibambino', 'idBatteria' => $model->idBatteria, 'idTerapia' => $model->idTerapia], ['class' => 'btn btn-primary']);
                }
            ],
            [
                'header' => '',
                'content' => function($model){
                    return Html::a('Statistiche', ['bambini/statistiche', 'idTerapia' => $model->idTerapia], ['class' => 'btn btn-secondary']);
                }
            ],
        ],
    ]); ?>


</div>
