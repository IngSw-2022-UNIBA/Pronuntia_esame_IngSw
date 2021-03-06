<?php

namespace app\controllers;
use app\views\logopedisti\create;

use app\models\Utenti;
use app\models\UtentiSearch;
use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * UtentiController implements the CRUD actions for Utenti model.
 */
class UtentiController extends Controller
{
    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                'verbs' => [
                    'class' => VerbFilter::className(),
                    'actions' => [
                        'delete' => ['POST'],
                    ],
                ],
            ]
        );
    }

    /**
     * Lists all Utenti models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new UtentiSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Utenti model.
     * @param int $idUtente Id Utente
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($idUtente)
    {
        return $this->render('view', [
            'model' => $this->findModel($idUtente),
        ]);
    }

    /**
     * Creates a new Utenti model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Utenti();

        if ($this->request->isPost) {


            if ($model->load($this->request->post())  ) {
                $model->password = Yii::$app->security->generatePasswordHash($model->password);
                $model->save($runValidation = false);
                //return LogopedistiController::actionForm();    //per aprire subito dopo il form del logopedista (ammettendo che si ha scelto come tipo il logopedista)
                return $this->redirect(['site/login']);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }


    /**
     * Updates an existing Utenti model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $idUtente Id Utente
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($idUtente)
    {
        $model = $this->findModel($idUtente);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['index', 'idUtente' => $model->idUtente]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Utenti model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $idUtente Id Utente
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($idUtente)
    {
        $this->findModel($idUtente)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Utenti model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $idUtente Id Utente
     * @return Utenti the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($idUtente)
    {
        if (($model = Utenti::findOne(['idUtente' => $idUtente])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
