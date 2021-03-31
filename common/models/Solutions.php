<?php

namespace common\models;

use Yii;
use yii\helpers\FileHelper;
use yii\web\UploadedFile;

/**
 * This is the model class for table "solutions".
 *
 * @property int $id
 * @property string $title
 * @property string $content
 * @property string $image
 * @property int|null $status
 * @property int|null $sort
 */
class Solutions extends \yii\db\ActiveRecord
{
    public $solutions_file;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'solutions';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title', 'content'], 'required'],
            [['content'], 'string'],
            [['status', 'sort'], 'integer'],
            [['title', 'image','alt'], 'string', 'max' => 255],
            [['solutions_file'], 'file'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Название',
            'content' => 'Описание',
            'image' => 'Изображение',
            'solutions_file' => 'Изображение',
            'alt' => 'Alt для изображения',
            'status' => 'Статус',
            'sort' => 'Сортировка',
        ];
    }

    public function afterSave($insert, $changedAttributes)
    {
        parent::afterSave($insert, $changedAttributes);

        $imageSquareFile = UploadedFile::getInstance($this, 'solutions_file');
        if ($imageSquareFile) {
            $directory = Yii::getAlias('@frontend/web/uploads/images/solutions') . DIRECTORY_SEPARATOR;
            if (!is_dir($directory)) {
                FileHelper::createDirectory($directory);
            }

            $uid = date('YmdHs').Yii::$app->security->generateRandomString(6);
            $fileName = $uid . '-solutions.' . $imageSquareFile->extension;
            $filePath = $directory . $fileName;
            if ($imageSquareFile->saveAs($filePath)) {
                $path = '/uploads/images/solutions/' . $fileName;

                @unlink(Yii::getAlias('@frontend/web') . $this->solutions_file);
                $this->setAttribute('image', $path);
                $this->save();
            }
        }
    }
}
