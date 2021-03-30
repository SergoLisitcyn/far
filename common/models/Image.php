<?php

namespace common\models;

use Yii;
use yii\helpers\FileHelper;
use yii\web\UploadedFile;

/**
 * This is the model class for table "image".
 *
 * @property int $id
 * @property int|null $parent_id
 * @property string|null $url
 */
class Image extends \yii\db\ActiveRecord
{
    public $image_files;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'image';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['parent_id'], 'integer'],
            [['url'], 'string', 'max' => 255],
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
            'url' => 'Url',
        ];
    }

    public function afterSave($insert, $changedAttributes)
    {
        parent::afterSave($insert, $changedAttributes);

        $imagefiles = UploadedFile::getInstances($this, 'image_files');
        $this->image_files = (string)count($imagefiles);
//var_dump($this->image_files);die;
        if (!is_null($imagefiles)) {
            $directory = Yii::getAlias('@frontend/web/uploads/images/gallery/'.$this->id) . DIRECTORY_SEPARATOR;
            if (!is_dir($directory)) {
                FileHelper::createDirectory($directory);
            }
            foreach ($imagefiles as $file) {
                $productimage = new Image();
                $productimage->parent_id = 0;
                $productimage->url = '/uploads/images/gallery/'.$this->id.'/'.$file->baseName.'.'.$file->extension;
                if ($productimage->save()) {
                    $file->saveAs($directory .'/'. $file->baseName . '.' . $file->extension);
                }
            }
        }
    }
}
