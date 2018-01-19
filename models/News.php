<?php

namespace app\models;

use Yii;
use app\components\Model;

/**
 * Модель для таблицы "news".
 *
 * @property integer $id
 * @property integer $category
 * @property string $name
 * @property string $short_text
 * @property string $full_text
 */
class News extends Model {

    /**
    * Название модели
    */
    public static $modelName = "Новости";

    /**
     * @inheritdoc
     */
    public static function tableName() {
        return 'news';
    }

    public $categories = [
        'Новости компании',
        'Акции',
        'Объекты',

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
            [['category', 'name', 'short_text', 'full_text'], 'required'],
            [['category'], 'integer'],
            [['full_text'], 'string'],
            [['name'], 'string', 'max' => 255],
            [['short_text'], 'string', 'max' => 500]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'id' => 'ID',
            'category' => 'Категория',
            'name' => 'Наименование',
            'short_text' => 'Короткий текст',
            'full_text' => 'Полный текст',
        ];
    }
}
