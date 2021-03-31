<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "terms".
 *
 * @property int $id
 * @property string $content
 * @property string|null $title
 * @property string|null $description
 * @property string|null $keywords
 * @property int|null $status
 */
class Terms extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'terms';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['content'], 'required'],
            [['content'], 'string'],
            [['status'], 'integer'],
            [['title', 'description', 'keywords'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'content' => 'Описание',
            'title' => 'Title',
            'description' => 'Description',
            'keywords' => 'Keywords',
            'status' => 'Статус',
        ];
    }
}
