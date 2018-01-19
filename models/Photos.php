<?php

namespace app\models;

use Yii;
use app\components\Model;
use app\components\behaviors\FileBehavior;
/**
 * Модель для таблицы "photos".
 *
 * @property integer $id
 * @property string $photo
 * @property string $model
 * @property integer $record
 */
class Photos extends Model {

    /**
    * Название модели
    */
    public static $modelName = "Фотографии";

    /**
     * @inheritdoc
     */
    public static function tableName() {
        return 'photos';
    }

    /**
    * @inheritdoc
    */
    public function behaviors() {
        return array_merge(parent::behaviors(), [
           'file' => [
                'class' => FileBehavior::className(),
                'attributes' => [
                     'photo' => ['type' => 'image']
                ]
            ]
       ]);
    }


    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['model', 'record'], 'required'],
            [['record'], 'integer'],
            [['model'], 'string', 'max' => 25],
            [['photo'], 'image' , 'extensions' => ['jpg','jpeg','png']]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'id' => 'ID',
            'photo' => 'Фотография',
            'model' => 'Модель',
            'record' => 'Запись',
        ];
    }
}
