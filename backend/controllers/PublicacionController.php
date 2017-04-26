<?php

namespace backend\controllers;

use Yii;
use backend\models\Publicacion;
use backend\models\PublicacionSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * PublicacionController implements the CRUD actions for Publicacion model.
 */
class PublicacionController extends Controller
{
    /**
     * @inheritdoc
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
     * Lists all Publicacion models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new PublicacionSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Publicacion model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Publicacion model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Publicacion();
        
        if ($model->load(Yii::$app->request->post()) ) {
            $model->id_user = Yii::$app->user->id;
            $nombreImagen = $model->titulo.$model->id_user;
            $model->url_imagen= UploadedFile::getInstance($model, 'url_imagen');
           
            $model->url_imagen->saveAs('imagenes/'.$nombreImagen.'.'.$model->url_imagen->extension);
            
            $model->url_imagen='imagenes/'.$nombreImagen.'.'.$model->url_imagen->extension;
            $model->save();
            
            return $this->redirect(['view', 'id' => $model->idpublicacion]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }

        /**if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->idpublicacion]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
         * 
         */
        
    }

    /**
     * Updates an existing Publicacion model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            $model->url_imagen = UploadedFile::getInstances($model, 'url_imagen');
            if ($model->upload()) {
                // file is uploaded successfully
                return;
            }
            
            return $this->redirect(['view', 'id' => $model->idpublicacion]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Publicacion model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Publicacion model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Publicacion the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Publicacion::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
