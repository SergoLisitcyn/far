<?php

namespace common\models;

use Yii;
use yii\helpers\FileHelper;
use yii\web\UploadedFile;

/**
 * This is the model class for table "advantages".
 *
 * @property int $id
 * @property string $content
 * @property string $image
 * @property int|null $status
 * @property int|null $sort
 */
class Advantages extends \yii\db\ActiveRecord
{
    public $advantages_file;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'advantages';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['content'], 'required'],
            [['content'], 'string'],
            [['status', 'sort'], 'integer'],
//            [['image'], 'string', 'max' => 255],
            [['advantages_file'], 'file'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'content' => 'Content',
            'image' => 'Image',
            'advantages_file' => 'Image',
            'status' => 'Status',
            'sort' => 'Sort',
        ];
    }

    public function afterSave($insert, $changedAttributes)
    {
        parent::afterSave($insert, $changedAttributes);

        $imageSquareFile = UploadedFile::getInstance($this, 'advantages_file');
        if ($imageSquareFile) {
            $directory = Yii::getAlias('@frontend/web/uploads/images/advantages') . DIRECTORY_SEPARATOR;
            if (!is_dir($directory)) {
                FileHelper::createDirectory($directory);
            }

            $uid = date('YmdHs').Yii::$app->security->generateRandomString(6);
            $fileName = $uid . '-advantages.' . $imageSquareFile->extension;
            $filePath = $directory . $fileName;
            if ($imageSquareFile->saveAs($filePath)) {
                $path = '/uploads/images/advantages/' . $fileName;

                @unlink(Yii::getAlias('@frontend/web') . $this->advantages_file);
                $this->setAttribute('image', $path);
                $this->save();
            }
        }
    }
}
