<?php

namespace app\models;

use Yii;
use app\components\Model;
use app\components\behaviors\FileBehavior;
/**
 * Модель для таблицы "feedback".
 *
 * @property integer $id
 * @property string $name
 * @property string $photo
 * @property string $text
 */
class Feedback extends Model {

    /**
    * Название модели
    */
    public static $modelName = "Отзывы";

    /**
     * @inheritdoc
     */
    public static function tableName() {
        return 'feedback';
    }

    /**
    * @inheritdoc
    */
    public function behaviors() {
        return array_merge(parent::behaviors(), [
           'file' => [
                'class' => FileBehavior::className(),
                'attributes' => [
                     'photo' => ['type' => 'image', 'size' => [78, 78]]
                ]
            ]
       ]);
    }


    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['name', 'text'], 'required'],
            [['text'], 'string'],
            [['name'], 'string', 'max' => 255],
            [['photo'], 'image' , 'extensions' => ['jpg','jpeg','png']]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'id' => 'ID',
            'name' => 'Имя',
            'photo' => 'Фотография',
            'text' => 'Содержание',
        ];
    }
}
