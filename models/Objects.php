<?php

namespace app\models;

use Yii;
use app\components\Model;

/**
 * Модель для таблицы "objects".
 *
 * @property integer $id
 * @property integer $type
 * @property string $name
 * @property string $short_text
 * @property string $full_text
 */
class Objects extends Model {

    /**
    * Название модели
    */
    public static $modelName = "Объекты";

    /**
     * @inheritdoc
     */
    public static function tableName() {
        return 'objects';
    }

    public $types = [
        'Противопожарные двери',
        'Противопожарные перегородки',
        'Противопожарные окна',
        'Противопожарные фасады и витражи',
        'Противопожарные зенитные фонари',
    ];

    /**
    * @inheritdoc
    */
    public function behaviors() {
        return array_merge(parent::behaviors(), [
       ]);
    }

    public function getPhotos() {
        return $this->hasMany(Photos::className(), ['record' => 'id'])->andWhere(['model' => self::className()]);
    }

    public $photosSettings = ['type' => 'image', 'size' => [221, 168]];

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['type', 'name', ], 'required'],
            [['type'], 'integer'],
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
            'type' => 'Тип',
            'name' => 'Название',
            'short_text' => 'Короткий текст',
            'full_text' => 'Полный текст',
        ];
    }
}
