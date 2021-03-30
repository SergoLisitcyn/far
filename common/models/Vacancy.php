<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "vacancy".
 *
 * @property int $id
 * @property int $parent_id
 * @property string $name
 * @property string $sfera
 * @property string $city
 * @property string $experience
 * @property string $content
 * @property string|null $title
 * @property string|null $description
 * @property string|null $keywords
 * @property int|null $status
 * @property int|null $sort
 */
class Vacancy extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'vacancy';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['parent_id', 'name', 'sfera', 'city', 'experience', 'content'], 'required'],
            [['parent_id', 'status', 'sort'], 'integer'],
            [['content'], 'string'],
            [['name', 'sfera', 'city', 'experience', 'title', 'description', 'keywords'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'parent_id' => 'Отдел',
            'name' => 'Название',
            'sfera' => 'Сфера',
            'city' => 'Город',
            'experience' => 'Стаж',
            'content' => 'Полное описание',
            'title' => 'Title',
            'description' => 'Description',
            'keywords' => 'Keywords',
            'status' => 'Статус',
            'sort' => 'Сортировка',
        ];
    }

    public function getParent()
    {
        return $this->hasMany(Otdel::className(), ['id' => 'parent_id']);
    }
}
