<?php

namespace app\models;

use Yii;
use app\components\Model;
use app\components\behaviors\FileBehavior;
/**
 * Модель для таблицы "certificates".
 *
 * @property integer $id
 * @property string $name
 * @property string $photo
 */
class Certificates extends Model {

    /**
    * Название модели
    */
    public static $modelName = "Сертификаты";

    /**
     * @inheritdoc
     */
    public static function tableName() {
        return 'certificates';
    }

    /**
    * @inheritdoc
    */
    public function behaviors() {
        return array_merge(parent::behaviors(), [
           'file' => [
                'class' => FileBehavior::className(),
                'attributes' => [
                     'photo' => ['type' => 'image', 'thumbnail' => [114, 164]]
                ]
            ]
       ]);
    }


    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['name'], 'required'],
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
            'name' => 'Название',
            'photo' => 'Фотография',
        ];
    }
}
