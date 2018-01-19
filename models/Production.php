<?php

namespace app\models;

use Yii;
use app\components\Model;

/**
 * Модель для таблицы "production".
 *
 * @property integer $id
 * @property integer $type
 * @property string $name
 * @property string $short_text
 * @property string $full_text
 */
class Production extends Model {

    /**
    * Название модели
    */
    public static $modelName = "Производство";

    /**
     * @inheritdoc
     */
    public static function tableName() {
        return 'production';
    }

    public $types = [

    ];

    public function getPhotos() {
        return $this->hasMany(Photos::className(), ['record' => 'id'])->andWhere(['model' => self::className()]);
    }

    public $photosSettings = ['type' => 'image', 'size' => [221, 168]];

    /**
    * @inheritdoc
    */
    public function behaviors() {
        return array_merge(parent::behaviors(), [
       ]);
    }


    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['type', 'name', 'short_text', 'full_text'], 'required'],
            [['type'], 'integer'],
            [['full_text'], 'string'],
            [['name', 'short_text'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'id' => 'ID',
            'type' => 'Тип',
            'name' => 'Наименование',
            'short_text' => 'Короткий текст',
            'full_text' => 'Длинный текст',
        ];
    }
}
