<?php

//non ha senso, ma va inserito manualmente 
use app\models\Utenti;

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel app\models\UtentiSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Utentis';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="utenti-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Utenti', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'idUtente',
            'email:email',
            'password',
            'tipoUtente',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Utenti $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'idUtente' => $model->idUtente]);
                 }
            ],
        ],
    ]); ?>


</div>
