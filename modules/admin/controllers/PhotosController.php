<?php

namespace app\modules\admin\controllers;

use app\models\Catalog;
use Yii;
use app\models\Photos;
use yii\data\ActiveDataProvider;
use app\components\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\components\AccessControl;
use app\models\Objects;
use app\models\News;
use app\models\Production;

/**
 * PhotosController Реализовывает CRUD для модели Photos.
 */
class PhotosController extends Controller
 {
    /**
     * @inheritdoc
     */
    public function behaviors() {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [ 'allow' => true, 'roles' => ['admin'] ],
                ],
            ],
        ];
    }

    /**
     * Отображает все записи модели Photos.
     * @return mixed
     */
    public function actionIndex() {
        $dataProvider = new ActiveDataProvider([
            'query' => Photos::find(),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
            'title' =>  Photos::name(["МН","ИМ"])
        ]);
    }

    /**
     * Показывает одну запись модели Photos.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id) {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Создает запись запись модели Photos.
     * Если создание прошло успешно, будет совершен редирект на страницу просмотра.
     * @return mixed
     */
    public function actionCreate($class, $record) {
        $model = new Photos();
        $model->record = $record;
        $model->model = $class;

        if ($model->load(Yii::$app->request->post()) && $model->save()) {

            if ($class == Objects::className()) {
                return $this->run("objects/view", ["id" => $record]);
            }
            if ($class == Catalog::className()) {
                return $this->run("catalog/view", ["id" => $record]);
            }
            if ($class == News::className()) {
                return $this->run("news/view", ["id" => $record]);
            }
            if ($class == Production::className()) {
                return $this->run("production/view", ["id" => $record]);
            }

        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Обновляет существующую запись модели Photos.
     * Если обновление прошло успешно, будет совершен редирект на страницу просмотра.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id) {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->render('view', [
            'model' => $model,
            ]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
    * Показывать измеения в модели Photos.
    * @param integer $id
    * @return mixed
    */
    public function actionLog($id) {
        return $this->render('log', [
            'model' => $this->findModel($id),
            'log' => $this->findModel($id)->getLog(),
        ]);
    }

    /**
     * Удаляет запись из модели Photos.
     * Если удаление прошло успешно, будет совершен редирект на страницу просмотра.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id) {
        $model = $this->findModel($id);
        $model->delete();
        if ($model->model == Objects::className()) {
            return $this->run("objects/view", ["id" => $model->record]);
        }
        if ($model->model == Catalog::className()) {
            return $this->run("catalog/view", ["id" => $model->record]);
        }
        if ($model->model == News::className()) {
            return $this->run("news/view", ["id" => $model->record]);
        }
        if ($model->model == Production::className()) {
            return $this->run("production/view", ["id" => $model->record]);
        }
    }


    /**
     * Находит запись в модели Photos основыаясь на внешнем ключе.
     * Если запись не найдена, выбрасывает ошибку 404.
     * @param integer $id
     * @return Photos найденная запись
     * @throws NotFoundHttpException если модель не была найдена
     */
    protected function findModel($id)
    {
        if (($model = Photos::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('Ничего не найдено.');
        }
    }
}
