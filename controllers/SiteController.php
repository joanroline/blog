<?php

namespace app\controllers;

use Yii;
use yii\data\ActiveDataProvider;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\Posts;
use app\models\Signup;
use app\models\SignupForm;
use app\models\User;
use app\models\ViewPosts;
use yii\base\Model;

class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::class,
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::class,
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /*public function behaviors()
{
    return [
        'access' => [
            'class' => AccessControl::class,
            'only' => ['view_members', 'posts'], // actions you want to restrict
            'rules' => [
                [
                    'actions' => ['index', 'view_posts', 'sign_up'], // allow these for everyone
                    'allow' => true,
                ],
                [
                    'allow' => true,
                    'roles' => ['@'], // '@' means authenticated users
                ],
            ],
        ],
    ];
}*

    /**
     * {@inheritdoc}
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
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionBlogSite()
    {
       
        return $this->render('blog_site');
        
    }
    public function actionSaveuser()
    {
        $model = new SignupForm();
        if ($model->load(Yii::$app->request->post()) && $model->signup()) {
            return $this->redirect('posts');
        }
        return $this->render('sign_up',['model'=>$model]);
        
    }

    /**
     * Login action.
     *
     * @return Response|string
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->redirect('posts');
           
        }
        

        $model->password = '';
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    public function actionPosts()
    {
    $model = new Posts();
    if ($model->load(Yii::$app->request->post()) && $model->save()) {
        Yii::$app->getSession()->setFlash('success', Yii::t('app','Post saved successfully'));
        return $this->redirect(['view-posts']);
        
    }   
    
    $allposts = Posts::find()->all();
        return $this->render('posts', ['model'=> $model, 'allposts'=>$allposts]);
    }

    public function actionViewPosts()
    {
       $model = Posts::find()->orderBy(['id'=>SORT_DESC])->limit(10)->all();

        return $this->render('view_posts', ['model'=> $model]);

        /*$dataProvider = new ActiveDataProvider([
            'query' => ViewPosts::find()->orderBy(['created_at' => SORT_DESC]),
            'pagination' => [
                'pageSize' => 10], // Adjust pagination as needed
        ]);

        return $this->render('view_posts', ['dataProvider' => $dataProvider]);*/
    
        
    }

    public function actionUpdatePosts($id)
    {
        $model = Posts::findOne($id);
        if ($model->load(Yii::$app->request->post())) { 
            $model->save(false);
            Yii::$app->session->setFlash('success','Post updated successfully');
            return $this->redirect(['view-posts']);
        }
        return $this->render('posts', ['model'=> $model]);
    }


    public function actionViewPost($id)
    {
        $model = Posts::findOne($id);
        return $this->render('viewpost', ['model'=> $model]);
        
    }

    public function actionDeletePosts($id)
    {
        $model = Posts::findOne($id);
        $model->delete(); 
            Yii::$app->session->setFlash('success','Post deleted successfully');
        return $this->redirect(['view-posts']);
    }

    public function actionViewMembers()
    {
       // $model = User::find()->orderBy(['id'=>SORT_DESC])->limit(10)->all();
        $model = User::find()->orderBy(['id'=>SORT_DESC])->all();

        return $this->render('view_members', ['model'=> $model]);
    }

    public function actionUpdateMembers($id)
    {
        $model = User::findOne($id);
        if ($model->load(Yii::$app->request->post())) { 
            $model->save(false);
            Yii::$app->session->setFlash('success','Member updated successfully');
            return $this->redirect(['view-members']);
        }
        return $this->render('userupdate', ['model'=> $model]);
    }

    public function actionViewMember($id)
    {
        $model = User::findOne($id);
        return $this->render('viewmember', ['model'=> $model]);
        
    }

    
    
    public function actionDeleteMembers($id)
    {
        $model = User::findOne($id);
        $model->delete(); 
            Yii::$app->session->setFlash('success','Member deleted successfully');
        return $this->redirect(['view-members']);
    }

    


    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return Response|string
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model,
        ]);
    }

    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionAbout()
    {
        return $this->render('about');
    }

   

    

   
}
