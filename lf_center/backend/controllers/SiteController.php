<?php
namespace backend\controllers;

use Yii;
use common\helper\rbac\MenuHelper;
use common\models\LoginForm;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\web\Controller;

/**
 * Site controller
 */
class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    // [
                    //     'actions' => ['login', 'error', 'language', 'set-theame', 'test'],
                    //     'allow' => true,
                    // ],
                    [
                        'actions' => ['logout', 'index'],
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
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
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


    public function actionAssignMenu(){
        echo json_encode(MenuHelper::getAssignedMenu());
    }

    /**
     * Login action.
     *
     * @return string
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        } else {
            $model->password = '';

            return $this->render('login', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Logout action.
     *
     * @return string
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * set web language
     */
    public function actionLanguage(){
        $lang = Yii::$app->request->get('lang');
        if($lang){
            Yii::$app->session['language'] = $lang;
        }
        return $this->goBack();
    }

    /**
     * set web theame
     */
    public function actionSetTheame(){
        $theame = Yii::$app->request->get('theame');
        if($theame){
            Yii::$app->session['theame'] = $theame;
        }
        return $this->goBack();
    }

    // public function actionTest(){
    //     $menu = MenuHelper::getAssignedMenu(Yii::$app->user->identity->user_id);
    //     var_dump($menu);
    // }
}
