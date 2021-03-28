<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;
use yii\db\Expression;

/**
 * This is the model class for table "feedback".
 *
 * @property int $id
 * @property int $parent_id
 * @property string $name
 * @property string $surname
 * @property string|null $patronymic
 * @property string|null $phone
 * @property string|null $filename
 * @property string|null $link
 * @property int $created_at
 */
class Feedback extends \yii\db\ActiveRecord
{
    public $file;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'feedback';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['parent_id', 'name', 'surname', 'created_at'], 'required'],
            [['parent_id', 'created_at'], 'integer'],
            [['name', 'surname', 'patronymic', 'phone', 'filename','file_src_filename', 'link'], 'string', 'max' => 255],
            [['file'], 'safe'],
            [['file'], 'file'],
            [['file'], 'file', 'maxSize'=>'100000'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'parent_id' => 'Parent ID',
            'name' => 'Name',
            'surname' => 'Surname',
            'patronymic' => 'Patronymic',
            'phone' => 'Phone',
            'filename' => 'Filename',
            'link' => 'Link',
            'created_at' => 'Created At',
        ];
    }
    public function getOtdel()
    {
        return $this->hasMany(Otdel::className(), ['id' => 'parent_id']);
    }
}
