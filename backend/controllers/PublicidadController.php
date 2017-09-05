<?php

namespace backend\controllers;

use Yii;
use backend\models\Publicidad;
use backend\models\PublicidadSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * PublicidadController implements the CRUD actions for Publicidad model.
 */
class PublicidadController extends Controller
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
     * Lists all Publicidad models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new PublicidadSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Publicidad model.
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
     * Creates a new Publicidad model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Publicidad();

        if ($model->load(Yii::$app->request->post()) ) {
           if(empty($model->url_imagen_publicidad)){
              $model->url_imagen_publicidad = null;
              $model->save();
           }else{
            $randomString = Yii::$app->getSecurity()->generateRandomString(7);
            $model->url_imagen_publicidad = UploadedFile::getInstances($model, 'url_imagen_publicidad');
            $nombre = "pub-".$randomString;
            
            $model->url_imagen_publicidad->saveAs("publicidad/".$nombre.".".$model->url_imagen_publicidad->extension);
            $model->url_imagen_publicidad = "publicidad/".$nombre.".".$model->url_imagen_publicidad->extension;
            
            $model->save();
           }
            return $this->redirect(['view', 'id' => $model->id_publicidad]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * $model = $this->findModel($id);
 $oldImage = $model->d_img_path;
 if ($model->load(Yii::$app->request->post()))
 {
    $image = UploadedFile::getInstance($model, 'd_img_path');
    if(isset($image)){
        $model->d_img_path=  $model->d_nic.'.'.$image->extension;
    } else {
        $model->d_img_path = $oldImage;
    }
    if($model->save())
    {
        if(isset($image)){
            $image->saveAs('uploads/'.$model->d_img_path);   
        }
    }
    return $this->redirect('view');
     * 
     * 
     * Updates an existing Publicidad model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $viejourl = $model->url_imagen_publicidad;
        if ($model->load(Yii::$app->request->post())) {
            $imagen = UploadedFile::getInstance($model, 'url_imagen_publicidad');
            if (isset($imagen)){
                $randomString = Yii::$app->getSecurity()->generateRandomString(7);
                 $nombre = "pub-".$randomString;
                $model->url_imagen_publicidad = "publicidad/".$nombre.".".$imagen->extension;
            }else{
                $model->url_imagen_publicidad= $viejourl;
            }
            if ($model->save()){
                if(isset($imagen)){
                    $imagen->saveAs("publicidad/".$nombre.".".$imagen->extension);
                }
                    
            }
            return $this->redirect(['view', 'id' => $model->id_publicidad]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Publicidad model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $filename = $this->findModel($id)->url_imagen_publicidad;
        if(file_exists($filename)){
            unlink($filename);
        }
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Publicidad model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Publicidad the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Publicidad::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
