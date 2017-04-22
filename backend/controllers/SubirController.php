<?php

namespace backend\controllers;
use backend\models\FotoPerfil;
use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

class SubirController extends Controller
{
    
    
     public function actionView($id)
    {
        return $this->render('view_perfil', [
            'model' => $this->findModel($id),
        ]);
    }
    
    public function actionIndex()
    {
        $model = new FotoPerfil();
        
        if ($model->load(Yii::$app->request->post()) ) {
            $model->id_user = Yii::$app->user->id;
            
            $model->url= UploadedFile::getInstance($model, 'url');
           
            $model->url->saveAs('foto_perfil/'.$model->url->baseName.'.'.$model->url->extension);
            
            $model->url='foto_perfil/'.$model->url->baseName.'.'.$model->url->extension;
            $model->save();
            
            $msg = $model->url;
            
            return $this->redirect(['site/index',]);
        } else {
            return $this->render('index', [
                'model' => $model, 'msg'=> $model->url
            ]);
        }
    }

}
