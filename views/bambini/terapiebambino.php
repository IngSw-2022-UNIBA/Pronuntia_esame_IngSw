<?php

use app\models\TerapiaAssegnata;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\TerapiaAssegnataSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
/* @var $idBambino */

$this->title = 'Terapia Assegnata';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="terapia-assegnata-index">

    <h1><?= Html::encode("Elenco delle terapie del bambino") ?></h1>

    <p>
        <?= Html::a('Crea una nuova terapia', ['terapia-assegnata/create', 'bambino' => $idBambino], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'idBatteria',
            'data',
            'Diagnosi:ntext',
            [
                'header' => '',
                'content' => function($model){
                    return Html::a('Modifica', ['terapia-assegnata/update', 'idTerapia' => $model->idTerapia], ['class' => 'btn btn-primary']);
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
