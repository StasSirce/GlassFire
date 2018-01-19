<?php

namespace app\models;

use Yii;
use app\components\Model;

/**
 * Модель для таблицы "catalog".
 *
 * @property integer $id
 * @property integer $category
 * @property string $name
 * @property string $full_text
 */
class Catalog extends Model {

    /**
    * Название модели
    */
    public static $modelName = "Каталог";

    /**
     * @inheritdoc
     */
    public static function tableName() {
        return 'catalog';
    }

    public $categories = [
        'Конструкции из алюминиевого профиля',
        'Конструкции из стального профиля',
        'Огнестойкие стеклопакеты',
    ];

    public $category_icons = [
        'fa-codepen',
        'fa-cube',
        'fa-crop',
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
            [['category', 'name', 'full_text'], 'required'],
            [['category'], 'integer'],
            [['full_text'], 'string'],
            [['name'], 'string', 'max' => 255]
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
            'full_text' => 'Полный текст',
        ];
    }
}
