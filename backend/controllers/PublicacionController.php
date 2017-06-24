<?php

namespace backend\controllers;

use Yii;
use backend\models\Publicacion;
use backend\models\PublicacionSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
use backend\models\Imagenes;
use yii\helpers\Json;
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
      if (!Yii::$app->user->isGuest) {
           $searchModel = new PublicacionSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
        }
       else{
        return $this->goHome();
       }
        
        
       
    }

    /**
     * Displays a single Publicacion model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        
        if (Yii::$app->user->isGuest){
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
        }
        else{
            return $this->goHome();
                    
                    
        }
    }
   public function actionMunicipio() {
    $out = [];
    if (isset($_POST['depdrop_parents'])) {
        $parents = $_POST['depdrop_parents'];
        if ($parents != null) {
            $cat_id = $parents[0];
        $out = \backend\models\Municipio::find()->where(["id_estado"=>$cat_id])->select(['id_municipio AS id','nombre_municipio AS name'])->asArray()->all(); 
            // the getSubCatList function will query the database based on the
            // cat_id and return an array like below:
            // [
            //    ['id'=>'<sub-cat-id-1>', 'name'=>'<sub-cat-name1>'],
            //    ['id'=>'<sub-cat_id_2>', 'name'=>'<sub-cat-name2>']
            // ]
           echo json_encode(['output'=>$out, 'selected'=>'']);
            return;
        }
    }
    echo Json_encode(['output'=>'', 'selected'=>'']);
}
  public function actionColonia() {
    $out = [];
    if (isset($_POST['depdrop_parents'])) {
        $parents = $_POST['depdrop_parents'];
        if ($parents != null) {
            $cat_id = $parents[0];
        $out = \backend\models\Colonias::find()->where(["id_municipio"=>$cat_id])->select(['id_colonia AS id','nombre_colonia AS name'])->asArray()->all(); 
            // the getSubCatList function will query the database based on the
            // cat_id and return an array like below:
            // [
            //    ['id'=>'<sub-cat-id-1>', 'name'=>'<sub-cat-name1>'],
            //    ['id'=>'<sub-cat_id_2>', 'name'=>'<sub-cat-name2>']
            // ]
           echo json_encode(['output'=>$out, 'selected'=>'']);
            return;
        }
    }
    echo Json_encode(['output'=>'', 'selected'=>'']);
}

    /**
     * Creates a new Publicacion model.
     * If creation is successful, the browser will be redirected to the 'view'  page.
     * @return mixed
     */
    public function actionCreate()
    {
       
        
      
            
        $model = new Publicacion();
        
        if ($model->load(Yii::$app->request->post()) ) {
           
           $model->id_user = Yii::$app->user->id;

//                 $id_ult= Publicacion::findBySql('SELECT `idpublicacion` FROM `publicacion` ORDER BY `idpublicacion` DESC LIMIT 1');

            $consulta = Yii::$app->db->createCommand('SELECT MAX(`idpublicacion`)+1 FROM `publicacion` ORDER BY `idpublicacion` DESC LIMIT 1')->queryScalar();
            if(empty($consulta)){
                $consulta = 1;
                 $model->url_imagen = UploadedFile::getInstances($model, 'url_imagen');
     
               foreach ($model->url_imagen as $url){
                   $u = new Imagenes();
                   $u->url_imagen = 'imagenes/'.$url->baseName.".".$url->extension;
                  
                   $sql = 'INSERT INTO `imagenes` (`id_imagen`, `url_imagen`, `id_user`, `id_publicacion`) VALUES (NULL,"'.($u->url_imagen).'","'.($model->id_user).'","'.($consulta).'");';
                   $command = \Yii::$app->db->createCommand($sql);
                   $command->execute();
                   $url->saveAs('imagenes/'.$url->baseName.".".$url->extension);
                   }
                   $co = Yii::$app->db->createCommand('SELECT `url_imagen` FROM `imagenes` WHERE `id_publicacion` = '.($consulta). ' ORDER BY `id_imagen` LIMIT 1')->queryScalar();
                   $model->url_imagen=$co;
                   $model->save(false);
            }else{
               $model->url_imagen = UploadedFile::getInstances($model, 'url_imagen');
     
               foreach ($model->url_imagen as $url){
                   $u = new Imagenes();
                   $u->url_imagen = 'imagenes/'.$url->baseName.".".$url->extension;
                  
                   $sql = 'INSERT INTO `imagenes` (`id_imagen`, `url_imagen`, `id_user`, `id_publicacion`) VALUES (NULL,"'.($u->url_imagen).'","'.($model->id_user).'","'.($consulta).'");';
                   $command = \Yii::$app->db->createCommand($sql);
                   $command->execute();
                   $url->saveAs('imagenes/'.$url->baseName.".".$url->extension);
                   }
                   $co = Yii::$app->db->createCommand('SELECT `url_imagen` FROM `imagenes` WHERE `id_publicacion` = '.($consulta). ' ORDER BY `id_imagen` LIMIT 1')->queryScalar();
                   $model->url_imagen=$co;
                   $model->save(false);
            }
            //INSERT INTO `imagenes` (`id_imagen`, `url_imagen`, `id_user`, `id_publicacion`) VALUES (NULL, 'imagenes/badge.png', '1', '25');
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
       
        if ($model->load(Yii::$app->request->post()) ) {
           
           $model->id_user = Yii::$app->user->id;

//                 $id_ult= Publicacion::findBySql('SELECT `idpublicacion` FROM `publicacion` ORDER BY `idpublicacion` DESC LIMIT 1');

            $consulta = Yii::$app->db->createCommand('SELECT MAX(`idpublicacion`)+1 FROM `publicacion` ORDER BY `idpublicacion` DESC LIMIT 1')->queryScalar();
            if(empty($consulta)){
                $consulta = 1;
                 $model->url_imagen = UploadedFile::getInstances($model, 'url_imagen');
     
               foreach ($model->url_imagen as $url){
                   $u = new Imagenes();
                   $u->url_imagen = 'imagenes/'.$url->baseName.".".$url->extension;
                  
                   $sql = 'INSERT INTO `imagenes` (`id_imagen`, `url_imagen`, `id_user`, `id_publicacion`) VALUES (NULL,"'.($u->url_imagen).'","'.($model->id_user).'","'.($consulta).'");';
                   $command = \Yii::$app->db->createCommand($sql);
                   $command->execute();
                   $url->saveAs('imagenes/'.$url->baseName.".".$url->extension);
                   }
                   $co = Yii::$app->db->createCommand('SELECT `url_imagen` FROM `imagenes` WHERE `id_publicacion` = '.($consulta). ' ORDER BY `id_imagen` LIMIT 1')->queryScalar();
                   $model->url_imagen=$co;
                   $model->save(false);
            }else{
               $model->url_imagen = UploadedFile::getInstances($model, 'url_imagen');
     
               foreach ($model->url_imagen as $url){
                   $u = new Imagenes();
                   $u->url_imagen = 'imagenes/'.$url->baseName.".".$url->extension;
                  
                   $sql = 'INSERT INTO `imagenes` (`id_imagen`, `url_imagen`, `id_user`, `id_publicacion`) VALUES (NULL,"'.($u->url_imagen).'","'.($model->id_user).'","'.($consulta).'");';
                   $command = \Yii::$app->db->createCommand($sql);
                   $command->execute();
                   $url->saveAs('imagenes/'.$url->baseName.".".$url->extension);
                   }
                   $co = Yii::$app->db->createCommand('SELECT `url_imagen` FROM `imagenes` WHERE `id_publicacion` = '.($consulta). ' ORDER BY `id_imagen` LIMIT 1')->queryScalar();
                   $model->url_imagen=$co;
                   $model->save(false);
            }
            
            return $this->redirect(['view', 'id' => $model->idpublicacion]);
        } else {
            return $this->render('_form_update', [
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
        
        $this->BorrarImagenes($id);
        //$consultaImagen = Yii::$app->db->createCommand('SELECT');
        
        $deleteFile = Yii::$app->db->createCommand('DELETE FROM `imagenes` WHERE `id_publicacion`='.($id));
        $deleteFile->execute();

        return $this->redirect(['index']);
    }
    public function Borrarimagenes($idimg){
        
       //
        
        $modeloimg = Imagenes::find()->where(['id_publicacion'=>$idimg])->select(["url_imagen"])->all();
       //$imgfile = \yii\helpers\ArrayHelper::map($modeloimg,"id_publicacion", "url_imagen");
       
       if(count($modeloimg)>=1){
            
       foreach ($modeloimg as $modi){
               // $dir = ;
               if(file_exists(Yii::getAlias("@webroot")."/".$modi->url_imagen)){
                unlink(Yii::getAlias("@webroot")."/".$modi->url_imagen);
               }
//                $file = (substr($modelos->Fotosimgs[$i]->ruta2, 1));
//                $do = unlink($file);
//                $file = (substr($modelos->Fotosimgs[$i]->ruta3, 1));
//                $do = unlink($file);
//                Fotosimg::model()->findByPk($modelos->Fotosimgs[$i]->codigo)->delete();
            }
        }

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
            throw new NotFoundHttpException('La pagina no existe');
        }
    }
}
