<?php

namespace frontend\controllers;

use common\models\Feedback;
use common\models\MainPage;
use Yii;
use common\models\Vacancy;
use common\models\VacancySearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * VacancyController implements the CRUD actions for Vacancy model.
 */
class VacancyController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Vacancy models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new VacancySearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Vacancy model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($url)
    {
        if(!$url){
            return $this->redirect('/');
        }
        $vacancy = Vacancy::find()->where(['status' => 1])->all();
        $model = Vacancy::find()->where(['status' => 1, 'url' => $url])->one();
        if(!$model){
            return $this->redirect('/');
        }
        $feedback = new Feedback();
        if ($feedback->load(Yii::$app->request->post())) {
            $file = UploadedFile::getInstance($feedback, 'file');
            if (!is_null($file)) {
                $feedback->file_src_filename = $file->name;
                $feedback->parent_id = $model->parent_id;
                $feedback->created_at = time();
                $ext = explode(".", $file->name);
                $feedback->filename = Yii::$app->security->generateRandomString(6) . ".{$ext[1]}";
                $path = Yii::getAlias('@frontend').'/web/uploads/'.$feedback->filename;
                $file->saveAs($path);
            }

            if ($feedback->save()) {

                Yii::$app->session->setFlash(
                    'success',
                    'Резюме отправлено. Спасибо!'
                );
                return $this->refresh();
            } else {
                Yii::$app->session->setFlash(
                    'success',
                    false
                );
            }
        }
        return $this->render('view', [
            'model' => $model,
            'vacancy' => $vacancy,
        ]);
    }

    /**
     * Creates a new Vacancy model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Vacancy();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Vacancy model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Vacancy model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Vacancy model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Vacancy the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Vacancy::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
