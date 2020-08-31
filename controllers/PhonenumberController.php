<?php

namespace app\controllers;

use Yii;
use app\models\Phonenumber;
use yii\filters\AccessControl;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * PhonenumberController implements the CRUD actions for Phonenumber model.
 */
class PhonenumberController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
             'access' => [
                'class' => AccessControl::className(),
                'only' => ['index', 'view', 'create', 'update', 'delete'],
                'rules' => [
                    [
                        'allow' => true,
                        'actions' => ['index', 'view', 'create', 'update', 'delete'],
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Phonenumber models.
     * @return mixed
     */
    public function actionIndex()
    {
        $sql = '
        SELECT ph.phonenumber_id, ph.number 
        FROM phonenumber ph
        INNER JOIN person p ON ph.person_id = p.person_id
        WHERE p.user_id = :user_id 
        ';

        $dataProvider = new ActiveDataProvider([
            'query' => Phonenumber::findBySql($sql, [':user_id' => Yii::$app->user->identity->id]),
            'pagination' => [
                'forcePageParam' => false,
                'pageSizeParam' => false,
                'pageSize' => 60
            ],
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Phonenumber model.
     * @param string $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Phonenumber model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($person_id)
    {
        $model = new Phonenumber();

        if (Yii::$app->request->isPost) {

            //Check the rule: items max (20)
            $max_items = Phonenumber::LIMIT_PHONENUMBERS_FOR_PERSON_ID;
            if ((int)Phonenumber::countOwn($person_id) > $max_items-1)
                throw new NotFoundHttpException('Sorry. Allow max ' . $max_items .' items.');
            
            $loaded = $model->load(Yii::$app->request->post());
            $model->validate();
            
            // var_dump($model->getErrors());
            
            if ($model->save()) 
                return $this->redirect(['person/view', 'id' => $model->person_id]);

        }

        $model->person_id = $person_id;

        return $this->render('create', [
            'model' => $model,
        ]);

    }

    /**
     * Updates an existing Phonenumber model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $ph = Phonenumber::find()
            ->where(['phonenumber_id' => $id])
            ->one();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['person/view', 'id' => $ph->person_id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Phonenumber model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();
        $ph = Phonenumber::find()
            ->where(['phonenumber_id' => $id])
            ->andWhere(['=', 'phonenumber_id', Yii::$app->user->identity->id ])
            ->one();

        if ($ph)
            return $this->redirect(['person/view', 'id' => $ph->person_id]);
        else
            return $this->redirect(['person/index']);
    }

    /**
     * Finds the Phonenumber model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return Phonenumber the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Phonenumber::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
