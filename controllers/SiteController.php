<?php

namespace app\controllers;

use app\models\Jihoz;
use app\models\Modell;
use app\models\Qismmodel;
use app\models\Qismqurilma;
use app\models\Qurilma;
use app\models\Room;
use app\models\Stuff;
use app\models\Users;
use Yii;
use yii\filters\AccessControl;
use yii\helpers\ArrayHelper;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use yii\web\UploadedFile;

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
                    [
                        'actions' => ['login','error'],
                        'allow' => true,

                    ],
                    [
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
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }
    public function beforeAction($action) {
        if (parent::beforeAction($action)) {
            // change layout for error action
            if ($action->id=='error') $this->layout ='login';
            return true;
        } else {
            return false;
        }
    }
    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        $jihozs = Jihoz::find()->all();
        $stuffs = Stuff::find()->all();
        $modells = Modell::find()->all();
        $qurilmas = Qurilma::find()->all();
        $users = Users::find()->all();
        $rooms = Room::find()->all();
        $qismqurilmas = Qismqurilma::find()->all();
        return $this->render('index', [
            'jihozs' => $jihozs,
            'stuffs' => $stuffs,
            'modells' => $modells,
            'qurilmas' => $qurilmas,
            'users' => $users,
            'rooms' => $rooms,
            'qismqurilmas' => $qismqurilmas,
        ]);
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
            return $this->goBack();
        }
        $this->layout='login';
        $model->password = '';
        return $this->render('login', [
            'model' => $model,
        ]);
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

    public function actionQismmodel($qurilma_id)
    {
        $qismmodel[] = new Qismmodel();
        $modell = Modell::find()->where(['qurilma_id' => $qurilma_id])->all();
        $model = new Modell();
        $qismqurilima = Qismqurilma::find()->where(['qurilma_id' => $qurilma_id])->all();
        return $this->render('qismmodel', [
            'modell' => $modell,
            'qismmodel' => $qismmodel,
            'qismqurilma' => $qismqurilima,
            'model' => $model,
        ]);
    }

    public function actionViewmodel()
    {
        $model = Modell::find()->all();
        return $this->render('viewmodel', [
            'model' => $model,
        ]);
    }

    public function actionGetmodel()
    {
        $model = new Modell();
        if ($model->load(Yii::$app->request->post())) {
            $date = date('Y-m-d-h i s');
            if ($model->image = UploadedFile::getInstance($model, 'image')) {
                $model->image->saveAs(Yii::$app->basePath . '/web/image/' . $date . '.' . $model->image->extension);
                $model->image = $date . '.' . $model->image->extension;
            } else {
                $model->image = 'avatar.jpg';
            }

            $model->save();

            $qismqurilma = Qismqurilma::find()->where(['qurilma_id' => $model->qurilma_id])->all();
//            debug($qismqurilma);
            foreach ($qismqurilma as $item) {
                $qismmodel = new Qismmodel();
                $qismmodel->name = Yii::$app->request->post($item->name) . '';
                $qismmodel->qism_qurilma_id = $item->id;
                $qismmodel->modell_id = $model->id;
                $qismmodel->more = null;
                $qismmodel->save();
//                debug($qismmodel);
            }
            if ($model->id)
                return $this->redirect(['../site/productdetails', 'id' => $model->id]);
            else if ($model->load(Yii::$app->request->post())) {
                $qismqurilma = Qismqurilma::find()->where(['qurilma_id' => $model->qurilma_id])->all();
                return $this->render('createmodel', [
                    'model' => $model,
                    'qismqurilma' => $qismqurilma,
                ]);
            }
        }

    }

    public function actionCreatemodel()
    {
        $model = new Modell();
        if ($model->load(Yii::$app->request->post())) {
            $qismqurilma = Qismqurilma::find()->where(['qurilma_id' => $model->qurilma_id])->all();
            return $this->render('createmodel', [
                'model' => $model,
                'qismqurilma' => $qismqurilma,
            ]);
        } else {
            return $this->render('createmodel', [
                'model' => $model,
            ]);
        }
    }

    public function actionProductdetails($id = null)
    {
        $model = Modell::find()->where(['id' => $id])->one();
        $qismqurilma = Qismqurilma::find()->where(['qurilma_id' => $model->qurilma->id])->all();
        $qismmodel = Qismmodel::find()->where(['modell_id' => $model->id])->all();

        return $this->render('productdetails', [
            'model' => $model,
            'qismqurilma' => $qismqurilma,
            'qismmodel' => $qismmodel,
        ]);
    }

    public function actionUpdatejihoz($id)
    {
        $jihoz = Jihoz::find()->where(['id' => $id])->one();
        $stuff = $jihoz->stuff;
        $room = $jihoz->room;
        $oldstuff = $stuff->name;
        $oldimage = $stuff->image;
        $oldroom = $room->name;
        if ($jihoz->load(Yii::$app->request->post()) && $stuff->load(Yii::$app->request->post()) && $room->load(Yii::$app->request->post())) {

            if ($stuff->name != $oldstuff) {
                if (Stuff::find()->where(['name' => $stuff->name])->one() != null) {
                    $stuff = Stuff::find()->where(['name' => $stuff->name])->one();
                } else {
                    $oldstuff = new Stuff();
                    $oldstuff->name = $stuff->name;
                    $oldstuff->image = $stuff->image;
                    $stuff = $oldstuff;
                }

            }
            $date = date('Y-m-d-h i s');
            if ($stuff->image = UploadedFile::getInstance($stuff, 'image')) {
                $stuff->image->saveAs(Yii::$app->basePath . '/web/image/' . $date . '.' . $stuff->image->extension);
                $stuff->image = $date . '.' . $stuff->image->extension;
            } else {
                $stuff->image = $oldimage;
            }
            if ($room->name != $oldroom) {
                if (Room::find()->where(['name' => $stuff->name])->one() != null) {
                    $room = Room::find()->where(['name' => $stuff->name])->one();
                } else {
                    $oldroom = new Room();
                    $oldroom->name = $room->name;
                    $room = $oldroom;
                }
            }
            if ($room->save() && $stuff->save()) {
                $jihoz->room_id = $room->id;
                $jihoz->stuff_id = $stuff->id;
                if ($jihoz->save()) {
                    return $this->redirect(['../stuff/view', 'id' => $stuff->id]);
                } else {
                    Yii::$app->session->setFlash('error', 'Ma\'lumotlarni kiritishda xatolik');
                }
            } else {
                Yii::$app->session->setFlash('error', 'Ma\'lumotlarni kiritishda xatolik');
            }
        }
        return $this->render('updatejihoz', [
            'model' => $jihoz,
            'stuff' => $stuff,
            'room' => $room,
        ]);

    }

    public function actionCreatejihoz($stuffid = null, $roomid = null)
    {
        $stuff = new Stuff();
        if ($stuffid != null) {
            $stuff = Stuff::find()->where(['id' => $stuffid])->one();
        }
        $jihoz = new Jihoz();
        $room = new Room();
        if ($roomid != null) {
            $room = Room::find()->where(['id' => $roomid])->one();
        }

        if (Yii::$app->request->post('modelId')) {
            $model = Modell::find()->where(['id' => Yii::$app->request->post('modelId')])->one();
            if (!($stuff = Stuff::find()->where(['name' => Yii::$app->request->post('stuffName')])->one())) {
                $stuff = new Stuff();
                if ($stuff->load(Yii::$app->request->post())) {
                    $date = date('Y-m-d-h i s');
                    if ($stuff->image = UploadedFile::getInstance($stuff, 'image')) {
                        $stuff->image->saveAs(Yii::$app->basePath . '/web/image/' . $date . '.' . $stuff->image->extension);
                        $stuff->image = $date . '.' . $stuff->image->extension;
                    } else {
                        $stuff->image = 'avatar.jpg';
                    }
                }

                $stuff->name = Yii::$app->request->post('stuffName');
            }
            if (!($room = Room::find()->where(['name' => Yii::$app->request->post('roomName')])->one())) {
                $room = new Room();
                $room->name = Yii::$app->request->post('roomName');
            }
            $jihoz = new Jihoz();
            $jihoz->seriya = Yii::$app->request->post('jihozSeriya');
            $jihoz->holati = Yii::$app->request->post('holati');
            $jihoz->modell_id = $model->id;
            if ($stuff->save() && $room->save()) {

                $jihoz->stuff_id = $stuff->id;
                $jihoz->room_id = $room->id;

                if ($jihoz->save()) {


                    return $this->redirect(['../stuff/view', 'id' => $stuff->id]);
                } else {
                    Yii::$app->session->setFlash('error', 'Ma\'lumotlarni kiritishda xatolik');
                }
            } else {
                Yii::$app->session->setFlash('error', 'Ma\'lumotlarni kiritishda xatolik');
            }
        }
        if ($jihoz->load(Yii::$app->request->post())) {

            if (Jihoz::find()->where(['seriya' => $jihoz->seriya])->one()) {
                $jihoz = Jihoz::find()->where(['seriya' => $jihoz->seriya])->one();
            }

            $stuff->load(Yii::$app->request->post());
            $room->load(Yii::$app->request->post());
            if (Stuff::find()->where(['name' => $stuff->name])->one() != null) {
                $stuff = Stuff::find()->where(['name' => $stuff->name])->one();
            }
            if (Room::find()->where(['name' => $room->name])->one() != null) {
                $room = Room::find()->where(['name' => $room->name])->one();
            }
            $date = date('Y-m-d-h i s');
            if ($stuff->image = UploadedFile::getInstance($stuff, 'image')) {
                $stuff->image->saveAs(Yii::$app->basePath . '/web/image/' . $date . '.' . $stuff->image->extension);
                $stuff->image = $date . '.' . $stuff->image->extension;
            } else {
                $stuff->image = 'avatar.jpg';
            }

            if ($stuff->save() && $room->save()) {

                $jihoz->stuff_id = $stuff->id;
                $jihoz->room_id = $room->id;


                if ($jihoz->save()) {
                    return $this->redirect(['../stuff/view', 'id' => $stuff->id]);
                } else {
                    Yii::$app->session->setFlash('error', 'Ma\'lumotlarni kiritishda xatolik');
                }
            } else {
                Yii::$app->session->setFlash('error', 'Ma\'lumotlarni kiritishda xatolik');
            }
        }

        return $this->render('createjihoz', [
            'model' => $jihoz,
            'stuff' => $stuff,
            'room' => $room,
        ]);
    }

    public function actionViewjihoz()
    {
        $model = Jihoz::find()->all();

        return $this->render('viewjihoz', [
            'model' => $model,
        ]);
    }

    public function actionUpdatemodel($id)
    {
        $model = Modell::find()->where(['id' => $id])->one();
//        debug($model);
        $qismqurilma = Qismqurilma::find()->where(['qurilma_id' => $model->qurilma_id])->all();
        $qismmodels = $model->qismmodels;
//        $qismmodel->qismQurilma->name
        $old = $model->image;
        if ($model->load(Yii::$app->request->post())) {
            $date = date('Y-m-d-h-i-s');
            if ($model->image = UploadedFile::getInstance($model, 'image')) {
                $model->image->saveAs(Yii::$app->basePath . '/web/image/' . $date . '.' . $model->image->extension);
                $model->image = $date . '.' . $model->image->extension;
            } else {
                $model->image = $old;
            }
            $qismmodels = Yii::$app->request->post('Qismmodel');
            $i = 0;
            foreach ($model->qismmodels as $item) {
                $i++;
                $qismmodel = Qismmodel::find()->where(['id' => $item->id])->one();
                $qismmodel->name = $qismmodels[$i]['name'];
//                debug($qismmodel);
                $qismmodel->save();
            }
//            debug($qismmodels[1]['name']);

//            debug($qismmodels);
//            $qismmodels->save();
            $model->save();

            return $this->redirect(['productdetails', 'id' => $model->id]);
        } //            debug($qismmodels);

        return $this->render('updatemodel', [
            'model' => $model,
            'qismqurilma' => $qismqurilma,
            'qismmodels' => $qismmodels,
        ]);
    }
    public function actionFindall($data){
        $jihoz=Jihoz::findBySql('SELECT `jihoz`.`id` , `jihoz`.`modell_id`, `jihoz`.`stuff_id`, `jihoz`.`room_id`,`jihoz`.`seriya`,`jihoz`.`holati`,`jihoz`.`more` FROM `jihoz`, `modell`, `stuff`,`room`, `qurilma`  WHERE (`jihoz`.`id` LIKE \'%'.$data.'%\' or `modell`.`name` LIKE \'%'.$data.'%\' or `stuff`.`name` LIKE \'%'.$data.'%\' or `room`.`name` LIKE \'%'.$data.'%\' or `jihoz`.`seriya` LIKE \'%'.$data.'%\' or `qurilma`.`name` LIKE \'%'.$data.'%\') and `jihoz`.`modell_id`=`modell`.`id` and `jihoz`.`stuff_id`=`stuff`.`id` and `jihoz`.`room_id`=`room`.`id` and `modell`.`qurilma_id`=`qurilma`.`id`')->all();
        if($jihoz) {
            return $this->render('viewjihoz', [
                'model' => $jihoz,
            ]);
        }
        else{
            return $this->render('notresult',[
                'data'=>$data
            ]);
        }
    }

}
