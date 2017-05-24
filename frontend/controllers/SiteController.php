<?php
namespace frontend\controllers;

use Yii;
use yii\base\InvalidParamException;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\LoginForm;
use frontend\models\PasswordResetRequestForm;
use frontend\models\ResetPasswordForm;
use frontend\models\SignupForm;
use frontend\models\ContactForm;
use backend\models\Publicacion;
use backend\models\Imagenes;
use yii\data\Pagination;
use frontend\models\FormSearch;
use frontend\models\AvanzadoForm;
use yii\helpers\Html;
/**
 * Site controller
 */
class SiteController extends Controller
{
    /**
     * @inheritdoc
     */
   
    public function behaviors()
    {
        return [
               
            
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout', 'signup'],
                'rules' => [
                    [
                        'actions' => ['signup'],
                        'allow' => true,
                        'roles' => ['?'],
                    ],
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return mixed
     */
    public  function actionDetalle($id)
    {
        $image = Imagenes::find()
                ->where(["like","id_publicacion",$id]);
        $count = clone $image;
      
        $pagina = new Pagination([
             "pageSize" => 1,
             "totalCount" => $count->count(),
        ]);
        
        
    $img = $image
            ->offset($pagina->offset)
            ->limit($pagina->limit)
            ->all();
    $imagecookie = Imagenes::find()->where(["like","id_publicacion",$id]);
//    $cookie = new \yii\web\Cookie([
//        "name"=> "test",
//        "value"=> "test uno",
//    ]);
    $cookie1 = new \yii\web\Cookie([
        "name"=>"imagen",
        "value"=> $imagecookie 
    ]);
    
//        Yii::$app->response->getCookies()->add($cookie);
        Yii::$app->response->getCookies()->add($cookie1);
    
        return $this->render('view', [
            'model' => $this->findModel($id),
            'publ'=> $img,
            'pag'=>$pagina,
            
        ]);
    }
    
    public function actionIndex()
    {
       
        $form = new FormSearch;
        $form1 = new AvanzadoForm() ;
        $search = null;
        $search1 = null;
        
       
        
       
       
        if($form->load(Yii::$app->request->get()))
        {
            
            if ($form->validate())
            {
                
                $search = Html::encode($form->q);
              
                $table = Publicacion::find()
                        ->where(["like", "idpublicacion", $search])
                        ->orWhere(["like", "titulo", $search])
                        ->orWhere(["like", "Descripcion", $search])
                        ->orWhere(["like","precio",$search])
                        ->orWhere(["like","Colonia",$search])
                        ->orWhere(["like","Tipo",$search])
                        ->orWhere(["like","Operacion",$search])
                        ->orderBy("idpublicacion DESC");
                $count = clone $table;
                $pages = new Pagination([
                    "pageSize" => 12,
                    "totalCount" => $count->count()
                ]);
                $model = $table
                        ->offset($pages->offset)
                        ->limit($pages->limit)
                        ->all();
                
            }
           
            else
            {
                $form->getErrors();
            }
        }
      
        
        
        else
        {
            if($form1->load(Yii::$app->request->get())){
                 $search1 = Html::encode($form1->f);
                 $seach4 = Html::encode($form1->precioMin);
                 $seach5 = Html::encode($form1->precioMax);
                $table = Publicacion::find()
                        ->andWhere(["like","Colonia",$search1])
                        ->andWhere(["like","Tipo", Html::encode($form1->t)])
                        ->andWhere(["like","Operacion",Html::encode($form1->o)])
                        ->andWhere(["between","precio",$seach4,$seach5])
                        ->orderBy("idpublicacion DESC");
//                        ->orWhere([">=","precio", Html::encode($form1->precioMin)])
//                        ->andWhere(["<=","precio",Html::encode($form1->precioMax)]);
                $count = clone $table;
                $pages = new Pagination([
                    "pageSize" => 12,
                    "totalCount" => $count->count()
                ]);
                $model = $table
                        ->offset($pages->offset)
                        ->limit($pages->limit)
                        ->all();
            }
            else{
            $table = Publicacion::find()->orderBy("idpublicacion DESC");
            $count = clone $table;
            $pages = new Pagination([
                "pageSize" => 9,
                "totalCount" => $count->count(),
            ]);
            $model = $table
                    ->offset($pages->offset)
                    ->limit($pages->limit)
                    ->all();
            }
        }
         if(Yii::$app->response->getCookies()->has("imagen")){
        $cooki = Yii::$app->response->getCookies()->getValue("imagen");
        
        }
        return $this->render("index", ["publi" => $model ,"form" => $form,"form1"=> $form1, "search" => $search, "pages" => $pages]);
     
       
      
        
    }
 
    /**
     * Logs in a user.
     *
     * @return mixed
     */
    
    public function actionHome(){
      
        return $this->render('index',[ ]);
    }
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        } else {
            return $this->render('login', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Logs out the current user.
     *
     * @return mixed
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return mixed
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail(Yii::$app->params['adminEmail'])) {
                Yii::$app->session->setFlash('success', 'Thank you for contacting us. We will respond to you as soon as possible.');
            } else {
                Yii::$app->session->setFlash('error', 'There was an error sending your message.');
            }

            return $this->refresh();
        } else {
            return $this->render('contact', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Displays about page.
     *
     * @return mixed
     */
    public function actionAbout()
    {
        return $this->render('about');
    }

    /**
     * Signs user up.
     *
     * @return mixed
     */
    public function actionSignup()
    {
        $model = new SignupForm();
        if ($model->load(Yii::$app->request->post())) {
            if ($user = $model->signup()) {
                if (Yii::$app->getUser()->login($user)) {
                    return $this->goHome();
                }
            }
        }

        return $this->render('signup', [
            'model' => $model,
        ]);
    }

    /**
     * Requests password reset.
     *
     * @return mixed
     */
    public function actionRequestPasswordReset()
    {
        $model = new PasswordResetRequestForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail()) {
                Yii::$app->session->setFlash('success', 'Check your email for further instructions.');

                return $this->goHome();
            } else {
                Yii::$app->session->setFlash('error', 'Sorry, we are unable to reset password for the provided email address.');
            }
        }

        return $this->render('requestPasswordResetToken', [
            'model' => $model,
        ]);
    }

    /**
     * Resets password.
     *
     * @param string $token
     * @return mixed
     * @throws BadRequestHttpException
     */
    public function actionResetPassword($token)
    {
        try {
            $model = new ResetPasswordForm($token);
        } catch (InvalidParamException $e) {
            throw new BadRequestHttpException($e->getMessage());
        }

        if ($model->load(Yii::$app->request->post()) && $model->validate() && $model->resetPassword()) {
            Yii::$app->session->setFlash('success', 'New password saved.');

            return $this->goHome();
        }

        return $this->render('resetPassword', [
            'model' => $model,
        ]);
    }
    protected function findModel($id)
    {
        if (($model = Publicacion::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
