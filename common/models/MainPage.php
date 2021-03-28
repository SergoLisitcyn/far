<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "main_page".
 *
 * @property int $id
 * @property string $header_title
 * @property string $header_subtitle
 * @property string $header_desc
 * @property string $name_company
 * @property string|null $site
 * @property string|null $address
 * @property string $phone
 * @property string $email_contact
 * @property string $email_footer
 * @property string|null $advantages
 * @property string|null $title
 * @property string|null $description
 * @property string|null $keywords
 */
class MainPage extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'main_page';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['header_title', 'header_subtitle', 'header_desc', 'name_company', 'phone', 'email_contact', 'email_footer'], 'required'],
            [['header_desc'], 'string'],
            [['advantages'], 'safe'],
            [['header_title', 'header_subtitle', 'name_company', 'site', 'address', 'phone', 'email_contact', 'email_footer', 'title', 'description', 'keywords'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'header_title' => 'Header Title',
            'header_subtitle' => 'Header Subtitle',
            'header_desc' => 'Header Desc',
            'name_company' => 'Name Company',
            'site' => 'Site',
            'address' => 'Address',
            'phone' => 'Phone',
            'email_contact' => 'Email Contact',
            'email_footer' => 'Email Footer',
            'advantages' => 'Advantages',
            'title' => 'Title',
            'description' => 'Description',
            'keywords' => 'Keywords',
        ];
    }
}
