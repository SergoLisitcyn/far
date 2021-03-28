<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "otdel".
 *
 * @property int $id
 * @property string $name
 * @property int|null $status
 * @property int|null $sort
 */
class Otdel extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'otdel';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['status', 'sort'], 'integer'],
            [['name'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Название Отдела',
            'status' => 'Статус',
            'sort' => 'Сортировка',
        ];
    }
}
