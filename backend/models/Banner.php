<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "banner".
 *
 * @property string $id
 * @property string $title
 * @property string $poster
 * @property int $status
 * @property int $show
 * @property string $create_date
 * @property string $keyword
 * @property string $description
 * @property string $topic
 * @property string $sort
 * @property string $position
 * @property string $url
 */
class Banner extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'banner';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title','position'], 'required'],
            [['status', 'show', 'sort'], 'integer'],
            [['create_date'], 'safe'],
            [['description','short','short_en'], 'string'],
            [['title','title_en','short','short_en','poster','avatar', 'keyword', 'topic', 'position', 'url'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' =>Yii::t('app','Title'),
            'title_en' =>Yii::t('app','Title').'(en)',
            'poster' =>Yii::t('app','Poster'),
            'avatar' =>Yii::t('app','Poster'),
            'status' =>Yii::t('app','Status'),
            'show' => Yii::t('app','Show'),
            'create_date' => Yii::t('app','Create Date'),
            'keyword' => Yii::t('app','Keyword'),
            'description' => Yii::t('app','Description'),
            'short' => Yii::t('app','Short'),
            'short_en' => Yii::t('app','Short').'(en)',
            'topic' => Yii::t('app','Topic'),
            'sort' => Yii::t('app','Sort'),
            'position' => Yii::t('app','Position'),
            'url' => Yii::t('app','Url'),
        ];
    }
}
