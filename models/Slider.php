<?php

namespace app\models;

use Yii;
use app\components\Model;
use app\components\behaviors\FileBehavior;
/**
 * Модель для таблицы "slider".
 *
 * @property integer $id
 * @property string $name
 * @property string $text
 * @property string $photo
 */
class Slider extends Model {

    /**
    * Название модели
    */
    public static $modelName = "Слайдер";

    /**
     * @inheritdoc
     */
    public static function tableName() {
        return 'slider';
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
            'name' => 'Наименование',
            'text' => 'Текст',
            'photo' => 'Изображение',
        ];
    }
}
